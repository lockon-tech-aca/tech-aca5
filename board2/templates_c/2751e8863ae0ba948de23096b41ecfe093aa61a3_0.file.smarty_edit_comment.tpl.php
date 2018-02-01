<?php
/* Smarty version 3.1.31, created on 2017-12-21 18:50:37
  from "C:\xampp\htdocs\phpProject\task5\templates\smarty_edit_comment.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5a3b83ed6c3431_64324770',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2751e8863ae0ba948de23096b41ecfe093aa61a3' => 
    array (
      0 => 'C:\\xampp\\htdocs\\phpProject\\task5\\templates\\smarty_edit_comment.tpl',
      1 => 1513849834,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a3b83ed6c3431_64324770 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html>
<head>
    <meta  charset=UTF-8"/>
    <title>edit</title>

</head>
<body>
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
