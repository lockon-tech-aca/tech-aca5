<?php
/* Smarty version 3.1.31, created on 2018-01-31 18:15:35
  from "C:\xampp\htdocs\tech-aca5\board2\templates\smarty_edit_comment.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5a718937e15716_95569106',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e50f397df278be4bfb5532bf12af5913ca6234f6' => 
    array (
      0 => 'C:\\xampp\\htdocs\\tech-aca5\\board2\\templates\\smarty_edit_comment.tpl',
      1 => 1513880280,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a718937e15716_95569106 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html>
<head>
    <meta  charset=UTF-8"/>
    <title>edit</title>

</head>
<body>
<h1>投稿編集画面</h1>
<form action="smarty_update_comment.php" method="POST">
    <label for="comment">コメント:</label><br>
    <input type="text" name="contents" id="comment" value=<?php echo $_smarty_tpl->tpl_vars['contents']->value;?>
>
    <input type="hidden" name="id" value=<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
>
    <input type = "submit" value = "更新"><br>
</form>
</body>
</html><?php }
}
