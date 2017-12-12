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
		preg_match('/^([a-z-_0-9]+\.)*[a-z-_0-9]+\.local(?!\.)/', $_SERVER['SERVER_NAME']) // Request Domain follows the pattern [xxx.]xxx.dev
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

	define('WP_SITEURL', "http://jamesfrazierdesign.local"); // local_site_url

	define('WP_HOME', "http://jamesfrazierdesign.local"); // local_home_url

} elseif ( WP_ENV == 'staging') {
	// ** MySQL settings - You can get this info from your web host ** //
	/** The name of the database for WordPress */
	define('DB_NAME', 'jfdwpstaging'); // staging_db_name

	/** MySQL database username */
	define('DB_USER', 'jfdwpstaging'); // staging_db_user

	/** MySQL database password */
	define('DB_PASSWORD', 'cGtv!u%N@7fZyg6HF'); // staging_db_password

	/** MySQL hostname */
	define('DB_HOST', '45.40.164.84'); // staging_db_host - Get this by logging into phpMyAdmin

	define('WP_SITEURL', "http://staging.jamesfrazierdesign.com"); // staging_site_url

	define('WP_HOME', "http://staging.jamesfrazierdesign.com"); // staging_home_url

} else {
	// ** MySQL settings - You can get this info from your web host ** //
	/** The name of the database for WordPress */
	define('DB_NAME', 'jfdwpproduction'); // production_db_name

	/** MySQL database username */
	define('DB_USER', 'jfdwpproduction'); // production_db_user

	/** MySQL database password */
	define('DB_PASSWORD', 'J89UbmbeVc@rQ8hM!'); // production_db_password

	/** MySQL hostname */
	define('DB_HOST', '45.40.164.102'); // production_db_host - Get this by logging into phpMyAdmin

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
define('AUTH_KEY',         'y{$/qIZb,tV+4[+qhpQp94Rm~Kd b&CYEMh^-+}L.6<qGeX,j{L6%M(b68 t`A8W');
define('SECURE_AUTH_KEY',  'o1.!^FJ B^:R7}*k:89i?h^Z)_Nz/BvCjhF~,*S1)(aSS$t2VVh|EEF#|6)+*hi&');
define('LOGGED_IN_KEY',    '?+_mLrY0J(Kv}PiG>,0`8bh#A+4}K9CNRt:z+mW*F>iuNaIcbL/0+,-q)7gcK`F8');
define('NONCE_KEY',        '|`V|IVm#+Xp-1c!+N)kWlY@Al=F6}+sUF,Q0p{F6ln7Q@d/W&L/QbWKM`-q|1z- ');
define('AUTH_SALT',        'L]Ql5=|$W/qy7TZa4)R^.:?-a=0W i%N!h6U+XemuUe7`}*(a7W#mc|sB1qG6_0~');
define('SECURE_AUTH_SALT', 'Yb);.rEGeC$w[~Odad*:?8#Sl0<.}BJCXEp>9mfydM$g=ZK&&~-]VDJf/|.*VNJU');
define('LOGGED_IN_SALT',   'p:qr+SbSR+yuLGK2LKB8.VenGa.[EJV+(amU|<e;Is$`HTC#f}^D8C&|c({v9rbF');
define('NONCE_SALT',       'LJ7mM6Zw9>B)q&HG ^|viq?-xFI+.n)PKo2@/cL9y-C[BQcb5-t&Xfp:; ;1xw4g');

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