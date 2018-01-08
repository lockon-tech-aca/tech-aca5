<?php
require_once('common.php');
require_once('dbConnection.php');

session_start();
$errorMessage = "";

$pdo = dbConnection("board3_db");

$user_id = $_SESSION["USER_ID"];

/*投稿ページ*/
if(isset($_POST["index"])){
    header("Location: board2_index.php");
    exit();
}

/*投稿を削除*/
if(isset($_POST["delete"])){
    
	$delete_id = $_POST["delete"];
	
	try{
	    $pdo->beginTransaction();
	
	    $sql = "DELETE FROM post_table WHERE id = $delete_id";
	    
	    $state = $pdo->prepare($sql);
	    
	    $state -> execute();
	    
	    $pdo -> commit();
	    
	}catch(PDOException $Exception){
	    $pdo -> rollBack(); 
	    $errorMessage = $Exception -> getMessage();
	}
}


/*投稿を編集*/
if(isset($_POST["edit"])){
	
	$edit_id = $_POST["edit"];
	
	$sql = "SELECT * FROM post_table WHERE id = $edit_id";
	
	$state = $pdo -> prepare($sql);
	
	$state -> execute();
	
	$data = $state -> fetch(PDO::FETCH_ASSOC);

    $contents = $data["contents"];
    
    $smarty->assign('contents', $contents);
    $smarty->assign('edit_id', $edit_id);
}
/*投稿を編集*/
if(isset($_POST["edit_contents"])){
    
   	$edit_id = $_POST["edit_id"];
	
	$edit_contents = $_POST["edit_contents"];

	try{
	    $pdo->beginTransaction();

	    // SQL文
	    $sql = "UPDATE post_table SET contents = '$edit_contents' WHERE id = $edit_id";
	    
	    $state = $pdo->prepare($sql);
	    
	    // 実行
	    $state -> execute();
	    
	    $pdo -> commit();
	    
	}catch(PDOException $Exception){
	    $pdo -> rollBack(); 
	    $errorMessage = $Exception -> getMessage();
	}
}
	


/*自分の投稿を表示*/
$sql = "SELECT * FROM post_table WHERE user_id = $user_id";

$state = $pdo -> prepare($sql);

$state -> execute();

$data_count = $state -> rowCount();

if($data_count == 0){
    $errorMessage='書き込みがありません';
}

$data = $state -> fetchall();

$smarty->assign('data', $data);

$smarty->display('mypage.tpl');