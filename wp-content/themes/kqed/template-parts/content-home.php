<?php
/**
 * Template part for displaying homepage content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package kqed
 */

?>
<!-- ATF-Section -->
<section class="atf-section">
	<video loop poster="<?php bloginfo('template_directory'); ?>/img/video.jpg" id="homepage-video">
		<source src="<?php bloginfo('template_directory'); ?>/img/videos/KQ001_CAMPAIGN_21_05_1-VP9_1080p_3Mbps.webm" type="video/webm"/>
		<source src="<?php bloginfo('template_directory'); ?>/img/videos/KQ001_CAMPAIGN_21_05_1-H264_1080p_3200kbs.mov" type="video/mp4"/>
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