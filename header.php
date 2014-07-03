<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Junto Theme
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<nav class="home-menu">
	<div class= "container" >
		<?php get_template_part( 'parts/menu', 'menu' ); ?>
	</div><!-- container -->
</nav><!-- home-menu -->

<div id="top" class="container" >
	<div id="page" class="hfeed site">

		<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'junto-theme' ); ?></a>

		<?php if ( ! is_home() ) : ?>

			<header id="masthead" class="site-header" role="banner">
				<div class="site-branding">
					<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
					<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
				</div>

				<nav id="site-navigation" class="main-navigation" role="navigation">
					<button class="menu-toggle"><?php _e( 'Primary Menu', 'junto-theme' ); ?></button>
					<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
				</nav><!-- #site-navigation -->
			</header><!-- #masthead -->

		<?php else : ?>

			<header id="masthead" class="site-header" role="banner">
				<?php get_template_part( 'parts/content', 'header' ); ?>
			</header><!-- #masthead -->

		<?php endif; ?>

		<div id="content" class="site-content">
