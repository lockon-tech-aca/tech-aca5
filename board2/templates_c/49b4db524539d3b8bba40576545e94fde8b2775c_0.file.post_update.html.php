<?php
/* Smarty version 3.1.32-dev-38, created on 2017-12-28 09:31:45
  from 'C:\xampp\htdocs\tech-aca5\board2\templates\post_update.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32-dev-38',
  'unifunc' => 'content_5a44abf1830992_85928372',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '49b4db524539d3b8bba40576545e94fde8b2775c' => 
    array (
      0 => 'C:\\xampp\\htdocs\\tech-aca5\\board2\\templates\\post_update.html',
      1 => 1514442727,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a44abf1830992_85928372 (Smarty_Internal_Template $_smarty_tpl) {
?><html>
<head>
    <meta charset="UTF-8">
    <title>編集</title>
</head>
<body>
<h2>編集</h2>
<form method="post" action="post_update.php">
    <textarea name="contents" row="8" cols="40"><?php echo $_smarty_tpl->tpl_vars['contents']->value['contents'];?>
</textarea>
    <input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
"><br>
    <input type="submit" name="update" value="完了"><br>
    <input type="submit" name="delete" value="投稿を削除する"><br>
</form>
</body>
</html><?php }
}
