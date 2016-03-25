<?php if (!defined('IN_PHPBB')) exit; ?><!DOCTYPE html>
<!--[if lt IE 8]><html dir="<?php echo (isset($this->_rootref['S_CONTENT_DIRECTION'])) ? $this->_rootref['S_CONTENT_DIRECTION'] : ''; ?>" lang="<?php echo (isset($this->_rootref['S_USER_LANG'])) ? $this->_rootref['S_USER_LANG'] : ''; ?>" class="ie oldie ie7"><![endif]-->
<!--[if IE 8]><html dir="<?php echo (isset($this->_rootref['S_CONTENT_DIRECTION'])) ? $this->_rootref['S_CONTENT_DIRECTION'] : ''; ?>" lang="<?php echo (isset($this->_rootref['S_USER_LANG'])) ? $this->_rootref['S_USER_LANG'] : ''; ?>" class="ie oldie"><![endif]-->
<!--[if gt IE 8]><html dir="<?php echo (isset($this->_rootref['S_CONTENT_DIRECTION'])) ? $this->_rootref['S_CONTENT_DIRECTION'] : ''; ?>" lang="<?php echo (isset($this->_rootref['S_USER_LANG'])) ? $this->_rootref['S_USER_LANG'] : ''; ?>" class="ie"><![endif]-->
<!--[if !(IE)]><!--><html dir="<?php echo (isset($this->_rootref['S_CONTENT_DIRECTION'])) ? $this->_rootref['S_CONTENT_DIRECTION'] : ''; ?>" lang="<?php echo (isset($this->_rootref['S_USER_LANG'])) ? $this->_rootref['S_USER_LANG'] : ''; ?>"><!--<![endif]-->
<head>
	<meta charset="<?php echo (isset($this->_rootref['S_CONTENT_ENCODING'])) ? $this->_rootref['S_CONTENT_ENCODING'] : ''; ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<?php echo (isset($this->_rootref['META'])) ? $this->_rootref['META'] : ''; ?>

	<?php if ($this->_rootref['S_ENABLE_FEEDS']) {  if ($this->_rootref['S_ENABLE_FEEDS_OVERALL']) {  ?><link rel="alternate" type="application/atom+xml" title="<?php echo ((isset($this->_rootref['L_FEED'])) ? $this->_rootref['L_FEED'] : ((isset($user->lang['FEED'])) ? $user->lang['FEED'] : '{ FEED }')); ?> - <?php echo (isset($this->_rootref['SITENAME'])) ? $this->_rootref['SITENAME'] : ''; ?>" href="<?php echo (isset($this->_rootref['U_FEED'])) ? $this->_rootref['U_FEED'] : ''; ?>" /><?php } if ($this->_rootref['S_ENABLE_FEEDS_NEWS']) {  ?><link rel="alternate" type="application/atom+xml" title="<?php echo ((isset($this->_rootref['L_FEED'])) ? $this->_rootref['L_FEED'] : ((isset($user->lang['FEED'])) ? $user->lang['FEED'] : '{ FEED }')); ?> - <?php echo ((isset($this->_rootref['L_FEED_NEWS'])) ? $this->_rootref['L_FEED_NEWS'] : ((isset($user->lang['FEED_NEWS'])) ? $user->lang['FEED_NEWS'] : '{ FEED_NEWS }')); ?>" href="<?php echo (isset($this->_rootref['U_FEED'])) ? $this->_rootref['U_FEED'] : ''; ?>?mode=news" /><?php } if ($this->_rootref['S_ENABLE_FEEDS_FORUMS']) {  ?><link rel="alternate" type="application/atom+xml" title="<?php echo ((isset($this->_rootref['L_FEED'])) ? $this->_rootref['L_FEED'] : ((isset($user->lang['FEED'])) ? $user->lang['FEED'] : '{ FEED }')); ?> - <?php echo ((isset($this->_rootref['L_ALL_FORUMS'])) ? $this->_rootref['L_ALL_FORUMS'] : ((isset($user->lang['ALL_FORUMS'])) ? $user->lang['ALL_FORUMS'] : '{ ALL_FORUMS }')); ?>" href="<?php echo (isset($this->_rootref['U_FEED'])) ? $this->_rootref['U_FEED'] : ''; ?>?mode=forums" /><?php } if ($this->_rootref['S_ENABLE_FEEDS_TOPICS']) {  ?><link rel="alternate" type="application/atom+xml" title="<?php echo ((isset($this->_rootref['L_FEED'])) ? $this->_rootref['L_FEED'] : ((isset($user->lang['FEED'])) ? $user->lang['FEED'] : '{ FEED }')); ?> - <?php echo ((isset($this->_rootref['L_FEED_TOPICS_NEW'])) ? $this->_rootref['L_FEED_TOPICS_NEW'] : ((isset($user->lang['FEED_TOPICS_NEW'])) ? $user->lang['FEED_TOPICS_NEW'] : '{ FEED_TOPICS_NEW }')); ?>" href="<?php echo (isset($this->_rootref['U_FEED'])) ? $this->_rootref['U_FEED'] : ''; ?>?mode=topics" /><?php } if ($this->_rootref['S_ENABLE_FEEDS_TOPICS_ACTIVE']) {  ?><link rel="alternate" type="application/atom+xml" title="<?php echo ((isset($this->_rootref['L_FEED'])) ? $this->_rootref['L_FEED'] : ((isset($user->lang['FEED'])) ? $user->lang['FEED'] : '{ FEED }')); ?> - <?php echo ((isset($this->_rootref['L_FEED_TOPICS_ACTIVE'])) ? $this->_rootref['L_FEED_TOPICS_ACTIVE'] : ((isset($user->lang['FEED_TOPICS_ACTIVE'])) ? $user->lang['FEED_TOPICS_ACTIVE'] : '{ FEED_TOPICS_ACTIVE }')); ?>" href="<?php echo (isset($this->_rootref['U_FEED'])) ? $this->_rootref['U_FEED'] : ''; ?>?mode=topics_active" /><?php } if ($this->_rootref['S_ENABLE_FEEDS_FORUM'] && $this->_rootref['S_FORUM_ID']) {  ?><link rel="alternate" type="application/atom+xml" title="<?php echo ((isset($this->_rootref['L_FEED'])) ? $this->_rootref['L_FEED'] : ((isset($user->lang['FEED'])) ? $user->lang['FEED'] : '{ FEED }')); ?> - <?php echo ((isset($this->_rootref['L_FORUM'])) ? $this->_rootref['L_FORUM'] : ((isset($user->lang['FORUM'])) ? $user->lang['FORUM'] : '{ FORUM }')); ?> - <?php echo (isset($this->_rootref['FORUM_NAME'])) ? $this->_rootref['FORUM_NAME'] : ''; ?>" href="<?php echo (isset($this->_rootref['U_FEED'])) ? $this->_rootref['U_FEED'] : ''; ?>?f=<?php echo (isset($this->_rootref['S_FORUM_ID'])) ? $this->_rootref['S_FORUM_ID'] : ''; ?>" /><?php } if ($this->_rootref['S_ENABLE_FEEDS_TOPIC'] && $this->_rootref['S_TOPIC_ID']) {  ?><link rel="alternate" type="application/atom+xml" title="<?php echo ((isset($this->_rootref['L_FEED'])) ? $this->_rootref['L_FEED'] : ((isset($user->lang['FEED'])) ? $user->lang['FEED'] : '{ FEED }')); ?> - <?php echo ((isset($this->_rootref['L_TOPIC'])) ? $this->_rootref['L_TOPIC'] : ((isset($user->lang['TOPIC'])) ? $user->lang['TOPIC'] : '{ TOPIC }')); ?> - <?php echo (isset($this->_rootref['TOPIC_TITLE'])) ? $this->_rootref['TOPIC_TITLE'] : ''; ?>" href="<?php echo (isset($this->_rootref['U_FEED'])) ? $this->_rootref['U_FEED'] : ''; ?>?f=<?php echo (isset($this->_rootref['S_FORUM_ID'])) ? $this->_rootref['S_FORUM_ID'] : ''; ?>&amp;t=<?php echo (isset($this->_rootref['S_TOPIC_ID'])) ? $this->_rootref['S_TOPIC_ID'] : ''; ?>" /><?php } } ?>

	<title><?php echo (isset($this->_rootref['SITENAME'])) ? $this->_rootref['SITENAME'] : ''; ?> - <?php echo (isset($this->_rootref['PAGE_TITLE'])) ? $this->_rootref['PAGE_TITLE'] : ''; ?></title>
