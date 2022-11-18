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
define('DB_NAME', 'epiz_32976177_w245');

/** Database username */
define('DB_USER', '32976177_1');

/** Database password */
define('DB_PASSWORD', 'P2pr7-4DS@');

/** Database hostname */
define('DB_HOST', 'sql202.byetcluster.com');

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
define( 'AUTH_KEY',         'jucgipz9wpch3vaudave0uztk23ua8y95yjwjcvor8hivs1y86y8eqmkgcnyefye' );
define( 'SECURE_AUTH_KEY',  'hfw1t4h2yzwuxtklzpznhegbgbnddqhhm4f8bccn0pcsiziu9skmu4irefwl9jca' );
define( 'LOGGED_IN_KEY',    '2vhfboy92u7jdhfnk3okdeo87tbn9xgmlas3lyfovjblvaglwor2vhtf99ro2mia' );
define( 'NONCE_KEY',        'diobldmmjluem5qgwrqj1aleiyiaa3umkwse9w8kgbc3m9u6zuaa12xj3irunwbn' );
define( 'AUTH_SALT',        'fju6smvvncaceifaqg33ypj0vytfen3xocm9r8hmqkjhh8tfsz7l6sbsorlgyseq' );
define( 'SECURE_AUTH_SALT', 'mqyyamjlggvudiilifuqd8uhwmcvym3de9njxjdovlibsib6g9ufree2iskx1nqy' );
define( 'LOGGED_IN_SALT',   'zdtvrnzbjanga1wkyout0aqnukcit2vmpya0cv6hmurmmrzvcbc4xqyag8wqfckm' );
define( 'NONCE_SALT',       'cinb3g3hmrg4kvoccewxaho9o3hckje4iebytvllfrcnldup2wrgalxjdnrubsko' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wpki_';

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
