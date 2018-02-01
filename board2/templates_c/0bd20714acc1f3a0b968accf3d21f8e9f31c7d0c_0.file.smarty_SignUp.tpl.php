<?php
/* Smarty version 3.1.31, created on 2018-01-31 17:56:38
  from "C:\xampp\htdocs\tech-aca5\board2\templates\smarty_SignUp.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5a7184c680c0f8_71848858',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0bd20714acc1f3a0b968accf3d21f8e9f31c7d0c' => 
    array (
      0 => 'C:\\xampp\\htdocs\\tech-aca5\\board2\\templates\\smarty_SignUp.tpl',
      1 => 1517388975,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a7184c680c0f8_71848858 (Smarty_Internal_Template $_smarty_tpl) {
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
