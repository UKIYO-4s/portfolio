<?php

namespace App\Http\Controllers\Demo;

use App\Http\Controllers\Controller;

class InvoiceDemoController extends Controller
{
    // Mock data
    private function getMockCustomers()
    {
        return [
            ['id' => 1, 'name' => '株式会社山田商事', 'contact_person' => '山田太郎', 'email' => 'yamada@example.com', 'phone' => '03-1234-5678', 'postal_code' => '100-0001', 'address' => '東京都千代田区千代田1-1-1'],
            ['id' => 2, 'name' => '鈴木工業株式会社', 'contact_person' => '鈴木花子', 'email' => 'suzuki@example.com', 'phone' => '06-9876-5432', 'postal_code' => '530-0001', 'address' => '大阪府大阪市北区梅田2-2-2'],
            ['id' => 3, 'name' => '佐藤物産', 'contact_person' => '佐藤次郎', 'email' => 'sato@example.com', 'phone' => '052-111-2222', 'postal_code' => '460-0008', 'address' => '愛知県名古屋市中区栄3-3-3'],
            ['id' => 4, 'name' => '田中デザイン事務所', 'contact_person' => '田中美咲', 'email' => 'tanaka@example.com', 'phone' => '092-333-4444', 'postal_code' => '810-0001', 'address' => '福岡県福岡市中央区天神4-4-4'],
            ['id' => 5, 'name' => '高橋コンサルティング', 'contact_person' => '高橋健一', 'email' => 'takahashi@example.com', 'phone' => '011-555-6666', 'postal_code' => '060-0002', 'address' => '北海道札幌市中央区北2条西5-5-5'],
        ];
    }

    private function getMockItems()
    {
        return [
            ['id' => 1, 'name' => 'Webサイト制作', 'description' => 'コーポレートサイト制作', 'unit_price' => 300000, 'tax_rate' => 10, 'unit' => '式'],
            ['id' => 2, 'name' => 'ロゴデザイン', 'description' => 'CI/VI設計含む', 'unit_price' => 80000, 'tax_rate' => 10, 'unit' => '式'],
            ['id' => 3, 'name' => 'SEO対策', 'description' => '月額コンサルティング', 'unit_price' => 50000, 'tax_rate' => 10, 'unit' => 'ヶ月'],
            ['id' => 4, 'name' => 'システム開発', 'description' => '基本機能実装', 'unit_price' => 500000, 'tax_rate' => 10, 'unit' => '式'],
            ['id' => 5, 'name' => '保守・運用', 'description' => '月次保守', 'unit_price' => 30000, 'tax_rate' => 10, 'unit' => 'ヶ月'],
            ['id' => 6, 'name' => '写真撮影', 'description' => '商品撮影・編集', 'unit_price' => 50000, 'tax_rate' => 10, 'unit' => '日'],
            ['id' => 7, 'name' => 'バナー制作', 'description' => 'Web広告用', 'unit_price' => 10000, 'tax_rate' => 10, 'unit' => '枚'],
            ['id' => 8, 'name' => 'コンサルティング', 'description' => '経営戦略支援', 'unit_price' => 100000, 'tax_rate' => 10, 'unit' => '時間'],
            ['id' => 9, 'name' => '動画編集', 'description' => 'プロモーション動画', 'unit_price' => 150000, 'tax_rate' => 10, 'unit' => '本'],
            ['id' => 10, 'name' => 'SNS運用代行', 'description' => '投稿・分析', 'unit_price' => 40000, 'tax_rate' => 10, 'unit' => 'ヶ月'],
        ];
    }

    private function getMockInvoices()
    {
        return [
            ['id' => 1, 'document_number' => 'INV-2025-001', 'type' => 'invoice', 'type_name' => '請求書', 'client_id' => 1, 'client_name' => '株式会社山田商事', 'issue_date' => '2025-01-15', 'due_date' => '2025-02-15', 'subtotal' => 300000, 'tax' => 30000, 'total' => 330000, 'status' => 'pending_payment', 'status_name' => '入金待ち', 'status_color' => 'warning'],
            ['id' => 2, 'document_number' => 'INV-2025-002', 'type' => 'invoice', 'type_name' => '請求書', 'client_id' => 2, 'client_name' => '鈴木工業株式会社', 'issue_date' => '2025-01-20', 'due_date' => '2025-02-20', 'subtotal' => 500000, 'tax' => 50000, 'total' => 550000, 'status' => 'paid', 'status_name' => '入金済', 'status_color' => 'success'],
            ['id' => 3, 'document_number' => 'INV-2025-003', 'type' => 'invoice', 'type_name' => '請求書', 'client_id' => 3, 'client_name' => '佐藤物産', 'issue_date' => '2025-01-25', 'due_date' => '2025-02-25', 'subtotal' => 80000, 'tax' => 8000, 'total' => 88000, 'status' => 'issued', 'status_name' => '発行済', 'status_color' => 'primary'],
            ['id' => 4, 'document_number' => 'INV-2025-004', 'type' => 'invoice', 'type_name' => '請求書', 'client_id' => 4, 'client_name' => '田中デザイン事務所', 'issue_date' => '2025-02-01', 'due_date' => '2025-03-01', 'subtotal' => 150000, 'tax' => 15000, 'total' => 165000, 'status' => 'pending_payment', 'status_name' => '入金待ち', 'status_color' => 'warning'],
            ['id' => 5, 'document_number' => 'INV-2025-005', 'type' => 'invoice', 'type_name' => '請求書', 'client_id' => 5, 'client_name' => '高橋コンサルティング', 'issue_date' => '2025-02-05', 'due_date' => '2025-03-05', 'subtotal' => 200000, 'tax' => 20000, 'total' => 220000, 'status' => 'draft', 'status_name' => '下書き', 'status_color' => 'secondary'],
        ];
    }

