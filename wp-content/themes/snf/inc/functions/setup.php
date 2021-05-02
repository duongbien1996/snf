<?php
/**
 * Theme init
 *
 * @author hien-tech (nickanhem@gmail.com)
 * @since 2018-12-14
 */
function myblogwptheme_setup() {
	// Make theme available for translation.
	load_theme_textdomain(DEV_TEXTDOMAIN);

	// Add default posts and comments RSS feed links to head.
	add_theme_support('automatic-feed-links');

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support('title-tag');

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support('post-thumbnails');

	/*
	 * Enable support for Post Formats.
	 *
	 * See: https://codex.wordpress.org/Post_Formats
	 */
	add_theme_support('post-formats', array());

	/*
	 * Enable support for Post excerpt.
	 *
	 * See: https://codex.wordpress.org/Post_Formats
	 */
	$arry_excerpt = ['page','post','on_the_move','photography','friends','love'];
	foreach ($arry_excerpt as $key => $value) {
		add_post_type_support( $value, 'excerpt' );
	}
	
}
add_action('after_setup_theme', 'myblogwptheme_setup');


/**
 * đăng ký menu
 *
 * @author duongbien1996@gmail.com
 * @since 
 */
function myblog_register_menu()
{
    register_nav_menus(array(
        'main_menu' => __('Main Menu', DEV_TEXTDOMAIN),
        'header_top' => __('Header Top', DEV_TEXTDOMAIN),
        'footer' => __('Footer', DEV_TEXTDOMAIN),
        '404_page' => __('404 Page', DEV_TEXTDOMAIN),
    ));
}
add_action('after_setup_theme', 'myblog_register_menu', 0);