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

if (!defined('IN_PHPBB'))
{
	exit;
}

/**
* Helper functions for MyBB 1.6.x to phpBB 3.0.x conversion
*/

function not_empty($mixed)
{
	return (!empty($mixed)) ? true : false;
}

/**
* Function for recoding text with the default language
*
* @param string $text text to recode to utf8
*/
function phpbb_set_encoding($text)
{
	$encoding = 'utf8';

	return utf8_recode($text, $encoding);
}

/**
* Function for recoding text with the default language and convert special chars to HTML entities.
*
* @param string $text text to recode to utf8
*/
function phpbb_set_encoding_html($text)
{
	return utf8_htmlspecialchars(phpbb_set_encoding($text));
}

/**
* Determine the file extension using the file name.
*/
function mybb_file_ext($filename)
{
	return strtolower(substr(strrchr($filename,'.'), 1));
}

function mybb_has_thumbnail($thumbnail)
{
	return (!$thumbnail || $thumbnail == 'SMALL') ? 0 : 1;
}

function mybb_import_attachment($source)
{
	global $convert_row, $convert;

	$target = phpbb_user_id($convert_row['uid']) . '_' . md5(unique_id());
	import_attachment($source, $target);

	if (mybb_has_thumbnail($convert_row['thumbnail']))
	{
		_import_check('upload_path', $convert_row['thumbnail'], 'thumb_' . $target);
	}

	return $target;
}

function mybb_flag_attachments()
{
	global $db;

	$sql = 'SELECT post_msg_id
		FROM ' . ATTACHMENTS_TABLE . '
		WHERE in_message = 0
		GROUP BY post_msg_id';
	$result = $db->sql_query($sql);
	$post_ids = array();
	$i = 0;

	$sql = 'UPDATE ' . POSTS_TABLE . '
		SET post_attachment = 1
		WHERE ';

	while ($post_id = $db->sql_fetchfield('post_msg_id'))
	{
		$post_ids[] = (int) $post_id;

		if ($i >= 250)
		{
			$db->sql_query($sql . $db->sql_in_set('post_id', $post_ids));
			$post_ids = array();
			$i = 0;
		}
	}

	if (!empty($post_ids))
	{
		$db->sql_query($sql . $db->sql_in_set('post_id', $post_ids));	
	}
}

/**
* Set forum flags - only prune old polls by default
*/
function phpbb_forum_flags()
{
	// Set forum flags
	$forum_flags = 0;

	// FORUM_FLAG_LINK_TRACK
	$forum_flags += 0;

	// FORUM_FLAG_PRUNE_POLL
	$forum_flags += FORUM_FLAG_PRUNE_POLL;

	// FORUM_FLAG_PRUNE_ANNOUNCE
	$forum_flags += 0;

	// FORUM_FLAG_PRUNE_STICKY
	$forum_flags += 0;

	// FORUM_FLAG_ACTIVE_TOPICS
	$forum_flags += 0;

	// FORUM_FLAG_POST_REVIEW
	$forum_flags += FORUM_FLAG_POST_REVIEW;

	return $forum_flags;
}

function mybb_get_absolute_path($path)
{
	global $convert;

	$current_path = getcwd();
	chdir($convert->options['forum_path']);
	$path = realpath($path);
	chdir($current_path);
	return $path;
}

function mybb_set_config_values()
{
	set_config('allow_avatar', true);
	set_config('allow_avatar_local', true);
	set_config('allow_avatar_remote', true);
	set_config('allow_avatar_upload', true);
}

function mybb_get_config_path_value($key)
{
	return mybb_get_absolute_path(get_config_value($key)) . '/';
}

function mybb_max_avatar_height($dimensions)
{
	$dimensions = explode('x', $dimensions);
	return trim($dimensions[1]);
}

function mybb_max_avatar_width($dimensions)
{
	$dimensions = explode('x', $dimensions);
	return trim($dimensions[0]);
}

function mybb_smtp_delivery($handler)
{
	return ($handler == 'smtp') ? 1 : 0;
}

/**
* Calculate the left right id's for forums. This is a recursive function.
*/
function mybb_left_right_ids($groups, $parent_id, &$forums, &$node)
{
	foreach ($groups[$parent_id] as $forum_id)
	{
		$forums[$forum_id]['left_id'] = $node++;

		if (!empty($groups[$forum_id]))
		{
			mybb_left_right_ids($groups, $forum_id, $forums, $node);
		}

		$forums[$forum_id]['right_id'] = $node++;
	}
}

