<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('WP_CACHE', true);
define( 'WPCACHEHOME', 'C:\xampp\htdocs\clinica_dental\wp-content\plugins\wp-super-cache/' );
define( 'DB_NAME', 'clinica_dental' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'coiS2yTVSLc&L.J85/U#/dB|>* nt/rVZ.8i@VmUG}u<Ov][#XKa<0|[?a3+^+J~' );
define( 'SECURE_AUTH_KEY',  '|K`X8.# )ApR(km@8X+ia:*9y8O=VIaGZz;2*aFiPua$Kxgng^M_*VBm3JG11*Nk' );
define( 'LOGGED_IN_KEY',    'mXx SfQC?a;|8*L }bcg-ic).,b}Ilh,.wgFaL$W6ggulIx*Bn2j=B,ibL|Xx9F^' );
define( 'NONCE_KEY',        'oko/L^Hzi7!ns$*):Jb~7`o(9/b!LSC3{Jg$/$3nuv2ukiz}yoPk7nn=xF_wx3q9' );
define( 'AUTH_SALT',        '@S=QZoXjhT=?9f:;0Ph[iK*FuGT@s*|4>azS!=RrxvI^ !r3<$aC[V|L<dL@$`d&' );
define( 'SECURE_AUTH_SALT', '>is65=4j/9>#Z_?ikZ8P*5tRjjsU3sBil-gU)A>4.x]|UVehu| 1|3?y&<f(/u@Y' );
define( 'LOGGED_IN_SALT',   'tP2nR.W_C#pEiqWd_#vFUN1~k<elYVv:Wu>Z$9BH>*W,ZmKnI>{7Uh@T[+<?u|74' );
define( 'NONCE_SALT',       'qwtO+,C~aQB|k>QQ1cN3Mh17KI}< en)YZp`$3F)gZ?,Gzwot)3Eqn25BNxa$-]D' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 *
 * At the installation time, database tables are created with the specified prefix.
 * Changing this value after WordPress is installed will make your site think
 * it has not been installed.
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/#table-prefix
 */
$table_prefix = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
