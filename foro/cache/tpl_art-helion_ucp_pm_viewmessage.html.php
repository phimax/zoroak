<?php if (!defined('IN_PHPBB')) exit; $this->_tpldata['DEFINE']['.']['UCP_PM'] = TRUE; $this->_tpl_include('ucp_header.html'); $this->_tpl_include('ucp_pm_message_header.html'); ?>


	<span class="corners-bottom"><span></span></span></div>
</div>

<?php if ($this->_rootref['S_DISPLAY_HISTORY'] && ( $this->_rootref['U_VIEW_PREVIOUS_HISTORY'] || $this->_rootref['U_VIEW_NEXT_HISTORY'] )) {  ?>

	<fieldset class="display-options clearfix">
		<?php if ($this->_rootref['U_VIEW_PREVIOUS_HISTORY']) {  ?><a href="<?php echo (isset($this->_rootref['U_VIEW_PREVIOUS_HISTORY'])) ? $this->_rootref['U_VIEW_PREVIOUS_HISTORY'] : ''; ?>" class="left-box <?php echo (isset($this->_rootref['S_CONTENT_FLOW_BEGIN'])) ? $this->_rootref['S_CONTENT_FLOW_BEGIN'] : ''; ?>"><?php echo ((isset($this->_rootref['L_VIEW_PREVIOUS_HISTORY'])) ? $this->_rootref['L_VIEW_PREVIOUS_HISTORY'] : ((isset($user->lang['VIEW_PREVIOUS_HISTORY'])) ? $user->lang['VIEW_PREVIOUS_HISTORY'] : '{ VIEW_PREVIOUS_HISTORY }')); ?></a><?php } if ($this->_rootref['U_VIEW_NEXT_HISTORY']) {  ?><a href="<?php echo (isset($this->_rootref['U_VIEW_NEXT_HISTORY'])) ? $this->_rootref['U_VIEW_NEXT_HISTORY'] : ''; ?>" class="right-box <?php echo (isset($this->_rootref['S_CONTENT_FLOW_END'])) ? $this->_rootref['S_CONTENT_FLOW_END'] : ''; ?>"><?php echo ((isset($this->_rootref['L_VIEW_NEXT_HISTORY'])) ? $this->_rootref['L_VIEW_NEXT_HISTORY'] : ((isset($user->lang['VIEW_NEXT_HISTORY'])) ? $user->lang['VIEW_NEXT_HISTORY'] : '{ VIEW_NEXT_HISTORY }')); ?></a><?php } ?>

	</fieldset>
<?php } ?>



