<?php
//require 'password.php';
session_start();

//$db['host'] ="localhost";
//$db['user']="root";
//$db['pass']="root";
//$db['dbname']="board2_db";
require_once './DBManager.php';

$errorMessage="";

if(isset($_post["login"])){

    if(empty($_POST["userid"])){
        $errorMessage = 'ユーザーIDが未入力です。';

    } else if (empty($_POST["password"])){
        $errorMessage = 'パスワードIDが未入力です。';
    }
}

if(!empty($_POST["userid"]) && !empty($_POST["password"])) {
    $userid = $_post["userid"];
}

//$dsn = sprintf('mysql: host=%s; dbname=%s; charset=utf8', $db['host'], $db['dbname']);


//ユーザーIDでターブルから取ってきてあってるかチェック。
$sql = "SELECT * FROM member_table WHERE userid=?";
$stt = $db->prepare('SELECT * FROM member_table WHERE userid ORDER BY published DESC ');
$stt->bindValue(name,$_GET['id'],password );

$stt->execute();
//変数に入れて、配列に直す

$stt->bindColumn('name', $id, PDO::PARAM_BOOL);
$stt->bindColumn('name', $id, PDO::PARAM_BOOL);

if($stt->fetch(PDO::PARAM_BOOL))
//    p.356 データあってればー、なかったらー
header("Content-Type: {$type}");
orint $data;
}else{
    print '該当するデータがありません';
}
$db = NULL;
} catch(PDOException $e){
    die("エラーメッセージ': {$e->getMessage()}");

}



$stt = $dbh->query($sql);
foreach($stt as $row){
    echo $row['userid'].':'.$row[''];
}
//try{
//
//function getDb
//    $smt = $this->pdo->prepare('select *  member_table WHERE id =?\');
//   $smt->excute();
//
//}
//
//}
////    $pdo= getDb();
////    $stmt =$pdo->prepare('SELECT * FROM member_table WHERE id =?');
//
//
////    $stmt->excute(array($userid));
//
//    $password = $_POST["password"];

//    if($row =$stmt->fetch(PDO::FETCH_ASSOC)){
////      いらん！  if(password_verify($password, $row['password'])){まで！
//            session_regenerate_id(true);
//
//
//            $id=$row['id'];
//            $sql="SELECT * FROM member_table WHERE id =$id";
//            $stmt=$pdo->query($sql);
//            foreach($stmt as $row){
//
//                $row['name'];
//            }
//            $_SESSION["NAME"]=$row['name'];
//            header("Location: result.php");
//            exit();
//

//        いらん！} else{
//            $errorMessage ='ユーザーID或いはパスワードに誤りがあります。';
//        }


//    } else{
//        $errorMessage='ユーザーID或いはパスワードに誤りがあります。';
//    }
//} catch (PDOException $e){
//    $errorMessage='データベースエラー';
//}

?>

<html>
<head>

    <meta charset="UTF-8">
    <title>ログイン</title>
</head>

　<body>

<h1>ログイン画面</h1>
<form id="loginForm" name="loginForm" action="POST">
    <fieldset>
        <legend>ログインフォーム</legend>
        <div><font color="#ff0000"><?php echo htmlspecialchars($errorMessage, ENT_QUOTES); ?></font></div>
        <labe for="userid">ユーザーID</labe><input type="text" id=""userid name="userid
" p;aceholder="ユーザーIDを入力" value="<?php if(!empty($_POST["userid"])){echo htmlspecialchars($_POST["userid"], ENT_QUOTES);} ?>">
        <br>
        <label for="password">パスワード</label><input type="password" name="password" value="ログイン" placeholder="パスワードを入力">
        <br>
        <input type="submit" id="login" name="login" value="ログイン">
    </fieldset>
</form>
<br>
<form action="SignUp.php"
<fieldset>
    <legend>新規登録フォーム</legend>
    <input type="submit" value="新規登録">
</fieldset>
</body>
</html>

