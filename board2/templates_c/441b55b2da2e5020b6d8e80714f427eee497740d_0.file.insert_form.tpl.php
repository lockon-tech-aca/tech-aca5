<?php
/* Smarty version 3.1.31, created on 2018-01-14 09:47:39
  from "C:\xampp\htdocs\tech-aca5\board2\templates\insert_form.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5a5b192b5fb522_14256281',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '441b55b2da2e5020b6d8e80714f427eee497740d' => 
    array (
      0 => 'C:\\xampp\\htdocs\\tech-aca5\\board2\\templates\\insert_form.tpl',
      1 => 1515919457,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a5b192b5fb522_14256281 (Smarty_Internal_Template $_smarty_tpl) {
?>
<html>
<head>
  <title>データの登録</title>
</head>
<body>
  <form method="POST" action="insert_form.php">
    <div><font color="#ff0000"><?php echo $_smarty_tpl->tpl_vars['error']->value;?>
</font></div>
    <p>なまえ：<br />
      <input type="text" name="name" size="25" maxlength="20" />
    </p>
    <p>ぱすわーど：<br />
      <input type="text" name="password" size="25" maxlength="20" />
    </p>
    <p>
      <input type="submit" name="signup" value=" 登録" />
    </p>
  </form>
</body>
</html>
<?php }
}
