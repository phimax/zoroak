<?php if (!defined('IN_PHPBB')) exit; ?><!--[if lt IE 9]>
	<script type="text/javascript" src="<?php echo (isset($this->_rootref['T_TEMPLATE_PATH'])) ? $this->_rootref['T_TEMPLATE_PATH'] : ''; ?>/jquery-1.10.2.min.js"></script>
<![endif]-->
<!--[if gte IE 9]><!-->
	<script type="text/javascript" src="<?php echo (isset($this->_rootref['T_TEMPLATE_PATH'])) ? $this->_rootref['T_TEMPLATE_PATH'] : ''; ?>/jquery-2.0.3.min.js"></script>
<!--<![endif]-->
<script src="<?php echo (isset($this->_rootref['T_THEME_PATH'])) ? $this->_rootref['T_THEME_PATH'] : ''; ?>/theme.js"></script>
<?php if ($this->_tpldata['DEFINE']['.']['JUMPBOX'] && ! $this->_tpldata['DEFINE']['.']['SIMPLE']) {  if ($this->_tpldata['DEFINE']['.']['JUMPBOX'] == (1)) {  ?>

	<script>
		phpBB.jumpBoxAction = '<?php echo (isset($this->_rootref['S_JUMPBOX_ACTION'])) ? $this->_rootref['S_JUMPBOX_ACTION'] : ''; ?>';
		phpBB.jumpBoxData = [
			<?php $_jumpbox_forums_count = (isset($this->_tpldata['jumpbox_forums'])) ? sizeof($this->_tpldata['jumpbox_forums']) : 0;if ($_jumpbox_forums_count) {for ($_jumpbox_forums_i = 0; $_jumpbox_forums_i < $_jumpbox_forums_count; ++$_jumpbox_forums_i){$_jumpbox_forums_val = &$this->_tpldata['jumpbox_forums'][$_jumpbox_forums_i]; if (! $_jumpbox_forums_val['S_IS_LINK']) {  ?>

			{
				'id'	: <?php echo $_jumpbox_forums_val['FORUM_ID']; ?>,
				<?php if ($_jumpbox_forums_val['SELECTED']) {  ?>'selected'  : true,
				<?php } ?>'level'	 : '<?php $_level_count = (isset($_jumpbox_forums_val['level'])) ? sizeof($_jumpbox_forums_val['level']) : 0;if ($_level_count) {for ($_level_i = 0; $_level_i < $_level_count; ++$_level_i){$_level_val = &$_jumpbox_forums_val['level'][$_level_i]; ?>.<?php }} ?>'
			}<?php if (! $_jumpbox_forums_val['S_LAST_ROW']) {  ?>,<?php } } }} ?>

		];
	</script>
	<?php } else { ?>

	<script>
		phpBB.jumpBoxAction = true;
		phpBB.jumpBoxData = [
			<?php $_forumrow_count = (isset($this->_tpldata['forumrow'])) ? sizeof($this->_tpldata['forumrow']) : 0;if ($_forumrow_count) {for ($_forumrow_i = 0; $_forumrow_i < $_forumrow_count; ++$_forumrow_i){$_forumrow_val = &$this->_tpldata['forumrow'][$_forumrow_i]; if (! $_forumrow_val['S_IS_LINK']) {  ?>

			{
				'id'	: <?php echo $_forumrow_val['FORUM_ID']; ?>,
				'url'   : '<?php echo $_forumrow_val['U_VIEWFORUM']; ?>',
				'level' : '<?php if (! $_forumrow_val['S_IS_CAT']) {  ?>.<?php } ?>'
			}<?php $_subforum_count = (isset($_forumrow_val['subforum'])) ? sizeof($_forumrow_val['subforum']) : 0;if ($_subforum_count) {for ($_subforum_i = 0; $_subforum_i < $_subforum_count; ++$_subforum_i){$_subforum_val = &$_forumrow_val['subforum'][$_subforum_i]; ?>,
			{
				'id'	: 0,
				'url'   : '<?php echo $_subforum_val['U_SUBFORUM']; ?>',
				'level' : '..'
			}<?php }} if (! $_forumrow_val['S_LAST_ROW']) {  ?>,<?php } } }} ?>

		];
	</script>
	<?php } ?>

	<datalist id="jumpbox-data"><select id="jumpbox-data-select" style="display: none;">
		<?php if ($this->_tpldata['DEFINE']['.']['JUMPBOX'] == (1)) {  $_jumpbox_forums_count = (isset($this->_tpldata['jumpbox_forums'])) ? sizeof($this->_tpldata['jumpbox_forums']) : 0;if ($_jumpbox_forums_count) {for ($_jumpbox_forums_i = 0; $_jumpbox_forums_i < $_jumpbox_forums_count; ++$_jumpbox_forums_i){$_jumpbox_forums_val = &$this->_tpldata['jumpbox_forums'][$_jumpbox_forums_i]; if (! $_jumpbox_forums_val['S_IS_LINK']) {  ?><option><?php echo $_jumpbox_forums_val['FORUM_NAME']; ?></option><?php } }} } else { $_forumrow_count = (isset($this->_tpldata['forumrow'])) ? sizeof($this->_tpldata['forumrow']) : 0;if ($_forumrow_count) {for ($_forumrow_i = 0; $_forumrow_i < $_forumrow_count; ++$_forumrow_i){$_forumrow_val = &$this->_tpldata['forumrow'][$_forumrow_i]; if (! $_forumrow_val['S_IS_LINK']) {  ?><option><?php echo $_forumrow_val['FORUM_NAME']; ?></option><?php $_subforum_count = (isset($_forumrow_val['subforum'])) ? sizeof($_forumrow_val['subforum']) : 0;if ($_subforum_count) {for ($_subforum_i = 0; $_subforum_i < $_subforum_count; ++$_subforum_i){$_subforum_val = &$_forumrow_val['subforum'][$_subforum_i]; ?><option><?php echo $_subforum_val['SUBFORUM_NAME']; ?></option><?php }} } }} } ?>

	</select></datalist>
<?php } ?>