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

### 1. サポートメールアドレスの作成（最優先）

**現在の状態:**
- 特定商取引法ページと利用規約に `support@sd-create.jp` を記載済み
- **メールアドレスは未作成**

**必要な作業:**

1. **メールアドレス作成**
   - `support@sd-create.jp` のメールアドレスを作成
   - レンタルサーバーやGoogle Workspaceなどで設定

2. **メール転送設定（推奨）**
   - 普段使用しているメールアドレスに転送設定
   - または、メールクライアントで受信設定

3. **自動返信設定（オプション）**
   - 営業時間外の自動返信メッセージ設定
   - 例：「お問い合わせありがとうございます。平日10:00〜18:00に対応いたします。」

### 2. Stripe本番環境の設定（Stripe審査通過後）

**現在の状態:**
- Stripe審査に再申請準備完了
- サイトブランディング: SD-create（後藤翔栄）に更新済み
- 特定商取引法ページ実装済み
- 商品タイプ機能追加済み（ダウンロード型/アカウント発行型）
- 通貨: 日本円（JPY）に設定済み

**Stripe審査対応完了事項:**
✅ サイト名を「Portfolio」から「SD-create」に変更
✅ 事業者情報（後藤翔栄）をホームページに表示
✅ 特定商取引法ページ作成（https://sd-create.jp/legal）
✅ 利用規約にサポートメール反映
✅ 商品タイプ機能（アカウント発行型）実装
✅ 通貨表示を円（¥）に統一

**審査通過後の作業:**

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

**⚠️ 注意: テスト決済について**
- 現在、Stripe APIキーが未設定のためテスト決済はエラーになります
- 商品登録と表示確認は可能です
- Stripe審査通過後、本番キー設定時に決済機能が有効になります

### 3. Stripe Webhook設定（推奨）

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

### 4. メール送信設定

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

### 5. 定期バックアップの設定

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

### 6. セキュリティ強化（オプション）

- fail2banのインストール（不正アクセス防止）
- SSH鍵認証のみに制限（パスワード認証無効化）
- ファイアウォール設定の見直し

### 7. 請求書システムのアカウント自動発行機能実装（将来的に）

**現在の状態:**
- 商品タイプで「アカウント発行型」を選択可能
- ファイルアップロードなしで商品登録可能

**未実装の機能:**
- 決済完了後の自動アカウント発行
- ログイン情報のメール送信
- invoice-appとの連携

**実装が必要な内容:**
1. 決済完了時に invoice-app のユーザーアカウントを自動作成
2. ランダムパスワード生成
3. ログイン情報をメール送信
4. invoice-app のログインURL提供

### 8. パフォーマンス最適化（オプション）

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

### 2025年11月20日〜21日（初回デプロイ）
- ConoHa VPSのセットアップ
- サーバー環境構築（PHP, PostgreSQL, Node.js, Nginx）
- GitHubリポジトリからデプロイ
- データベースマイグレーション実行
- order_itemsテーブルの作成
- 管理者ユーザー作成
- ドメイン設定（sd-create.jp）
- SSL証明書の取得・設定

### 2025年11月21日（Stripe審査対応）
- 特定商取引法ページの作成（/legal）
- 利用規約ページにサポートメール反映（/terms）
- サイトブランディング更新：「Portfolio」→「SD-create」
- 事業者情報の明記（後藤翔栄）
- 商品タイプ機能の実装（ダウンロード型/アカウント発行型）
- 通貨表示を USD から JPY（日本円）に変更
- 全ページの価格表示を $ から ¥ に統一

### 2025年11月21日（デザイン改善・写真機能改修）
- Digital Collectionセクションのテキストサイズ最適化（text-xs）
- 著作権表示に自動年更新とSD-createブランド追加
- 写真管理ダッシュボード改善：
  - カテゴリーをタグのように選択可能に（ドロップダウン + 新規入力）
  - Display Order説明追加（日本語）
- 全ページの画像サイズ統一：
  - 初回: w-48 (192px) に統一
  - 最終: w-80 (320px) に拡大（視認性向上のため）
  - レイアウト統一: gap-8, max-w-4xl, max-w-xs
  - グレースケール効果維持（ホバーでカラー表示）
- Nginxアップロード制限を100MBに拡大（client_max_body_size）
- 写真ギャラリーページのライトボックス機能（キーボード操作対応）

### ❗ 既知の問題（次回対応が必要）

#### 1. 写真ギャラリーページで画像が見えにくい問題

**現象:**
- 写真ギャラリーページ（https://sd-create.jp/photos）で画像が表示されているが、見えにくい
- 画像はグレースケールで表示され、黒い背景と区別がつきにくい
- ホバーすると画像のタイトルは表示される
- Networkタブでは画像ファイルは正常に読み込まれている（200 OK, 689 kB）
- 開発者ツールで確認すると `<img>` タグは正しく出力されている

