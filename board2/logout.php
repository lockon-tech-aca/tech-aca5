<?php
session_start();
$_SESSION['username']=null;
$_SESSION['id']=null;
header('Location: ./show.php');
exit;