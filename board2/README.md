# テーブル定義について

### データベース名

* board2_db

### テーブル名

* post_table
  - 投稿内容
* member_table
  - 投稿ユーザー

### カラム構成

#### post_table

| カラム名 | 型   | その他                | カラムの内容       |
|----------|------|-----------------------|--------------------|
| id       | int  | primary key, not null | 投稿ID             |
| contents | text |                       | 投稿された本文     |
| user_id  | int  |                       | 投稿したユーザのID |


#### member_table

| カラム名 | 型           | その他                | カラムの内容 |
|----------|--------------|-----------------------|--------------|
| id       | int          | primary key, not null | ユーザID     |
| name     | varchar(255) |                       | ユーザ名     |
| password | varchar(255) |                       | パスワード   |
