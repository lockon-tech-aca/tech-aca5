<?php
/* Smarty version 3.1.31, created on 2017-12-22 03:18:20
  from "C:\xampp\htdocs\phpProject\task5\templates\complete.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5a3bfaec307b28_55575529',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7bc71e8f5e296f0e11d595d78a0768bf6f8cdf45' => 
    array (
      0 => 'C:\\xampp\\htdocs\\phpProject\\task5\\templates\\complete.tpl',
      1 => 1513880280,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a3bfaec307b28_55575529 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html>
<head>
    <meta  charset=UTF-8"/>
    <title>complete</title>
</head>
<body>
<!--<include file="error_message.tpl"></include>-->
<?php if ($_smarty_tpl->tpl_vars['action']->value == '登録') {?>
    <h1><?php echo $_smarty_tpl->tpl_vars['action']->value;?>
完了画面</h1>
    <a href=http://localhost/phpProject/task5/smarty_Login.php>ログイン画面に移動する</a>
<?php }
if ($_smarty_tpl->tpl_vars['action']->value == 'ログイン') {?>
    <h1><?php echo $_smarty_tpl->tpl_vars['action']->value;?>
完了画面</h1>
    <a href=http://localhost/phpProject/task5/smarty_board2.php>新規投稿画面に移動する</a>
<?php }
if ($_smarty_tpl->tpl_vars['action']->value == 'ログアウト') {?>
    <p><?php echo $_smarty_tpl->tpl_vars['message']->value;?>
</p>
    <a href=http://localhost/phpProject/task5/smarty_Login.php>ログイン画面に移動する</a>
<?php }
if ($_smarty_tpl->tpl_vars['action']->value == '新規投稿') {?>
    <h1><?php echo $_smarty_tpl->tpl_vars['action']->value;?>
完了画面</h1>
    <a href=http://localhost/phpProject/task5/smarty_board2.php>新規投稿画面に移動する</a>
<?php }
if ($_smarty_tpl->tpl_vars['action']->value == '投稿編集') {?>
    <h1><?php echo $_smarty_tpl->tpl_vars['action']->value;?>
完了画面</h1>
    <a href=http://localhost/phpProject/task5/smarty_board2.php>新規投稿画面に移動する</a>
<?php }
if ($_smarty_tpl->tpl_vars['action']->value == '投稿削除') {?>
    <h1><?php echo $_smarty_tpl->tpl_vars['action']->value;?>
完了画面</h1>
    <a href=http://localhost/phpProject/task5/smarty_board2.php>新規投稿画面に移動する</a>
<?php }?>
</body>
</html><?php }
}
