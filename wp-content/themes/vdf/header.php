<?php
/**
* The header for our theme.
*
* This is the template that displays all of the <head> section and everything up until <div id="content">
*
* @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
*
* @package Wordsmith
*/

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<style>
	.site-header {
	  clip-path: url('#clip-header');
	}
	.post-section:nth-child(odd), .posts:nth-child(odd) {
		clip-path: url('#clip-shape-right'); /*fallback for firefox*/
    -webkit-clip-path: polygon(0 0, 100% 20%, 100% 80%, 0 100%); /*fallback for safari*/
    clip-path: polygon(0 0, 100% 20%, 100% 80%, 0 100%)
	}
	.post-section:nth-child(even), .posts:nth-child(even) {
		clip-path: url('#clip-shape-left');  /*fallback for firefox*/
    -webkit-clip-path: polygon(0 20%, 100% 0, 100% 100%, 0 80%); /*fallback for safari*/
    clip-path: polygon(0 20%, 100% 0, 100% 100%, 0 80%);
	}
	@media screen and (min-width: 899px) {
		.post-section:nth-child(odd), .post-section:nth-child(even),
		.posts:nth-child(odd), .posts:nth-child(even) {
			-webkit-clip-path: none;
			clip-path: none;
		}
	}
	</style>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<div id="page" class="site">
		<a class="skip-link screen-reader-text" href="#main"><?php esc_html_e( 'Skip to content', 'feistner' ); ?></a>

		<header id="masthead" class="site-header" role="banner">
			<div class="site-branding">
				<?php
				if ( is_front_page() && is_home() ) : ?>
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><img src="<?php echo get_template_directory_uri(); ?>/assets/logo.png" alt="Victoria Feistner"/></a></h1>
			<?php else : ?>
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><img src="<?php echo get_template_directory_uri(); ?>/assets/logo.png" alt="Victoria Feistner"/></a></h1>
				<?php
			endif;

			$description = get_bloginfo( 'description', 'display' );
			if ( $description || is_customize_preview() ) : ?>
			<p class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></p>
			<?php
		endif; ?>
	</div><!-- .site-branding -->

	<nav id="site-navigation" class="main-navigation" role="navigation">
		<?php /*<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'feistner' ); ?></button> */ ?>
		<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
	</nav><!-- #site-navigation -->
</header><!-- #masthead -->

<div id="content" class="site-content">
