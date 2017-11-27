# テクアカ5期

This is a repository of tech-aca 5th term.

-----

# はじめに

このリポジトリはテクアカのベースとなるものです。

1. 各自のユーザーでGithubにログイン後、 `Fork` してください。
2. 自身の領域にリポジトリが出来ているのを確認したら、その複製したリポジトリを `git clone` してください。
3. `git push` は、自身の複製した方に行われます。
4. コードレビューをする時は、 `pull request` を行ってください。Github上でメンターがコメントを追記してレビューを行ないます。


## レビューの流れ

* フォークしてきた自分のリポジトリに作業ブランチA（名前はなんでも良い）をつくる
  - `git branch -b my_branch`
* 課題のプログラミングを終えたらpushする
  - `git commit -m 'commit message'`
  - `git push origin my_branch`
* 課題提出時は作業ブランチからフォーク元のマスターに `pull request` （プルリク）する
  - Githubの画面から `Create Pull Request`
* プルリク上でコメントができるので、そこからフィードバックをもらう
* プッシュした自身の作業ブランチAで、コメントされたフィードバック内容の対応をして再度プッシュ
  - 自動的に前のプルリクにも反映されます
* プルリク上で修正した旨を連絡
  - 不安ならSlackでも連絡
* メンターが再レビューしてOKなら `Approved` をつける
* 運営がレビュー完了を確認したら、プルリクのクローズ
* プルリクがクローズされれば、課題完了


### もし運営から全体に共通してアップデートしてほしい内容がある時

* Fork元のリポジトリ(lockon-tech-aca/tech-aca5)のマスターに運営がプッシュ
* Fork先のリポジトリ（各自のリポジトリ）のマスターにFork元のマスターをFetch／Merge
* Fork先のマスターから作業ブランチへマージ


### 参考URL（一連のプルリクの流れを解説）

* GitHub】Pull Requestの手順
  - https://qiita.com/Commander-Aipa/items/d61d21988a36a4d0e58b


-----

# カリキュラム


## 1. 環境構築 Hello World

### ディレクトリ名
* hello_world

### 基本要件

* WEBサービス
  - http://www.mit-support.com/2010/09/725.html

* Gitについて理解
  - http://www.backlog.jp/git-guide/intro/intro1_1.html

* XAMPP
  - https://www.apachefriends.org/jp/index.html

* PhpStorm学生ライセンス
  - https://www.jetbrains.com/shop/eform/students

### 応用要件

* ブラウザでhello.php（Hello, World）を表示する

### 手順
* 独習PHP P.38, 39を実行

----

## 2. 電卓

### ディレクトリ名
* calc

### 基本要件
* 四則演算して表示するプログラムをつくる
* HTMLで入力フォームをつくってPOSTで受け取ったデータを表示するプログラムをつくる

### 応用要件
* 四則演算ができる
* 数字と演算方法（+,-,×,÷）を入力または選択して「計算」などのボタンを押すと結果が表示される
* 数字と演算方法を入力するページと結果を表示するページは同じにする
* 使用する言語はPHPとHTML
* ソースコードには見やすくインデントを付ける
* Notice, Warning, Fatal Errorをなくす

