<?php
/* Smarty version 3.1.31, created on 2017-12-24 03:51:39
  from "/var/www/html/vagrant/Keiziban3/KeizibanTmp/MyPage.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5a3ea5bb1fb6c0_89895272',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '016ae3c2c0fd438a04a64069eeb261faaa8f5e01' => 
    array (
      0 => '/var/www/html/vagrant/Keiziban3/KeizibanTmp/MyPage.tpl',
      1 => 1513620706,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a3ea5bb1fb6c0_89895272 (Smarty_Internal_Template $_smarty_tpl) {
?>
<html>
<head>
    <title>掲示版3 <?php echo $_smarty_tpl->tpl_vars['name']->value;?>
</title>
</head>
<form method = "POST" action = "MyContribution.php">
    <p><?php echo $_smarty_tpl->tpl_vars['name']->value;?>
　さんのマイページ</p>
    <input type = 'submit' name = 'Logoutbutton' value = "ログアウト">
</form>
<form method = "POST" action = "Keiziban3.php">
    <input type = 'submit' name = 'homebutton' value = 'ホームに戻る'><br /><br /><br />
</form>
<body>
            <?php if ($_smarty_tpl->tpl_vars['fetchAll']->value != NULL) {?>
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['fetchAll']->value, 'data');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['data']->value) {
?>
                    <?php echo $_smarty_tpl->tpl_vars['cnt']->value++;?>
.　<<?php echo $_smarty_tpl->tpl_vars['data']->value['time'];?>
>

                    <form method = "POST" action = "MyContribution.php">
                        <input type = "submit" name = "editbutton<?php echo $_smarty_tpl->tpl_vars['cnt']->value;?>
" value = "編集">
                        <input type = "submit" name = "deletebutton<?php echo $_smarty_tpl->tpl_vars['cnt']->value;?>
" value = "削除">

                        <input type = "hidden" name = "contents_id<?php echo $_smarty_tpl->tpl_vars['cnt']->value;?>
" value = <?php echo $_smarty_tpl->tpl_vars['data']->value['id'];?>
>
                    </form>
                    <?php echo e($_smarty_tpl->tpl_vars['data']->value['contents']);?>
<br /><br />



                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
?>

            <?php }?>


</body>
</html><?php }
}
