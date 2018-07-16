<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        
             <br /> 
        <title>掲示板2</title>
        <form method="POST" action=index2.php>
<h1>ログイン</h1>
         <br />ID　:  
        <input type="int" name="id" size="15">
        <br />PASSWORD:  
        <input type="int" name="password" size="15">
         <br />NAME:
        <input type="int" name="name" size="15">
        <br/>
         <input type="submit" value="ログインする" />
         
        </form>
<h1>新規登録</h1>
        <form method="POST" action=index3.php>
        <br />ID　:  
        <input type="int" name="id" size="15">
        <br />PASSWORD:  
        <input type="int" name="password" size="15">
         <br />NAME:
        <input type="int" name="name" size="15">
        <br/>
         <input type="submit" value="追加する" />
         
        </form>
    </head>
    <body>
        
        
        <?php
        
 /* MariaDB [board2_db]> INSERT INTO `member_table` (`id`, `name`, `password`) VALUES(1, 'isaka' ,10030228);
Query OK, 1 row affected (0.08 sec)

MariaDB [board2_db]> INSERT INTO `member_table` (`id`, `name`, `password`) VALUES(2, 'rinako' ,111111);
Query OK, 1 row affected (0.06 sec)

MariaDB [board2_db]> INSERT INTO `member_table` (`id`, `name`, `password`) VALUES(3, 'keiko' ,222222);
Query OK, 1 row affected (0.02 sec)*/
        
        
        
        
   //接続をしてみて、それを呼び出すことはできても、そこから、合っているかどうかを試すソースコードを書く！
        

        
        $dsn ='mysql:board2_db=index.php; host=localhost';
        $usr ='root';
        $passwd = 'root';
        
        try{
            $db = new PDO($dsn,$usr,$passwd);
            print '接続に成功しました。';
            $db = NULL;
            
        }catch (PDOException $e){
            die("接続エラー: {$e->getmessage()}");
            } 
          
            
            
        ?>
        
      
    </body>
</html>
