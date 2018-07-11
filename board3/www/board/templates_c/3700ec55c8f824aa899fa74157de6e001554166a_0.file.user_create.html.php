<?php
/* Smarty version 3.1.32-dev-38, created on 2018-01-16 09:47:58
  from '/vagrant/www/board/templates/user_create.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32-dev-38',
  'unifunc' => 'content_5a5dca4e9a8b10_66024133',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3700ec55c8f824aa899fa74157de6e001554166a' => 
    array (
      0 => '/vagrant/www/board/templates/user_create.html',
      1 => 1514429254,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a5dca4e9a8b10_66024133 (Smarty_Internal_Template $_smarty_tpl) {
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
