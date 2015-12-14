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
		<?php if ( is_front_page() ) : ?>
			<div class='container footer-text'>
				<p>Find out how we’ll do this through our Campaign 21 initiative.</p>
			</div>
		<?php endif; ?>
		<?php if ( $linkname ) : ?>
			<div class="container">
				<a href="<?php echo $url; ?>" class="bold-link">
					<span data-text="<?php echo $linkname; ?>">
						<?php echo $linkname; ?><img src="<?php bloginfo('template_directory'); ?>/img/arrow.png" alt="arrow" />
					</span>
				</a>
			</div>
		<?php endif; ?>
		<?php if ( is_404() ) : ?>
			<div class="container">
				<a href="/" class="bold-link">
					<span data-text="KQED.com">
						KQED.com<img src="<?php bloginfo('template_directory'); ?>/img/arrow.png" alt="arrow" />
					</span>
				</a>
			</div>
		<?php endif; ?>
		
		<div class="footer-bar">
			<div class="container">
				<p class="copyright-note">© KQED 2015</p>
				<div class="footer-link"><a href="mailto:johnboland@kqed.org">CONTACT US</a></div>
			</div>
		</div>
	</footer>

<?php wp_footer(); ?>
<?php $access_code = $_COOKIE['access_code']; ?>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
  
  ga('create', 'UA-67164516-1', 'auto');
  ga('set', 'dimension1', "<?php echo $access_code ?>");
  ga('send', 'pageview', {'title': '<?php echo $access_code ?>'});

  ga('create', 'UA-1538528-1', 'auto', {'name': 'clientTracker'});  // clients tracker.
  ga('clientTracker.set', 'dimension1', "<?php echo $access_code ?>");
  ga('clientTracker.send', 'pageview', {'title': '<?php echo $access_code ?>'});
  
</script>

</body>
</html>

