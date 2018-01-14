<?php
  class Process {

    public function login($post) {
      require_once './DbManager.php';  // getDb関数の有効化
      try {
        // DB接続を確立
        $db  = getDb();
        // SELECT命令への準備
        $stt = $db->prepare('SELECT * FROM member_table WHERE name = :name AND password = :password');
        // SELECT命令にポストデータの内容をセット
        $stt->bindValue(':name', $post['name']);
        $stt->bindValue(':password', $post['password']);
        // SELECT命令の実行
        $stt->execute();
        // 結果セットの内容を取得
        $result = $stt->fetch(PDO::FETCH_ASSOC);

        return $result;
      } catch (PDOException $e) {
        die("エラー：{$e->getMessage()}");
      }
    }

    public function signup($post) {
      require_once './DbManager.php';  // getDb関数の有効化
      require_once './Encode.php';     // e関数の有効化
      try {
        // DBへの接続を確立
        $db = getDb();
        // INSERT命令への準備
        $stt = $db->prepare('INSERT INTO member_table(name, password) VALUES(:name, :password)');
        // INSERT命令にポストデータの内容をセット
        $stt->bindValue(':name', $post['name']);
        $stt->bindValue(':password', $post['password']);
        // INSERT命令を実行
        $stt->execute();
        $db = NULL;
      } catch (PDOException $e) {
        die("エラー：{$e->getMessage()}");
      }
     }

     public function mypost($post) {
       require_once './DbManager.php';  // getDb関数の有効化
       require_once './Encode.php';     // e関数の有効化
       try {
         // DBへの接続を確立
         $db = getDb();
         // INSERT命令への準備
         $stt = $db->prepare('INSERT INTO post_table(contents, user_id) VALUES(:contents, :user_id)');
         // INSERT命令にポストデータの内容をセット
         $stt->bindValue(':contents', $post['contents']);
         $stt->bindValue(':user_id', $post['user_id']);
         // INSERT命令を実行
         $stt->execute();
         $db = NULL;
       } catch (PDOException $e) {
         die("エラー：{$e->getMessage()}");
       }
      }

      public function select($post) {
        require_once './DbManager.php';  // getDb関数の有効化
        try {
          // DB接続を確立
          $db  = getDb();
          // SELECT命令への準備
          $stt = $db->prepare('SELECT * FROM post_table WHERE id = :id');
          // SELECT命令にポストデータの内容をセット
          $stt->bindValue(':id', $post['id']);
          // SELECT命令の実行
          $stt->execute();
          // 結果セットの内容を取得
          $result = $stt->fetch(PDO::FETCH_ASSOC);

          return $result;
        } catch (PDOException $e) {
          die("エラー：{$e->getMessage()}");
        }
      }

      public function edit($post) {
        var_dump($post);
        require_once './DbManager.php';  // getDb関数の有効化
        try {
          // DB接続を確立
          $db  = getDb();
          // UPDATE命令への準備
          $stt = $db->prepare('UPDATE post_table SET contents = :contents WHERE id = :id');
          // UPDATE命令にポストデータの内容をセット
          $stt->bindValue(':contents', $post['contents']);
          $stt->bindValue(':id', $post['id']);
          // UPDATE命令の実行
          $stt->execute();
        } catch (PDOException $e) {
          die("エラー：{$e->getMessage()}");
        }
      }

      public function delete($post) {
        var_dump($post);
        require_once './DbManager.php';  // getDb関数の有効化
        try {
          // DB接続を確立
          $db  = getDb();
          // DELETE命令への準備
          $stt = $db->prepare('DELETE FROM post_table WHERE id = :id');
          // DELETE命令にポストデータの内容をセット
          $stt->bindValue(':id', $post['id']);
          // DELETE命令の実行
          $stt->execute();
        } catch (PDOException $e) {
          die("エラー：{$e->getMessage()}");
        }
      }
  }
 ?>
