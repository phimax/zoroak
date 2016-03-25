<?php if (!defined('IN_PHPBB')) exit; if ($this->_rootref['S_JUMPBOX_ACTION'] && sizeof($this->_tpldata['jumpbox_forums'])) {  $this->_tpldata['DEFINE']['.']['JUMPBOX'] = 1; } else if (sizeof($this->_tpldata['forumrow'])) {  $this->_tpldata['DEFINE']['.']['JUMPBOX'] = 2; } ?>

<script>

	var phpBB = {
		currentPage: '<?php echo (isset($this->_tpldata['DEFINE']['.']['CURRENT_PAGE'])) ? $this->_tpldata['DEFINE']['.']['CURRENT_PAGE'] : ''; ?>',
		themePath: '<?php echo (isset($this->_rootref['T_THEME_PATH'])) ? $this->_rootref['T_THEME_PATH'] : ''; ?>',
		lang: '<?php echo (isset($this->_rootref['S_USER_LANG'])) ? $this->_rootref['S_USER_LANG'] : ''; ?>'
	};

	var jump_page = '<?php echo ((isset($this->_rootref['LA_JUMP_PAGE'])) ? $this->_rootref['LA_JUMP_PAGE'] : ((isset($this->_rootref['L_JUMP_PAGE'])) ? addslashes($this->_rootref['L_JUMP_PAGE']) : ((isset($user->lang['JUMP_PAGE'])) ? addslashes($user->lang['JUMP_PAGE']) : '{ JUMP_PAGE }'))); ?>:';
	var on_page = '<?php echo (isset($this->_rootref['ON_PAGE'])) ? $this->_rootref['ON_PAGE'] : ''; ?>';
	var per_page = '<?php echo (isset($this->_rootref['PER_PAGE'])) ? $this->_rootref['PER_PAGE'] : ''; ?>';
	var base_url = '<?php echo (isset($this->_rootref['A_BASE_URL'])) ? $this->_rootref['A_BASE_URL'] : ''; ?>';
	var style_cookie = 'phpBBstyle';
	var style_cookie_settings = '<?php echo (isset($this->_rootref['A_COOKIE_SETTINGS'])) ? $this->_rootref['A_COOKIE_SETTINGS'] : ''; ?>';
	var onload_functions = new Array();
	var onunload_functions = new Array();

	/**
	* Find a member
	*/
	function find_username(url)
	{
		popup(url, 760, 570, '_usersearch');
		return false;
	}

	/**
	* New function for handling multiple calls to window.onload and window.unload by pentapenguin
	*/
	window.onload = function()
	{
		for (var i = 0; i < onload_functions.length; i++)
		{
			eval(onload_functions[i]);
		}
	};

	window.onunload = function()
	{
		for (var i = 0; i < onunload_functions.length; i++)
		{
			eval(onunload_functions[i]);
		}
	};

</script>
<script src="<?php echo (isset($this->_rootref['T_SUPER_TEMPLATE_PATH'])) ? $this->_rootref['T_SUPER_TEMPLATE_PATH'] : ''; ?>/forum_fn.js"></script>

