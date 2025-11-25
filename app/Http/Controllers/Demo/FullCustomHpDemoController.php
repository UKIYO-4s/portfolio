<?php

namespace App\Http\Controllers\Demo;

use App\Http\Controllers\Controller;

class FullCustomHpDemoController extends Controller
{
    /**
     * トップページ
     */
    public function index()
    {
        return view('demo.full-custom.index');
    }

    /**
     * 商品一覧
     */
    public function products()
    {
        $products = $this->getProducts();
        return view('demo.full-custom.products', compact('products'));
    }

    /**
     * 商品詳細
     */
    public function productDetail($id)
    {
        $products = $this->getProducts();
        $product = collect($products)->firstWhere('id', (int)$id);

        if (!$product) {
            abort(404);
        }

        return view('demo.full-custom.product-detail', compact('product'));
    }

    /**
     * 会社概要
     */
    public function about()
    {
        $company = [
            'name' => 'Funky Co.',
            'established' => '2020',
            'mission' => 'Making the world more colorful and fun! 🌈',
            'description' => 'We create awesome products that bring joy to people\'s lives. Our team is passionate about design, innovation, and having a great time!',
            'values' => [
                'Creativity' => 'Think outside the box',
                'Fun' => 'Enjoy what you do',
                'Quality' => 'Never compromise',
                'Community' => 'We\'re in this together'
            ]
        ];

        return view('demo.full-custom.about', compact('company'));
    }

    /**
     * お問い合わせ
     */
    public function contact()
    {
        return view('demo.full-custom.contact');
    }

    /**
     * 管理画面ダッシュボード
     */
    public function adminDashboard()
    {
        $stats = [
            'total_sales' => 1250000,
            'total_orders' => 340,
            'total_products' => 24,
            'total_customers' => 156
        ];

        $recentOrders = [
            ['id' => 1234, 'customer' => 'John Doe', 'amount' => 4980, 'status' => 'Completed'],
            ['id' => 1235, 'customer' => 'Jane Smith', 'amount' => 2980, 'status' => 'Processing'],
            ['id' => 1236, 'customer' => 'Bob Johnson', 'amount' => 7960, 'status' => 'Completed'],
            ['id' => 1237, 'customer' => 'Alice Williams', 'amount' => 1490, 'status' => 'Pending'],
            ['id' => 1238, 'customer' => 'Charlie Brown', 'amount' => 5970, 'status' => 'Completed'],
        ];

        return view('demo.full-custom.admin.dashboard', compact('stats', 'recentOrders'));
    }

    /**
     * 管理画面商品管理
     */
    public function adminProducts()
    {
        $products = $this->getProducts();
        return view('demo.full-custom.admin.products', compact('products'));
    }

    /**
     * モック商品データ取得
     */
    private function getProducts()
    {
        return [
            [
                'id' => 1,
                'name' => 'Super Cool Widget',
                'price' => 2980,
                'category' => 'Gadgets',
                'description' => 'The coolest widget you\'ve ever seen! Perfect for all your widget needs.',
                'features' => ['Durable', 'Colorful', 'Fun to use'],
                'stock' => 45
            ],
            [
                'id' => 2,
                'name' => 'Retro Vinyl Player',
                'price' => 12800,
                'category' => 'Music',
                'description' => 'Bring back the good old days with this groovy vinyl player!',
                'features' => ['Authentic sound', 'Bluetooth ready', 'Vintage design'],
                'stock' => 12
            ],
            [
                'id' => 3,
                'name' => 'Funky Sunglasses',
                'price' => 1490,
                'category' => 'Fashion',
                'description' => 'Look cool and protect your eyes with these rad shades!',
                'features' => ['UV protection', 'Lightweight', 'Super stylish'],
                'stock' => 78
            ],
            [
                'id' => 4,
                'name' => 'Groovy Lava Lamp',
                'price' => 4980,
                'category' => 'Home',
                'description' => 'Set the mood with this mesmerizing lava lamp. Perfect for any room!',
                'features' => ['Color changing', 'Energy efficient', 'Relaxing ambiance'],
                'stock' => 23
            ],
            [
                'id' => 5,
                'name' => 'Rainbow Roller Skates',
                'price' => 7960,
                'category' => 'Sports',
                'description' => 'Roll in style with these colorful skates! Fun for all ages.',
                'features' => ['Adjustable size', 'Smooth wheels', 'Eye-catching design'],
                'stock' => 34
            ],
            [
                'id' => 6,
                'name' => 'Pop Art Poster Set',
                'price' => 2490,
                'category' => 'Art',
                'description' => 'Transform your space with these vibrant pop art posters!',
                'features' => ['High quality print', 'Set of 3', 'Ready to frame'],
                'stock' => 56
            ]
        ];
    }
}
