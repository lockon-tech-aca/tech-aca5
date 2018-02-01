<?php
/* Smarty version 3.1.31, created on 2018-01-31 18:02:56
  from "C:\xampp\htdocs\tech-aca5\board2\templates\smarty_Login.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5a718640646687_22229247',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '32b860d803c5241bcfb056752ecb1acfce86fc0f' => 
    array (
      0 => 'C:\\xampp\\htdocs\\tech-aca5\\board2\\templates\\smarty_Login.tpl',
      1 => 1513659470,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a718640646687_22229247 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html>
<head>
    <meta  charset=UTF-8"/>
    <title>Login</title>

</head>
<body>
<h1>ログイン画面</h1>
<form action="smarty_Login_process.php" method="POST">
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