**技術的詳細:**
- 画像URL: `https://sd-create.jp/storage/photos/0sr1fGytWAjS5IBb6JO2wg3MazoEBD1broq9KYLR.jpg`
- 直接URLアクセスでは画像が正常に表示される
- 画像サイズ: 320x320px (w-80)
- 適用されているクラス: `grayscale group-hover:grayscale-0 group-hover:scale-105`
- データベース: 写真データは正常に登録されている（ID: 1, Title: "Under Water", Category: "#Nature #Underwater"）
- ストレージリンク: 正常に設定されている（public/storage → storage/app/public）
- ファイル: 正しい場所に保存されている（storage/app/public/photos/）
- パーミッション: 適切に設定されている（www-data:www-data, 644）

**試した対策（効果なし）:**
- キャッシュクリア（Laravel, Nginx, ブラウザ）
- 画像サイズの変更（w-48 → w-64 → w-80）
- ストレージリンクの再作成
- パーミッションの確認

**原因の可能性:**
1. CSSの z-index や opacity の問題
2. グレースケールフィルターが背景と同化している
3. ブラウザレンダリングの問題
4. JavaScriptとの干渉

**次回の調査方針:**
- Elements タブで `<img>` タグの Computed スタイルを確認
- 一時的にグレースケールを外してテスト
- 背景色を変更してコントラストを確認
- 他のブラウザでも同じ現象が発生するか確認

**影響範囲:**
- 写真ギャラリーページ（/photos）
- ホームページの Photography セクションも同様の可能性あり

### 次回作業予定（優先順）
1. **写真ギャラリーの画像表示問題の解決**
2. **サポートメールアドレスの作成** - support@sd-create.jp
3. **Stripe本番環境の設定**（審査完了後）
4. Webhook設定
5. メール送信設定
6. 定期バックアップ設定
7. 請求書システムのアカウント自動発行機能実装

---

## ✅ チェックリスト

### Stripe審査前の確認項目
- [x] サイトにHTTPSでアクセスできる
- [x] サイト名が「SD-create」に統一されている
- [x] 事業者情報（後藤翔栄）が表示されている
- [x] 特定商取引法ページが存在する（/legal）
- [x] 利用規約ページが存在する（/terms）
- [x] 商品タイプ機能が実装されている
- [x] 通貨が日本円（¥）になっている
- [x] 管理画面にログインできる
- [ ] **サポートメールアドレス（support@sd-create.jp）を作成**
- [ ] 商品を最低1つ登録する

### Stripe審査通過後の作業
- [ ] Stripe本番キーの設定
- [ ] Webhook設定
- [ ] 決済フローのテスト
- [ ] メール送信テスト
- [ ] 定期バックアップ設定

### コンテンツ追加（オプション）
- [ ] 実際のプロジェクトデータ登録
- [ ] 実際の写真データ登録
- [ ] 商品画像の準備

---

## 🎯 Stripe審査再申請の手順

### 1. サポートメールアドレスを作成
- support@sd-create.jp のメールアドレスを作成
- 受信確認をしておく

### 2. 商品を1つ登録
1. https://sd-create.jp/admin/products にアクセス
2. 「Create Product」をクリック
3. 以下を入力：
   - Product Name: 請求書管理システム - Invoice Management System
   - Description: 提供した商品説明文を使用
   - Price: 9800（または任意）
   - Product Type: Account Access (アカウント発行型)
   - Product Image: スクリーンショットをアップロード
   - Active: チェックを入れる
4. 保存

### 3. 確認事項
- [ ] https://sd-create.jp で「SD-create」「後藤翔栄」が表示される
- [ ] https://sd-create.jp/legal で特定商取引法ページが表示される
- [ ] https://sd-create.jp/shop で商品が表示される
- [ ] 商品詳細ページで価格が「¥9,800」と表示される

### 4. Stripeに再申請
Stripeから届いたメールに返信または、ダッシュボードから以下を報告：

```
お世話になっております。

ご指摘いただいた点について対応が完了しましたので、ご報告いたします。

【対応完了事項】
1. サイト名を「SD-create」に統一し、事業者名（後藤翔栄）を明記しました
2. 特定商取引法ページを作成しました
   URL: https://sd-create.jp/legal
3. 販売商品を登録しました
   商品URL: https://sd-create.jp/shop

お手数ですが、再度審査をお願いいたします。
よろしくお願いいたします。
```

---

**作成日:** 2025年11月21日
**最終更新:** 2025年11月21日
**バージョン:** 1.0
