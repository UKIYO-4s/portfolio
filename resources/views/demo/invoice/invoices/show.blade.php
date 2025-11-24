@extends('demo.invoice.layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>{{ $document['type_name'] }} - {{ $document['document_number'] }}</h2>
    <div class="btn-group">
        <button class="btn btn-secondary" onclick="alert('この機能はデモです')">編集</button>
        <div class="btn-group">
            <button type="button" class="btn btn-success dropdown-toggle" data-bs-toggle="dropdown">
                PDF出力
            </button>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#" onclick="alert('この機能はデモです'); return false;">Web用 (72dpi - 軽量)</a></li>
                <li><a class="dropdown-item" href="#" onclick="alert('この機能はデモです'); return false;">印刷用 (300dpi - 高品質)</a></li>
            </ul>
        </div>
        <button class="btn btn-warning" onclick="alert('この機能はデモです')">領収書に変換</button>
        <a href="{{ route('demo.invoice.invoices.index') }}" class="btn btn-outline-secondary">一覧へ</a>
    </div>
</div>

<div class="row">
    <div class="col-md-8">
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between">
                <span>書類詳細</span>
                <span class="badge bg-{{ $document['status_color'] }}">{{ $document['status_name'] }}</span>
            </div>
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-md-6">
                        <strong>取引先:</strong><br>
                        {{ $customer['name'] }}<br>
                        @if($customer['postal_code'])
                            〒{{ $customer['postal_code'] }}<br>
                        @endif
                        {{ $customer['address'] }}
                    </div>
                    <div class="col-md-6 text-end">
                        <strong>書類番号:</strong> {{ $document['document_number'] }}<br>
                        <strong>発行日:</strong> {{ date('Y年m月d日', strtotime($document['issue_date'])) }}<br>
                        @if(isset($document['due_date']))
                            <strong>支払期限:</strong> {{ date('Y年m月d日', strtotime($document['due_date'])) }}
                        @endif
                    </div>
                </div>

                <table class="table">
                    <thead>
                        <tr>
                            <th>品名</th>
                            <th class="text-center">数量</th>
                            <th class="text-center">単位</th>
                            <th class="text-end">単価</th>
                            <th class="text-center">税率</th>
                            <th class="text-end">金額</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($items as $item)
                            <tr>
                                <td>
                                    {{ $item['name'] }}
                                    @if(isset($item['description']) && $item['description'])
                                        <br><small class="text-muted">{{ $item['description'] }}</small>
                                    @endif
                                </td>
                                <td class="text-center">{{ number_format($item['quantity'], 2) }}</td>
                                <td class="text-center">{{ $item['unit'] }}</td>
                                <td class="text-end">¥{{ number_format($item['unit_price']) }}</td>
                                <td class="text-center">{{ $item['tax_rate'] }}%</td>
                                <td class="text-end">¥{{ number_format($item['total']) }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="5" class="text-end"><strong>小計</strong></td>
                            <td class="text-end">¥{{ number_format($document['subtotal']) }}</td>
                        </tr>
                        <tr>
                            <td colspan="5" class="text-end"><strong>消費税</strong></td>
                            <td class="text-end">¥{{ number_format($document['tax']) }}</td>
                        </tr>
                        <tr>
                            <td colspan="5" class="text-end"><strong>合計</strong></td>
                            <td class="text-end"><strong>¥{{ number_format($document['total']) }}</strong></td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card mb-4">
            <div class="card-header">ステータス更新</div>
            <div class="card-body">
                <form onsubmit="alert('この機能はデモです'); return false;">
                    <div class="mb-3">
                        <select class="form-select">
                            <option value="draft" {{ $document['status'] == 'draft' ? 'selected' : '' }}>下書き</option>
                            <option value="issued" {{ $document['status'] == 'issued' ? 'selected' : '' }}>発行済</option>
                            <option value="pending_payment" {{ $document['status'] == 'pending_payment' ? 'selected' : '' }}>入金待ち</option>
                            <option value="paid" {{ $document['status'] == 'paid' ? 'selected' : '' }}>入金済</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">更新</button>
                </form>
            </div>
        </div>

        <div class="card mb-4">
            <div class="card-header">発行元</div>
            <div class="card-body">
                <strong>{{ $company['name'] }}</strong><br>
                @if($company['postal_code'])
                    〒{{ $company['postal_code'] }}<br>
                @endif
                {{ $company['address'] }}<br>
                @if($company['phone'])
                    TEL: {{ $company['phone'] }}<br>
                @endif
                @if($company['email'])
                    Email: {{ $company['email'] }}
                @endif
            </div>
        </div>

        <div class="card">
            <div class="card-header">アクション</div>
            <div class="card-body">
                <div class="d-grid gap-2">
                    <button class="btn btn-outline-primary" onclick="alert('この機能はデモです')">
                        <i class="bi bi-printer"></i> 印刷
                    </button>
                    <button class="btn btn-outline-info" onclick="alert('この機能はデモです')">
                        <i class="bi bi-envelope"></i> メール送信
                    </button>
                    <button class="btn btn-outline-danger" onclick="alert('この機能はデモです')">
                        <i class="bi bi-trash"></i> 削除
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
