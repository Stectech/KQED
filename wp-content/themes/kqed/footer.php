<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package kqed
 */

?>

	</div><!-- #content -->

	<!-- Footer -->
	<?php $linkname = get_post_meta(get_the_ID(), 'link_name', true); ?>
	<?php $url = get_post_meta(get_the_ID(), 'url', true); ?>
	
	<footer>
		<?php if ( $linkname ) : ?>
			<div class="container">
				<a href="<?php echo $url; ?>" class="bold-link"><?php echo $linkname; ?><img src="<?php bloginfo('template_directory'); ?>/img/arrow.png" alt="arrow" /></a>
			</div>
		<?php endif; ?>
		
		<div class="footer-bar">
			<div class="container">
				<p class="copyright-note">© KQED 2015</p>
				<div class="footer-link"><a href="#">CONTACT US</a></div>
			</div>
		</div>
	</footer>

<?php wp_footer(); ?>

</body>
</html>

