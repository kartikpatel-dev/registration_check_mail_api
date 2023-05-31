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
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'provis_db' );

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
define( 'AUTH_KEY',         'KnQS`%Qd.<~%f7h6@OgCKt:t7DZ[wL29n?^PTDyF++UrIS/|g+U0G/CBU[FC}.)S' );
define( 'SECURE_AUTH_KEY',  'Ac@a az-IzJ|{RIks#:a=]R;;uFzWRzdH&W!}|><w8xi{D;h^/p=tX_<|H&,<OyR' );
define( 'LOGGED_IN_KEY',    'Y[/9c|U1R wM%h?[~2Je8;$wHS,u/`g0N%gL?`d=A:sF}X}noixy_1v2e`rW-.6c' );
define( 'NONCE_KEY',        'gQZ{g 6bnYSN280qu+J6q7#?.:tkGf^8ngzo_E)i8L)xGJ:,_zNRj78F+7LEw@#e' );
define( 'AUTH_SALT',        ',kf4{Y`v9r,ahniUvsC!gArB^br=#:RE5hX14:,%):>~MBG1[!I5M%9Y-xOzOT5t' );
define( 'SECURE_AUTH_SALT', 'MGksj$)L@L}<Voy+oRaL/]<p?(3%-.HYG|s4K7D:l<m=?ERTf)6kiVAD[KOP.OTg' );
define( 'LOGGED_IN_SALT',   'Bwaa+J%m/|dq1v74WIdNo,,0v:G[6s_r{XiwxSp~e+,qF%8Z)/;t>nZGeo@JPe^a' );
define( 'NONCE_SALT',       'ZCM0M5<FwMNfg{~Ac!Q|:(Tm:>/nQ&jl{F^D^jOI`ej]~d%jFaSMt4O(X8`<2$pO' );

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
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
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
