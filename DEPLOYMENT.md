# KonohaVPSへのデプロイ手順書

## プロジェクト概要
Laravel 12ベースのコーポレートサイト + ECサイト
- プロジェクトポートフォリオ機能
- フォトギャラリー機能
- ECショップ機能（Stripe決済）
- 管理画面

## 必要な環境

### サーバー要件
- PHP 8.2以上
- PostgreSQL
- Composer
- Node.js/npm
- Nginx または Apache
- Git

### PHP拡張モジュール
```bash
php -m | grep -E 'pdo_pgsql|gd|mbstring|xml|bcmath|fileinfo|zip'
```

必要なモジュール:
- pdo_pgsql
- gd (画像処理用)
- mbstring
- xml
- bcmath
- fileinfo
- zip

## デプロイ手順

### 1. サーバー準備

#### 1-1. 必要なパッケージのインストール確認
```bash
# PHP バージョン確認
php -v

# Composer 確認
composer --version

# Node.js/npm 確認
node -v
npm -v

# PostgreSQL 確認
psql --version
```

#### 1-2. データベース作成
```bash
# PostgreSQLに接続
sudo -u postgres psql

# データベースとユーザー作成
CREATE DATABASE corporate_site;
CREATE USER corporate_user WITH PASSWORD 'your_secure_password';
GRANT ALL PRIVILEGES ON DATABASE corporate_site TO corporate_user;

# PostgreSQL 15以降の場合
\c corporate_site
GRANT ALL ON SCHEMA public TO corporate_user;

\q
```

### 2. プロジェクトのデプロイ

#### 2-1. Gitリポジトリからクローン
```bash
cd /var/www
sudo git clone YOUR_REPOSITORY_URL corporate-site
sudo chown -R $USER:www-data corporate-site
cd corporate-site
```

#### 2-2. 環境変数の設定
```bash
cp .env.example .env
nano .env
```

必須設定項目:
```env
APP_NAME="Your Corporate Site"
APP_ENV=production
APP_KEY=                           # 後で生成
APP_DEBUG=false
APP_URL=https://yourdomain.com

DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=corporate_site
DB_USERNAME=corporate_user
DB_PASSWORD=your_secure_password

# Stripe本番キー
STRIPE_KEY=pk_live_your_live_key
STRIPE_SECRET=sk_live_your_live_key

# メール設定（本番環境用）
MAIL_MAILER=smtp
MAIL_HOST=your-smtp-server
MAIL_PORT=587
MAIL_USERNAME=your-email@example.com
MAIL_PASSWORD=your-email-password
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS="noreply@yourdomain.com"
MAIL_FROM_NAME="${APP_NAME}"

# キャッシュ・セッション設定
CACHE_STORE=database
SESSION_DRIVER=database
QUEUE_CONNECTION=database
```

#### 2-3. 依存関係のインストール
```bash
# Composer パッケージ
composer install --no-dev --optimize-autoloader

# Node.js パッケージ
npm install

# フロントエンドビルド
npm run build
```

