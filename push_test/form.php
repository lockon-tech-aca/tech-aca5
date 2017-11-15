<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>POST_SAMPLE</title>
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
		if (isset($_POST["delete"])) {
			// Cを押したとき
			$result = null;
		} elseif (isset($_POST["send"])) {
			// ＝を押したとき
		  if (isset($_POST["result"]) && !empty($_POST["result"])) {
				$text = $_POST["result"];
				$shiki = sprintf('$kekka=%s;',$text);
				if (strpos($shiki,'/0') !== false || strpos($shiki,'/.') !== false) {
					$result = "0以外の数で割ってください";
				} else {
					eval($shiki);
					$result = $kekka;
				}
			} else {
				$result = null;
			}
		}
	?>


	<form name="dentaku" method="POST" action="form.php">
		<table>
			<tr>
				<td colspan="3"><input type="text" size="12" name="result" value="<?php echo $result;	?>"></td>
				<td align="center"><input type="submit" name="delete" value=" C "></td>
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
