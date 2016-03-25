<?php if (!defined('IN_PHPBB')) exit; ?><!DOCTYPE html>
<!--[if lt IE 8]><html dir="<?php echo (isset($this->_rootref['S_CONTENT_DIRECTION'])) ? $this->_rootref['S_CONTENT_DIRECTION'] : ''; ?>" lang="<?php echo (isset($this->_rootref['S_USER_LANG'])) ? $this->_rootref['S_USER_LANG'] : ''; ?>" class="ie oldie ie7"><![endif]-->
<!--[if IE 8]><html dir="<?php echo (isset($this->_rootref['S_CONTENT_DIRECTION'])) ? $this->_rootref['S_CONTENT_DIRECTION'] : ''; ?>" lang="<?php echo (isset($this->_rootref['S_USER_LANG'])) ? $this->_rootref['S_USER_LANG'] : ''; ?>" class="ie oldie"><![endif]-->
<!--[if gt IE 8]><html dir="<?php echo (isset($this->_rootref['S_CONTENT_DIRECTION'])) ? $this->_rootref['S_CONTENT_DIRECTION'] : ''; ?>" lang="<?php echo (isset($this->_rootref['S_USER_LANG'])) ? $this->_rootref['S_USER_LANG'] : ''; ?>" class="ie"><![endif]-->
<!--[if !(IE)]><!--><html dir="<?php echo (isset($this->_rootref['S_CONTENT_DIRECTION'])) ? $this->_rootref['S_CONTENT_DIRECTION'] : ''; ?>" lang="<?php echo (isset($this->_rootref['S_USER_LANG'])) ? $this->_rootref['S_USER_LANG'] : ''; ?>"><!--<![endif]-->
<head>
	<meta charset="<?php echo (isset($this->_rootref['S_CONTENT_ENCODING'])) ? $this->_rootref['S_CONTENT_ENCODING'] : ''; ?>">
	<?php echo (isset($this->_rootref['META'])) ? $this->_rootref['META'] : ''; ?>

	<title><?php echo (isset($this->_rootref['SITENAME'])) ? $this->_rootref['SITENAME'] : ''; ?> - <?php echo (isset($this->_rootref['PAGE_TITLE'])) ? $this->_rootref['PAGE_TITLE'] : ''; ?></title>
	<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400,700&amp;subset=latin,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese,cyrillic">
	<link rel="stylesheet" href="<?php echo (isset($this->_rootref['T_STYLESHEET_LINK'])) ? $this->_rootref['T_STYLESHEET_LINK'] : ''; ?>">
	<?php if ($this->_rootref['S_USER_LANG'] != ('en-gb') && $this->_rootref['S_USER_LANG'] != ('en-us')) {  ?>

		<link rel="stylesheet" href="<?php echo (isset($this->_rootref['T_THEME_PATH'])) ? $this->_rootref['T_THEME_PATH'] : ''; ?>/<?php echo (isset($this->_rootref['S_USER_LANG'])) ? $this->_rootref['S_USER_LANG'] : ''; ?>/translation.css">
	<?php } $this->_tpldata['DEFINE']['.']['SIMPLE'] = TRUE; $this->_tpl_include('config.html'); $this->_tpl_include('scripts_header.html'); ?>

</head>
<body class="phpbb simple">

<div id="simple-wrap">
	<a id="top" name="top" accesskey="t"></a>
	<div id="page-body">