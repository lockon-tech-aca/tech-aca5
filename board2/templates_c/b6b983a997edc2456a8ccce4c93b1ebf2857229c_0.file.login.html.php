<?php
/* Smarty version 3.1.32-dev-38, created on 2018-01-16 09:46:33
  from '/vagrant/www/board/templates/login.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32-dev-38',
  'unifunc' => 'content_5a5dc9f9b619d7_16386048',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b6b983a997edc2456a8ccce4c93b1ebf2857229c' => 
    array (
      0 => '/vagrant/www/board/templates/login.html',
      1 => 1514428431,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a5dc9f9b619d7_16386048 (Smarty_Internal_Template $_smarty_tpl) {
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
