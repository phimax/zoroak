<?php if (!defined('IN_PHPBB')) exit; if ((false)) {  ?>

This file contains main menu.

Edit it as text file, not as HTML because WYSIWYG editors (such as Dreamweaver) tend to mess up phpBB template syntax.

After changing this file and uploading it on server, open your forum in browser, go to admin control panel and click "purge cache" button on control panel index.
<?php } if ($this->_rootref['U_RESTORE_PERMISSIONS']) {  ?>

<ul class="menu">
	<li class="menu-item menu-login active"><a href="<?php echo (isset($this->_rootref['U_RESTORE_PERMISSIONS'])) ? $this->_rootref['U_RESTORE_PERMISSIONS'] : ''; ?>"><?php echo ((isset($this->_rootref['L_RESTORE_PERMISSIONS'])) ? $this->_rootref['L_RESTORE_PERMISSIONS'] : ((isset($user->lang['RESTORE_PERMISSIONS'])) ? $user->lang['RESTORE_PERMISSIONS'] : '{ RESTORE_PERMISSIONS }')); ?></a></li>
</ul>
<?php } ?>


<ul class="menu">
	<li class="menu-item menu-home<?php if ($this->_rootref['SCRIPT_NAME'] == ('index') && ! sizeof($this->_tpldata['navlinks'])) {  ?> active<?php } ?>"><a href="<?php echo (isset($this->_rootref['U_INDEX'])) ? $this->_rootref['U_INDEX'] : ''; ?>"><?php echo ((isset($this->_rootref['L_INDEX'])) ? $this->_rootref['L_INDEX'] : ((isset($user->lang['INDEX'])) ? $user->lang['INDEX'] : '{ INDEX }')); ?></a></li>
	<?php $_navlinks_count = (isset($this->_tpldata['navlinks'])) ? sizeof($this->_tpldata['navlinks']) : 0;if ($_navlinks_count) {for ($_navlinks_i = 0; $_navlinks_i < $_navlinks_count; ++$_navlinks_i){$_navlinks_val = &$this->_tpldata['navlinks'][$_navlinks_i]; ?>

		<li class="menu-item menu-forum<?php if ($_navlinks_val['S_LAST_ROW']) {  ?> active<?php } ?>"><a href="<?php echo $_navlinks_val['U_VIEW_FORUM']; ?>"><?php echo $_navlinks_val['FORUM_NAME']; ?></a></li>
	<?php }} ?>

</ul>

<ul class="menu">
	<?php if (! $this->_rootref['S_IS_BOT'] && $this->_rootref['S_USER_LOGGED_IN']) {  if ($this->_rootref['S_DISPLAY_PM']) {  ?>

			<li class="menu-item menu-pm<?php if ($this->_rootref['SCRIPT_NAME'] == ('ucp') && $this->_tpldata['DEFINE']['.']['UCP_PM']) {  ?> active<?php } ?>"><a href="<?php echo (isset($this->_rootref['U_PRIVATEMSGS'])) ? $this->_rootref['U_PRIVATEMSGS'] : ''; ?>"><?php echo (isset($this->_rootref['PRIVATE_MESSAGE_INFO'])) ? $this->_rootref['PRIVATE_MESSAGE_INFO'] : ''; ?></a></li>
		<?php } ?>

		<li class="menu-item menu-ucp<?php if ($this->_rootref['SCRIPT_NAME'] == ('ucp') && ! $this->_tpldata['DEFINE']['.']['UCP_PM']) {  ?> active<?php } ?>"><a href="<?php echo (isset($this->_rootref['U_PROFILE'])) ? $this->_rootref['U_PROFILE'] : ''; ?>"><?php echo ((isset($this->_rootref['L_PROFILE'])) ? $this->_rootref['L_PROFILE'] : ((isset($user->lang['PROFILE'])) ? $user->lang['PROFILE'] : '{ PROFILE }')); ?></a></li>
	<?php } if (! $this->_rootref['S_IS_BOT'] && $this->_rootref['S_DISPLAY_MEMBERLIST']) {  ?>

		<li class="menu-item menu-users<?php if ($this->_rootref['SCRIPT_NAME'] == ('memberlist')) {  ?> active<?php } ?>"><a href="<?php echo (isset($this->_rootref['U_MEMBERLIST'])) ? $this->_rootref['U_MEMBERLIST'] : ''; ?>"><?php echo ((isset($this->_rootref['L_MEMBERLIST'])) ? $this->_rootref['L_MEMBERLIST'] : ((isset($user->lang['MEMBERLIST'])) ? $user->lang['MEMBERLIST'] : '{ MEMBERLIST }')); ?></a></li>
	<?php } ?>

	<li class="menu-item menu-faq<?php if ($this->_rootref['SCRIPT_NAME'] == ('faq')) {  ?> active<?php } ?>"><a href="<?php echo (isset($this->_rootref['U_FAQ'])) ? $this->_rootref['U_FAQ'] : ''; ?>"><?php echo ((isset($this->_rootref['L_FAQ'])) ? $this->_rootref['L_FAQ'] : ((isset($user->lang['FAQ'])) ? $user->lang['FAQ'] : '{ FAQ }')); ?></a></li>
	<?php if ($this->_rootref['S_USER_LOGGED_IN']) {  ?>

		<li class="menu-item menu-login<?php if ($this->_rootref['SCRIPT_NAME'] == ('ucp') && ! $this->_rootref['S_USER_LOGGED_IN']) {  ?> active<?php } ?>"><a href="<?php echo (isset($this->_rootref['U_LOGIN_LOGOUT'])) ? $this->_rootref['U_LOGIN_LOGOUT'] : ''; ?>"><?php echo ((isset($this->_rootref['L_LOGIN_LOGOUT'])) ? $this->_rootref['L_LOGIN_LOGOUT'] : ((isset($user->lang['LOGIN_LOGOUT'])) ? $user->lang['LOGIN_LOGOUT'] : '{ LOGIN_LOGOUT }')); ?></a></li>
	<?php } ?>

