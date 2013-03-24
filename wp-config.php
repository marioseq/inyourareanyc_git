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
define('DB_NAME', 'mixingch_wor1');

/** MySQL database username */
define('DB_USER', 'mixingch_alexseq');

/** MySQL database password */
define('DB_PASSWORD', 'alexseq123');

/** MySQL hostname */
define('DB_HOST', 'localhost');

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
define('AUTH_KEY',         'fXR0. TB@D5`.`;qt!Qu`ijrvfR8gfnSYF%:9]R^q9zTXxLq3c=Iz+~!wK438=d-');
define('SECURE_AUTH_KEY',  '9hSD#(v.L rY1sgm,E0%.5QUe8xc :|voq##I/Jd|Ue9lb^1he:oNIyc$+*fnT8x');
define('LOGGED_IN_KEY',    ')?.t]bD,asL$o|_V%3?*u$0{sdGq4PiCFiCoEvEkCF+|c~YCep+feV3IRsS|L.ur');
define('NONCE_KEY',        'WJHq%;{w$C aU!%ng+RXKCDZ-S 5anpt?9r]3@,nf}4ZWiXd5MCn1p9<O>iXKK/T');
define('AUTH_SALT',        '*%;B] -#A8-Vgz.-G3/D0$}|ijH)$Ua=~~F}nB!]u4wM,K}g+ !{C-Bl&3 y?m}d');
define('SECURE_AUTH_SALT', 'R;!5e^A;~[p@S!~O}}1)Sl<oKvokf$KN[Co^38KA|KJDi/}_*>]u.+Jh4 Rp-!G^');
define('LOGGED_IN_SALT',   'N@0HS[LM*:alX=kNp6:L++8tq@`uN&3`W?.C#jjPd -CvC?kt>XXVX@)9ff+-5q)');
define('NONCE_SALT',       'huRB%pG%$r=YXCV(S{wCq~| 6If/p`LePkDZk@IeHT?7U/XL$-ENg;%z!l84?h^K');

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
