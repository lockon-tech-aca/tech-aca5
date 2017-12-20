<?php /* Smarty version 2.6.31, created on 2017-12-11 02:13:07
         compiled from comp_signUp.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'comp_signUp.tpl', 7, false),)), $this); ?>
<html>
    <head>
        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'header.tpl', 'smarty_include_vars' => array('page_title' => "登録完了")));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    </head>
    <body>
        <h1>登録完了</h1>
	<EM>あなたのユーザー名は<B><?php echo ((is_array($_tmp=$this->_tpl_vars['user_name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</B>です</EM>
	<EM>あなたのユーザーIDは<B><?php echo $this->_tpl_vars['user_id']; ?>
</B>です</EM>
        <form id="comp_signUp" name="comp_signUp" action="" method="POST">
            <fieldset>
		<button type='submit' id="login_form" name="action" value="login_form">ログイン画面へ</button>
            </fieldset>
    </body>
</html>