</ul>

<?php if (! $this->_rootref['S_USER_LOGGED_IN'] && ! $this->_tpldata['DEFINE']['.']['STYLE_HEADER_LOGIN']) {  ?>

<ul class="menu">
	<li class="menu-item menu-section<?php if ($this->_rootref['SCRIPT_NAME'] == ('ucp')) {  ?> active<?php } ?>"><p><?php echo ((isset($this->_rootref['L_LOGIN_LOGOUT'])) ? $this->_rootref['L_LOGIN_LOGOUT'] : ((isset($user->lang['LOGIN_LOGOUT'])) ? $user->lang['LOGIN_LOGOUT'] : '{ LOGIN_LOGOUT }')); ?></p></li>
	<?php if ($this->_rootref['S_LOGIN_ACTION']) {  ?>

	<li class="menu-form">
		<form action="<?php echo (isset($this->_rootref['S_LOGIN_ACTION'])) ? $this->_rootref['S_LOGIN_ACTION'] : ''; ?>" method="post" id="phpbb-menu-login">
		<fieldset>
			<input class="inputbox login" type="text" name="username" value="" title="<?php echo ((isset($this->_rootref['L_USERNAME'])) ? $this->_rootref['L_USERNAME'] : ((isset($user->lang['USERNAME'])) ? $user->lang['USERNAME'] : '{ USERNAME }')); ?>" required><br />
			<input class="inputbox password" type="password" name="password" value="" title="<?php echo ((isset($this->_rootref['L_PASSWORD'])) ? $this->_rootref['L_PASSWORD'] : ((isset($user->lang['PASSWORD'])) ? $user->lang['PASSWORD'] : '{ PASSWORD }')); ?>" required><br />
			<?php if ($this->_rootref['S_AUTOLOGIN_ENABLED']) {  ?><p class="autologin"><label><input type="checkbox" name="autologin"> <?php echo ((isset($this->_rootref['L_LOG_ME_IN'])) ? $this->_rootref['L_LOG_ME_IN'] : ((isset($user->lang['LOG_ME_IN'])) ? $user->lang['LOG_ME_IN'] : '{ LOG_ME_IN }')); ?></label></p><?php } ?>

			<div class="buttons">
				<input type="hidden" name="login" value="<?php echo ((isset($this->_rootref['L_LOGIN'])) ? $this->_rootref['L_LOGIN'] : ((isset($user->lang['LOGIN'])) ? $user->lang['LOGIN'] : '{ LOGIN }')); ?>" />
				<a class="icon-login" href="javascript:void(0);" onclick="$('#phpbb-menu-login').get(0).submit(); return false;"><span></span><?php echo ((isset($this->_rootref['L_LOGIN'])) ? $this->_rootref['L_LOGIN'] : ((isset($user->lang['LOGIN'])) ? $user->lang['LOGIN'] : '{ LOGIN }')); ?></a>
				<?php if ($this->_rootref['S_REGISTER_ENABLED']) {  ?> <a class="icon-register" href="<?php echo (isset($this->_rootref['U_REGISTER'])) ? $this->_rootref['U_REGISTER'] : ''; ?>"><span></span><?php echo ((isset($this->_rootref['L_REGISTER'])) ? $this->_rootref['L_REGISTER'] : ((isset($user->lang['REGISTER'])) ? $user->lang['REGISTER'] : '{ REGISTER }')); ?></a><?php } ?>

			</div>
		</fieldset>
		</form>
	</li>
	<?php } ?>

</ul>
<?php } if ($this->_rootref['S_DISPLAY_SEARCH'] && ! $this->_rootref['S_IS_BOT']) {  ?>

<ul class="menu menu-nopadding">
	<li class="menu-item menu-section expandable<?php if ($this->_rootref['S_USER_LOGGED_IN']) {  ?> collapsed<?php } if ($this->_rootref['SCRIPT_NAME'] == ('search')) {  ?> active<?php } ?>"><a><?php echo ((isset($this->_rootref['L_SEARCH'])) ? $this->_rootref['L_SEARCH'] : ((isset($user->lang['SEARCH'])) ? $user->lang['SEARCH'] : '{ SEARCH }')); ?></a></li>
</ul>
<ul class="menu"<?php if ($this->_rootref['S_USER_LOGGED_IN']) {  ?> style="display: none;"<?php } ?>>
	<li class="menu-form">
		<form action="<?php echo (isset($this->_rootref['U_SEARCH'])) ? $this->_rootref['U_SEARCH'] : ''; ?>" method="post">
		<fieldset>
			<input class="button-icon search" type="submit" value="<?php echo ((isset($this->_rootref['L_SEARCH'])) ? $this->_rootref['L_SEARCH'] : ((isset($user->lang['SEARCH'])) ? $user->lang['SEARCH'] : '{ SEARCH }')); ?>" title="<?php echo ((isset($this->_rootref['L_SEARCH'])) ? $this->_rootref['L_SEARCH'] : ((isset($user->lang['SEARCH'])) ? $user->lang['SEARCH'] : '{ SEARCH }')); ?>">
			<input class="inputbox search" type="text" name="keywords" maxlength="128" value="<?php echo (isset($this->_rootref['SEARCH_WORDS'])) ? $this->_rootref['SEARCH_WORDS'] : ''; ?>" required>
		</fieldset>
		<?php echo (isset($this->_rootref['S_SEARCH_HIDDEN_FIELDS'])) ? $this->_rootref['S_SEARCH_HIDDEN_FIELDS'] : ''; ?>

		</form>
	</li>
	<li class="menu-item"><a href="<?php echo (isset($this->_rootref['U_SEARCH'])) ? $this->_rootref['U_SEARCH'] : ''; ?>"><?php echo ((isset($this->_rootref['L_SEARCH_ADV'])) ? $this->_rootref['L_SEARCH_ADV'] : ((isset($user->lang['SEARCH_ADV'])) ? $user->lang['SEARCH_ADV'] : '{ SEARCH_ADV }')); ?></a></li>
	<?php if ($this->_rootref['U_SEARCH_UNANSWERED']) {  ?><li class="menu-item"><a href="<?php echo (isset($this->_rootref['U_SEARCH_UNANSWERED'])) ? $this->_rootref['U_SEARCH_UNANSWERED'] : ''; ?>"><?php echo ((isset($this->_rootref['L_SEARCH_UNANSWERED'])) ? $this->_rootref['L_SEARCH_UNANSWERED'] : ((isset($user->lang['SEARCH_UNANSWERED'])) ? $user->lang['SEARCH_UNANSWERED'] : '{ SEARCH_UNANSWERED }')); ?></a></li><?php } if ($this->_rootref['S_LOAD_UNREADS']) {  ?><li class="menu-item"><a href="<?php echo (isset($this->_rootref['U_SEARCH_UNREAD'])) ? $this->_rootref['U_SEARCH_UNREAD'] : ''; ?>"><?php echo ((isset($this->_rootref['L_SEARCH_UNREAD'])) ? $this->_rootref['L_SEARCH_UNREAD'] : ((isset($user->lang['SEARCH_UNREAD'])) ? $user->lang['SEARCH_UNREAD'] : '{ SEARCH_UNREAD }')); ?></a></li><?php } if ($this->_rootref['U_SEARCH_NEW'] && $this->_rootref['S_USER_LOGGED_IN'] && ! $this->_rootref['S_IS_BOT']) {  ?><li class="menu-item"><a href="<?php echo (isset($this->_rootref['U_SEARCH_NEW'])) ? $this->_rootref['U_SEARCH_NEW'] : ''; ?>"><?php echo ((isset($this->_rootref['L_SEARCH_NEW'])) ? $this->_rootref['L_SEARCH_NEW'] : ((isset($user->lang['SEARCH_NEW'])) ? $user->lang['SEARCH_NEW'] : '{ SEARCH_NEW }')); ?></a></li><?php } if ($this->_rootref['U_SEARCH_ACTIVE_TOPICS']) {  ?><li class="menu-item"><a href="<?php echo (isset($this->_rootref['U_SEARCH_ACTIVE_TOPICS'])) ? $this->_rootref['U_SEARCH_ACTIVE_TOPICS'] : ''; ?>"><?php echo ((isset($this->_rootref['L_SEARCH_ACTIVE_TOPICS'])) ? $this->_rootref['L_SEARCH_ACTIVE_TOPICS'] : ((isset($user->lang['SEARCH_ACTIVE_TOPICS'])) ? $user->lang['SEARCH_ACTIVE_TOPICS'] : '{ SEARCH_ACTIVE_TOPICS }')); ?></a></li><?php } if ($this->_rootref['S_USER_LOGGED_IN']) {  ?><li class="menu-item"><a href="<?php echo (isset($this->_rootref['U_SEARCH_SELF'])) ? $this->_rootref['U_SEARCH_SELF'] : ''; ?>"><?php echo ((isset($this->_rootref['L_SEARCH_SELF'])) ? $this->_rootref['L_SEARCH_SELF'] : ((isset($user->lang['SEARCH_SELF'])) ? $user->lang['SEARCH_SELF'] : '{ SEARCH_SELF }')); ?></a></li><?php } ?>

</ul>
<?php } ?>