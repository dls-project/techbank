# techbank

## Description

## Demo

## Requirement

## Usage

## Install

### Git

Git をインストールする。  
[Git](https://git-scm.com/)

### Node.js + npm

Node.js + npm をインストールする。  
[Node.js](https://nodejs.org/ja/download/)
※npm も同梱されています。

### composer

composer をインストールする。  
[composer](https://getcomposer.org/download/)

### PHP + MySQL

XAMPP をインストールして、XAMPP の PHP と MySQL を使用できるようにする。  
[XAMPP](https://www.apachefriends.org/jp/index.html)

<!-- ### GitHub Fork -->

### ローカルの DB 設定

XAMPP の MySQL と Apache を起動。

phpMyAdmin で以下の SQL を実行。

```sql
CREATE DATABASE データベース名 CHARACTER SET utf8mb4
```

その後、以下の SQL を実行し自分用のユーザーを作成。

```sql
grant all privileges on データベース名.* to ユーザ名@"%" identified by 'パスワード' with grant
```

自分用ユーザーでログインできることを確認する。

[参考](./docker/.md)

### バックエンド設定

backend ディレクトリで初回パッケージインストール

```sh
$ cd /workingdir/techbank/backend
$ composer install
```

`backend/.env.example`をコピーして`.env`を作成。

```sh
$ cp .env.example .env
```

ファイル内の DB 項目を修正する

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=DB名
DB_USERNAME=ユーザー名
DB_PASSWORD=パスワード
```

JWT の初回設定をする。

```sh
$ php artisan jwt:secret
```

DB の migrate をする。

```sh
$ php artisan migrate:refresh --seed
```

### フロントエンド設定

nuxt ディレクトリで初回パッケージインストール

```
$ cd /workingdir/techbank/nuxt
$ npm install
```

### localhost 立ち上げ

1. XAMPP の MySQL を起動する
2. backend ディレクトリで Laravel を起動する

```sh
$ cd backend
$ php artisan serve
```

3. nuxt ディレクトリで nuxt を起動する

```sh
$ cd nuxt
$ npm run dev
```

4. ブラウザで http://localhost:3000 を表示する
