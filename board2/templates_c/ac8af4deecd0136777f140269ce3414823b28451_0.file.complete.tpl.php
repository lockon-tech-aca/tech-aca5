<?php
/* Smarty version 3.1.31, created on 2018-01-31 18:16:25
  from "C:\xampp\htdocs\tech-aca5\board2\templates\complete.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5a71896956b753_25271018',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ac8af4deecd0136777f140269ce3414823b28451' => 
    array (
      0 => 'C:\\xampp\\htdocs\\tech-aca5\\board2\\templates\\complete.tpl',
      1 => 1517390183,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a71896956b753_25271018 (Smarty_Internal_Template $_smarty_tpl) {
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
    <a href="smarty_Login.php">ログイン画面に移動する</a>
<?php }
if ($_smarty_tpl->tpl_vars['action']->value == 'ログイン') {?>
    <h1><?php echo $_smarty_tpl->tpl_vars['action']->value;?>
完了画面</h1>
    <a href="smarty_board2.php">新規投稿画面に移動する</a>
<?php }
if ($_smarty_tpl->tpl_vars['action']->value == 'ログアウト') {?>
    <p><?php echo $_smarty_tpl->tpl_vars['message']->value;?>
</p>
    <a href="smarty_Login.php">ログイン画面に移動する</a>
<?php }
if ($_smarty_tpl->tpl_vars['action']->value == '新規投稿') {?>
    <h1><?php echo $_smarty_tpl->tpl_vars['action']->value;?>
完了画面</h1>
    <a href="smarty_board2.php">新規投稿画面に移動する</a>
<?php }
if ($_smarty_tpl->tpl_vars['action']->value == '投稿編集') {?>
    <h1><?php echo $_smarty_tpl->tpl_vars['action']->value;?>
完了画面</h1>
    <a href="smarty_board2.php">新規投稿画面に移動する</a>
<?php }
if ($_smarty_tpl->tpl_vars['action']->value == '投稿削除') {?>
    <h1><?php echo $_smarty_tpl->tpl_vars['action']->value;?>
完了画面</h1>
    <a href="smarty_board2.php">新規投稿画面に移動する</a>
<?php }?>
</body>
</html><?php }
}
