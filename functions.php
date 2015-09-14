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
// Add specific CSS class by filter
function my_class_names( $classes ) {
  // add 'class-name' to the $classes array
  
  if( is_home()){
    $classes = array('index');
  }elseif( is_page("about-us") ){
    $classes = array("index-1");
  }
  // return the $classes array
  return $classes;
}
add_filter( 'body_class', 'my_class_names' );


add_action( 'admin_menu', 'nalug_add_admin_menu' );
add_action( 'admin_init', 'nalug_register_settings' );

function nalug_add_admin_menu(  ) { 

  add_submenu_page( 'themes.php', 'Theme Settings', 'Theme Settings', 'manage_options', 'nalug-settings', 'nalug_options_page', 'settings' );

}


function nalug_options_page(  ) { 

  ?>
  <form action='options.php' method='post' enctype="multipart/form-data">
    
    <h2>Nalug Theme Settings page</h2>
    
    <?php 
          settings_fields('nalug_theme_options'); 
        
          do_settings_sections('nalug_theme_options.php');
        ?>
            <p class="submit">  
                <input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />  
            </p>  
            
    
  </form>
        <p>Created by <a href="http://www.florinlungu.it">Florin Lungu</a>.</p>
  <?php

}


/**
 * Function to register the settings
 */
function nalug_register_settings()
{
    // Register the settings with Validation callback
    register_setting( 'nalug_theme_options', 'nalug_theme_options', 'nalug_validate_settings' );

    add_settings_section('nalug_logo_section', "Logo", 'nalug_display_section', 'nalug_theme_options.php');

    $field_args = array(
      'type'      => 'logo',
      'id'        => 'nalug_logo',
      'name'      => 'nalug_logo',
      'desc'      => 'Carica il logo del sito',
      'std'       => '',
      'label_for' => 'nalug_logo',
      'class'     => 'css_class'
    );
    add_settings_field('nalug_logo', 'Logo del sito', 'nalug_display_setting', 'nalug_theme_options.php', 'nalug_logo_section', $field_args);

    // Add settings section
    add_settings_section( 'nalug_text_section', 'Text box Title', 'nalug_display_section', 'nalug_theme_options.php' );

    // Create textbox field
    $field_args = array(
      'type'      => 'text',
      'id'        => 'nalug_textbox',
      'name'      => 'nalug_textbox',
      'desc'      => 'Example of textbox description',
      'std'       => '',
      'label_for' => 'nalug_textbox',
      'class'     => 'css_class'
    );

    add_settings_field( 'nalug_textbox', 'Example Textbox', 'nalug_display_setting', 'nalug_theme_options.php', 'nalug_text_section', $field_args );



}

/**
 * Function to add extra text to display on each section
 */
function nalug_display_section($section){ 

}

/**
 * Function to display the settings on the page
 * This is setup to be expandable by using a switch on the type variable.
 * In future you can add multiple types to be display from this function,
 * Such as checkboxes, select boxes, file upload boxes etc.
 */
function nalug_display_setting($args)
{
    extract( $args );

    $option_name = 'nalug_theme_options';

    $options = get_option( $option_name );

    switch ( $type ) {  
          case 'logo':
              $options[$id] = stripcslashes($options[$id]);
              $options[$id] = esc_attr($options[$id]);
              echo "<input type='file' id='$id' name='".$option_name ."[$id]' value='$options[$id]' />";
              echo ($desc != '') ? "<br /><span class='description'>$desc</span>" : ""; 
              echo "<hr>";
          break;
          case 'text':   
              $options[$id] = stripslashes($options[$id]);  
              $options[$id] = esc_attr( $options[$id]);  
              echo "<input class='regular-text$class' type='text' id='$id' name='" . $option_name . "[$id]' value='$options[$id]' />";  
              echo ($desc != '') ? "<br /><span class='description'>$desc</span>" : "";  
          break;  
    }
}

/**
 * Callback function to the register_settings function will pass through an innalugt variable
 * You can then validate the values and the return variable will be the values stored in the database.
 */
function nalug_validate_settings($input)
{
  foreach($innalugt as $k => $v)
  {
    $newinput[$k] = trim($v);
    
    // Check the innalugt is a letter or a number
    if(!preg_match('/^[A-Z0-9 _]*$/i', $v)) {
      $newinput[$k] = '';
    }
  }

  return $newinput;
}


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