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
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'sharmaka_digiinsight');

/** MySQL database username */
define('DB_USER', 'sharmaka_wp394');

/** MySQL database password */
define('DB_PASSWORD', ')P9!A9C70S');

/** MySQL hostname */
define('DB_HOST', 'localhost');

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
define('AUTH_KEY',         'busg0wonv0argyus8wqc2jtaglbnxowptodfsv6j7rmmomiavmr1yrtlmtjzlwqi');
define('SECURE_AUTH_KEY',  'edrbdwub2tzyzdugyvqoei4dldduyfe93d0lagly8sypnmljsz5ql4wbbjcx6w2n');
define('LOGGED_IN_KEY',    'bpafvck9cikwmspzn5dnu7nnghpxl7bxlg68mci5nihafmpgenxqmjj2yzqwdcq3');
define('NONCE_KEY',        '59jiyc2bdqquhpyvm7ywyuegnwmdqdzwcdyim7fhuvn8rvxtujbxe1ycqltchrnq');
define('AUTH_SALT',        'odgtypwi7947zfxapo6urrtctyqv9supz2guxpfgxsnd1qprvuc3sfuitaw6wbhq');
define('SECURE_AUTH_SALT', 'onyca9widas7rf9ekmf8cg1nomejgamj7bk4ch4dyvyma7mnc5v6wrdstoj0a0zq');
define('LOGGED_IN_SALT',   'lu6gsimyarhkihu5hktgffsf3em7sqycatg8qgqued577relubjpoxiwarrwstmt');
define('NONCE_SALT',       '1hytoz4wcq3j4wrjv1b2b62qpoomuvwuqkvdmwvrjxgl5esw5x6j73rboph40leg');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wplp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
