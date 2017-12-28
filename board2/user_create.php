<?php

require_once('Smarty.class.php');

$smarty = new Smarty();
$smarty -> template_dir = 'templates/';
$smarty -> compile_dir = 'templates_c/';

if(isset($_POST['registration'])) {

    $name = $_POST['name'];
    $password = $_POST['password'];
    $confirmation = $_POST['confirmation'];

    require ('db_connection.php');

//ユーザ情報を$usersに格納
    $users = $pdo -> query("select name from member_table");

    foreach ($users as $user) {

        if ($name == $user['name']) {
            $duplication = true ;
        }

    }

    if ($name == '') {

        $smarty -> assign('error', 'ユーザー名を入力してください');

    } elseif ($password == '') {

        $smarty -> assign('error', 'パスワードを入力してください。');


    } elseif ($password !== $confirmation) {

        $smarty -> assign('error', '入力した２つのパスワードが違います。');

    } elseif ($duplication === true) {

        $smarty -> assign('error', 'そのユーザ名は既に存在します。');

    } else {

        try {

            $user = $pdo -> prepare("insert into member_table(name, password) values(:name, :password)");
            $user -> bindValue(':name', $name);
            $user -> bindValue(':password', $password);
            $user -> execute();

        } catch (PDOException $e) {
            print "エラー:{$e->getMessage()}";
        }

        $pdo = null;

        header('Location: http://localhost/tech-aca5/board2/show.php');
        exit;
    }

}

$smarty -> display('user_create.html');