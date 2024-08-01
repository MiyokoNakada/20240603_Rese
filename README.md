# Rese

飲食店予約サービス<br>
自社にて予約サービスを運営するため作成しました  
<br>
＜トップページ＞  <br>
　店舗の一覧が表示され、お気に入りの登録・削除、店舗の検索が行えます。<br>
<img src="https://github.com/MiyokoNakada/20240603_Rese/assets/159742835/67386f11-aea5-4975-89ca-3f0c71687fb6" width=60%><br><br>
＜店舗詳細ページ＞<br>
　店舗の詳細説明を見ることができます。この画面から日時、人数を指定して予約できます。<br>
<img src="https://github.com/MiyokoNakada/20240603_Rese/assets/159742835/bb0e9f5b-3828-49af-bc49-25bf9cd71455" width=60%><br><br>
＜マイページ＞ <br>
　ユーザー個別の予約状況とお気に入りに登録した店舗の一覧が表示されます。予約の変更や取消しが行えます。<br>
　また、店舗側が来店確認をした後に評価・支払いボタンが表示され、評価の登録と支払いができるようになります。<br>
<img src="https://github.com/user-attachments/assets/d3e144f8-43e6-4ce9-8f17-62cec8928819" width=60%><br><br>
＜評価登録用ページ＞ <br>
　店舗側が来店確認をした後に評価ができるようになります。来店時の評価を★1～5、コメントで評価できます。<br>
<img src="https://github.com/user-attachments/assets/fb57f9b7-e1c8-4642-b816-83279587d6be" width=30%><br><br>
＜管理者用ページ＞ <br>
　管理者専用の画面です。店舗代表者のアカウントを作成することができます。メールアドレスを指定してメール送信ができます。<br>
<img src="https://github.com/user-attachments/assets/23bbbed5-1d76-4040-b862-ba2318b0af65" width=60%><br><br>
＜店舗代表者用ページ＞ <br>
　店舗代表者専用の画面です。管理者が店舗代表者のアカウントを作成後、店舗情報を作成・編集できます。<br>
　予約一覧が表示されており、詳細ボタンから予約詳細を確認できます。<br>
<img src="https://github.com/user-attachments/assets/d7c3511f-f844-4186-aa56-118b8731a557" width=60%><br><br>
＜予約詳細ページ＞<br>
　各予約の詳細を確認できます。来店確認ボタンをクリックすると、決済のための支払い額が設定できるようになります。<br>
<img src="https://github.com/user-attachments/assets/a31d4a8f-bc53-47fe-ac65-d40b009c7d24" width=30%><br>
<br>

## URL

- 本番環境：http://54.252.248.143/
  （URL でログイン後にトップページに遷移します)
- 開発環境：http://localhost/
- phpMyAdmin：http://localhost:8080/
  <br><br>

## 関連レポジトリ

https://github.com/MiyokoNakada/20240603_Rese
<br><br>

## 機能一覧

- 会員登録・ログイン・ログアウト機能
- 飲食店一覧（検索機能）
- お気に入り登録・削除
- 飲食店詳細（予約機能）
- マイページ（ユーザー個別の予約状況、お気に入り登録店舗)
- 予約変更・削除
- リマインドメール機能（予約当日の朝９時に店舗からQRコード付きリマインドメール）
- 店舗評価機能（来店後にマイページから評価可能）
- 決済機能（来店後にマイページから支払い可能）
- 管理者用画面（店舗代表者作成機能、メール送信機能）
- 店舗代表者用画面（店舗情報作成・更新機能、来店確認機能、支払額登録機能)
<br><br>

## 使用技術(実行環境)

- PHP 8.2.12
- Laravel 10.48.12
- MySQL 8.0.36
<br><br>

## テーブル設計

<img src="https://github.com/user-attachments/assets/398c1236-e79a-4262-9d61-89b15f12a6d1" width=50%> 
<img src="https://github.com/user-attachments/assets/b7da0603-1774-4956-946a-53d477ea93e2" width=50%>
<br><br>

## ER 図

<img src="https://github.com/user-attachments/assets/0db01f43-fe23-40f6-829e-0cd5189d4159" width=70%>
<br><br>

## 環境構築

### (1)開発環境のセットアップ

#### 前提条件

- Docker
- Docker Compose

#### 手順

1. リポジトリをクローン
   ```sh
   git clone git@github.com:MiyokoNakada/20240603_Rese.git
   cd 20240603_Rese
   ```
2. Docker コンテナをビルドして起動
   ```sh
   docker-compose -f docker-compose.dev.yml up --build -d
   ```
