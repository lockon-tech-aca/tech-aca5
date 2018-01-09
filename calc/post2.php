<html>
<head>
    <title>ポストデータ</title>
</head>
<body>
計算した人数は、<?php print $_POST['name'];  ?>人
<br/>
</body>
</html>

<?php
$rank =$_POST['name'];
print "計算する速度を計算する";
print "何回計算するか？　16個の数字を計算";
print "<br>";
if($rank ==1){
print $rank/1;
}elseif ($rank ==2){
    print $rank/1+$rank/2;
}elseif ($rank ==4) {
    print $rank/1+$rank/2+$rank/4;
}elseif ($rank ==8) {
print $rank/1+$rank/2+$rank/4+$rank/8;
}elseif ($rank == 16) {
print $rank/1+$rank/2+$rank/4+$rank/8+$rank/16;
}
print "<br>";
print "回計算する";
print "速度向上率は";
print "<br>";
if($rank ==1){
print $rank/1;
}elseif($rank ==2){
    print ($rank/1+$rank/2)/2;
}elseif($rank ==4) {
    print ($rank/1+$rank/2+$rank/4)/3;
}elseif ($rank ==8) {
print( $rank/1+$rank/2+$rank/4+$rank/8)/4;
}elseif($rank ==16){
print ($rank/1+$rank/2+$rank/4+$rank/8+$rank/16)/5;
}
print "<br>";





/* print  define_syslog_variables();
openlog('$rank', '2', LOG_PID | LOG_PERROR, LOG_LOCAL0);
syslog(LOG_INFO, 'message');
closelog();
*/

//define($base,'name' );  
 //log2($base);
 
 /*function getLog ($base){
       return log2($base);
 }
 $name = 'getLog';
 $Area=$rank;
 print getLog;
  */
//p.192 check

print "<br>";

 print "何枚計算しても使えるようにしたい";
 print "そうすると並列化数を求める";
 print "<br>";
 log ($rank,2);
// print"乗すると"+$rank+"になる";
 
 print "<br>";
 
 print log ($rank,2)+1 ;
 $number = log ($rank,2)+1;
 
 print "<br>";
 
 //$numberの説明
 
?>

       


    




   
    
