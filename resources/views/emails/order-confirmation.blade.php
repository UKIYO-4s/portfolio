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

@if($item->product && $item->product->product_type === 'download' && $item->download_link && $order->payment_status === 'paid')
<x-mail::button :url="$item->download_link">
ダウンロード
</x-mail::button>

ダウンロード回数: {{ $item->download_count }}回
@endif

---
@endforeach

**合計金額:** ¥{{ number_format($order->total_amount) }}

@if($order->payment_status === 'paid')
## ダウンロードについて

デジタル商品のダウンロードは、上記のボタンまたは以下のリンクからアクセスできます。

@foreach($order->items as $item)
@if($item->product && $item->product->product_type === 'download' && $item->download_link)
- [{{ $item->product_name }}]({{ $item->download_link }})
@endif
@endforeach

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
