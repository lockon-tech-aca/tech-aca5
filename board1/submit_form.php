<?php

if(isset($isId, $isName, $isContents)){
    
    // 名前が空のとき
    if(!$isName){
	print '名前が入力されていません。<br>';
    }
    
    // 内容が空のとき
    if(!$isContents){
	print '内容が入力されていません。<br><br>';
    }
}
?>

<form name="post" method="post" action="board1_index.php">
    名前：<input type="text" name="name"><br><br>
    内容：<br>
  <textarea name="contents" rows="10" cols="30"></textarea><br>
  <input type="submit" value="送信">
</form>
