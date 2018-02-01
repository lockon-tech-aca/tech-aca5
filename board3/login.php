<?php
require_once('common.php');
require_once('dbConnection.php');

session_start();

//エラーメッセージの初期化
$errorMessage = "";



if(isset($_POST["action"]) && $_POST["action"] == "login"){
    
    if(!$_POST["user_id"]){
	
	$errorMessage = 'ユーザーIDが未入力です。';
	
    }else if(!$_POST["password"]){
	
	$errorMessage = 'パスワードが未入力です。';
	
    }

    if($_POST["user_id"]&&$_POST["password"]){
        $user_id = $_POST["user_id"];

        $password = $_POST["password"];

        $pdo = dbConnection("board3_db");
        
        $sql = "SELECT * FROM member WHERE id = '$user_id'";
	
        $state = $pdo -> prepare($sql);
	
        $state-> execute();
	
        $data= $state -> fetch(PDO::FETCH_ASSOC);

	/*ユーザーidが一致したらパスワードをチェック*/
	if($data){
	    if(password_verify($password, $data["password"])) {

		session_regenerate_id(true);
		
		$_SESSION["NAME"] = $data["name"];

		$_SESSION["USER_ID"] = $user_id;

		header("Location: board2_index.php");  
                exit();  
		
            } else {
		$errorMessage = '無効なパスワードです。';
            }
	}
        
    }

    $smarty -> assign('errorMessage', $errorMessage);
}

$smarty->display('login.tpl');
