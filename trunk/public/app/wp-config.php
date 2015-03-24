<?php

// Composer autoloader
// Add to the top of wp-config.php
require_once realpath(__DIR__.'/../vendor/autoload.php');

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
define('ENVIRONMENT_DEV', 'dev');
define('ENVIRONMENT_STAGE', 'stage');
define('ENVIRONMENT_PROD', 'prod');
if(preg_match('/(localhost|\.dev)/', $_SERVER['HTTP_HOST'])) {
  define('ENVIRONMENT', ENVIRONMENT_DEV);
  define('DB_USER',     'root');
  define('DB_PASSWORD', 'root');
  define('DB_HOST',     'localhost');
  define('DB_NAME',     'tacoshellsoft_wp');
  define('SAVEQUERIES', true);
} elseif(preg_match('/(.vermilion.com)/', $_SERVER['HTTP_HOST'])) {
  define('ENVIRONMENT', ENVIRONMENT_STAGE);
  define('DB_USER',     'user');
  define('DB_PASSWORD', 'password');
  define('DB_HOST',     'localhost');
  define('DB_NAME',     'tacoshellsoft_wp');
  define('SAVEQUERIES', true);
} else {
  define('ENVIRONMENT', ENVIRONMENT_PROD);
  define('DB_USER',     'user');
  define('DB_PASSWORD', 'password');
  define('DB_HOST',     'hostname');
  define('DB_NAME',     'tacoshellsoft_wp');
}

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
define('AUTH_KEY',         'TF5`.a}_@;cY{y3b}a#7&l8{-XAA7^~rqni (cn[X/3[HA.tLR|G~/%/e-rH-ZDr!v');
define('SECURE_AUTH_KEY',  '+ V)`/iAP4~|6Ij$XB}V2PY1J$k=UJPH:B:G30y}B=@wv,nuT&{[U1rh^kEm|JmZ_x');
define('LOGGED_IN_KEY',    '*|a)2 $H|).L%qqg*Xm^[EK2cWPu^tlDhI)x2537?b9~H2uAnzS=axe+Yr$W+wQ;-}');
define('NONCE_KEY',        'oa@DfdKhy?Heo2-g>Gp6s9D,pxtc41>Y1r=dYCrK#arC GP%?_f!%~?HoFgx->btee');
define('AUTH_SALT',        '-r-^} Gb@j6XxR+BRx2x-w@@&+nCX$[`^[?b|JxHeQTNDB)E/ZI.E0oA5HP{7MmgMo');
define('SECURE_AUTH_SALT', 'oQ0;BV3n%?z:hZ3dw#5#U^=4^U:-p0,U8=6]cqpE%pn5~<R77_dx]+-&%<s?d3+=Sd');
define('LOGGED_IN_SALT',   '@-fm+emU;`G+3j2(_1%2*_B<hEA;PA1|)_}lna3_mDNJM3C?rah%wh$]Ve[ UVoY5_');
define('NONCE_SALT',       'y10OA1l&Op]7f=p0n:6dT_oW:esWmC62_dpq6yk7Ow[k)kN]irKb!gRI#h)%{H0R)=');

/**#@-*/

/**
* WordPress Database Table prefix.
*
* You can have multiple installations in one database if you give each a unique
* prefix. Only numbers, letters, and underscores please!
*/
$table_prefix  = 'tacoshell_';

/**
* WordPress Localized Language, defaults to English.
*
* Change this to localize WordPress. A corresponding MO file for the chosen
* language must be installed to wp-content/languages. For example, install
* de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
* language support.
*/
define('WPLANG', '');

/**
* For developers: WordPress debugging mode.
*
* Change this to true to enable the display of notices during development.
* It is strongly recommended that plugin and theme developers use WP_DEBUG
* in their development environments.
*/
define('WP_DEBUG', false);

// Disable updates
// See: http://make.wordpress.org/core/2013/10/25/the-definitive-guide-to-disabling-auto-updates-in-wordpress-3-7/
define('WP_AUTO_UPDATE_CORE', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');