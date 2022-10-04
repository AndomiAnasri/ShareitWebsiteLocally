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
define( 'DB_NAME', 'shareit' );

/** MySQL database username */
define( 'DB_USER', 'shareit' );

/** MySQL database password */
define( 'DB_PASSWORD', 'shareit' );

/** MySQL hostname */
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
define( 'AUTH_KEY',         'QsHIM5F#u5Y_h;B-gt%F)A3PQ<*]A/XmRG7K6?zEf!aUoiur_O.{nrqBa!B,Q)H9' );
define( 'SECURE_AUTH_KEY',  ']6qcbPwuFiUTloVS&u/mw8ms6oC_!cdWc^+>s5s7nwy_zhtx6ZA^ mCqG6MiwBa~' );
define( 'LOGGED_IN_KEY',    'be6FplW?~pRTQ8itH6NdqF_jd7i^aGf~,Y(Rr{b_IJa:p(V2P[$hi_st&& XH-& ' );
define( 'NONCE_KEY',        'v7A!bKNIg>o05$+%G&f*b+DENf$#hgBv;O RN`B[y[?PQf!AX7ea~KOEweC%(Pou' );
define( 'AUTH_SALT',        ':|B)M~0|{0.` 6Ep}Q;s3Q{r0E$!jEKu&3PB0Usk.Y=`1rXKbiiA(MC8+yHr1S9C' );
define( 'SECURE_AUTH_SALT', 'pVT?XOR~mmGvda%Hs=p}EY.K.Q^=(4iBE]7tRV}yLlk#xDx1}cOZAr!}[h@]B;}Q' );
define( 'LOGGED_IN_SALT',   'E`nY1>d:9Kx%*0A?R9/8r18AP<K~b`B_<3ILb+qc3LiPy$zvu,eciMu!<U&-EWJ7' );
define( 'NONCE_SALT',       '6SlE!4E* 0Td(KE]eoWM?Wbh+3SB^YJxNs>[O}yXnF37U)YMM:fHJPdMsyyZsE:A' );

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