/**
* Insert/Convert forums
*/
function phpbb_insert_forums()
{
	global $db, $src_db, $same_db, $convert, $user, $config;

	$db->sql_query($convert->truncate_statement . FORUMS_TABLE);

	$sql = 'SELECT fid, name, description, linkto, type, pid, disporder, password, open, allowpicons 
		FROM ' . $convert->src_table_prefix . 'forums
		ORDER BY disporder, fid';

	if ($convert->mysql_convert && $same_db)
	{
		$src_db->sql_query("SET NAMES 'binary'");
	}

	$result = $src_db->sql_query($sql);

	if ($convert->mysql_convert && $same_db)
	{
		$src_db->sql_query("SET NAMES 'utf8'");
	}

	$forums = $forum_groups = $last_topics = array();

	while ($row = $src_db->sql_fetchrow($result))
	{
		$forums[$row['fid']] = $row;
		$forum_groups[$row['pid']][] = $row['fid']; 
	}
	$db->sql_freeresult($result);

	$node = 1;
	mybb_left_right_ids($forum_groups, 0, $forums, $node);

	foreach ($forums as $forum_id => $row)
	{
		$forum_type = FORUM_POST;

		if ($row['type'] == 'c')
		{
			$forum_type = FORUM_CAT;
		}
		else if ($row['linkto'])
		{
			$forum_type = FORUM_LINK;
		}

		// Define the new forums sql ary
		$sql_ary = array(
			'forum_id'			=> (int) $row['fid'],
			'forum_name'		=> htmlspecialchars(phpbb_set_encoding($row['name']), ENT_COMPAT, 'UTF-8'),
			'parent_id'			=> (int) $row['pid'],
			'forum_parents'		=> '',
			'forum_desc'		=> htmlspecialchars(phpbb_set_encoding($row['description']), ENT_COMPAT, 'UTF-8'),
			'forum_type'		=> $forum_type,
			'forum_status'		=> ($row['open']) ? ITEM_UNLOCKED : ITEM_LOCKED,
			'forum_password'	=> ($row['password']) ? phpbb_hash($row['password']) : '',
			'forum_link'		=> $row['linkto'],
			'left_id'			=> $row['left_id'],
			'right_id'			=> $row['right_id'],
			'enable_icons'		=> $row['allowpicons'],
			'enable_prune'		=> 0,
			'prune_next'		=> 0,
			'prune_days'		=> 0,
			'prune_viewed'		=> 0,
			'prune_freq'		=> 0,

			'forum_flags'		=> phpbb_forum_flags(),
			'forum_options'		=> 0,

			// Default values
			'forum_desc_bitfield'		=> '',
			'forum_desc_options'		=> 7,
			'forum_desc_uid'			=> '',
			'forum_style'				=> 0,
			'forum_image'				=> '',
			'forum_rules'				=> '',
			'forum_rules_link'			=> '',
			'forum_rules_bitfield'		=> '',
			'forum_rules_options'		=> 7,
			'forum_rules_uid'			=> '',
			'forum_topics_per_page'		=> 0,
			'forum_posts'				=> 0,
			'forum_topics'				=> 0,
			'forum_topics_real'			=> 0,
			'display_on_index'			=> 1,
			'enable_indexing'			=> 1,
		);

		$sql = 'INSERT INTO ' . FORUMS_TABLE . ' ' . $db->sql_build_array('INSERT', $sql_ary);
		$db->sql_query($sql);
	}

	switch ($db->sql_layer)
	{
		case 'postgres':
			$db->sql_query("SELECT SETVAL('" . FORUMS_TABLE . "_seq',(select case when max(forum_id)>0 then max(forum_id)+1 else 1 end from " . FORUMS_TABLE . '));');
		break;

		case 'mssql':
		case 'mssql_odbc':
		case 'mssqlnative':
			$db->sql_query('SET IDENTITY_INSERT ' . FORUMS_TABLE . ' OFF');
		break;

		case 'oracle':
			$result = $db->sql_query('SELECT MAX(forum_id) as max_id FROM ' . FORUMS_TABLE);
			$row = $db->sql_fetchrow($result);
			$db->sql_freeresult($result);

			$largest_id = (int) $row['max_id'];

			if ($largest_id)
			{
				$db->sql_query('DROP SEQUENCE ' . FORUMS_TABLE . '_seq');
				$db->sql_query('CREATE SEQUENCE ' . FORUMS_TABLE . '_seq START WITH ' . ($largest_id + 1));
			}
		break;
	}
}

function mybb_set_last_posts()
{
	global $src_db, $db, $convert;

	$sql = 'SELECT lastposttid
		FROM ' . $convert->src_table_prefix . 'forums';
	$result = $src_db->sql_query($sql);
	$topics = array();

	while ($row = $src_db->sql_fetchrow($result))
	{
		$topics[] = (int) $row['lastposttid'];
	}
	$src_db->sql_freeresult($result);

	// Update the last post id of the newest topic in each forum to ensure that
	// the last post info for forums is correct when the resync occurs at the end.
	$sql = 'SELECT MAX(pid) AS post_id, tid
		FROM ' . $convert->src_table_prefix . 'posts
		WHERE ' . $src_db->sql_in_set('tid', $topics) . '
		GROUP BY tid';
	$result = $src_db->sql_query($sql);

	while ($row = $src_db->sql_fetchrow($result))
	{
		$sql = 'UPDATE ' . TOPICS_TABLE . '
			SET topic_last_post_id = ' . (int) $row['post_id'] . '
			WHERE topic_id = ' . (int) $row['tid'];
		$db->sql_query($sql);
	}
	$src_db->sql_freeresult($result);
}

