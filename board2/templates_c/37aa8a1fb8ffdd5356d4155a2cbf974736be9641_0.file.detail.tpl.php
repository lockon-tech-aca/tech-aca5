<?php
/* Smarty version 3.1.31, created on 2018-01-14 08:14:19
  from "C:\xampp\htdocs\tech-aca5\board2\templates\detail.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5a5b034b1b5641_96539862',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '37aa8a1fb8ffdd5356d4155a2cbf974736be9641' => 
    array (
      0 => 'C:\\xampp\\htdocs\\tech-aca5\\board2\\templates\\detail.tpl',
      1 => 1515914017,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a5b034b1b5641_96539862 (Smarty_Internal_Template $_smarty_tpl) {
?>
<html>
<head>
  <title>データの編集</title>
</head>
<body>
  <form method="POST" action="detail.php">
    <input type="hidden" name="id" size="25" value="<?php echo $_smarty_tpl->tpl_vars['result']->value['id'];?>
"/>
    <p>ほんぶん：<br />
      <input type="text" name="contents" size="25" value="<?php echo $_smarty_tpl->tpl_vars['result']->value['contents'];?>
" maxlength="100" />
    </p>
    <p>
      <input type="submit" name="edit" value=" 編集" />
    </p>
    <p>
      <input type="submit" name="delete" value=" 削除" />
    </p>
  </form>
</body>
</html>
<?php }
}
