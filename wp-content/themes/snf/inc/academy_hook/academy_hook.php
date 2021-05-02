<?php
/**
 * Hooks used in theme myblog
 *
 * @author duongbien (duongbien1996@gmail.com)
 * @since 
 */
?>

<?php
    // hook for phone topbar header
    if (! function_exists('hook_myblog_menu')) {
        function hook_myblog_menu() {
            echo block_myblog_menu();
        }
        add_action( 'myblogtheme_menu', 'hook_myblog_menu' );
    }

    // hook for Related posts
    if (! function_exists('hook_myblog_related_posts')) {
        function hook_myblog_related_posts($post_custom) {
            echo myblog_related_post($post_custom);
        }
        add_action( 'myblogtheme_related_posts', 'hook_myblog_related_posts' );
    }

?>