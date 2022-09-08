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
define( 'DB_NAME', 'local' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'root' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'jFFPanVgCfjVv26MGuLbhwQHlanWuHcDKaJkqBb6wi52Er399ewf/FQsIbP+RqmMu3G1e8BfK9JPgqwvsatMsw==');
define('SECURE_AUTH_KEY',  'ZJQmb0lJgHt28S5dK879thpyodBkVHuSlCN70kKAje2YBqy+vsE8PdMiwS5Xu0PM2YZYaVMvRkzqFWVJP9dTaQ==');
define('LOGGED_IN_KEY',    'am60oeC/b+N0y1OX94PIED6QAiCaOrkYU2F7/VepnZRjmvcA9HYccuKD7G8fAPVtEefURAshjmJJli0jPXUPvw==');
define('NONCE_KEY',        'wGuewrFLG+qGwfuzD/yXyHjV6tePQ3kiAQ6dB7ZclucOtuTo2jSakKhdQEVXab2yY4KgfktX+M3lLtubjtbgsg==');
define('AUTH_SALT',        '6LLgHWQYxKwTwu7jn2Uz6pAGueTG33Rt/P/o2wUaJBf0nyEpTpsTniCCAcxrfbzDBmvkW/8gaaCkWqN0ACYAIQ==');
define('SECURE_AUTH_SALT', 'MqOJvo4bmpSZ9WukMYKBOBQcIQwsHSNXT8cMTCXLPFdJ3+3YiHqcA5avoRVFZJEN9MfGSbwQOoOLBebQ0iWKww==');
define('LOGGED_IN_SALT',   '7Cph/Fv+Vgpetlb1fyyOJPQJXMXSvsgEvFhnldnhaTcRiIW1YoIQbR6ie2me9qRW7DlkGvvsA+qs4/VMHLKEtA==');
define('NONCE_SALT',       'Y+ksYjHc52EwfEc6jvVwUuRhYcHJfNQfsv2C3+Vg0CbTChdfDAHily4omY3koveRmIguPMG/cjPoDkozL+f2cg==');

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';




/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
