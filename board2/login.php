<?php
session_start();

if (isset($_POST['login'])){

    $name=$_POST['name'];
    $password=$_POST['password'];


    if ($name==='') {
        $error = 'ユーザー名を入力してください';
    } elseif ($password==='') {
        $error = 'パスワードを入力してください。';
    }else{

        try {
            require('db_connection.php');
            $statement = $pdo->query("SELECT * from member_table");

            foreach ($statement as $stt) {

                if($name===$stt['name'] and $password===$stt['password']) {
                    $_SESSION['username'] = $stt['name'];
                    $_SESSION['id']=$stt['id'];
                    header('Location: http://localhost/tech-aca5/board2/show.php');
                    exit;
                }else{
                    $_SESSION['username']=null;
                    $_SESSION['id']=null;
                    $error='ユーザ名かパスワードが違います。';
                }
            var_dump($_SESSION['username']);
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>ログイン</title>
    </head>
    <body>
        <h2>ログイン</h2>
        <form method="post" action="login.php">
            ユーザ名：<input type="text" name="name"><br>
            パスワード：<input type="password" name="password">
            <input type="submit" name="login" value="ログイン">
        </form>
    </body>
</html>
<?php
if(isset($error)){
    print $error;
}