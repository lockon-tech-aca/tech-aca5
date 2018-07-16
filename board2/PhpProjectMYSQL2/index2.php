
<html>
    <head>
        <meta charset="UTF-8">
        <title>掲示板2</title>
    </head>
    <body>
        <br/>
         <?php print $_POST["id"]?>
         <?php print $_POST["password"]?>
         <?php print $_POST["name"]?>さん
         
         <br>
         <br>
       <h1> 何かが間違っている</h1>
</html>

        <?php
       /*function getDb(){ $dsn ='mysql:board2_db=index2.php; host=localhost';
        $usr ='root';
        $passwd = 'root';
        
        try{
            $db = new PDO($dsn,$usr,$passwd);
            print '接続に成功しました。';
            $db -> exec ('SET NAMES utf8');
            
        }catch (PDOException $e){
            die("接続エラー: {$e->getmessage()}");
            } 
          return $db;
       
            }*/
        

          require_once ('./DbManager.php');
          
          
        $dbh ='mysql:board2_db=index.php; host=localhost';
        $usr ='root';
        $passwd = 'root';

        try{
            $db = new PDO($dbh,$usr,$passwd);
            print '接続に成功しました。';
            $db = NULL;
            
        }catch (PDOException $e){
            die("接続エラー: {$e->getmessage()}");
            } 
          
            //PDOオブジェクトの生成


//prepareメソッドでSQLをセット

//$stmt = $pdo->prepare("SELECT * FROM member_table");

 

//bindValueメソッドでパラメータをセット

//$stmt->bindValue();

//$stmt->bindValue();

//executeでクエリを実行

//$stmt->execute();


//結果を表示
            
       $dbh = new PDO ('mysql:host=localhost;dbname=board2_db','root','root') ;    
       $sql = "SELECT * FROM member_table";
       $stmt = $dbh->query($sql);
     
        var_dump($dbh);
// foreach文で配列の中身を一行ずつ出力
foreach ($stmt as $rows) {
 
  // データベースのフィールド名で出力
  echo $rows['name'].$rows['id'].$rows['password'].'さん';
 
  // 改行を入れる
  echo '<br>';

}   

$idd = $_POST["id"];

$sql2 = "SELECT * FROM member_table WHERE id = $idd" ;
 

// SQLステートメントを実行し、結果を変数に格納
$stmt2 = $dbh->query($sql2);
 
// foreach文で配列の中身を一行ずつ出力
foreach ($stmt2 as $row) {
 
// データベースのフィールド名で出力
echo $row['name'].'：'.$row['password'];
}


if($_POST["password"]==$row['password'] && $_POST["name"]==$row['name']) {
    print "おｋ";
    print header('Location: http://localhost/kadai/index4.php');
exit;
    
}else{
    print "ng";
}





// エラーメッセージの初期化
$errorMessage = "";
 
// ログインボタンが押された場合
if (isset($_POST["name"])) {
  // １．ユーザIDの入力チェック
  if (empty($_POST["id"])) {
    $errorMessage = "ユーザIDが未入力です。";
  } else if (empty($_POST["password"])) {
    $errorMessage = "パスワードが未入力です。";
  } 
}
       

    


    
       /* $name=$_POST["name"];
        $i =  $name;
       
        if ($i=="isaka"){
        $name2=$_POST["name2"];
        $m = $name2;
        if($m==11111){
            print "合ってます";
        }else{
            print "間違ってます。";
        }
        
        }else{
            print "間違ってます";
        }
       
         
        
        try{
         $db = getDb();
            $stt = $db ->prepare('INSERT INTO table(member_table)  VALUES(:id, ;name , :password)');
            $stt->bindValue (';id',$POST['id']);
            $stt->bindValue (';name',$POST['name']);
            $stt->bindValue (';password',$POST['password']);
        }catch(PDOException $e){
            print "ログインできませんでした";
        }
       */

         
       error_reporting(0);
             require_once ('./DbManager2.php');
             
     /*  if(empty($_POST["honnbunn"])){
echo "ng";
}else{
    echo "ok";
}*/



        ?>
    </body>
</html>
