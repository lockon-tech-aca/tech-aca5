<?php
/* Smarty version 3.1.31, created on 2017-12-22 03:29:40
  from "C:\xampp\htdocs\phpProject\task5\templates\smarty_board2.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5a3bfd94425611_77983355',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '73ad8618a1ebdb86d7c597b799fde03edd035e27' => 
    array (
      0 => 'C:\\xampp\\htdocs\\phpProject\\task5\\templates\\smarty_board2.tpl',
      1 => 1513880976,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a3bfd94425611_77983355 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html>
<head>
    <meta  charset=UTF-8"/>
    <title>board2</title>
</head>
<body>
<h1>掲示板</h1>
<p>Welcome!<?php echo $_smarty_tpl->tpl_vars['name']->value;?>
さん。</p>
<p>ログアウトはこちら</p>
<a href=http://localhost/phpProject/task5/smarty_Logout.php>ログアウト</a><br>
<h2>新規投稿</h2>
<form action="smarty_comment_insert.php" method="POST">
    <div>
        <label for="comment">コメント:</label><br>
        <textarea id = "comment" name="contents" cols="30" rows="10" maxlength="80" wrap="hard" placeholder="80字以内で入力してください。"></textarea><br> <br>

        <input type = "submit" value = "送信"><br><br>
</form>


<h2>投稿履歴</h2>
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
            <input type="hidden" name="id" value=<?php echo $_smarty_tpl->tpl_vars['row']->value['id'];?>
 >
            <input type="hidden" name="contents" value=<?php echo $_smarty_tpl->tpl_vars['row']->value['contents'];?>
>
            <td><input type="submit" value="投稿の編集"><br></td>
        </form>
        <form action="smarty_delete_comment.php" method="post">
            <input type="hidden" name="id" value=<?php echo $_smarty_tpl->tpl_vars['row']->value['id'];?>
>
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
