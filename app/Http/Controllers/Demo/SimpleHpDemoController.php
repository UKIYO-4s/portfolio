<?php

namespace App\Http\Controllers\Demo;

use App\Http\Controllers\Controller;

class SimpleHpDemoController extends Controller
{
    public function index()
    {
        return view('demo.simple-hp.index');
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
                    'description' => '企業サイトからECサイトまで、お客様のニーズに合わせたWebサイトを制作いたします。',
                    'features' => [
                        'レスポンシブデザイン対応',
                        'SEO最適化',
                        'CMSによる更新システム',
                        'アクセス解析設定'
                    ],
                    'price' => '30万円〜'
                ],
                [
                    'title' => 'システム開発',
                    'description' => '業務効率化を実現するカスタムシステムを開発いたします。',
                    'features' => [
                        '要件定義から保守まで一貫対応',
                        'クラウド・オンプレミス対応',
                        'API連携',
                        '既存システムとの統合'
                    ],
                    'price' => '100万円〜'
                ],
                [
                    'title' => 'デジタルマーケティング',
                    'description' => 'Web広告運用からSNSマーケティングまで、総合的にサポートいたします。',
                    'features' => [
                        'Web広告運用（Google/Yahoo/SNS）',
                        'SEO・コンテンツマーケティング',
                        'アクセス解析・改善提案',
                        'SNS運用代行'
                    ],
                    'price' => '月額10万円〜'
                ]
            ]
        ]);
    }

    public function contact()
    {
        return view('demo.simple-hp.contact');
    }
}
