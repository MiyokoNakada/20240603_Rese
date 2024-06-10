# Rese

飲食店予約サービス
自社にて予約サービスを運営するため作成しました  
<br>
＜トップページ＞  <br>
<img src="https://github.com/MiyokoNakada/20240603_Rese/assets/159742835/67386f11-aea5-4975-89ca-3f0c71687fb6" width=70%><br>
＜店舗詳細ページ＞<br>
<img src="https://github.com/MiyokoNakada/20240603_Rese/assets/159742835/bb0e9f5b-3828-49af-bc49-25bf9cd71455" width=70%><br>
＜マイページ＞ <br>
<img src="https://github.com/MiyokoNakada/20240603_Rese/assets/159742835/7cd64d7f-f8a3-446b-9b7d-7baebe525ed3" width=70%><br>
<br>
## URL

- 本番環境：http://  
  （上記 URL でログイン後にトップページに遷移します)
- 開発環境：http://localhost/
- phpMyAdmin：http://localhost:8080/
  <br>

## 関連レポジトリ

https://github.com/MiyokoNakada/20240603_Rese
<br>

## 機能一覧

- 会員登録機能
- ログイン・ログアウト機能
- 飲食店一覧表示
- 飲食店詳細表示
- マイページ表示
- 検索機能
- お気に入り登録・削除
- 予約機能
  <br>

## 使用技術(実行環境)

- PHP 8.2.12
- Laravel 10.48.12
- MySQL 8.0.36
  <br>

## テーブル設計

<img src="https://github.com/MiyokoNakada/20240603_Rese/assets/159742835/66004375-1ea0-4426-8a4f-c036ff869ce2" width=50%> 
<img src="https://github.com/MiyokoNakada/20240603_Rese/assets/159742835/9cf360e5-a511-48cd-9971-bbb0f422e37f" width=50%>
<br>

## ER 図
<img src="https://github.com/MiyokoNakada/20240603_Rese/assets/159742835/0aedaad9-0f22-4f58-ab27-042434abfd70" width=70%>
<br>

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
   APP_ENV=development
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
   MAIL_ENCRYPTION=null
   MAIL_FROM_ADDRESS="email_verification@atte.com"
   MAIL_FROM_NAME="Atte"
   ```

   ※メールに関する設定項目はそれぞれの環境に合わせて変更してください

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

### (2)本番環境のセットアップ

#### 前提条件

- AWS EC2 インスタンス
- AWS RDS データベース

#### 手順

1. EC2 インスタンスを作成し、必要なソフトウェアをインストール

- Docker
- Docker-compose
- Git

2. RDS データーベースを作成し、作成した EC2 に接続
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

   MAIL_MAILER=smtp
   MAIL_HOST=your_email_host
   MAIL_PORT=2525
   MAIL_USERNAME=your_username
   MAIL_PASSWORD=your_password
   MAIL_ENCRYPTION=null
   MAIL_FROM_ADDRESS="email_verification@atte.com"
   MAIL_FROM_NAME="Atte"
   ```

   ※メールに関する設定項目もそれぞれの環境に合わせて変更

8. PHP コンテナにログイン後、composer のインストール
   ```sh
   docker-compose -f docker-compose.prod.yml exec php bash
   ```
   ```php
   composer install
   ```
9. アプリケーションキーの作成
   ```php
   php artisan key:generate
   ```
10. マイグレーションの実行  
    ```php
    php artisan migrate
    ```


