<?php if (!defined('IN_PHPBB')) exit; $this->_tpl_include('overall_header.html'); ?>


<a name="maincontent"></a>

<?php if ($this->_rootref['S_EDIT']) {  ?>


	<script type="text/javascript" defer="defer">
	// <![CDATA[
	<?php if ($this->_rootref['S_ADD_CODE']) {  ?>

	
			var smiley = Array();
			<?php $_smile_count = (isset($this->_tpldata['smile'])) ? sizeof($this->_tpldata['smile']) : 0;if ($_smile_count) {for ($_smile_i = 0; $_smile_i < $_smile_count; ++$_smile_i){$_smile_val = &$this->_tpldata['smile'][$_smile_i]; ?>

				smiley['<?php echo $_smile_val['SMILEY_URL']; ?>'] = Array();
				smiley['<?php echo $_smile_val['SMILEY_URL']; ?>']['code'] = '<?php echo $_smile_val['CODE']; ?>';
				smiley['<?php echo $_smile_val['SMILEY_URL']; ?>']['emotion'] = '<?php echo $_smile_val['EMOTION']; ?>';
				smiley['<?php echo $_smile_val['SMILEY_URL']; ?>']['width'] = <?php echo $_smile_val['WIDTH']; ?>;
				smiley['<?php echo $_smile_val['SMILEY_URL']; ?>']['height'] = <?php echo $_smile_val['HEIGHT']; ?>;
				smiley['<?php echo $_smile_val['SMILEY_URL']; ?>']['order'] = <?php echo $_smile_val['ORDER']; ?>;
			<?php }} ?>


			function update_image(newimage)
			{
				var use_element = smiley[newimage];

				document.getElementById('add_image_src').src = '<?php echo (isset($this->_rootref['PHPBB_ROOT_PATH'])) ? $this->_rootref['PHPBB_ROOT_PATH'] : ''; echo (isset($this->_rootref['IMG_PATH'])) ? $this->_rootref['IMG_PATH'] : ''; ?>/' + encodeURI(newimage);
				document.getElementById('add_code').value = use_element['code'];
				document.getElementById('add_emotion').value = use_element['emotion'];
				document.getElementById('add_width').value = use_element['width'];
				document.getElementById('add_height').value = use_element['height'];

				element = document.getElementById('add_order');
				for (var i = 0; i < element.length; i++)
				{
					if (element.options[i].value == use_element['order'])
					{
						document.getElementById('add_order').options.selectedIndex = i;
					}
				}
			}
		
	<?php } ?>


	
	function toggle_select(icon, display, select)
	{
		var disp = document.getElementById('order_disp_' + select);
		var nodisp = document.getElementById('order_no_disp_' + select);
		disp.disabled = !display;
		nodisp.disabled = display;
		if (display)
		{
			document.getElementById('order_' + select).selectedIndex = 0;
			nodisp.className = 'disabled-options';
			disp.className = '';
		}
		else
		{
			document.getElementById('order_' + select).selectedIndex = <?php echo (isset($this->_rootref['S_ORDER_LIST_DISPLAY_COUNT'])) ? $this->_rootref['S_ORDER_LIST_DISPLAY_COUNT'] : ''; ?>;
			disp.className = 'disabled-options';
			nodisp.className = '';
		}
	}
	// ]]>
	</script>

	<a href="<?php echo (isset($this->_rootref['U_BACK'])) ? $this->_rootref['U_BACK'] : ''; ?>" style="float: <?php echo (isset($this->_rootref['S_CONTENT_FLOW_END'])) ? $this->_rootref['S_CONTENT_FLOW_END'] : ''; ?>;">&laquo; <?php echo ((isset($this->_rootref['L_BACK'])) ? $this->_rootref['L_BACK'] : ((isset($user->lang['BACK'])) ? $user->lang['BACK'] : '{ BACK }')); ?></a>

	<h1><?php echo ((isset($this->_rootref['L_TITLE'])) ? $this->_rootref['L_TITLE'] : ((isset($user->lang['TITLE'])) ? $user->lang['TITLE'] : '{ TITLE }')); ?></h1>

	<p><?php echo ((isset($this->_rootref['L_EXPLAIN'])) ? $this->_rootref['L_EXPLAIN'] : ((isset($user->lang['EXPLAIN'])) ? $user->lang['EXPLAIN'] : '{ EXPLAIN }')); ?></p>

	<form id="acp_icons" method="post" action="<?php echo (isset($this->_rootref['U_ACTION'])) ? $this->_rootref['U_ACTION'] : ''; ?>">

	<fieldset class="tabulated">
	<legend><?php echo ((isset($this->_rootref['L_TITLE'])) ? $this->_rootref['L_TITLE'] : ((isset($user->lang['TITLE'])) ? $user->lang['TITLE'] : '{ TITLE }')); ?></legend>

	<table cellspacing="1" id="smilies">
	<thead>
	<tr>
		<th colspan="<?php echo (isset($this->_rootref['COLSPAN'])) ? $this->_rootref['COLSPAN'] : ''; ?>"><?php echo ((isset($this->_rootref['L_CONFIG'])) ? $this->_rootref['L_CONFIG'] : ((isset($user->lang['CONFIG'])) ? $user->lang['CONFIG'] : '{ CONFIG }')); ?></th>
	</tr>
	<?php if (sizeof($this->_tpldata['items']) || $this->_rootref['S_ADD_CODE']) {  ?>

	<tr class="row3">
		<td><?php echo ((isset($this->_rootref['L_URL'])) ? $this->_rootref['L_URL'] : ((isset($user->lang['URL'])) ? $user->lang['URL'] : '{ URL }')); ?></td>
		<td><?php echo ((isset($this->_rootref['L_LOCATION'])) ? $this->_rootref['L_LOCATION'] : ((isset($user->lang['LOCATION'])) ? $user->lang['LOCATION'] : '{ LOCATION }')); ?></td>
	<?php if ($this->_rootref['S_SMILIES']) {  ?>

		<td><?php echo ((isset($this->_rootref['L_SMILIES_CODE'])) ? $this->_rootref['L_SMILIES_CODE'] : ((isset($user->lang['SMILIES_CODE'])) ? $user->lang['SMILIES_CODE'] : '{ SMILIES_CODE }')); ?></td>
		<td><?php echo ((isset($this->_rootref['L_SMILIES_EMOTION'])) ? $this->_rootref['L_SMILIES_EMOTION'] : ((isset($user->lang['SMILIES_EMOTION'])) ? $user->lang['SMILIES_EMOTION'] : '{ SMILIES_EMOTION }')); ?></td>
	<?php } ?>

		<td><?php echo ((isset($this->_rootref['L_WIDTH'])) ? $this->_rootref['L_WIDTH'] : ((isset($user->lang['WIDTH'])) ? $user->lang['WIDTH'] : '{ WIDTH }')); ?></td>
		<td><?php echo ((isset($this->_rootref['L_HEIGHT'])) ? $this->_rootref['L_HEIGHT'] : ((isset($user->lang['HEIGHT'])) ? $user->lang['HEIGHT'] : '{ HEIGHT }')); ?></td>
		<td><?php echo ((isset($this->_rootref['L_DISPLAY_ON_POSTING'])) ? $this->_rootref['L_DISPLAY_ON_POSTING'] : ((isset($user->lang['DISPLAY_ON_POSTING'])) ? $user->lang['DISPLAY_ON_POSTING'] : '{ DISPLAY_ON_POSTING }')); ?></td>
	<?php if ($this->_rootref['ID'] || $this->_rootref['S_ADD']) {  ?>

		<td><?php echo ((isset($this->_rootref['L_ORDER'])) ? $this->_rootref['L_ORDER'] : ((isset($user->lang['ORDER'])) ? $user->lang['ORDER'] : '{ ORDER }')); ?></td>
	<?php } if ($this->_rootref['S_ADD']) {  ?>

		<td><?php echo ((isset($this->_rootref['L_ADD'])) ? $this->_rootref['L_ADD'] : ((isset($user->lang['ADD'])) ? $user->lang['ADD'] : '{ ADD }')); ?> <a href="#" onclick="marklist('smilies', 'add_img', true); return false;">(<?php echo ((isset($this->_rootref['L_MARK_ALL'])) ? $this->_rootref['L_MARK_ALL'] : ((isset($user->lang['MARK_ALL'])) ? $user->lang['MARK_ALL'] : '{ MARK_ALL }')); ?>)</a></td>
	<?php } ?>

	</tr>
	</thead>
	<tbody>
	<?php $_items_count = (isset($this->_tpldata['items'])) ? sizeof($this->_tpldata['items']) : 0;if ($_items_count) {for ($_items_i = 0; $_items_i < $_items_count; ++$_items_i){$_items_val = &$this->_tpldata['items'][$_items_i]; if (!($_items_val['S_ROW_COUNT'] & 1)  ) {  ?><tr class="row1"><?php } else { ?><tr class="row2"><?php } ?>

	
		<td style="text-align: center;"><img src="<?php echo $_items_val['IMG_SRC']; ?>" alt="" title="" /><input type="hidden" name="image[<?php echo $_items_val['IMG']; ?>]" value="1" /></td>
		<td style="vertical-align: top;">[<?php echo $_items_val['IMG']; ?>]</td>
		<?php if ($this->_rootref['S_SMILIES']) {  ?>

			<td><input class="text post" type="text" name="code[<?php echo $_items_val['IMG']; ?>]" value="<?php echo $_items_val['CODE']; ?>" size="10" maxlength="50" /></td>
			<td><input class="text post" type="text" name="emotion[<?php echo $_items_val['IMG']; ?>]" value="<?php echo $_items_val['EMOTION']; ?>" size="10" maxlength="50" /></td>
		<?php } ?>

		<td><input class="text post" type="text" size="3" name="width[<?php echo $_items_val['IMG']; ?>]" value="<?php echo $_items_val['WIDTH']; ?>" /></td>
		<td><input class="text post" type="text" size="3" name="height[<?php echo $_items_val['IMG']; ?>]" value="<?php echo $_items_val['HEIGHT']; ?>" /></td>
		<td>
			<input type="checkbox" class="radio" name="display_on_posting[<?php echo $_items_val['IMG']; ?>]"<?php echo $_items_val['POSTING_CHECKED']; ?> onclick="toggle_select('<?php echo $_items_val['A_IMG']; ?>', this.checked, '<?php echo $_items_val['S_ROW_COUNT']; ?>');"/>
			<?php if ($_items_val['S_ID']) {  ?>

				<input type="hidden" name="id[<?php echo $_items_val['IMG']; ?>]" value="<?php echo $_items_val['ID']; ?>" />
			<?php } ?>

		</td>
		<?php if ($this->_rootref['ID'] || $this->_rootref['S_ADD']) {  ?>

			<td><select id="order_<?php echo $_items_val['S_ROW_COUNT']; ?>" name="order[<?php echo $_items_val['IMG']; ?>]">
				<optgroup id="order_disp_<?php echo $_items_val['S_ROW_COUNT']; ?>" label="<?php echo ((isset($this->_rootref['L_DISPLAY_POSTING'])) ? $this->_rootref['L_DISPLAY_POSTING'] : ((isset($user->lang['DISPLAY_POSTING'])) ? $user->lang['DISPLAY_POSTING'] : '{ DISPLAY_POSTING }')); ?>" <?php if (! $_items_val['POSTING_CHECKED']) {  ?>disabled="disabled" class="disabled-options" <?php } ?>><?php echo (isset($this->_rootref['S_ORDER_LIST_DISPLAY'])) ? $this->_rootref['S_ORDER_LIST_DISPLAY'] : ''; ?></optgroup>
				<optgroup id="order_no_disp_<?php echo $_items_val['S_ROW_COUNT']; ?>" label="<?php echo ((isset($this->_rootref['L_DISPLAY_POSTING_NO'])) ? $this->_rootref['L_DISPLAY_POSTING_NO'] : ((isset($user->lang['DISPLAY_POSTING_NO'])) ? $user->lang['DISPLAY_POSTING_NO'] : '{ DISPLAY_POSTING_NO }')); ?>" <?php if ($_items_val['POSTING_CHECKED']) {  ?>disabled="disabled" class="disabled-options" <?php } ?>><?php echo (isset($this->_rootref['S_ORDER_LIST_UNDISPLAY'])) ? $this->_rootref['S_ORDER_LIST_UNDISPLAY'] : ''; ?></optgroup>
			</select></td>
		<?php } if ($this->_rootref['S_ADD']) {  ?>

			<td><input type="checkbox" class="radio" name="add_img[<?php echo $_items_val['IMG']; ?>]" value="1" /></td>
		<?php } ?>

		</tr>
	<?php }} if ($this->_rootref['S_ADD_CODE']) {  ?>

	<tr>
		<th colspan="<?php echo (isset($this->_rootref['COLSPAN'])) ? $this->_rootref['COLSPAN'] : ''; ?>"><?php echo ((isset($this->_rootref['L_ADD_SMILEY_CODE'])) ? $this->_rootref['L_ADD_SMILEY_CODE'] : ((isset($user->lang['ADD_SMILEY_CODE'])) ? $user->lang['ADD_SMILEY_CODE'] : '{ ADD_SMILEY_CODE }')); ?></th>
	</tr>
	<tr class="row1">
		<td style="text-align: center;"><select name="add_image" id="add_image" onchange="update_image(this.options[selectedIndex].value);"><?php echo (isset($this->_rootref['S_IMG_OPTIONS'])) ? $this->_rootref['S_IMG_OPTIONS'] : ''; ?></select></td>
		<td style="vertical-align: top;"><img src="<?php echo (isset($this->_rootref['IMG_SRC'])) ? $this->_rootref['IMG_SRC'] : ''; ?>" id="add_image_src" alt="" title="" /></td>
		<td><input class="text post" type="text" name="add_code" id="add_code" value="<?php echo (isset($this->_rootref['CODE'])) ? $this->_rootref['CODE'] : ''; ?>" size="10" maxlength="50" /></td>
		<td><input class="text post" type="text" name="add_emotion" id="add_emotion" value="<?php echo (isset($this->_rootref['EMOTION'])) ? $this->_rootref['EMOTION'] : ''; ?>" size="10" maxlength="50" /></td>
		<td><input class="text post" type="text" size="3" name="add_width" id="add_width" value="<?php echo (isset($this->_rootref['WIDTH'])) ? $this->_rootref['WIDTH'] : ''; ?>" /></td>
		<td><input class="text post" type="text" size="3" name="add_height" id="add_height" value="<?php echo (isset($this->_rootref['HEIGHT'])) ? $this->_rootref['HEIGHT'] : ''; ?>" /></td>
		<td><input type="checkbox" class="radio" name="add_display_on_posting" checked="checked" onclick="toggle_select('add', this.checked, 'add_order');"/></td>
 		<td><select id="order_add_order" name="add_order">
				<optgroup id="order_disp_add_order" label="<?php echo ((isset($this->_rootref['L_DISPLAY_POSTING'])) ? $this->_rootref['L_DISPLAY_POSTING'] : ((isset($user->lang['DISPLAY_POSTING'])) ? $user->lang['DISPLAY_POSTING'] : '{ DISPLAY_POSTING }')); ?>"><?php echo (isset($this->_rootref['S_ADD_ORDER_LIST_DISPLAY'])) ? $this->_rootref['S_ADD_ORDER_LIST_DISPLAY'] : ''; ?></optgroup>
				<optgroup id="order_no_disp_add_order" label="<?php echo ((isset($this->_rootref['L_DISPLAY_POSTING_NO'])) ? $this->_rootref['L_DISPLAY_POSTING_NO'] : ((isset($user->lang['DISPLAY_POSTING_NO'])) ? $user->lang['DISPLAY_POSTING_NO'] : '{ DISPLAY_POSTING_NO }')); ?>" disabled="disabled" class="disabled-options" ><?php echo (isset($this->_rootref['S_ADD_ORDER_LIST_UNDISPLAY'])) ? $this->_rootref['S_ADD_ORDER_LIST_UNDISPLAY'] : ''; ?></optgroup>
		</select></td>
		<td><input type="checkbox" class="radio" name="add_additional_code" value="1" /></td>
	</tr>
	<?php } } else { ?>

	<tr class="row3">
		<td colspan="<?php echo (isset($this->_rootref['COLSPAN'])) ? $this->_rootref['COLSPAN'] : ''; ?>"><?php echo ((isset($this->_rootref['L_NO_ICONS'])) ? $this->_rootref['L_NO_ICONS'] : ((isset($user->lang['NO_ICONS'])) ? $user->lang['NO_ICONS'] : '{ NO_ICONS }')); ?></td>
	</tr>
	<?php } ?>

	</tbody>
	</table>

	<p class="submit-buttons">
		<input class="button1" type="submit" id="submit" name="submit" value="<?php echo ((isset($this->_rootref['L_SUBMIT'])) ? $this->_rootref['L_SUBMIT'] : ((isset($user->lang['SUBMIT'])) ? $user->lang['SUBMIT'] : '{ SUBMIT }')); ?>" />&nbsp;
		<input class="button2" type="reset" id="reset" name="reset" value="<?php echo ((isset($this->_rootref['L_RESET'])) ? $this->_rootref['L_RESET'] : ((isset($user->lang['RESET'])) ? $user->lang['RESET'] : '{ RESET }')); ?>" />
	</p>
	<?php echo (isset($this->_rootref['S_FORM_TOKEN'])) ? $this->_rootref['S_FORM_TOKEN'] : ''; ?>

	</fieldset>
	</form>

<?php } else if ($this->_rootref['S_CHOOSE_PAK']) {  ?>


	<a href="<?php echo (isset($this->_rootref['U_BACK'])) ? $this->_rootref['U_BACK'] : ''; ?>" style="float: <?php echo (isset($this->_rootref['S_CONTENT_FLOW_END'])) ? $this->_rootref['S_CONTENT_FLOW_END'] : ''; ?>;">&laquo; <?php echo ((isset($this->_rootref['L_BACK'])) ? $this->_rootref['L_BACK'] : ((isset($user->lang['BACK'])) ? $user->lang['BACK'] : '{ BACK }')); ?></a>

	<h1><?php echo ((isset($this->_rootref['L_TITLE'])) ? $this->_rootref['L_TITLE'] : ((isset($user->lang['TITLE'])) ? $user->lang['TITLE'] : '{ TITLE }')); ?></h1>

	<p><?php echo ((isset($this->_rootref['L_EXPLAIN'])) ? $this->_rootref['L_EXPLAIN'] : ((isset($user->lang['EXPLAIN'])) ? $user->lang['EXPLAIN'] : '{ EXPLAIN }')); ?></p>

	<form id="acp_icons" method="post" action="<?php echo (isset($this->_rootref['U_ACTION'])) ? $this->_rootref['U_ACTION'] : ''; ?>">

	<fieldset>
		<legend><?php echo ((isset($this->_rootref['L_IMPORT'])) ? $this->_rootref['L_IMPORT'] : ((isset($user->lang['IMPORT'])) ? $user->lang['IMPORT'] : '{ IMPORT }')); ?></legend>
	
	<?php if (! $this->_rootref['S_PAK_OPTIONS']) {  ?>

		<p><?php echo ((isset($this->_rootref['L_NO_PAK_OPTIONS'])) ? $this->_rootref['L_NO_PAK_OPTIONS'] : ((isset($user->lang['NO_PAK_OPTIONS'])) ? $user->lang['NO_PAK_OPTIONS'] : '{ NO_PAK_OPTIONS }')); ?></p>

	<?php } else { ?>

		<dl>
			<dt><label for="pak"><?php echo ((isset($this->_rootref['L_SELECT_PACKAGE'])) ? $this->_rootref['L_SELECT_PACKAGE'] : ((isset($user->lang['SELECT_PACKAGE'])) ? $user->lang['SELECT_PACKAGE'] : '{ SELECT_PACKAGE }')); ?></label></dt>
			<dd><select id="pak" name="pak"><?php echo (isset($this->_rootref['S_PAK_OPTIONS'])) ? $this->_rootref['S_PAK_OPTIONS'] : ''; ?></select></dd>
		</dl>
			<dt><label for="current"><?php echo ((isset($this->_rootref['L_CURRENT'])) ? $this->_rootref['L_CURRENT'] : ((isset($user->lang['CURRENT'])) ? $user->lang['CURRENT'] : '{ CURRENT }')); ?></label><br /><span><?php echo ((isset($this->_rootref['L_CURRENT_EXPLAIN'])) ? $this->_rootref['L_CURRENT_EXPLAIN'] : ((isset($user->lang['CURRENT_EXPLAIN'])) ? $user->lang['CURRENT_EXPLAIN'] : '{ CURRENT_EXPLAIN }')); ?></span></dt>
			<dd><label><input type="radio" class="radio" id="current" name="current" value="keep" checked="checked" /> <?php echo ((isset($this->_rootref['L_KEEP_ALL'])) ? $this->_rootref['L_KEEP_ALL'] : ((isset($user->lang['KEEP_ALL'])) ? $user->lang['KEEP_ALL'] : '{ KEEP_ALL }')); ?></label>
				<label><input type="radio" class="radio" name="current" value="replace" /> <?php echo ((isset($this->_rootref['L_REPLACE_MATCHES'])) ? $this->_rootref['L_REPLACE_MATCHES'] : ((isset($user->lang['REPLACE_MATCHES'])) ? $user->lang['REPLACE_MATCHES'] : '{ REPLACE_MATCHES }')); ?></label>
				<label><input type="radio" class="radio" name="current" value="delete" /> <?php echo ((isset($this->_rootref['L_DELETE_ALL'])) ? $this->_rootref['L_DELETE_ALL'] : ((isset($user->lang['DELETE_ALL'])) ? $user->lang['DELETE_ALL'] : '{ DELETE_ALL }')); ?></label></dd>
		</dl>

	<p class="quick">
		<input class="button1" type="submit" id="import" name="import" value="<?php echo ((isset($this->_rootref['L_IMPORT_SUBMIT'])) ? $this->_rootref['L_IMPORT_SUBMIT'] : ((isset($user->lang['IMPORT_SUBMIT'])) ? $user->lang['IMPORT_SUBMIT'] : '{ IMPORT_SUBMIT }')); ?>" />
	</p>
	<?php } ?>

	<?php echo (isset($this->_rootref['S_FORM_TOKEN'])) ? $this->_rootref['S_FORM_TOKEN'] : ''; ?>

	</fieldset>
	</form>

<?php } else { ?>


	<h1><?php echo ((isset($this->_rootref['L_TITLE'])) ? $this->_rootref['L_TITLE'] : ((isset($user->lang['TITLE'])) ? $user->lang['TITLE'] : '{ TITLE }')); ?></h1>

	<p><?php echo ((isset($this->_rootref['L_EXPLAIN'])) ? $this->_rootref['L_EXPLAIN'] : ((isset($user->lang['EXPLAIN'])) ? $user->lang['EXPLAIN'] : '{ EXPLAIN }')); ?></p>

	<?php if ($this->_rootref['NOTICE']) {  ?>

		<div class="successbox">
			<h3><?php echo ((isset($this->_rootref['L_NOTIFY'])) ? $this->_rootref['L_NOTIFY'] : ((isset($user->lang['NOTIFY'])) ? $user->lang['NOTIFY'] : '{ NOTIFY }')); ?></h3>
			<p><?php echo (isset($this->_rootref['NOTICE'])) ? $this->_rootref['NOTICE'] : ''; ?></p>
		</div>
	<?php } ?>


	<form id="acp_icons" method="post" action="<?php echo (isset($this->_rootref['U_ACTION'])) ? $this->_rootref['U_ACTION'] : ''; ?>">

	<div style="text-align: right;"><a href="<?php echo (isset($this->_rootref['U_IMPORT'])) ? $this->_rootref['U_IMPORT'] : ''; ?>"><?php echo ((isset($this->_rootref['L_IMPORT'])) ? $this->_rootref['L_IMPORT'] : ((isset($user->lang['IMPORT'])) ? $user->lang['IMPORT'] : '{ IMPORT }')); ?></a> | <a href="<?php echo (isset($this->_rootref['U_EXPORT'])) ? $this->_rootref['U_EXPORT'] : ''; ?>"><?php echo ((isset($this->_rootref['L_EXPORT'])) ? $this->_rootref['L_EXPORT'] : ((isset($user->lang['EXPORT'])) ? $user->lang['EXPORT'] : '{ EXPORT }')); ?></a></div>

	<fieldset class="tabulated">

	<legend><?php echo ((isset($this->_rootref['L_TITLE'])) ? $this->_rootref['L_TITLE'] : ((isset($user->lang['TITLE'])) ? $user->lang['TITLE'] : '{ TITLE }')); ?></legend>

	<table cellspacing="1">
	<thead>
	<tr>
		<th><?php echo ((isset($this->_rootref['L_TITLE'])) ? $this->_rootref['L_TITLE'] : ((isset($user->lang['TITLE'])) ? $user->lang['TITLE'] : '{ TITLE }')); ?></th>
		<?php if ($this->_rootref['S_SMILIES']) {  ?>

		<th><?php echo ((isset($this->_rootref['L_CODE'])) ? $this->_rootref['L_CODE'] : ((isset($user->lang['CODE'])) ? $user->lang['CODE'] : '{ CODE }')); ?></th>
		<th><?php echo ((isset($this->_rootref['L_EMOTION'])) ? $this->_rootref['L_EMOTION'] : ((isset($user->lang['EMOTION'])) ? $user->lang['EMOTION'] : '{ EMOTION }')); ?></th>
		<?php } ?>

		<th><?php echo ((isset($this->_rootref['L_OPTIONS'])) ? $this->_rootref['L_OPTIONS'] : ((isset($user->lang['OPTIONS'])) ? $user->lang['OPTIONS'] : '{ OPTIONS }')); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php $_items_count = (isset($this->_tpldata['items'])) ? sizeof($this->_tpldata['items']) : 0;if ($_items_count) {for ($_items_i = 0; $_items_i < $_items_count; ++$_items_i){$_items_val = &$this->_tpldata['items'][$_items_i]; if ($_items_val['S_SPACER']) {  ?>

			<tr>
				<td class="row3" colspan="<?php echo (isset($this->_rootref['COLSPAN'])) ? $this->_rootref['COLSPAN'] : ''; ?>" style="text-align: center;"><?php echo ((isset($this->_rootref['L_NOT_DISPLAYED'])) ? $this->_rootref['L_NOT_DISPLAYED'] : ((isset($user->lang['NOT_DISPLAYED'])) ? $user->lang['NOT_DISPLAYED'] : '{ NOT_DISPLAYED }')); ?></td>
			</tr>
		<?php } if (!($_items_val['S_ROW_COUNT'] & 1)  ) {  ?><tr class="row1"><?php } else { ?><tr class="row2"><?php } ?>

			<td style="width: 85%; text-align: center;"><img src="<?php echo $_items_val['IMG_SRC']; ?>" width="<?php echo $_items_val['WIDTH']; ?>" height="<?php echo $_items_val['HEIGHT']; ?>" alt="<?php echo $_items_val['ALT_TEXT']; ?>" title="<?php echo $_items_val['ALT_TEXT']; ?>" /></td>
			<?php if ($this->_rootref['S_SMILIES']) {  ?>

				<td style="text-align: center;"><?php echo $_items_val['CODE']; ?></td>
				<td style="text-align: center;"><?php echo $_items_val['EMOTION']; ?></td>
			<?php } ?>

			<td style="text-align: right; white-space: nowrap;">
				<?php if ($_items_val['S_FIRST_ROW'] && ! $this->_rootref['PREVIOUS_PAGE']) {  echo (isset($this->_rootref['ICON_MOVE_UP_DISABLED'])) ? $this->_rootref['ICON_MOVE_UP_DISABLED'] : ''; } else { ?><a href="<?php echo $_items_val['U_MOVE_UP']; ?>"><?php echo (isset($this->_rootref['ICON_MOVE_UP'])) ? $this->_rootref['ICON_MOVE_UP'] : ''; ?></a><?php } ?>&nbsp;
				<?php if ($_items_val['S_LAST_ROW'] && ! $this->_rootref['NEXT_PAGE']) {  echo (isset($this->_rootref['ICON_MOVE_DOWN_DISABLED'])) ? $this->_rootref['ICON_MOVE_DOWN_DISABLED'] : ''; } else { ?><a href="<?php echo $_items_val['U_MOVE_DOWN']; ?>"><?php echo (isset($this->_rootref['ICON_MOVE_DOWN'])) ? $this->_rootref['ICON_MOVE_DOWN'] : ''; ?></a><?php } ?>

				&nbsp;<a href="<?php echo $_items_val['U_EDIT']; ?>"><?php echo (isset($this->_rootref['ICON_EDIT'])) ? $this->_rootref['ICON_EDIT'] : ''; ?></a> <a href="<?php echo $_items_val['U_DELETE']; ?>"><?php echo (isset($this->_rootref['ICON_DELETE'])) ? $this->_rootref['ICON_DELETE'] : ''; ?></a>
			</td>
		</tr>
	<?php }} else { ?>

		<tr class="row3">
			<td colspan="<?php echo (isset($this->_rootref['COLSPAN'])) ? $this->_rootref['COLSPAN'] : ''; ?>"><?php echo ((isset($this->_rootref['L_ACP_NO_ITEMS'])) ? $this->_rootref['L_ACP_NO_ITEMS'] : ((isset($user->lang['ACP_NO_ITEMS'])) ? $user->lang['ACP_NO_ITEMS'] : '{ ACP_NO_ITEMS }')); ?></td>
		</tr>
	<?php } ?>

	</tbody>
	</table>
	<div><?php echo (isset($this->_rootref['PAGINATION'])) ? $this->_rootref['PAGINATION'] : ''; ?></div>
	<p class="quick">
		<input class="button2" name="add" type="submit" value="<?php echo ((isset($this->_rootref['L_ICON_ADD'])) ? $this->_rootref['L_ICON_ADD'] : ((isset($user->lang['ICON_ADD'])) ? $user->lang['ICON_ADD'] : '{ ICON_ADD }')); ?>" />&nbsp; &nbsp;<input class="button2" type="submit" name="edit" value="<?php echo ((isset($this->_rootref['L_ICON_EDIT'])) ? $this->_rootref['L_ICON_EDIT'] : ((isset($user->lang['ICON_EDIT'])) ? $user->lang['ICON_EDIT'] : '{ ICON_EDIT }')); ?>" />
	</p>
	<?php echo (isset($this->_rootref['S_FORM_TOKEN'])) ? $this->_rootref['S_FORM_TOKEN'] : ''; ?>

	</fieldset>
	</form>

<?php } $this->_tpl_include('overall_footer.html'); ?>