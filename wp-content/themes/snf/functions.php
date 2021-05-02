<?php
/**
 * Academy
 *
 * @link 
 *
 * @package 
 * @subpackage Academy
 * @version Academy 1.0
 */

$my_theme = wp_get_theme();
define('THEME_NAME', sanitize_title($my_theme->get('Name')));
define('THEME_VERSION', $my_theme->get('Version'));
define('DEV_TEXTDOMAIN', $my_theme->get('TextDomain'));

// Homepage uri
define('HOME_URI', esc_url(home_url('/')));

// Theme path
define('THEME_DIR', get_template_directory());
define('THEME_URI', get_template_directory_uri());

// Assets uri
define('ASSETS_URI', THEME_URI.'/assets');

// Libs dir
define('LIBS_DIR', THEME_DIR.'/inc');

// Third party dir
define('THIRD_DIR', THEME_DIR.'/third_party');

// Gutenberg path
define('GUTENBERG_DIR', THEME_DIR . '/gutenberg');
define('GUTENBERG_URI', THEME_URI . '/gutenberg');

// Template parts dir
define('TEMPLATE_DIR', THEME_DIR.'/template_parts');

// Page templates path
define('PAGE_TEMPLATE_DIR', THEME_DIR.'/page_templates');
define('POST_TEMPLATE_DIR', THEME_DIR.'/post_templates');

/**
 * Initialize all the things.
 */
require LIBS_DIR.'/init.php';

// thêm shortcode vào block editor (gutenberg)
if (function_exists('lazyblocks')) {
	require_once(LIBS_DIR.'/gutenberg/init.php');
}



// add user svg
function cc_mime_types($mimes) {
	$mimes['svg'] = 'image/svg+xml';
	return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');
	