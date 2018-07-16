<?php      

        function getDb() {
        $dsn ='mysql:dbname=board2_db; host=127.0.0.1';
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
        
    