function mybb_close_extraneous_reports()
{
	global $db;

	// Grab the latest report for reported posts.
	$sql = 'SELECT MAX(report_id) AS report_id, post_id
		FROM ' . REPORTS_TABLE . '
		WHERE report_closed = 0
			AND post_id <> 0
		GROUP BY post_id';
	$result = $db->sql_query($sql);

	$open_reports = array();

	while ($row = $db->sql_fetchrow($result))
	{
		$open_reports[] = (int) $row['report_id'];
	}
	$db->sql_freeresult($result);

	if (!empty($open_reports))
	{
		// Close all other reports
		$sql = 'UPDATE ' . REPORTS_TABLE . '
			SET report_closed = 1
			WHERE post_id <> 0
				AND report_closed = 0
				AND ' . $db->sql_in_set('report_id', $open_reports, true);
		$db->sql_query($sql);
	}
}

function mybb_import_smiley($source)
{
	return import_smiley(mybb_get_absolute_path($source));
}

function mybb_import_icon($source)
{
	$result = _import_check('icons_path', mybb_get_absolute_path($source), false);
	return $result['target'];
}

function mybb_icon_width($source)
{
	return mybb_icon_dim($source, 0);
}

function mybb_icon_height($source)
{
	return mybb_icon_dim($source, 1);
}

function mybb_icon_dim($source, $axis)
{
	static $cache;

	$source = mybb_get_absolute_path($source);

	if (empty($cache[$source]))
	{
		global $convert;

		$cache[$source] = get_image_dim($source);
	}
	return $cache[$source][$axis];
}

/**
* Return correct user id value
* Everyone's id will be one higher to allow the guest/anonymous user to have a positive id as well
*/
function phpbb_user_id($user_id)
{
	global $config;

	// Increment user id if the old forum is having a user with the id 1
	if (!isset($config['increment_user_id']))
	{
		global $src_db, $same_db, $convert;

		if ($convert->mysql_convert && $same_db)
		{
			$src_db->sql_query("SET NAMES 'binary'");
		}

		// Now let us set a temporary config variable for user id incrementing
		$sql = "SELECT uid
			FROM {$convert->src_table_prefix}users
			WHERE uid = 1";
		$result = $src_db->sql_query($sql);
		$id = (int) $src_db->sql_fetchfield('uid');
		$src_db->sql_freeresult($result);

		// Try to get the maximum user id possible...
		$sql = "SELECT MAX(uid) AS max_user_id
			FROM {$convert->src_table_prefix}users";
		$result = $src_db->sql_query($sql);
		$max_id = (int) $src_db->sql_fetchfield('max_user_id');
		$src_db->sql_freeresult($result);

		if ($convert->mysql_convert && $same_db)
		{
			$src_db->sql_query("SET NAMES 'utf8'");
		}

		// If there is a user id 1, we need to increment user ids. :/
		if ($id === 1)
		{
			set_config('increment_user_id', ($max_id + 1), true);
			$config['increment_user_id'] = $max_id + 1;
		}
		else
		{
			set_config('increment_user_id', 0, true);
			$config['increment_user_id'] = 0;
		}
	}

	// If the old user id is -1 in 2.0.x it is the anonymous user...
	if ($user_id == -1)
	{
		return ANONYMOUS;
	}

	if (!empty($config['increment_user_id']) && $user_id == 1)
	{
		return $config['increment_user_id'];
	}

	// A user id of 0 can happen, for example within the ban table if no user is banned...
	// Within the posts and topics table this can be "dangerous" but is the fault of the user
	// having mods installed (a poster id of 0 is not possible in 2.0.x).
	// Therefore, we return the user id "as is".

	return (int) $user_id;
}

