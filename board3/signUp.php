<?php
require_once('common.php');
require_once('dbConnection.php');


session_start();

/*エラーメッセージの初期化*/
$errorMessage = "";

/*ログイン画面へ移動*/
if(isset($_POST["action"]) && $_POST["action"]=="login_form"){
    header("Location: login.php");  
    exit();  
}

/*新規登録を押した場合*/
if(isset($_POST["action"]) && $_POST["action"]=="signUp"){
    
    if(!$_POST["user_name"]){
	
	$errorMessage = 'ユーザー名が未入力です';

	
    }else if(!$_POST["password"]){

	$errorMessage = 'パスワードが未入力です';
	
    }

    if($_POST["user_name"]&&$_POST["password"]){

	$user_name = $_POST["user_name"];

	$password = $_POST["password"];

	$password = password_hash($password, PASSWORD_DEFAULT);

	$pdo = dbConnection("board3_db");

	try{
	    $pdo -> beginTransaction();
	    
	    $sql = "INSERT INTO member ( name, password) VALUES ( :_name, :_password)";
	    
	    $state = $pdo -> prepare($sql);

	    
	    $state -> bindValue(":_name", $user_name, PDO::PARAM_STR);
	    $state -> bindValue(":_password", $password, PDO::PARAM_STR);

	    
	    $state -> execute();

	    $pdo -> commit();
	    
	}catch(PDOException $Exception){
	    $pdo -> rollBack(); 
	    $errorMessage = $Exception -> getMessage();
	}
	
	/*ユーザーIDを取得*/

	$sql = "SELECT * FROM member WHERE name = '$user_name'";

	$state = $pdo -> prepare($sql);

	$state -> execute();

	$data = $state -> fetch(PDO::FETCH_ASSOC);

	/*テンプレートに値を渡す*/
	$smarty->assign( 'user_id', $data["id"] );
	$smarty->assign( 'user_name', $user_name);
	
	
    }
    /*エラー情報をわたす*/
    $smarty->assign( 'errorMessage', $errorMessage);
}

$smarty->display('signUp.tpl');

