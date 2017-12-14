<?php
$str = '彼の電話番号は0798-40-0245で私のは0398-25-1234です。郵便番号はどちらも663-8123です';
if (preg_match('/([0-9]{2,4})-([0-9]{2,4})-([0-9]{4})/',$str,$date)) {
    print"電話番号:{$date[0]}<br />";
    print"市外局番:{$date[1]}<br />";
    print"市内局番:{$date[2]}<br />";
    print"加入者番号:{$date[3]}<br />";
 }
?>
<?php
$str = '彼の電話番号は0798-40-0245で私のは0398-25-1234です。郵便番号はどちらも663-8123です';
if (preg_match_all('/([0-9]{2,4})-([0-9]{2,4})-([0-9]{4})/',$str,$date,PREG_SET_ORDER))
  foreach($date as $item){
    print"電話番号:{$item[0]}<br />";
    print"市外局番:{$item[1]}<br />";
    print"市内局番:{$item[2]}<br />";
    print"加入者番号:{$item[3]}<br />";
}
?>
