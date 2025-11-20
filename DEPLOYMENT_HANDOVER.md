# デプロイ完了 引き継ぎドキュメント

作成日: 2025年11月21日

---

## 📊 プロジェクト概要

**プロジェクト名:** Laravel 12 コーポレートサイト + ECサイト
**ドメイン:** sd-create.jp
**サーバー:** ConoHa VPS (IP: 163.44.114.42)

### 主要機能

1. **プロジェクトポートフォリオ** - 制作実績の表示
2. **フォトギャラリー** - 写真作品の展示
3. **ECショップ** - Stripe決済統合、商品販売機能
4. **管理画面** - コンテンツ管理

---

## 🌐 サイトURL

### フロントエンド
- **ホームページ:** https://sd-create.jp
- **プロジェクト一覧:** https://sd-create.jp/projects
- **フォトギャラリー:** https://sd-create.jp/photos
- **ECショップ:** https://sd-create.jp/shop
- **カート:** https://sd-create.jp/cart

### 管理画面
- **ログインURL:** https://sd-create.jp/login
- **管理ダッシュボード:** https://sd-create.jp/admin
- **プロジェクト管理:** https://sd-create.jp/admin/projects
- **写真管理:** https://sd-create.jp/admin/photos
- **商品管理:** https://sd-create.jp/admin/products
- **注文管理:** https://sd-create.jp/admin/orders

---

## 🔐 ログイン情報

### 管理者アカウント
- **メールアドレス:** admin@example.com
- **パスワード:** goto408155
- **権限:** 管理者 (is_admin: true)

### サーバーSSH接続
- **接続先:** root@163.44.114.42
- **認証方法:** SSH鍵認証
- **秘密鍵:** ~/.ssh/id_ed25519
- **公開鍵:** ~/.ssh/id_ed25519.pub

**SSH接続コマンド:**
```bash
ssh root@163.44.114.42
```

---

## 🗄️ データベース情報

### PostgreSQL設定
- **ホスト:** 127.0.0.1
- **ポート:** 5432
- **データベース名:** corporate_site
- **ユーザー名:** postgres
- **パスワード:** goto408155

### 作成済みテーブル
- users
- cache, jobs (Laravel標準)
- photos
- projects
- carts, cart_items
- products
- orders, order_items (ECショップ)
- migrations

---

## 💻 サーバー環境

### インストール済みソフトウェア

| ソフトウェア | バージョン | 説明 |
|-------------|-----------|------|
| OS | Debian 12 (bookworm) | サーバーOS |
| PHP | 8.2.29 | Laravel実行環境 |
| PostgreSQL | 15 | データベース |
| Node.js | 20.19.5 | フロントエンドビルド |
| npm | 10.8.2 | パッケージマネージャー |
| Composer | 2.9.2 | PHP依存関係管理 |
| Nginx | 1.22.1 | Webサーバー |
| Certbot | 2.1.0 | SSL証明書管理 |

### 重要なディレクトリ
- **プロジェクトルート:** /var/www/portfolio
- **公開ディレクトリ:** /var/www/portfolio/public
- **Nginx設定:** /etc/nginx/sites-available/portfolio
- **SSL証明書:** /etc/letsencrypt/live/sd-create.jp/
- **ログファイル:** /var/www/portfolio/storage/logs/

---

## 🔧 サーバー設定ファイル

### Nginx設定 (/etc/nginx/sites-available/portfolio)
```nginx
server {
    listen 80;
    server_name sd-create.jp www.sd-create.jp;
    root /var/www/portfolio/public;

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
    }

    location ~ /\.(?!well-known).* {
        deny all;
    }

    # SSL設定はCertbotが自動追加
}
```

### 環境変数 (.env)
重要な設定項目：
```env
APP_NAME="Corporate Site"
APP_ENV=production
APP_DEBUG=false
APP_URL=https://sd-create.jp

DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=corporate_site
DB_USERNAME=postgres
DB_PASSWORD=goto408155

STRIPE_KEY=pk_test_your_publishable_key_here
STRIPE_SECRET=sk_test_your_secret_key_here
```

---

## 📦 デプロイ済みの状態

### ✅ 完了した作業

1. **サーバー環境構築**
   - PHP 8.2, PostgreSQL 15, Node.js 20, Nginx 1.22のインストール
   - 必要なPHP拡張のインストール

