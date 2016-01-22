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
	<?php $btnHeadline = get_post_meta(get_the_ID(), 'btn_headline', true); ?>
	
	<footer>
		
		<?php if ( !is_front_page() ) : ?>
			<div class="section timelinevideo-section">
				<div class="container">
					<h3>WHY KQED? WHY NOW?</h3>
				</div>
				<div class="inner-wrapper" style="background-image:url(<?php echo get_template_directory_uri(); ?>/img/timelinevideo-bg.jpg)">
					<a href="https://player.vimeo.com/video/152659437" class="lightbox fancybox.iframe play-btn" class="play-btn"><img src="<?php echo get_template_directory_uri(); ?>/img/timelinevideo-play-icon.png" alt="play button" /></a>
				</div>
			</div>
		<?php endif; ?>
		<div class='container footer-text'>
			<?php if ( is_page('vision') ) : ?>
				<p>Find out how we’ll do this through our Campaign 21 initiative.</p>
			<?php endif; ?>
		</div>
		

		<?php if ( $linkname ) : ?>
			<div class="container">

				<?php if ( $btnHeadline ) : ?>
					<h3><?php echo $btnHeadline; ?></h3>
				<?php endif; ?>

				<a href="<?php echo $url; ?>" class="bold-link">
					<span>
						<?php echo $linkname; ?>
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
				<div class="footer-link"><a href="<?php bloginfo('url'); ?>/contact">CONTACT US</a></div>
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

<?php if ( is_front_page() ) : ?>
<script type="text/javascript">
$(document).ready(function() {
	setInterval(function(){ 
		var ctime = $('.atf-section video').get(0).currentTime;
		var ctime = Math.round(ctime);
		if(ctime == 48){
			$('.atf-section video').get(0).pause();
			$('.atf-section .container #replay-btn').fadeIn(500);
		}
	},1000);
});
</script>
<?php endif; ?>

</body>
</html>

