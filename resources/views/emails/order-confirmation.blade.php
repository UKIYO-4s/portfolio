<x-mail::message>
# ご注文ありがとうございます

{{$order->customer_name}} 様

この度はSD-createをご利用いただき、誠にありがとうございます。
ご注文を確認いたしましたのでお知らせいたします。

## 注文詳細

**注文番号:** {{ $order->order_number }}  
**注文日時:** {{ $order->created_at->format('Y年m月d日 H:i') }}  
**お支払い状況:** {{ $order->payment_status === 'paid' ? '支払い完了' : 'お支払い待ち' }}

---

### ご注文内容

@foreach($order->items as $item)
**{{ $item->product_name }}**
数量: {{ $item->quantity }}
価格: ¥{{ number_format($item->price) }}

@if($item->product && $item->product->product_type === 'download' && $order->payment_status === 'paid')
<x-mail::button :url="\App\Http\Controllers\DownloadController::generateSignedDownloadUrl($order, $item->product)">
ダウンロードページへ
</x-mail::button>
@endif

---
@endforeach

**合計金額:** ¥{{ number_format($order->total_amount) }}

@if($order->payment_status === 'paid')
@php
$downloadableItems = $order->items->filter(fn($item) => $item->product && $item->product->product_type === 'download');
@endphp
@if($downloadableItems->count() > 0)
## ダウンロードについて

デジタル商品のダウンロードは、上記のボタンまたは以下のリンクからダウンロードページにアクセスできます。
お使いのMacの種類（Apple Silicon / Intel）に合わせたファイルをダウンロードしてください。

@foreach($downloadableItems as $item)
- [{{ $item->product_name }} ダウンロードページ]({{ \App\Http\Controllers\DownloadController::generateSignedDownloadUrl($order, $item->product) }})
@endforeach
@endif
@endif

## お問い合わせ

ご不明な点がございましたら、お気軽にお問い合わせください。

サポートメール: support@sd-create.jp

<x-mail::button :url="config('app.url')">
サイトに戻る
</x-mail::button>

今後ともSD-createをよろしくお願いいたします。

SD-create  
後藤翔栄
</x-mail::message>
