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
define( 'DB_NAME', 'WhiteStoneGroup' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

if ( !defined('WP_CLI') ) {
    define( 'WP_SITEURL', $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] );
    define( 'WP_HOME',    $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] );
}



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
define( 'AUTH_KEY',         '9KtumMRUKQpeV8937xPwmnXMTEVULfr04BFGg7xYtUIHEPyPY4j7fmDaBYIaaMUl' );
define( 'SECURE_AUTH_KEY',  'McYkzXAbHlPsDkdrxuccMrRwPoujuV9NUjNGVMGmCMYufZJNQIbX3HdDdT3bJpmK' );
define( 'LOGGED_IN_KEY',    'e6hKMhmIRmylTrONYNEYVPNuA1K9lL5jZxQoWwj0HUHy4o6qqpn79vM1HpMsza6v' );
define( 'NONCE_KEY',        'psRNICvDT2or8mYWoBCB5TmeZCEgKWGs1mn7IV20z79VpF26dNfdIAV94kkLWxDa' );
define( 'AUTH_SALT',        'UUZQdP27KlLoBU6BTFLs97O8oLvcvdf2uuNOerGsu6zAoD4hFPeUhTNyk3F4dtoY' );
define( 'SECURE_AUTH_SALT', 'XBZmQHJnGoJiGXJ0LTC7LzxB0VeBB3fSvY41mg0yA0Uv5hzXImLJKlihgKd4Klvr' );
define( 'LOGGED_IN_SALT',   'of7Iglybgipm2Eab418b0wjmUIkX0igsshLogmW7IwvhL7C6266ga03g0DcyvUfr' );
define( 'NONCE_SALT',       '3o7BYEmZiKBoDeGa9xi0MD43ASgUMSEcK007tuk5RK2JFEtrC8LxwFuFoh5UcMPJ' );

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
