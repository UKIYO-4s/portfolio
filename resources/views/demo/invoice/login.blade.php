<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ログイン - 請求書管理システム</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        :root {
            --mocca-orange: #E8A145;
            --mocca-blue: #5B9BD5;
            --mocca-navy: #2C3E50;
            --mocca-sand: #F5E6D3;
        }

        body {
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, var(--mocca-navy) 0%, #34495e 100%);
        }

        .login-container {
            width: 100%;
            max-width: 450px;
            padding: 20px;
        }

        .logo-container {
            text-align: center;
            margin-bottom: 30px;
        }

        .logo-circle {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--mocca-orange) 0%, #D4A574 100%);
            margin: 0 auto 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 48px;
            font-weight: bold;
            color: white;
            box-shadow: 0 10px 30px rgba(0,0,0,0.3);
        }

        .logo-text {
            color: white;
            font-size: 24px;
            font-weight: 600;
            margin-bottom: 5px;
        }

        .logo-subtitle {
            color: rgba(255,255,255,0.7);
            font-size: 14px;
        }

        .login-card {
            background: white;
            border-radius: 15px;
            box-shadow: 0 20px 60px rgba(0,0,0,0.3);
            padding: 40px;
        }

        .login-card h3 {
            color: var(--mocca-navy);
            text-align: center;
            margin-bottom: 30px;
            font-weight: 600;
        }

        .form-control {
            padding: 12px 15px;
            border: 2px solid #e9ecef;
            border-radius: 8px;
            transition: all 0.3s;
        }

        .form-control:focus {
            border-color: var(--mocca-orange);
            box-shadow: 0 0 0 0.2rem rgba(232, 161, 69, 0.25);
        }

        .form-label {
            color: var(--mocca-navy);
            font-weight: 500;
            margin-bottom: 8px;
        }

        .btn-login {
            width: 100%;
            padding: 12px;
            background: linear-gradient(135deg, var(--mocca-blue) 0%, #4a8ac4 100%);
            border: none;
            border-radius: 8px;
            color: white;
            font-weight: 600;
            font-size: 16px;
            transition: all 0.3s;
        }

        .btn-login:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(91, 155, 213, 0.4);
        }

        .demo-notice {
            background-color: #fff3cd;
            border: 1px solid #ffc107;
            border-radius: 8px;
            padding: 15px;
            margin-bottom: 25px;
            text-align: center;
            color: #856404;
        }

        .demo-notice strong {
            display: block;
            margin-bottom: 5px;
        }

        .back-link {
            text-align: center;
            margin-top: 20px;
        }

        .back-link a {
            color: white;
            text-decoration: none;
            font-size: 14px;
            opacity: 0.8;
            transition: opacity 0.3s;
        }

        .back-link a:hover {
            opacity: 1;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="logo-container">
            <div class="logo-circle">M</div>
            <div class="logo-text">Mocca Invoice</div>
            <div class="logo-subtitle">請求書管理システム</div>
        </div>

        <div class="login-card">
            <div class="demo-notice">
                <strong>🎭 デモモード</strong>
                <small>このログイン画面はデモです。「ログイン」ボタンをクリックするとダッシュボードに遷移します。</small>
            </div>

            <h3>ログイン</h3>

            <div class="mb-3">
                <label class="form-label">メールアドレス</label>
                <div class="form-control bg-light" style="color: #6c757d;">demo@sd-create.jp</div>
            </div>

            <div class="mb-4">
                <label class="form-label">パスワード</label>
                <div class="form-control bg-light" style="color: #6c757d;">••••••••</div>
            </div>

            <a href="{{ route('demo.invoice.dashboard') }}" class="btn btn-login d-block text-center text-white text-decoration-none">ログイン</a>
        </div>

        <div class="back-link">
            <a href="{{ route('projects.index') }}">
                ← プロジェクト一覧に戻る
            </a>
        </div>
    </div>
</body>
</html>
