<?php if (!defined('IN_PHPBB')) exit; if ((false)) {  ?>

This file contains right sidebar. 
It is disabled by default, remove lines 11 (if false) and 41 (endif) to enable it.

Edit it as text file, not as HTML because WYSIWYG editors (such as Dreamweaver) tend to mess up phpBB template syntax.

After changing this file and uploading it on server, open your forum in browser, go to admin control panel and click "purge cache" button on control panel index.
<?php } if ((false)) {  ?>

<div class="layout-right">

	<ul class="menu">
		<li class="menu-section"><p>Links</p></li>
		<li class="menu-item"><a href="http://www.artodia.com/index.html">Artodia.com</a></li>
		<li class="menu-item"><a href="http://www.colorizeit.com/index.html">ColorizeIt</a></li>
	</ul>
	
	<ul class="menu menu-nopadding"><!-- menu-nopadding means there will not be extra spacing between this and next menu -->
		<li class="menu-item menu-section expandable"><a>Types of Links</a></li>
	</ul>
	<ul class="menu">
		<li class="menu-item"><a href="#">Normal Link</a></li>
		<li class="menu-item menu-home"><a href="#">Home</a></li>
		<li class="menu-item menu-forum"><a href="#">Forum</a></li>
		<li class="menu-item menu-pm"><a href="#">Private Message</a></li>
		<li class="menu-item menu-ucp"><a href="#">User Control Panel</a></li>
		<li class="menu-item menu-users"><a href="#">Users List</a></li>
		<li class="menu-item menu-login"><a href="#">Log In</a></li>
		<li class="menu-item menu-search"><a href="#">Search</a></li>
		<li class="menu-item menu-down"><a href="#">Down Arrow</a></li>
		<li class="menu-item menu-link"><a href="#">Link</a></li>
	</ul>
	
	<div style="width: 158px; height: 328px; padding-top: 270px; margin: 0 auto 8px; text-align: center; vertical-align: middle; border: 1px solid #ccc; background-color: #f8f8f8;">
		160x600 ad (AdSense: Wide Skysraper)
	</div>
	
</div>
<?php } ?>