@extends('demo.invoice.layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>見積書作成</h2>
    <a href="{{ route('demo.invoice.quotes.index') }}" class="btn btn-secondary">戻る</a>
</div>

<div class="row">
    <div class="col-lg-12">
        <form onsubmit="alert('この機能はデモです。実際のデータは保存されません。'); return false;">
            <div class="card mb-4">
                <div class="card-header">基本情報</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">取引先 <span class="text-danger">*</span></label>
                                <select class="form-select" required>
                                    <option value="">選択してください</option>
                                    @foreach($clients as $client)
                                        <option value="{{ $client['id'] }}">{{ $client['name'] }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">発行日 <span class="text-danger">*</span></label>
                                <input type="date" class="form-control" value="{{ date('Y-m-d') }}" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label">件名</label>
                                <input type="text" class="form-control" placeholder="例: Webサイトリニューアル見積">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">有効期限</label>
                                <input type="date" class="form-control" value="{{ date('Y-m-d', strtotime('+30 days')) }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">税計算方式 <span class="text-danger">*</span></label>
                                <select class="form-select" required>
                                    <option value="exclusive">外税（税抜）</option>
                                    <option value="inclusive">内税（税込）</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    品目
                    <button type="button" class="btn btn-sm btn-success" onclick="addItemRow()">
                        <i class="bi bi-plus"></i> 品目追加
                    </button>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label class="form-label">品目マスタから選択</label>
                        <select class="form-select" id="itemMaster" onchange="selectFromMaster()">
                            <option value="">品目を選択...</option>
                            @foreach($items as $item)
                                <option value="{{ $item['id'] }}"
                                        data-name="{{ $item['name'] }}"
                                        data-price="{{ $item['unit_price'] }}"
                                        data-unit="{{ $item['unit'] }}">
                                    {{ $item['name'] }} - ¥{{ number_format($item['unit_price']) }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-sm">
                            <thead>
                                <tr>
                                    <th style="width: 30%">品名</th>
                                    <th style="width: 12%">数量</th>
                                    <th style="width: 10%">単位</th>
                                    <th style="width: 15%">単価</th>
                                    <th style="width: 10%">税率</th>
                                    <th style="width: 15%">小計</th>
                                    <th style="width: 8%"></th>
                                </tr>
                            </thead>
                            <tbody id="itemsBody">
                                <tr>
                                    <td><input type="text" class="form-control form-control-sm" placeholder="品名" value="Webサイト制作"></td>
                                    <td><input type="number" class="form-control form-control-sm" value="1" min="0.01" step="0.01"></td>
                                    <td><input type="text" class="form-control form-control-sm" value="式"></td>
                                    <td><input type="number" class="form-control form-control-sm" value="300000" min="0"></td>
                                    <td>
                                        <select class="form-select form-select-sm">
                                            <option value="10" selected>10%</option>
                                            <option value="8">8%</option>
                                        </select>
                                    </td>
                                    <td class="align-middle">¥330,000</td>
                                    <td>
                                        <button type="button" class="btn btn-sm btn-danger" onclick="this.closest('tr').remove()">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="5" class="text-end"><strong>小計</strong></td>
                                    <td><strong>¥300,000</strong></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td colspan="5" class="text-end"><strong>消費税</strong></td>
                                    <td><strong>¥30,000</strong></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td colspan="5" class="text-end"><strong>見積金額</strong></td>
                                    <td><strong>¥330,000</strong></td>
                                    <td></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>

            <div class="card mb-4">
                <div class="card-header">備考</div>
                <div class="card-body">
                    <textarea class="form-control" rows="3" placeholder="備考を入力してください">上記の通り、お見積もり申し上げます。
ご検討の程、よろしくお願いいたします。</textarea>
                </div>
            </div>

            <div class="text-end">
                <button type="submit" class="btn btn-success btn-lg">作成する</button>
            </div>
        </form>
    </div>
</div>
@endsection

@push('scripts')
<script>
function addItemRow() {
    const tbody = document.getElementById('itemsBody');
    const row = `
        <tr>
            <td><input type="text" class="form-control form-control-sm" placeholder="品名"></td>
            <td><input type="number" class="form-control form-control-sm" value="1" min="0.01" step="0.01"></td>
            <td><input type="text" class="form-control form-control-sm"></td>
            <td><input type="number" class="form-control form-control-sm" value="0" min="0"></td>
            <td>
                <select class="form-select form-select-sm">
                    <option value="10" selected>10%</option>
                    <option value="8">8%</option>
                </select>
            </td>
            <td class="align-middle">¥0</td>
            <td>
                <button type="button" class="btn btn-sm btn-danger" onclick="this.closest('tr').remove()">
                    <i class="bi bi-trash"></i>
                </button>
            </td>
        </tr>
    `;
    tbody.insertAdjacentHTML('beforeend', row);
}

function selectFromMaster() {
    const select = document.getElementById('itemMaster');
    const option = select.options[select.selectedIndex];

    if (option.value) {
        const tbody = document.getElementById('itemsBody');
        const row = `
            <tr>
                <td><input type="text" class="form-control form-control-sm" value="${option.dataset.name}"></td>
                <td><input type="number" class="form-control form-control-sm" value="1" min="0.01" step="0.01"></td>
                <td><input type="text" class="form-control form-control-sm" value="${option.dataset.unit}"></td>
                <td><input type="number" class="form-control form-control-sm" value="${option.dataset.price}" min="0"></td>
                <td>
                    <select class="form-select form-select-sm">
                        <option value="10" selected>10%</option>
                        <option value="8">8%</option>
                    </select>
                </td>
                <td class="align-middle">¥${parseInt(option.dataset.price * 1.1).toLocaleString()}</td>
                <td>
                    <button type="button" class="btn btn-sm btn-danger" onclick="this.closest('tr').remove()">
                        <i class="bi bi-trash"></i>
                    </button>
                </td>
            </tr>
        `;
        tbody.insertAdjacentHTML('beforeend', row);
        select.selectedIndex = 0;
    }
}
</script>
@endpush
