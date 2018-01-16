<?php
require_once 'DbManager.php';
session_start();

try {
    $db = getDb();
    $stt = $db->prepare('update post_table set id =:id where contents = :contents');
    $stt->bindValue(':id', $_POST['id']);
    $stt->bindValue(':contents', $_POST['contents']);
    $stt->execute();
    $db = NULL;

    $sql = 'update テーブル名 set name =:name where id = :value';
    $stmt = $pdo -> prepare($sql);
    $stmt->bindParam(':name', $name, PDO::PARAM_STR);
    $stmt->bindValue(':value', 1, PDO::PARAM_INT);
    $stmt->execute();
}catch(PDOException $e){
    die("エラーメッセージ:{$e->getMessege()}");
}
//処理後は入力フォームにリダイレクト
header('Location: http://localhost/tech-aca5/board2/afterLogin.php');
?>


</body>
</html>