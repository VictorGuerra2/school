<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'school' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'root' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

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
define('AUTH_KEY',         's)_L-5!EYGc/}}^J6 0$z)-/l+[j+c%tlT|-t|6vkuI3<h6DclVr^I&?*tWN<0B+');
define('SECURE_AUTH_KEY',  'kaF6EZ?-R8mhFZn.g^jPRW:&v4PP r&Ej<TFB ]tMs8J<ovWa1HX7]B;IVt*EQpq');
define('LOGGED_IN_KEY',    '1H*X+2[EP^#`P|2^TlxuG:fC>$1+2~5V1wZp4S9o$:Rp|yJ>C [W;Vu_~Ye:UO]v');
define('NONCE_KEY',        '32E4JaH8>anc<*1i6tX~qIsBa9cd(7 d/]_T-v-X/A2MECo=94;%ZYV%7nKybp L');
define('AUTH_SALT',        '1A?8C<=e5u;%7rJ~-pHb:g+yozpU},%DK`h#(;T&|RhH1Fb/=:~8I13U}g@%U~kA');
define('SECURE_AUTH_SALT', 'ngvW$a|6+Wo.hCZ#cY69Q$<tFqh26!Qm_/UZN84k+vW$JGx+k|RiuK2WaY6>1g+o');
define('LOGGED_IN_SALT',   '|/fRxr)a94+VGaW ie-ft#|PKskg|8EmkyH6f*gY pQd(7o01C;H{G0F:M#N0J7S');
define('NONCE_SALT',       'M9>Sf!,u9KN[I,jt( ]-@ZJSwp|5>y< IeFfdy;u5T_p{ZOQ9SpRv;+y}|BW:yO#');

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
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
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
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
