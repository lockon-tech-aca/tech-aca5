<?php

require_once './smarty/Smarty.class.php';

$smarty = new Smarty();
$smarty -> template_dir = 'templates/';
$smarty -> compile_dir = 'templates_c/';


if (isset($_POST['login'])){

    $name = $_POST['name'];
    $password = $_POST['password'];


    if ($name === '') {

        $smarty -> assign('error' , 'ユーザー名を入力してください');

    } elseif ($password === '') {

        $smarty -> assign('error' , 'パスワードを入力してください。');

    }else{

        try {

            require('db_connection.php');


            $users = $pdo->query("SELECT * from member_table");

            session_start();
            $_SESSION['username'] = null;
            $_SESSION['id'] = null;
            $smarty -> assign('error' , 'ユーザ名かパスワードが違います。');

            foreach ($users as $user) {

                if($name === $user['name'] and $password === $user['password']) {

                    $_SESSION['username'] = $user['name'];
                    $_SESSION['id'] = $user['id'];
                    header('Location: ./show.php');
                    exit;

                }
            //var_dump($_SESSION['username']);
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}

$smarty->display('login.html');
