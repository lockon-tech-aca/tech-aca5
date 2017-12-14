<?php require_once 'Encode.php'; ?>
<html>
<head>
    <title>電卓</title>
</head>
<body>
<form method="post" action="">
    <input type="text" name="a" />

    <select name="select" size="1">
        <option value="+">＋</option>
        <option value="-">－</option>
        <option value="*">×</option>
        <option value="/">÷</option>
    </select>

    <input type="text" name="b" />
    <input type="submit" value="=" />
</form>
<?php
if (isset($_POST["select"])){
    $area1 = htmlspecialchars($_POST["a"]);
    $area2 = htmlspecialchars($_POST["b"]);
    $select = htmlspecialchars($_POST["select"]);
    if ($area1==''){
        print '！半角数字を入力してください！';
    }else {
        if ($area2=='') {
            print '！半角数字を入力してください！';
        }else{
            if(!is_numeric($area1)){
                print'！半角数字を入力してください！';
            }else{
                if (!is_numeric($area2)){
                    print '！半角数字を入力してください！';
                }else{
                    switch ($select) {
                        case"+";
                            $answer = $area1 + $area2;
                            break;
                        case"-";
                            $answer = $area1 - $area2;
                            break;
                        case"*";
                            $answer = $area1 * $area2;
                            break;
                        case"/";
                            if ($area1==="0"){
                                $answer = '0';
                            }else {
                                if ($area2 === "0") {
                                    print '！0で割ることはできません！';
                                    $answer ='';
                                } else {
                                    $answer = $area1 / $area2;
                                }
                            }
                            break;
                    }
                    print $answer;
                }
            }
        }
    }
}
?>
</body>
</html>