/**
* Convert authentication
* user, group and forum table has to be filled in order to work
*/
function phpbb_convert_authentication($mode)
{
	global $db, $src_db, $same_db, $convert, $phpbb_root_path, $phpEx;

	if ($mode == 'start')
	{
		$db->sql_query($convert->truncate_statement . ACL_USERS_TABLE);
		$db->sql_query($convert->truncate_statement . ACL_GROUPS_TABLE);

		// Grab users with admin permissions
		$sql = "SELECT uid, permissions
			FROM {$convert->src_table_prefix}adminoptions
			WHERE uid >= 1";
		$result = $src_db->sql_query($sql);
		$admins = $founders = array();

		while ($row = $src_db->sql_fetchrow($result))
		{
			$user_id = (int) phpbb_user_id($row['uid']);
			$permissions = unserialize($row['permissions']);
			$admins[] = $user_id;

			if ($permissions['user']['admin_permissions'])
			{
				$founders[] = $user_id;
			} 
		}
		$src_db->sql_freeresult($result);

		// We'll set the users that can manage admin permissions as founders.
		$sql = 'UPDATE ' . USERS_TABLE . '
			SET user_type = ' . USER_FOUNDER . "
			WHERE " . $db->sql_in_set('user_id', $founders);
		$db->sql_query($sql);

		$bot_group_id = get_group_id('bots');

		user_group_auth('guests', 'SELECT user_id, {GUESTS} FROM ' . USERS_TABLE . ' WHERE user_id = ' . ANONYMOUS, false);
		user_group_auth('registered', 'SELECT user_id, {REGISTERED} FROM ' . USERS_TABLE . ' WHERE user_id <> ' . ANONYMOUS . " AND group_id <> $bot_group_id", false);

		$auth_sql = 'SELECT user_id, {ADMINISTRATORS} FROM ' . USERS_TABLE . ' WHERE ' . $db->sql_in_set('user_id', $admins);
		user_group_auth('administrators', $auth_sql, false);

		$auth_sql = 'SELECT user_id, {GLOBAL_MODERATORS} FROM ' . USERS_TABLE . ' WHERE ' . $db->sql_in_set('user_id', $admins);
		user_group_auth('global_moderators', $auth_sql, false);

		if (!function_exists('group_set_user_default'))
		{
			include($phpbb_root_path . 'includes/functions_user.' . $phpEx);
		}

		// Set the admin group as their default group.
		group_set_user_default(get_group_id('administrators'), $admins);
	}
	else if ($mode == 'first')
	{
		// Assign permission roles and other default permissions

		// guests having u_download and u_search ability
		$db->sql_query('INSERT INTO ' . ACL_GROUPS_TABLE . ' (group_id, forum_id, auth_option_id, auth_role_id, auth_setting) SELECT ' . get_group_id('guests') . ', 0, auth_option_id, 0, 1 FROM ' . ACL_OPTIONS_TABLE . " WHERE auth_option IN ('u_', 'u_download', 'u_search')");

		// administrators/global mods having full user features
		mass_auth('group_role', 0, 'administrators', 'USER_FULL');
		mass_auth('group_role', 0, 'global_moderators', 'USER_FULL');

		// By default all converted administrators are given full access
		mass_auth('group_role', 0, 'administrators', 'ADMIN_FULL');

		// All registered users are assigned the standard user role
		mass_auth('group_role', 0, 'registered', 'USER_STANDARD');
		mass_auth('group_role', 0, 'registered_coppa', 'USER_STANDARD');

		// Instead of administrators being global moderators we give the MOD_FULL role to global mods (admins already assigned to this group)
		mass_auth('group_role', 0, 'global_moderators', 'MOD_FULL');
	}
}

/**
* Convert the group name, making sure to avoid conflicts with 3.0 special groups
*/
function mybb_convert_group_name($group_name)
{
	$default_groups = array(
		'GUESTS',
		'REGISTERED',
		'REGISTERED_COPPA',
		'GLOBAL_MODERATORS',
		'ADMINISTRATORS',
		'BOTS',
	);

	if (in_array(strtoupper($group_name), $default_groups))
	{
		return 'MyBB - ' . $group_name;
	}

	return phpbb_set_encoding_html($group_name);
}

/**
* Convert the group type constants
*/
function mybb_convert_group_type($group_type)
{
	switch ($group_type)
	{
		case 1:
		case 2:
			return GROUP_CLOSED;
		break;

		case 3:
			return GROUP_FREE;
		break;

		case 4:
			return GROUP_OPEN;
		break;
	}

	// Never return GROUP_SPECIAL here, because only phpBB3's default groups are allowed to have this type set.
	return GROUP_HIDDEN;
}

function mybb_draft_topic_id($topic_id)
{
	global $convert_row;

	// Check if this a topic draft.
	return (int) ($convert_row['visible'] == -2) ? 0 : $topic_id;
}

function mybb_real_replies($unapproved)
{
	global $convert_row;

	return $convert_row['replies'] + $unapproved;
}

function mybb_topic_status($closed)
{
	if ($closed === '1')
	{
		return ITEM_LOCKED;
	}
	else if (strpos($closed, 'moved') === 0)
	{
		return ITEM_MOVED;
	}
	return ITEM_UNLOCKED;
}

function mybb_topic_moved_id($info)
{
	if (strpos($info, 'moved') === false)
	{
		return 0;
	}
	return (int) str_replace('moved|', '', $info);
}

/**
* Convert the topic type constants
*/
function mybb_convert_topic_type($sticky)
{
	return ($sticky) ? POST_STICKY : POST_NORMAL;
}

function mybb_poll_length($days)
{
	$days = (int) $days;
	return $days * 86400;
}

function mybb_insert_poll_options($options)
{
	global $convert_row, $db;

	if (!$options)
	{
		return;
	}

	$options = explode('||~|~||', $options);
	$options = array_map('phpbb_set_encoding_html', $options);
	$votes = explode('||~|~||', $convert_row['votes']);
	$votes = array_map('intval', $votes);
	$options = array_combine($options, $votes);

	$sql_ary = array();
	$id = 1;

	foreach ($options as $option => $total_votes)
	{
		$sql_ary[] = array(
			'poll_option_id'	=> $id,
			'topic_id'			=> (int) $convert_row['tid'],
			'poll_option_text'	=> $option,
			'poll_option_total'	=> $total_votes,
		);
		$id++;
	}
	$db->sql_multi_insert(POLL_OPTIONS_TABLE, $sql_ary);
}

