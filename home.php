<?php get_header(); ?>
<!--=======content================================-->

<section id="content">
	<div class="full-width-container block-1">
		<div class="camera_container">
			<div id="camera_wrap">
				<div class="item" data-src="<?php echo get_template_directory_uri() . '/images/index_img_slider-1.jpg'; ?>">
					<div class="camera_caption fadeIn">
						<h3>We'll Give Your Business Fresh Ideas</h3>
						<p>Contact Us by</p>
						<a href="#" class="btn bd-ra"><span class="fa fa-envelope-o"></span></a>
						<a href="#" class="btn bd-ra"><span class="fa fa-phone"></span></a>
						<a href="#" class="btn bd-ra"><span class="fa fa-map-marker"></span></a>
					</div>
				</div>
				<div class="item" data-src="<?php echo get_template_directory_uri() . '/images/index_img_slider-2.jpg'; ?>">
					<div class="camera_caption fadeIn">
						<h3>We'll Make You Noticeable</h3>
						<p>Contact Us by</p>
						<a href="#" class="btn bd-ra"><span class="fa fa-envelope-o"></span></a>
						<a href="#" class="btn bd-ra"><span class="fa fa-phone"></span></a>
						<a href="#" class="btn bd-ra"><span class="fa fa-map-marker"></span></a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="full-width-container block-2">
		<div class="container">
			<div class="row">
			<?php if ( have_posts() ) : ?>
				<?php while( have_posts()) : the_post(); ?>
					<?php if ( basename( get_permalink() ) == 'about' ) :?>
						<div class="grid_12">
							<header>
								<h2><span><?php echo the_title(); ?></span></h2>
							</header>
						</div>
						<div class="grid_4">
							<div class="img_container"><?php echo (has_post_thumbnail() ) ? the_post_thumbnail() : ''; ?></div>
						</div>
						<div class="grid_7 preffix_1">
							<?php echo the_content(); ?>
							<a href="<?php echo esc_url(get_permalink(get_page_by_title('About Us'))); ?>" class="btn">more</a>
						</div>
					<?php endif; ?>
				<?php endwhile; ?>
			<?php endif; ?>
			</div>
		</div>
	</div>
	<div class="full-width-container block-3 parallax-block" data-stellar-background-ratio="0.5">
		<div class="container">
			<div class="row">
				<div class="grid_12">
					<header>
						<h2><span>Riunioni ed eventi</span></h2>
					</header>
				</div>
				<div class="grid_6">
					<div class="element"><h3>Ultime riunioni</h3></div>
					<div class="box">
						<p>qui deve venire il box riunioni</p>
					</div>
				</div>
				<div class="grid_6">
					<div class="element"><h3>Ultime novità</h3></div>
					<div class="box">
						<p>qui deve venire il box novità</p>
					</div>	
				</div>
			</div>
		</div>
	</div>
	<div class="full-width-container block-4">
		<div class="container">
			<div class="row">
				<div class="grid_12">
					<header>
						<h2><span>News</span></h2>
					</header>
				</div>
			</div>
			<div class="row">
				<div id="owl-carousel" class="owl-carousel">
					<div class="grid_4">
						<div class="">
							<div class="img_container"><img src="<?php echo get_template_directory_uri() . '/images/index_img-1.jpg'; ?>" alt="img"></div>
							<div class="owl-text">Lorem ipsum</div>
						</div>
					</div>
					<div class="grid_4">
						<div class="">
							<div class="img_container"><img src="<?php echo get_template_directory_uri() . '/images/index_img-2.jpg'; ?>" alt="img"></div>
							<div class="owl-text">Derto minert</div>
						</div>
					</div>
					<div class="grid_4">
						<div class="">
							<div class="img_container"><img src="<?php echo get_template_directory_uri() . '/images/index_img-3.jpg'; ?>" alt="img"></div>
							<div class="owl-text">Sedrotr selimto</div>
						</div>
					</div>
					<div class="grid_4">
						<div class="">
							<div class="img_container"><img src="<?php echo get_template_directory_uri() . '/images/index_img-2.jpg'; ?>" alt=""></div>
							<div class="owl-text">Derto minert</div>
						</div>
					</div>
					<div class="grid_4">
						<div class="">
							<div class="img_container"><img src="<?php echo get_template_directory_uri() . '/images/index_img-3.jpg'; ?>" alt=""></div>
							<div class="owl-text">Sedrotr selimto</div>
						</div>
					</div>
					<div class="grid_4">
						<div class="">
							<div class="img_container"><img src="<?php echo get_template_directory_uri() .'/images/index_img-1.jpg'; ?>" alt=""></div>
							<div class="owl-text">Lorem ipsum</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="full-width-container block-5">
		<div class="container">
			<div class="row">
				<div class="grid_12">
					<header>
						<h2><span>Job offers</span></h2>
					</header>
				</div>
				<div class="grid_4">
					<article>
						<h3><a href="#">November 2014</a></h3>
						<p>Gamus at magna non nunc tristique rhoncuseri tym. Aliquam nibh ante, egestas id dictum aterert commodo re luctus libero. Praesent faucibus malesuada cibuste.</p>
						<a href="#" class="btn">More</a>
					</article>
				</div>
				<div class="grid_4">
					<article>
						<h3><a href="#">March 2015</a></h3>
						<p>Damus at magna non nunc tristique rhoncuseri tym. Aliquam nibh ante, egestas id dictum aterert commodo re luctus libero. Praesent faucibus malesuada cibust.</p>
						<a href="#" class="btn">More</a>
					</article>
				</div>
				<div class="grid_4">
					<article>
						<h3><a href="#">June 2015</a></h3>
						<p>Jamus at magna non nunc tristique rhoncuseri tym. Aliquam nibh ante, egestas id dictum aterert commodo re luctus libero. Praesent faucibus malesuadaonec. </p>
						<a href="#" class="btn">More</a>
					</article>
				</div>
			</div>
		</div>
	</div>
</section>

<?php get_footer(); ?>
