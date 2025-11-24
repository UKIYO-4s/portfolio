<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>請求書管理システム - デモ</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        :root {
            --mocca-orange: #E8A145;
            --mocca-blue: #5B9BD5;
            --mocca-navy: #2C3E50;
            --mocca-sand: #F5E6D3;
            --mocca-sunset: #D4A574;
        }
        body {
            background-color: #f8f9fa;
        }
        .sidebar {
            min-height: 100vh;
            background: linear-gradient(180deg, var(--mocca-navy) 0%, #1a252f 100%);
        }
        .sidebar .logo-container {
            text-align: center;
            padding: 20px 15px;
            border-bottom: 1px solid rgba(255,255,255,0.1);
        }
        .sidebar .logo-container .logo-circle {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--mocca-orange) 0%, var(--mocca-sunset) 100%);
            margin: 0 auto 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 32px;
            font-weight: bold;
            color: white;
        }
        .sidebar a {
            color: #adb5bd;
            text-decoration: none;
            padding: 12px 15px;
            display: block;
            border-left: 3px solid transparent;
            transition: all 0.3s ease;
        }
        .sidebar a:hover, .sidebar a.active {
            color: #fff;
            background-color: rgba(232, 161, 69, 0.2);
            border-left-color: var(--mocca-orange);
        }
        .sidebar a i {
            margin-right: 8px;
            color: var(--mocca-orange);
        }
        .main-content {
            padding: 20px;
        }
        .btn-primary {
            background-color: var(--mocca-blue);
            border-color: var(--mocca-blue);
        }
        .btn-primary:hover {
            background-color: #4a8ac4;
            border-color: #4a8ac4;
        }
        .btn-success {
            background-color: #5DAE8B;
            border-color: #5DAE8B;
        }
        .btn-success:hover {
            background-color: #4c9d7a;
            border-color: #4c9d7a;
        }
        .btn-warning {
            background-color: var(--mocca-orange);
            border-color: var(--mocca-orange);
            color: #fff;
        }
        .btn-warning:hover {
            background-color: #d4912d;
            border-color: #d4912d;
            color: #fff;
        }
        .card {
            border: none;
            box-shadow: 0 2px 10px rgba(0,0,0,0.08);
            border-radius: 10px;
        }
        .card-header {
            background-color: var(--mocca-sand);
            border-bottom: 2px solid var(--mocca-orange);
            font-weight: 600;
        }
        .table thead th {
            background-color: var(--mocca-navy);
            color: #fff;
            border: none;
        }
        .badge.bg-primary {
            background-color: var(--mocca-blue) !important;
        }
        .badge.bg-success {
            background-color: #5DAE8B !important;
        }
        .badge.bg-warning {
            background-color: var(--mocca-orange) !important;
        }
        .badge.bg-secondary {
            background-color: #95a5a6 !important;
        }
        .alert-success {
            background-color: #d4edda;
            border-color: #5DAE8B;
            color: #155724;
        }
        .progress-bar.bg-success {
            background-color: var(--mocca-blue) !important;
        }
        h2, h3, h4, h5 {
            color: var(--mocca-navy);
        }
        .bg-primary {
            background-color: var(--mocca-blue) !important;
        }
        .bg-success {
            background-color: #5DAE8B !important;
        }
        .bg-warning {
            background-color: var(--mocca-orange) !important;
        }
        .back-to-projects {
            position: fixed;
            bottom: 20px;
            right: 20px;
            z-index: 1000;
        }
        .demo-notice {
            background-color: #fff3cd;
            border: 1px solid #ffc107;
            color: #856404;
            padding: 8px 12px;
            border-radius: 5px;
            margin-bottom: 20px;
            font-size: 14px;
        }
    </style>
    @stack('styles')
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <nav class="col-md-2 d-none d-md-block sidebar">
                <div class="position-sticky pt-3">
                    <div class="logo-container">
                        <div class="logo-circle">M</div>
                        <h6 class="text-white mb-0">請求書管理</h6>
                        <small class="text-muted">Demo Version</small>
                    </div>
                    <ul class="nav flex-column mt-3">
                        <li class="nav-item">
                            <a href="{{ route('demo.invoice.dashboard') }}" class="{{ request()->routeIs('demo.invoice.dashboard') ? 'active' : '' }}">
                                <i class="bi bi-speedometer2"></i> ダッシュボード
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('demo.invoice.invoices.index') }}" class="{{ request()->routeIs('demo.invoice.invoices.*') ? 'active' : '' }}">
                                <i class="bi bi-file-text"></i> 書類一覧
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('demo.invoice.quotes.create') }}" class="">
                                <i class="bi bi-plus-circle"></i> 見積書作成
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('demo.invoice.invoices.create') }}" class="">
                                <i class="bi bi-plus-circle"></i> 請求書作成
                            </a>
                        </li>
                        <li class="nav-item mt-3">
                            <a href="{{ route('demo.invoice.customers.index') }}" class="{{ request()->routeIs('demo.invoice.customers.*') ? 'active' : '' }}">
                                <i class="bi bi-people"></i> 取引先管理
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('demo.invoice.items.index') }}" class="{{ request()->routeIs('demo.invoice.items.*') ? 'active' : '' }}">
                                <i class="bi bi-box"></i> 品目マスタ
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('demo.invoice.settings') }}" class="{{ request()->routeIs('demo.invoice.settings') ? 'active' : '' }}">
                                <i class="bi bi-gear"></i> 設定
                            </a>
                        </li>
                        <li class="nav-item mt-4 pt-3" style="border-top: 1px solid rgba(255,255,255,0.1);">
                            <a href="#" onclick="alert('この機能はデモです'); return false;" style="color: #ff6b6b;">
                                <i class="bi bi-box-arrow-right"></i> ログアウト
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>

            <main class="col-md-10 ms-sm-auto main-content">
                <div class="demo-notice">
                    <i class="bi bi-info-circle"></i> <strong>デモモード:</strong> これはデモ用のモックアップです。実際のデータは保存されません。
                </div>

                @yield('content')

                <div class="mt-5 pt-4" style="border-top: 1px solid #dee2e6;">
                    <a href="{{ route('projects.index') }}" class="btn btn-outline-secondary">
                        <i class="bi bi-arrow-left"></i> プロジェクト一覧に戻る
                    </a>
                </div>
            </main>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')
</body>
</html>
