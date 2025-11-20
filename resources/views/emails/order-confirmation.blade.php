<x-mail::message>
# Thank You for Your Purchase!

Hi {{ $order->customer_name }},

Your order **{{ $order->order_number }}** has been confirmed and is ready for download.

## Order Summary

@foreach($order->items as $item)
- {{ $item->product_name }} × {{ $item->quantity }} - ${{ number_format($item->price * $item->quantity, 2) }}
@endforeach

**Total:** ${{ number_format($order->total_amount, 2) }}

## Download Your Products

Your digital products are ready for immediate download:

@foreach($order->items as $item)
@if($item->product && $item->product->file_path)
<x-mail::button :url="route('download', ['order' => $order->id, 'product' => $item->product->id])">
Download {{ $item->product_name }}
</x-mail::button>
@endif
@endforeach

Keep this email safe as you can use these links to download your products anytime.

Thank you for your business!<br>
{{ config('app.name') }}
</x-mail::message>
