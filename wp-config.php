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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'db_omahhijab' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', '127.0.0.1' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

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
define( 'AUTH_KEY',         '[$5)NL!ZvP?8MXLzX/[i8>N#N9x|{K4PWU:X%g&glBx/?:N CCXni&oRrVz^*!zO' );
define( 'SECURE_AUTH_KEY',  'm=QM%`VZ]j%*n.0/9?~;g6S{[k9`]WrG-=a4knqL/Z/,.AMrzgd.dm7u_7&cxFeV' );
define( 'LOGGED_IN_KEY',    'Q v/WxO7G:`h)]*cGXD3rR/ZU5wFiL%4I&lCD`AMH_XL$`-Q!C.SC,ukeafUClfn' );
define( 'NONCE_KEY',        'ZNWmh{G3bU%hIpTw53MeJa[`VA%dg2^OiKn8dD#(<m-JeLyoE6LKMd>;RAiJMmAB' );
define( 'AUTH_SALT',        'N_F3)_x&0Z}:bY}<f=3z^QE{tS@;.bnLF&%k~0CHmQ/]M%1.ANN::T*(Nd?;_r8F' );
define( 'SECURE_AUTH_SALT', 'P#=7.=0_>s_J~kX/C+|2;[sz`fADlZsbhjFoES##O0zi>wEUkPw)8HQCc47dd%}[' );
define( 'LOGGED_IN_SALT',   '`dut<NI27;@?1&bv$[NDm~EQ/`l,OHtV*hI~E{&8q+>TI%@[(~w#VO)-ulHx6X!N' );
define( 'NONCE_SALT',       '>?H#c)CLT[GSQ)+MLOiM{}b*c5.<geQLqg,Ol(/N::j+eDs!9%`Ek$`_oBq8Um5U' );

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
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
