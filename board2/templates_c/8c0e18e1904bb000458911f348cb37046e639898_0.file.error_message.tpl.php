<?php
/* Smarty version 3.1.31, created on 2018-01-31 18:11:01
  from "C:\xampp\htdocs\tech-aca5\board2\templates\error_message.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5a718825955d47_82703690',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8c0e18e1904bb000458911f348cb37046e639898' => 
    array (
      0 => 'C:\\xampp\\htdocs\\tech-aca5\\board2\\templates\\error_message.tpl',
      1 => 1517389814,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a718825955d47_82703690 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html>
<head>
    <meta  charset=UTF-8"/>
    <title>error_message</title>
</head>
<body>
<?php if ($_smarty_tpl->tpl_vars['error_message']->value != '') {?>
    <!--エラーメッセージの表示-->
    <?php echo $_smarty_tpl->tpl_vars['error_message']->value;?>

    <?php if ($_smarty_tpl->tpl_vars['reaction']->value == '新規登録') {?>
    <a href="smarty_SignUp.php"><?php echo $_smarty_tpl->tpl_vars['reaction']->value;?>
画面に戻る</a>
    <?php }?>
    <?php if ($_smarty_tpl->tpl_vars['reaction']->value == 'ログイン') {?>
        <a href="smarty_Login.php"><?php echo $_smarty_tpl->tpl_vars['reaction']->value;?>
画面に戻る</a>
    <?php }?>
    <?php if ($_smarty_tpl->tpl_vars['reaction']->value == '新規投稿') {?>
        <a href="smarty_board2.php"><?php echo $_smarty_tpl->tpl_vars['reaction']->value;?>
画面に戻る</a>
    <?php }?>
    <?php if ($_smarty_tpl->tpl_vars['reaction']->value == '投稿編集') {?>
        <a href="smarty_edit_comment.php"><?php echo $_smarty_tpl->tpl_vars['reaction']->value;?>
画面に戻る</a>
    <?php }
}?>
</body>
</html>



<?php }
}
