@extends('demo.invoice.layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>品目マスタ</h2>
    <button class="btn btn-primary" onclick="alert('この機能はデモです')">新規登録</button>
</div>

<div class="card">
    <div class="table-responsive">
        <table class="table table-hover mb-0">
            <thead>
                <tr>
                    <th>品名</th>
                    <th>説明</th>
                    <th>単価</th>
                    <th>税率</th>
                    <th>単位</th>
                    <th>操作</th>
                </tr>
            </thead>
            <tbody>
                @foreach($items as $item)
                    <tr>
                        <td>{{ $item['name'] }}</td>
                        <td>{{ Str::limit($item['description'], 50) }}</td>
                        <td class="text-end">¥{{ number_format($item['unit_price']) }}</td>
                        <td class="text-center">{{ $item['tax_rate'] }}%</td>
                        <td>{{ $item['unit'] }}</td>
                        <td>
                            <div class="btn-group btn-group-sm">
                                <button type="button" class="btn btn-outline-secondary" onclick="alert('この機能はデモです')">編集</button>
                                <button type="button" class="btn btn-outline-danger" onclick="alert('この機能はデモです')">削除</button>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<div class="mt-3 text-muted text-center">
    全{{ count($items) }}件の品目
</div>
@endsection
