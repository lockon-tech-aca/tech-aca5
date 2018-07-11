<?php
/**
 * Created by PhpStorm.
 * User: kyoko
 * Date: 2017/12/05
 * Time: 18:05
 */
$name=$_POST['name'];
$contents=$_POST['contents'];

if($name==''){
    session_start();
    $_SESSION['error']='名前を入れてください';
    header('Location: http://localhost/tech-aca5_kyoko_hirai/board1/show.php');
    exit;
}elseif($contents==''){
    session_start();
    $_SESSION['error']='投稿を入力してください';
    header('Location: http://localhost/tech-aca5_kyoko_hirai/board1/show.php');
    exit;
}else{
    $_SESSION['error']=null;
    //接続
    require('db_connection.php');

    try {
        //insert
        $stt = $pdo->prepare("insert into post_table(name, contents) values(:name, :contents)");
        $stt->bindValue(':name', $name);
        $stt->bindValue(':contents', $contents);
        $stt->execute();
    } catch (PDOException $e) {
        print "エラー:{$e->getMessage()}";
    }

    //接続を切る
    $pdo = null;

    header('Location: http://localhost/tech-aca5_kyoko_hirai/board1/show.php');
    exit;
}
