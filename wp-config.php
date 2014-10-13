<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'db171249_leroys_fields' );

/** MySQL database username */
define( 'DB_USER', 'db171249' );

/** MySQL database password */
define( 'DB_PASSWORD', 'n4734cSo05' );

/** MySQL hostname */
define( 'DB_HOST', 'internal-db.s171249.gridserver.com' );

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

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
define('AUTH_KEY',         'Vn|Sw{#-c6Bg4F>dPDDbk!m-xr}JH-/^4&.Lt&:q)^Hyk!E@bmZwldw~V.IjzxP+');
define('SECURE_AUTH_KEY',  '-YaU+=PDF=>.HJlP2+Bh48aYV*-_a~5Qa[DJymh/X/^%bdwb9`cKgZ&?es])0f:h');
define('LOGGED_IN_KEY',    'Tn[x;**vqWsMpUI>8-3OF> 8YO<!6[E-d`K Cp;_XgTSA]q{$~c-9lJ2B@mP;,/]');
define('NONCE_KEY',        'I`JmsK}`&w&qo@a[-HqZSOvhT,RAIhX-+sK94=1sL b19s,M))js=Q`%+|ckb0]]');
define('AUTH_SALT',        'j83Mm-dWdNm1Tt+KeaQ0EDCO?x5[/Q+6%-ve`~.}b#-$h_u%Xm^Ysc^8H1!>;H0U');
define('SECURE_AUTH_SALT', '$reYQ|odwTS}:t4,j3D@L+p#]F$Ufu{r?uy}U}iT--KomP`GNZUWqzx.jHETLq_U');
define('LOGGED_IN_SALT',   '9e+7381 v+GXE@6|4F+5hrNQL^[0PF0RCSi`Qs5OR4c`:EmM1x^- C6-yY}+_<{O');
define('NONCE_SALT',       ' K>U9tal19*J^!w}}9+u-p*8iv+f;Fk.fE@zLEd^jUHh_U:BX]#>/gk}h mle+WQ');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
