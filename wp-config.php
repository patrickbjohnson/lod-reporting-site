<?php

require_once(__DIR__.'/vendor/autoload.php');
Dotenv::load(__DIR__);


/** Server Environment (local, development, staging, production) */
define('ENV', getenv('ENV'));

/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, and ABSPATH. You can find more information by visiting
 * {@link https://codex.wordpress.org/Editing_wp-config.php Editing wp-config.php}
 * Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', getenv('DB_NAME'));

/** MySQL database username */
define('DB_USER', getenv('DB_USER'));

/** MySQL database password */
define('DB_PASSWORD', getenv('DB_PASSWORD'));

/** MySQL hostname */
define('DB_HOST', getenv('DB_HOST'));

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
define('AUTH_KEY',         'uK:aWg{@hQxExKQnKbr-b{#E&##:`njUFq5{RgDgbqmhr`bs3$}MitvtEfYS]*e?');
define('SECURE_AUTH_KEY',  '%N0na~?IL^$m*<Nz^G1O(O0.w~CH:]&o -C2(iZ0Q>]p=4b<p.i~I2.0A[9|FgNs');
define('LOGGED_IN_KEY',    'XOU7#D@N!*n#Pv+KPy+i3I|vLkar+W<5-o48|J[`f0V<m7=)K:zXZPp--?e1wlYp');
define('NONCE_KEY',        'GyRnqhKQ<^d}wmmASl{wzc$w|vA*Gqbj68h-RH7dlSEw5JPY++52jh+krd-Lh#;<');
define('AUTH_SALT',        'm8eY14*/M~G*]C>-VB6b9;G +2SK{bNmk-XsXo|s/8F16Wwb_+9Lw{tOwps!pU<E');
define('SECURE_AUTH_SALT', '*8[z|$9E1|-WYdZ]^+t|/l2%@_Uu7J@{X y]9[)NN}PU+Q{hQ!k8g:svc]MmahKG');
define('LOGGED_IN_SALT',   'ZDl+//*Fn[yyt5@=7$cs+w*hTADLvRHKfD0sp-|)NG[d[U~M6tve&pIn@mg{kp`(');
define('NONCE_SALT',       'lwYrUEA1tbTiQ=a^XK:v)2x|BT_BW<. mUmG.IKHD_em/g 6EGA)gz Bns.,XqXg');


/**#@-*/

//update the wp-content directory location
define('WP_CONTENT_DIR', __DIR__ . '/wp-content');
define('WP_CONTENT_URL', 'http://' . $_SERVER['SERVER_NAME'] . '/wp-content');
define('WP_SITEURL', 'http://' . $_SERVER['SERVER_NAME'] . '/wp');
define('WP_HOME', 'http://' . $_SERVER['SERVER_NAME']);


define('WP_DEFAULT_THEME', 'life-or-death-client-reporting');

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

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