#### 2-4. Laravelセットアップ
```bash
# アプリケーションキー生成
php artisan key:generate

# データベースマイグレーション
php artisan migrate --force

# ストレージリンク作成
php artisan storage:link

# 設定キャッシュ（本番環境のみ）
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

#### 2-5. パーミッション設定
```bash
sudo chown -R $USER:www-data storage bootstrap/cache
sudo chmod -R 775 storage bootstrap/cache
```

### 3. Webサーバー設定

#### Nginxの場合
```nginx
server {
    listen 80;
    server_name yourdomain.com;
    root /var/www/corporate-site/public;

    add_header X-Frame-Options "SAMEORIGIN";
    add_header X-Content-Type-Options "nosniff";

    index index.php;

    charset utf-8;

    location / {
        try_files $uri $uri/ /index.php?$query_string;
    }

    location = /favicon.ico { access_log off; log_not_found off; }
    location = /robots.txt  { access_log off; log_not_found off; }

    error_page 404 /index.php;

    location ~ \.php$ {
        fastcgi_pass unix:/var/run/php/php8.2-fpm.sock;
        fastcgi_param SCRIPT_FILENAME $realpath_root$fastcgi_script_name;
        include fastcgi_params;
        fastcgi_hide_header X-Powered-By;
    }

    location ~ /\.(?!well-known).* {
        deny all;
    }
}
```

設定反映:
```bash
sudo ln -s /etc/nginx/sites-available/corporate-site /etc/nginx/sites-enabled/
sudo nginx -t
sudo systemctl reload nginx
```

### 4. SSL証明書の設定（Let's Encrypt）
```bash
sudo apt install certbot python3-certbot-nginx
sudo certbot --nginx -d yourdomain.com -d www.yourdomain.com
```

### 5. 管理者ユーザーの作成
```bash
php artisan db:seed --class=AdminUserSeeder
```

または手動でデータベースに作成:
```sql
INSERT INTO users (name, email, password, is_admin, created_at, updated_at)
VALUES (
    'Admin',
    'admin@example.com',
    '$2y$12$...',  -- php artisan tinker で Hash::make('password') を実行
    true,
    NOW(),
    NOW()
);
```

### 6. バックグラウンドジョブの設定（Queue Worker）

#### systemdサービス作成
```bash
sudo nano /etc/systemd/system/corporate-queue.service
```

内容:
```ini
[Unit]
Description=Corporate Site Queue Worker
After=network.target

[Service]
User=www-data
Group=www-data
Restart=always
ExecStart=/usr/bin/php /var/www/corporate-site/artisan queue:work --sleep=3 --tries=3 --max-time=3600

[Install]
WantedBy=multi-user.target
```

有効化:
```bash
sudo systemctl enable corporate-queue
sudo systemctl start corporate-queue
```

### 7. Cronジョブの設定
```bash
sudo crontab -e -u www-data
```

追加:
```cron
* * * * * cd /var/www/corporate-site && php artisan schedule:run >> /dev/null 2>&1
```

## デプロイ後の確認事項

### 動作確認
- [ ] トップページが表示される
- [ ] プロジェクト一覧が表示される
- [ ] ショップページが表示される
- [ ] 管理画面にログインできる
- [ ] 決済テスト（Stripeテストモード）が動作する

### セキュリティ確認
- [ ] `.env`ファイルがWebからアクセスできない
- [ ] `APP_DEBUG=false`になっている
- [ ] SSL証明書が有効
- [ ] ファイルパーミッションが適切

### パフォーマンス確認
- [ ] 設定キャッシュが有効
- [ ] OPcacheが有効
- [ ] 画像が適切に配信される

## 更新手順

```bash
cd /var/web/corporate-site

# 最新コードを取得
git pull origin main

# 依存関係更新
composer install --no-dev --optimize-autoloader
npm install
npm run build

# データベースマイグレーション
php artisan migrate --force

# キャッシュクリア
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Queue Workerリスタート
sudo systemctl restart corporate-queue
```

## トラブルシューティング

### エラーログ確認
```bash
tail -f storage/logs/laravel.log
sudo tail -f /var/log/nginx/error.log
```

### パーミッションエラー
```bash
sudo chown -R www-data:www-data storage bootstrap/cache
sudo chmod -R 775 storage bootstrap/cache
```

### データベース接続エラー
```bash
# PostgreSQL接続確認
psql -U corporate_user -d corporate_site -h 127.0.0.1
```

### キャッシュクリア
```bash
php artisan cache:clear
php artisan config:clear
php artisan route:clear
php artisan view:clear
```

## 重要な注意事項

1. **本番環境では必ず**
   - `APP_DEBUG=false`に設定
   - Stripe本番キーを使用
   - 強力なデータベースパスワードを使用
   - SSL証明書を設定

2. **定期バックアップ**
   - データベースの定期バックアップ
   - `storage/app`ディレクトリのバックアップ
   - `.env`ファイルのバックアップ

3. **モニタリング**
   - ログファイルの定期確認
   - ディスク容量の監視
   - Queue Workerの動作確認

## サポート情報

問題が発生した場合は、以下を確認してください:
- Laravel公式ドキュメント: https://laravel.com/docs
- Stripe公式ドキュメント: https://stripe.com/docs
- PostgreSQL公式ドキュメント: https://www.postgresql.org/docs/