3. .env ファイルを作成し、必要な環境変数を設定

   ```sh
   cp src/.env.example src/.env
   ```

   ```env
   APP_ENV=local
   APP_DEBUG=true
   APP_URL=http://localhost

   DB_HOST=mysql
   DB_DATABASE=laravel_db
   DB_USERNAME=laravel_user
   DB_PASSWORD=laravel_pass

   MAIL_MAILER=smtp
   MAIL_HOST=your_email_host
   MAIL_PORT=2525
   MAIL_USERNAME=your_username
   MAIL_PASSWORD=your_password
   MAIL_ENCRYPTION=
   MAIL_FROM_ADDRESS="rese@email.com"
   MAIL_FROM_NAME="${APP_NAME}"

   STRIPE_KEY=pk_test_51xxxx(your_stripe_key)
   STRIPE_SECRET=sk_test_51xxxx(your_stripe_secret_key)
   ```

   ※メールおよびStripeに関する設定項目はそれぞれの環境に合わせて変更してください

4. PHP コンテナにログイン後、composer のインストール
   ```sh
   docker-compose -f docker-compose.dev.yml exec php bash
   ```
   ```php
   composer install
   ```
5. アプリケーションキーの作成
   ```php
   php artisan key:generate
   ```
6. マイグレーションの実行
   ```php
   php artisan migrate
   ```
7. シンボリックリンクの作成
   ```php
   php artisan storage:link
   ```
8. Seederデータの挿入
   ```php
   php artisan db:seed
   ```

### (2)本番環境のセットアップ

#### 前提条件

- AWS EC2 インスタンス
- AWS RDS データベース
- AWS S3 ストレージ

#### 手順

1. EC2 インスタンスを作成し、必要なソフトウェアをインストール

- Docker
- Docker-compose
- Git

2. RDS データーベース、S3バケットを作成し、作成した EC2 に接続
3. リポジトリをクローン
   ```sh
   git clone git@github.com:MiyokoNakada/20240603_Rese.git
   cd 20240603_Rese
   ```
4. `docker/nginx/default.conf` ファイルを編集
   ```
   server_name your_ec2_instance_public_ip;
   ```
5. `docker-compose.prod.yml` ファイルを編集
   ```
   phpmyadmin:
   image: phpmyadmin/phpmyadmin
   environment:
     - PMA_ARBITRARY=1
     - PMA_HOST=RDS_endpoint
     - PMA_USER=RDS_user
     - PMA_PASSWORD=RDS_password
   ports:
     - 8080:80
   ```
6. Docker コンテナをビルドして起動
   ```sh
   docker-compose -f docker-compose.prod.yml up --build -d
   ```
7. .env ファイルを作成し、必要な環境変数を設定

   ```sh
   cp src/.env.example src/.env
   ```

   ```env
   APP_ENV=production
   APP_DEBUG=false
   APP_URL=http://your_ec2_instance_public_ip/

   DB_HOST=your_rds_endpoint
   DB_DATABASE=your_production_db
   DB_USERNAME=your_db_user
   DB_PASSWORD=your_db_password

   FILESYSTEM_DISK=s3

   MAIL_MAILER=smtp
   MAIL_HOST=your_email_host
   MAIL_PORT=2525
   MAIL_USERNAME=your_username
   MAIL_PASSWORD=your_password
   MAIL_ENCRYPTION=
   MAIL_FROM_ADDRESS="rese@email.com"
   MAIL_FROM_NAME="${APP_NAME}"

   AWS_ACCESS_KEY_ID=IAM_user_access_key
   AWS_SECRET_ACCESS_KEY=IAM_user_secret_access_key
   AWS_DEFAULT_REGION=aws_region
   AWS_BUCKET=your_s3_bucket_name
   AWS_URL=https://your_s3_bucket_name.s3.amazonaws.com
   AWS_USE_PATH_STYLE_ENDPOINT=false
   
   STRIPE_KEY=pk_test_51xxxx(your_stripe_key)
   STRIPE_SECRET=sk_test_51xxxx(your_stripe_secret_key)
   ```

   ※メールに関する設定項目もそれぞれの環境に合わせて変更

8. PHP コンテナにログイン後、composer のインストール
   ```sh
   docker-compose -f docker-compose.prod.yml exec php bash
   ```
   ```php
   composer install
   ```   
9. S3ファイルシステムのインストール
   ```php
   composer require league/flysystem-aws-s3-v3 "^3.0" --with-all-dependencies
   ```
10. アプリケーションキーの作成
    ```php
    php artisan key:generate
    ```
11. マイグレーションの実行  
    ```php
    php artisan migrate
    ```
12. シンボリックリンクの作成
    ```php
    php artisan storage:link
    ```
13. Seederデータの挿入
    ```php
    php artisan db:seed
    ```
   

