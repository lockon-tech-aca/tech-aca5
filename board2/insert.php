<?php

$id=$_SESSION['id'];
$contents=$_POST['contents'];

session_start();

if($contents==''){

    $_SESSION['error']='投稿を入力してください';
    header('Location: http://localhost/tech-aca5/board2/show.php');
    exit;

}else{
    $_SESSION['error']=null;

    require('db_connection.php');

    try {
        //insert
        $stt = $pdo->prepare("insert into post_table(user_id, contents) values(:user_id, :contents)");
        $stt->bindValue(':user_id', $id);
        $stt->bindValue(':contents', $contents);
        $stt->execute();
    } catch (PDOException $e) {
        print "エラー:{$e->getMessage()}";
    }

    //接続を切る
    $pdo = null;

    header('Location: http://localhost/tech-aca5/board2/show.php');
    exit;
}