<?php if (!defined('IN_PHPBB')) exit; if ($this->_rootref['S_BBCODE_ALLOWED']) {  ?>

<div id="colour_palette" style="display: none;">
	<dl style="clear: left;">
		<dt><label><?php echo ((isset($this->_rootref['L_FONT_COLOR'])) ? $this->_rootref['L_FONT_COLOR'] : ((isset($user->lang['FONT_COLOR'])) ? $user->lang['FONT_COLOR'] : '{ FONT_COLOR }')); ?>:</label></dt>
		<dd id="palette-container">
		</dd>
	</dl>
</div>

<div id="format-buttons">
	<input type="button" class="button2" accesskey="b" name="addbbcode0" value=" B " style="font-weight:bold; width: 30px" onclick="bbstyle(0)" title="<?php echo ((isset($this->_rootref['L_BBCODE_B_HELP'])) ? $this->_rootref['L_BBCODE_B_HELP'] : ((isset($user->lang['BBCODE_B_HELP'])) ? $user->lang['BBCODE_B_HELP'] : '{ BBCODE_B_HELP }')); ?>" />
	<input type="button" class="button2" accesskey="i" name="addbbcode2" value=" i " style="font-style:italic; width: 30px" onclick="bbstyle(2)" title="<?php echo ((isset($this->_rootref['L_BBCODE_I_HELP'])) ? $this->_rootref['L_BBCODE_I_HELP'] : ((isset($user->lang['BBCODE_I_HELP'])) ? $user->lang['BBCODE_I_HELP'] : '{ BBCODE_I_HELP }')); ?>" />
	<input type="button" class="button2" accesskey="u" name="addbbcode4" value=" u " style="text-decoration: underline; width: 30px" onclick="bbstyle(4)" title="<?php echo ((isset($this->_rootref['L_BBCODE_U_HELP'])) ? $this->_rootref['L_BBCODE_U_HELP'] : ((isset($user->lang['BBCODE_U_HELP'])) ? $user->lang['BBCODE_U_HELP'] : '{ BBCODE_U_HELP }')); ?>" />
	<?php if ($this->_rootref['S_BBCODE_QUOTE']) {  ?>

		<input type="button" class="button2" accesskey="q" name="addbbcode6" value="Quote" style="width: 50px" onclick="bbstyle(6)" title="<?php echo ((isset($this->_rootref['L_BBCODE_Q_HELP'])) ? $this->_rootref['L_BBCODE_Q_HELP'] : ((isset($user->lang['BBCODE_Q_HELP'])) ? $user->lang['BBCODE_Q_HELP'] : '{ BBCODE_Q_HELP }')); ?>" />
	<?php } ?>

	<input type="button" class="button2" accesskey="c" name="addbbcode8" value="Code" style="width: 40px" onclick="bbstyle(8)" title="<?php echo ((isset($this->_rootref['L_BBCODE_C_HELP'])) ? $this->_rootref['L_BBCODE_C_HELP'] : ((isset($user->lang['BBCODE_C_HELP'])) ? $user->lang['BBCODE_C_HELP'] : '{ BBCODE_C_HELP }')); ?>" />
	<input type="button" class="button2" accesskey="l" name="addbbcode10" value="List" style="width: 40px" onclick="bbstyle(10)" title="<?php echo ((isset($this->_rootref['L_BBCODE_L_HELP'])) ? $this->_rootref['L_BBCODE_L_HELP'] : ((isset($user->lang['BBCODE_L_HELP'])) ? $user->lang['BBCODE_L_HELP'] : '{ BBCODE_L_HELP }')); ?>" />
	<input type="button" class="button2" accesskey="o" name="addbbcode12" value="List=" style="width: 40px" onclick="bbstyle(12)" title="<?php echo ((isset($this->_rootref['L_BBCODE_O_HELP'])) ? $this->_rootref['L_BBCODE_O_HELP'] : ((isset($user->lang['BBCODE_O_HELP'])) ? $user->lang['BBCODE_O_HELP'] : '{ BBCODE_O_HELP }')); ?>" />
	<input type="button" class="button2" accesskey="y" name="addlistitem" value="[*]" style="width: 40px" onclick="bbstyle(-1)" title="<?php echo ((isset($this->_rootref['L_BBCODE_LISTITEM_HELP'])) ? $this->_rootref['L_BBCODE_LISTITEM_HELP'] : ((isset($user->lang['BBCODE_LISTITEM_HELP'])) ? $user->lang['BBCODE_LISTITEM_HELP'] : '{ BBCODE_LISTITEM_HELP }')); ?>" />
	<?php if ($this->_rootref['S_BBCODE_IMG']) {  ?>

		<input type="button" class="button2" accesskey="p" name="addbbcode14" value="Img" style="width: 40px" onclick="bbstyle(14)" title="<?php echo ((isset($this->_rootref['L_BBCODE_P_HELP'])) ? $this->_rootref['L_BBCODE_P_HELP'] : ((isset($user->lang['BBCODE_P_HELP'])) ? $user->lang['BBCODE_P_HELP'] : '{ BBCODE_P_HELP }')); ?>" />
	<?php } if ($this->_rootref['S_LINKS_ALLOWED']) {  ?>

		<input type="button" class="button2" accesskey="w" name="addbbcode16" value="URL" style="text-decoration: underline; width: 40px" onclick="bbstyle(16)" title="<?php echo ((isset($this->_rootref['L_BBCODE_W_HELP'])) ? $this->_rootref['L_BBCODE_W_HELP'] : ((isset($user->lang['BBCODE_W_HELP'])) ? $user->lang['BBCODE_W_HELP'] : '{ BBCODE_W_HELP }')); ?>" />
	<?php } if ($this->_rootref['S_BBCODE_FLASH']) {  ?>

		<input type="button" class="button2" accesskey="d" name="addbbcode18" value="Flash" onclick="bbstyle(18)" title="<?php echo ((isset($this->_rootref['L_BBCODE_D_HELP'])) ? $this->_rootref['L_BBCODE_D_HELP'] : ((isset($user->lang['BBCODE_D_HELP'])) ? $user->lang['BBCODE_D_HELP'] : '{ BBCODE_D_HELP }')); ?>" />
	<?php } ?>

	<select name="addbbcode20" onchange="bbfontstyle('[size=' + this.form.addbbcode20.options[this.form.addbbcode20.selectedIndex].value + ']', '[/size]');this.form.addbbcode20.selectedIndex = 2;" title="<?php echo ((isset($this->_rootref['L_BBCODE_F_HELP'])) ? $this->_rootref['L_BBCODE_F_HELP'] : ((isset($user->lang['BBCODE_F_HELP'])) ? $user->lang['BBCODE_F_HELP'] : '{ BBCODE_F_HELP }')); ?>">
		<option value="50"><?php echo ((isset($this->_rootref['L_FONT_TINY'])) ? $this->_rootref['L_FONT_TINY'] : ((isset($user->lang['FONT_TINY'])) ? $user->lang['FONT_TINY'] : '{ FONT_TINY }')); ?></option>
		<option value="85"><?php echo ((isset($this->_rootref['L_FONT_SMALL'])) ? $this->_rootref['L_FONT_SMALL'] : ((isset($user->lang['FONT_SMALL'])) ? $user->lang['FONT_SMALL'] : '{ FONT_SMALL }')); ?></option>
		<option value="100" selected="selected"><?php echo ((isset($this->_rootref['L_FONT_NORMAL'])) ? $this->_rootref['L_FONT_NORMAL'] : ((isset($user->lang['FONT_NORMAL'])) ? $user->lang['FONT_NORMAL'] : '{ FONT_NORMAL }')); ?></option>
		<?php if (! $this->_rootref['MAX_FONT_SIZE'] || $this->_rootref['MAX_FONT_SIZE'] >= (150)) {  ?>

			<option value="150"><?php echo ((isset($this->_rootref['L_FONT_LARGE'])) ? $this->_rootref['L_FONT_LARGE'] : ((isset($user->lang['FONT_LARGE'])) ? $user->lang['FONT_LARGE'] : '{ FONT_LARGE }')); ?></option>
			<?php if (! $this->_rootref['MAX_FONT_SIZE'] || $this->_rootref['MAX_FONT_SIZE'] >= (200)) {  ?>

				<option value="200"><?php echo ((isset($this->_rootref['L_FONT_HUGE'])) ? $this->_rootref['L_FONT_HUGE'] : ((isset($user->lang['FONT_HUGE'])) ? $user->lang['FONT_HUGE'] : '{ FONT_HUGE }')); ?></option>
			<?php } } ?>

	</select>
	<input type="button" class="button2" name="bbpalette" id="bbpalette" value="<?php echo ((isset($this->_rootref['L_FONT_COLOR'])) ? $this->_rootref['L_FONT_COLOR'] : ((isset($user->lang['FONT_COLOR'])) ? $user->lang['FONT_COLOR'] : '{ FONT_COLOR }')); ?>" onclick="change_palette();" title="<?php echo ((isset($this->_rootref['L_BBCODE_S_HELP'])) ? $this->_rootref['L_BBCODE_S_HELP'] : ((isset($user->lang['BBCODE_S_HELP'])) ? $user->lang['BBCODE_S_HELP'] : '{ BBCODE_S_HELP }')); ?>" />
	<?php $_custom_tags_count = (isset($this->_tpldata['custom_tags'])) ? sizeof($this->_tpldata['custom_tags']) : 0;if ($_custom_tags_count) {for ($_custom_tags_i = 0; $_custom_tags_i < $_custom_tags_count; ++$_custom_tags_i){$_custom_tags_val = &$this->_tpldata['custom_tags'][$_custom_tags_i]; ?>

		<input type="button" class="button2" name="addbbcode<?php echo $_custom_tags_val['BBCODE_ID']; ?>" value="<?php echo $_custom_tags_val['BBCODE_TAG']; ?>" onclick="bbstyle(<?php echo $_custom_tags_val['BBCODE_ID']; ?>)" title="<?php echo $_custom_tags_val['BBCODE_HELPLINE']; ?>" />
	<?php }} ?>

</div>
<?php } ?>