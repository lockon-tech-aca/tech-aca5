<?php /* Smarty version 2.6.31, created on 2017-12-11 06:27:09
         compiled from logout.tpl */ ?>
<!doctype html>
<html>
    <head>
        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'header.tpl', 'smarty_include_vars' => array('page_title' => "ログアウト")));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    </head>
    <body>
        <h1>ログアウト画面</h1>
        <div><?php echo $this->_tpl_vars['errorMessage']; ?>
</div>
       
        <form name ="login_form" method="post" action="login.php">
	    <button type="submit" name="login_form">ログイン画面</button>
	</form>
        
    </body>
</html>