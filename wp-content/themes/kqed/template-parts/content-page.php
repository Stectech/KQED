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
	<div class="container">
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


<!-- create shortcodes -->
<?php $accordion = get_post_meta($post->ID, 'accordion', true); ?>
<?php echo do_shortcode($accordion); ?>

<?php $slider = get_post_meta($post->ID, 'slider', true); ?>
<?php echo do_shortcode($slider); ?>

<?php $future_subcontent = get_post_meta($post->ID, 'future_subcontent', true); ?>
<?php $bg =   get_field( "background", $post->ID ); ?>

<?php $video_url = get_field( "video_url", $post->ID ); ?>

<!-- subcontent for the future page -->
<?php if ( $future_subcontent ) : ?>
	<div class="page-content">
		<div class="container">
			<p><?php echo do_shortcode($future_subcontent); ?></p>
		</div>
	</div>
<?php endif; ?>

<!-- Video-box -->
<?php if ( $bg ) : ?>
	<div class="videobox-wrapper">
		<img src="<?php echo $bg['url'] ?>" class="videobox-bg" alt="video" />
		<div class="container">
			<h3>lorem ipsum dolor sit amet</h3>
			<a href="<?php echo $video_url ?>" class="lightbox fancybox.iframe">
				<img src="<?php bloginfo('template_directory'); ?>/img/play-icon.png" alt="play icon" />
				Play video
			</a>
		</div>
	</div>
<?php endif; ?>

	<!-- Investors -->
	<div class="investors-wrapper">
		<div class="container">
			<h3>INVESTORS</h3>
		</div>
		<div class="left-side">
			<div class="col span_12">
				<a href="#">
					<img src="img/investors/image.jpg" alt="eric & wendy schmidth">
					<h4>eric & wendy schmidt</h4>
				</a>
			</div>
			<div class="col span_12 quotation">
				<p>“KQED has been at the cutting edge of Arts and Science programming for generations. Innovative original content will inspire creativity and imagination in the artists, scientists, learners and dreamers of the future.”</p>
				<h5>John smith</h5>
			</div>
			<div class="col span_12">
				<a href="#">
					<img src="img/investors/image-5.jpg" alt="yogen & peggy dalal">
					<h4>yogen & peggy dalal</h4>
				</a>
			</div>
			<div class="col span_12">
				<a href="#">
					<img src="img/investors/image-6.jpg" alt="Doris fisher">
					<h4>Doris fisher</h4>
				</a>
			</div>
			<div class="col span_12">
				<a href="#">
					<img src="img/investors/image-7.jpg" alt="les & Judy vadasz">
					<h4>les & Judy vadasz</h4>
				</a>
			</div>
		</div>
		<div class="right-side">
			<div class="col span_12">
				<a href="#">
					<img src="img/investors/image-1.jpg" alt="mark & mauree jane perry">
					<h4>mark & mauree jane perry</h4>
				</a>
			</div>
			<div class="col span_12">
				<a href="#">
					<img src="img/investors/image-2.jpg" alt="anne & greg davis">
					<h4>anne & greg davis</h4>
				</a>
			</div>
			<div class="col span_12">
				<a href="#">
					<img src="img/investors/image-3.jpg" alt="Diane B. wilsey">
					<h4>Diane B. wilsey</h4>
				</a>
			</div>
			<div class="col span_12">
				<a href="#">
					<img src="img/investors/image-4.jpg" alt="dirk & charlene kabcenell">
					<h4>dirk & charlene kabcenell</h4>
				</a>
			</div>
			<div class="col span_12 quotation">
				<p>“Public media consumers of the future won’t be sitting in front of their televisions or listening to whatever happens to be on the car radio during their commute. They will want their media delivered on-demand where they are, when they wish, on their digital platform of choice.”</p>
				<h5>ANONYMOUS</h5>
			</div>
		</div>
	</div>




