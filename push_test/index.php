<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>POST_SAMPLE</title>
</head>
<body>

<form method="POST" action="index.php">
	<input type="text" name="data1" />
  <input type="radio" name="example" value="plus">+
  <input type="radio" name="example" value="minus">-
  <input type="radio" name="example" value="multiply">×
  <input type="radio" name="example" value="divide">÷
  <input type="text" name="data2" /><br />
	<input type="submit" name="send" value="＝" />

  <?php
  $ans = null;

	if(isset($_POST['send'])){
		  // すべてに値が入ってるとき
	  if (isset($_POST["data1"]) && isset($_POST["data2"])) {

			// 全角数字を半角数字に変換
	    $data1 = mb_convert_kana($_POST["data1"], "n", "utf-8");
	    $data2 = mb_convert_kana($_POST["data2"], "n", "utf-8");

			// 数値が入力されているか判定
	    if (is_numeric($data1) && is_numeric($data2)) {
				if (isset($_POST["example"])) {
	      	switch ($_POST["example"]) {
	        	case "plus":
	          	$ans = $data1 + $data2;
	          	break;
	        	case "minus":
	          	$ans = $data1 - $data2;
	          	break;
	        	case "multiply":
	          	$ans = $data1 * $data2;
	          	break;
	        	case "divide":
	          	if ($data2 == "0") {
	            	$ans = "0でわるのはだめです";
	          	} else {
	            	$ans = $data1 / $data2;
	          	}
	          	break;
	      	}
				} else {
					$ans = "記号を入力してください。";
				}
			} else {
	      $ans ="数値を入力してください。";
	    }
	  }
	}
  ?>
	<input type="text" name="result" value="<?php echo $ans; ?>"/>

</form>
</body>
</html>
