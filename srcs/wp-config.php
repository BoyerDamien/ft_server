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
define( 'DB_NAME', 'wordpress' );

/** MySQL database username */
define( 'DB_USER', 'user' );

/** MySQL database password */
define( 'DB_PASSWORD', 'password' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '?[yNT+,-$0um~MaRPQ-] /U4P|c9._+3wOH8bE:sRHG|$pr-8l@-Uzf8aJcFk4T&');
define('SECURE_AUTH_KEY',  ';q%j?KS4@9@VS9NhjIsN4Kj SK-QG}{=nwCgZ&q~V!Hb].A4g][9(h6D;1EJA{K$');
define('LOGGED_IN_KEY',    '||WU`|rAdaUG$mBLBE6yPPj!R{%t4P^[<Lg.(cKO8#m-f(}:jwuvb7+f,qr$H.gP');
define('NONCE_KEY',        '9T->;[S>l@Pd,uDSkYkyxwsFV2h,uf(0.Vv(0pxZ]Wya1bE{g$@@09BnRpT](Zvi');
define('AUTH_SALT',        '9G.WN_JXeL+oo;R}u?1y.Xep -&eZl?@jy5&lw&YRSrdI.FP2UqJ;1[2m#J~-c6{');
define('SECURE_AUTH_SALT', ';1q}/46TocsuqT_!#fPg$#y.&eJk%~L?Pg0g*Ps-VBCv!3r7`UhUFMvq.=.[}x`v');
define('LOGGED_IN_SALT',   '6K.|)Zh&y`5t|9(Q>Taq5q{En6`-AwZGLkZ9)xwc8hy5G5v_w:P2-FUG! )mz[-.');
define('NONCE_SALT',       ' ,1Co,E,fmE]c1Oh#?U~r1[b|]C$E(VRU)I#n#y>29au-5]+a |`@6nYZ8[Ry}X|');

/**#@-*/

/**
 * WordPress Database Table prefix.
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
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
        define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
