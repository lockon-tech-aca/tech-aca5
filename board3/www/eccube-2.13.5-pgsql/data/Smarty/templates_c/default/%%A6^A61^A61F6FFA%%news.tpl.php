<?php /* Smarty version 2.6.27, created on 2018-01-30 03:09:01
         compiled from /vagrant/www/eccube-2.13.5-pgsql/html/../data/Smarty/templates/default/frontparts/bloc/news.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'script_escape', '/vagrant/www/eccube-2.13.5-pgsql/html/../data/Smarty/templates/default/frontparts/bloc/news.tpl', 26, false),array('modifier', 'explode', '/vagrant/www/eccube-2.13.5-pgsql/html/../data/Smarty/templates/default/frontparts/bloc/news.tpl', 31, false),array('modifier', 'h', '/vagrant/www/eccube-2.13.5-pgsql/html/../data/Smarty/templates/default/frontparts/bloc/news.tpl', 40, false),array('modifier', 'nl2br', '/vagrant/www/eccube-2.13.5-pgsql/html/../data/Smarty/templates/default/frontparts/bloc/news.tpl', 40, false),array('modifier', 'date_format', '/vagrant/www/eccube-2.13.5-pgsql/html/../data/Smarty/templates/default/frontparts/bloc/news.tpl', 42, false),)), $this); ?>

<?php echo '<div class="block_outer"><div id="news_area"><h2><img src="'; ?><?php echo ((is_array($_tmp=$this->_tpl_vars['TPL_URLPATH'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?><?php echo 'img/title/tit_bloc_news.png" alt="新着情報" /><span class="rss"><a href="'; ?><?php echo ((is_array($_tmp=@ROOT_URLPATH)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?><?php echo 'rss/'; ?><?php echo ((is_array($_tmp=@DIR_INDEX_PATH)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?><?php echo '" target="_blank"><img src="'; ?><?php echo ((is_array($_tmp=$this->_tpl_vars['TPL_URLPATH'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?><?php echo 'img/button/btn_rss.jpg" alt="RSS" /></a></span></h2><div class="block_body"><div class="news_contents">'; ?><?php unset($this->_sections['data']);
$this->_sections['data']['name'] = 'data';
$this->_sections['data']['loop'] = is_array($_loop=((is_array($_tmp=$this->_tpl_vars['arrNews'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['data']['show'] = true;
$this->_sections['data']['max'] = $this->_sections['data']['loop'];
$this->_sections['data']['step'] = 1;
$this->_sections['data']['start'] = $this->_sections['data']['step'] > 0 ? 0 : $this->_sections['data']['loop']-1;
if ($this->_sections['data']['show']) {
    $this->_sections['data']['total'] = $this->_sections['data']['loop'];
    if ($this->_sections['data']['total'] == 0)
        $this->_sections['data']['show'] = false;
} else
    $this->_sections['data']['total'] = 0;
if ($this->_sections['data']['show']):

            for ($this->_sections['data']['index'] = $this->_sections['data']['start'], $this->_sections['data']['iteration'] = 1;
                 $this->_sections['data']['iteration'] <= $this->_sections['data']['total'];
                 $this->_sections['data']['index'] += $this->_sections['data']['step'], $this->_sections['data']['iteration']++):
$this->_sections['data']['rownum'] = $this->_sections['data']['iteration'];
$this->_sections['data']['index_prev'] = $this->_sections['data']['index'] - $this->_sections['data']['step'];
$this->_sections['data']['index_next'] = $this->_sections['data']['index'] + $this->_sections['data']['step'];
$this->_sections['data']['first']      = ($this->_sections['data']['iteration'] == 1);
$this->_sections['data']['last']       = ($this->_sections['data']['iteration'] == $this->_sections['data']['total']);
?><?php echo ''; ?><?php if (((is_array($_tmp=$this->_tpl_vars['arrNews'][$this->_sections['data']['index']]['news_date_start'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) < date ( 'Y/m/d H:i:s' ) && strtotime ( ((is_array($_tmp=$this->_tpl_vars['arrNews'][$this->_sections['data']['index']]['news_date_end'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) , '+1 day' ) > date ( 'Y/m/d H:i:s' )): ?><?php echo ''; ?><?php $this->assign('date_array', ((is_array($_tmp="-")) ? $this->_run_mod_handler('explode', true, $_tmp, ((is_array($_tmp=$this->_tpl_vars['arrNews'][$this->_sections['data']['index']]['cast_news_date'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))) : explode($_tmp, ((is_array($_tmp=$this->_tpl_vars['arrNews'][$this->_sections['data']['index']]['cast_news_date'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))))); ?><?php echo '<dl class="newslist"><dt>'; ?><?php echo ((is_array($_tmp=$this->_tpl_vars['date_array'][0])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?><?php echo '年'; ?><?php echo ((is_array($_tmp=$this->_tpl_vars['date_array'][1])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?><?php echo '月'; ?><?php echo ((is_array($_tmp=$this->_tpl_vars['date_array'][2])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?><?php echo '日</dt><dt><a'; ?><?php if (((is_array($_tmp=$this->_tpl_vars['arrNews'][$this->_sections['data']['index']]['news_url'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))): ?><?php echo ' href="'; ?><?php echo ((is_array($_tmp=$this->_tpl_vars['arrNews'][$this->_sections['data']['index']]['news_url'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?><?php echo '" '; ?><?php if (((is_array($_tmp=$this->_tpl_vars['arrNews'][$this->_sections['data']['index']]['link_method'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) == '2'): ?><?php echo ' target="_blank"'; ?><?php endif; ?><?php echo ''; ?><?php endif; ?><?php echo '>'; ?><?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrNews'][$this->_sections['data']['index']]['news_title'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)))) ? $this->_run_mod_handler('nl2br', true, $_tmp) : smarty_modifier_nl2br($_tmp)); ?><?php echo '</a></dt><dt>表示期間　'; ?><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrNews'][$this->_sections['data']['index']]['news_date_start'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('date_format', true, $_tmp, "%Y/%m/%d") : smarty_modifier_date_format($_tmp, "%Y/%m/%d")); ?><?php echo '～'; ?><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrNews'][$this->_sections['data']['index']]['news_date_end'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('date_format', true, $_tmp, "%Y/%m/%d") : smarty_modifier_date_format($_tmp, "%Y/%m/%d")); ?><?php echo '</dt><dd class="mini">'; ?><?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrNews'][$this->_sections['data']['index']]['news_comment'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)))) ? $this->_run_mod_handler('nl2br', true, $_tmp) : smarty_modifier_nl2br($_tmp)); ?><?php echo '</dd></dl>'; ?><?php endif; ?><?php echo ''; ?><?php endfor; endif; ?><?php echo '</div></div></div></div>'; ?>