2. **GitHubリポジトリ**
   - リポジトリURL: https://github.com/UKIYO-4s/portfolio
   - ブランチ: main
   - サーバーにクローン済み

3. **依存関係のインストール**
   - Composer依存関係インストール完了
   - npmパッケージインストール完了
   - フロントエンドビルド完了 (Vite)

4. **データベース**
   - PostgreSQLデータベース作成完了
   - 全マイグレーション実行完了（order_items含む）
   - 管理者ユーザー作成完了

5. **Webサーバー設定**
   - Nginx設定完了
   - PHP-FPM起動完了
   - ストレージリンク作成完了

6. **セキュリティ**
   - SSH鍵認証設定完了
   - ConoHaセキュリティグループ設定完了（SSH, HTTP, HTTPS）
   - SSL証明書取得・設定完了（Let's Encrypt）
   - 証明書有効期限: 2026年2月18日
   - 自動更新設定済み

7. **DNS設定**
   - ConoHa DNSでAレコード設定完了
   - sd-create.jp → 163.44.114.42
   - www.sd-create.jp → 163.44.114.42

---

## ⏳ 未完了・今後のタスク

### 1. Stripe本番環境の設定（最優先）

**現在の状態:**
- Stripeアカウント審査待ち
- テストモードのキーが設定されている

**審査完了後の作業:**

1. Stripeダッシュボードで本番モードに切り替え
2. 本番APIキーを取得
   - 公開可能キー: `pk_live_...`
   - シークレットキー: `sk_live_...`

3. サーバーの.envファイルを更新:
```bash
ssh root@163.44.114.42
cd /var/www/portfolio
nano .env
```

変更箇所:
```env
STRIPE_KEY=pk_live_xxxxxxxxxxxxxxxxxx
STRIPE_SECRET=sk_live_xxxxxxxxxxxxxxxxxx
```

4. 設定を反映:
```bash
php artisan config:clear
php artisan cache:clear
```

### 2. Stripe Webhook設定（推奨）

決済完了などのイベント通知を受け取るために設定します。

1. Stripeダッシュボード → 開発者 → Webhook
2. エンドポイントを追加:
   - URL: `https://sd-create.jp/stripe/webhook`
   - イベント選択:
     - `payment_intent.succeeded`
     - `payment_intent.payment_failed`
     - `charge.refunded`

3. Webhook署名シークレットを.envに追加:
```env
STRIPE_WEBHOOK_SECRET=whsec_xxxxxxxxxxxxxxxxxx
```

### 3. メール送信設定

注文確認メールなどを送信するために設定します。

推奨サービス:
- SendGrid
- Mailgun
- Amazon SES

.envに設定を追加:
```env
MAIL_MAILER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=your_username
MAIL_PASSWORD=your_password
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS="noreply@sd-create.jp"
MAIL_FROM_NAME="${APP_NAME}"
```

### 4. 定期バックアップの設定

データベースとファイルの定期バックアップを推奨します。

**データベースバックアップスクリプト例:**
```bash
#!/bin/bash
# /root/backup-db.sh

BACKUP_DIR="/root/backups"
DATE=$(date +%Y%m%d_%H%M%S)
FILENAME="corporate_site_$DATE.sql"

mkdir -p $BACKUP_DIR
pg_dump -U postgres corporate_site > $BACKUP_DIR/$FILENAME
gzip $BACKUP_DIR/$FILENAME

# 30日以上古いバックアップを削除
find $BACKUP_DIR -name "*.sql.gz" -mtime +30 -delete
```

cronで毎日実行:
```bash
crontab -e
# 毎日午前3時にバックアップ
0 3 * * * /root/backup-db.sh
```

### 5. セキュリティ強化（オプション）

- fail2banのインストール（不正アクセス防止）
- SSH鍵認証のみに制限（パスワード認証無効化）
- ファイアウォール設定の見直し

### 6. パフォーマンス最適化（オプション）

- Redis/Memcachedのキャッシュ設定
- OPcacheの設定最適化
- 画像最適化の自動化

---

## 🚀 よく使うコマンド

### サーバー接続
```bash
# SSH接続
ssh root@163.44.114.42

# プロジェクトディレクトリに移動
cd /var/www/portfolio
```

### Git操作
```bash
# 最新版を取得
git pull origin main

# 依存関係の更新
composer install --no-dev --optimize-autoloader
npm install
npm run build

# キャッシュクリア
php artisan config:clear
php artisan cache:clear
php artisan view:clear
```

