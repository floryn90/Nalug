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
				<div class="grid_12">
				<?php $post = get_posts(array("name" => get_option('about-slug'))); ?>
					<header>
						<h2><span><?php echo $post[0]->post_title; ?></span></h2>
					</header>
				</div>
				<div class="grid_4">
					<div class="img_container"><img src="<?php echo get_option('nalug_theme_options')['about-image'] ?>" alt="img"></div>
				</div>
				<div class="grid_7">
					<?php echo geT_post_field('post_content', $post[0]->ID); ?>
					<!-- <?php $content =  apply_filters('the_content', $post[0]->post_content); $content = str_replace( ']]>', ']]&gt;', $content ); echo $content; ?>-->
					<a href="<?php echo $post[0]->post_link; ?>" class="btn">more</a>
				</div>
			</div>
		</div>
	</div>
	<div class="full-width-container block-3 parallax-block" data-stellar-background-ratio="0.5">
		<div class="container">
			<div class="row">
				<div class="grid_12">
					<header>
						<h2><span>Services</span></h2>
					</header>
				</div>
				<div class="grid_4">
					<div class="element"><h3><a href="#">Branding</a></h3></div>
				</div>
				<div class="grid_4">
					<div class="element"><h3><a href="#">Graphic Design</a></h3></div>
				</div>
				<div class="grid_4">
					<div class="element"><h3><a href="#">Film + Video</a></h3></div>
				</div>
				<div class="grid_4">
					<div class="element"><h3><a href="#">Social Media</a></h3></div>
				</div>
				<div class="grid_4">
					<div class="element"><h3><a href="#">Website Marketing</a></h3></div>
				</div>
				<div class="grid_4">
					<div class="element"><h3><a href="#">Media & Design</a></h3></div>
				</div>
			</div>
		</div>
	</div>
	<div class="full-width-container block-4">
		<div class="container">
			<div class="row">
				<div class="grid_12">
					<header>
						<h2><span>Projects</span></h2>
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
						<h2><span>News</span></h2>
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
