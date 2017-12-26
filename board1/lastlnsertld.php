<?php
require_once './DbManager.php';

try{
    $db = getDb();
    $db->exec("INSERT INTO member (nam, id)") VALUES ;

    print "id値: {"　
}