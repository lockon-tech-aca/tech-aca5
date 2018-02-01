<?php

require_once './smarty/Smarty.class.php';

$smarty = new Smarty();
$smarty -> template_dir = 'templates/';
$smarty -> compile_dir = 'templates_c/';

session_start();

if(isset($_POST['insert'])) {

    $id = $_SESSION['id'];
    $contents = $_POST['contents'];


    if ($contents == '') {

        $smarty->assign('error', '投稿を入力してください');

    } else {

        require('db_connection.php');

        try {

            //insert
            $post = $pdo->prepare("insert into post_table(user_id, contents) values(:user_id, :contents)");
            $post->bindValue(':user_id', $id);
            $post->bindValue(':contents', $contents);
            $post->execute();

        } catch (PDOException $e) {
            print "エラー:{$e->getMessage()}";
        }

        //接続を切る
        $pdo = null;

    }
}


if(isset($_SESSION['username'])) {
    $smarty -> assign('name',$_SESSION['username']);
}

require('db_connection.php');

try {

    $posts = $pdo->query("select * from post_table");
    $posts = $posts ->fetchAll(PDO::FETCH_ASSOC);

    foreach ($posts as $post) {

        //post_tableのuser_idからmember_tableのnameを引き出す
        $sql = 'SELECT name FROM member_table where id = :user_id';
        $name = $pdo->prepare($sql);
        $name -> bindValue(':user_id' ,(int) $post['user_id'], PDO::PARAM_INT);
        $name -> execute();
        $username = $name -> fetch(PDO::FETCH_ASSOC);
        //var_dump($username);

        $post['name'] = $username['name'];

        $allposts[] = array($post);
    }

    //var_dump($allposts);
    $smarty -> assign('posts',$allposts);


    if(isset($_SESSION['id'])) {
        $smarty->assign('user_id', $_SESSION['id']);
    }

} catch ( PDOException $e ) {
    print "エラー:{$e->getMessage()}";
}


$smarty->display('show.html');