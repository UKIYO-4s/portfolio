<?php

namespace App\Http\Controllers\Demo;

use App\Http\Controllers\Controller;

class CustomHpDemoController extends Controller
{
    /**
     * トップページ
     */
    public function index()
    {
        return view('demo.custom-hp.index');
    }

    /**
     * 会社概要
     */
    public function about()
    {
        $company = [
            'name' => 'クリエイティブ株式会社',
            'name_en' => 'Creative Corporation',
            'established' => '2020年4月1日',
            'capital' => '1,000万円',
            'employees' => '15名',
            'ceo' => '山田 太郎',
            'address' => '東京都渋谷区恵比寿1-1-1',
            'postal_code' => '150-0013',
            'phone' => '03-1234-5678',
            'email' => 'info@creative-corp.jp',
            'vision' => 'デザインとテクノロジーの力で、新しい価値を創造し、社会に貢献する。',
            'mission' => [
                'お客様のビジネスを成功に導くクリエイティブソリューションの提供',
                '最新技術とデザインの融合による革新的なサービスの開発',
                '社会に貢献し、持続可能な未来を創造する'
            ]
        ];

        return view('demo.custom-hp.about', compact('company'));
    }

    /**
     * サービス
     */
    public function service()
    {
        $services = [
            [
                'id' => 1,
                'title' => 'Webデザイン',
                'description' => '美しく使いやすいWebサイトをデザインします',
                'features' => [
                    'レスポンシブデザイン',
                    'UI/UXデザイン',
                    'ブランディング',
                    'プロトタイピング'
                ],
                'price' => '30万円〜'
            ],
            [
                'id' => 2,
                'title' => 'Web開発',
                'description' => '最新技術を使った高品質なWebアプリケーション開発',
                'features' => [
                    'フロントエンド開発',
                    'バックエンド開発',
                    'API開発',
                    'データベース設計'
                ],
                'price' => '50万円〜'
            ],
            [
                'id' => 3,
                'title' => 'デジタルマーケティング',
                'description' => 'データドリブンなマーケティング戦略',
                'features' => [
                    'SEO対策',
                    'SNS運用',
                    'コンテンツマーケティング',
                    'アクセス解析'
                ],
                'price' => '20万円〜/月'
            ]
        ];

        return view('demo.custom-hp.service', compact('services'));
    }

    /**
     * 実績
     */
    public function works()
    {
        $works = [
            [
                'id' => 1,
                'title' => 'ECサイトリニューアル',
                'category' => 'Web開発',
                'client' => 'A社',
                'year' => '2024',
                'description' => '老舗アパレルブランドのECサイトを全面リニューアル。モダンなUIと高速なパフォーマンスを実現しました。',
                'tags' => ['UI/UX', 'フロントエンド', 'バックエンド']
            ],
            [
                'id' => 2,
                'title' => 'コーポレートサイト制作',
                'category' => 'Webデザイン',
                'client' => 'B社',
                'year' => '2024',
                'description' => 'IT企業のコーポレートサイトをゼロから制作。ブランドイメージを体現したデザインが高評価を得ました。',
                'tags' => ['ブランディング', 'UI/UX', 'レスポンシブ']
            ],
            [
                'id' => 3,
                'title' => 'アプリUI/UXデザイン',
                'category' => 'アプリデザイン',
                'client' => 'C社',
                'year' => '2024',
                'description' => 'ヘルスケアアプリのUI/UXデザインを担当。ユーザビリティテストを重ねて最適化しました。',
                'tags' => ['モバイル', 'UI/UX', 'プロトタイピング']
            ],
            [
                'id' => 4,
                'title' => 'LP制作・運用',
                'category' => 'マーケティング',
                'client' => 'D社',
                'year' => '2023',
                'description' => '新サービスのランディングページを制作し、A/Bテストを実施。CVRを150%向上させました。',
                'tags' => ['LP', 'A/Bテスト', 'マーケティング']
            ],
            [
                'id' => 5,
                'title' => 'ブランドサイト構築',
                'category' => 'Webデザイン',
                'client' => 'E社',
                'year' => '2023',
                'description' => '高級化粧品ブランドのブランドサイトを構築。洗練されたビジュアルとアニメーションで世界観を表現しました。',
                'tags' => ['ブランディング', 'アニメーション', 'ビジュアル']
            ],
            [
                'id' => 6,
                'title' => 'SaaS管理画面開発',
                'category' => 'Web開発',
                'client' => 'F社',
                'year' => '2023',
                'description' => 'SaaSプロダクトの管理画面を開発。直感的な操作性と高度な機能を両立させました。',
                'tags' => ['SaaS', 'ダッシュボード', 'フロントエンド']
            ]
        ];

        return view('demo.custom-hp.works', compact('works'));
    }

    /**
     * お知らせ一覧
     */
    public function news()
    {
        $newsItems = [
            [
                'id' => 1,
                'title' => '新オフィス移転のお知らせ',
                'date' => '2024-03-15',
                'category' => 'お知らせ',
                'excerpt' => 'この度、業務拡大に伴い、新オフィスに移転いたしました。'
            ],
            [
                'id' => 2,
                'title' => 'Webデザインアワード2024 受賞',
                'date' => '2024-03-01',
                'category' => '受賞',
                'excerpt' => '弊社が制作したWebサイトが、Webデザインアワード2024で優秀賞を受賞いたしました。'
            ],
            [
                'id' => 3,
                'title' => '春季休業のお知らせ',
                'date' => '2024-02-20',
                'category' => 'お知らせ',
                'excerpt' => '誠に勝手ながら、下記期間を春季休業とさせていただきます。'
            ],
            [
                'id' => 4,
                'title' => '新サービス「Creative Cloud」リリース',
                'date' => '2024-02-01',
                'category' => 'プレスリリース',
                'excerpt' => 'デザインアセット管理サービス「Creative Cloud」をリリースいたしました。'
            ],
            [
                'id' => 5,
                'title' => '採用情報を更新しました',
                'date' => '2024-01-15',
                'category' => '採用',
                'excerpt' => 'Webデザイナー、フロントエンドエンジニアを募集しています。'
            ]
        ];

        return view('demo.custom-hp.news', compact('newsItems'));
    }

