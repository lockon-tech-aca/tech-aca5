<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>掲示板1</title>
    </head>
    <body>
        <form method="POST" action=index2.php>
            ID:<br/>
            <input type="int" name="name" size="15">
            <br/>
           名前:<br/>
            <input type="int" name="name2" size="15">
             <br />コメント：<br />
             <br />
             <textarea name="comment" cols="30" rows="5"></textarea><br />
             <br />
             <text name="contents" cols="30" rows="5"><br />
              <input type="submit" value="登録する" />
              
              
  
        <?php
        $dsn ='mysql:board1_db=index.php; host=localhost';
        $usr ='root';
        $passwd = 'root';
        
        try{
            $db = new PDO($dsn,$usr,$passwd);
            print '接続に成功しました。';
            $db = NULL;
            
        }catch (PDOException $e){
            die("接続エラー: {$e->getmessage()}");
            } 
          
          /*try{
              $stt = $db->prepare ('INSERT INTO book(:ison,:title,:price)');
          } catch(PDOException $e){
              die("エラー:{$e->getmessage()}");
          }*/
            
        
     
        
        
  
        ?>
    </body>
</html>
