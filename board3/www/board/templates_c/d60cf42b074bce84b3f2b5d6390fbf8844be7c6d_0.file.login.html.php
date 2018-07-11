<?php
/* Smarty version 3.1.32-dev-38, created on 2017-12-28 03:34:01
  from 'C:\xampp\htdocs\tech-aca5\board2\templates\login.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32-dev-38',
  'unifunc' => 'content_5a4458199fc213_63270464',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd60cf42b074bce84b3f2b5d6390fbf8844be7c6d' => 
    array (
      0 => 'C:\\xampp\\htdocs\\tech-aca5\\board2\\templates\\login.html',
      1 => 1514428431,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a4458199fc213_63270464 (Smarty_Internal_Template $_smarty_tpl) {
?><html>
    <head>
        <meta charset="UTF-8">
        <title>ログイン</title>
    </head>

    <body>
        <h2>ログイン</h2>
        <form method="post" action="login.php">
            ユーザ名：<input type="text" name="name"><br>
            パスワード：<input type="password" name="password">
            <input type="submit" name="login" value="ログイン">
        </form>
        <?php if (isset($_smarty_tpl->tpl_vars['error']->value)) {?> <p><?php echo $_smarty_tpl->tpl_vars['error']->value;?>
</p>
        <?php }?>
    </body>
</html>
<?php }
}
