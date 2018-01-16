<?php
/* Smarty version 3.1.32-dev-38, created on 2018-01-09 09:17:22
  from 'C:\xampp\htdocs\tech-aca5\board2\templates\show.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32-dev-38',
  'unifunc' => 'content_5a547a928f6c47_35279988',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'be75fdbad17c5ba89a4c0aad04895a87eadc7d76' => 
    array (
      0 => 'C:\\xampp\\htdocs\\tech-aca5\\board2\\templates\\show.html',
      1 => 1514482014,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a547a928f6c47_35279988 (Smarty_Internal_Template $_smarty_tpl) {
?><!doctype html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title>ESS2</title>
    </head>

    <body>
        <h2>掲示板2</h2><br>

        <?php if (isset($_smarty_tpl->tpl_vars['name']->value)) {?>

            <?php if (isset($_smarty_tpl->tpl_vars['error']->value)) {?> <p><?php echo $_smarty_tpl->tpl_vars['error']->value;?>
</p>
            <?php }?>

            ようこそ <?php echo $_smarty_tpl->tpl_vars['name']->value;?>
 さん <input type="button" onclick="location.href='http://localhost/tech-aca5/board2/logout.php'"value="ログアウト"><br>
            <input type="button" onclick="location.href='http://localhost/tech-aca5/board2/user_create.php'"value="新規登録"><br>
            <form method="post" action="show.php">
                投稿：<br>
                <textarea name="contents" row="8" cols="40"></textarea><br>
                <input type="submit" name="insert">
            </form>


        <?php } else { ?>

            <input type="button" onclick="location.href='http://localhost/tech-aca5/board2/user_create.php'"value="新規登録">
            <input type="button" onclick="location.href='http://localhost/tech-aca5/board2/login.php'"value="ログイン"><br>

        <?php }?>

        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['posts']->value, 'post');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['post']->value) {
?>
            <?php echo $_smarty_tpl->tpl_vars['post']->value[0]['id'];?>
 : <?php echo $_smarty_tpl->tpl_vars['post']->value[0]['name'];?>
 <br>
            <?php echo $_smarty_tpl->tpl_vars['post']->value[0]['contents'];?>


            <?php if (isset($_smarty_tpl->tpl_vars['user_id']->value)) {?>

                <?php if ($_smarty_tpl->tpl_vars['post']->value[0]['user_id'] === $_smarty_tpl->tpl_vars['user_id']->value) {?>

                    <form action="post_update.php" method="post">
                        <input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['post']->value[0]['id'];?>
">
                        <input type="submit" value="編集">
                    </form>

                <?php }?>

            <?php }?>
            <br>
        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

    </body>
</html><?php }
}
