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
	<video id="homepage-video">
		<source src="<?php echo $video_webm['url'] ?>#t=1,100" type="video/webm"/>
		<source src="<?php echo $video_mov['url'] ?>#t=1,100" type="video/mp4"/>
	</video>
	<div class="container">
		<a href="#" id="scrolldown-btn"><img src="<?php echo get_template_directory_uri(); ?>/img/scroll-arrow.png" alt="scroll down" /></a>
		<a href="#" id="replay-btn">Replay <i class="fa fa-repeat"></i></a>
		<a href="#" id="mute-btn"><i class="fa fa-volume-up"></i><i class="fa fa-volume-off"></i></a>
	</div>
</section>

<!-- Homepage-Content -->
<div class="homepage-content">
	<div id="homecontent"></div>
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



