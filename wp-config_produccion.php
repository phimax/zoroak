<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'u693641806_wpbd');

/** MySQL database username */
define('DB_USER', 'u693641806_wpuse');

/** MySQL database password */
define('DB_PASSWORD', 'uehFcZXAsN');

/** MySQL hostname */
define('DB_HOST', 'mysql.hostinger.es');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '7BY+ *ThsxU<=|pa/f|6Y|-|<~EcA| B+edg*~l76(y,y|O1b4B:6{j{$?t^kK>j');
define('SECURE_AUTH_KEY',  '&FUx=I @c/H<%{{yvv9oH4C_f/}EL8RU/eC*X@?bw4UI2v&rHk>2tCa@JLo^ekWz');
define('LOGGED_IN_KEY',    '`vNK|48O2nH}OVG |p3|W-k%@&z!U0D+Q%4XFi84j2*YQ8NoUE,dv$I;k=1CC3;U');
define('NONCE_KEY',        '4~?{:.4kUt9M6_TvOpK4L47p0}s-(05|GC)KY54V;=-bih;W-yMl:-oI.W3)hP|Q');
define('AUTH_SALT',        'tJk,SV?G2{:8aiLB+FMcLF )Ch^IP.B{s?b<b/Zj;-<o|TgLkc/s;s&)e>AiX(x}');
define('SECURE_AUTH_SALT', 'q>.dZ8P+!0+4BAu-Se*shj4qFY>8TJS*_?tH8lC6myXaqq%l*k/4dgQv[4w$J@-X');
define('LOGGED_IN_SALT',   'OgpLWs98OIF8T%d8xDdWAoga`W4]YqiW0oC#Y|fFI:ua+&PMW*d!?|E`d],pLjA@');
define('NONCE_SALT',       '@h/_luxBDmkuxYZdGwp<r KNNWpUCc*4.N=5g)k7JEUGct%yis4f}yh%Ud+2+5`c');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
