<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <a href="http://www.nnh.to/<?php print date("m") ?>
       /<?php print date("d") ?>.html"></a>
    </head>
    <body>
        <?php
        
        echo date("/m/01");
        // put your code here
         error_reporting(0);
   
          
             require_once ('./DbManager2.php');
             
   

        try{
           $db = getDb();
           
      $stmt  = $db->prepare ("INSERT INTO keijibann( name,honnbunn) VALUES(:name, :honnbunn)");

      $name = $_POST["name"];
      $honnbunn = $_POST["honnbunn"] ;
           
$stmt->bindValue(':name', $name);
$stmt->bindValue(':honnbunn', $honnbunn);

            $stmt->execute();   //新しくメンバーを追加する
             
        }catch(PDOException $e){
           
            die("errorメッセージ:{$e->getMessage()}");
            
        }
       
       $dbh = new PDO ('mysql:host=localhost;dbname=kinennbi','root','root') ;    
       $sql = "SELECT * FROM keijibann";
       $stmt = $dbh->query($sql);
     
        //var_dump($dbh);
// foreach文で配列の中身を一行ずつ出力
foreach ($stmt as $rows) {
 
  // データベースのフィールド名で出力
  echo $_POST["name"].$rows['honnbunn'];
 
  // 改行を入れる
  echo '<br>';

}   
         
        ?>
    </body>
</html>
