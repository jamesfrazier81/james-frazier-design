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

// One wp-config.php file for multiple environments setup from http://www.messaliberty.com/2010/01/how-to-create-a-single-wp-config-file-for-local-and-remote-wordpress-development/
if (
		preg_match('/^(192\.168\.|10\.|172\.(1[6-9]|2[0-9]|3[0-2]))/', $_SERVER['REMOTE_ADDR']) || // Request IP is in a private block
		preg_match('/^([a-z-_0-9]+\.)*[a-z-_0-9]+\.dev(?!\.)/', $_SERVER['SERVER_NAME']) // Request Domain follows the pattern [xxx.]xxx.dev
	) {
	define('WP_ENV', 'local');
} elseif (preg_match('/staging.jamesfrazierdesign\.com/', $_SERVER['HTTP_HOST'])) { // staging_server_domain
	define('WP_ENV', 'staging');
} else {
	define('WP_ENV', 'production');
}

if ( WP_ENV == 'local' ) {
	// ** MySQL settings - You can get this info from your web host ** //
	/** The name of the database for WordPress */
	define('DB_NAME', 'jfd_wp_local'); // local_db_name

	/** MySQL database username */
	define('DB_USER', 'root'); // local_db_user

	/** MySQL database password */
	define('DB_PASSWORD', 'root'); // local_db_password

	/** MySQL hostname */
	define('DB_HOST', 'localhost'); // local_db_host

	define('WP_SITEURL', "http://jamesfrazierdesign.dev"); // local_site_url

	define('WP_HOME', "http://jamesfrazierdesign.dev"); // local_home_url

} elseif ( WP_ENV == 'staging') {
	// ** MySQL settings - You can get this info from your web host ** //
	/** The name of the database for WordPress */
	define('DB_NAME', 'jfdadminstag'); // staging_db_name

	/** MySQL database username */
	define('DB_USER', 'jfdadminstag'); // staging_db_user

	/** MySQL database password */
	define('DB_PASSWORD', 'cGtv!u%N@7fZyg6HF'); // staging_db_password

	/** MySQL hostname */
	define('DB_HOST', 'jfdadminstag.db.4323042.hostedresource.com'); // staging_db_host

	define('WP_SITEURL', "http://staging.jamesfrazierdesign.com"); // staging_site_url

	define('WP_HOME', "http://staging.jamesfrazierdesign.com"); // staging_home_url

} else {
	// ** MySQL settings - You can get this info from your web host ** //
	/** The name of the database for WordPress */
	define('DB_NAME', 'jfdadminprod'); // production_db_name

	/** MySQL database username */
	define('DB_USER', 'jfdadminprod'); // production_db_user

	/** MySQL database password */
	define('DB_PASSWORD', 'J89UbmbeVc@rQ8hM!'); // production_db_password

	/** MySQL hostname */
	define('DB_HOST', 'jfdadminprod.db.4323042.hostedresource.com'); // production_db_host

	define('WP_SITEURL', "http://jamesfrazierdesign.com"); // production_site_url

	define('WP_HOME', "http://jamesfrazierdesign.com"); // production_home_url

}

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
define('AUTH_KEY',         'j(dy/r,HmIY$8$Tbm;|TN&(`^4/l(XPktpFX$Z7z[l$&,?!#e;j}Ta*+1b%w=7GR');
define('SECURE_AUTH_KEY',  '2W_ZVSxsR~h>MlRd+zU+K6A?XL;[cFAd7]$dk|Pg(%vf*$m41B[HH&)J{Z_r[t+o');
define('LOGGED_IN_KEY',    'nUJYmCL|qS@5|F}|F8|u`!2>/$])~yWy{+NhNCI1#&}D0cf:t+Yxmo-jsxRL=$lG');
define('NONCE_KEY',        'Cg5nBa>FIH2dZ@wAp2A7-gS>Y4^iblVf:UMIaVbh|SK8;B$!).]6njx/H-2Xyb6B');
define('AUTH_SALT',        'Fac&L.=wC`cZt>yc4|}L[ x6VEd|A).Ke|w5^mo{ZB/?sOl8VM^FZA~N{9*&fq:-');
define('SECURE_AUTH_SALT', 'Mb[@]<N+uNy/9.9pv-+Gwq.kVOt,:89=qoBabX<b,!fJUMP6:KRC_t==.>(=jw{N');
define('LOGGED_IN_SALT',   'Lv1diy6h$j]I+rd-1EqTzA@xicWUPmc!gcV}~)8ZgQDh.^!oH=|;I?--_bMp[^tj');
define('NONCE_SALT',       '7NK %rJRn(w/|Hi-?~-]-2>o>(~3Kk|0F,@Zs3oTD--)u!HK=3h+/+3C+9^UgE|X');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'jfdesign_';

/** Set reasonable number of post revisions to maintain per post. */
define( 'WP_POST_REVISIONS', 15 );

ini_set('memory_limit', '64M');

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
// define('FORCE_SSL_LOGIN', true);
// define('FORCE_SSL_ADMIN', true);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');