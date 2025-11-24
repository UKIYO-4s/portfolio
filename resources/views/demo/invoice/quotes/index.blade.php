@extends('demo.invoice.layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>見積書一覧</h2>
    <div class="btn-group">
        <a href="{{ route('demo.invoice.quotes.create') }}" class="btn btn-success">見積書作成</a>
        <a href="{{ route('demo.invoice.invoices.create') }}" class="btn btn-primary">請求書作成</a>
    </div>
</div>

<div class="card mb-4">
    <div class="card-body">
        <form method="GET" class="row g-3">
            <div class="col-md-4">
                <label class="form-label">ステータス</label>
                <select name="status" class="form-select">
                    <option value="">すべて</option>
                    <option value="draft">下書き</option>
                    <option value="issued">発行済</option>
                </select>
            </div>
            <div class="col-md-4">
                <label class="form-label">取引先</label>
                <select name="client_id" class="form-select">
                    <option value="">すべて</option>
                    @foreach($clients as $client)
                        <option value="{{ $client['id'] }}">{{ $client['name'] }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-4 d-flex align-items-end">
                <button type="button" class="btn btn-secondary me-2" onclick="alert('この機能はデモです')">検索</button>
                <button type="button" class="btn btn-outline-secondary" onclick="alert('この機能はデモです')">リセット</button>
            </div>
        </form>
    </div>
</div>

<div class="card">
    <div>
        <table class="table table-hover mb-0">
            <thead>
                <tr>
                    <th>書類番号</th>
                    <th>取引先</th>
                    <th>発行日</th>
                    <th>有効期限</th>
                    <th>金額</th>
                    <th>ステータス</th>
                    <th>操作</th>
                </tr>
            </thead>
            <tbody>
                @foreach($documents as $document)
                    <tr>
                        <td>{{ $document['document_number'] }}</td>
                        <td>{{ $document['client_name'] }}</td>
                        <td>{{ date('Y/m/d', strtotime($document['issue_date'])) }}</td>
                        <td>{{ isset($document['valid_until']) ? date('Y/m/d', strtotime($document['valid_until'])) : '-' }}</td>
                        <td class="text-end">¥{{ number_format($document['total']) }}</td>
                        <td>
                            <span class="badge bg-{{ $document['status_color'] }}">
                                {{ $document['status_name'] }}
                            </span>
                        </td>
                        <td>
                            <div class="btn-group btn-group-sm">
                                <button type="button" class="btn btn-outline-primary" onclick="alert('この機能はデモです')">詳細</button>
                                <button type="button" class="btn btn-outline-secondary" onclick="alert('この機能はデモです')">編集</button>
                                <button type="button" class="btn btn-outline-warning" onclick="alert('この機能はデモです')">請求書化</button>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<div class="mt-3 text-muted text-center">
    全{{ count($documents) }}件の見積書
</div>
@endsection
