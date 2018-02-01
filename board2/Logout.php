<?php
session_start();

if(isset($_SESSION["NAME"])){
     $errorMessage="ログアウトしました。";
} else{
    $errorMessage="セッションがタイムアウトされました。";
}


$_SESSION =array();
@session_destroy();

?>
<html>
<head>
     <meta charset="UTF-8">
    <title>ログアウト</title>
</head>
<body>

 <h1>ログアウト画面</h1>
 <div><?php echo htmlspecialchars($errorMessage, ENT_QUOTES); ?>
 </div>
<ul>
    <li><a href="Login.php">ログイン画面に戻る</a></li>
</ul>
</body>
</html>



