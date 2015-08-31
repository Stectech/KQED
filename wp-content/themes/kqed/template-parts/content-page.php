<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package kqed
 */

?>


<?php /*if ( get_header_image() ) : ?>
<div class="innerpage-head">
	<img src="<?php header_image(); ?>" alt="header">
	<div class="container">
		<h2><?php single_post_title(); ?></h2>
	</div>	
</div>
<?php endif; */ // End header image check. ?>

<?php
	$thumb = wp_get_attachment_url( get_post_thumbnail_id($post->ID)); 
	$url = $thumb;
?>

<div class="innerpage-head">
	<img src="<?php echo $url ?>" alt="header">
	<div class="container">
		<h2><?php single_post_title(); ?></h2>
	</div>	
</div>

<!-- Homepage-Content -->
<div class="page-content">
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

<?php $accordion = get_post_meta($post->ID, 'accordion', true); ?>
<?php echo do_shortcode($accordion); ?>
