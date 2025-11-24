@extends('demo.invoice.layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>設定</h2>
</div>

<div class="row">
    <div class="col-lg-8 mx-auto">
        <form onsubmit="alert('この機能はデモです。実際のデータは保存されません。'); return false;">
            <div class="card mb-4">
                <div class="card-header">会社情報</div>
                <div class="card-body">
                    <div class="mb-3">
                        <label class="form-label">会社名 <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" value="{{ $company['name'] }}" required>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">郵便番号</label>
                                <input type="text" class="form-control" value="{{ $company['postal_code'] }}">
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">住所</label>
                        <input type="text" class="form-control" value="{{ $company['address'] }}">
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">電話番号</label>
                                <input type="tel" class="form-control" value="{{ $company['phone'] }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">メールアドレス</label>
                                <input type="email" class="form-control" value="{{ $company['email'] }}">
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">適格請求書発行事業者登録番号</label>
                        <input type="text" class="form-control" value="{{ $company['registration_number'] }}" placeholder="T1234567890123">
                        <small class="text-muted">インボイス制度対応</small>
                    </div>
                </div>
            </div>

            <div class="card mb-4">
                <div class="card-header">振込先情報</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">金融機関名</label>
                                <input type="text" class="form-control" value="{{ $company['bank_name'] }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">支店名</label>
                                <input type="text" class="form-control" value="{{ $company['bank_branch'] }}">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">預金種別</label>
                                <select class="form-select">
                                    <option value="普通" {{ $company['bank_account_type'] == '普通' ? 'selected' : '' }}>普通</option>
                                    <option value="当座" {{ $company['bank_account_type'] == '当座' ? 'selected' : '' }}>当座</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">口座番号</label>
                                <input type="text" class="form-control" value="{{ $company['bank_account_number'] }}">
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">口座名義</label>
                        <input type="text" class="form-control" value="{{ $company['bank_account_name'] }}">
                    </div>
                </div>
            </div>

            <div class="card mb-4">
                <div class="card-header">書類設定</div>
                <div class="card-body">
                    <div class="mb-3">
                        <label class="form-label">請求書番号のプレフィックス</label>
                        <input type="text" class="form-control" value="INV-" placeholder="INV-">
                        <small class="text-muted">例: INV-2025-001</small>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">見積書番号のプレフィックス</label>
                        <input type="text" class="form-control" value="QUO-" placeholder="QUO-">
                        <small class="text-muted">例: QUO-2025-001</small>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">デフォルト支払期限</label>
                        <select class="form-select">
                            <option value="15">発行日から15日後</option>
                            <option value="30" selected>発行日から30日後</option>
                            <option value="45">発行日から45日後</option>
                            <option value="60">発行日から60日後</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">デフォルト見積有効期限</label>
                        <select class="form-select">
                            <option value="15">発行日から15日後</option>
                            <option value="30" selected>発行日から30日後</option>
                            <option value="45">発行日から45日後</option>
                            <option value="60">発行日から60日後</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="card mb-4">
                <div class="card-header">通知設定</div>
                <div class="card-body">
                    <div class="form-check mb-3">
                        <input class="form-check-input" type="checkbox" id="emailNotif" checked>
                        <label class="form-check-label" for="emailNotif">
                            請求書発行時にメール通知を受け取る
                        </label>
                    </div>

                    <div class="form-check mb-3">
                        <input class="form-check-input" type="checkbox" id="paymentReminder" checked>
                        <label class="form-check-label" for="paymentReminder">
                            支払期限リマインダーを有効にする
                        </label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="autoBackup">
                        <label class="form-check-label" for="autoBackup">
                            自動バックアップを有効にする
                        </label>
                    </div>
                </div>
            </div>

            <div class="text-end">
                <button type="submit" class="btn btn-primary btn-lg">保存する</button>
            </div>
        </form>
    </div>
</div>
@endsection
