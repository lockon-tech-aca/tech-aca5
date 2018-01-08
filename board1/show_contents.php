<?php

function h($s) {
  return htmlspecialchars($s, ENT_QUOTES, "UTF-8");
}

try {
  $pdo -> beginTransaction(); // トランザクションの開始

  $sql = "SELECT * FROM post_table";

  $state = $pdo -> prepare($sql);

  $state -> execute();

  $row_count = $state -> rowCount();

  $pdo -> commit(); // 変更の確定
  
} catch (Exception $e) {  
  $pdo -> rollBack(); 
}

if($row_count == 0){
    print "書き込みがありません";
}

foreach($state as $loop){

print "id = ". h($loop['id']).PHP_EOL;
print "name = ". h($loop['name']).PHP_EOL;
print('<br>');
print h($loop['contents']) .PHP_EOL;
print('<br>');
print('<hr>');



}

?>
