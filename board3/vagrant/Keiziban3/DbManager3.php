<?php
    //----------　DB接続の外部ファイル　----------

    function GetDb(){
        try{
            $dsn = 'mysql:dbname=board3_db;host=127.0.0.1;charset=utf8';
            $usr = 'dbusr3';
            $passwd = 'dbusr_pass3';

            //データベースへの接続を確立
            $db = new PDO($dsn, $usr, $passwd);  //データベースへの接続
            $db -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);    //接続オプション⇒ERRMODE_EXCEPTION：例外を発生⇒try～catchで処理。
            return $db;

        }catch(PDOException $e){

            die("接続エラー：{$e -> getMessage()}");

        }
    }










?>