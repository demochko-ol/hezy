<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'hezy_kl_com_ua');

/** MySQL database username */
define('DB_USER', 'hezy');

/** MySQL database password */
define('DB_PASSWORD', '01041988Jkz');

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
define('AUTH_KEY',         'FO|*| GJl+SDQ:FjggE*B@/{uUjEW(7kBi_P83:%87 UF5sQU<F#qhv*|[O,bZP^');
define('SECURE_AUTH_KEY',  'w~Rm+mqxkPd)bfwzN#xgr%A?P@Qi8>jB^;@nQhf*vyGtHt)kw-F_9]p$O0&iok$j');
define('LOGGED_IN_KEY',    ',a/5r%`VRTy7Tbo&3p-.@m+K^+2diyuDs/j,L;jy:f(yqCcKrdRNMIET+g@f}rT*');
define('NONCE_KEY',        '}0[bz2bY>u9|`9^btlOhj<u}ZIG!yyB_a/Z1fBi7_<rKWIy$b[m}Fi!sh}X%g+LP');
define('AUTH_SALT',        '(PV@<;Gm/m@:Fs^JS[M5Yes8)c>:_C7PwF^/-/Tbi%kL4G%{n):*/jw2=C[^nknu');
define('SECURE_AUTH_SALT', '@4t6KeSbp:b}B~IMSh]Vup&VllJjsM?A>Us)vE9wO1@Ck.7j=,` Qqa-u&66ktPm');
define('LOGGED_IN_SALT',   '9|6{<)D*<?R[4r:@+KI3_Lp-e Jz#v+EeONPr-44_TB62C3U[~b?8a4#|O&gg9:D');
define('NONCE_SALT',       '?o(D Fjgb|b9kfPIjTGH1!2X2ThH4ja:N9Y=Vx?3g>g73sO3dm+*l9=7>iI+%gCY');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
