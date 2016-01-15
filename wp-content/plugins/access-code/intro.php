
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

<!-- 			else {
							echo $error_message; 
						}
						?> -->
<?php if ($error_message == NULL) { ?> 

<audio id="splash-audio" autoplay>
  <source src="<?php echo get_template_directory_uri(); ?>/img/57_full_human-evolution_0178.mp3" type="audio/mpeg">
</audio>
			

<body class="intro-page">
	<section class="atf-section intro">
				<div class="container">
					<a href="#" id="mute-btn"><i class="fa fa-volume-up"></i><i class="fa fa-volume-off"></i></a>
				</div>
			</section>
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
						<h3>You</h3>
					</div>
				</li>
				<li>
					<div class="inner-wrapper">
						<h3>care about community</h3>
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
						
						<h3>
							<span class="welcome">Welcome to<br>the future. </span> <br>
							KQED is transforming today to meet the needs of tomorrow’s Bay Area.
						</h3>
					</div>
				</li>
				<li>
					<div class="inner-wrapper">
						<h3> 
							<span class="welcome">Welcome to<br>the future. </span> <br>
							KQED is transforming today to meet the needs of tomorrow’s Bay Area.
						</h3>
					</div>
				</li>
			</ul>
		</div>

		<div class="main-content">
			<div class="inner-wrapper">
				<h3 class="last">Start exploring now. <br/> Enter your password to get started.</h3>
				<div class="content-wrapper">
					
					<form method='post'>
						<input class='input_email' type='text' name='access_email' size='32' placeholder="ACCESS CODE" />
						<input type='submit' class='input_submit' name='Submit' value="<?php get_option('prompt_submit') ?>">
					</form>
					<div class="forgot">
						<p><a href="mailto:mhealy@kqed.org">Forgot your password?</a></p>
						<p><a href="mailto:mhealy@kqed.org">Need a password? Contact us here.<a/></p>
					</div?
				</div>
			</div>
		</div>
			
	</div>

	<!-- Javascript -->
	<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/min/main-min.js"></script>
</body>
<?php } else {  ?>

<body class="intro-page">
	<section class="atf-section intro checkerr">
				<div class="container">
					<a href="#" id="mute-btn"><i class="fa fa-volume-up"></i><i class="fa fa-volume-off"></i></a>
				</div>
			</section>
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
						<h3>Yous</h3>
					</div>
				</li>
				<li>
					<div class="inner-wrapper">
						<h3>care about community</h3>
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
						<h3>You are KQEDa.</h3>
					</div>
				</li>
				<li>
					<div class="inner-wrapper">
						<h3>You are KQEDb.</h3>
					</div>
				</li>
				<li>
					<div class="inner-wrapper">
						<h3>You are KQED.</h3>
					</div>
				</li>
				<li>
					<div class="inner-wrapper">
						<h2>Welcome to <br> the future.</h2>
						<h3>KQED is transforming today to meet the needs of tomorrow’s Bay Area.</h3>
					</div>
				</li>
			</ul>
		</div>

		<div class="main-content">
			<div class="inner-wrapper">
				<h3 class="last">Start exploring now <br/> enter your password to get started.</h3>
				<div class="content-wrapper">
					
					<form method='post'>
						<input class='input_email' type='text' name='access_email' size='32' placeholder="ACCESS CODE" />
						<input type='submit' class='input_submit' name='Submit' value="<?php get_option('prompt_submit') ?>">
						<div class="intro-error">That password is incorrect. Please try again</div>
					</form>
					<div class="forgot">
						<p><a href="mailto:mhealy@kqed.org">Forgot your password?</a></p>
						<p><a href="mailto:mhealy@kqed.org">Need a password? Contact us here.<a/></p>
					</div?
				</div>
			</div>
		</div>
			
	</div>

	<!-- Javascript -->
	<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/min/main-min.js"></script>
</body>

<?php } ?>
</html>
