<?php

namespace App\Http\Controllers\Demo;

use App\Http\Controllers\Controller;

class SimpleHpDemoController extends Controller
{
    public function index()
    {
        return view('demo.simple-hp.index', [
            'portfolios' => [
                [
                    'title' => 'コーポレートサイトリニューアル',
                    'role' => 'デザイン・フロントエンド開発',
                    'result' => 'CVR 2.3倍向上（3ヶ月比較）',
                    'demo_url' => route('demo.custom-hp.index'),
                    'gradient' => 'from-gray-100 to-gray-200'
                ],
                [
                    'title' => 'ECサイト構築',
                    'role' => 'UI/UXデザイン・Laravel開発',
                    'result' => '初月売上目標達成率 150%',
                    'demo_url' => route('demo.full-custom.index'),
                    'gradient' => 'from-gray-200 to-gray-300'
                ],
                [
                    'title' => '業務効率化システム',
                    'role' => 'フルスタック開発',
                    'result' => '業務時間 40%削減',
                    'demo_url' => route('demo.invoice.login'),
                    'gradient' => 'from-gray-100 to-gray-200'
                ]
            ]
        ]);
    }

    public function about()
    {
        return view('demo.simple-hp.about', [
            'company' => [
                'name' => 'サンプル株式会社',
                'name_en' => 'Sample Corporation',
                'established' => '2015年4月1日',
                'capital' => '1,000万円',
                'employees' => '50名',
                'ceo' => '山田 太郎',
                'address' => '東京都千代田区丸の内1-1-1',
                'postal_code' => '100-0005',
                'phone' => '03-1234-5678',
                'email' => 'info@sample-corp.jp',
                'business' => [
                    'Webサイト制作・運用',
                    'システム開発・保守',
                    'デジタルマーケティング支援',
                    'IT コンサルティング'
                ]
            ]
        ]);
    }

    public function service()
    {
        return view('demo.simple-hp.service', [
            'services' => [
                [
                    'title' => 'Webサイト制作',
                    'description' => 'レスポンシブ対応の美しいWebサイトを制作します。WordPress/Laravelを使った運用しやすいサイトをご提供いたします。',
                    'features' => [
                        'レスポンシブWebデザイン',
                        'WordPress / Laravel開発',
                        'SEO最適化',
                        '保守・運用サポート'
                    ],
                    'price' => '15万円〜80万円',
                    'duration' => '1〜3ヶ月',
                    'gradient' => 'from-gray-100 to-gray-200'
                ],
                [
                    'title' => 'システム開発',
                    'description' => '業務効率化を実現するWebシステムを開発します。Laravel/PHPを使った高品質なシステムをご提供いたします。',
                    'features' => [
                        '業務効率化ツール開発',
                        'Laravel/PHP開発',
                        'データベース設計',
                        'API開発・連携'
                    ],
                    'price' => '20万円〜80万円',
                    'duration' => '1〜4ヶ月',
                    'gradient' => 'from-gray-200 to-gray-300'
                ],
                [
                    'title' => 'UI/UXデザイン',
                    'description' => 'ユーザー体験を重視したデザインで、使いやすく成果につながるサイト設計を行います。',
                    'features' => [
                        'デザイン改善提案',
                        'プロトタイピング',
                        'ユーザーリサーチ',
                        'ユーザビリティテスト'
                    ],
                    'price' => '10万円〜',
                    'duration' => '2週間〜2ヶ月',
                    'gradient' => 'from-gray-100 to-gray-200'
                ]
            ]
        ]);
    }

    public function contact()
    {
        return view('demo.simple-hp.contact');
    }
}
