<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, and ABSPATH. You can find more information by visiting
 * {@link http://codex.wordpress.org/Editing_wp-config.php Editing wp-config.php}
 * Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'medtech');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

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
define('AUTH_KEY',         'G2%,[cB`nWQG]S[9C.$_d$52PK%8Cq=}SJrZ@a_X(n5g6xG@9c*EeLw:)q#ueZUc');
define('SECURE_AUTH_KEY',  'dw#n=.r.R%jQ_(uVoq<=,Zq=)<rW>ZCV+r%$GZcS.1.AS?WkL#LF2gP(v iK8?YP');
define('LOGGED_IN_KEY',    '>]Y?^X%|gujntS]INBn:zEl4dS.;9xYe,*+KOE$XS.*JeT!$H<O0nXaL^QQH6}Y|');
define('NONCE_KEY',        'KFuzgExO1rVz<c|d**[E]/g+y_7Sl|t[ IzuM76uyrp@,NX4?&B&Ex<o7W]fPoOU');
define('AUTH_SALT',        'b3=c6q5phm;OlI$mp;b@?7z=E({AwYoN43MA:-Xb^XYuNcQJyk*Q/f_}Q6tLUwz3');
define('SECURE_AUTH_SALT', ';1G lhK40~W#s<8IIV]HS#z8N@AUyU<M(4]T~a?8-ZE4{H5IJd3n=?Wi6,Z=u@B>');
define('LOGGED_IN_SALT',   '6rR7DA/=QTI%7tlugKTz6pgI0Z$V0` BBxUqiq_yqc!=X,UD7a<gbyJMZ*?:WYTQ');
define('NONCE_SALT',       '&ep&Clx`UsrO_I0E(Oh.kOpyu6V%T4Ut`>na++Kgwj?&AvC.A%tU:&N,m/rG|v0@');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'mf_';

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

/** Change folder wp-content name **/
define ('WP_CONTENT_FOLDERNAME', 'assets');  
define ('WP_CONTENT_DIR', ABSPATH . WP_CONTENT_FOLDERNAME) ; 

define('WP_SITEURL', 'http://' . $_SERVER['HTTP_HOST'] . '/medtech-flanders/');  
define('WP_CONTENT_URL', WP_SITEURL . WP_CONTENT_FOLDERNAME);  

/** Disable theme and plugin editor **/
define('DISALLOW_FILE_EDIT', true);

/** Disable theme or plugin update, set to true **/
define('DISALLOW_FILE_MODS', false);

/** Change plugin directory **/
define( 'WP_PLUGIN_DIR', dirname(__FILE__) . '/lib' );
define( 'WP_PLUGIN_URL', 'http://' . $_SERVER['HTTP_HOST'] . '/lib' );

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
