<?php
/*データがフォームから送られて来た時*/
if(isset($_POST["name"], $_POST["contents"])){ 

  //名前が空のとき
  if($_POST["name"] == ''){
    $isName = false;
  }else{
    $isName = true;
  }
 
  // 内容が空のとき
  if($_POST["contents"] == ''){
    $isContents = false;
  }else{
    $isContents = true;
  }
}
?>
 
<?php
// データベースに追加する
if(isset($isName, $isContents)){
  if($isName && $isContents ){
 
    try{
      $pdo->beginTransaction();
      // SQL文
      $sql = "INSERT INTO post_table ( name, contents) VALUES ( :_name, :_contents)";
      
      $state = $pdo->prepare($sql);

      // 値を結びつける
      $state -> bindValue(":_name", $_POST["name"], PDO::PARAM_STR);
      $state -> bindValue(":_contents", $_POST["contents"], PDO::PARAM_STR);

      // 実行
      $state -> execute();

      $pdo -> commit();
 
    }catch(PDOException $Exception){
      $pdo -> rollBack(); 
      $errorMessage = "データベースエラー"
    }
  }
}
?>