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
    </head>
    <body>
        <?php
          function getDb() {
        $dsn ='mysql:dbname=kinennbi; host=127.0.0.1';
        $usr ='root';
        $passwd = 'root';
        
        try{
            $db = new PDO($dsn,$usr,$passwd);
            $db->exec('SET NAMES utf8');
            
        }catch (PDOException $e){
            die("接続エラー: {$e->getmessage()}");
        }
        return $db ;
        }
        ?>
    </body>
</html>