### データベース操作
```bash
# マイグレーション実行
php artisan migrate --force

# マイグレーションのロールバック
php artisan migrate:rollback --force

# PostgreSQLに接続
psql -U postgres -d corporate_site
```

### サービスの再起動
```bash
# Nginx再起動
systemctl restart nginx

# PHP-FPM再起動
systemctl restart php8.2-fpm

# すべてのサービス状態確認
systemctl status nginx
systemctl status php8.2-fpm
systemctl status postgresql
```

### SSL証明書の更新
```bash
# 証明書の手動更新テスト
certbot renew --dry-run

# 証明書の更新（自動更新が失敗した場合）
certbot renew --force-renewal

# 証明書の状態確認
certbot certificates
```

### ログの確認
```bash
# Laravelのログ
tail -f /var/www/portfolio/storage/logs/laravel.log

# Nginxのアクセスログ
tail -f /var/log/nginx/access.log

# Nginxのエラーログ
tail -f /var/log/nginx/error.log

# PHP-FPMのログ
tail -f /var/log/php8.2-fpm.log
```

---

## 🔍 トラブルシューティング

### サイトが表示されない

1. **Nginxの状態確認:**
```bash
systemctl status nginx
nginx -t  # 設定ファイルのテスト
```

2. **PHP-FPMの状態確認:**
```bash
systemctl status php8.2-fpm
```

3. **エラーログの確認:**
```bash
tail -f /var/www/portfolio/storage/logs/laravel.log
tail -f /var/log/nginx/error.log
```

### 500エラーが出る

1. **パーミッションの確認:**
```bash
cd /var/www/portfolio
chown -R www-data:www-data storage bootstrap/cache
chmod -R 775 storage bootstrap/cache
```

2. **キャッシュのクリア:**
```bash
php artisan config:clear
php artisan cache:clear
php artisan view:clear
```

### データベース接続エラー

1. **PostgreSQLの状態確認:**
```bash
systemctl status postgresql
```

2. **.envファイルの確認:**
```bash
cat /var/www/portfolio/.env | grep DB_
```

3. **接続テスト:**
```bash
psql -U postgres -d corporate_site
```

### SSL証明書のエラー

1. **証明書の状態確認:**
```bash
certbot certificates
```

2. **証明書の更新:**
```bash
certbot renew --force-renewal
systemctl reload nginx
```

---

## 📞 連絡先・リソース

### ドキュメント
- **Laravel公式ドキュメント:** https://laravel.com/docs/12.x
- **Stripe公式ドキュメント:** https://stripe.com/docs
- **ConoHaサポート:** https://support.conoha.jp/

### GitHubリポジトリ
- **リポジトリURL:** https://github.com/UKIYO-4s/portfolio
- **デプロイ手順書:** DEPLOYMENT.md

### 管理者情報
- **作成者:** Shoei Goto
- **メールアドレス:** shoeigoto.sd@gmail.com

---

## 📝 作業履歴

### 2025年11月20日〜21日
- ConoHa VPSのセットアップ
- サーバー環境構築（PHP, PostgreSQL, Node.js, Nginx）
- GitHubリポジトリからデプロイ
- データベースマイグレーション実行
- order_itemsテーブルの作成
- 管理者ユーザー作成
- ドメイン設定（sd-create.jp）
- SSL証明書の取得・設定

### 次回作業予定
- Stripe本番環境の設定（審査完了待ち）
- Webhook設定
- メール送信設定
- 定期バックアップ設定

---

## ✅ チェックリスト

デプロイ後の確認項目:

- [x] サイトにHTTPSでアクセスできる
- [x] 管理画面にログインできる
- [ ] Stripe本番キーの設定
- [ ] Webhook設定
- [ ] メール送信テスト
- [ ] 定期バックアップ設定
- [ ] 実際の商品データ登録
- [ ] 実際のプロジェクトデータ登録
- [ ] 実際の写真データ登録

---

## 🎯 次のステップ

1. **Stripe審査完了後**
   - 本番APIキーを.envに設定
   - Webhook設定
   - 決済フローのテスト

2. **コンテンツ追加**
   - 管理画面からプロジェクト・写真・商品を追加
   - テスト注文で動作確認

3. **運用準備**
   - バックアップ設定
   - メール送信設定
   - 監視設定

---

**作成日:** 2025年11月21日
**最終更新:** 2025年11月21日
**バージョン:** 1.0