    /**
     * お知らせ詳細
     */
    public function newsDetail($id)
    {
        $newsItems = [
            1 => [
                'id' => 1,
                'title' => '新オフィス移転のお知らせ',
                'date' => '2024-03-15',
                'category' => 'お知らせ',
                'content' => '
                    <p>平素より格別のご高配を賜り、厚く御礼申し上げます。</p>
                    <p>この度、業務拡大に伴い、下記の通り新オフィスに移転いたしました。</p>

                    <h3>新住所</h3>
                    <p>〒150-0013<br>
                    東京都渋谷区恵比寿1-1-1<br>
                    クリエイティブビル 5F</p>

                    <h3>移転日</h3>
                    <p>2024年3月15日</p>

                    <p>電話番号、メールアドレスに変更はございません。<br>
                    今後とも変わらぬご愛顧のほど、よろしくお願い申し上げます。</p>
                '
            ],
            2 => [
                'id' => 2,
                'title' => 'Webデザインアワード2024 受賞',
                'date' => '2024-03-01',
                'category' => '受賞',
                'content' => '
                    <p>この度、弊社が制作したWebサイトが、Webデザインアワード2024において優秀賞を受賞いたしました。</p>

                    <h3>受賞作品</h3>
                    <p>「高級化粧品ブランドサイト」<br>
                    クライアント: E社様</p>

                    <h3>評価ポイント</h3>
                    <ul>
                        <li>洗練されたビジュアルデザイン</li>
                        <li>ブランドの世界観を体現したアニメーション</li>
                        <li>優れたユーザビリティ</li>
                    </ul>

                    <p>これもひとえに、お客様をはじめ関係者の皆様のご支援の賜物と深く感謝申し上げます。<br>
                    今後も、より一層クオリティの高い制作を目指してまいります。</p>
                '
            ],
            3 => [
                'id' => 3,
                'title' => '春季休業のお知らせ',
                'date' => '2024-02-20',
                'category' => 'お知らせ',
                'content' => '
                    <p>平素は格別のご高配を賜り、厚く御礼申し上げます。</p>
                    <p>誠に勝手ながら、下記期間を春季休業とさせていただきます。</p>

                    <h3>春季休業期間</h3>
                    <p>2024年4月27日(土) 〜 2024年5月6日(月)</p>

                    <p>※2024年5月7日(火)より通常営業いたします。</p>

                    <p>休業期間中にいただいたお問い合わせにつきましては、5月7日以降、順次対応させていただきます。<br>
                    ご不便をおかけいたしますが、何卒ご理解のほどよろしくお願い申し上げます。</p>
                '
            ],
            4 => [
                'id' => 4,
                'title' => '新サービス「Creative Cloud」リリース',
                'date' => '2024-02-01',
                'category' => 'プレスリリース',
                'content' => '
                    <p>クリエイティブ株式会社は、デザインアセット管理サービス「Creative Cloud」を2024年2月1日にリリースいたしました。</p>

                    <h3>サービス概要</h3>
                    <p>Creative Cloudは、企業のデザインアセットを一元管理し、チーム全体で効率的に活用できるクラウドサービスです。</p>

                    <h3>主な機能</h3>
                    <ul>
                        <li>デザインアセットの一元管理</li>
                        <li>バージョン管理機能</li>
                        <li>チーム共有・権限管理</li>
                        <li>AI検索機能</li>
                        <li>各種ツールとの連携</li>
                    </ul>

                    <p>詳細につきましては、お問い合わせフォームよりご連絡ください。</p>
                '
            ],
            5 => [
                'id' => 5,
                'title' => '採用情報を更新しました',
                'date' => '2024-01-15',
                'category' => '採用',
                'content' => '
                    <p>現在、以下の職種で新しいメンバーを募集しています。</p>

                    <h3>募集職種</h3>

                    <h4>Webデザイナー</h4>
                    <ul>
                        <li>業務内容: Webサイト・アプリケーションのUI/UXデザイン</li>
                        <li>必須スキル: Figma, Adobe XD等のデザインツール経験</li>
                        <li>歓迎スキル: HTML/CSS, JavaScript の知識</li>
                    </ul>

                    <h4>フロントエンドエンジニア</h4>
                    <ul>
                        <li>業務内容: Webアプリケーションのフロントエンド開発</li>
                        <li>必須スキル: HTML/CSS, JavaScript, React または Vue.js</li>
                        <li>歓迎スキル: TypeScript, Next.js, Nuxt.js の経験</li>
                    </ul>

                    <p>詳細・応募方法につきましては、お問い合わせフォームよりご連絡ください。</p>
                '
            ]
        ];

        $news = $newsItems[$id] ?? abort(404);

        return view('demo.custom-hp.news-detail', compact('news'));
    }

    /**
     * お問い合わせ
     */
    public function contact()
    {
        return view('demo.custom-hp.contact');
    }
}
