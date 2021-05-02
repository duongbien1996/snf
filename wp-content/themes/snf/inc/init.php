<?php
/**
 * Classes
 * Load classes that are used by various functions
 */


// if (is_admin()) {
// 	require LIBS_DIR.'/admin/class-vnbwptheme-admin.php';
// }


/**
 * Enqueue styles, register widget regions, etc.
 */
require LIBS_DIR.'/academy_hook/academy_hook.php';

require LIBS_DIR.'/functions/setup.php';
require LIBS_DIR.'/functions/security.php';
require LIBS_DIR.'/functions/post_type.php';
require LIBS_DIR.'/functions/taxonomy.php';
require LIBS_DIR.'/functions/head.php';
require LIBS_DIR.'/functions/helper.php';
require LIBS_DIR.'/functions/menu.php';
require LIBS_DIR.'/functions/ajax.php';

require LIBS_DIR.'/academytheme_options/barebones-config.php';

/**
 * Shortcode
 */
require LIBS_DIR.'/gutenberg/init.php';

/**
 * Theme customize -> ở đây viết các function sử dụng cho theme
 */
require LIBS_DIR.'/theme_customize/init.php';