<?php
/* Smarty version 3.1.31, created on 2017-12-21 18:17:24
  from "C:\xampp\htdocs\phpProject\task5\templates\smarty_result_comment.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5a3b7c2422dd29_44246274',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4e759550062da49bc204baca764f2cc0c9b353f7' => 
    array (
      0 => 'C:\\xampp\\htdocs\\phpProject\\task5\\templates\\smarty_result_comment.tpl',
      1 => 1513847336,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a3b7c2422dd29_44246274 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html>
<head>
    <meta  charset=UTF-8"/>
    <title>Login</title>

</head>
<body>
<?php echo $_smarty_tpl->tpl_vars['data']->value;?>


<table border="1">
    <tr>
        <th>投稿ID</th><th>コメント</th><th></th><th></th>
    </tr>
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['data']->value, 'row');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['row']->value) {
?>
        <tr>

            <td> <?php echo $_smarty_tpl->tpl_vars['row']->value['id'];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['row']->value['contents'];?>
</td>

            <form action="smarty_edit_comment.php" method="post">
                <input type="hidden" name="id" value=<?php echo '<?=';?>e($row['id']); <?php echo '?>';?>>
                <input type="hidden" name="comment" value=<?php echo '<?=';?>e($row['contents']); <?php echo '?>';?>>
                <td><input type="submit" value="投稿の編集"><br></td>
            </form>
            <form action="smarty_delete_comment.php" method="post">
                <input type="hidden" name="id" value=<?php echo '<?=';?>e($row['id']); <?php echo '?>';?>>
                <td><input type=submit value=投稿の削除><br></td>
            </form>
        </tr>
    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
?>


</body>
</html><?php }
}
