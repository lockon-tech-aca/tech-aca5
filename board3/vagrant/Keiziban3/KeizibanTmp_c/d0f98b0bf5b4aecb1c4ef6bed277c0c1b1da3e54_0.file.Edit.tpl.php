<?php
/* Smarty version 3.1.31, created on 2017-12-24 03:51:41
  from "/var/www/html/vagrant/Keiziban3/KeizibanTmp/Edit.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5a3ea5bd6b9dc1_41407592',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd0f98b0bf5b4aecb1c4ef6bed277c0c1b1da3e54' => 
    array (
      0 => '/var/www/html/vagrant/Keiziban3/KeizibanTmp/Edit.tpl',
      1 => 1512925102,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a3ea5bd6b9dc1_41407592 (Smarty_Internal_Template $_smarty_tpl) {
?>
<html>
<head>
    <title>投稿文の編集 <?php echo $_smarty_tpl->tpl_vars['name']->value;?>
さん</title>
</head>
<form method = "POST" action = "EditContents.php">
    <input type = 'submit' name = 'Logoutbutton' value = 'ログアウト'>
</form>
<form method = "POST" action = "EditContents.php">
    <input type = 'submit' name = 'backtomypagebutton' value = 'マイページに戻る'>
</form>
<form method = "POST" action = "EditContents.php">
    <p>編集後、完了ボタンを押してください。</p>
    <textarea name = 'contribution' cols = '75' rows = '10' maxlength = "500" wrap = "hard"><?php echo $_smarty_tpl->tpl_vars['before_edit']->value;?>
</textarea><br />
    <input type = 'submit' name = 'editcompletebutton' value = '編集を完了する'>
</form>
<body>

</body>
</html>
<?php }
}
