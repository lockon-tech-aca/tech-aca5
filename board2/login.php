<?php
session_start();

$db['host'] ="localhost";
$db['user']="root";
$db['pass']="root";
$db['dbname']="board2_db";


$errorMessage="";

if(isset($_post["login"])){

    if(empty($_POST["userid"])){
        $errorMessage = 'ユーザーIDが未入力です。';

    } else if (empty($_POST["password"])){
        $errorMessage = 'パスワードIDが未入力です。';
    }
}

if(!empty($_POST["userid"]) && !empty($_POST["password"])){
    $userud = $_post["userid"];

    $dsn = sprintf('mysql: host=%s; dbname=%s; charset=utf8', $db['host'], $db['dbname']);


    try{
        $stmt =$pdo->prepare('SELECT * FROM userData WHERE id =?');
        $stmt->excute(array($userid));

        $password = $_POST["password"];

        if($row =$stmt->fetch(PDO::FETCH_ASSOC)){
            if(password_verify($password, $row['password'])){
                session_regenerate_id(true);


                $id=$row['id'];
                $sql="SELECT * FROM userDate WHERE id -$id";
                $stmt=$pdo->query($sql);
                foreach($stmt as $row){

                    $row['name'];
                }
               $_SESSION["NAME"]=$row['name'];
                header("Location: result.php");
                exit();
            } else{
                $errorMessage ='ユーザーID或いはパスワードに誤りがあります。';
            }
        } else{
            $errorMessage='ユーザーID或いはパスワードに誤りがあります。';
        }
    } catch (PDOException $e){
        $errorMessage='データベースエラー';
    }

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

