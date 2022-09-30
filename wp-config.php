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
define( 'DB_NAME', 'project' );

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
define( 'AUTH_KEY',         'N2cQ|h+7<;R)1mE2WeYc6%@[czrM2UJO9Na}06qoC0&2Y3)@5=0w[>ozrV6[NILt' );
define( 'SECURE_AUTH_KEY',  'B%0o,qrh34C{8d]^ ~R!_T&+Bd F3J,<`Lv3+}&Khv:1a]sr-b=<N#cu%=&=PP_L' );
define( 'LOGGED_IN_KEY',    'EzGy*OD1$Gq(N[}F^]%A]4^TU3KX<+{1Q%}/bPv5y<g~N]7FozS!8%H:c#d2s;K|' );
define( 'NONCE_KEY',        'o%ky9G(=uk)-*=P44t9kMC(msH}Xfq.&]@HrZAv8=(h~w5Ow|F|+Kw`I$qvX!lj[' );
define( 'AUTH_SALT',        '=u9TZH}m[Z7Ar8$z5DsJLxHJ7tbAJA.8:>^m1*}ncSJbC=y6XN}J+3sEPM5$KmUy' );
define( 'SECURE_AUTH_SALT', '5UfOZ.g!gf0#gEKk%;]?nU1 ]{z-dnn4nz8) Sj=#$o(OsB<[Tzz@vcARJB>~iow' );
define( 'LOGGED_IN_SALT',   '1JH/jZKOfNDJVs:Y13id!}=k:B9f~e0wKlHt1/_g#RgAxqZu`%JB9D>:MsBS}Q6+' );
define( 'NONCE_SALT',       'Q6A))%/aa)lLx`LN%i2uQWL2d7s5hn#p9=-<xc1r)mrEbse{u8P?)Ye+@@=b:_u3' );

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
