<?php /* Smarty version 2.6.31, created on 2017-12-11 01:51:07
         compiled from signUp.tpl */ ?>
<html>
    <head>
        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'header.tpl', 'smarty_include_vars' => array('page_title' => "新規登録画面")));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    </head>
    <body>
	
		<?php if ($this->_tpl_vars['user_id'] != NULL): ?>
	    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'comp_signUp.tpl', 'smarty_include_vars' => array('user_name' => $this->_tpl_vars['user_name'],'user_id' => $this->_tpl_vars['user_id'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	<?php else: ?>
	        <h1>新規登録画面</h1>
        <form id="signUp_form" name="signUp.php" action="" method="POST">
            <fieldset>
                <legend>新規登録フォーム</legend>
		    <h2><?php echo $this->_tpl_vars['errorMessage']; ?>
</h2>
		    
                <label for="user_name">ユーザー名</label><input type="text" id="user_name" name="user_name" placeholder="ユーザー名を入力" value="">
                <br>
                <label for="password">パスワード</label><input type="password" id="password" name="password" value="" placeholder="パスワードを入力">
                <br>
                <button type="submit" id="signUp" name="action" value="signUp">新規登録</button>
		<button type='submit' id="login_form" name="action" value="login_form">ログイン画面</button>
            </fieldset>
	<?php endif; ?>
    </body>
</html>