<?php
// Ngày khởi tạo : 11/09/2020

/**
 * thêm file style css vào head
 *
 * @author
 * @since 11/09/2020
 */
function myblog_styles()
{	
	// dùng cho thư viện bootstrap 4
	// wp_enqueue_style(THEME_NAME.'bootstrap', ASSETS_URI.'/css/bootstrap.css', false, THEME_VERSION, 'all');

	// dùng cho thư viện validation
	wp_enqueue_style(THEME_NAME.'validation', ASSETS_URI.'/css/validation.css', false, THEME_VERSION, 'all');

	// dùng cho thư viện nice-select.css
	wp_enqueue_style(THEME_NAME.'nice-select', ASSETS_URI.'/css/nice-select.css', false, THEME_VERSION, 'all');
	
	// dùng cho thư viện Font Awesome
	wp_enqueue_style(THEME_NAME.'Font-Awesome', ASSETS_URI.'/css/all.css', false, THEME_VERSION, 'all');

	// dùng cho thư viện Font simple icons
	wp_enqueue_style(THEME_NAME.'Font-simple', ASSETS_URI.'/css/simple-line-icons.css', false, THEME_VERSION, 'all');

	// files dùng cho theme
	wp_enqueue_style(THEME_NAME.'-main', ASSETS_URI.'/css/main.css', false, THEME_VERSION, 'all');
}
add_action('wp_enqueue_scripts', 'myblog_styles');


/**
 * thêm file javascript vào footer
 * giá trị true là add vào footer, giá trị false là add vào header
 *
 * @author 
 * @since 04/03/2020
 */
function myblog_scripts()
{
	// thư viện jquery
	wp_enqueue_script(THEME_NAME.'-jquery', ASSETS_URI.'/js/jquery-3.5.1.min.js', false, THEME_VERSION, true);
	
	// thư viện bootstrap 4	popper.min.js
	wp_enqueue_script(THEME_NAME.'-js-popper', ASSETS_URI.'/js/popper.min.js', false, THEME_VERSION, true);

	// thư viện bootstrap 4	
	wp_enqueue_script(THEME_NAME.'-js-boostrap', ASSETS_URI.'/js/bootstrap.min.js', false, THEME_VERSION, true);

	// thư viện nice select
	wp_enqueue_script(THEME_NAME.'-nice-select', ASSETS_URI.'/js/jquery.nice-select.min.js', false, THEME_VERSION, true);

	// thư viện carousel
	wp_enqueue_script(THEME_NAME.'carousel', ASSETS_URI.'/js/owl.carousel.min.js', false, THEME_VERSION, true);

	// thư viện validation
	wp_enqueue_script(THEME_NAME.'-validation', ASSETS_URI.'/js/validation.js', false, THEME_VERSION, true);

	// thư viện Font Awesome
	// wp_enqueue_script(THEME_NAME.'-Font-Awesome-js', ASSETS_URI.'/js/all.js', false, THEME_VERSION, true);

	// thư viện dev tự tạo (Viết cho các dòng code từ bên ngoài)
	wp_enqueue_script(THEME_NAME.'-rules', ASSETS_URI.'/js/rules.js', false, THEME_VERSION, true);

	// thư viện dev develop
	wp_enqueue_script(THEME_NAME.'-base', ASSETS_URI.'/js/base.js', false, THEME_VERSION, true);


	// $wp_script_data = array(
	// 	'ADMIN_AJAX_URL' => admin_url('admin-ajax.php'),
	// 	'HOME_URI' => HOME_URI
	// );
}
add_action('wp_enqueue_scripts', 'myblog_scripts');