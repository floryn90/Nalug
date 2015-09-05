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
	<div class="container-fluid">
		<?php if ( has_nav_menu( 'primary' )) : ?>
			<div id="bootstrap-menu" class="navbar navbar-default navbar-fixed-top" role="navigation">
				<div class="container">
					<div class="navbar-header">
						<a class="navbar-brand" href="#">Brand</a>
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-menubuilder"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
						</button>
					</div>
					<?php
						// Primary navigation menu.
						wp_nav_menu( array(
							'theme_location' => 'primary'
						) );
					?>
				</div><!--.container-fluid -->
			</div><!--.bootstrap-menu-->
		<?php endif; ?>
	</div><!--.container -->
	<div class="container">
