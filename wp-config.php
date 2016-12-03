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
define('DB_NAME', 'vietvu');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

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
define('AUTH_KEY',         '{^PC@+wkC;UIn|~ 2QCc*Hw^G`%<dGGI7O7r&$=E<QV<>/*?(btX7m|6bc8od8k3');
define('SECURE_AUTH_KEY',  ',kCQDRcHy&H[z[aH}-idii=i;xsBwOv9-9}9^ic[1:F+rN!m0E]e0eBcpIOHgP]B');
define('LOGGED_IN_KEY',    '20mbl?w0[Gkh9.R2at/)F/)bk_D d|Vzebs|q,OD9yxpkS )R&S#}qNO7F# 4|7f');
define('NONCE_KEY',        'YA]z2-=qtJ_%AwY4P(!SDq#%9bRinAyz;BHt?n[HYgj27`WiI#mAKcU80fJPKErZ');
define('AUTH_SALT',        'lb^-r2:bq7>_OS$uAJ:s@[oS35+S]2]5# P1@5Em.u`H<(`s80Y3hwor(w-Nn0qi');
define('SECURE_AUTH_SALT', 'J+}S4vnQ7dX)G34+YTpWGQBl7#F[.,;oN(.I8%!/u.e+)%d?esRejq&z*`-]eEZO');
define('LOGGED_IN_SALT',   ';(0QV3+@~$(%KPtiq/[KJm[,T01orLFvifH?^ ]3 ktr7_%d~t{5VV*Idsd&3WrR');
define('NONCE_SALT',       '6a<kU`c{}E!8iV0 p:0WH(b+wwE-Fx,NVHXWwRKz)q(-,Q<3_[Vh-3tx_G:UJXq$');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

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
