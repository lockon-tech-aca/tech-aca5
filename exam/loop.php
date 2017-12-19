<?php
$sum = 0;
for ($i = 1;$i < 100;$i++){
    if ($sum > 1000) {break;}
    $sum += $i;
}    print'合計が1000を超えるのは。1～' .--$i.'を加算したときです。';
?>
<?php
$sum = 0;
for ($i = 1;$i < 100;$i++){
    if ($i%2 != 0){continue;}
    $sum += $i;
}    print"合計値は{$sum}です。"
?>
<?php
print '<br />';
for ($i = 1;$i < 10; $i++){
    for ($j = 1;$j < 10;$j++){
        $result = $i * $j;
        if ($result > 40){break;}
        print"{$result} &nbsp;";
    }
    print '<br />';
}
?>
<?php
for ($i = 1;$i < 6;$i++){?>
<P>こんにちは、世界!</P>
<?php } ?>