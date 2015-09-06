<?php

if(! function_exists('nalug_setup')) :

function nalug_setup(){
	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu',      'nalug' ),
		'social'  => __( 'Social Links Menu', 'nalug' ),
	) );

}
endif; // nalug_setup
add_action( 'after_setup_theme', 'nalug_setup' );

// setting the custom menu settings
function remove_nav_container($args = ''){
	$args['container'] = 'nav';
  $args['container_class'] = false;
	$args['items_wrap'] = '<ul class="sf-menu">%3$s</ul>';
	return $args;
}
add_filter('wp_nav_menu_args', 'remove_nav_container');

// adding a custom class to active menu item
add_filter('nav_menu_css_class', 'custom_class_item', 10, 2);
function custom_class_item($classes, $item){
	if ( in_array('current-menu-item', $classes) ){
		$classes[] = 'active ';
	}
	return $classes;
}


// Nalug settings page
function theme_settings_page(){
	?>
		<div class="wrap">
		<h1>NaLUG Theme Settings page</h1>
		<form method="post" action="options.php">
				<?php
						settings_fields("section");
						do_settings_sections("nalug-settings");
						submit_button();
				?>
		</form>
		</div>
<?php
}
//Insert an input type element to nalug settings page
function logo_display()
{
    ?>
        <input type="file" name="logo" />
        <?php echo get_option('logo'); ?>
   <?php
}
// Function to handle upload logo file
function handle_logo_upload()
{
    if(!empty($_FILES["demo-file"]["tmp_name"]))
    {
        $urls = wp_handle_upload($_FILES["logo"], array('test_form' => FALSE));
        $temp = $urls["url"];
        return $temp;
    }

    return $option;
}


function display_theme_panel_logo(){
	add_settings_section("section", "Logo Settings", null, "nalug-settings");
  add_settings_field("logo", "Logo", "logo_display", "nalug-settings", "section");
	register_setting("section", "logo", "handle_logo_upload");
}
add_action("admin_init", "display_theme_panel_logo");



// Display Twitter input element
function display_twitter_element()
{
    ?>
        <input type="text" name="twitter_url" id="twitter_url" value="<?php echo get_option('twitter_url'); ?>" />
    <?php
}
// Dispaly Facebook input element
function display_facebook_element()
{
    ?>
        <input type="text" name="facebook_url" id="facebook_url" value="<?php echo get_option('facebook_url'); ?>" />
    <?php
}
// Register twitter and facebook elements to nalug settings page
function display_theme_panel_social_fields()
{
    add_settings_section("section", "Social Settings", null, "nalug-settings");

    add_settings_field("twitter_url", "Twitter Profile Url", "display_twitter_element", "nalug-settings", "section");
    add_settings_field("facebook_url", "Facebook Profile Url", "display_facebook_element", "nalug-settings", "section");
		register_setting("section", "twitter_url");
    register_setting("section", "facebook_url");

}
add_action("admin_init", "display_theme_panel_social_fields");


/**
*		Add an voice menu to admin menu for theme settings
*/
function add_theme_menu_item()
{
    add_menu_page("NaLUG Settings", "NaLUG Settings", "manage_options", "nalug-settings", "theme_settings_page", null, 99);
}
add_action("admin_menu", "add_theme_menu_item");


