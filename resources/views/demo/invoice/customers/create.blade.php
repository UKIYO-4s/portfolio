@extends('demo.invoice.layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>取引先登録</h2>
    <a href="{{ route('demo.invoice.customers.index') }}" class="btn btn-secondary">戻る</a>
</div>

<div class="row">
    <div class="col-lg-8 mx-auto">
        <form onsubmit="alert('この機能はデモです。実際のデータは保存されません。'); return false;">
            <div class="card mb-4">
                <div class="card-header">基本情報</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">会社名 <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" placeholder="例: 株式会社サンプル" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">担当者名</label>
                                <input type="text" class="form-control" placeholder="例: 山田太郎">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">メールアドレス</label>
                                <input type="email" class="form-control" placeholder="example@company.com">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">電話番号</label>
                                <input type="tel" class="form-control" placeholder="03-1234-5678">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card mb-4">
                <div class="card-header">住所情報</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">郵便番号</label>
                                <input type="text" class="form-control" placeholder="100-0001">
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">住所</label>
                        <input type="text" class="form-control" placeholder="東京都千代田区千代田1-1-1">
                    </div>
                </div>
            </div>

            <div class="card mb-4">
                <div class="card-header">その他</div>
                <div class="card-body">
                    <div class="mb-3">
                        <label class="form-label">備考</label>
                        <textarea class="form-control" rows="3" placeholder="取引先に関する備考"></textarea>
                    </div>
                </div>
            </div>

            <div class="text-end">
                <button type="submit" class="btn btn-primary btn-lg">登録する</button>
            </div>
        </form>
    </div>
</div>
@endsection
