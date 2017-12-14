<?php
$x = 1;
while($x<6){
    print"{$x}番目のループです。<br />";
    $x++;
}
?>
<?php
for ($x = 1; $x<6; $x++){
    PRINT "{$x}番目です。<br />";
}
?>
<?php
$date = array('青木' ,'田中' ,'山本' ,'宇都');
foreach ($date as $value) {
    print"名前は{$value}<br />";
}

