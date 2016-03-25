<?php if (!defined('IN_PHPBB')) exit; if ((false)) {  ?>

This file contains header.
Links block below header is disabled by default, remove lines 15 (if false) and 38 (endif) to enable it.

Edit it as text file, not as HTML because WYSIWYG editors (such as Dreamweaver) tend to mess up phpBB template syntax.

After changing this file and uploading it on server, open your forum in browser, go to admin control panel and click "purge cache" button on control panel index.
<?php } ?>


<div class="logo">
	<a href="<?php echo (isset($this->_rootref['U_INDEX'])) ? $this->_rootref['U_INDEX'] : ''; ?>"><?php echo (isset($this->_rootref['SITE_LOGO_IMG'])) ? $this->_rootref['SITE_LOGO_IMG'] : ''; ?></a>
	<h1><?php echo (isset($this->_rootref['PAGE_TITLE'])) ? $this->_rootref['PAGE_TITLE'] : ''; ?></h1>
</div>

<?php if ((false)) {  ?>

<div class="top-links">

	<a class="top-link" href="http://www.colorizeit.com/index.html"><span>ColorizeIt</span></a>
	<a class="top-link" href="http://www.artodia.com/index.html"><span>Artodia</span></a>
	
	<div class="popup-trigger">
		<a class="top-link" href="#"><span>Popup Sample: block</span></a>
		<div class="popup">
			Put your popup content here
		</div>
	</div>
	
	<div class="popup-trigger">
		<a class="top-link" href="#"><span>Popup Sample: links</span></a>
		<div class="popup popup-list"><ul>
			<li class="popup-link"><a href="#">Link 1</a></li>
			<li class="popup-link"><a href="#">Another Link</a></li>
			<li class="popup-link"><a href="#">Link 3</a></li>
		</ul></div>
	</div>

</div>
<?php } ?>