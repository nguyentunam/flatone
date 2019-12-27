<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package flatone
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'flatone' ); ?></a>

	<header id="masthead" class="site-header">
		<div class="container">
			<div class="row">
				<div class="col-md-9">
					<div class="page-header-right">
						<div class="site-branding">
							<div class="row">
								<?php 
									if (has_header_image()) {
										echo '<img src="' . get_header_image() . '" class="page-header-image"/>';
									} else {
								?>

								<?php
								the_custom_logo();
								if ( is_front_page() && is_home() ) :
									?>
									<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
									<?php
								else :
									?>
									<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
									<?php
								endif;
								$flatone_description = get_bloginfo( 'description', 'display' );
								if ( $flatone_description || is_customize_preview() ) :
									?>
									<p class="site-description"><?php echo $flatone_description; /* WPCS: xss ok. */ ?></p>
								<?php endif; ?>
								
								<?php } ?>

								<div class='page-banner'>
									<span class='title'>CÔNG TY CỔ PHẦN KỸ THUẬT VÀ THƯƠNG MẠI HOÀNG MINH GROUP</span>
									<span class='sub'>VIETNAM TECHNICAL AND ECHONOMIC JOIN STOCK COMPANY</span>
								</div>
							</div>
						</div><!-- .site-branding -->
					</div>
				</div>

				<div class="col-md-3">
					<div class="page-header-right">
						<ul class="page-language-selector">
							<?php pll_the_languages( array( 'show_flags' => 1,'show_names' => 0 ) ); ?>
						</ul>
						<div class="page-search">
							<?php get_search_form(); ?>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div id="top-nav">
			<nav id="site-navigation" class="main-navigation">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<div class="main-navigation-body">
								<?php 
									if (has_header_image()) {
										echo '<img src="' . get_header_image() . '" class="page-header-image"/>';
									} 
								?>
								<?php
								// include('main-menu.php')
								wp_nav_menu( array(
									'theme_location' => 'menu-1',
									'menu_id'        => 'primary-menu',
									'container_class' => 'menu-main-container'
								) );
								?>
								<div class="header-social-buttons">
									<a href="#" class="btn-social "><i class="fa fa-facebook" aria-hidden="true"></i></a>
									<a href="#" class="btn-social "><i class="fa fa-google" aria-hidden="true"></i></a>
								</div>

								<div class="page-search">
									<?php get_search_form(); ?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</nav><!-- #site-navigation -->

			<nav class="sub-navigation">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<?php
								// include('main-menu.php')
								wp_nav_menu( array(
									'theme_location' => 'menu-1',
									'menu_id'        => 'sub-menu',
									'menu_class' => 'scroll menu'
								) );
								?>
						</div>
					</div>
				</div>
			</nav><!-- #site-navigation -->

		</div>
		
	</header><!-- #masthead -->

	<div id="content" class="site-content">
