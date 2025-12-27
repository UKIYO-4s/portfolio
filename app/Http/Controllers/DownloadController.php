<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;
use Symfony\Component\Yaml\Yaml;

class DownloadController extends Controller
{
    /**
     * ダウンロードファイルのベースパス
     */
    private const DOWNLOAD_BASE_PATH = '/Users/shoeigoto/Desktop/clip-composer/dist';

    /**
     * ダウンロード有効期限（日数）
     */
    private const DOWNLOAD_EXPIRES_DAYS = 30;

    /**
     * ダウンロードページを表示（署名付きURL）
     */
    public function index(Request $request, Order $order, Product $product)
    {
        // Verify the order is paid
        if ($order->payment_status !== 'paid') {
            abort(403, 'この注文はまだお支払いが完了していません。');
        }

        // Verify the product is in the order
        $orderItem = $order->items()->where('product_id', $product->id)->first();
        if (!$orderItem) {
            abort(404, 'この商品は注文に含まれていません。');
        }

        // バージョン情報を取得
        $versionInfo = $this->getVersionInfo();

        // 有効期限を計算
        $expiresAt = $order->payment_confirmed_at
            ? $order->payment_confirmed_at->addDays(self::DOWNLOAD_EXPIRES_DAYS)
            : $order->created_at->addDays(self::DOWNLOAD_EXPIRES_DAYS);

        return view('download.index', compact('order', 'product', 'versionInfo', 'expiresAt'));
    }

    /**
     * 署名付きダウンロードURLを生成
     */
    public static function generateSignedDownloadUrl(Order $order, Product $product): string
    {
        $expiresAt = $order->payment_confirmed_at
            ? $order->payment_confirmed_at->addDays(self::DOWNLOAD_EXPIRES_DAYS)
            : $order->created_at->addDays(self::DOWNLOAD_EXPIRES_DAYS);

        return URL::temporarySignedRoute(
            'download.signed',
            $expiresAt,
            ['order' => $order->id, 'product' => $product->id]
        );
    }

    /**
     * latest-mac.ymlからバージョン情報を取得
     */
    public function getVersionInfo(): array
    {
        $ymlPath = self::DOWNLOAD_BASE_PATH . '/latest-mac.yml';

        if (!file_exists($ymlPath)) {
            return [
                'version' => 'Unknown',
                'releaseDate' => null,
                'files' => [],
            ];
        }

        $content = file_get_contents($ymlPath);
        $data = Yaml::parse($content);

        $files = [];
        foreach ($data['files'] ?? [] as $file) {
            $type = str_contains($file['url'], 'arm64') ? 'arm64' : 'x64';
            $files[$type] = [
                'filename' => $file['url'],
                'size' => $file['size'],
                'sha512' => $file['sha512'],
            ];
        }

        return [
            'version' => $data['version'] ?? 'Unknown',
            'releaseDate' => isset($data['releaseDate']) ? new \DateTime($data['releaseDate']) : null,
            'files' => $files,
        ];
    }

    /**
     * ファイルをダウンロード（署名付きURL経由）
     */
    public function downloadFile(Request $request, Order $order, Product $product, string $type)
    {
        // 署名はミドルウェアで検証済み

        // Verify the order is paid
        if ($order->payment_status !== 'paid') {
            abort(403, 'この注文はまだお支払いが完了していません。');
        }

        // Verify the product is in the order
        $orderItem = $order->items()->where('product_id', $product->id)->first();
        if (!$orderItem) {
            abort(404, 'この商品は注文に含まれていません。');
        }

        // Validate type
        if (!in_array($type, ['arm64', 'x64'])) {
            abort(400, '無効なダウンロードタイプです。');
        }

        // Get file info from version info
        $versionInfo = $this->getVersionInfo();
        $fileInfo = $versionInfo['files'][$type] ?? null;

        if (!$fileInfo) {
            abort(404, 'ダウンロードファイルが見つかりません。');
        }

        // ファイル名の変換（URLエンコードされたファイル名 → 実際のファイル名）
        $fileName = urldecode($fileInfo['filename']);
        // ハイフンをスペースに戻す（Clip-Composer → Clip Composer）
        $actualFileName = str_replace('Clip-Composer', 'Clip Composer', $fileName);
        $filePath = self::DOWNLOAD_BASE_PATH . '/' . $actualFileName;

        if (!file_exists($filePath)) {
            abort(404, 'ファイルが見つかりません: ' . $actualFileName);
        }

        // Increment download count
        $product->increment('downloads');

        // Return the file for download
        return response()->download($filePath, $actualFileName);
    }

    /**
     * 署名付きファイルダウンロードURLを生成
     */
    public static function generateSignedFileUrl(Order $order, Product $product, string $type): string
    {
        $expiresAt = $order->payment_confirmed_at
            ? $order->payment_confirmed_at->addDays(self::DOWNLOAD_EXPIRES_DAYS)
            : $order->created_at->addDays(self::DOWNLOAD_EXPIRES_DAYS);

        return URL::temporarySignedRoute(
            'download.file.signed',
            $expiresAt,
            ['order' => $order->id, 'product' => $product->id, 'type' => $type]
        );
    }

    /**
     * 開発者用ダウンロードページ（署名付きURL）
     */
    public function devDownload(Request $request, Product $product)
    {
        // 署名の検証はミドルウェアで行われる
        $versionInfo = $this->getVersionInfo();

        // typeパラメータがある場合は直接ダウンロード
        $type = $request->query('type');
        if ($type && in_array($type, ['arm64', 'x64'])) {
            $fileInfo = $versionInfo['files'][$type] ?? null;

            if (!$fileInfo) {
                abort(404, 'ダウンロードファイルが見つかりません。');
            }

            $fileName = urldecode($fileInfo['filename']);
            $actualFileName = str_replace('Clip-Composer', 'Clip Composer', $fileName);
            $filePath = self::DOWNLOAD_BASE_PATH . '/' . $actualFileName;

            if (!file_exists($filePath)) {
                abort(404, 'ファイルが見つかりません。');
            }

            return response()->download($filePath, $actualFileName);
        }

        return view('download.dev', compact('product', 'versionInfo'));
    }

    /**
     * 開発者用ファイルダウンロード（署名付きURL）
     */
    public function devDownloadFile(Request $request, Product $product, string $type)
    {
        // Validate type
        if (!in_array($type, ['arm64', 'x64'])) {
            abort(400, '無効なダウンロードタイプです。');
        }

        // Get file info from version info
        $versionInfo = $this->getVersionInfo();
        $fileInfo = $versionInfo['files'][$type] ?? null;

        if (!$fileInfo) {
            abort(404, 'ダウンロードファイルが見つかりません。');
        }

        $fileName = urldecode($fileInfo['filename']);
        $actualFileName = str_replace('Clip-Composer', 'Clip Composer', $fileName);
        $filePath = self::DOWNLOAD_BASE_PATH . '/' . $actualFileName;

        if (!file_exists($filePath)) {
            abort(404, 'ファイルが見つかりません。');
        }

        return response()->download($filePath, $actualFileName);
    }

    /**
     * レガシー: 直接ダウンロード（Storage経由）
     */
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
