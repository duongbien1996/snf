<?php
/**
 * The header for our theme
 
 * @link 
 *
 * @author Duong Bien (duongbien1996@gmail.com)
 * @subpackage Academy
 * @version Academy v1.0
 */
?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, maximum-scale=5, initial-scale=1.0, user-scalable=no">
	<link rel="profile" href="https://gmpg.org/xfn/11"/>        
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<header>
	<div class="snf-header">
		<div class="snf-nav">
			<a href="javascript:void(0);" class="dl-trigger hamburger_nav js-bar-menu snf-bar">
				<div class="menu-trigger">
					<span></span>
					<span></span>
					<span></span>
				</div>
			</a>
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="wrap-menu">
							<div class="snf-logo">
								<a href="/"><img src="<?php echo ASSETS_URI ?>/images/svg/logo.svg" alt="#"></a>
							</div>
							<div class="snf-wrap-nav js-height-nav">
								<?php
									wp_nav_menu(array(
										'menu' => 'Main Menu',
										'menu_class' => 'snf-menu js-menu-nav',
										'container' => 'ul',
									));
								?>
							</div>
							<div class="snf-login js-snf-login">
								<div class="btn btn-outline-red-e92528">Đăng nhập</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</header>