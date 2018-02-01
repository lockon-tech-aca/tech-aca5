<?php

/*データがフォームから送られて来た時*/
if(isset($_POST["contents"])){ 
 
  // 内容が空のとき
  if($_POST["contents"] == ''){
      $errorMessage = '内容が入力されていません';
  }
  else{
      try{
          $pdo->beginTransaction();

          $sql = "INSERT INTO post_table ( user_id, contents) VALUES ( :_user_id, :_contents)";
          
          $state = $pdo->prepare($sql);
          
          $state -> bindValue(":_user_id", $_SESSION["USER_ID"], PDO::PARAM_STR);
          $state -> bindValue(":_contents", $_POST["contents"], PDO::PARAM_STR);
          
          $state -> execute();
          
          $pdo -> commit();
          
      }catch(PDOException $Exception){
          $pdo -> rollBack(); 
          $errorMessage = $Exception -> getMessage();
      }
  }
}
