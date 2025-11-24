@extends('demo.invoice.layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>取引先一覧</h2>
    <a href="{{ route('demo.invoice.customers.create') }}" class="btn btn-primary">新規登録</a>
</div>

<div class="card">
    <div class="table-responsive">
        <table class="table table-hover mb-0">
            <thead>
                <tr>
                    <th>会社名</th>
                    <th>担当者</th>
                    <th>メールアドレス</th>
                    <th>電話番号</th>
                    <th>操作</th>
                </tr>
            </thead>
            <tbody>
                @foreach($clients as $client)
                    <tr>
                        <td>{{ $client['name'] }}</td>
                        <td>{{ $client['contact_person'] }}</td>
                        <td>{{ $client['email'] }}</td>
                        <td>{{ $client['phone'] }}</td>
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
    全{{ count($clients) }}件の取引先
</div>
@endsection