<?php if ($this->_tpldata['DEFINE']['.']['S_POSTING_JS']) {  ?>

<script type="text/javascript">
// <![CDATA[
	onload_functions.push('apply_onkeypress_event()');

	var form_name = 'postform';
	var text_name = <?php if ($this->_tpldata['DEFINE']['.']['SIG_EDIT']) {  ?>'signature'<?php } else { ?>'message'<?php } ?>;
	var load_draft = false;
	var upload = false;

	// Define the bbCode tags
	var bbcode = new Array();
	var bbtags = new Array('[b]','[/b]','[i]','[/i]','[u]','[/u]','[quote]','[/quote]','[code]','[/code]','[list]','[/list]','[list=]','[/list]','[img]','[/img]','[url]','[/url]','[flash=]', '[/flash]','[size=]','[/size]'<?php $_custom_tags_count = (isset($this->_tpldata['custom_tags'])) ? sizeof($this->_tpldata['custom_tags']) : 0;if ($_custom_tags_count) {for ($_custom_tags_i = 0; $_custom_tags_i < $_custom_tags_count; ++$_custom_tags_i){$_custom_tags_val = &$this->_tpldata['custom_tags'][$_custom_tags_i]; ?>, <?php echo $_custom_tags_val['BBCODE_NAME']; }} ?>);
	var imageTag = false;

	// Helpline messages
	var help_line = {
		b: '<?php echo ((isset($this->_rootref['LA_BBCODE_B_HELP'])) ? $this->_rootref['LA_BBCODE_B_HELP'] : ((isset($this->_rootref['L_BBCODE_B_HELP'])) ? addslashes($this->_rootref['L_BBCODE_B_HELP']) : ((isset($user->lang['BBCODE_B_HELP'])) ? addslashes($user->lang['BBCODE_B_HELP']) : '{ BBCODE_B_HELP }'))); ?>',
		i: '<?php echo ((isset($this->_rootref['LA_BBCODE_I_HELP'])) ? $this->_rootref['LA_BBCODE_I_HELP'] : ((isset($this->_rootref['L_BBCODE_I_HELP'])) ? addslashes($this->_rootref['L_BBCODE_I_HELP']) : ((isset($user->lang['BBCODE_I_HELP'])) ? addslashes($user->lang['BBCODE_I_HELP']) : '{ BBCODE_I_HELP }'))); ?>',
		u: '<?php echo ((isset($this->_rootref['LA_BBCODE_U_HELP'])) ? $this->_rootref['LA_BBCODE_U_HELP'] : ((isset($this->_rootref['L_BBCODE_U_HELP'])) ? addslashes($this->_rootref['L_BBCODE_U_HELP']) : ((isset($user->lang['BBCODE_U_HELP'])) ? addslashes($user->lang['BBCODE_U_HELP']) : '{ BBCODE_U_HELP }'))); ?>',
		q: '<?php echo ((isset($this->_rootref['LA_BBCODE_Q_HELP'])) ? $this->_rootref['LA_BBCODE_Q_HELP'] : ((isset($this->_rootref['L_BBCODE_Q_HELP'])) ? addslashes($this->_rootref['L_BBCODE_Q_HELP']) : ((isset($user->lang['BBCODE_Q_HELP'])) ? addslashes($user->lang['BBCODE_Q_HELP']) : '{ BBCODE_Q_HELP }'))); ?>',
		c: '<?php echo ((isset($this->_rootref['LA_BBCODE_C_HELP'])) ? $this->_rootref['LA_BBCODE_C_HELP'] : ((isset($this->_rootref['L_BBCODE_C_HELP'])) ? addslashes($this->_rootref['L_BBCODE_C_HELP']) : ((isset($user->lang['BBCODE_C_HELP'])) ? addslashes($user->lang['BBCODE_C_HELP']) : '{ BBCODE_C_HELP }'))); ?>',
		l: '<?php echo ((isset($this->_rootref['LA_BBCODE_L_HELP'])) ? $this->_rootref['LA_BBCODE_L_HELP'] : ((isset($this->_rootref['L_BBCODE_L_HELP'])) ? addslashes($this->_rootref['L_BBCODE_L_HELP']) : ((isset($user->lang['BBCODE_L_HELP'])) ? addslashes($user->lang['BBCODE_L_HELP']) : '{ BBCODE_L_HELP }'))); ?>',
		o: '<?php echo ((isset($this->_rootref['LA_BBCODE_O_HELP'])) ? $this->_rootref['LA_BBCODE_O_HELP'] : ((isset($this->_rootref['L_BBCODE_O_HELP'])) ? addslashes($this->_rootref['L_BBCODE_O_HELP']) : ((isset($user->lang['BBCODE_O_HELP'])) ? addslashes($user->lang['BBCODE_O_HELP']) : '{ BBCODE_O_HELP }'))); ?>',
		p: '<?php echo ((isset($this->_rootref['LA_BBCODE_P_HELP'])) ? $this->_rootref['LA_BBCODE_P_HELP'] : ((isset($this->_rootref['L_BBCODE_P_HELP'])) ? addslashes($this->_rootref['L_BBCODE_P_HELP']) : ((isset($user->lang['BBCODE_P_HELP'])) ? addslashes($user->lang['BBCODE_P_HELP']) : '{ BBCODE_P_HELP }'))); ?>',
		w: '<?php echo ((isset($this->_rootref['LA_BBCODE_W_HELP'])) ? $this->_rootref['LA_BBCODE_W_HELP'] : ((isset($this->_rootref['L_BBCODE_W_HELP'])) ? addslashes($this->_rootref['L_BBCODE_W_HELP']) : ((isset($user->lang['BBCODE_W_HELP'])) ? addslashes($user->lang['BBCODE_W_HELP']) : '{ BBCODE_W_HELP }'))); ?>',
		a: '<?php echo ((isset($this->_rootref['LA_BBCODE_A_HELP'])) ? $this->_rootref['LA_BBCODE_A_HELP'] : ((isset($this->_rootref['L_BBCODE_A_HELP'])) ? addslashes($this->_rootref['L_BBCODE_A_HELP']) : ((isset($user->lang['BBCODE_A_HELP'])) ? addslashes($user->lang['BBCODE_A_HELP']) : '{ BBCODE_A_HELP }'))); ?>',
		s: '<?php echo ((isset($this->_rootref['LA_BBCODE_S_HELP'])) ? $this->_rootref['LA_BBCODE_S_HELP'] : ((isset($this->_rootref['L_BBCODE_S_HELP'])) ? addslashes($this->_rootref['L_BBCODE_S_HELP']) : ((isset($user->lang['BBCODE_S_HELP'])) ? addslashes($user->lang['BBCODE_S_HELP']) : '{ BBCODE_S_HELP }'))); ?>',
		f: '<?php echo ((isset($this->_rootref['LA_BBCODE_F_HELP'])) ? $this->_rootref['LA_BBCODE_F_HELP'] : ((isset($this->_rootref['L_BBCODE_F_HELP'])) ? addslashes($this->_rootref['L_BBCODE_F_HELP']) : ((isset($user->lang['BBCODE_F_HELP'])) ? addslashes($user->lang['BBCODE_F_HELP']) : '{ BBCODE_F_HELP }'))); ?>',
		y: '<?php echo ((isset($this->_rootref['LA_BBCODE_Y_HELP'])) ? $this->_rootref['LA_BBCODE_Y_HELP'] : ((isset($this->_rootref['L_BBCODE_Y_HELP'])) ? addslashes($this->_rootref['L_BBCODE_Y_HELP']) : ((isset($user->lang['BBCODE_Y_HELP'])) ? addslashes($user->lang['BBCODE_Y_HELP']) : '{ BBCODE_Y_HELP }'))); ?>',
		d: '<?php echo ((isset($this->_rootref['LA_BBCODE_D_HELP'])) ? $this->_rootref['LA_BBCODE_D_HELP'] : ((isset($this->_rootref['L_BBCODE_D_HELP'])) ? addslashes($this->_rootref['L_BBCODE_D_HELP']) : ((isset($user->lang['BBCODE_D_HELP'])) ? addslashes($user->lang['BBCODE_D_HELP']) : '{ BBCODE_D_HELP }'))); ?>'
		<?php $_custom_tags_count = (isset($this->_tpldata['custom_tags'])) ? sizeof($this->_tpldata['custom_tags']) : 0;if ($_custom_tags_count) {for ($_custom_tags_i = 0; $_custom_tags_i < $_custom_tags_count; ++$_custom_tags_i){$_custom_tags_val = &$this->_tpldata['custom_tags'][$_custom_tags_i]; ?>

			,cb_<?php echo $_custom_tags_val['BBCODE_ID']; ?>: '<?php echo $_custom_tags_val['A_BBCODE_HELPLINE']; ?>'
		<?php }} ?>

	}

	var panels = new Array('options-panel', 'attach-panel', 'poll-panel');
	var show_panel = 'options-panel';

    function change_palette()
    {
        dE('colour_palette');
        e = document.getElementById('colour_palette');
        
        if (e.style.display == 'block')
        {
            document.getElementById('bbpalette').value = '<?php echo ((isset($this->_rootref['LA_FONT_COLOR_HIDE'])) ? $this->_rootref['LA_FONT_COLOR_HIDE'] : ((isset($this->_rootref['L_FONT_COLOR_HIDE'])) ? addslashes($this->_rootref['L_FONT_COLOR_HIDE']) : ((isset($user->lang['FONT_COLOR_HIDE'])) ? addslashes($user->lang['FONT_COLOR_HIDE']) : '{ FONT_COLOR_HIDE }'))); ?>';
        }
        else
        {
            document.getElementById('bbpalette').value = '<?php echo ((isset($this->_rootref['LA_FONT_COLOR'])) ? $this->_rootref['LA_FONT_COLOR'] : ((isset($this->_rootref['L_FONT_COLOR'])) ? addslashes($this->_rootref['L_FONT_COLOR']) : ((isset($user->lang['FONT_COLOR'])) ? addslashes($user->lang['FONT_COLOR']) : '{ FONT_COLOR }'))); ?>';
        }
    }
	onload_functions.push('colorPalette(\'h\', 15, 10);');

// ]]>
</script>
<script type="text/javascript" src="<?php echo (isset($this->_rootref['T_TEMPLATE_PATH'])) ? $this->_rootref['T_TEMPLATE_PATH'] : ''; ?>/editor.js"></script>
<?php } ?>