<?php
require_once './vendor/autoload.php';
$s = new Smarty();
$s->template_dir = './templates/';
$s->compile_dir = './templates_c/';

//エラーメッセージを初期化
$s->assign('error_message','');
//完了メッセージを初期化
$s->assign('action','');
//再実行メッセージを定義
$s->assign('reaction','新規登録');

if (empty($_POST['name']) || empty($_POST['password']))
{
    $s->assign('error_message','名前とパスワードが入力されていません。<br>');
    $s->display('error_message.tpl');
}

else if(mb_strlen($_POST['name']) > 10)
{
    $s->assign('error_message','名前は10文字以内で入力してください<br>');
    $s->display('error_message.tpl');
}

else if(mb_strlen($_POST['password']) > 10)
{
    $s->assign('error_message','パスワードは10文字以内で入力してください<br>');
    $s->display('error_message.tpl');
}

else  {
    require_once './DbManager.php';
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
                $s->assign('error_message','入力された名前は既に使用されています。別の名前を入力してください。<br>');
                $s->display('error_message.tpl');
                exit();
            }
        }
        $stt = $db->prepare('INSERT INTO member_table(name,password) VALUES(:name, :password)');
        $stt->bindValue(':name', $_POST['name'],PDO::PARAM_STR);
        $stt->bindValue(':password', $_POST['password'],PDO::PARAM_STR);
        $stt->execute();
        $db = NULL;
        $s->assign('action','登録');
        $s->display('complete.tpl');
    }
    catch(PDOException $e){
        $s->assign('error_message',"接続エラー:{$e->getMessage()}");
        $s->display('error_message.tpl');
    }
    //header('Location:' . dirname($_SERVER['PHP_SELF']) . '/Login.php');

}


?>