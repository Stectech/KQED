<?php
/**
 * KQED Theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package kqed
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<!-- Header -->
	<header>
		<div class="container">
			<div class="logo">
				<h1>
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php bloginfo('template_directory'); ?>/img/logo.png" alt="KQED"></a>
				</h1>
			</div>
			<div class="nav-menu-wrapper">
				<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
			</div>
		</div>
	</header>

	<!-- ATF-Section -->
	<section class="atf-section">
		<img src="<?php bloginfo('template_directory'); ?>/img/video.jpg" alt="video" />
		<div class="container">
			
		</div>
	</section>

	<div id="content" class="site-content">
