<?php
/* Smarty version 3.1.31, created on 2017-12-24 03:22:12
  from "/var/www/html/vagrant/Keiziban3/KeizibanTmp/Keiziban3.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5a3e9ed4e3a176_72392897',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '391e88f6b091622e832262ef71eed8aa77a527d3' => 
    array (
      0 => '/var/www/html/vagrant/Keiziban3/KeizibanTmp/Keiziban3.tpl',
      1 => 1513620706,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a3e9ed4e3a176_72392897 (Smarty_Internal_Template $_smarty_tpl) {
?>
<html>
<head>
    <title>ホーム <?php echo $_smarty_tpl->tpl_vars['name']->value;?>
さん</title>
</head>
<form method = "POST" action = "Keiziban3.php">
    <p><?php echo $_smarty_tpl->tpl_vars['name']->value;?>
　さん</p>
    <input type = 'submit' name = 'Logoutbutton' value = 'ログアウト'>
</form>
<form method = "POST" action = "MyContribution.php">
    <input type = 'submit' name = 'MyConbutton' value = 'マイページ'>
</form>
<form method = "POST" action = "Keiziban3.php">
    <p>何してるなう？？(１００文字以内)</p>
    <textarea name = 'contribution' cols = '75' rows = '10' maxlength = "500" wrap = "hard"></textarea><br />
    <input type = 'submit' name = 'contributionbutton' value = '投稿!!'>
</form>
<body>

</body>
</html>
<?php }
}
