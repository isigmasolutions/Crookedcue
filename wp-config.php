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
define('DB_NAME', 'devstag1_WPYDO');

/** MySQL database username */
define('DB_USER', 'devstag1_WPYDO');

/** MySQL database password */
define('DB_PASSWORD', '8FolMc4yC[T!}Lnth');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

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
define('AUTH_KEY', '4353d22ae9b3142534606f560af63e38532186c343f1f6fecbe0a02316070ea7');
define('SECURE_AUTH_KEY', '4f0372293b90139a2e72910b92ded1d463fec09680df093565f32c3959daffba');
define('LOGGED_IN_KEY', 'c817d83a6ff85ee1818b223428a684bea6b6bcc41b9586c25227c8b2a0fed795');
define('NONCE_KEY', 'bb04afb6271c01cff94371dbfc475ff1070080a980638a30f09ed80d787dded0');
define('AUTH_SALT', 'e6564263f8eb38179c678ef23411971ee4a64b3d531d7107df0aeffa1a47386d');
define('SECURE_AUTH_SALT', '5288c35919f80bcae12abb4aa3190a04831b572a3cd5daf4506be4a9e8d3bf4e');
define('LOGGED_IN_SALT', '037d921469ad3653af2554f183b6bccfea2dfa55dc7b6a1edcddf00ad71ac173');
define('NONCE_SALT', '118592d19eae3b9c93924d1dad3d92d8ee9cd10b2f68568ba5daa6441f8143c1');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = '0nt_';
define('WP_CRON_LOCK_TIMEOUT', 120);
define('AUTOSAVE_INTERVAL', 300);
define('WP_POST_REVISIONS', 5);
define('EMPTY_TRASH_DAYS', 7);
define('WP_AUTO_UPDATE_CORE', true);

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
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
