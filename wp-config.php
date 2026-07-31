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
 * * Localized language
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'local' );

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
define( 'AUTH_KEY',          'LNC]mk{17SXK&nvrH|,+pV4Kef>hk*muTOS3.)9H=o#jR^I{OrHZ]5TuX]cHl.iC' );
define( 'SECURE_AUTH_KEY',   '7t>yARvSj!m4a#)lbKO!-+8jsb`C@(<gU+GKHl+3L0({@n31K>r7V$/6,r!E`rS@' );
define( 'LOGGED_IN_KEY',     ' w3K75W~op%/1W1?l%4.zr4niNd,{?^ndAgS:j9u6iYgq5PXja3xdvpMu#gD4K]W' );
define( 'NONCE_KEY',         '.u:Hq>;9H?.gqWth44.mq4%RGenEW@<q%bn5LCsw(7;1Qsjmos%Y{eR4rXZJhXIG' );
define( 'AUTH_SALT',         'O7s[7Y0z2Z}CM=A:1kty|*53:]E{Lo<6{d?@2%3xfa@PYFF#hP:$Fy$0xXCsWXp{' );
define( 'SECURE_AUTH_SALT',  'a(5QoI.7x2%}NuW!.c1ksv-Cb7iv_S>*i+Ih,nVoW$ vqg?`&k.e(=_:ji+2s;&x' );
define( 'LOGGED_IN_SALT',    '_q7UZ>D{=S&1)?<n%[.~vfq;cQW4:Rkuhq~KgbYLAhZv[*$9SqQ-i2[.nKS&qA@+' );
define( 'NONCE_SALT',        '(~8N:]hS4w8>$q7k:1psVdvl$Y!Uu607fWNI;u(Otyx97*eW78#>JNm#HqXImiob' );
define( 'WP_CACHE_KEY_SALT', '<o=j&a[MZq G#r!<v&TYwNjeNAFcmeZuQ:)U+Az4XlLqwbjuk@>/JG~WMQ7Q1w>-' );


/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';


/* Add any custom values between this line and the "stop editing" line. */



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
if ( ! defined( 'WP_DEBUG' ) ) {
	define( 'WP_DEBUG', false );
}

define( 'WP_ENVIRONMENT_TYPE', 'local' );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
