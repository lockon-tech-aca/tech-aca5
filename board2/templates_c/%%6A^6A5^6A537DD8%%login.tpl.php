<?php /* Smarty version 2.6.31, created on 2017-12-11 02:12:51
         compiled from login.tpl */ ?>
<html>
    <head>
        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'header.tpl', 'smarty_include_vars' => array('page_title' => "ログイン画面")));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    </head>
    <body>
        <h1>ログイン画面</h1>
        <form id="login_form" name="login.php" action="" method="POST">
            <fieldset>
                <legend>ログインフォーム</legend>
		<?php if ($this->_tpl_vars['errorMessage'] != ""): ?>
		    <div><font color="#ff0000"><?php echo $this->_tpl_vars['errorMessage']; ?>
</font></div>
		<?php endif; ?>
                <label for="user_id">ユーザーID</label><input type="text" id="user_id" name="user_id" placeholder="ユーザーIDを入力" value="<?php echo $this->_tpl_vars['user_id']; ?>
">
                <br>
                <label for="password">パスワード</label><input type="password" id="password" name="password" value="" placeholder="パスワードを入力">
                <br>
                <button type="submit" id="login" name="action" value="login">ログイン</botton>
            </fieldset>
        </form>
        <br>
        <form action="signUp.php">
            <fieldset>
		<legend>新規登録フォーム</legend>
                <button type="submit" id ="signUp" name="action" value="signUp">新規登録</button>
    
            </fieldset>
        </form>
    </body>
</html>