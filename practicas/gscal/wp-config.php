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
define( 'DB_NAME', 'gscal_wp' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

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
define( 'AUTH_KEY',         'e/:?Fa?h?*=]K#:C4Lv{!:~AY$q`UUaU>uqvj( b_hY^Om3V53Fk=-}VEqD2bauf' );
define( 'SECURE_AUTH_KEY',  '|AQP~rvwO@#/d2yv_LE=bxhyUiH[4dh$Wk{tR0TPT4mpT1xv)e;<0^%0Y_h[RV7;' );
define( 'LOGGED_IN_KEY',    '@fxQ(3qJ2krbrtaV$Zj>cx@)pn@H6SFy)0JjS(ow_c,Yz :|R^):W2~+8UdI)-b<' );
define( 'NONCE_KEY',        'vAB:xYHCSRX7H 8h&%ad@(im#d}|oD[MC6Y@3@%b[Q+wYlQcN@OlD7L=TUTfTI;M' );
define( 'AUTH_SALT',        '}4i2,Z.YG0I&$F;.JmJn0$qO]K$<`DOQMk} 9/X1qB nLO4IC4IyMX9_x]F0j$%%' );
define( 'SECURE_AUTH_SALT', ' >`zqbsyJ`Pk%jm]E.xB]#Y5o|R>e<9<QrXC(}{hI0ovfQl#~8&)Se}}FD^Wvo7)' );
define( 'LOGGED_IN_SALT',   'x4lzWk7(o-(pi?+o$s2Uw^`x,ZI.+0b}L/mtr*Uu% Zn0]tPdU6*j.]x:_XYb.&$' );
define( 'NONCE_SALT',       'KCpXmzwP2PHe,~&s3oIA$<OKoBB.WGF`>UlCY-!$>672p1ukRs%v6nU/FwnL*,e8' );

/**#@-*/

/**
 * WordPress Database Table prefix.
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

define('FS_METHOD', 'direct');
