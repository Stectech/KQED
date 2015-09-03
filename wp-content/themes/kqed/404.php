<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package kqed
 */

get_header(); ?>

<div class="innerpage-head">
	<img src="<?php bloginfo('template_directory'); ?>/img/header-bg1.jpg" alt="header">
	<div class="container">
	</div>	
</div>

<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">
		<!-- Homepage-Content -->
		<div class="page-content content-404">
			<div class="container">
				<div class="entry-content">
					<h3>Page Not Found</h3>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>
				</div><!-- .entry-content -->
			</div>
		</div>
	</main><!-- #main -->
</div><!-- #primary -->


<?php get_footer(); ?>