//change jquery 
function change_jquery(){
  wp_deregister_script('jquery');
  wp_register_script('jquery', get_template_directory_uri() . '/js/jquery.js', false, 'v1.11.1');
  wp_enqueue_script('jquery');

  wp_deregister_script('jquery-migrate');
  wp_register_script('jquery-migrate', get_template_directory_uri() . '/js/jquery-migrate-1.2.1.js', false, 'v1.2.1');
  wp_enqueue_script('jquery-migrate');  

}
add_action('init', 'change_jquery');
// Register NaLug scripts
function load_scripts(){
	global $wp_scripts;

	wp_enqueue_script('camera', get_template_directory_uri() . '/js/camera.js', array('jquery'), 'v0.1', true);
  wp_enqueue_script('carousel', get_template_directory_uri() . '/js/owl.carousel.js', array('jquery'), 'v0.1', true);
	wp_enqueue_script('stellar', get_template_directory_uri() . '/js/jquery.stellar.js', array('jquery'), 'v0.1', true);
  wp_enqueue_script('script', get_template_directory_uri() . '/js/script.js', array('jquery'), 'v0.1', true);

  //load script and add conditional if for ie 9
  wp_enqueue_script('jquery-mobile', get_template_directory_uri() . '/js/jquery.mobile.customized.min.js', array('jquery'), 'v0.1', true);
  //$wp_scripts->add_data('jquery-mobile', 'conditional', '(gt IE 9)|!(IE)');
  //load script and add conditional if for ie 9
	wp_enqueue_script('wow', get_template_directory_uri() . '/js/wow.js', array('jquery'), 'v0.1', true);
	//$wp_scripts->add_data('wow', 'conditional', '(gt IE 9)|!(IE)');

	//load script and add conditional if for ie 9
	wp_enqueue_script('html5shiv', get_template_directory_uri() . '/js/html5shiv.js', array('jquery'), 'v0.1', true);
	$wp_scripts->add_data('html5shiv', 'conditional', 'lt IE 9');


	wp_enqueue_script('jquery-cookie', get_template_directory_uri() . '/js/jquery.cookie.js', array('jquery'), 'v0.1', true);
	wp_enqueue_script('TMForm', get_template_directory_uri() . '/js/TMForm.js', array(), 'v0.1', true);
	wp_enqueue_script('modal', get_template_directory_uri() . '/js/modal.js', array(), 'v0.1', true);
	wp_enqueue_script('device', get_template_directory_uri() . '/js/device.min.js', array(), 'v0.1', true);
	wp_enqueue_script('tmstickup', get_template_directory_uri() . '/js/tmstickup.js', array(), 'v0.1', true);
	wp_enqueue_script('jquery-easing', get_template_directory_uri() . '/js/jquery.easing.1.3.js', array('jquery'), 'v1.3', true);
	wp_enqueue_script('jquery-ui-to-top', get_template_directory_uri() . '/js/jquery.ui.totop.js', array('jquery'), 'v1.3', true);
	wp_enqueue_script('jquery-mousewheel', get_template_directory_uri() . '/js/jquery.mousewheel.min.js', array('jquery'), 'v1.3', true);
	wp_enqueue_script('jquery-simplr-smoothscroll-min', get_template_directory_uri() . '/js/jquery.simplr.smoothscroll.min.js', array('jquery'), 'v1.3', true);
	wp_enqueue_script('superfish', get_template_directory_uri() . '/js/superfish.js', array(), 'v1.3', true);
	wp_enqueue_script('jquery-mobilemenu', get_template_directory_uri() . '/js/jquery.mobilemenu.js', array('jquery'), 'v1.3', true);

	//wp_enqueue_script('bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), 'v3.3.5', 'all');

}
add_action( 'wp_enqueue_scripts', 'load_scripts' );

// register and load NaLUG styles
function load_styles(){
	global $wp_styles;

	wp_enqueue_style( 'grid', get_template_directory_uri() . '/css/grid.css', array(), 'v0.1'.time(), 'all');
	wp_enqueue_style( 'style', get_template_directory_uri() . '/css/style.css', array(), 'v0.1'.time(), 'all');
  wp_enqueue_style( 'camera', get_template_directory_uri() . '/css/camera.css', array(), 'v0.1'.time(), 'all');
	wp_enqueue_style( 'carousel', get_template_directory_uri() . '/css/owl.carousel.css', array(), 'v0.1'.time(), 'all');
  wp_enqueue_style( 'fontawesome','//maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css',array(), null);

	//some google font
	wp_enqueue_style( 'open-sans', '//fonts.googleapis.com/css?family=Open+Sans:700,400,300' );
	wp_enqueue_style( 'marvel', '//fonts.googleapis.com/css?family=Marvel:400,700' );

	//load style and add conditional if for ie 9
	wp_enqueue_style( 'ie', get_template_directory_uri() . '/css/ie.css', array(), 'v1.0'.time(),'all' );
	$wp_styles->add_data('ie', 'conditional', 'lt IE 9');
}
add_action( 'wp_enqueue_scripts', 'load_styles' );

//add scripts to wp_footer
function custom_scripts_to_footer(){ ?>
  <script type='text/javascript'>
    jQuery(function(){
      jQuery('#camera_wrap').camera({
        height: '34.58333333333333%',
        thumbnails: false,
        pagination: true,
        fx: 'simpleFade',
        loader: 'none',
        hover: false,
        navigation: false,
        playPause: false,
        minHeight: "139px",
      });
    });
  </script>
  <script type='text/javascript'>
    $(document).ready(function($) {
      $(".owl-carousel").owlCarousel({
        navigation: true,
        pagination: false,
        items : 3,
        itemsDesktop : [1199,3],
        itemsDesktopSmall : [979,3],
        itemsTablet: [750,1],
        itemsMobile : [479,1],
        navigationText: false
      });
    });
  </script>
  <script type='text/javascript'>
    $(document).ready(function($) {
      if ($('html').hasClass('desktop')) {
        $.stellar({
          horizontalScrolling: false,
          verticalOffset: 20,
          resposive: true,
          hideDistantElements: true,
        });
      }
    });
  </script>
<?php }
add_action('wp_footer', 'custom_scripts_to_footer');
