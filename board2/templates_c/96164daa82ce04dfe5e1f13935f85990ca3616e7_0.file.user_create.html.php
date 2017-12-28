<?php
/* Smarty version 3.1.32-dev-38, created on 2017-12-28 03:58:38
  from 'C:\xampp\htdocs\tech-aca5\board2\templates\user_create.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32-dev-38',
  'unifunc' => 'content_5a445dde3fee19_27834049',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '96164daa82ce04dfe5e1f13935f85990ca3616e7' => 
    array (
      0 => 'C:\\xampp\\htdocs\\tech-aca5\\board2\\templates\\user_create.html',
      1 => 1514429254,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a445dde3fee19_27834049 (Smarty_Internal_Template $_smarty_tpl) {
?><html>
    <head>
        <meta charset="UTF-8">
        <title>新規登録</title>
    </head>
    <body>
        <h2>新規登録</h2>
        <form method="post" action="user_create.php">
            ユーザ名：<input type="text" name="name"><br>
            パスワード：<input type="password" name="password"><br>
            もう一度パスワードを入力してください：<input type="password" name="confirmation">
            <input type="submit" name="registration" value="登録">
        </form>
        <?php if (isset($_smarty_tpl->tpl_vars['error']->value)) {?> <p><?php echo $_smarty_tpl->tpl_vars['error']->value;?>
</p>
        <?php }?>
    </body>
</html>
<?php }
}
