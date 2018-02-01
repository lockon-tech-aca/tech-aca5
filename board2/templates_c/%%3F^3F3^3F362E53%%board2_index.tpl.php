<?php /* Smarty version 2.6.31, created on 2017-12-11 06:39:45
         compiled from board2_index.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'board2_index.tpl', 6, false),)), $this); ?>
<html>
    <head>
        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'header.tpl', 'smarty_include_vars' => array('page_title' => "掲示板")));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    </head>
    <body>
	こんにちは<?php echo ((is_array($_tmp=$_SESSION['NAME'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
さん
	<h1>投稿一覧</h1>
	<br>
	
	<?php unset($this->_sections['item']);
$this->_sections['item']['name'] = 'item';
$this->_sections['item']['loop'] = is_array($_loop=$this->_tpl_vars['data']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['item']['show'] = true;
$this->_sections['item']['max'] = $this->_sections['item']['loop'];
$this->_sections['item']['step'] = 1;
$this->_sections['item']['start'] = $this->_sections['item']['step'] > 0 ? 0 : $this->_sections['item']['loop']-1;
if ($this->_sections['item']['show']) {
    $this->_sections['item']['total'] = $this->_sections['item']['loop'];
    if ($this->_sections['item']['total'] == 0)
        $this->_sections['item']['show'] = false;
} else
    $this->_sections['item']['total'] = 0;
if ($this->_sections['item']['show']):

            for ($this->_sections['item']['index'] = $this->_sections['item']['start'], $this->_sections['item']['iteration'] = 1;
                 $this->_sections['item']['iteration'] <= $this->_sections['item']['total'];
                 $this->_sections['item']['index'] += $this->_sections['item']['step'], $this->_sections['item']['iteration']++):
$this->_sections['item']['rownum'] = $this->_sections['item']['iteration'];
$this->_sections['item']['index_prev'] = $this->_sections['item']['index'] - $this->_sections['item']['step'];
$this->_sections['item']['index_next'] = $this->_sections['item']['index'] + $this->_sections['item']['step'];
$this->_sections['item']['first']      = ($this->_sections['item']['iteration'] == 1);
$this->_sections['item']['last']       = ($this->_sections['item']['iteration'] == $this->_sections['item']['total']);
?>
	    <?php echo $this->_tpl_vars['data'][$this->_sections['item']['index']]['id']; ?>
 : <?php echo ((is_array($_tmp=$this->_tpl_vars['data'][$this->_sections['item']['index']]['name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
 : <?php echo $this->_tpl_vars['data'][$this->_sections['item']['index']]['user_id']; ?>
<br>
	    <?php echo ((is_array($_tmp=$this->_tpl_vars['data'][$this->_sections['item']['index']]['contents'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
<hr>
	<?php endfor; endif; ?>
	
	<form name="post" method="post" action="board2_index.php">
	    名前 : <?php echo ((is_array($_tmp=$_SESSION['NAME'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
<br>
	    内容 :<br>
	    <textarea name="contents" rows="10" cols="30"></textarea><br>
	    <button type="submit" name ="action" value ="send">投稿</button>
	</form>

	<form name="mypage" method="post" action="mypage.php">
 	    <button type="submit" name ="action" value="mypage">自分の投稿を編集</button>
	</form>

	<form name="logout" method="post" action="logout.php">
	    <button type="submit" name ="action" value="logout">ログアウト</button>
	</form>
    </body>
</html>