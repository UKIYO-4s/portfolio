@extends('demo.invoice.layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>ダッシュボード</h2>
    <div class="btn-group">
        <a href="{{ route('demo.invoice.invoices.create') }}" class="btn btn-primary">請求書作成</a>
        <a href="{{ route('demo.invoice.quotes.create') }}" class="btn btn-success">見積書作成</a>
    </div>
</div>

<div class="row mb-4">
    <div class="col-md-3">
        <div class="card text-center">
            <div class="card-body">
                <h6 class="text-muted mb-2">入金待ち</h6>
                <h3 class="mb-0 text-warning">¥{{ number_format($totalPending) }}</h3>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card text-center">
            <div class="card-body">
                <h6 class="text-muted mb-2">入金済み</h6>
                <h3 class="mb-0 text-success">¥{{ number_format($totalPaid) }}</h3>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card text-center">
            <div class="card-body">
                <h6 class="text-muted mb-2">今月の請求書</h6>
                <h3 class="mb-0">{{ count($recentInvoices) }}</h3>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card text-center">
            <div class="card-body">
                <h6 class="text-muted mb-2">合計売上</h6>
                <h3 class="mb-0 text-primary">¥{{ number_format($totalPending + $totalPaid) }}</h3>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <span>最近の請求書</span>
                <a href="{{ route('demo.invoice.invoices.index') }}" class="btn btn-sm btn-outline-primary">すべて表示</a>
            </div>
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead>
                        <tr>
                            <th>書類番号</th>
                            <th>取引先</th>
                            <th>発行日</th>
                            <th>金額</th>
                            <th>ステータス</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($recentInvoices as $invoice)
                            <tr>
                                <td>
                                    <a href="{{ route('demo.invoice.invoices.show', $invoice['id']) }}" class="text-decoration-none">
                                        {{ $invoice['document_number'] }}
                                    </a>
                                </td>
                                <td>{{ $invoice['client_name'] }}</td>
                                <td>{{ date('Y/m/d', strtotime($invoice['issue_date'])) }}</td>
                                <td class="text-end">¥{{ number_format($invoice['total']) }}</td>
                                <td>
                                    <span class="badge bg-{{ $invoice['status_color'] }}">
                                        {{ $invoice['status_name'] }}
                                    </span>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card mb-3">
            <div class="card-header">クイックアクション</div>
            <div class="card-body">
                <div class="d-grid gap-2">
                    <a href="{{ route('demo.invoice.invoices.create') }}" class="btn btn-primary">
                        <i class="bi bi-file-text"></i> 請求書作成
                    </a>
                    <a href="{{ route('demo.invoice.quotes.create') }}" class="btn btn-success">
                        <i class="bi bi-file-earmark-text"></i> 見積書作成
                    </a>
                    <a href="{{ route('demo.invoice.customers.create') }}" class="btn btn-secondary">
                        <i class="bi bi-person-plus"></i> 取引先登録
                    </a>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header">ステータス別内訳</div>
            <div class="card-body">
                <div class="mb-3">
                    <div class="d-flex justify-content-between mb-1">
                        <span class="small">入金待ち</span>
                        <span class="small text-warning fw-bold">2件</span>
                    </div>
                    <div class="progress" style="height: 10px;">
                        <div class="progress-bar bg-warning" style="width: 40%"></div>
                    </div>
                </div>
                <div class="mb-3">
                    <div class="d-flex justify-content-between mb-1">
                        <span class="small">入金済</span>
                        <span class="small text-success fw-bold">1件</span>
                    </div>
                    <div class="progress" style="height: 10px;">
                        <div class="progress-bar bg-success" style="width: 20%"></div>
                    </div>
                </div>
                <div class="mb-3">
                    <div class="d-flex justify-content-between mb-1">
                        <span class="small">発行済</span>
                        <span class="small text-primary fw-bold">1件</span>
                    </div>
                    <div class="progress" style="height: 10px;">
                        <div class="progress-bar" style="width: 20%"></div>
                    </div>
                </div>
                <div>
                    <div class="d-flex justify-content-between mb-1">
                        <span class="small">下書き</span>
                        <span class="small text-secondary fw-bold">1件</span>
                    </div>
                    <div class="progress" style="height: 10px;">
                        <div class="progress-bar bg-secondary" style="width: 20%"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