<div id="post-<?php echo (isset($this->_rootref['MESSAGE_ID'])) ? $this->_rootref['MESSAGE_ID'] : ''; ?>" class="post pm<?php if ($this->_rootref['S_POST_UNAPPROVED'] || $this->_rootref['S_POST_REPORTED']) {  ?> reported<?php } if ($this->_rootref['S_ONLINE']) {  ?> online<?php } ?>">
	<div class="inner"><span class="corners-top"><span></span></span>

	<div class="profile">
	<dl class="postprofile" id="profile<?php echo (isset($this->_rootref['MESSAGE_ID'])) ? $this->_rootref['MESSAGE_ID'] : ''; ?>">
	
		<dt class="popup-trigger">
			<a href="<?php echo (isset($this->_rootref['U_MESSAGE_AUTHOR'])) ? $this->_rootref['U_MESSAGE_AUTHOR'] : ''; ?>"><?php echo (isset($this->_rootref['MESSAGE_AUTHOR_FULL'])) ? $this->_rootref['MESSAGE_AUTHOR_FULL'] : ''; ?></a>
			<div class="popup popup-list">
				<ul>
					<li><a href="<?php echo (isset($this->_rootref['U_MESSAGE_AUTHOR'])) ? $this->_rootref['U_MESSAGE_AUTHOR'] : ''; ?>"><?php echo ((isset($this->_rootref['L_READ_PROFILE'])) ? $this->_rootref['L_READ_PROFILE'] : ((isset($user->lang['READ_PROFILE'])) ? $user->lang['READ_PROFILE'] : '{ READ_PROFILE }')); ?></a></li>
					<?php if ($this->_rootref['U_PM']) {  ?><li class="pm-icon"><a href="<?php echo (isset($this->_rootref['U_PM'])) ? $this->_rootref['U_PM'] : ''; ?>" title="<?php echo ((isset($this->_rootref['L_PRIVATE_MESSAGE'])) ? $this->_rootref['L_PRIVATE_MESSAGE'] : ((isset($user->lang['PRIVATE_MESSAGE'])) ? $user->lang['PRIVATE_MESSAGE'] : '{ PRIVATE_MESSAGE }')); ?>"><span><?php echo ((isset($this->_rootref['L_PRIVATE_MESSAGE'])) ? $this->_rootref['L_PRIVATE_MESSAGE'] : ((isset($user->lang['PRIVATE_MESSAGE'])) ? $user->lang['PRIVATE_MESSAGE'] : '{ PRIVATE_MESSAGE }')); ?></span></a></li><?php } if ($this->_rootref['U_EMAIL']) {  ?><li class="email-icon"><a href="<?php echo (isset($this->_rootref['U_EMAIL'])) ? $this->_rootref['U_EMAIL'] : ''; ?>" title="<?php echo ((isset($this->_rootref['L_SEND_EMAIL_USER'])) ? $this->_rootref['L_SEND_EMAIL_USER'] : ((isset($user->lang['SEND_EMAIL_USER'])) ? $user->lang['SEND_EMAIL_USER'] : '{ SEND_EMAIL_USER }')); ?> <?php echo (isset($this->_rootref['MESSAGE_AUTHOR'])) ? $this->_rootref['MESSAGE_AUTHOR'] : ''; ?>"><span><?php echo ((isset($this->_rootref['L_SEND_EMAIL_USER'])) ? $this->_rootref['L_SEND_EMAIL_USER'] : ((isset($user->lang['SEND_EMAIL_USER'])) ? $user->lang['SEND_EMAIL_USER'] : '{ SEND_EMAIL_USER }')); ?> <?php echo (isset($this->_rootref['MESSAGE_AUTHOR'])) ? $this->_rootref['MESSAGE_AUTHOR'] : ''; ?></span></a></li><?php } if ($this->_rootref['U_WWW']) {  ?><li class="web-icon"><a href="<?php echo (isset($this->_rootref['U_WWW'])) ? $this->_rootref['U_WWW'] : ''; ?>" title="<?php echo ((isset($this->_rootref['L_VISIT_WEBSITE'])) ? $this->_rootref['L_VISIT_WEBSITE'] : ((isset($user->lang['VISIT_WEBSITE'])) ? $user->lang['VISIT_WEBSITE'] : '{ VISIT_WEBSITE }')); ?>: <?php echo (isset($this->_rootref['U_WWW'])) ? $this->_rootref['U_WWW'] : ''; ?>"><span><?php echo ((isset($this->_rootref['L_WEBSITE'])) ? $this->_rootref['L_WEBSITE'] : ((isset($user->lang['WEBSITE'])) ? $user->lang['WEBSITE'] : '{ WEBSITE }')); ?></span></a></li><?php } if ($this->_rootref['U_MSN']) {  ?><li class="msnm-icon"><a href="<?php echo (isset($this->_rootref['U_MSN'])) ? $this->_rootref['U_MSN'] : ''; ?>" onclick="popup(this.href, 550, 320); return false;" title="<?php echo ((isset($this->_rootref['L_MSNM'])) ? $this->_rootref['L_MSNM'] : ((isset($user->lang['MSNM'])) ? $user->lang['MSNM'] : '{ MSNM }')); ?>"><span><?php echo ((isset($this->_rootref['L_MSNM'])) ? $this->_rootref['L_MSNM'] : ((isset($user->lang['MSNM'])) ? $user->lang['MSNM'] : '{ MSNM }')); ?></span></a></li><?php } if ($this->_rootref['U_ICQ']) {  ?><li class="icq-icon"><a href="<?php echo (isset($this->_rootref['U_ICQ'])) ? $this->_rootref['U_ICQ'] : ''; ?>" onclick="popup(this.href, 550, 320); return false;" title="<?php echo ((isset($this->_rootref['L_ICQ'])) ? $this->_rootref['L_ICQ'] : ((isset($user->lang['ICQ'])) ? $user->lang['ICQ'] : '{ ICQ }')); ?>"><span><?php echo ((isset($this->_rootref['L_ICQ'])) ? $this->_rootref['L_ICQ'] : ((isset($user->lang['ICQ'])) ? $user->lang['ICQ'] : '{ ICQ }')); ?></span></a></li><?php } if ($this->_rootref['U_YIM']) {  ?><li class="yahoo-icon"><a href="<?php echo (isset($this->_rootref['U_YIM'])) ? $this->_rootref['U_YIM'] : ''; ?>" onclick="popup(this.href, 780, 550); return false;" title="<?php echo ((isset($this->_rootref['L_YIM'])) ? $this->_rootref['L_YIM'] : ((isset($user->lang['YIM'])) ? $user->lang['YIM'] : '{ YIM }')); ?>"><span><?php echo ((isset($this->_rootref['L_YIM'])) ? $this->_rootref['L_YIM'] : ((isset($user->lang['YIM'])) ? $user->lang['YIM'] : '{ YIM }')); ?></span></a></li><?php } if ($this->_rootref['U_AIM']) {  ?><li class="aim-icon"><a href="<?php echo (isset($this->_rootref['U_AIM'])) ? $this->_rootref['U_AIM'] : ''; ?>" onclick="popup(this.href, 550, 320); return false;" title="<?php echo ((isset($this->_rootref['L_AIM'])) ? $this->_rootref['L_AIM'] : ((isset($user->lang['AIM'])) ? $user->lang['AIM'] : '{ AIM }')); ?>"><span><?php echo ((isset($this->_rootref['L_AIM'])) ? $this->_rootref['L_AIM'] : ((isset($user->lang['AIM'])) ? $user->lang['AIM'] : '{ AIM }')); ?></span></a></li><?php } if ($this->_rootref['U_JABBER']) {  ?><li class="jabber-icon"><a href="<?php echo (isset($this->_rootref['U_JABBER'])) ? $this->_rootref['U_JABBER'] : ''; ?>" onclick="popup(this.href, 550, 320); return false;" title="<?php echo ((isset($this->_rootref['L_JABBER'])) ? $this->_rootref['L_JABBER'] : ((isset($user->lang['JABBER'])) ? $user->lang['JABBER'] : '{ JABBER }')); ?>"><span><?php echo ((isset($this->_rootref['L_JABBER'])) ? $this->_rootref['L_JABBER'] : ((isset($user->lang['JABBER'])) ? $user->lang['JABBER'] : '{ JABBER }')); ?></span></a></li><?php } ?>

				</ul>
			</div>
		</dt>
		<?php if ($this->_rootref['RANK_TITLE'] || $this->_rootref['RANK_IMG']) {  ?><dd class="poster-rank"><?php if ($this->_rootref['RANK_IMG']) {  echo (isset($this->_rootref['RANK_IMG'])) ? $this->_rootref['RANK_IMG'] : ''; } else { echo (isset($this->_rootref['RANK_TITLE'])) ? $this->_rootref['RANK_TITLE'] : ''; } ?></dd><?php } if ($this->_rootref['AUTHOR_AVATAR']) {  ?>

		<dd class="poster-avatar">
			<a href="<?php echo (isset($this->_rootref['U_MESSAGE_AUTHOR'])) ? $this->_rootref['U_MESSAGE_AUTHOR'] : ''; ?>"><?php echo (isset($this->_rootref['AUTHOR_AVATAR'])) ? $this->_rootref['AUTHOR_AVATAR'] : ''; ?></a>
		</dd>
		<?php } else { ?>

		<dd class="poster-avatar empty"></dd>
		<?php } ?>


		<dd><strong><?php echo ((isset($this->_rootref['L_POSTS'])) ? $this->_rootref['L_POSTS'] : ((isset($user->lang['POSTS'])) ? $user->lang['POSTS'] : '{ POSTS }')); ?>:</strong> <?php echo (isset($this->_rootref['AUTHOR_POSTS'])) ? $this->_rootref['AUTHOR_POSTS'] : ''; ?></dd>
		<?php if ($this->_rootref['AUTHOR_JOINED']) {  ?><dd><strong><?php echo ((isset($this->_rootref['L_JOINED'])) ? $this->_rootref['L_JOINED'] : ((isset($user->lang['JOINED'])) ? $user->lang['JOINED'] : '{ JOINED }')); ?>:</strong> <?php echo (isset($this->_rootref['AUTHOR_JOINED'])) ? $this->_rootref['AUTHOR_JOINED'] : ''; ?></dd><?php } if ($this->_rootref['AUTHOR_FROM']) {  ?><dd><strong><?php echo ((isset($this->_rootref['L_LOCATION'])) ? $this->_rootref['L_LOCATION'] : ((isset($user->lang['LOCATION'])) ? $user->lang['LOCATION'] : '{ LOCATION }')); ?>:</strong> <?php echo (isset($this->_rootref['AUTHOR_FROM'])) ? $this->_rootref['AUTHOR_FROM'] : ''; ?></dd><?php } ?>

		
	</dl>
	</div>

	<div class="postbody">

		<?php if ($this->_rootref['U_DELETE'] || $this->_rootref['U_EDIT'] || $this->_rootref['U_QUOTE'] || $this->_rootref['U_REPORT']) {  ?>

		<ul class="profile-icons">
			<?php if ($this->_rootref['U_EDIT']) {  ?><li class="edit-icon"><a href="<?php echo (isset($this->_rootref['U_EDIT'])) ? $this->_rootref['U_EDIT'] : ''; ?>" title="<?php echo ((isset($this->_rootref['L_POST_EDIT_PM'])) ? $this->_rootref['L_POST_EDIT_PM'] : ((isset($user->lang['POST_EDIT_PM'])) ? $user->lang['POST_EDIT_PM'] : '{ POST_EDIT_PM }')); ?>"><span><?php echo ((isset($this->_rootref['L_POST_EDIT_PM'])) ? $this->_rootref['L_POST_EDIT_PM'] : ((isset($user->lang['POST_EDIT_PM'])) ? $user->lang['POST_EDIT_PM'] : '{ POST_EDIT_PM }')); ?></span></a></li><?php } if ($this->_rootref['U_DELETE']) {  ?><li class="delete-icon"><a href="<?php echo (isset($this->_rootref['U_DELETE'])) ? $this->_rootref['U_DELETE'] : ''; ?>" title="<?php echo ((isset($this->_rootref['L_DELETE_MESSAGE'])) ? $this->_rootref['L_DELETE_MESSAGE'] : ((isset($user->lang['DELETE_MESSAGE'])) ? $user->lang['DELETE_MESSAGE'] : '{ DELETE_MESSAGE }')); ?>"><span><?php echo ((isset($this->_rootref['L_DELETE_MESSAGE'])) ? $this->_rootref['L_DELETE_MESSAGE'] : ((isset($user->lang['DELETE_MESSAGE'])) ? $user->lang['DELETE_MESSAGE'] : '{ DELETE_MESSAGE }')); ?></span></a></li><?php } if ($this->_rootref['U_REPORT']) {  ?><li class="report-icon"><a href="<?php echo (isset($this->_rootref['U_REPORT'])) ? $this->_rootref['U_REPORT'] : ''; ?>" title="<?php echo ((isset($this->_rootref['L_REPORT_PM'])) ? $this->_rootref['L_REPORT_PM'] : ((isset($user->lang['REPORT_PM'])) ? $user->lang['REPORT_PM'] : '{ REPORT_PM }')); ?>"><span><?php echo ((isset($this->_rootref['L_REPORT_PM'])) ? $this->_rootref['L_REPORT_PM'] : ((isset($user->lang['REPORT_PM'])) ? $user->lang['REPORT_PM'] : '{ REPORT_PM }')); ?></span></a></li><?php } if ($this->_rootref['U_QUOTE']) {  ?><li class="quote-icon"><a href="<?php echo (isset($this->_rootref['U_QUOTE'])) ? $this->_rootref['U_QUOTE'] : ''; ?>" title="<?php echo ((isset($this->_rootref['L_POST_QUOTE_PM'])) ? $this->_rootref['L_POST_QUOTE_PM'] : ((isset($user->lang['POST_QUOTE_PM'])) ? $user->lang['POST_QUOTE_PM'] : '{ POST_QUOTE_PM }')); ?>"><span><?php echo ((isset($this->_rootref['L_POST_QUOTE_PM'])) ? $this->_rootref['L_POST_QUOTE_PM'] : ((isset($user->lang['POST_QUOTE_PM'])) ? $user->lang['POST_QUOTE_PM'] : '{ POST_QUOTE_PM }')); ?></span></a></li><?php } ?>

		</ul>
		<?php } ?>


		<h3 class="first"><?php echo (isset($this->_rootref['SUBJECT'])) ? $this->_rootref['SUBJECT'] : ''; ?></h3>

		<p class="author">
			<strong><?php echo ((isset($this->_rootref['L_SENT_AT'])) ? $this->_rootref['L_SENT_AT'] : ((isset($user->lang['SENT_AT'])) ? $user->lang['SENT_AT'] : '{ SENT_AT }')); ?>:</strong> <?php echo (isset($this->_rootref['SENT_DATE'])) ? $this->_rootref['SENT_DATE'] : ''; ?>

			<br /><strong><?php echo ((isset($this->_rootref['L_PM_FROM'])) ? $this->_rootref['L_PM_FROM'] : ((isset($user->lang['PM_FROM'])) ? $user->lang['PM_FROM'] : '{ PM_FROM }')); ?>:</strong> <?php echo (isset($this->_rootref['MESSAGE_AUTHOR_FULL'])) ? $this->_rootref['MESSAGE_AUTHOR_FULL'] : ''; ?>

			<?php if ($this->_rootref['S_TO_RECIPIENT']) {  ?><br /><strong><?php echo ((isset($this->_rootref['L_TO'])) ? $this->_rootref['L_TO'] : ((isset($user->lang['TO'])) ? $user->lang['TO'] : '{ TO }')); ?>:</strong> <?php $_to_recipient_count = (isset($this->_tpldata['to_recipient'])) ? sizeof($this->_tpldata['to_recipient']) : 0;if ($_to_recipient_count) {for ($_to_recipient_i = 0; $_to_recipient_i < $_to_recipient_count; ++$_to_recipient_i){$_to_recipient_val = &$this->_tpldata['to_recipient'][$_to_recipient_i]; if ($_to_recipient_val['NAME_FULL']) {  echo $_to_recipient_val['NAME_FULL']; } else { ?><a href="<?php echo $_to_recipient_val['U_VIEW']; ?>" style="color:<?php if ($_to_recipient_val['COLOUR']) {  echo $_to_recipient_val['COLOUR']; } else if ($_to_recipient_val['IS_GROUP']) {  ?>#0000FF<?php } ?>;"><?php echo $_to_recipient_val['NAME']; ?></a><?php } ?>&nbsp;<?php }} } if ($this->_rootref['S_BCC_RECIPIENT']) {  ?><br /><strong><?php echo ((isset($this->_rootref['L_BCC'])) ? $this->_rootref['L_BCC'] : ((isset($user->lang['BCC'])) ? $user->lang['BCC'] : '{ BCC }')); ?>:</strong> <?php $_bcc_recipient_count = (isset($this->_tpldata['bcc_recipient'])) ? sizeof($this->_tpldata['bcc_recipient']) : 0;if ($_bcc_recipient_count) {for ($_bcc_recipient_i = 0; $_bcc_recipient_i < $_bcc_recipient_count; ++$_bcc_recipient_i){$_bcc_recipient_val = &$this->_tpldata['bcc_recipient'][$_bcc_recipient_i]; if ($_bcc_recipient_val['NAME_FULL']) {  echo $_bcc_recipient_val['NAME_FULL']; } else { ?><a href="<?php echo $_bcc_recipient_val['U_VIEW']; ?>" style="color:<?php if ($_bcc_recipient_val['COLOUR']) {  echo $_bcc_recipient_val['COLOUR']; } else if ($_bcc_recipient_val['IS_GROUP']) {  ?>#0000FF<?php } ?>;"><?php echo $_bcc_recipient_val['NAME']; ?></a><?php } ?>&nbsp;<?php }} } ?>

		</p>


		<div class="content"><?php echo (isset($this->_rootref['MESSAGE'])) ? $this->_rootref['MESSAGE'] : ''; ?></div>

		<?php if ($this->_rootref['S_HAS_ATTACHMENTS']) {  ?>

		<dl class="attachbox">
			<dt><?php echo ((isset($this->_rootref['L_ATTACHMENTS'])) ? $this->_rootref['L_ATTACHMENTS'] : ((isset($user->lang['ATTACHMENTS'])) ? $user->lang['ATTACHMENTS'] : '{ ATTACHMENTS }')); ?></dt>
			<?php $_attachment_count = (isset($this->_tpldata['attachment'])) ? sizeof($this->_tpldata['attachment']) : 0;if ($_attachment_count) {for ($_attachment_i = 0; $_attachment_i < $_attachment_count; ++$_attachment_i){$_attachment_val = &$this->_tpldata['attachment'][$_attachment_i]; ?>

			<dd><?php echo $_attachment_val['DISPLAY_ATTACHMENT']; ?></dd>
			<?php }} ?>

		</dl>
		<?php } if ($this->_rootref['S_DISPLAY_NOTICE']) {  ?>

			<div class="rules"><?php echo ((isset($this->_rootref['L_DOWNLOAD_NOTICE'])) ? $this->_rootref['L_DOWNLOAD_NOTICE'] : ((isset($user->lang['DOWNLOAD_NOTICE'])) ? $user->lang['DOWNLOAD_NOTICE'] : '{ DOWNLOAD_NOTICE }')); ?></div>
		<?php } if ($this->_rootref['EDITED_MESSAGE'] || $this->_rootref['EDIT_REASON']) {  ?>

		<div class="notice"><?php echo (isset($this->_rootref['EDITED_MESSAGE'])) ? $this->_rootref['EDITED_MESSAGE'] : ''; ?>

			<?php if ($this->_rootref['EDIT_REASON']) {  ?><br /><strong><?php echo ((isset($this->_rootref['L_REASON'])) ? $this->_rootref['L_REASON'] : ((isset($user->lang['REASON'])) ? $user->lang['REASON'] : '{ REASON }')); ?>:</strong> <em><?php echo (isset($this->_rootref['EDIT_REASON'])) ? $this->_rootref['EDIT_REASON'] : ''; ?></em><?php } ?>

		</div>
		<?php } if ($this->_rootref['SIGNATURE']) {  ?>

			<div id="sig<?php echo (isset($this->_rootref['MESSAGE_ID'])) ? $this->_rootref['MESSAGE_ID'] : ''; ?>" class="signature"><?php echo (isset($this->_rootref['SIGNATURE'])) ? $this->_rootref['SIGNATURE'] : ''; ?></div>
		<?php } ?>

	</div>

	<span class="corners-bottom"><span></span></span></div>
</div>

<?php if ($this->_rootref['S_VIEW_MESSAGE']) {  ?>

<fieldset class="display-options">
	<?php if ($this->_rootref['U_PREVIOUS_PM']) {  ?><a href="<?php echo (isset($this->_rootref['U_PREVIOUS_PM'])) ? $this->_rootref['U_PREVIOUS_PM'] : ''; ?>" class="left-box <?php echo (isset($this->_rootref['S_CONTENT_FLOW_BEGIN'])) ? $this->_rootref['S_CONTENT_FLOW_BEGIN'] : ''; ?>"><?php echo ((isset($this->_rootref['L_VIEW_PREVIOUS_PM'])) ? $this->_rootref['L_VIEW_PREVIOUS_PM'] : ((isset($user->lang['VIEW_PREVIOUS_PM'])) ? $user->lang['VIEW_PREVIOUS_PM'] : '{ VIEW_PREVIOUS_PM }')); ?></a><?php } if ($this->_rootref['U_NEXT_PM']) {  ?><a href="<?php echo (isset($this->_rootref['U_NEXT_PM'])) ? $this->_rootref['U_NEXT_PM'] : ''; ?>" class="right-box <?php echo (isset($this->_rootref['S_CONTENT_FLOW_END'])) ? $this->_rootref['S_CONTENT_FLOW_END'] : ''; ?>"><?php echo ((isset($this->_rootref['L_VIEW_NEXT_PM'])) ? $this->_rootref['L_VIEW_NEXT_PM'] : ((isset($user->lang['VIEW_NEXT_PM'])) ? $user->lang['VIEW_NEXT_PM'] : '{ VIEW_NEXT_PM }')); ?></a><?php } if ($this->_rootref['S_MARK_OPTIONS']) {  ?><label for="mark_option"><select name="mark_option" id="mark_option"><?php echo (isset($this->_rootref['S_MARK_OPTIONS'])) ? $this->_rootref['S_MARK_OPTIONS'] : ''; ?></select></label>&nbsp;<input class="button2" type="submit" name="submit_mark" value="<?php echo ((isset($this->_rootref['L_GO'])) ? $this->_rootref['L_GO'] : ((isset($user->lang['GO'])) ? $user->lang['GO'] : '{ GO }')); ?>" /><?php } if (! $this->_rootref['S_UNREAD'] && ! $this->_rootref['S_SPECIAL_FOLDER']) {  ?><label for="dest_folder"><?php if ($this->_rootref['S_VIEW_MESSAGE']) {  echo ((isset($this->_rootref['L_MOVE_TO_FOLDER'])) ? $this->_rootref['L_MOVE_TO_FOLDER'] : ((isset($user->lang['MOVE_TO_FOLDER'])) ? $user->lang['MOVE_TO_FOLDER'] : '{ MOVE_TO_FOLDER }')); ?>: <?php } else { echo ((isset($this->_rootref['L_MOVE_MARKED_TO_FOLDER'])) ? $this->_rootref['L_MOVE_MARKED_TO_FOLDER'] : ((isset($user->lang['MOVE_MARKED_TO_FOLDER'])) ? $user->lang['MOVE_MARKED_TO_FOLDER'] : '{ MOVE_MARKED_TO_FOLDER }')); } ?> <select name="dest_folder" id="dest_folder"><?php echo (isset($this->_rootref['S_TO_FOLDER_OPTIONS'])) ? $this->_rootref['S_TO_FOLDER_OPTIONS'] : ''; ?></select></label> <input class="button2" type="submit" name="move_pm" value="<?php echo ((isset($this->_rootref['L_GO'])) ? $this->_rootref['L_GO'] : ((isset($user->lang['GO'])) ? $user->lang['GO'] : '{ GO }')); ?>" /><?php } ?>

	<input type="hidden" name="marked_msg_id[]" value="<?php echo (isset($this->_rootref['MSG_ID'])) ? $this->_rootref['MSG_ID'] : ''; ?>" />
	<input type="hidden" name="cur_folder_id" value="<?php echo (isset($this->_rootref['CUR_FOLDER_ID'])) ? $this->_rootref['CUR_FOLDER_ID'] : ''; ?>" />
	<input type="hidden" name="p" value="<?php echo (isset($this->_rootref['MSG_ID'])) ? $this->_rootref['MSG_ID'] : ''; ?>" />
</fieldset>
<?php } $this->_tpl_include('ucp_pm_message_footer.html'); if ($this->_rootref['S_DISPLAY_HISTORY']) {  $this->_tpl_include('ucp_pm_history.html'); } $this->_tpl_include('ucp_footer.html'); ?>