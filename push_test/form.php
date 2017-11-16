<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>電卓</title>
<script language="javascript">
	function myValue($num) {
		$value = document.dentaku.result.value;
		$new = $value + $num;
		document.dentaku.result.value = $new;
	}
</script>
</head>

<body>
	<?php
		// keepの値確認
		if(isset($_POST["hidden"])) {
			$keep =$_POST["hidden"];
		} else {
			$keep = null;
		}


		// POST
		if (isset($_POST["all"])) {							// Cを押したとき
			$result = null;
		} elseif(isset($_POST["delete"])) {			// deleteを押したとき
			$text = $_POST["result"];
			$result = substr($text, 0, -1);
		} elseif(isset($_POST["keep"])) {				// keepを押したとき
			if(!isset($keep)) {
				$keep = $_POST["result"];
			} else {
				if (preg_match("/[a-zA-Z]/", $_POST["result"])) {
					$error = "英字が含まれています";
				} else {
					$keep = $keep."\n".$_POST["result"];
				}
			}
			$result = $_POST["result"];
		} elseif (isset($_POST["send"])) {			// ＝を押したとき
		  if (isset($_POST["result"]) && !empty($_POST["result"])) {
				// 計算する
				$text = $_POST["result"];
				$shiki = sprintf('$kekka=%s;',$text);
				// エラー時
				if (strpos($shiki,'/0') !== false) {
					$error = "0以外の数で割ってください";
					$result = null;
				} elseif (strpos($shiki,'/.') !== false || strpos($shiki,'*.') !== false ) {
					$error = "小数点の位置がおかしいです";
					$result = null;
				} elseif(preg_match("/[a-zA-Z]/", $_POST["result"])) {
					$error = "英字が含まれています";
					$result = null;
				}	else {
				// 正常時
					eval($shiki);
					$result = $kekka;
				}
			} else {
				// 値が入ってなかったとき
				$result = null;
			}
		}
		echo $keep;
	?>


	<form name="dentaku" method="POST" action="form.php">
		<input type="text" size="12" name="result" readonly="readonly" value="<?php if (isset($result)) {echo $result;}	?>">
		<input type="submit" name="all" value=" C "><br />
		<input type="submit" name="keep" value=" keep ">
		<input type="submit" name="delete" value=" delete "><br />
		<?php if (isset($error)) { echo $error; } ?><br />
		<input type="hidden" name="hidden" value="<?php echo $keep;	?>">

		<table>
			<tr>
				<td align="center"><input type="button" value=" ( " onclick="myValue('(')"></td>
				<td align="center"><input type="button" value=" ) " onclick="myValue(')')"></td>
			</tr>
			<tr>
				<td align="center"><input type="button" value=" 7 " onclick="myValue(7)"></td>
				<td align="center"><input type="button" value=" 8 " onclick="myValue(8)"></td>
				<td align="center"><input type="button" value=" 9 " onclick="myValue(9)"></td>
				<td align="center"><input type="button" value=" ÷ " onclick="myValue('/')"></td>
			</tr>
			<tr>
				<td align="center"><input type="button" value=" 4 " onclick="myValue(4)"></td>
				<td align="center"><input type="button" value=" 5 " onclick="myValue(5)"></td>
				<td align="center"><input type="button" value=" 6 " onclick="myValue(6)"></td>
				<td align="center"><input type="button" value=" × " onclick="myValue('*')"></td>
			<tr>
			<tr>
				<td align="center"><input type="button" value=" 1 " onclick="myValue(1)"></td>
				<td align="center"><input type="button" value=" 2 " onclick="myValue(2)"></td>
				<td align="center"><input type="button" value=" 3 " onclick="myValue(3)"></td>
				<td align="center"><input type="button" value=" - " onclick="myValue('-')"></td>
			<tr>
			<tr>
				<td align="center"><input type="button" value=" 0 " onclick="myValue(0)"></td>
				<td align="center"><input type="button" value=" . " onclick="myValue('.')"></td>
				<td align="center"><input type="submit" name="send" value=" = "></td>
				<td align="center"><input type="button" value=" + " onclick="myValue('+')"></td>
			<tr>
		</table>
	</form>
</body>
</html>
