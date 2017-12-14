<html>
<head>
    <title>ボタン</title>
    <style type="text/css">
        .btn{width:30px;
            height: 30px;}
    </style>
</head>
<body>
<table>
<form method="POST" action="test.php">
     <tr>
         <td> <button type="submit" name="number" value="1" class="btn">1</button></td>
         <td><button type="submit" name="number" value="2" class="btn">2</button></td>
         <td><button type="submit" name="number" value="3" class="btn">3</button></td>
         <td><button type="submit" name="plus" value="+" class="btn">＋</button> </td>
    </tr>
    <tr>
        <td><button type="submit" name="number" value="4" class="btn">4</button></td>
        <td><button type="submit" name="number" value="5" class="btn">5</button></td>
        <td><button type="submit" name="number" value="6" class="btn">6</button></td>
        <td><button type="submit" name="minus" value="-" class="btn">－</button> </td>
    </tr>
    <tr>
        <td><button type="submit" name="number" value="7" class="btn">7</button></td>
        <td><button type="submit" name="number" value="8" class="btn">8</button></td>
        <td><button type="submit" name="number" value="9" class="btn">9</button></td>
        <td><button type="submit" name="multi" value="*" class="btn">×</button> </td>
    </tr>
    <tr>
        <td colspan="2"><button type="submit" name="number" value="0" style="width: 65px; height: 30px">0</button></td>
        <td><button type="submit" name="number" value=" . " class="btn">.</button></td>
        <td><button type="submit" name="divid" value="/" class="btn">÷</button> </td>
    </tr>
    <tr>
        <td colspan="4"><input type="submit" name="submit" value="=" style="width: 135px;height: 30px"></td>
    </tr>

</form>
</table>
<?php
//if (isset($area1))
//$stack=$area1;
$area1=$_POST["number"];
print($area1);
?>
</body>
</html>