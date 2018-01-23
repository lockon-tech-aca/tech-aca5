 <?php
       
       require_once ('./DbManager.php');
       
  /*if(empty($_POST["name"]) && empty($_POST["password"] ) && empty(($_POST["id"]))){
  //パスワードはハッシュ化する
 
  $stmt = $mysqli->prepare("INSERT INTO users VALUES (?, ?)");
  $stmt->bind_param(  $_POST["id"].$_POST["name"], $_POST["password"]);

  if($stmt->execute())
    $status = "ok";
  else
  	//既に存在するユーザ名だった場合INSERTに失敗する
    $status = "failed";
}
   */


if(empty($_POST["name"])){
echo "ng";
}elseif (empty($_POST["password"])){
echo "ng";
}elseif (empty($_POST["id"])){
  echo "NG";
}

        try{
           $db = getDb();
           
      $stmt  = $db->prepare ("INSERT INTO member_table(id, name, password) VALUES(:id, :name, :password)");
      $id = $_POST["id"] ;
      $name = $_POST["name"];
      $password = $_POST["password"] ;
           
                
$stmt->bindValue(':id', $id );
$stmt->bindValue(':name', $name);
$stmt->bindValue(':password', $password);


            $stmt->execute();   //新しくメンバーを追加する
            print "新規登録できた";
        }catch(PDOException $e){
            die("errorメッセージ:{$e->getMessage()}");
            
        }
        
        
?>