<?php
/* Smarty version 3.1.31, created on 2017-12-19 13:51:37
  from "C:\xampp\htdocs\phpProject\task5\templates\smarty_Login.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5a389ad9d21324_63179321',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '127c39c8d4b187014aa27fa259ae3ef8ef068fd9' => 
    array (
      0 => 'C:\\xampp\\htdocs\\phpProject\\task5\\templates\\smarty_Login.tpl',
      1 => 1513657030,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a389ad9d21324_63179321 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html>
<head>
    <meta  charset=UTF-8"/>
    <title>Login</title>

</head>
<body>
<h1>ログイン画面</h1>
<form action="Smarty_Login_process.php" method="POST">
    <div>
        <label for="name"> 名前:</label><br>
        <input id = "name" type="text" name="name" maxlength="10" >
        <br><br><br>

        <label for="password">パスワード:</label><br>
        <input id = "password" type="password" name="password" maxlength="10" >
        <br><br>
        <input type = "submit" name = "Login" value = "ログイン"><br>
</form>
</body>
</html>

<?php }
}
