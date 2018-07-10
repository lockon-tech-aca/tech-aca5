<?php
  function getDb() {
    $dsn    = 'mysql:dbname=board1_db; host=127.0.0.1';
  	$usr    = 'root';
  	$passwd = '';

	  try {
      // DBへの接続を確立
			$db = new PDO($dsn, $usr, $passwd);
      
			// DB接続時に使用する文字コードをutf8に設定
  		$db->exec('SET NAMES utf8');
  	} catch (PDOException $e) {
	  	die("接続エラー:{$e->getMessage()}");
	  }

		return $db;
	}
?>
