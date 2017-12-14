<?php
//require_once'../Dbmanagerforselfphp.php';

try{

  //  $db=getDb();
    $dsn = 'mysql:dbname = self; host=127.0.0.1';
    $usr = 'root';
    $db = new PDO($dsn,$usr);
    $db->exec('SET NAMES utf8');

    //$stt = $db->prepare('SELECT * FROM book');
    $stt = $db->prepare('INSERT INTO book (isbn, title, price, publish, published) VALUES (:isbn, :title, :price, :publish, :published)');

    $stt->bindValue(':isbn', $_POST['isbn']);
    $stt->bindValue(':title', $_POST['title']);
    $stt->bindValue(':price',$_POST['price']);
    $stt->bindValue(':publish',$_POST['publish']);
    $stt->bindValue(':published',$_POST['published']);

    //var_dump($stt);

    $stt->execute();

   // var_dump($stt->rowCount());
    $db = NULL;
  //  $stt->commit();
  //  header('Location: ./insert_form.php');
    //die();
}catch(PDOException $e) {
    die("エラーメッセージ:{$e->getMessage()}");
}

header('Location: http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']).'/insert_form.php');