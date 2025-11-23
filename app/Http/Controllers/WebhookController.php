<?php

namespace App\Http\Controllers;

use App\Mail\OrderConfirmation;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Stripe\Webhook;
use Stripe\Exception\SignatureVerificationException;

class WebhookController extends Controller
{
    /**
     * Handle incoming Stripe webhook events
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function handleStripeWebhook(Request $request)
    {
        $payload = $request->getContent();
        $sigHeader = $request->header('Stripe-Signature');
        $webhookSecret = config('services.stripe.webhook_secret');

        // Security: Require webhook secret in production
        if (!$webhookSecret) {
            Log::error('Stripe Webhook: Webhook secret not configured');

            // In non-production environments, allow processing for testing
            if (config('app.env') === 'production') {
                return response('Webhook secret not configured', 500);
            }

            Log::warning('Stripe Webhook: Processing without signature verification (non-production only)');
            $event = json_decode($payload, true);
        } else {
            // Verify webhook signature
            try {
                $event = Webhook::constructEvent(
                    $payload,
                    $sigHeader,
                    $webhookSecret
                );
            } catch (\UnexpectedValueException $e) {
                Log::error('Stripe Webhook: Invalid payload', [
                    'error' => $e->getMessage()
                ]);
                return response('Invalid payload', 400);
            } catch (SignatureVerificationException $e) {
                Log::error('Stripe Webhook: Invalid signature');
                return response('Invalid signature', 400);
            }
        }

        Log::info('Stripe Webhook received', [
            'type' => $event['type'],
            'id' => $event['id']
        ]);

        switch ($event['type']) {
            case 'checkout.session.completed':
                $this->handleCheckoutSessionCompleted($event['data']['object']);
                break;

            case 'checkout.session.expired':
                $this->handleCheckoutSessionExpired($event['data']['object']);
                break;

            case 'payment_intent.payment_failed':
                $this->handlePaymentIntentFailed($event['data']['object']);
                break;

            default:
                Log::info('Stripe Webhook: Unhandled event type', [
                    'type' => $event['type']
                ]);
        }

        return response('Webhook handled', 200);
    }

    /**
     * Handle successful checkout session completion
     *
     * @param object $session
     * @return void
     */
    protected function handleCheckoutSessionCompleted($session)
    {
        $order = Order::where('payment_intent_id', $session['id'])->first();

        if (!$order) {
            Log::warning('Stripe Webhook: Order not found', [
                'session_id' => $session['id']
            ]);
            return;
        }

        if ($order->payment_status === 'paid') {
            Log::info('Stripe Webhook: Order already marked as paid', [
                'order_id' => $order->id,
                'session_id' => $session['id']
            ]);
            return;
        }

        $order->update([
            'payment_status' => 'paid',
            'status' => 'completed'
        ]);

        Log::info('Stripe Webhook: Order payment confirmed', [
            'order_id' => $order->id,
            'order_number' => $order->order_number,
            'session_id' => $session['id']
        ]);

        // Send order confirmation email
        try {
            Mail::to($order->email)->send(new OrderConfirmation($order));
            Log::info('Stripe Webhook: Confirmation email sent', [
                'order_id' => $order->id,
                'email_domain' => substr(strrchr($order->email, "@"), 1) // Log domain only for privacy
            ]);
        } catch (\Exception $e) {
            Log::error('Stripe Webhook: Failed to send confirmation email', [
                'order_id' => $order->id,
                'email_domain' => substr(strrchr($order->email, "@"), 1), // Log domain only
                'error' => $e->getMessage()
            ]);
        }
    }

    /**
     * Handle expired checkout session
     *
     * @param object $session
     * @return void
     */
    protected function handleCheckoutSessionExpired($session)
    {
        $order = Order::where('payment_intent_id', $session['id'])
            ->where('payment_status', 'pending')
            ->first();

        if (!$order) {
            return;
        }

        $order->update([
            'payment_status' => 'cancelled',
            'status' => 'cancelled'
        ]);

        Log::info('Stripe Webhook: Order cancelled due to session expiration', [
            'order_id' => $order->id,
            'order_number' => $order->order_number,
            'session_id' => $session['id']
        ]);
    }

    /**
     * Handle failed payment intent
     *
     * @param object $paymentIntent
     * @return void
     */
    protected function handlePaymentIntentFailed($paymentIntent)
    {
        $order = Order::where('payment_intent_id', $paymentIntent['id'])
            ->where('payment_status', 'pending')
            ->first();

        if (!$order) {
            return;
        }

        $order->update([
            'payment_status' => 'failed',
            'status' => 'cancelled'
        ]);

        Log::error('Stripe Webhook: Payment failed', [
            'order_id' => $order->id,
            'order_number' => $order->order_number,
            'payment_intent_id' => $paymentIntent['id'],
            'failure_message' => $paymentIntent['last_payment_error']['message'] ?? 'Unknown error'
        ]);
    }
}
