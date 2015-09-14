<?php
/**
 * Template part for displaying homepage content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package kqed
 */

?>

<?php 

$video_mov = get_field( "video_mov", $post->ID ); 
$video_webm = get_field( "video_webm", $post->ID ); 
?>
<!-- ATF-Section -->

<section class="atf-section">
	<video loop poster="<?php bloginfo('template_directory'); ?>/img/video-img.jpg" id="homepage-video">
		<source src="<?php echo $video_webm['url'] ?>" type="video/webm"/>
		<source src="<?php echo $video_mov['url'] ?>" type="video/mp4"/>
	</video>
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

<?php echo do_shortcode('[catlist name="homepage" content="yes" template="homeblocks" thumbnail="yes" thumbnail_size="full"]'); ?>