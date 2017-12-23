<?php
session_start();
$_SESSION['username']=null;
$_SESSION['id']=null;
header('Location: http://localhost/tech-aca5/board2/show.php');
exit;