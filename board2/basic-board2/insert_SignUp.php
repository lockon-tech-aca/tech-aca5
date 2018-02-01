<?php

if (empty($_POST['name']) || empty($_POST['password']))
{
    print"名前とパスワードが入力されていません。<br>";
    print'<a href="SignUp.php">新規登録画面に戻る</a>';
}

else if(mb_strlen($_POST['name']) > 10)
{
    print"名前は10文字以内で入力してください";
    print"<a href=SignUp.php>新規登録画面に戻る</a>";
}

else if(mb_strlen($_POST['password']) > 10)
{
    print"パスワードは10文字以内で入力してください";
    print"<a href='SignUp.php'>新規登録画面に戻る</a>";
}

else  {
    require_once '../DbManager.php';
    try {
        $db = getDb();
        $db->exec('SET NAMES utf8');
        $stmt = $db->prepare('SELECT * FROM member_table WHERE name = ?');
        $stmt->bindValue(1, $_POST['name'], PDO::PARAM_STR);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);

        foreach ($stmt as $row) {

            if ($_POST['name'] == $row['name']) {
                // 登録失敗
                print('入力された名前は既に使用されています。別の名前を入力してください。<br>');
                print"<a href='SignUp.php'>新規登録画面に戻る</a>";
                exit();
            }
        }
        $stt = $db->prepare('INSERT INTO member_table(name,password) VALUES(:name, :password)');
        $stt->bindValue(':name', $_POST['name'], PDO::PARAM_STR);
        $stt->bindValue(':password', $_POST['password'], PDO::PARAM_STR);
        $stt->execute();
        $db = NULL;
        print('登録が完了しました<br><br>');
        print'<a href=./Login.php>ログイン画面に移動する</a>';
        //header('Location:' . dirname($_SERVER['PHP_SELF']) . '/Login.php');


    }

    catch(PDOException $e){
        die("接続エラー:{$e->getMessage()}");
    }
}

