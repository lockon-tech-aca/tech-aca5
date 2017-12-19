<html>
    <head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>電卓</title>
    </head>
    <body>

	<form action="calc.php" method="post">
	    

	    <input type="submit" name="0" value ="0">
	    <input type="submit" name="1" value ="1">
	    <input type="submit" name="2" value ="2">
	    <input type="submit" name="3" value ="3">
	    <br>
	    <input type="submit" name="4" value ="4">
	    <input type="submit" name="5" value ="5">
	    <input type="submit" name="6" value ="6">
	    <input type="submit" name="7" value ="7">
	    <br>
	    <input type="submit" name="8" value ="8">
	    <input type="submit" name="9" value ="9">
	    <input type="submit" name="left_pare" value ="(">
	    <input type="submit" name="right_pare" value =")">
            
            <br>
            <input type="submit" name="add" value="+">
            <input type="submit" name="substract" value="-">
            <input type="submit" name="multiply" value="*">
            <input type="submit" name="divide" value="/">
	    <input type="submit" name="equal" value="=">
	    <input type="submit" name="clear" value="AC">
	    <input type="submit" name="delete" value="D">
	    
	    <hr>
	    <input type="submit" name="history" value="履歴">
	    <input type="submit" name="c_history" value="履歴削除">

	    
	    
	    <?php  
	    
	    /*変数の初期化*/
	    $suji = NULL;
	    $operator = NULL;
	    $pare = NULL;

	    $suji = get_suji();
	    $operator = get_operater();
	    $pare = get_pare();
	    ?>
	    
	    <hr>

	    <?php
	    if(isset($suji))
		$new_fomula = update_fomula_file($suji, "fomula.txt");
	    if(isset($pare))
		$new_fomula = update_fomula_file($pare, "fomula.txt");
	    if(isset($operator))
		$new_fomula = update_fomula_file($operator, "fomula.txt");
	    if(isset($_POST['equal'])){
		$new_fomula = update_fomula_file('=', "fomula.txt");
		reset_file("fomula.txt");
		$fp = fopen("history.txt","a");
		fwrite($fp, $new_fomula."\r\n");
		fclose($fp);
	    }
	    if(isset($_POST['delete'])){
		$new_fomula = delete_oneleter("fomula.txt");
	    }
	    if(isset($new_fomula))
		echo $new_fomula;	    
	    ?>

	    

	    <?php
	    /*全消去*/
	    if(isset($_POST['clear']))
		reset_file("fomula.txt");	
	    ?>

	    <?php
	    /*履歴関係*/
	    if(isset($_POST['history'])){
		$history = file_get_contents('history.txt');
		print(nl2br($history));
	    }
	    if(isset($_POST['c_history'])){
		reset_file("history.txt");
		echo "履歴を削除しました";
	    }
	    ?>

	    <?php
	    function get_suji(){
		if(isset($_POST['0'])){
		    return 0;
		}
		if(@$_POST['1']){
		    return 1;
		}
		if(@$_POST['2']){
		    return 2;
		}
		if(@$_POST['3']){
		    return 3;
		}
		if(@$_POST['4']){
		    return 4;
		}
		if(@$_POST['5']){
		    return 5;
		}
		if(@$_POST['6']){
		    return 6;
		}
		if(@$_POST['7']){
		    return 7;
		}
		if(@$_POST['8']){
		    return 8;
		}
		if(@$_POST['9']){
		    return 9;
		}
	    }
	    ?>

	    <?php  
	    function get_operater(){
		if(@$_POST['add']){
		    return '+';
		}
		if(@$_POST['substract']){
		    return '-';
		}
		if(@$_POST['multiply']){
		    return '*';
		}
		if(@$_POST['divide']){
		    return '/';
		}
	    }
	    ?>


	    <?php 
	    function get_pare(){
		if(isset($_POST['left_pare'])){
		    return "(";
		}
		
		if(isset($_POST['right_pare'])){
		    return ")";
		}
	    }
	    ?>

	    <?php
	    /*
	     **　ファイルを初期化する関数
	     ** 引数
	     ** $file: 初期化したいファイル名
	     ** 返り値
	     ** 初期化したファイルに記述されている文字列("")
	     */
	    function reset_file($file){
		$fp = fopen($file,"w");
		fclose($fp);
		return file_get_contents($file);
	    }
	    ?>


	    <?php  
	    /*
	     ** 式が保存してあるファイルを更新する関数
	     **
	     ** 引数
	     ** $elem        : 追加したい要素(数字、括弧、演算子)
	     ** $fomula_file : 式を保存しているファイル名          
	     ** 返り値 
	     ** 更新したファイルに記述されている文字列
	     */
	    function update_fomula_file($elem, $fomula_file){
		if($elem == '+' or $elem == '-' or $elem == '*' or $elem == '/'){
		    $new_fomula = file_get_contents($fomula_file) . " $elem ";
		    file_put_contents($fomula_file, $new_fomula);
		}
		else if($elem == '='){
		    
		    $shikis = file("$fomula_file");
		    
		    require "keisan.php";

		    $expression = $shikis[0];

		    $RPN = ConvRPN($expression);

		    $answer = calcRpn($RPN);

		    if($answer == NULL)
			return "0で割るなよ";
		    $new_fomula = file_get_contents($fomula_file) . " = " . "$answer";
		    
		}
		else{
		    $new_fomula = file_get_contents($fomula_file) . "$elem";
		    file_put_contents($fomula_file, $new_fomula);
		    
		}
		return $new_fomula;
	    }
	    ?>


	    <?php
	    /*一文字消去*/
	    function delete_oneleter($fomula_file){
		
		$now_fomula = file_get_contents($fomula_file);
		
		$pre_fomula =  substr($now_fomula, 0, strlen($now_fomula) - 1);
		
		//文末が空白であった場合は削除
		$pre_fomula = rtrim($pre_fomula);
		file_put_contents($fomula_file, $pre_fomula);
		return $pre_fomula;
	    }
	    ?>


	    

	    
	    
        </form>
    </body>
</html>
