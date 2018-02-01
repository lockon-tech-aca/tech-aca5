<?php


$sql = "SELECT * FROM post_table";

$state = $pdo -> prepare($sql);

$state -> execute();

$data_count = $state -> rowCount();

if($data_count == 0){
    $errorMessage = '書き込みがありません';
}

$data = $state -> fetchall();

/*user_idからユーザー名を特定し、結びつける*/
for($count = 0; $count < $data_count; $count++){

    $user_id = $data[$count]["user_id"];

    $sql = "SELECT name FROM member WHERE id = '$user_id'";

    $state = $pdo -> prepare($sql);

    $state -> execute();

    $user_name = $state -> fetchColumn();

    $data[$count]["name"] = $user_name;
}

$smarty -> assign('data', $data);