function mybb_word_replacement($replacement)
{
	global $convert_row;

	if ($replacement)
	{
		return phpbb_set_encoding_html($replacement);
	}
	return str_repeat('*', strlen($convert_row['badword']));
}

/**
* Reformat inline attachment bbcode to the proper phpBB format.
*/
function mybb_reformat_inline_attach(&$message, $post_id)
{
	global $src_db, $convert, $same_db;

	// Do a simple check for the presence of inline attachments.
	if (strpos($message, '[attachment=') !== false)
	{
		if ($convert->mysql_convert && $same_db)
		{
			$src_db->sql_query("SET NAMES 'binary'");
		}

		// The open tag is the same as phpBB's, so temporarily replace it to avoid replacements occurring more than once.
		$message = str_replace('[attachment=', '[ATTACH=', $message);

		// We need to grab some info from the database :-/
		$sql = 'SELECT aid, filename
			FROM ' . $convert->src_table_prefix . 'attachments
			WHERE pid = ' . (int) $post_id . '
			ORDER BY aid DESC';
		$result = $src_db->sql_query($sql);
		$i = 0;

		while ($row = $src_db->sql_fetchrow($result))
		{
			$find = "[ATTACH={$row['aid']}]";
			$replace = '[attachment=' . $i . ']' . $row['filename'] . '[/attachment]';

			$message = str_replace($find, $replace, $message);
			$i++;
		}
		$src_db->sql_freeresult($result);

		// Change back any that weren't replaced.
		$message = str_replace('[ATTACH=', '[attachment=', $message);

		if ($convert->mysql_convert && $same_db)
		{
			$src_db->sql_query("SET NAMES 'utf8'");
		}
	}
}

function mybb_fix_size_bbcode($match)
{
	$sizes = array(
		'xx-small'	=> 70,
		'x-small'	=> 75,
		'small'		=> 100,
		'medium'	=> 125,
		'large'		=> 140,
		'x-large'	=> 190,
		'xx-large'	=> 200,
	);

	if (!isset($sizes[$match[1]]))
	{
		return $match[2];
	}
	return '[size=' . $sizes[$match[1]] . ']' . $match[2] . '[/size]';
}

/**
* Wrap smiley codes with space so phpBB can parse them correctly.
*/
function mybb_reformat_smilies(&$message)
{
	global $convert, $src_db, $same_db;
	static $smilies;

	if ($smilies === null)
	{
		if ($convert->mysql_convert && $same_db)
		{
			$src_db->sql_query("SET NAMES 'binary'");
		}

		$sql = 'SELECT find
			FROM ' . $convert->src_table_prefix . 'smilies';
		$result = $src_db->sql_query($sql);
		$smilies = array();

		while ($row = $src_db->sql_fetchrow($result))
		{
			$smilies[] = $row['find'];
		}
		$src_db->sql_freeresult($result);

		if (empty($smilies))
		{
			return;
		}

		$smilies = array_map('trim', $smilies);
		$smilies = array_combine($smilies, $smilies);
		$smilies = array_map('mybb_pad_smiley', $smilies);

		if ($convert->mysql_convert && $same_db)
		{
			$src_db->sql_query("SET NAMES 'utf8'");
		}
	}
	else if (!empty($smilies))
	{
		$message = strtr($message, $smilies);
	}
}

/**
* Wrap smiley code with space.
*/
function mybb_pad_smiley($smiley)
{
	return " $smiley ";
}

