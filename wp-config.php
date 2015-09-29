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
define('DB_NAME', 'cocotuto');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

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
define('AUTH_KEY',         'N)/Z,TN}nV`#?h4mg:Fmh[9VT$EQTi6SsEZK[|CN&kbJ!EjSp#:g57O4?<DSd{-;');
define('SECURE_AUTH_KEY',  'woB~Z-sU4&H=1,0+[hOY+hxY%-Dc-z9q/y[uXI -|MHb*zuSQLZs_g6=FM5}UsDU');
define('LOGGED_IN_KEY',    '#&JPJ0dj|Y%T;<K7WS+4b.m*GH9K+nz:v%+`*`3L9S/2:8I/Db?s=62S@n+L<M2~');
define('NONCE_KEY',        'Zc>D2B/NS|y(=tS/<Dwl$V,;F0.ecg^Zv+or0{|^GH5xP7=3nz?4zB#?i}57ad7P');
define('AUTH_SALT',        '<$OwZl_/%^tzbL#!N+}[T]9,_X|n2~{`_|@IrrOT)YCPEWY[yH(l|&H4C|#X|U/]');
define('SECURE_AUTH_SALT', 'm]&Y=g45cf`FEODbH:N*70O@)eB+p+~g x+(SlzMF7m+/:gqqrbAd4Ouux^|OFPF');
define('LOGGED_IN_SALT',   'o}XF`#u-~DTswlrvx+e!NTWtI!)aoqp#?.-!g?z(0!By6D#d6Sk:i{xJnfi}&FW8');
define('NONCE_SALT',       'C a@!3D>=0Kw~[bd[4p7TByd6XNF2>!YjdNYJ|Kgx@A. C?8ra[,]aZAq}kfAk|w');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'cocotuto_';

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
