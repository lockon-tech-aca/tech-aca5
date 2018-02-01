
<html>
    <head><title>PHP TEST</title></head>
    <body>

	<?php
	
	$dsn = 'mysql:dbname=sample01; host=127.0.0.1; charset=utf8';
	$user = 'root';
	$password = '';

	try{
	    $dbh = new PDO($dsn, $user, $password);

	    print('<br>');

	    if ($dbh == null){
		print('接続に失敗しました。<br>');
	    }else{
		print('接続に成功しました。<br>');
	    }
	    $sql = 'SELECT * FROM name ';

	    
	    
	    $state = $dbh->query($sql);
	    
	    if($state==false){
		$err = $dbh->errorInfo();
		echo $err[2] . "\n";
	    }

	    $row_count = $state->rowCount();

	    //$result = $state->fetchall(PDO::FETCH_NUM);

	    
	    foreach($state as $loop){

		echo "id = ".$loop['id'].PHP_EOL;
		echo "name = ".$loop['name'].PHP_EOL;
		print('<br>');
		
	    }

	    
	    
	}catch (PDOException $e){
	    print('Error:'.$e->getMessage());
	    die();
	}

	$dbh = null;

	?>

    </body>
</html>
