<?php if (!defined('IN_PHPBB')) exit; if (! $this->_rootref['S_IS_BOT']) {  ?>

<div class="navbar panel navbar-footer panel-outer"><?php echo (isset($this->_tpldata['DEFINE']['.']['STYLE_PANEL_START'])) ? $this->_tpldata['DEFINE']['.']['STYLE_PANEL_START'] : ''; ?>

	<div class="inner">
	<div class="left">
		<?php if ($this->_rootref['SCRIPT_NAME'] == ('index') && $this->_rootref['U_MARK_FORUMS']) {  $this->_tpldata['DEFINE']['.']['S_FOOTER_NAV'] = 1; ?>

			<a href="<?php echo (isset($this->_rootref['U_MARK_FORUMS'])) ? $this->_rootref['U_MARK_FORUMS'] : ''; ?>"><?php echo ((isset($this->_rootref['L_MARK_FORUMS_READ'])) ? $this->_rootref['L_MARK_FORUMS_READ'] : ((isset($user->lang['MARK_FORUMS_READ'])) ? $user->lang['MARK_FORUMS_READ'] : '{ MARK_FORUMS_READ }')); ?></a>
		<?php } if ($this->_rootref['S_WATCH_FORUM_LINK']) {  if ($this->_tpldata['DEFINE']['.']['S_FOOTER_NAV']) {  ?><span class="bull">&bull;</span><?php } else { $this->_tpldata['DEFINE']['.']['S_FOOTER_NAV'] = 1; } ?>

			<a href="<?php echo (isset($this->_rootref['S_WATCH_FORUM_LINK'])) ? $this->_rootref['S_WATCH_FORUM_LINK'] : ''; ?>"><?php echo (isset($this->_rootref['S_WATCH_FORUM_TITLE'])) ? $this->_rootref['S_WATCH_FORUM_TITLE'] : ''; ?></a>
		<?php } if ($this->_rootref['SCRIPT_NAME'] == ('viewforum') && $this->_rootref['U_MARK_TOPICS']) {  if ($this->_tpldata['DEFINE']['.']['S_FOOTER_NAV']) {  ?><span class="bull">&bull;</span><?php } else { $this->_tpldata['DEFINE']['.']['S_FOOTER_NAV'] = 1; } ?>

			<a href="<?php echo (isset($this->_rootref['U_MARK_TOPICS'])) ? $this->_rootref['U_MARK_TOPICS'] : ''; ?>"><?php echo ((isset($this->_rootref['L_MARK_TOPICS_READ'])) ? $this->_rootref['L_MARK_TOPICS_READ'] : ((isset($user->lang['MARK_TOPICS_READ'])) ? $user->lang['MARK_TOPICS_READ'] : '{ MARK_TOPICS_READ }')); ?></a>
		<?php } if ($this->_rootref['U_WATCH_TOPIC']) {  if ($this->_tpldata['DEFINE']['.']['S_FOOTER_NAV']) {  ?><span class="bull">&bull;</span><?php } else { $this->_tpldata['DEFINE']['.']['S_FOOTER_NAV'] = 1; } ?>

			<a href="<?php echo (isset($this->_rootref['U_WATCH_TOPIC'])) ? $this->_rootref['U_WATCH_TOPIC'] : ''; ?>"><?php echo ((isset($this->_rootref['L_WATCH_TOPIC'])) ? $this->_rootref['L_WATCH_TOPIC'] : ((isset($user->lang['WATCH_TOPIC'])) ? $user->lang['WATCH_TOPIC'] : '{ WATCH_TOPIC }')); ?></a>
		<?php } if ($this->_rootref['U_BOOKMARK_TOPIC']) {  if ($this->_tpldata['DEFINE']['.']['S_FOOTER_NAV']) {  ?><span class="bull">&bull;</span><?php } else { $this->_tpldata['DEFINE']['.']['S_FOOTER_NAV'] = 1; } ?>

			<a href="<?php echo (isset($this->_rootref['U_BOOKMARK_TOPIC'])) ? $this->_rootref['U_BOOKMARK_TOPIC'] : ''; ?>"><?php echo ((isset($this->_rootref['L_BOOKMARK_TOPIC'])) ? $this->_rootref['L_BOOKMARK_TOPIC'] : ((isset($user->lang['BOOKMARK_TOPIC'])) ? $user->lang['BOOKMARK_TOPIC'] : '{ BOOKMARK_TOPIC }')); ?></a>
		<?php } if ($this->_rootref['U_BUMP_TOPIC']) {  if ($this->_tpldata['DEFINE']['.']['S_FOOTER_NAV']) {  ?><span class="bull">&bull;</span><?php } else { $this->_tpldata['DEFINE']['.']['S_FOOTER_NAV'] = 1; } ?>

			<a href="<?php echo (isset($this->_rootref['U_BUMP_TOPIC'])) ? $this->_rootref['U_BUMP_TOPIC'] : ''; ?>"><?php echo ((isset($this->_rootref['L_BUMP_TOPIC'])) ? $this->_rootref['L_BUMP_TOPIC'] : ((isset($user->lang['BUMP_TOPIC'])) ? $user->lang['BUMP_TOPIC'] : '{ BUMP_TOPIC }')); ?></a>
		<?php } if (! $this->_tpldata['DEFINE']['.']['S_FOOTER_NAV']) {  ?><a href="<?php echo (isset($this->_rootref['U_INDEX'])) ? $this->_rootref['U_INDEX'] : ''; ?>"><?php echo ((isset($this->_rootref['L_INDEX'])) ? $this->_rootref['L_INDEX'] : ((isset($user->lang['INDEX'])) ? $user->lang['INDEX'] : '{ INDEX }')); ?></a><?php } ?>

	</div>
	<?php if (! $this->_rootref['S_IS_BOT']) {  ?>

		<div class="right">
			<a href="<?php echo (isset($this->_rootref['U_DELETE_COOKIES'])) ? $this->_rootref['U_DELETE_COOKIES'] : ''; ?>"><?php echo ((isset($this->_rootref['L_DELETE_COOKIES'])) ? $this->_rootref['L_DELETE_COOKIES'] : ((isset($user->lang['DELETE_COOKIES'])) ? $user->lang['DELETE_COOKIES'] : '{ DELETE_COOKIES }')); ?></a>
			<?php if ($this->_rootref['U_ACP']) {  ?>

				<span class="bull">&bull;</span>
				<a href="<?php echo (isset($this->_rootref['U_ACP'])) ? $this->_rootref['U_ACP'] : ''; ?>"><?php echo ((isset($this->_rootref['L_ACP'])) ? $this->_rootref['L_ACP'] : ((isset($user->lang['ACP'])) ? $user->lang['ACP'] : '{ ACP }')); ?></a>
			<?php } ?>

		</div>
	<?php } ?>

	</div>
<?php echo (isset($this->_tpldata['DEFINE']['.']['STYLE_PANEL_END'])) ? $this->_tpldata['DEFINE']['.']['STYLE_PANEL_END'] : ''; ?></div>
<?php } ?>


	</div><!-- content --><?php $this->_tpl_include('_sidebar_right.html'); ?>

	
