
<!doctype html>
<html lang="en-us">
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<script scr="<?php bloginfo('template_directory'); ?>/js/min/main-min.js ?>"></script>
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<body class="intro-page">
	
	<div class="siteintro-wrapper">
		<!-- Intro-Overlay -->
		<div class="overlay intro-overlay">
			<h1><a href="#"><img src="<?php bloginfo('template_directory'); ?>/img/logo.png" alt="KQED logo" /></a></h1>
		</div>
		<p class="skip-btn"><a href="#">Skip <img src="<?php bloginfo('template_directory'); ?>/img/small-arrow-3.png" alt="arrow" /></a></p>
		
		<!-- Intro-Slider -->
		<div class="intro-slider">
			<ul class="slides">
				<li>
					<div class="inner-wrapper">
						<h3>You care about community</h3>
					</div>
				</li>
				<li>
					<div class="inner-wrapper">
						<h3>embrace innovation</h3>
					</div>
				</li>
				<li>
					<div class="inner-wrapper">
						<h3>celebrate diversity</h3>
					</div>
				</li>
				<li>
					<div class="inner-wrapper">
						<h3>value lifelong learning</h3>
					</div>
				</li>
				<li>
					<div class="inner-wrapper">
						<h3>and believe media can build a more informed, connected and empowered society.</h3>
					</div>
				</li>
				<li>
					<div class="inner-wrapper">
						<h3>You are KQED.</h3>
					</div>
				</li>
				<li>
					<div class="inner-wrapper">
						<div class="content-wrapper">
							<h2>Welcome to <br> the future.</h2>
							<h3>KQED is transforming today to meet the needs of tomorrow’s Bay Area.</h3>
							<form method='post'>
								<input class='input_email' type='text' name='access_email' size='32' />
								<input type='submit' class='input_submit' name='Submit' value="<?php get_option('prompt_submit') ?>">
							</form>
						</div>
					</div>
				</li>
			</ul>
		</div>
	</div>

	<!-- Javascript -->
	<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/min/main-min.js"></script>
</body>
</html>
