<?php
/*
    Template Name: Contact Page

 * Template part for displaying homepage content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package kqed
 */

?>

<?php
	$thumb = wp_get_attachment_url( get_post_thumbnail_id($post->ID)); 
	$url = $thumb;
?>

<?php get_header(); ?>

<div class="innerpage-head" style="background-image: url('<?php echo $url ?>');">
	<div class="container">
		<h2><?php single_post_title(); ?></h2>
	</div>	
</div>

<div class="page-content">
	<div class="container row">
		<h3>FOR MORE INFORMATION, PLEASE CONTACT</h3>
		<div class="col span_6">
			<div class="contact-box">
				<h4>John Boland</h4>
				<p>President</p>
				<p><a href="mailto:johnboland@kqed.org">johnboland@kqed.org</a></p>
				<p>(415) 553-2201</p>
			</div>
			<div class="contact-box">
				<p>2601 Mariposa Street</p>
				<p>San Francisco, CA 94110 </p>
				<p>(415) 864-2000</p>
			</div>
		</div>
		<div class="col span_6">
			<div class="contact-box">
				<h4>Traci Eckels</h4>
				<p>Chief Development Officer</p>
				<p><a href="mailto:teckels@kqed.org">teckels@kqed.org</a></p>
				<p>(415) 553-2357</p>
			</div>
		</div>
	</div>
</div>

<?php get_footer(); ?>
