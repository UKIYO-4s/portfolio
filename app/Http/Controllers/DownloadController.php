<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DownloadController extends Controller
{
    public function download(Request $request, Order $order, Product $product)
    {
        // Verify the order is paid
        if ($order->payment_status !== 'paid') {
            abort(403, 'This order has not been paid.');
        }

        // Verify the product is in the order
        $orderItem = $order->items()->where('product_id', $product->id)->first();
        if (!$orderItem) {
            abort(404, 'Product not found in this order.');
        }

        // Verify the product has a file
        if (!$product->file_path || !Storage::disk('public')->exists($product->file_path)) {
            abort(404, 'Product file not found.');
        }

        // Increment download count
        $product->increment('downloads');

        // Return the file for download
        return Storage::disk('public')->download(
            $product->file_path,
            $product->file_name
        );
    }
}
