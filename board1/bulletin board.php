<?php
/**
 * Created by PhpStorm.
 * User: Meee
 * Date: 2017/11/28
 * Time: 18:44
 */
//$db_host = '127.0.0.1:3306';//接続先ホスト(サーバー)
//$db_name = 'board1_db';//Mysqlデーダベース(スキーマ)
//$db_user = 'root';//Mysqlユーザ名
//$db_pass ='root';//Mysqlパスワード
//
//$link = mysqli_connect($db_host,$db_user, $db_pass, $db_name);
//if(!$link){
//    echo"Error";
//    exit;
//
//}
//
//echo"Success";
//この上消す
$dsn ='mysql:dbname=board1_db; host=127.0.0.1';
$usr ='root';
$passwd ='root';
try {
    $db = new PDO($dsn, $usr, $passwd);
    print '接続に成功しました';
    $db = NULL;
}catch(PODException $e){
    die("接続エラー：{$e->getMessage()}");
    }

//PDOクラス
//    new PDO(string $dsn [, string $user [, strind $password [, array $options]])
////
//into PDO::(string $statement)
//    $statement:任意のクリエ
//}
//p332コピる

//dbに接続

//$result = mysqli_query($link,'select * from post_table');
//＝sql実行
//
//while ($row = mysqli_fetch_array($result, MYSQLI_NUM) ){
//     echo $row[0] . $row[1] . $row[2]  ;
////     echo "¥n";
////    結果表示
//
//    $result= mysqli_query($link,'insert )
//}


//mysqli_close($link);
?>





<!--try{ catch-->





<html>
<head>
    <meta http-equiv="content-type" content="text/html"; charset=utf-8>
    <title>掲示板
    </title>
</head>
<body>
 <form method="post" action="try">
    名前<input type="text" name="title" size="20" />
    コメント<textarea name="comment" rows="4" cols="20"></textarea>
    <input type="submit" name="send" value="書き込む"/>
</form>
<!--書き込まれたデータ表示>

</body>

</html>
