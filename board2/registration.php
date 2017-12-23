<?php

$name=$_POST['name'];
$password=$_POST['password'];
$confirmation=$_POST['confirmation'];


require('db_connection.php');

//ユーザ情報を$statementに格納
$statement = $pdo->query("select * from member_table");

foreach ($statement as $stt) {
    if($name===$stt['name']){
        session_start();
        $_SESSION['reg_error']='そのユーザ名は既に存在します';
        header('Location: http://localhost/tech-aca5/board2/user_create.php');
        exit;
    }
}

if($name==''){

    session_start();
    $_SESSION['reg_error']='ユーザ名を入れてください';
    header('Location: http://localhost/tech-aca5/board2/user_create.php');
    exit;

}elseif($password==''){

    session_start();
    $_SESSION['reg_error']='パスワードを入力してください';
    header('Location: http://localhost/tech-aca5/board2/user_create.php');
    exit;

}elseif($password!==$confirmation){

    session_start();
    $_SESSION['reg_error']='2つのパスワードが違います。';
    header('Location: http://localhost/tech-aca5/board2/user_create.php');
    exit;

}else{
    $_SESSION['reg_error']=null;

    require('db_connection.php');
    $statement = $pdo->query("select * from member_table");

    try {
        //insert
        $stt = $pdo->prepare("insert into member_table(name, password) values(:name, :password)");
        $stt->bindValue(':name', $name);
        $stt->bindValue(':password', $password);
        $stt->execute();
    } catch (PDOException $e) {
        print "エラー:{$e->getMessage()}";
    }

    //接続を切る
    $pdo = null;

    header('Location: http://localhost/tech-aca5/board2/show.php');
    exit;
}