    private function getMockQuotes()
    {
        return [
            ['id' => 1, 'document_number' => 'QUO-2025-001', 'type' => 'quotation', 'type_name' => '見積書', 'client_id' => 1, 'client_name' => '株式会社山田商事', 'issue_date' => '2025-01-10', 'valid_until' => '2025-02-10', 'subtotal' => 450000, 'tax' => 45000, 'total' => 495000, 'status' => 'issued', 'status_name' => '発行済', 'status_color' => 'primary'],
            ['id' => 2, 'document_number' => 'QUO-2025-002', 'type' => 'quotation', 'type_name' => '見積書', 'client_id' => 3, 'client_name' => '佐藤物産', 'issue_date' => '2025-01-18', 'valid_until' => '2025-02-18', 'subtotal' => 120000, 'tax' => 12000, 'total' => 132000, 'status' => 'draft', 'status_name' => '下書き', 'status_color' => 'secondary'],
            ['id' => 3, 'document_number' => 'QUO-2025-003', 'type' => 'quotation', 'type_name' => '見積書', 'client_id' => 4, 'client_name' => '田中デザイン事務所', 'issue_date' => '2025-02-03', 'valid_until' => '2025-03-03', 'subtotal' => 380000, 'tax' => 38000, 'total' => 418000, 'status' => 'issued', 'status_name' => '発行済', 'status_color' => 'primary'],
        ];
    }

    private function getCompanyInfo()
    {
        return [
            'name' => 'SD-Create',
            'postal_code' => '890-0055',
            'address' => '鹿児島県鹿児島市上荒田町37-22 林ビル2F',
            'phone' => '099-XXX-XXXX',
            'email' => 'info@sd-create.jp',
            'registration_number' => 'T1234567890123',
            'bank_name' => 'XX銀行',
            'bank_branch' => 'XX支店',
            'bank_account_type' => '普通',
            'bank_account_number' => '1234567',
            'bank_account_name' => 'SD-Create',
        ];
    }

    // Views
    public function login()
    {
        return view('demo.invoice.login');
    }

    public function dashboard()
    {
        $invoices = $this->getMockInvoices();
        $totalPending = array_sum(array_column(array_filter($invoices, fn($inv) => $inv['status'] === 'pending_payment'), 'total'));
        $totalPaid = array_sum(array_column(array_filter($invoices, fn($inv) => $inv['status'] === 'paid'), 'total'));

        return view('demo.invoice.dashboard', [
            'totalPending' => $totalPending,
            'totalPaid' => $totalPaid,
            'recentInvoices' => array_slice($invoices, 0, 5),
        ]);
    }

    public function invoices()
    {
        return view('demo.invoice.invoices.index', [
            'documents' => $this->getMockInvoices(),
            'clients' => $this->getMockCustomers(),
        ]);
    }

    public function invoicesCreate()
    {
        return view('demo.invoice.invoices.create', [
            'type' => 'invoice',
            'clients' => $this->getMockCustomers(),
            'items' => $this->getMockItems(),
            'company' => $this->getCompanyInfo(),
        ]);
    }

    public function invoicesShow($id)
    {
        $invoices = $this->getMockInvoices();
        $invoice = collect($invoices)->firstWhere('id', (int)$id);

        if (!$invoice) {
            abort(404);
        }

        $customers = $this->getMockCustomers();
        $customer = collect($customers)->firstWhere('id', $invoice['client_id']);

        return view('demo.invoice.invoices.show', [
            'document' => $invoice,
            'customer' => $customer,
            'company' => $this->getCompanyInfo(),
            'items' => [
                ['name' => 'Webサイト制作', 'description' => 'コーポレートサイト', 'quantity' => 1, 'unit' => '式', 'unit_price' => 300000, 'tax_rate' => 10, 'total' => 330000],
            ],
        ]);
    }

    public function quotes()
    {
        return view('demo.invoice.quotes.index', [
            'documents' => $this->getMockQuotes(),
            'clients' => $this->getMockCustomers(),
        ]);
    }

    public function quotesCreate()
    {
        return view('demo.invoice.quotes.create', [
            'type' => 'quotation',
            'clients' => $this->getMockCustomers(),
            'items' => $this->getMockItems(),
            'company' => $this->getCompanyInfo(),
        ]);
    }

    public function customers()
    {
        return view('demo.invoice.customers.index', [
            'clients' => $this->getMockCustomers(),
        ]);
    }

    public function customersCreate()
    {
        return view('demo.invoice.customers.create');
    }

    public function items()
    {
        return view('demo.invoice.items.index', [
            'items' => $this->getMockItems(),
        ]);
    }

    public function settings()
    {
        return view('demo.invoice.settings', [
            'company' => $this->getCompanyInfo(),
        ]);
    }
}
