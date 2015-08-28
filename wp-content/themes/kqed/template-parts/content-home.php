<?php
/**
 * Template part for displaying homepage content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package kqed
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<!-- ATF-Section -->
	<section class="atf-section">
		<img src="<?php bloginfo('template_directory'); ?>/img/video.jpg" alt="video" />
		<div class="container">
			
		</div>
	</section>
	
	<!-- Homepage-Content -->
	<div class="homepage-content">
		<div class="container containerv2">
			<div class="entry-content">
				<?php the_content(); ?>
				<?php
					wp_link_pages( array(
						'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'kqed' ),
						'after'  => '</div>',
					) );
				?>
			</div><!-- .entry-content -->
		</div>
	</div>
	<footer class="entry-footer">
		<?php edit_post_link( esc_html__( 'Edit', 'kqed' ), '<span class="edit-link">', '</span>' ); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->

