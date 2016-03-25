<?php if (!defined('IN_PHPBB')) exit; $this->_tpl_include('ucp_header.html'); ?>


<h2><?php echo ((isset($this->_rootref['L_TITLE'])) ? $this->_rootref['L_TITLE'] : ((isset($user->lang['TITLE'])) ? $user->lang['TITLE'] : '{ TITLE }')); ?></h2>

<form id="ucp" method="post" action="<?php echo (isset($this->_rootref['S_UCP_ACTION'])) ? $this->_rootref['S_UCP_ACTION'] : ''; ?>">

<div class="panel">
	<div class="inner"><span class="corners-top"><span></span></span>

	<?php if ($this->_rootref['ERROR_MESSAGE']) {  ?><p class="error"><?php echo (isset($this->_rootref['ERROR_MESSAGE'])) ? $this->_rootref['ERROR_MESSAGE'] : ''; ?></p><?php } if ($this->_rootref['NOTIFICATION_MESSAGE']) {  ?><p class="error"><?php echo (isset($this->_rootref['NOTIFICATION_MESSAGE'])) ? $this->_rootref['NOTIFICATION_MESSAGE'] : ''; ?></p><?php } ?>

	
	<h3><?php echo ((isset($this->_rootref['L_DEFINED_RULES'])) ? $this->_rootref['L_DEFINED_RULES'] : ((isset($user->lang['DEFINED_RULES'])) ? $user->lang['DEFINED_RULES'] : '{ DEFINED_RULES }')); ?></h3>

	<ol class="def-rules">
	<?php $_rule_count = (isset($this->_tpldata['rule'])) ? sizeof($this->_tpldata['rule']) : 0;if ($_rule_count) {for ($_rule_i = 0; $_rule_i < $_rule_count; ++$_rule_i){$_rule_val = &$this->_tpldata['rule'][$_rule_i]; ?>

		<li><div class="right-box"><input type="submit" name="delete_rule[<?php echo $_rule_val['RULE_ID']; ?>]" value="<?php echo ((isset($this->_rootref['L_DELETE_RULE'])) ? $this->_rootref['L_DELETE_RULE'] : ((isset($user->lang['DELETE_RULE'])) ? $user->lang['DELETE_RULE'] : '{ DELETE_RULE }')); ?>" class="button2" /></div><strong><?php echo ((isset($this->_rootref['L_IF'])) ? $this->_rootref['L_IF'] : ((isset($user->lang['IF'])) ? $user->lang['IF'] : '{ IF }')); ?></strong> <?php echo $_rule_val['CHECK']; ?> <em><?php echo $_rule_val['RULE']; ?></em> <?php if ($_rule_val['STRING']) {  ?><strong><?php echo $_rule_val['STRING']; ?></strong> | <?php } echo $_rule_val['ACTION']; if ($_rule_val['FOLDER']) {  ?>: <?php echo $_rule_val['FOLDER']; } ?><div style="clear: both;"></div></li>
	<?php }} else { ?>

		<li><strong><?php echo ((isset($this->_rootref['L_NO_RULES_DEFINED'])) ? $this->_rootref['L_NO_RULES_DEFINED'] : ((isset($user->lang['NO_RULES_DEFINED'])) ? $user->lang['NO_RULES_DEFINED'] : '{ NO_RULES_DEFINED }')); ?></strong></li>
	<?php } ?>

	</ol>

	<h3><?php echo ((isset($this->_rootref['L_ADD_NEW_RULE'])) ? $this->_rootref['L_ADD_NEW_RULE'] : ((isset($user->lang['ADD_NEW_RULE'])) ? $user->lang['ADD_NEW_RULE'] : '{ ADD_NEW_RULE }')); ?></h3>

	<fieldset class="fields2">

	<?php if ($this->_rootref['S_CHECK_DEFINED']) {  ?>

		<dl>
			<dt><label<?php if ($this->_rootref['S_CHECK_SELECT']) {  ?> for="check_option"<?php } ?>><?php echo ((isset($this->_rootref['L_IF'])) ? $this->_rootref['L_IF'] : ((isset($user->lang['IF'])) ? $user->lang['IF'] : '{ IF }')); ?>:</label></dt>
			<dd>
				<?php if ($this->_rootref['S_CHECK_SELECT']) {  ?><select name="check_option" id="check_option"><?php echo (isset($this->_rootref['S_CHECK_OPTIONS'])) ? $this->_rootref['S_CHECK_OPTIONS'] : ''; ?></select> <input type="submit" name="next" value="<?php echo ((isset($this->_rootref['L_NEXT_STEP'])) ? $this->_rootref['L_NEXT_STEP'] : ((isset($user->lang['NEXT_STEP'])) ? $user->lang['NEXT_STEP'] : '{ NEXT_STEP }')); ?>" class="button2" /><?php } else { echo (isset($this->_rootref['CHECK_CURRENT'])) ? $this->_rootref['CHECK_CURRENT'] : ''; ?><input type="hidden" name="check_option" value="<?php echo (isset($this->_rootref['CHECK_OPTION'])) ? $this->_rootref['CHECK_OPTION'] : ''; ?>" /><?php } ?>

			</dd>
		</dl>
	<?php } if ($this->_rootref['S_RULE_DEFINED']) {  ?>

		<dl>
			<dt><?php if ($this->_rootref['S_RULE_SELECT']) {  ?><input type="submit" name="back[rule]" value="<?php echo ((isset($this->_rootref['L_PREVIOUS_STEP'])) ? $this->_rootref['L_PREVIOUS_STEP'] : ((isset($user->lang['PREVIOUS_STEP'])) ? $user->lang['PREVIOUS_STEP'] : '{ PREVIOUS_STEP }')); ?>" class="button2" /><?php } else { ?><label>&nbsp;</label><?php } ?></dt>
			<dd><?php if ($this->_rootref['S_RULE_SELECT']) {  ?><select name="rule_option" id="rule_option"><?php echo (isset($this->_rootref['S_RULE_OPTIONS'])) ? $this->_rootref['S_RULE_OPTIONS'] : ''; ?></select> <input type="submit" name="next" value="<?php echo ((isset($this->_rootref['L_NEXT_STEP'])) ? $this->_rootref['L_NEXT_STEP'] : ((isset($user->lang['NEXT_STEP'])) ? $user->lang['NEXT_STEP'] : '{ NEXT_STEP }')); ?>" class="button2" /><?php } else { ?><em><?php echo (isset($this->_rootref['RULE_CURRENT'])) ? $this->_rootref['RULE_CURRENT'] : ''; ?></em><input type="hidden" name="rule_option" value="<?php echo (isset($this->_rootref['RULE_OPTION'])) ? $this->_rootref['RULE_OPTION'] : ''; ?>" /><?php } ?></dd>
		</dl>
	<?php } if ($this->_rootref['S_COND_DEFINED']) {  if ($this->_rootref['S_COND_SELECT'] || $this->_rootref['COND_CURRENT']) {  ?>

			<dl>
				<dt><?php if ($this->_rootref['S_COND_SELECT']) {  ?><input type="submit" name="back[cond]" value="<?php echo ((isset($this->_rootref['L_PREVIOUS_STEP'])) ? $this->_rootref['L_PREVIOUS_STEP'] : ((isset($user->lang['PREVIOUS_STEP'])) ? $user->lang['PREVIOUS_STEP'] : '{ PREVIOUS_STEP }')); ?>" class="button2" /><?php } else { ?><label>&nbsp;</label><?php } ?></dt>
				<dd>
					<?php if ($this->_rootref['S_COND_SELECT']) {  if ($this->_rootref['S_TEXT_CONDITION']) {  ?>

							<input type="text" name="rule_string" value="<?php echo (isset($this->_rootref['CURRENT_STRING'])) ? $this->_rootref['CURRENT_STRING'] : ''; ?>" class="inputbox medium" maxlength="250" />
						<?php } else if ($this->_rootref['S_USER_CONDITION']) {  ?>

							<input type="text" name="rule_string" value="<?php echo (isset($this->_rootref['CURRENT_STRING'])) ? $this->_rootref['CURRENT_STRING'] : ''; ?>" class="inputbox tiny" />&nbsp;<span>[ <a href="<?php echo (isset($this->_rootref['U_FIND_USERNAME'])) ? $this->_rootref['U_FIND_USERNAME'] : ''; ?>" onclick="find_username(this.href); return false;"><?php echo ((isset($this->_rootref['L_FIND_USERNAME'])) ? $this->_rootref['L_FIND_USERNAME'] : ((isset($user->lang['FIND_USERNAME'])) ? $user->lang['FIND_USERNAME'] : '{ FIND_USERNAME }')); ?></a> ]</span>
						<?php } else if ($this->_rootref['S_GROUP_CONDITION']) {  ?>

							<input type="hidden" name="rule_string" value="<?php echo (isset($this->_rootref['CURRENT_STRING'])) ? $this->_rootref['CURRENT_STRING'] : ''; ?>" /><?php if ($this->_rootref['S_GROUP_OPTIONS']) {  ?><select name="rule_group_id"><?php echo (isset($this->_rootref['S_GROUP_OPTIONS'])) ? $this->_rootref['S_GROUP_OPTIONS'] : ''; ?></select><?php } else { echo ((isset($this->_rootref['L_NO_GROUPS'])) ? $this->_rootref['L_NO_GROUPS'] : ((isset($user->lang['NO_GROUPS'])) ? $user->lang['NO_GROUPS'] : '{ NO_GROUPS }')); } } ?>

						<input type="submit" name="next" value="<?php echo ((isset($this->_rootref['L_NEXT_STEP'])) ? $this->_rootref['L_NEXT_STEP'] : ((isset($user->lang['NEXT_STEP'])) ? $user->lang['NEXT_STEP'] : '{ NEXT_STEP }')); ?>" class="button2" />
					<?php } else { ?>

						<strong><?php echo (isset($this->_rootref['COND_CURRENT'])) ? $this->_rootref['COND_CURRENT'] : ''; ?></strong><input type="hidden" name="rule_string" value="<?php echo (isset($this->_rootref['CURRENT_STRING'])) ? $this->_rootref['CURRENT_STRING'] : ''; ?>" /><input type="hidden" name="rule_user_id" value="<?php echo (isset($this->_rootref['CURRENT_USER_ID'])) ? $this->_rootref['CURRENT_USER_ID'] : ''; ?>" /><input type="hidden" name="rule_group_id" value="<?php echo (isset($this->_rootref['CURRENT_GROUP_ID'])) ? $this->_rootref['CURRENT_GROUP_ID'] : ''; ?>" />
					<?php } ?>

				</dd>
			</dl>
		<?php } ?>

		<input type="hidden" name="cond_option" value="<?php echo (isset($this->_rootref['COND_OPTION'])) ? $this->_rootref['COND_OPTION'] : ''; ?>" />
	<?php } if ($this->_rootref['NONE_CONDITION']) {  ?><input type="hidden" name="cond_option" value="none" /><?php } if ($this->_rootref['S_ACTION_DEFINED']) {  ?>

		<dl>
			<dt><?php if ($this->_rootref['S_ACTION_SELECT']) {  ?><input type="submit" name="back[action]" value="<?php echo ((isset($this->_rootref['L_PREVIOUS_STEP'])) ? $this->_rootref['L_PREVIOUS_STEP'] : ((isset($user->lang['PREVIOUS_STEP'])) ? $user->lang['PREVIOUS_STEP'] : '{ PREVIOUS_STEP }')); ?>" class="button2" /><?php } else { ?><label>&nbsp;</label><?php } ?></dt>
			<dd><?php if ($this->_rootref['S_ACTION_SELECT']) {  ?> <select name="action_option"><?php echo (isset($this->_rootref['S_ACTION_OPTIONS'])) ? $this->_rootref['S_ACTION_OPTIONS'] : ''; ?></select> <input type="submit" name="add_rule" value="<?php echo ((isset($this->_rootref['L_ADD_RULE'])) ? $this->_rootref['L_ADD_RULE'] : ((isset($user->lang['ADD_RULE'])) ? $user->lang['ADD_RULE'] : '{ ADD_RULE }')); ?>" class="button1" /><?php } else { echo (isset($this->_rootref['ACTION_CURRENT'])) ? $this->_rootref['ACTION_CURRENT'] : ''; ?><input type="hidden" name="action_option" value="<?php echo (isset($this->_rootref['ACTION_OPTION'])) ? $this->_rootref['ACTION_OPTION'] : ''; ?>" /><?php } ?></dd>
		</dl>
	<?php } ?>


	</fieldset>

	<h3><?php echo ((isset($this->_rootref['L_FOLDER_OPTIONS'])) ? $this->_rootref['L_FOLDER_OPTIONS'] : ((isset($user->lang['FOLDER_OPTIONS'])) ? $user->lang['FOLDER_OPTIONS'] : '{ FOLDER_OPTIONS }')); ?></h3>

	<fieldset class="fields2">

	<?php if (! $this->_rootref['S_MAX_FOLDER_ZERO']) {  ?>

	<dl>
		<dt><label for="foldername"><?php echo ((isset($this->_rootref['L_ADD_FOLDER'])) ? $this->_rootref['L_ADD_FOLDER'] : ((isset($user->lang['ADD_FOLDER'])) ? $user->lang['ADD_FOLDER'] : '{ ADD_FOLDER }')); ?>:</label></dt>
		<dd><?php if ($this->_rootref['S_MAX_FOLDER_REACHED']) {  echo ((isset($this->_rootref['L_MAX_FOLDER_REACHED'])) ? $this->_rootref['L_MAX_FOLDER_REACHED'] : ((isset($user->lang['MAX_FOLDER_REACHED'])) ? $user->lang['MAX_FOLDER_REACHED'] : '{ MAX_FOLDER_REACHED }')); } else { ?><input type="text" class="inputbox medium" name="foldername" id="foldername" size="30" maxlength="30" /> <input class="button2" type="submit" name="addfolder" value="<?php echo ((isset($this->_rootref['L_ADD'])) ? $this->_rootref['L_ADD'] : ((isset($user->lang['ADD'])) ? $user->lang['ADD'] : '{ ADD }')); ?>" /><?php } ?></dd>
	</dl>
	<?php if ($this->_rootref['S_FOLDER_OPTIONS']) {  ?><hr class="dashed" /><?php } } if ($this->_rootref['S_FOLDER_OPTIONS']) {  ?>

		<dl>
			<dt><label for="rename_folder_id"><?php echo ((isset($this->_rootref['L_RENAME_FOLDER'])) ? $this->_rootref['L_RENAME_FOLDER'] : ((isset($user->lang['RENAME_FOLDER'])) ? $user->lang['RENAME_FOLDER'] : '{ RENAME_FOLDER }')); ?>:</label></dt>
			<dd><select name="rename_folder_id" id="rename_folder_id"><?php echo (isset($this->_rootref['S_FOLDER_OPTIONS'])) ? $this->_rootref['S_FOLDER_OPTIONS'] : ''; ?></select></dd>
			<dt><label for="new_folder_name"><?php echo ((isset($this->_rootref['L_NEW_FOLDER_NAME'])) ? $this->_rootref['L_NEW_FOLDER_NAME'] : ((isset($user->lang['NEW_FOLDER_NAME'])) ? $user->lang['NEW_FOLDER_NAME'] : '{ NEW_FOLDER_NAME }')); ?>:</label></dt>
			<dd><input type="text" class="inputbox tiny" name="new_folder_name" id="new_folder_name" maxlength="30" /> <input class="button2" type="submit" name="rename_folder" value="<?php echo ((isset($this->_rootref['L_RENAME'])) ? $this->_rootref['L_RENAME'] : ((isset($user->lang['RENAME'])) ? $user->lang['RENAME'] : '{ RENAME }')); ?>" /></dd>
		</dl>
		<hr class="dashed" />
		<dl>
			<dt><label for="remove_folder_id"><?php echo ((isset($this->_rootref['L_REMOVE_FOLDER'])) ? $this->_rootref['L_REMOVE_FOLDER'] : ((isset($user->lang['REMOVE_FOLDER'])) ? $user->lang['REMOVE_FOLDER'] : '{ REMOVE_FOLDER }')); ?>:</label></dt>
			<dd><select name="remove_folder_id" id="remove_folder_id"><?php echo (isset($this->_rootref['S_FOLDER_OPTIONS'])) ? $this->_rootref['S_FOLDER_OPTIONS'] : ''; ?></select></dd>
			<dd style="margin-top: 3px;"><label for="remove_action1"><input type="radio" name="remove_action" id="remove_action1" value="1" checked="checked" /> <?php echo ((isset($this->_rootref['L_MOVE_DELETED_MESSAGES_TO'])) ? $this->_rootref['L_MOVE_DELETED_MESSAGES_TO'] : ((isset($user->lang['MOVE_DELETED_MESSAGES_TO'])) ? $user->lang['MOVE_DELETED_MESSAGES_TO'] : '{ MOVE_DELETED_MESSAGES_TO }')); ?>:</label> <select name="move_to"><?php echo (isset($this->_rootref['S_TO_FOLDER_OPTIONS'])) ? $this->_rootref['S_TO_FOLDER_OPTIONS'] : ''; ?></select></dd>
			<dd style="margin-top: 3px;"><label for="remove_action2"><input type="radio" name="remove_action" id="remove_action2" value="2" /> <?php echo ((isset($this->_rootref['L_DELETE_MESSAGES_IN_FOLDER'])) ? $this->_rootref['L_DELETE_MESSAGES_IN_FOLDER'] : ((isset($user->lang['DELETE_MESSAGES_IN_FOLDER'])) ? $user->lang['DELETE_MESSAGES_IN_FOLDER'] : '{ DELETE_MESSAGES_IN_FOLDER }')); ?></label></dd>
			<dd style="margin-top: 3px;"><input class="button2" type="submit" name="remove_folder" value="<?php echo ((isset($this->_rootref['L_REMOVE'])) ? $this->_rootref['L_REMOVE'] : ((isset($user->lang['REMOVE'])) ? $user->lang['REMOVE'] : '{ REMOVE }')); ?>" /></dd>
		</dl>
	<?php } ?>


	<hr class="dashed" />

	<dl>
		<dt><label for="full_action1"><?php echo ((isset($this->_rootref['L_IF_FOLDER_FULL'])) ? $this->_rootref['L_IF_FOLDER_FULL'] : ((isset($user->lang['IF_FOLDER_FULL'])) ? $user->lang['IF_FOLDER_FULL'] : '{ IF_FOLDER_FULL }')); ?>:</label></dt>
		<dd style="margin-top: 3px;"><label for="full_action1"><input type="radio" name="full_action" id="full_action1" value="1"<?php echo (isset($this->_rootref['S_DELETE_CHECKED'])) ? $this->_rootref['S_DELETE_CHECKED'] : ''; ?> /> <?php echo ((isset($this->_rootref['L_DELETE_OLDEST_MESSAGES'])) ? $this->_rootref['L_DELETE_OLDEST_MESSAGES'] : ((isset($user->lang['DELETE_OLDEST_MESSAGES'])) ? $user->lang['DELETE_OLDEST_MESSAGES'] : '{ DELETE_OLDEST_MESSAGES }')); ?></label></dd>
		<dd style="margin-top: 3px;"><label for="full_action2"><input type="radio" name="full_action" id="full_action2" value="2"<?php echo (isset($this->_rootref['S_MOVE_CHECKED'])) ? $this->_rootref['S_MOVE_CHECKED'] : ''; ?> /> <?php echo ((isset($this->_rootref['L_MOVE_TO_FOLDER'])) ? $this->_rootref['L_MOVE_TO_FOLDER'] : ((isset($user->lang['MOVE_TO_FOLDER'])) ? $user->lang['MOVE_TO_FOLDER'] : '{ MOVE_TO_FOLDER }')); ?>:</label> <select name="full_move_to"><?php echo (isset($this->_rootref['S_FULL_FOLDER_OPTIONS'])) ? $this->_rootref['S_FULL_FOLDER_OPTIONS'] : ''; ?></select></dd>
		<dd style="margin-top: 3px;"><label for="full_action3" style="white-space:normal;"><input type="radio" name="full_action" id="full_action3" value="3"<?php echo (isset($this->_rootref['S_HOLD_CHECKED'])) ? $this->_rootref['S_HOLD_CHECKED'] : ''; ?> /> <?php echo ((isset($this->_rootref['L_HOLD_NEW_MESSAGES'])) ? $this->_rootref['L_HOLD_NEW_MESSAGES'] : ((isset($user->lang['HOLD_NEW_MESSAGES'])) ? $user->lang['HOLD_NEW_MESSAGES'] : '{ HOLD_NEW_MESSAGES }')); ?></label></dd>
	</dl>


	<dl>
		<dt><label><?php echo ((isset($this->_rootref['L_DEFAULT_ACTION'])) ? $this->_rootref['L_DEFAULT_ACTION'] : ((isset($user->lang['DEFAULT_ACTION'])) ? $user->lang['DEFAULT_ACTION'] : '{ DEFAULT_ACTION }')); ?>:</label><br /><span><?php echo ((isset($this->_rootref['L_DEFAULT_ACTION_EXPLAIN'])) ? $this->_rootref['L_DEFAULT_ACTION_EXPLAIN'] : ((isset($user->lang['DEFAULT_ACTION_EXPLAIN'])) ? $user->lang['DEFAULT_ACTION_EXPLAIN'] : '{ DEFAULT_ACTION_EXPLAIN }')); ?></span></dt>
		<dd><?php echo (isset($this->_rootref['DEFAULT_ACTION'])) ? $this->_rootref['DEFAULT_ACTION'] : ''; ?></dd>
		<dd><input class="button2" type="submit" name="fullfolder" value="<?php echo ((isset($this->_rootref['L_CHANGE'])) ? $this->_rootref['L_CHANGE'] : ((isset($user->lang['CHANGE'])) ? $user->lang['CHANGE'] : '{ CHANGE }')); ?>" /></dd>
	</dl>
	</fieldset>

	<span class="corners-bottom"><span></span></span></div>
	<?php echo (isset($this->_rootref['S_FORM_TOKEN'])) ? $this->_rootref['S_FORM_TOKEN'] : ''; ?>

</div>
</form>

<?php $this->_tpl_include('ucp_footer.html'); ?>