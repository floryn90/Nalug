<?php
/**
 * Template Name: Page Author
 * @package: Nalug Theme
 * @author: Nalug Web Team
 */
?>

<?php get_header(); ?>

<!--=======content================================-->

<section id="content">
	<div class="full-width-container block-1">
		<div class="container">
			<div class="row">
				<div class="grid_12">
					<header>
						<h2><span><?php echo the_title(); ?></span></h2>
					</header>
				</div>
				<div class="grid_4">
					<div class="img_container"><img src="<?php echo get_template_directory_uri() . '/images/index-1_img-1.jpg'; ?>" alt="img"></div>
				</div>
				<div class="grid_7 preffix_1">
					<?php if( have_posts() ) : ?>
						<?php while(have_posts()) : the_post(); ?>
							<?php echo the_content(); ?>
							<a href="#" class="btn">More</a>
						<?php endwhile; ?>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
	<div class="full-width-container block-2 parallax-block" data-stellar-background-ratio="0.5">
		<div class="container">
			<div class="row">
				<div class="grid_12">
					<header>
						<h2><span>Our Team</span></h2>
					</header>
				</div>
				<div class="grid_3">
					<article>
						<div class="img_container"><img src="<?php echo get_template_directory_uri() . '/images/index-1_img-2.jpg'; ?>" alt="our team"></div>
						<h4>Mark Gret</h4>
						<p>Lamus at magna non derto merli seworet gertomin</p>
					</article>
				</div>
				<div class="grid_3">
					<article>
						<div class="img_container"><img src="<?php echo get_template_directory_uri() . '/images/index-1_img-3.jpg'; ?>" alt="our team"></div>
						<h4>Irma Anderson</h4>
						<p>Lamus at magna non derto merli seworet gertomin</p>
					</article>
				</div>
				<div class="grid_3">
					<article>
						<div class="img_container"><img src="<?php echo get_template_directory_uri() . '/images/index-1_img-4.jpg'; ?>" alt="our team"></div>
						<h4>Sam Wood</h4>
						<p>Lamus at magna non derto merli seworet gertomin</p>
					</article>
				</div>
				<div class="grid_3">
					<article>
						<div class="img_container"><img src="<?php echo get_template_directory_uri() . '/images/index-1_img-5.jpg'; ?>" alt="our team"></div>
						<h4>Kevin Thomson</h4>
						<p>Lamus at magna non derto merli seworet gertomin</p>
					</article>
				</div>
			</div>
		</div>
	</div>
	<div class="full-width-container block-3">
		<div class="container">
			<div class="row">
				<div class="grid_12">
					<header>
						<h2><span>Why Choose Us</span></h2>
					</header>
				</div>
				<div class="grid_4">
					<div class="grid_1 alpha"><span class="element bd-ra">1</span></div>
					<div class="grid_3">
						<p>Gamus at magna non nunc tristique rhoncuseri tym. Aliquam nibh ante, egestas id dictum aterert commodo re luctus libero. Praesent faucibus malesuada cibuste. Donec laoreet metus id laoreet malesuada. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam consectetur orci sed </p>
					</div>
				</div>
				<div class="grid_4">
					<div class="grid_1 alpha"><span class="element bd-ra">2</span></div>
					<div class="grid_3">
						<p>Kamus at magna non nunc tristique rhoncuseri tym. Aliquam nibh ante, egestas id dictum aterert commodo re luctus libero. Praesent faucibus malesuada cibuste. Donec laoreet metus id laoreet malesuada. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam consectetur orci sed </p>
					</div>
				</div>
				<div class="grid_4">
					<div class="grid_1 alpha"><span class="element bd-ra">3</span></div>
					<div class="grid_3">
						<p>Tamus at magna non nunc tristique rhoncuseri tym. Aliquam nibh ante, egestas id dictum aterert commodo re luctus libero. Praesent faucibus malesuada cibuste. Donec laoreet metus id laoreet malesuada. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam consectetur orci se </p>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<?php get_footer(); ?>
