@extends('layouts.app')

@section('title', '特定商取引法に基づく表記')

@section('content')
<div class="min-h-screen bg-black text-white py-20">
    <div class="max-w-4xl mx-auto px-6 sm:px-8">
        <h1 class="text-4xl font-thin tracking-wide mb-12 text-center">特定商取引法に基づく表記</h1>

        <div class="space-y-8 text-gray-300">
            <!-- 販売業者 -->
            <div class="border-b border-gray-800 pb-6">
                <h2 class="text-xl font-light mb-3 text-white">販売業者</h2>
                <p class="leading-relaxed">【法人名または個人名】</p>
                <p class="text-sm text-gray-400 mt-2">※個人事業主の場合：「請求があった場合は遅滞なく開示します」と記載可能</p>
            </div>

            <!-- 運営責任者 -->
            <div class="border-b border-gray-800 pb-6">
                <h2 class="text-xl font-light mb-3 text-white">運営責任者</h2>
                <p class="leading-relaxed">【代表者名】</p>
            </div>

            <!-- 所在地 -->
            <div class="border-b border-gray-800 pb-6">
                <h2 class="text-xl font-light mb-3 text-white">所在地</h2>
                <p class="leading-relaxed">【郵便番号・住所】</p>
                <p class="text-sm text-gray-400 mt-2">※個人事業主の場合：「請求があった場合は遅滞なく開示します」と記載可能</p>
            </div>

            <!-- 電話番号 -->
            <div class="border-b border-gray-800 pb-6">
                <h2 class="text-xl font-light mb-3 text-white">電話番号</h2>
                <p class="leading-relaxed">【電話番号】</p>
                <p class="text-sm text-gray-400 mt-2">営業時間: 【営業時間】（土日祝日を除く）</p>
                <p class="text-sm text-gray-400 mt-1">※個人事業主の場合：「請求があった場合は遅滞なく開示します」と記載可能</p>
                <p class="text-sm text-gray-400 mt-1">※コンビニ決済を利用する場合：固定電話または050番号が必須（携帯電話番号は不可）</p>
            </div>

            <!-- メールアドレス -->
            <div class="border-b border-gray-800 pb-6">
                <h2 class="text-xl font-light mb-3 text-white">メールアドレス</h2>
                <p class="leading-relaxed">【メールアドレス】</p>
                <p class="text-sm text-gray-400 mt-2">営業時間: 【営業時間】（土日祝日を除く）</p>
            </div>

            <!-- 販売価格 -->
            <div class="border-b border-gray-800 pb-6">
                <h2 class="text-xl font-light mb-3 text-white">販売価格</h2>
                <p class="leading-relaxed">各商品ページに記載の金額（消費税込み）</p>
            </div>

            <!-- 商品代金以外の必要料金 -->
            <div class="border-b border-gray-800 pb-6">
                <h2 class="text-xl font-light mb-3 text-white">商品代金以外の必要料金</h2>
                <p class="leading-relaxed mb-2">【デジタル商品の場合の例】</p>
                <ul class="list-disc list-inside space-y-1 ml-4">
                    <li>配送料: なし（デジタル商品のため）</li>
                    <li>決済手数料: 無料</li>
                </ul>
                <p class="leading-relaxed mt-4 mb-2">【物理商品の場合の例】</p>
                <ul class="list-disc list-inside space-y-1 ml-4">
                    <li>配送料: 1箱あたり一律1,000円</li>
                    <li>コンビニ決済の取引手数料: 100円</li>
                    <li>銀行振込手数料: お客様負担</li>
                </ul>
            </div>

            <!-- 支払方法 -->
            <div class="border-b border-gray-800 pb-6">
                <h2 class="text-xl font-light mb-3 text-white">支払方法</h2>
                <ul class="list-disc list-inside space-y-1 ml-4">
                    <li>クレジットカード決済（Visa、Mastercard、American Express、JCB）</li>
                    <li>【その他利用可能な決済方法】</li>
                </ul>
            </div>

            <!-- 支払時期 -->
            <div class="border-b border-gray-800 pb-6">
                <h2 class="text-xl font-light mb-3 text-white">支払時期</h2>
                <p class="leading-relaxed mb-2">クレジットカード決済: ご注文時に即時処理されます</p>
                <p class="leading-relaxed">【その他決済方法の場合】: 【支払期限】</p>
            </div>

            <!-- 商品の引渡時期 -->
            <div class="border-b border-gray-800 pb-6">
                <h2 class="text-xl font-light mb-3 text-white">商品の引渡時期</h2>
                <p class="leading-relaxed mb-2">【デジタル商品の場合の例】</p>
                <p class="ml-4">決済完了後、すぐにダウンロード可能</p>

                <p class="leading-relaxed mt-4 mb-2">【物理商品の場合の例】</p>
                <p class="ml-4">ご注文確認後、3～5営業日以内に発送いたします。配送は発送後7～14日程度でお届けします。</p>
            </div>

            <!-- 返品・交換について -->
            <div class="border-b border-gray-800 pb-6">
                <h2 class="text-xl font-light mb-3 text-white">返品・交換について</h2>

                <h3 class="text-lg font-light mb-2 text-white mt-4">通常商品の返品・交換</h3>
                <p class="leading-relaxed mb-2">【デジタル商品の場合の例】</p>
                <div class="ml-4 space-y-2">
                    <p>デジタル商品の性質上、ダウンロード後の返品・返金はお受けできません。</p>
                    <p>ダウンロード前であれば、ご購入後24時間以内にカスタマーサポート（【メールアドレス】）までご連絡いただくことで、返金対応いたします。</p>
                </div>

                <p class="leading-relaxed mt-4 mb-2">【物理商品の場合の例】</p>
                <div class="ml-4 space-y-2">
                    <p><strong>発送前:</strong> ウェブサイトのマイページから注文をキャンセルできます。</p>
                    <p><strong>発送後:</strong> 未開封の商品に限り、商品到着後10日以内にカスタマーサポート（【電話番号】または【メールアドレス】）にご連絡いただいた場合に限り、返品・返金または交換が可能です。</p>
                    <p><strong>開封後:</strong> 返品・交換はお受けできません。</p>
                    <p><strong>返送料:</strong> お客様のご都合による返品の場合、返送料はお客様負担となります。</p>
                </div>

                <h3 class="text-lg font-light mb-2 text-white mt-6">不良品・誤配送の場合</h3>
                <div class="ml-4 space-y-2">
                    <p>商品の不良や誤配送があった場合は、商品到着後【期限】以内にカスタマーサポート（【電話番号】または【メールアドレス】）までご連絡ください。</p>
                    <p>弊社負担にて良品と交換、または返金対応させていただきます。</p>
                    <p>この場合の返送料は弊社が負担いたします。</p>
                </div>
            </div>

            <!-- 動作環境（デジタル商品・ソフトウェアの場合） -->
            <div class="border-b border-gray-800 pb-6">
                <h2 class="text-xl font-light mb-3 text-white">動作環境（デジタル商品の場合）</h2>
                <p class="leading-relaxed mb-2">【該当する場合のみ記載】</p>
                <div class="ml-4 space-y-1">
                    <p>対応OS: Windows 10以降、macOS 11以降</p>
                    <p>必要ディスク容量: 500MB以上</p>
                    <p>推奨メモリ: 4GB以上</p>
                    <p>その他: インターネット接続が必要</p>
                </div>
            </div>

            <!-- 販売数量の制限（該当する場合） -->
            <div class="border-b border-gray-800 pb-6">
                <h2 class="text-xl font-light mb-3 text-white">販売数量の制限</h2>
                <p class="leading-relaxed">【該当する場合のみ記載】</p>
                <p class="ml-4">特に制限はございません。</p>
                <p class="ml-4">【または】お一人様〇点まで</p>
            </div>

            <!-- 申込期間（該当する場合） -->
            <div class="border-b border-gray-800 pb-6">
                <h2 class="text-xl font-light mb-3 text-white">申込期間</h2>
                <p class="leading-relaxed">【該当する場合のみ記載】</p>
                <p class="ml-4">特に制限はございません。商品の在庫がある限り販売いたします。</p>
                <p class="ml-4">【または】〇月〇日まで</p>
            </div>

            <!-- その他 -->
            <div class="pb-6">
                <h2 class="text-xl font-light mb-3 text-white">その他</h2>
                <div class="space-y-2 ml-4">
                    <p class="leading-relaxed">ご注文内容や取引に関するお問い合わせは、上記のメールアドレスまたは電話番号にてお受けいたします。</p>
                    <p class="leading-relaxed">お客様の個人情報については、弊社プライバシーポリシーに基づき、適切に管理いたします。</p>
                </div>
            </div>
        </div>

        <!-- 注意事項 -->
        <div class="mt-12 p-6 bg-gray-900 rounded-lg border border-gray-800">
            <h3 class="text-lg font-light mb-3 text-yellow-400">⚠️ 編集が必要な項目</h3>
            <div class="text-sm text-gray-400 space-y-2">
                <p>このページは<strong>テンプレート</strong>です。以下の【】で囲まれた部分を実際の情報に置き換えてください：</p>
                <ul class="list-disc list-inside ml-4 space-y-1">
                    <li>【法人名または個人名】- 正式な商号または氏名</li>
                    <li>【代表者名】- 代表者の氏名</li>
                    <li>【郵便番号・住所】- 登記簿上の所在地</li>
                    <li>【電話番号】- サポート用電話番号（コンビニ決済利用時は固定電話必須）</li>
                    <li>【メールアドレス】- サポート用メールアドレス</li>
                    <li>【営業時間】- サポート対応可能時間</li>
                    <li>その他、事業内容に応じて追加・削除してください</li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection
