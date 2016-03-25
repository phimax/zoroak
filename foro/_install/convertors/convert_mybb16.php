<?php
/**
*
* @package install
* @version $Id$
* @copyright (c) 2006 phpBB Group
* @copyright (c) 2014 prototech
* @license http://opensource.org/licenses/GPL-2.0 GNU Public License, version 2
*
*/

/**
* NOTE to potential convertor authors. Please use this file to get
* familiar with the structure since we added some bare explanations here.
*
* Since this file gets included more than once on one page you are not able to add functions to it.
* Instead use a functions_ file.
*
* @ignore
*/
if (!defined('IN_PHPBB'))
{
	exit;
}

include($phpbb_root_path . 'config.' . $phpEx);
unset($dbpasswd);

/**
* $convertor_data provides some basic information about this convertor which is
* used on the initial list of convertors and to populate the default settings
*/
$convertor_data = array(
	'forum_name'	=> 'MyBB 1.6.x',
	'version'		=> '0.0.4',
	'phpbb_version'	=> '3.0.12',
	'author'		=> '<a href="https://www.phpbb.com/community/memberlist.php?mode=viewprofile&u=304651">prototech</a>',
	'dbms'			=> $dbms,
	'dbhost'		=> $dbhost,
	'dbport'		=> $dbport,
	'dbuser'		=> $dbuser,
	'dbpasswd'		=> '',
	'dbname'		=> $dbname,
	'table_prefix'	=> 'mybb_',
	'forum_path'	=> '../forums',
	'author_notes'	=> '',
);

/**
* $tables is a list of the tables (minus prefix) which we expect to find in the
* source forum. It is used to guess the prefix if the specified prefix is incorrect
*/
$tables = array(
	'adminlog',
	'adminoptions',
	'adminsessions',
	'adminviews',
	'announcements',
	'attachments',
	'attachtypes',
	'awaitingactivation',
	'badwords',
	'banfilters',
	'banned',
	'calendarpermissions',
	'calendars',
	'captcha',
	'datacache',
	'delayedmoderation',
	'events',
	'forumpermissions',
	'forums',
	'forumsread',
	'forumsubscriptions',
	'groupleaders',
	'helpdocs',
	'helpsections',
	'icons',
	'joinrequests',
	'mailerrors',
	'maillogs',
	'mailqueue',
	'massemails',
	'moderatorlog',
	'moderators',
	'modtools',
	'mycode',
	'polls',
	'pollvotes',
	'posts',
	'privatemessages',
	'profilefields',
	'promotionlogs',
	'promotions',
	'reportedposts',
	'reputation',
	'searchlog',
	'sessions',
	'settinggroups',
	'settings',
	'smilies',
	'spiders',
	'stats',
	'tasklog',
	'tasks',
	'templategroups',
	'templates',
	'templatesets',
	'themes',
	'themestylesheets',
	'threadprefixes',
	'threadratings',
	'threads',
	'threadsread',
	'threadsubscriptions',
	'threadviews',
	'userfields',
	'usergroups',
	'users',
	'usertitles',
	'warninglevels',
	'warnings',
	'warningtypes',
);

/**
* $config_schema details how the board configuration information is stored in the source forum.
*
* 'table_format' can take the value 'file' to indicate a config file. In this case array_name
* is set to indicate the name of the array the config values are stored in
* Example of using a file:
* $config_schema = array(
* 	'table_format'	=>	'file',
* 	'filename'	=>	'NAME OF FILE', // If the file is not in the root directory, the path needs to be added with no leading slash
* 	'array_name' => 'NAME OF ARRAY', // Only used if the configuration file stores the setting in an array.
* 	'settings'		=>	array(
*        'board_email' => 'SUPPORT_EMAIL', // target config name => source target name
* 	)
* );
* 'table_format' can be an array if the values are stored in a table which is an assosciative array
* (as per phpBB 2.0.x)
* If left empty, values are assumed to be stored in a table where each config setting is
* a column (as per phpBB 1.x)
*
* In either of the latter cases 'table_name' indicates the name of the table in the database
*
* 'settings' is an array which maps the name of the config directive in the source forum
* to the config directive in phpBB3. It can either be a direct mapping or use a function.
* Please note that the contents of the old config value are passed to the function, therefore
* an in-built function requiring the variable passed by reference is not able to be used. Since
* empty() is such a function we created the function is_empty() to be used instead.
*/
$config_schema = array(
	'table_name'	=>	'settings',
	'table_format'	=>	array('name' => 'value'),
	'settings'		=>	array(
		'allow_emailreuse'		=> 'allowmultipleemails',
		'allow_privmsg'			=> 'enablepms',
		'allow_quick_reply'		=> 'quickreply',
		'allow_sig_bbcode'		=> 'sigmycode',
		'allow_sig_img'			=> 'sigimgcode',
		'allow_sig_smilies'		=> 'sigsmilies',
		'avatar_max_height'		=> 'mybb_max_avatar_height(maxavatardims)',
		'avatar_max_width'		=> 'mybb_max_avatar_width(maxavatardims)',
		'auth_bbcode_pm'		=> 'pmsallowmycode',
		'auth_img_pm'			=> 'pmsallowimgcode',
		'auth_smilies_pm'		=> 'pmsallowsmilies',
		'board_timezone'		=> 'timezoneoffset',
		'edit_time'				=> 'edittimelimit',
		'flood_interval'		=> 'postfloodsecs',
		'gzip_compress'			=> 'gzipoutput',
		'limit_load'			=> 'load',
		'load_db_track'			=> 'dotfolders',
		'load_jumpbox'			=> 'enableforumjump',
		'hot_threshold'			=> 'hottopic',
		'min_name_chars'		=> 'minnamelength',
		'min_pass_chars'		=> 'minpasswordlength',
		'min_post_chars'		=> 'minmessagelength',
		'max_attachments'		=> 'maxattachments',
		'max_login_attempts'	=> 'failedlogincount',
		'max_name_chars'		=> 'maxnamelength',
		'max_pass_chars'		=> 'maxpasswordlength',
		'max_poll_options'		=> 'maxpolloptions',
		'max_post_chars'		=> 'maxmessagelenfth',
		'max_quote_depth'		=> 'maxquotedepth',
		'max_sig_chars'			=> 'siglength',
		'posts_per_page'		=> 'postsperpage',
		'topics_per_page'		=> 'threadsperpage',
		'sitename'				=> 'phpbb_set_encoding(bbname)',
		'smtp_delivery'			=> 'mybb_smtp_delivery(mail_handler)',
		'smtp_host'				=> 'smtp_host',
		'smtp_username'			=> 'smtp_user',
		'smtp_password'			=> 'smtp_password',
//		'allow_namechange'		=> 'allow_namechange',
//		'enable_confirm'		=> 'enable_confirm',
//		'board_email_form'		=> 'board_email_form',
//		'session_length'		=> 'session_length',
//		'board_email_sig'		=> 'phpbb_set_encoding(board_email_sig)',
//		'pm_max_msgs'			=> 'max_inbox_privmsgs',
//		'require_activation'	=> 'require_activation',
//		'avatar_filesize'		=> 'avatar_filesize',
//		'default_dateformat'	=> 'phpbb_set_encoding(default_dateformat)',
//		'coppa_enable'			=> '!is_empty(coppa_mail)',
//		'coppa_fax'				=> 'coppa_fax',
//		'coppa_mail'			=> 'coppa_mail',
	)
);

/**
* $test_file is the name of a file which is present on the source
* forum which can be used to check that the path specified by the
* user was correct
*/
$test_file = 'editpost.php';

/**
* If this is set then we are not generating the first page of information but getting the conversion information.
*/
if (!$get_info)
{
	// Check whether the user location field exists.
	@define('USER_FROM_EXISTS', mybb_user_from_col_exists());
	// Overwrite maximum avatar width/height
	@define('DEFAULT_AVATAR_X_CUSTOM', get_config_value('avatar_max_width'));
	@define('DEFAULT_AVATAR_Y_CUSTOM', get_config_value('avatar_max_height'));

	// additional table used only during conversion
	@define('USERCONV_TABLE', $table_prefix . 'userconv');

/**
*	Description on how to use the convertor framework.
*
*	'schema' Syntax Description
*		-> 'target'			=> Target Table. If not specified the next table will be handled
*		-> 'primary'		=> Primary Key. If this is specified then this table is processed in batches
*		-> 'query_first'	=> array('target' or 'src', Query to execute before beginning the process
*								(if more than one then specified as array))
*		-> 'function_first'	=> Function to execute before beginning the process (if more than one then specified as array)
*								(This is mostly useful if variables need to be given to the converting process)
*		-> 'test_file'		=> This is not used at the moment but should be filled with a file from the old installation
*
*		// DB Functions
*		'distinct'	=> Add DISTINCT to the select query
*		'where'		=> Add WHERE to the select query
*		'group_by'	=> Add GROUP BY to the select query
*		'left_join'	=> Add LEFT JOIN to the select query (if more than one joins specified as array)
*		'having'	=> Add HAVING to the select query
*
*		// DB INSERT array
*		This one consist of three parameters
*		First Parameter:
*							The key need to be filled within the target table
*							If this is empty, the target table gets not assigned the source value
*		Second Parameter:
*							Source value. If the first parameter is specified, it will be assigned this value.
*							If the first parameter is empty, this only gets added to the select query
*		Third Parameter:
*							Custom Function. Function to execute while storing source value into target table.
*							The functions return value get stored.
*							The function parameter consist of the value of the second parameter.
*
*							types:
*								- empty string == execute nothing
*								- string == function to execute
*								- array == complex execution instructions
*
*		Complex execution instructions:
*		@todo test complex execution instructions - in theory they will work fine
*
*							By defining an array as the third parameter you are able to define some statements to be executed. The key
*							is defining what to execute, numbers can be appended...
*
*							'function' => execute function
*							'execute' => run code, whereby all occurrences of {VALUE} get replaced by the last returned value.
*										The result *must* be assigned/stored to {RESULT}.
*							'typecast'	=> typecast value
*
*							The returned variables will be made always available to the next function to continue to work with.
*
*							example (variable inputted is an integer of 1):
*
*							array(
*								'function1'		=> 'increment_by_one',		// returned variable is 2
*								'typecast'		=> 'string',				// typecast variable to be a string
*								'execute'		=> '{RESULT} = {VALUE} . ' is good';', // returned variable is '2 is good'
*								'function2'		=> 'replace_good_with_bad',				// returned variable is '2 is bad'
*							),
*
*/

	$convertor = array(
		'test_file'				=> 'editpost.php',

		// The avatar sources in the db are from the board root.
		'avatar_path'			=> mybb_get_config_path_value('avataruploadpath'),
		'avatar_gallery_path'	=> mybb_get_config_path_value('avatardir'),
		'smilies_path'			=> mybb_get_absolute_path('images/smilies'),
		'upload_path'			=> mybb_get_config_path_value('uploadspath'),
		'icons_path'			=> '',
		'thumbnails'			=> '',
		'ranks_path'			=> mybb_get_absolute_path('images/groupimages'),
		'source_path_absolute'	=> true,

		// We empty some tables to have clean data available
		'query_first'			=> array(
			array('target', $convert->truncate_statement . SEARCH_RESULTS_TABLE),
			array('target', $convert->truncate_statement . SEARCH_WORDLIST_TABLE),
			array('target', $convert->truncate_statement . SEARCH_WORDMATCH_TABLE),
			array('target', $convert->truncate_statement . LOG_TABLE),
		),

//	with this you are able to import all attachment files on the fly. For large boards this is not an option, therefore commented out by default.
//	Instead every file gets copied while processing the corresponding attachment entry.
//		if (defined("MOD_ATTACHMENT")) { import_attachment_files(); phpbb_copy_thumbnails(); }

		// phpBB2 allowed some similar usernames to coexist which would have the same
		// username_clean in phpBB3 which is not possible, so we'll give the admin a list
		// of user ids and usernames and let him deicde what he wants to do with them
		'execute_first'	=> '
			phpbb_create_userconv_table();
			import_avatar_gallery();
			phpbb_insert_forums();
			set_config(\'auth_method\', \'mybb16\');
			mybb_create_bbcodes();
			mybb_add_user_salt_field();
			mybb_set_config_values();
		',

		'execute_last'	=> array('
			add_bots();
		', '
			update_folder_pm_count();
		', '
			update_unread_count();
		', '
			mybb_close_extraneous_reports();
		', '
			mybb_set_last_posts();
		', '
			mybb_flag_attachments();
		', '
			phpbb_convert_authentication(\'start\');
		', '
			phpbb_convert_authentication(\'first\');
		'),

		'schema' => array(
			array(
				'target'	=> USERCONV_TABLE,
				'query_first'   => array('target', $convert->truncate_statement . USERCONV_TABLE),

				array('user_id',			'users.uid',		 	''),
				array('username_clean',		'users.username',		array('function1' => 'phpbb_set_encoding_html', 'function2' => 'utf8_clean_string')),
			),

			array(
				'target'		=> ATTACHMENTS_TABLE,
				'primary'		=> 'attachments.aid',
				'query_first'	=> array('target', $convert->truncate_statement . ATTACHMENTS_TABLE),
				'autoincrement'	=> 'attach_id',

				array('attach_id',				'attachments.aid',						''),
				array('post_msg_id',			'attachments.pid',						''),
				array('topic_id',				'posts.tid',							''),
				array('in_message',				0,										''),
				array('is_orphan',				0,										''),
				array('poster_id',				'attachments.uid',						'phpbb_user_id'),
				array('physical_filename',		'attachments.attachname',				'mybb_import_attachment'),
				array('real_filename',			'attachments.filename',					'phpbb_set_encoding_html'),
				array('download_count',			'attachments.downloads',				''),
				array('attach_comment',			'',										''),
				array('extension',				'attachments.filename',					'mybb_file_ext'),
				array('mimetype',				'attachments.filetype',					''),
				array('filesize',				'attachments.filesize',					''),
				array('filetime',				'attachments.dateuploaded',				''),
				array('thumbnail',				'attachments.thumbnail',				'mybb_has_thumbnail'),

				'where'			=> 'posts.pid = attachments.pid',
			),

			array(
				'target'		=> BANLIST_TABLE,
				'execute_first'	=> 'phpbb_check_username_collisions();',
				'query_first'	=> array('target', $convert->truncate_statement . BANLIST_TABLE),

				array('ban_ip',					'',									''),
				array('ban_userid',				'banned.uid',						'phpbb_user_id'),
				array('ban_email',				'',									''),
				array('ban_reason',				'banned.reason',					'phpbb_set_encoding_html'),
				array('ban_give_reason',		'',									''),
				array('ban_start',				'banned.dateline',					''),
				array('ban_end',				'banned.lifted',					''),
			),

			array(
				'target'		=> BANLIST_TABLE,

				array('ban_ip',					'banfilters.filter',				'phpbb_set_encoding_html'),

				'where'		=> 'type = 1',
			),

			array(
				'target'		=> DISALLOW_TABLE,
				'query_first'	=> array('target', $convert->truncate_statement . DISALLOW_TABLE),

				array('disallow_username',		'banfilters.filter',			'mybb_disallowed_username'),

				'where'		=> 'type = 2',
			),

			array(
				'target'		=> RANKS_TABLE,
				'query_first'	=> array('target', $convert->truncate_statement . RANKS_TABLE),
				'autoincrement'	=> 'rank_id',

				array('rank_id',					'usertitles.utid',				''),
				array('rank_title',					'usertitles.title',				'phpbb_set_encoding_html'),
				array('rank_min',					'usertitles.posts',				array('typecast' => 'int', 'execute' => '{RESULT} = ({VALUE}[0] < 0) ? 0 : {VALUE}[0];')),
				array('rank_special',				0,								''),
				array('rank_image',					'',								'import_rank'),
			),


			array(
				'target'		=> ICONS_TABLE,
				'query_first'	=> array('target', $convert->truncate_statement . ICONS_TABLE),
				'autoincrement'	=> 'icons_id',

				array('icons_id',					'icons.iid',					''),
				array('icons_url',					'icons.path',					'mybb_import_icon'),
				array('icons_width',				'icons.path',					'mybb_icon_width'),
				array('icons_height',				'icons.path',					'mybb_icon_height'),
				array('icons_order',				'icons.iid',					''),
				array('display_on_posting',			1,								''),
			),

			array(
				'target'		=> TOPICS_TABLE,
				'query_first'	=> array(
					array('target', $convert->truncate_statement . TOPICS_TABLE),
					array('target', $convert->truncate_statement . POLL_OPTIONS_TABLE),
				),
				'primary'		=> 'threads.tid',
				'autoincrement'	=> 'topic_id',

				array('topic_id',				'threads.tid',						''),
				array('forum_id',				'threads.fid',						''),
				array('icon_id',				'threads.icon',						''),
				array('topic_poster',			'threads.uid AS poster_id',			'phpbb_user_id'),
				array('topic_attachment',		'threads.attachmentcount',			'not_empty'),
				array('topic_title',			'threads.subject',					'phpbb_set_encoding_html'),
				array('topic_time',				'threads.dateline',					'intval'),
				array('topic_views',			'threads.views',					''),
				array('topic_replies',			'threads.replies',					''),
				array('topic_replies_real',		'threads.unapprovedposts',			'mybb_real_replies'),
				array('topic_status',			'threads.closed',					'mybb_topic_status'),
				array('topic_moved_id',			'threads.closed',					'mybb_topic_moved_id'),
				array('topic_type',				'threads.sticky',					'mybb_convert_topic_type'),
				array('topic_first_post_id',	'threads.firstpost',				''),
				array('topic_last_view_time',	'threads.lastpost',					''),
				array('topic_last_post_id',		0,									''),
				array('topic_last_post_time',	'threads.lastpost',					''),
				array('poll_title',				'polls.question',					array('function1' => 'null_to_str', 'function2' => 'phpbb_set_encoding_html')),
				array('poll_start',				'polls.dateline',					'null_to_zero'),
				array('poll_length',			'polls.timeout',					'mybb_poll_length'),
				array('poll_max_options',		1,									''),
				array('poll_vote_change',		0,									''),
				array('',						'polls.votes',						''),
				array('',						'polls.options',					'mybb_insert_poll_options'),

				'left_join'		=>	'threads LEFT JOIN polls ON threads.tid = polls.tid',

				'where'			=> 'threads.visible = 1',
			),

			array(
				'target'		=> FORUMS_TRACK_TABLE,
				'primary'		=> 'forumsread.fid',
				'query_first'	=> array('target', $convert->truncate_statement . FORUMS_TRACK_TABLE),

				array('user_id',				'forumsread.uid',					'phpbb_user_id'),
				array('forum_id',				'forumsread.fid',					''),
				array('mark_time',				'forumsread.dateline',				''),
			),

			array(
				'target'		=> TOPICS_TRACK_TABLE,
				'primary'		=> 'threadsread.tid',
				'query_first'	=> array('target', $convert->truncate_statement . TOPICS_TRACK_TABLE),

				array('user_id',				'threadsread.uid',					'phpbb_user_id'),
				array('topic_id',				'threadsread.tid',					''),
				array('forum_id',				'threads.fid',						''),
				array('mark_time',				'threadsread.dateline',				''),

				'where'		=> 'threadsread.tid = threads.tid',
			),

			array(
				'target'		=> FORUMS_WATCH_TABLE,
				'primary'		=> 'forumsubscriptions.fsid',
				'query_first'	=> array('target', $convert->truncate_statement . FORUMS_WATCH_TABLE),

				array('forum_id',				'forumsubscriptions.fid',			''),
				array('user_id',				'forumsubscriptions.uid',			'phpbb_user_id'),
				array('notify_status',			NOTIFY_YES,							''),
			),

			array(
				'target'		=> TOPICS_WATCH_TABLE,
				'primary'		=> 'threadsubscriptions.tid',
				'query_first'	=> array('target', $convert->truncate_statement . TOPICS_WATCH_TABLE),

				array('topic_id',				'threadsubscriptions.tid',			''),
				array('user_id',				'threadsubscriptions.uid',			'phpbb_user_id'),
				array('notify_status',			NOTIFY_YES,							''),

				'where'		=> 'notification = 1',
			),

			// We'll convert subscriptions that do not send out emails to bookmarks.
			array(
				'target'		=> BOOKMARKS_TABLE,
				'primary'		=> 'threadsubscriptions.tid',
				'query_first'	=> array('target', $convert->truncate_statement . BOOKMARKS_TABLE),

				array('topic_id',				'threadsubscriptions.tid',			''),
				array('user_id',				'threadsubscriptions.uid',			'phpbb_user_id'),

				'where'		=> 'notification = 0',
			),

			array(
				'target'		=> SMILIES_TABLE,
				'query_first'	=> array('target', $convert->truncate_statement . SMILIES_TABLE),
				'autoincrement'	=> 'smiley_id',

				array('smiley_id',				'smilies.sid',						''),
				array('code',					'smilies.find',						array('function1' => 'phpbb_smilie_html_decode', 'function2' => 'phpbb_set_encoding_html')),
				array('emotion',				'smilies.name',						'phpbb_set_encoding_html'),
				array('smiley_url',				'smilies.image',					'mybb_import_smiley'),
				array('smiley_width',			'smilies.image',					'get_smiley_width'),
				array('smiley_height',			'smilies.image',					'get_smiley_height'),
				array('smiley_order',			'smilies.disporder',				''),
				array('display_on_posting',		'smilies.showclickable',			''),
			),

			array(
				'target'		=> POLL_VOTES_TABLE,
				'primary'		=> 'pollvotes.vid',
				'query_first'	=> array('target', $convert->truncate_statement . POLL_VOTES_TABLE),

				array('poll_option_id',			'pollvotes.voteoption',				''),
				array('topic_id',				'polls.tid',						''),
				array('vote_user_id',			'pollvotes.uid',					'phpbb_user_id'),
				array('vote_user_ip',			'',									''),

				'where'			=> 'pollvotes.pid = polls.pid',
			),

			array(
				'target'		=> WORDS_TABLE,
				'primary'		=> 'badwords.bid',
				'query_first'	=> array('target', $convert->truncate_statement . WORDS_TABLE),
				'autoincrement'	=> 'word_id',

				array('word_id',				'badwords.bid',						''),
				array('word',					'badwords.badword',					'phpbb_set_encoding_html'),
				array('replacement',			'badwords.replacement',				'mybb_word_replacement'),
			),

			array(
				'target'		=> POSTS_TABLE,
				'primary'		=> 'posts.pid',
				'autoincrement'	=> 'post_id',
				'query_first'	=> array('target', $convert->truncate_statement . POSTS_TABLE),
				'execute_first'	=> '
					$config["max_post_chars"] = 0;
					$config["min_post_chars"] = 0;
					$config["max_quote_depth"] = 0;
				',

				array('post_id',				'posts.pid',						''),
				array('topic_id',				'posts.tid',						''),
				array('forum_id',				'posts.fid',						''),
				array('poster_id',				'posts.uid',						'phpbb_user_id'),
				array('icon_id',				'posts.icon',						''),
				array('poster_ip',				'posts.ipaddress',					''),
				array('post_time',				'posts.dateline',					''),
				array('enable_bbcode',			1,									''),
				array('enable_smilies',			'posts.smilieoff',					'is_empty'),
				array('enable_sig',				'posts.includesig',					''),
				array('enable_magic_url',		1,									''),
				array('post_username',			'',									''),
				array('post_subject',			'posts.subject',					'phpbb_set_encoding_html'),
				array('post_attachment',		0,									''),
				array('post_edit_time',			'posts.edittime',					''),
				array('post_edit_count',		'posts.edittime',					'not_empty'),
				array('post_edit_reason',		'',									''),
				array('post_edit_user',			'posts.edituid',					'phpbb_user_id'),

				array('bbcode_uid',				'posts.dateline',					'make_uid'),
				array('post_text',				'posts.message',					'phpbb_prepare_message'),
				array('bbcode_bitfield',		'',									'get_bbcode_bitfield'),
				array('post_checksum',			'',									''),

				'where'		=> 'posts.visible = 1',
			),

			array(
				'target'		=> DRAFTS_TABLE,
				'primary'		=> 'posts.pid',
				'autoincrement'	=> 'draft_id',
				'query_first'	=> array('target', $convert->truncate_statement . DRAFTS_TABLE),

				array('draft_id',				0,									''),
				array('user_id',				'posts.uid',						'phpbb_user_id'),
				array('',						'threads.visible',					''),
				array('topic_id',				'posts.tid',						'mybb_draft_topic_id'),
				array('forum_id',				'posts.fid',						''),
				array('save_time',				'posts.dateline',					''),
				array('draft_subject',			'posts.subject',					'phpbb_set_encoding_html'),
				array('draft_message',			'posts.message',					'phpbb_set_encoding_html'),

				'where'		=> 'posts.visible = -2 AND posts.tid = threads.tid',
			),

			array(
				'target'		=> DRAFTS_TABLE,
				'primary'		=> 'privatemessages.pmid',
				'autoincrement'	=> 'draft_id',

				array('draft_id',				0,									''),
				array('user_id',				'privatemessages.fromid',			'phpbb_user_id'),
				array('topic_id',				0,									''),
				array('forum_id',				0,									''),
				array('save_time',				'privatemessages.dateline',			''),
				array('draft_subject',			'privatemessages.subject',			'phpbb_set_encoding_html'),
				array('draft_message',			'privatemessages.message',			'phpbb_set_encoding_html'),

				'where'		=> 'privatemessages.folder = 3',
			),

			array(
				'target'		=> REPORTS_TABLE,
				'primary'		=> 'reportedposts.rid',
				'autoincrement'	=> 'report_id',
				'query_first'	=> array('target', $convert->truncate_statement . REPORTS_TABLE),

				array('report_id',				'reportedposts.rid',				''),
				array('reason_id',				4,									''), // "Other"
				array('post_id',				'reportedposts.pid',				''),
				array('pm_id',					0,									''),
				array('user_id',				'reportedposts.uid',				'phpbb_user_id'),
				array('user_notify',			0,									''),
				array('report_closed',			'reportedposts.reportstatus',		''),
				array('report_text',			'reportedposts.reason',				'phpbb_set_encoding'),
				array('report_time',			'reportedposts.dateline',			''),
			),

			array(
				'target'		=> PRIVMSGS_FOLDER_TABLE,
				'primary'		=> 'users.uid',
				'query_first'	=> array('target', $convert->truncate_statement . PRIVMSGS_FOLDER_TABLE),

				array('',						'users.uid',							''),
				array('',						'users.pmfolders',						'mybb_insert_custom_folders'),

				'where'			=> 'users.pmfolders ' . $db->sql_like_expression($db->any_char . '**$%%$5**' . $db->any_char),
			),

			array(
				'target'		=> PRIVMSGS_TABLE,
				'primary'		=> 'privatemessages.pmid',
				'autoincrement'	=> 'msg_id',
				'query_first'	=> array(
					array('target', $convert->truncate_statement . PRIVMSGS_TABLE),
					array('target', $convert->truncate_statement . PRIVMSGS_RULES_TABLE),
				),

				'execute_first'	=> '
					$config["max_post_chars"] = 0;
					$config["min_post_chars"] = 0;
					$config["max_quote_depth"] = 0;
				',

				array('msg_id',					'privatemessages.pmid',				''),
				array('root_level',				0,									''),
				array('author_id',				'privatemessages.fromid AS poster_id',	'phpbb_user_id'),
				array('icon_id',				0,									''),
				array('author_ip',				'',									''),
				array('message_time',			'privatemessages.dateline',			''),
				array('enable_bbcode',			1,									''),
				array('enable_smilies',			'privatemessages.smilieoff',		''),
				array('enable_magic_url',		1,									''),
				array('enable_sig',				'privatemessages.includesig',		''),
				array('message_subject',		'privatemessages.subject',			'phpbb_set_encoding_html'),
				array('message_attachment',		0,									''),
				array('message_edit_reason',	'',									''),
				array('message_edit_user',		0,									''),
				array('message_edit_time',		0,									''),
				array('message_edit_count',		0,									''),

				array('bbcode_uid',				'privatemessages.dateline AS post_time',	'make_uid'),
				array('message_text',			'privatemessages.message',					'phpbb_prepare_message'),
				array('bbcode_bitfield',		'',											'get_bbcode_bitfield'),
				array('to_address',				'privatemessages.recipients',				'mybb_pm_to_recipients'),
				array('bcc_address',			'privatemessages.recipients',				'mybb_pm_bcc_recipients'),

				// Do not include drafts or those in the trash
				'where'			=>	'privatemessages.folder <> 3
										AND privatemessages.folder <> 4
										AND privatemessages.deletetime = 0',
			),

			// Inbox
			array(
				'target'		=> PRIVMSGS_TO_TABLE,
				'primary'		=> 'privatemessages.pmid',
				'query_first'	=> array('target', $convert->truncate_statement . PRIVMSGS_TO_TABLE),

				array('msg_id',					'privatemessages.pmid',					''),
				array('user_id',				'privatemessages.uid',					'phpbb_user_id'),
				array('author_id',				'privatemessages.fromid',				'phpbb_user_id'),
				array('pm_deleted',				0,										''),
				array('pm_new',					'privatemessages.readtime',				'is_empty'),
				array('pm_unread',				'privatemessages.readtime',				'is_empty'),
				array('pm_replied',				0,										''),
				array('pm_marked',				0,										''),
				array('pm_forwarded',			0,										''),
				array('folder_id',				PRIVMSGS_INBOX,							''),

				'where'			=>	'privatemessages.folder = 1
										AND privatemessages.deletetime = 0',
			),

			// Sentbox
			array(
				'target'		=> PRIVMSGS_TO_TABLE,
				'primary'		=> 'privatemessages.pmid',

				array('msg_id',					'privatemessages.pmid',					''),
				array('user_id',				'privatemessages.uid',					'phpbb_user_id'),
				array('author_id',				'privatemessages.fromid',				'phpbb_user_id'),
				array('pm_deleted',				0,										''),
				array('pm_new',					0,										''),
				array('pm_unread',				0,										''),
				array('pm_replied',				0,										''),
				array('pm_marked',				0,										''),
				array('pm_forwarded',			0,										''),
				array('folder_id',				PRIVMSGS_SENTBOX,						''),

				'where'			=>	'privatemessages.folder = 2
										AND privatemessages.deletetime = 0',
			),

			// Custom folders
			array(
				'target'		=> PRIVMSGS_TO_TABLE,
				'primary'		=> 'privatemessages.pmid',

				array('msg_id',					'privatemessages.pmid',					''),
				array('user_id',				'privatemessages.uid',					'phpbb_user_id'),
				array('author_id',				'privatemessages.fromid',				'phpbb_user_id'),
				array('pm_deleted',				0,										''),
				array('pm_new',					'privatemessages.readtime',				'is_empty'),
				array('pm_unread',				'privatemessages.readtime',				'is_empty'),
				array('pm_replied',				0,										''),
				array('pm_marked',				0,										''),
				array('pm_forwarded',			0,										''),
				array('folder_id',				'privatemessages.folder',				'mybb_get_folder_id'),

				'where'			=>	'privatemessages.folder > 4
										AND privatemessages.deletetime = 0',
			),

			array(
				'target'		=> GROUPS_TABLE,
				'autoincrement'	=> 'group_id',
				'query_first'	=> array('target', $convert->truncate_statement . GROUPS_TABLE),

				array('group_id',				'usergroups.gid',					''),
				array('group_type',				'usergroups.type',					'mybb_convert_group_type'),
				array('group_display',			0,									''),
				array('group_legend',			0,									''),
				array('group_name',				'usergroups.title',					'mybb_convert_group_name'), // phpbb_set_encoding called in phpbb_convert_group_name
				array('group_desc',				'usergroups.description',			'phpbb_set_encoding_html'),
			),

			array(
				'target'		=> USER_GROUP_TABLE,
				'primary'		=> 'users.uid',
				'query_first'	=> array('target', $convert->truncate_statement . USER_GROUP_TABLE),
				'execute_first'	=> '
					add_default_groups();
				',

				array('group_id',				'users.usergroup',					''),
				array('user_id',				'users.uid',						'phpbb_user_id'),
				array('',						'users.additionalgroups',			'mybb_insert_additional_groups'),
				array('group_leader',			'groupleaders.lid',					'not_empty'),
				array('user_pending',			0,									''),

				'left_join'		=> 'users LEFT JOIN groupleaders ON (users.uid = groupleaders.uid AND users.usergroup = groupleaders.gid)',
			),

			array(
				'target'		=> USERS_TABLE,
				'primary'		=> 'users.uid',
				'autoincrement'	=> 'user_id',
				'query_first'	=> array(
					array('target', 'DELETE FROM ' . USERS_TABLE . ' WHERE user_id <> ' . ANONYMOUS),
					array('target', $convert->truncate_statement . BOTS_TABLE)
				),

				'execute_last'	=> '
					remove_invalid_users();
				',

				array('user_id',				'users.uid',						'phpbb_user_id'),
				array('',						'users.uid AS poster_id',			'phpbb_user_id'),
				array('user_type',				USER_NORMAL,						''),
				array('group_id',				get_group_id('registered'),			''),
				array('user_regdate',			'users.regdate',					''),
				array('username',				'users.username',					'phpbb_set_encoding_html'), // recode to utf8 with default lang
				array('username_clean',			'users.username',					array('function1' => 'phpbb_set_encoding_html', 'function2' => 'utf8_clean_string')),
				array('user_password',			'users.password',					''),
				array('user_passwd_salt',		'users.salt',						''),
				array('user_pass_convert',		1,									''),
				array('user_posts',				'users.postnum',					'intval'),
				array('user_email',				'users.email',						'strtolower'),
				array('user_email_hash',		'users.email',						'gen_email_hash'),
				array('user_birthday',			'users.birthday',					''),
				array('user_lastvisit',			'users.lastvisit',					'intval'),
				array('user_lastmark',			'users.regdate',					'intval'),
				array('user_lang',				$config['default_lang'],			''),
				array('user_timezone',			'users.timezone',					'floatval'),
				array('user_dateformat',		$config['default_dateformat'],		''),
				array('user_inactive_reason',	0,									''),
				array('user_inactive_time',		0,									''),

				array('user_interests',			'',									''),
				array('user_occ',				'',									''),
				array('user_website',			'users.website',					'validate_website'),
				array('user_jabber',			'',									''),
				array('user_msnm',				'users.msn',						'phpbb_set_encoding'),
				array('user_yim',				'users.yahoo',						'phpbb_set_encoding'),
				array('user_aim',				'users.aim',						'phpbb_set_encoding'),
				array('user_icq',				'users.icq',						array('execute' => '{RESULT} = (!{VALUE}[0]) ? "" : phpbb_set_encoding({VALUE}[0]);')),
				array('user_from',				(USER_FROM_EXISTS) ? 'userfields.fid1' : '', 'phpbb_set_encoding_html'),
				array('user_rank',				0,									''),
				array('user_permissions',		'',									''),

				array('user_avatar',			'users.avatar',						'mybb_import_avatar'),
				array('user_avatar_type',		'users.avatartype',					'mybb_avatar_type'),
				array('user_avatar_width',		'users.avatardimensions',			'mybb_get_avatar_width'),
				array('user_avatar_height',		'users.avatardimensions',			'mybb_get_avatar_height'),

				array('user_new_privmsg',		'users.unreadpms',					''),
				array('user_unread_privmsg',	'users.unreadpms',					''),
				array('user_last_privmsg',		0,									'intval'),
				array('user_emailtime',			'users.regdate',					'null_to_zero'),
				array('user_notify',			'users.subscriptionmethod',			array('execute' => '{RESULT} = ({VALUE}[0] == 2) ? 1 : 0;')),
				array('user_notify_pm',			'users.pmnotify',					'intval'),
				array('user_notify_type',		NOTIFY_EMAIL,						''),
				array('user_allow_pm',			'users.receivepms',					'intval'),
				array('user_allow_viewonline',	'users.invisible',					'is_empty'),
				array('user_allow_viewemail',	'users.hideemail',					'is_empty'),
				array('user_actkey',			'',									''),
				array('user_newpasswd',			'',									''), // Users need to re-request their password...
				array('user_style',				$config['default_style'],			''),

				array('user_options',			'',									'set_user_options'),
				array('',						'users.pmnotice AS popuppm',		''),

				array('user_sig_bbcode_uid',		'users.regdate',								'make_uid'),
				array('user_sig',					'users.signature',								'phpbb_prepare_message'),
				array('user_sig_bbcode_bitfield',	'',												'get_bbcode_bitfield'),
				array('',							'users.regdate AS dateline',					''),

				'left_join'		=> 'users LEFT JOIN userfields ON (users.uid = userfields.ufid)',
			),

			array(
				'target'		=> ZEBRA_TABLE,
				'primary'		=> 'users.uid',
				'query_first'	=> array('target', $convert->truncate_statement . ZEBRA_TABLE),

				array('',						'users.uid',						''),
				array('',						'users.buddylist',					''),
				array('',						'users.ignorelist',					'mybb_insert_zebra'),

				'where'		=> 'users.buddylist <> "" OR users.ignorelist <> ""',
			),
		),
	);
}

?>
