<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>イケてる電卓</title>
    <link rel="stylesheet" href="style1.css">
</head>
<body>
<h1>イケてる電卓</h1>
<p>半角数字を入力してください</p>
<form action="" method="post" name="calc">
    <input type="text" name="numLeft" class="left">
    <select name="sign" class="select">
        <option value=""></option>
        <option value="+" accesskey="+">＋</option>
        <option value="-" accesskey="-">－</option>
        <option value="*" accesskey="*">×</option>
        <option value="/" accesskey="/">÷</option>
    </select>
    <input type="text" name="numRight" class="right">=
    <?php
    if(isset($_POST['sign'])) {
        if(is_numeric($_POST['numLeft']) && is_numeric($_POST['numRight'])){
            switch ($_POST['sign']) {
            case '+':
                $result= $_POST['numLeft'] + $_POST['numRight'];
                break;
            case '-':
                $result= $_POST['numLeft'] - $_POST['numRight'];
                break;
            case '*':
                $result= $_POST['numLeft'] * $_POST['numRight'];
                break;
            case '/':
                if($_POST['numRight']==0){
                    $result= 'Error';
                }else {
                    $result= $_POST['numLeft'] / $_POST['numRight'];
                }
                break;
                case '':
                    $result= 'Error';
                    break;
        }
        }else{
            $result= '半角数字を入力してください';
        }if($result>9223372036854775807){
            echo 'Error';
        }else{
            echo $result;
        }
    }
    ?>
    <br><br>
    <input type="submit" value="GO! (Enter)" class="submit" accesskey="enter">
    <input type="button" value="さらに計算 (Alt+c)" onclick="aaa();" class="continue" accesskey="c">
<p>符号のショートカット: Alt+符号</p>
</form>
<script type="text/javascript">
    function aaa(){
        var array = "<?php echo $result; ?>";
        console.log(array);
        document.calc.numLeft.value = array;
    }
</script>
</body>
</html>