</div><!-- layout-wrapper -->
</div><!-- forum-wrapper -->


<div class="footer">
	<?php if ($this->_rootref['TRANSLATION_INFO'] || $this->_rootref['DEBUG_OUTPUT']) {  ?>

	<p class="left">
		<?php if ($this->_rootref['TRANSLATION_INFO']) {  echo (isset($this->_rootref['TRANSLATION_INFO'])) ? $this->_rootref['TRANSLATION_INFO'] : ''; ?><br /><?php } if ($this->_rootref['DEBUG_OUTPUT']) {  echo (isset($this->_rootref['DEBUG_OUTPUT'])) ? $this->_rootref['DEBUG_OUTPUT'] : ''; } ?>

	</p>
	<?php } ?>

	<p class="copyright">
		<a href="http://www.phpbb.com/" class="phpbb-group" title="Powered by phpBB">Powered by phpBB&reg; Forum Software &copy; phpBB Group</a> 
<!--
    Please do not remove style author's link below. For updates and support visit http://www.artodia.com/
//-->
		<a href="http://www.artodia.com/" class="arty" title="phpBB style by Arty">phpBB style by Arty</a>
	</p>
	<div class="clear"><?php if (! $this->_rootref['S_IS_BOT']) {  echo (isset($this->_rootref['RUN_CRON_TASK'])) ? $this->_rootref['RUN_CRON_TASK'] : ''; } ?></div>
</div>


</div><!-- layout-outer -->
</div><!-- body-wrapper --><?php $this->_tpl_include('scripts_footer.html'); ?>


</body>
</html>