/**
* Reparse the message stripping out the bbcode_uid values and adding new ones and setting the bitfield
*/
function phpbb_prepare_message($message)
{
	global $db, $convert, $user, $convert_row, $message_parser;

	if (!$message || !empty($convert_row['is_duplicate']))
	{
		$convert->row['mp_bbcode_bitfield'] = $convert_row['mp_bbcode_bitfield'] = 0;
		return '';
	}

	if (!empty($convert_row['pid']))
	{
		mybb_reformat_inline_attach($message, $convert_row['pid']);
	}

	mybb_reformat_smilies($message);

	$message = preg_replace_callback('#\[size=(.*?)\](.*?)\[/size\]#s', 'mybb_fix_size_bbcode', $message);

	$bbcodes = array(
		"#\[quote='(.*?)'(?:.*?)\]#i"	=> '[quote=&quot;\\1&quot;]',
	);
	$message = preg_replace(array_keys($bbcodes), $bbcodes, $message);

	$bbcodes = array(
		'[php]'		=> '[code=php]',
		'[/php]'	=> '[/code]',
		'[hr]'		=> '[hr][/hr]',
	);

	$message = str_replace(array_keys($bbcodes), $bbcodes, $message);

	$message = str_replace('<br />', "\n", $message);
	$message = str_replace('<', '&lt;', $message);
	$message = str_replace('>', '&gt;', $message);

	// make the post UTF-8
	$message = phpbb_set_encoding($message);

	$message_parser->warn_msg = array(); // Reset the errors from the previous message
	$message_parser->bbcode_uid = make_uid($convert->row['dateline']);
	$message_parser->message = $message;
	unset($message);

	// Make sure options are set.
	$enable_bbcode = true;
	$enable_smilies = (!isset($convert->row['smilieoff'])) ? true : !$convert->row['smilieoff'];
	$enable_magic_url = true;

	// parse($allow_bbcode, $allow_magic_url, $allow_smilies, $allow_img_bbcode = true, $allow_flash_bbcode = true, $allow_quote_bbcode = true, $allow_url_bbcode = true, $update_this_message = true, $mode = 'post')
	$message_parser->parse($enable_bbcode, $enable_magic_url, $enable_smilies);

	if (sizeof($message_parser->warn_msg))
	{
		$msg_id = isset($convert->row['post_id']) ? $convert->row['post_id'] : $convert->row['privmsgs_id'];
		$convert->p_master->error('<span style="color:red">' . $user->lang['POST_ID'] . ': ' . $msg_id . ' ' . $user->lang['CONV_ERROR_MESSAGE_PARSER'] . ': <br /><br />' . implode('<br />', $message_parser->warn_msg), __LINE__, __FILE__, true);
	}

	$convert->row['mp_bbcode_bitfield'] = $convert_row['mp_bbcode_bitfield'] = $message_parser->bbcode_bitfield;

	$message = $message_parser->message;
	unset($message_parser->message);

	return $message;
}

/**
* Return the bitfield calculated by the previous function
*/
function get_bbcode_bitfield()
{
	global $convert_row;

	return $convert_row['mp_bbcode_bitfield'];
}

/**
* Convert the avatar type constants
*/
function mybb_avatar_type($type)
{
	switch ($type)
	{
		case 'upload':
			return AVATAR_UPLOAD;
		break;

		case 'remote':
			return AVATAR_REMOTE;
		break;

		case 'gallery':
			return AVATAR_GALLERY;
		break;
	}

	return 0;
}


/**
* Just undos the replacing of '<' and '>'
*/
function phpbb_smilie_html_decode($code)
{
	$code = str_replace('&lt;', '<', $code);
	return str_replace('&gt;', '>', $code);
}

/**
* Transfer avatars, copying the image if it was uploaded
*/
function mybb_import_avatar($user_avatar)
{
	global $convert_row, $convert;

	if ($user_avatar)
	{
		$user_avatar = substr($user_avatar, 0, strpos($user_avatar, '?dateline='));
	}

	if (!$convert_row['avatartype'])
	{
		return '';
	}
	else if ($convert_row['avatartype'] == 'upload')
	{
		// Uploaded avatar
		$user_avatar = mybb_get_absolute_path($user_avatar);
		return import_avatar($user_avatar, false, phpbb_user_id($convert_row['uid']));
	}
	else if ($convert_row['avatartype'] == 'remote')
	{
		// Remote avatar
		return $user_avatar;
	}
	else if ($convert_row['avatartype'] == 'gallery')
	{
		// Gallery avatar
		$source = mybb_get_absolute_path($user_avatar);
		return str_replace($convert->convertor['avatar_gallery_path'], '', $source);
	}

	return '';
}


/**
* Find out about the avatar's dimensions
*/
function mybb_get_avatar_height($dimensions)
{
	if (!$dimensions)
	{
		return 0;
	}
	$dimensions = explode('|', $dimensions);
	return (int) $dimensions[1];
}


/**
* Find out about the avatar's dimensions
*/
function mybb_get_avatar_width($dimensions)
{
	if (!$dimensions)
	{
		return 0;
	}
	$dimensions = explode('|', $dimensions);
	return (int) $dimensions[0];
}

function mybb_insert_custom_folders($folders)
{
	global $convert_row, $db;

	$folders = explode('$%%$', $folders);
	$insert_ary = array();

	foreach ($folders as $folder)
	{
		if (!$folder)
		{
			continue;
		}
		$info = explode('**', $folder);
		$folder_id = (int) $info[0];

		if ($folder_id < 5 || empty($info[1]))
		{
			continue;
		}
		$insert_ary[] = array(
			'user_id'		=> phpbb_user_id($convert_row['uid']),
			'folder_name'	=> phpbb_set_encoding($info[1]),
			'pm_count'		=> 0,
		);
	}

	if (!empty($insert_ary))
	{
		$db->sql_multi_insert(PRIVMSGS_FOLDER_TABLE, $insert_ary);
	}
}

function mybb_get_folder_id($folder)
{
	global $db, $convert_row;
	static $cache;

	$user_id = phpbb_user_id($convert_row['uid']);
	$folder = (int) $folder;

	if (isset($cache[$user_id][$folder]))
	{
		return $cache[$user_id][$folder];
	}

	$sql = 'SELECT folder_id
		FROM ' . PRIVMSGS_FOLDER_TABLE . '
		WHERE user_id = ' . $user_id . '
		ORDER BY folder_id ASC';
	$result = $db->sql_query($sql);
	$i = 5;

	while ($folder_id = $db->sql_fetchfield('folder_id'))
	{
		$cache[$user_id][$i] = (int) $folder_id;
		$i++;
	}
	$db->sql_freeresult($result);

	if (isset($cache[$user_id][$folder]))
	{
		return $cache[$user_id][$folder];
	}
	return PRIVMSGS_INBOX;
}

