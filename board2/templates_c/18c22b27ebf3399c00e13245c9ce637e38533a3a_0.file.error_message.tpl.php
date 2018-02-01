<?php
/* Smarty version 3.1.31, created on 2017-12-19 15:05:49
  from "C:\xampp\htdocs\phpProject\task5\templates\error_message.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5a38ac3da27b31_70526826',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '18c22b27ebf3399c00e13245c9ce637e38533a3a' => 
    array (
      0 => 'C:\\xampp\\htdocs\\phpProject\\task5\\templates\\error_message.tpl',
      1 => 1513660374,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a38ac3da27b31_70526826 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html>
<head>
    <meta  charset=UTF-8"/>
    <title>complete</title>
</head>
<body>
<?php if ($_smarty_tpl->tpl_vars['error_message']->value != '') {?>
    <?php echo $_smarty_tpl->tpl_vars['error_message']->value;?>

    <?php if ($_smarty_tpl->tpl_vars['reaction']->value == '新規登録') {?>
    <a href=http://localhost/phpProject/task5/smarty_SignUp.php><?php echo $_smarty_tpl->tpl_vars['reaction']->value;?>
画面に戻る</a>
    <?php }?>
    <?php if ($_smarty_tpl->tpl_vars['reaction']->value == 'ログイン') {?>
        <a href=http://localhost/phpProject/task5/smarty_Login.php><?php echo $_smarty_tpl->tpl_vars['reaction']->value;?>
画面に戻る</a>
    <?php }?>
    <?php if ($_smarty_tpl->tpl_vars['reaction']->value == '新規投稿') {?>
        <a href=http://localhost/phpProject/task5/smarty_board2.php><?php echo $_smarty_tpl->tpl_vars['reaction']->value;?>
画面に戻る</a>
    <?php }
}?>

</body>
</html>



<?php }
}