### 手順
1. PHPの演算方法を学習する
1. HTMLで入力フォームをつくり、表示させる(HTML)
1. PHPでPOSTしたデータを受け取り、echo や var_dumpする（print_rでも可）
1. 受け取ったデータをローカル変数に格納
1. 格納したデータを計算して var_dump する
1. 計算結果をHTMLで表示する"""

-----

## 3. 掲示板1

### ディレクトリ名
* board1


### 基本要件

#### PHPMyAdmin

* GUIでDBとテーブルをつくり、データを入れてみる
* SQLで SELECT / INSERT / UPDATE / DELETE してみる

### プログラム(PDO)

* DB接続する
* SELECT / INSERT / UPDATE / DELETE する

### 応用要件
* 既に投稿された「ユーザ名」と「本文」を表示できる
* 「ユーザ名」と「本文」を投稿できる
* データの保存にはデータベースを使う
  - テーブル定義は「掲示板のテーブル定義」シートに従う
  - ただし、型とその他項目は各自考える
* SQLインジェクション対策ができている（PDOを使用している）
* XSS対策ができている（htmlspecialcharsを使用している）
* 使用する言語はPHPとHTML

### 手順
1. データベース（以下DB）とは何かを学習する
1. SQLを学習する
1. PHPMyAdminでDBとテーブルを作成し、テストデータを入れておく
　※「掲示板のテーブル定義」シートに従う
1. PHPからDBに接続し、保存されている内容を取得する
1. PHPを使い、DBに保存されている内容をWebの画面に表示する
1. PHPでPOSTした内容をDBに保存する
1. 掲示板として機能させる"


----

## 4. 掲示板2

### ディレクトリ名
* board2

### 基本要件

* DB関連
  - データベースのリレーションを使う
  - ユーザを管理する仕組みを知る
  - ログインの仕組みを知る

* Smarty関連
  - Smartyの仕組みを知る
  - Smartyを使って開発する意味を理解する"

### 応用要件
* 掲示板2の要件
* ログインができる
* ログインすると自分の投稿の編集・削除ができる
* テーブル定義は「掲示板のテーブル定義」シートに従う
  - ただし、型とその他項目は各自考える
* HTMLではなくSmartyを使用する
* 使用する言語はPHPとSmarty(2系)

### 手順
1. ユーザの管理（登録・ログイン）機能を実装する　←ここまではHTML＋PHP
　　※テーブル定義は「掲示板のテーブル定義」シートに従う
1. ログインしているユーザに紐づく投稿の編集・削除機能を実装する
1. フレームワーク（Smarty）とは何かを知る（メリット・デメリット）　←ここからSmarty
1. Smarty＋PHPで変数を表示する画面をつくってみて、Smartyの動きを学習する
1. 今までつくったPHP＋HTMLの掲示板の機能をPHP＋Smartyでつくる
1. Smartyを使った掲示板を完成させる"

-----

## 5. 掲示板3

### ディレクトリ名
* board3

### 基本要件

* Linuxを学ぶ
* GUI（画像/画面）ではなくCUI（コマンド）でPCを操作することを学ぶ
* Windowsとの違いを知る

### 応用要件

* 掲示板2をVagrant（VirtualBox）に移行する

### 手順
1. VirtualBox と Vagrant を利用して個人のPC上に Linux のサーバを立てる(ec-cube/README.mdを参照)
2. 掲示板2で作成したソースコードを 1. で立てたサーバにアップロードし、
　しかるべき場所に設置する
3. ブラウザから 2. で設置したアプリケーションを使えるか確認する

-----

## 6. EC-CUBE理解

### ディレクトリ名
* ec-cube

### 基本要件
* EC-CUBEとは何かを知る
* オープンソースとは何かを知る

### 応用要件
* EC-CUBE2.13.5をインストール
* 商品登録、会員登録、受注、その他を使ってみる
* その仕組み（ソースコード）を読み解く

### 手順
1. EC-CUBEをインストールする
  - (ec-cube/README.mdを参照)
  - ２回目以降のVagrant起動時にエラーが出る場合は下の解除方法を参考にする
2. フロント画面・管理画面を触ってみる
3. ソースコードを読みつつ、EC-CUBEをカスタマイズしてみる



### 参考

#### ソースコードの読み方
* https://ecnomikata.com/column/8635/

#### カスタマイズ例：
* http://blog.livedoor.jp/chibicoo/archives/50208181.html

#### Vagrantでの２回目以降の起動時に出るエラーの解除方法

* Vagrant：1.9.1
* VirtualBox：5.1.14

#### Vagrant内

```bash
$ sudo yum -y update kernel
$ sudo yum -y install kernel-devel kernel-headers dkms gcc gcc-c++
$ sudo /etc/init.d/vboxadd setup
```

#### Vagrant外

```bash
vagrant reload
```

-----

## 7. 卒業課題

### 別途案内します
