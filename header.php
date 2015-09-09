<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name = "format-detection" content = "telephone=no" />
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<!--[if lt IE 8]>
	<div style=' clear: both; text-align:center; position: relative;'>
	 <a href="http://windows.microsoft.com/en-US/internet-explorer/products/ie/home?ocid=ie6_countdown_bannercode">
		 <img src="images/ie8-panel/warning_bar_0000_us.jpg" border="0" height="42" width="820" alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today." />
	 </a>
	</div>
	<![endif]-->
	<?php wp_head(); ?>
	 <!-- <script>var $ = jQuery.noConflict();</script>-->
	<!--[if (gt IE 9)|!(IE)]><!-->
	<script>
		$(document).ready(function () {
			if ($('html').hasClass('desktop')) {
				new WOW().init();
			}
		});
	</script>
	<!--<![endif]-->
</head>
<body <?php body_class(); ?>>
	<!--==============================header=================================-->
	<header id="header">
		<div id="stuck_container">
			<div class="container">
				<div class="row">
					<div class="grid_12">
						<?php if (empty(get_option('logo'))) : ?>
							<h1><a href="<?php echo home_url(); ?>">NaLUG</a><span>Napoli GNU/Linux User Group</span></h1>
						<?php else: ?>
							<a href="<?php echo home_url(); ?>"><img alt="<?php echo bloginfo('title'); ?>" src="<?php echo get_option('logo'); ?>" /></a>
						<?php endif;	?>
						<?php
							// Primary navigation menu.
							wp_nav_menu( array(
								'theme_location' => 'primary'
							) );
						?>
					</div>
				</div>
			</div>
		</div>
	</header>
