<?php
/* Smarty version 3.1.31, created on 2018-01-14 09:39:59
  from "C:\xampp\htdocs\tech-aca5\board2\templates\login_form.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5a5b175fce33b1_73527137',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5177f1b48367b50cb82262b02237daaebe49ec79' => 
    array (
      0 => 'C:\\xampp\\htdocs\\tech-aca5\\board2\\templates\\login_form.tpl',
      1 => 1515919170,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a5b175fce33b1_73527137 (Smarty_Internal_Template $_smarty_tpl) {
?>
<html>
<head>
  <title>データの登録</title>
</head>
<body>
  <form method="POST" action="login_form.php">
     <div><font color="#ff0000"><?php echo $_smarty_tpl->tpl_vars['error']->value;?>
</font></div>
    <p>なまえ：<br />
      <input type="text" name="name" size="25" value="<?php echo $_smarty_tpl->tpl_vars['post']->value['name'];?>
" maxlength="20" />
    </p>
    <p>ぱすわーど：<br />
      <input type="text" name="password" size="25" value="<?php echo $_smarty_tpl->tpl_vars['post']->value['password'];?>
"maxlength="20" />
    </p>
    <p>
      <input type="submit" name="login" value=" ログイン" />
    </p>
    <p>
    <!-- URL要変更 -->
      <input type="button" name="signup" value=" 新規登録" onClick="location.href='http://localhost/tech-aca5/board2/insert_form.php'" />
    </p>
  </form>
</body>
</html>
<?php }
}
