<?php
/* Smarty version 3.1.31, created on 2018-01-14 09:22:08
  from "C:\xampp\htdocs\tech-aca5\board2\templates\mypage.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5a5b1330b8d9b8_58422839',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'bf61f38b05271906b03eba6475c944adb9669d05' => 
    array (
      0 => 'C:\\xampp\\htdocs\\tech-aca5\\board2\\templates\\mypage.tpl',
      1 => 1515918100,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a5b1330b8d9b8_58422839 (Smarty_Internal_Template $_smarty_tpl) {
?>
<html>
    <head>
        <title>マイページ</title>
    </head>
    <body>
        <p>ようこそ<u><?php echo $_smarty_tpl->tpl_vars['session']->value['name'];?>
</u>さん</p>
        <body>
          <form method="POST" action="mypage.php">
            <p>ほんぶん：<br />
              <input type="text" name="contents" size="25" maxlength="100" />
            </p>
            <p>
              <input type="submit" name="mypost" value=" 登録" />
            </p>
          </form>
        </body>

        <table border='1'>
          <tr>
            <th>id</th>
            <th>ほんぶん</th>
            <th>ボタン</th>
          <tr>
<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['result']->value, 'var');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['var']->value) {
?>
          <tr>
            <td><?php echo $_smarty_tpl->tpl_vars['var']->value['id'];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['var']->value['contents'];?>
</td>
            <td><?php if ($_smarty_tpl->tpl_vars['var']->value['user_id'] == $_smarty_tpl->tpl_vars['session']->value['id']) {?>
                <form method="POST" action="detail.php">
                  <input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['var']->value['id'];?>
">
                  <input type="submit" name="edit" value=" 編集">
                </form>
                <?php }?></td>
          </tr>
<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
?>

        <ul>
            <li><a href="login_form.php">ログアウト</a></li>
        </ul>
    </body>
</html>
<?php }
}