function mybb_check_duplicate_pm()
{
	global $convert_row;
	static $cache;

	$id = $convert_row['poster_id'] . '_' . $convert_row['dateline'];

	if (isset($cache[$id]))
	{
		$convert_row['is_duplicate'] = 1;
		return 1;
	}
	$cache[$id] = 1;

	return 0;
}

/**
* Calculate the correct to_address field for private messages
*/
function mybb_pm_to_recipients($recipients)
{
	return mybb_pm_recipients($recipients, 'to');
}

function mybb_pm_bcc_recipients($recipients)
{
	return mybb_pm_recipients($recipients, 'bcc');
}

function mybb_pm_recipients($recipients, $var)
{
	$recipients = unserialize($recipients);

	if (empty($recipients[$var]))
	{
		return '';
	}
	$to = array();

	foreach ($recipients[$var] as $user_id)
	{
		$to[] = 'u_' . phpbb_user_id($user_id);
	}

	return implode(':', $to);	
}


/**
* Adjust disallowed names to phpBB format
*/
function mybb_disallowed_username($username)
{
	// Replace * with %
	$username = phpbb_set_encoding(str_replace('*', '%', $username));
	return utf8_htmlspecialchars($username);
}

function mybb_insert_additional_groups($groups)
{
	global $db, $convert_row;

	if (!$groups)
	{
		return;
	}

	$user_id = phpbb_user_id($convert_row['uid']);
	$groups = explode(',', $groups);
	$insert_ary = array();

	foreach ($groups as $group_id)
	{
		$insert_ary[] = array(
			'group_id'		=> (int) $group_id,
			'user_id'		=> $user_id,
			'group_leader'	=> 0,
			'user_pending'	=> 0,
		);
	}

	if (!empty($insert_ary))
	{
		$db->sql_multi_insert(USER_GROUP_TABLE, $insert_ary);
	}
}

function mybb_insert_zebra($foes)
{
	global $convert_row;

	$user_id = phpbb_user_id($convert_row['uid']);
	mybb_insert_zebra_rows($foes, false, $user_id);
	mybb_insert_zebra_rows($convert_row['buddylist'], true, $user_id);
}

function mybb_insert_zebra_rows($list, $friend, $user_id)
{
	global $db;

	if (!$list)
	{
		return;
	}
	$list = explode(',', $list);
	$insert_ary = array();

	foreach ($list as $zebra_id)
	{
		$insert_ary[] = array(
			'user_id'	=> $user_id,
			'zebra_id'	=> phpbb_user_id($zebra_id),
			'friend'	=> $friend,
			'foe'		=> !$friend,
		);
	}
	$db->sql_multi_insert(ZEBRA_TABLE, $insert_ary);
}

/**
* Create temporary conversion table to store info about colliding usernames.
*/
function phpbb_create_userconv_table()
{
	global $db, $phpbb_root_path, $phpEx;

	if (!class_exists('phpbb_db_tools'))
	{
		include($phpbb_root_path . 'includes/db/db_tools.' . $phpEx);
	}

	// create a temporary table in which we store the clean usernames
	$db->sql_return_on_error(true);
	$db->sql_query('DROP TABLE ' . USERCONV_TABLE);
	$db->sql_return_on_error(false);
	
	$db_tools = new phpbb_db_tools($db);
	$db_tools->sql_create_table(USERCONV_TABLE, array(
		'COLUMNS' => array(
			'user_id'			=> array('UINT', 0),
			'username_clean'	=> array('VCHAR_CI', ''),
		),
	));
}

/**
* Check whether the location field exists.
*/
function mybb_user_from_col_exists()
{
	global $src_db, $convert, $phpbb_root_path, $phpEx;

	if (!class_exists('phpbb_db_tools'))
	{
		include($phpbb_root_path . 'includes/db/db_tools.' . $phpEx);
	}
	$db_tools = new phpbb_db_tools($src_db);

	return $db_tools->sql_column_exists($convert->src_table_prefix . 'userfields', 'fid1');
}

/**
* Add password salt field to the users table.
*/
function mybb_add_user_salt_field()
{
	global $db, $phpbb_root_path, $phpEx;

	if (!class_exists('phpbb_db_tools'))
	{
		include($phpbb_root_path . 'includes/db/db_tools.' . $phpEx);
	}

	$schema_changes = array(
		'add_columns'	=> array(
			USERS_TABLE	 => array(
				'user_passwd_salt'	=> array('VCHAR:10', ''),
			)
		)
	);

	$db_tools = new phpbb_db_tools($db);
	$db_tools->perform_schema_changes($schema_changes);
}

