<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class PurchaseVerificationController extends Controller
{
    /**
     * メールアドレスが購入済みかどうかを確認
     */
    public function verify(Request $request): JsonResponse
    {
        // APIキー認証
        $apiKey = $request->header('X-API-Key');
        if ($apiKey !== config('services.internal_api.key')) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        $request->validate([
            'email' => 'required|email',
            'product_id' => 'nullable|integer',
        ]);

        $query = Order::where('email', $request->email)
            ->where('status', 'completed');

        // 特定の商品IDが指定された場合
        if ($request->product_id) {
            $query->whereHas('items', function ($q) use ($request) {
                $q->where('product_id', $request->product_id);
            });
        }

        $hasPurchased = $query->exists();

        return response()->json([
            'purchased' => $hasPurchased,
            'email' => $request->email,
        ]);
    }
}
