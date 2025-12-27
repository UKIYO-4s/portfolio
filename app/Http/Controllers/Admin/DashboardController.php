<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Photo;
use App\Models\Product;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'projects' => Project::count(),
            'photos' => Photo::count(),
            'products' => Product::count(),
            'orders' => Order::count(),
            'total_revenue' => Order::where('payment_status', 'paid')->sum('total_amount'),
        ];

        $recentOrders = Order::with('items')->latest()->take(5)->get();

        // ダウンロード可能な商品一覧
        $downloadProducts = Product::where('product_type', 'download')->get();

        return view('admin.dashboard', compact('stats', 'recentOrders', 'downloadProducts'));
    }

    /**
     * 開発者用ダウンロードリンクを生成
     */
    public function generateDevLink(Request $request, Product $product)
    {
        // 有効期限付き署名URLを生成（7日間有効）
        $url = URL::temporarySignedRoute(
            'admin.dev-download',
            now()->addDays(7),
            ['product' => $product->id]
        );

        return response()->json([
            'url' => $url,
            'expires_at' => now()->addDays(7)->format('Y-m-d H:i'),
        ]);
    }
}