/**
* Create additional needed bbcodes so we can correctly transfer post formats
*/
function mybb_create_bbcodes()
{
	global $db, $phpbb_root_path, $phpEx;

	$templates = array(
		'[align={SIMPLETEXT}]{TEXT}[/align]'	=> '<div style="text-align: {SIMPLETEXT};">{TEXT}</div>',
		'[font={SIMPLETEXT}]{TEXT}[/font]'		=> '<span style="font-family: {SIMPLETEXT};">{TEXT}</span>',
		'[hr][/hr]'								=> '<hr />',
	);

	if (!class_exists('acp_bbcodes'))
	{
		include($phpbb_root_path . 'includes/acp/acp_bbcodes.' . $phpEx);
	}

	$bbcode = new acp_bbcodes();
	$bbcode_settings = array();

	// Get the bbcode regex
	foreach ($templates as $match => $tpl)
	{
		$settings = $bbcode->build_regexp($match, $tpl);

		$bbcode_settings[$settings['bbcode_tag']] = array_merge($settings, array(
			'bbcode_match'			=> $match,
			'bbcode_tpl'			=> $tpl,
			'display_on_posting'	=> 1,
			'bbcode_helpline'		=> '',
		));
	}

	$sql = 'SELECT MAX(bbcode_id) AS max_bbcode_id
		FROM ' . BBCODES_TABLE;
	$result = $db->sql_query($sql);
	$max_bbcode_id = (int) $db->sql_fetchfield('max_bbcode_id');
	$db->sql_freeresult($result);

	if ($max_bbcode_id)
	{
		$sql = 'SELECT bbcode_tag
			FROM ' . BBCODES_TABLE . '
			WHERE ' . $db->sql_in_set('bbcode_tag', array_keys($bbcode_settings));
		$result = $db->sql_query($sql);

		while ($row = $db->sql_fetchrow($result))
		{
			unset($bbcode_settings[$row['bbcode_tag']]);
		}
		$db->sql_freeresult($result);
	}
	else
	{
		$max_bbcode_id = NUM_CORE_BBCODES;
	}

	if (!empty($bbcode_settings))
	{
		// Reset the keys so that sql_multi_insert works...
		$bbcode_settings = array_values($bbcode_settings);

		foreach ($bbcode_settings as $index => $bbcode)
		{
			$bbcode_settings[$index]['bbcode_id'] = ++$max_bbcode_id;
		}
		$db->sql_multi_insert(BBCODES_TABLE, $bbcode_settings);
	}
}

function phpbb_check_username_collisions()
{
	global $db, $src_db, $convert, $table_prefix, $user, $lang;

	// now find the clean version of the usernames that collide
	$sql = 'SELECT username_clean
		FROM ' . USERCONV_TABLE .'
		GROUP BY username_clean
		HAVING COUNT(user_id) > 1';
	$result = $db->sql_query($sql);

	$colliding_names = array();
	while ($row = $db->sql_fetchrow($result))
	{
		$colliding_names[] = $row['username_clean'];
	}
	$db->sql_freeresult($result);

	// there was at least one collision, the admin will have to solve it before conversion can continue
	if (sizeof($colliding_names))
	{
		$sql = 'SELECT user_id, username_clean
			FROM ' . USERCONV_TABLE . '
			WHERE ' . $db->sql_in_set('username_clean', $colliding_names);
		$result = $db->sql_query($sql);
		unset($colliding_names);

		$colliding_user_ids = array();
		while ($row = $db->sql_fetchrow($result))
		{
			$colliding_user_ids[(int) $row['user_id']] = $row['username_clean'];
		}
		$db->sql_freeresult($result);

		$sql = 'SELECT username, uid, postnub
			FROM ' . $convert->src_table_prefix . 'users
			WHERE ' . $src_db->sql_in_set('uid', array_keys($colliding_user_ids));
		$result = $src_db->sql_query($sql);

		$colliding_users = array();
		while ($row = $src_db->sql_fetchrow($result))
		{
			$row['user_id'] = (int) $row['id'];
			if (isset($colliding_user_ids[$row['user_id']]))
			{
				$colliding_users[$colliding_user_ids[$row['user_id']]][] = $row;
			}
		}
		$src_db->sql_freeresult($result);
		unset($colliding_user_ids);

		$list = '';
		foreach ($colliding_users as $username_clean => $users)
		{
			$list .= sprintf($user->lang['COLLIDING_CLEAN_USERNAME'], $username_clean) . "<br />\n";
			foreach ($users as $i => $row)
			{
				$list .= sprintf($user->lang['COLLIDING_USER'], $row['user_id'], phpbb_set_encoding($row['username']), $row['numposts']) . "<br />\n";
			}
		}

		$lang['INST_ERR_FATAL'] = $user->lang['CONV_ERR_FATAL'];
		$convert->p_master->error('<span style="color:red">' . $user->lang['COLLIDING_USERNAMES_FOUND'] . '</span></b><br /><br />' . $list . '<b>', __LINE__, __FILE__);
	}

	$drop_sql = 'DROP TABLE ' . USERCONV_TABLE;
	$db->sql_query($drop_sql);
}

?>
