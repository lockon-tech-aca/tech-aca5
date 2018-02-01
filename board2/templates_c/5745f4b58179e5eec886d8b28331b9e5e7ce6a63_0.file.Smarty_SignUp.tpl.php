<?php
/* Smarty version 3.1.31, created on 2017-12-19 13:38:45
  from "C:\xampp\htdocs\phpProject\task5\templates\Smarty_SignUp.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5a3897d532f729_80787811',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5745f4b58179e5eec886d8b28331b9e5e7ce6a63' => 
    array (
      0 => 'C:\\xampp\\htdocs\\phpProject\\task5\\templates\\Smarty_SignUp.tpl',
      1 => 1513658320,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a3897d532f729_80787811 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html>
<head>
    <meta  charset=UTF-8"/>
    <title>Smarty_SignUp</title>

</head>
<body>
<h1>新規登録画面</h1>
<form action="smarty_insert_SignUp.php" method="POST">
    <div>
        <label for="name"> 名前:</label><br>
        <input id = "name" type="text" name="name" maxlength="10" >
        <br><br><br>

        <label for="password">パスワード:</label><br>
        <input id = "password" type="password" name="password" maxlength="10" >

        <input type = "submit" value = "登録"><br>
</form>
</body>
</html><?php }
}