<!--
   phpBB style name:    Artodia Helion
   Based on style:      prosilver (this is the default phpBB3 style)
   Prosilver author:    Tom Beddard ( http://www.subBlue.com/ )
   Helion author:		Vjacheslav Trushkin ( http://www.artodia.com/ )
-->
	<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400,700&amp;subset=latin,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese,cyrillic">
	<link rel="stylesheet" href="<?php echo (isset($this->_rootref['T_STYLESHEET_LINK'])) ? $this->_rootref['T_STYLESHEET_LINK'] : ''; ?>">
	<?php if ($this->_rootref['S_USER_LANG'] != ('en-gb') && $this->_rootref['S_USER_LANG'] != ('en-us')) {  ?>

		<link rel="stylesheet" href="<?php echo (isset($this->_rootref['T_THEME_PATH'])) ? $this->_rootref['T_THEME_PATH'] : ''; ?>/<?php echo (isset($this->_rootref['S_USER_LANG'])) ? $this->_rootref['S_USER_LANG'] : ''; ?>/translation.css">
	<?php } $this->_tpl_include('config.html'); $this->_tpl_include('scripts_header.html'); ?>

</head>
<body class="phpbb section-<?php echo (isset($this->_rootref['SCRIPT_NAME'])) ? $this->_rootref['SCRIPT_NAME'] : ''; ?>">
<div class="body-wrapper" id="wrap">

<?php if ($this->_tpldata['DEFINE']['.']['STYLE_HEADER_LOGIN'] && ! $this->_rootref['S_USER_LOGGED_IN']) {  ?>

<div class="header-login">
	<div class="popup-trigger">
		<a href="<?php echo (isset($this->_rootref['U_LOGIN_LOGOUT'])) ? $this->_rootref['U_LOGIN_LOGOUT'] : ''; ?>" class="header-menu menu-login"><span><?php echo ((isset($this->_rootref['L_LOGIN'])) ? $this->_rootref['L_LOGIN'] : ((isset($user->lang['LOGIN'])) ? $user->lang['LOGIN'] : '{ LOGIN }')); ?></span></a>
		<div class="popup">
			<?php if ($this->_rootref['S_LOGIN_ACTION']) {  ?>

				<form action="<?php echo (isset($this->_rootref['S_LOGIN_ACTION'])) ? $this->_rootref['S_LOGIN_ACTION'] : ''; ?>" method="post" id="phpbb-header-login">
				<fieldset>
				<dl>
					<dt><?php echo ((isset($this->_rootref['L_USERNAME'])) ? $this->_rootref['L_USERNAME'] : ((isset($user->lang['USERNAME'])) ? $user->lang['USERNAME'] : '{ USERNAME }')); ?>:</dt>
					<dd><input class="inputbox" type="text" name="username" value="" required></dd>
				</dl>
				<dl>
					<dt><?php echo ((isset($this->_rootref['L_PASSWORD'])) ? $this->_rootref['L_PASSWORD'] : ((isset($user->lang['PASSWORD'])) ? $user->lang['PASSWORD'] : '{ PASSWORD }')); ?>:</dt>
					<dd><input class="inputbox" type="password" name="password" value="" required></dd>
				</dl>
				<?php if ($this->_rootref['S_AUTOLOGIN_ENABLED']) {  ?><p class="nowrap right"><label><input type="checkbox" name="autologin"> <?php echo ((isset($this->_rootref['L_LOG_ME_IN'])) ? $this->_rootref['L_LOG_ME_IN'] : ((isset($user->lang['LOG_ME_IN'])) ? $user->lang['LOG_ME_IN'] : '{ LOG_ME_IN }')); ?></label></p><?php } ?>

				<p class="right buttons">
					<input type="hidden" name="login" value="1" />
					<a href="javascript:void(0);" onclick="$('#phpbb-header-login').get(0).submit(); return false;" class="icon-login"><span></span><?php echo ((isset($this->_rootref['L_LOGIN'])) ? $this->_rootref['L_LOGIN'] : ((isset($user->lang['LOGIN'])) ? $user->lang['LOGIN'] : '{ LOGIN }')); ?></a>
				</p>
				</fieldset>
				</form>
			<?php } else { ?>

				<p class="right">
					<a class="button1" href="<?php echo (isset($this->_rootref['U_LOGIN_LOGOUT'])) ? $this->_rootref['U_LOGIN_LOGOUT'] : ''; ?>"><?php echo ((isset($this->_rootref['L_LOGIN_LOGOUT'])) ? $this->_rootref['L_LOGIN_LOGOUT'] : ((isset($user->lang['LOGIN_LOGOUT'])) ? $user->lang['LOGIN_LOGOUT'] : '{ LOGIN_LOGOUT }')); ?></a>
				</p>
			<?php } ?>

		</div>
	</div>
	<?php if (! $this->_rootref['S_USER_LOGGED_IN'] && $this->_rootref['S_REGISTER_ENABLED'] && ! ( $this->_rootref['S_SHOW_COPPA'] || $this->_rootref['S_REGISTRATION'] )) {  ?>

		&bull;
		<a href="<?php echo (isset($this->_rootref['U_REGISTER'])) ? $this->_rootref['U_REGISTER'] : ''; ?>" class="header-menu menu-register"><span><?php echo ((isset($this->_rootref['L_REGISTER'])) ? $this->_rootref['L_REGISTER'] : ((isset($user->lang['REGISTER'])) ? $user->lang['REGISTER'] : '{ REGISTER }')); ?></span></a>
	<?php } ?>

</div>
<?php } $this->_tpl_include('_top.html'); ?>


<div class="layout-outer">
<div class="forum-wrapper">
<div class="layout-wrapper">

	<?php $this->_tpl_include('_sidebar_left.html'); ?>

	
	<div class="layout-middle page-content">

		<?php if ($this->_rootref['S_USER_LOGGED_IN']) {  ?>

		<p class="time first">
			<?php echo (isset($this->_rootref['LAST_VISIT_DATE'])) ? $this->_rootref['LAST_VISIT_DATE'] : ''; ?>

		</p>
		<p class="time">
			<?php echo (isset($this->_rootref['CURRENT_TIME'])) ? $this->_rootref['CURRENT_TIME'] : ''; ?>

		</p>
		<?php } if ($this->_rootref['S_BOARD_DISABLED'] && $this->_rootref['S_USER_LOGGED_IN'] && ( $this->_rootref['U_MCP'] || $this->_rootref['U_ACP'] )) {  ?>

		<div id="information" class="rules">
			<div class="inner"><span class="corners-top"><span></span></span>
				<strong><?php echo ((isset($this->_rootref['L_INFORMATION'])) ? $this->_rootref['L_INFORMATION'] : ((isset($user->lang['INFORMATION'])) ? $user->lang['INFORMATION'] : '{ INFORMATION }')); ?>:</strong> <?php echo ((isset($this->_rootref['L_BOARD_DISABLED'])) ? $this->_rootref['L_BOARD_DISABLED'] : ((isset($user->lang['BOARD_DISABLED'])) ? $user->lang['BOARD_DISABLED'] : '{ BOARD_DISABLED }')); ?>

			<span class="corners-bottom"><span></span></span></div>
		</div>
		<?php } else if ($this->_rootref['S_USER_LOGGED_IN'] && ( $this->_rootref['S_USER_NEW_PRIVMSG'] || $this->_rootref['S_USER_UNREAD_PRIVMSG'] )) {  ?>

		<div id="information" class="rules">
			<div class="inner"><span class="corners-top"><span></span></span>
				<?php if ($this->_rootref['S_USER_NEW_PRIVMSG']) {  ?>

					<a href="<?php echo (isset($this->_rootref['U_PRIVATEMSGS'])) ? $this->_rootref['U_PRIVATEMSGS'] : ''; ?>"><?php if ($this->_rootref['S_USER_NEW_PRIVMSG'] > (1)) {  echo ((isset($this->_rootref['L_YOU_NEW_PMS'])) ? $this->_rootref['L_YOU_NEW_PMS'] : ((isset($user->lang['YOU_NEW_PMS'])) ? $user->lang['YOU_NEW_PMS'] : '{ YOU_NEW_PMS }')); } else { echo ((isset($this->_rootref['L_YOU_NEW_PM'])) ? $this->_rootref['L_YOU_NEW_PM'] : ((isset($user->lang['YOU_NEW_PM'])) ? $user->lang['YOU_NEW_PM'] : '{ YOU_NEW_PM }')); } ?></a>
				<?php } else { ?>

					<a href="<?php echo (isset($this->_rootref['U_PRIVATEMSGS'])) ? $this->_rootref['U_PRIVATEMSGS'] : ''; ?>"><?php echo (isset($this->_rootref['PRIVATE_MESSAGE_INFO'])) ? $this->_rootref['PRIVATE_MESSAGE_INFO'] : ''; if ($this->_rootref['PRIVATE_MESSAGE_INFO_UNREAD']) {  ?>, <?php echo (isset($this->_rootref['PRIVATE_MESSAGE_INFO_UNREAD'])) ? $this->_rootref['PRIVATE_MESSAGE_INFO_UNREAD'] : ''; } ?></a>
				<?php } ?>

			<span class="corners-bottom"><span></span></span></div>
		</div>
		<?php } ?>