<?php
// セッションの開始
session_start();

require_once './vendor/autoload.php';
$s = new Smarty();
$s->template_dir = './templates/';
$s->compile_dir = './templates_c/';

//エラーメッセージを初期化
$s->assign('error_message','');
//完了メッセージを初期化
$s->assign('action','');
//再実行メッセージを定義
$s->assign('reaction','ログイン');
// 1. ユーザIDの入力チェック
if (empty($_POST['name'])) {
    $s->assign('error_message',"名前が入力されていません。<br>");
    $s->display('error_message.tpl');
    //print('名前が未入力です。');
}
else if(mb_strlen($_POST['name']) > 10)
{
    $s->assign('error_message',"名前は10文字以内で入力してください。<br>");
    $s->display('error_message.tpl');
    //print"名前は10文字以内で入力してください";
}

else if (empty($_POST['password'])) {
    $s->assign('error_message',"パスワードが入力されていません。<br>");
    $s->display('error_message.tpl');
    //print('パスワードが未入力です。');
}
else if(mb_strlen($_POST['password']) > 10)
{
    $s->assign('error_message',"パスワードは10文字以内で入力してください。。<br>");
    $s->display('error_message.tpl');
    //print"パスワードは10文字以内で入力してください";
}

else if (!empty($_POST['name']) && !empty($_POST['password'])){

    //ユーザIDとパスワードが入力されていたら認証する
    require_once 'DbManager.php';

//エラー処理
    try {

        $db = getDb();
        $db->exec('SET NAMES utf8');
        // 入力した名前を格納
        $name = $_POST['name'];
        //var_dump($name);
        //入力したパスワードを格納
        $password = $_POST['password'];
        //var_dump($password);
        //SQLインジェクション対策
        $stmt = $db->prepare('SELECT * FROM member_table WHERE name = ? AND password = ?');
        $stmt->bindValue(1, $name, PDO::PARAM_STR);
        $stmt->bindValue(2, $password, PDO::PARAM_STR);
        $stmt->execute();
        //var_dump($stmt);

        $stmt->setFetchMode(PDO::FETCH_ASSOC);

        foreach ($stmt as $row) {

            if (($name == $row['name']) && $password == $row['password']) {
                //print('ログイン成功に成功しました。');

                session_regenerate_id(true);

                $_SESSION['NAME'] = $row['name'];
                $_SESSION['ID'] = $row['id'];
                $s->assign('action','ログイン');
                $s->display('complete.tpl');
                //header('Location:' . dirname($_SERVER['PHP_SELF']) . '/board2.php');  // メイン画面へ遷移

            } else {
                // 認証失敗
                $s->assign('error_message','ユーザーIDあるいはパスワードに誤りがあります。');
                $s->display('error_message.tpl');
                //print('ユーザーIDあるいはパスワードに誤りがあります。');
            }

        }

    } catch (PDOException $e) {
        $s->assign('error_message',"接続エラー:{$e->getMessage()}");
        $s->display('error_message.tpl');
        //die("接続エラー:{$e->getMessage()}");
    }
}
?>