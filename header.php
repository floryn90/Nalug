<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<!--[if lt IE 9]>
	<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/html5.js"></script>
	<![endif]-->
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?> data-spy="scroll" data-target="#my-navbar">
	<div class="container">
		<?php if ( has_nav_menu( 'primary' )) : ?>
			<div class="masthead">
				<div class="container">
					<div id="my-navbar" class="navbar navbar-wrapper nav-fixed navbar-collapse">
						<?php
							// Primary navigation menu.
							wp_nav_menu( array(
								'theme_location' => 'primary'
							) );
						?>
					</div>
				</div><!-- container -->
			</div><!--navbar-background-->
		<?php endif; ?>
	</div>
	<div class="container">
