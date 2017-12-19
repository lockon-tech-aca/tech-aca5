<?php require_once 'Encode.php'; ?>
<html>
<head>
    <title>電卓</title>
</head>
<body>
<form method="post" action="calculator.php">
    <input type="text" name="a" />
    <select name="a2" size="1">
        <option value="1"></option>
        <option value="10000">万</option>
        <option value="100000000">億</option>
        <option value="1000000000000">兆</option>
        <option value="10000000000000000">京</option>
    </select>

    <select name="select" size="1">
        <option value="+">＋</option>
        <option value="-">－</option>
        <option value="*">×</option>
        <option value="/">÷</option>
    </select>

    <input type="text" name="b" />
    <select name="b2" size="1">
        <option value="1"></option>
        <option value="10000">万</option>
        <option value="100000000">億</option>
        <option value="1000000000000">兆</option>
        <option value="10000000000000000">京</option>
    </select>
    <input type="submit" value="=" />
</form>
<?php
if (isset($_POST["select"])){
    if (isset($_POST["a2"])) {
        if (isset($_POST["b2"])) {

            $area1 = htmlspecialchars($_POST["a"]);
            $area1a = htmlspecialchars($_POST["a2"]);
            $area1x=$area1*$area1a;
            $area2 = htmlspecialchars($_POST["b"]);
            $area2a = htmlspecialchars($_POST["b2"]);
            $area2x=$area2*$area2a;
            $select = htmlspecialchars($_POST["select"]);
            if ($area1 == '') {
                print '！半角数字を入力してください！';
            } else {
                if ($area2 == '') {
                    print '！半角数字を入力してください！';
                } else {
                    if (!is_numeric($area1)) {
                        print'！半角数字を入力してください！';
                    } else {
                        if (!is_numeric($area2)) {
                            print '！半角数字を入力してください！';
                        } else {
                            switch ($select) {
                                case"+";
                                    $answer = $area1x + $area2x;
                                    break;
                                case"-";
                                    $answer = $area1x - $area2x;
                                    break;
                                case"*";
                                    $answer = $area1x * $area2x;
                                    break;
                                case"/";
                                    if ($area1 === "0") {
                                        $answer = '0';
                                    } else {
                                        if ($area2 === "0") {
                                            print '！0で割ることはできません！';
                                            $answer = '';
                                        } else {
                                            $answer = $area1x / $area2x;
                                        }
                                    }
                                    break;
                            }

                        }
                        print $answer;
                    }
                }
            }
        }
    }
}
?>
</body>
</html>