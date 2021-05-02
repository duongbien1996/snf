<?php
/**
 * Development environment config settings
 *
 * Enter any WordPress config settings that are specific to this environment
 * in this file.
 *
 * @package    Studio 24 WordPress Multi-Environment Config
 * @version    2.0.0
 * @author     Studio 24 Ltd  <hello@studio24.net>
 */

// define('WP_HOME','http://sconnect-local.edu.vn');
// define('WP_SITEURL','http://sconnect-local.edu.vn');

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
// define('DB_NAME', 'vdc_v2');
define('DB_NAME', 'snf');

/** MySQL database username */
define('DB_USER', 'snf');

/** MySQL database password */
define('DB_PASSWORD', 'h6OT@CaOf(cXKoWq');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** MySQL database password - set in wp-config.local.php */


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
define('WP_DEBUG', true);

/**
 * không cho phép tự ý cài đặt hoặc upgrade wordpress + themes + plugins
 * added by hien-tech (hiennd@ancu.com) at 2019-03-28
 */
// cho phép upgrade
define('FS_METHOD', 'direct');
