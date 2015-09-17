<?php
class MySettingsPage
{
    /**
     * Holds the values to be used in the fields callbacks
     */
    private $options;

    /**
     * Start up
     */
    public function __construct()
    {
        add_action( 'admin_menu', array( $this, 'add_plugin_page' ) );
        add_action( 'admin_init', array( $this, 'page_init' ) );

    }

    /**
     * Add options page
     */
    public function add_plugin_page()
    {
        // This page will be under "Settings"
        add_submenu_page(
            'themes.php', 
            'Impostazioni del tema', 
            'Impostazioni del tema', 
            'manage_options',
            'nalug-theme-settings', 
            array( $this, 'create_admin_page' )
        );
    }

    /**
     * Options page callback
     */
    public function create_admin_page()
    {
        // Set class property
        $this->options = get_option( 'nalug_theme_options' );
        ?>
        <div class="wrap">
            <h2>Impostazioni del tema</h2>           
            <form method="post" action="options.php">
            <?php
                // This prints out all hidden setting fields
                settings_fields( 'nalug_options' );   
                do_settings_sections( 'nalug-theme-setting' );
                submit_button(); 
            ?>
            </form>
        </div>
        <?php
    }

    /**
     * Register and add settings
     */
    public function page_init()
    {        
        register_setting(
            'nalug_options', // Option group
            'nalug_theme_options', // Option name
            array( $this, 'sanitize' ) // Sanitize
        );

        add_settings_section(
            'setting_section_id', // ID
            'My Custom Settings', // Title
            array( $this, 'print_section_info' ), // Callback
            'nalug-theme-setting' // Page
        );  

        add_settings_field(
            'id_number', // ID
            'ID Number', // Title 
            array( $this, 'id_number_callback' ), // Callback
            'nalug-theme-setting', // Page
            'setting_section_id' // Section           
        );      

        add_settings_field(
            'title', 
            'Title', 
            array( $this, 'title_callback' ), 
            'nalug-theme-setting', 
            'setting_section_id'
        );      

        add_settings_section(
            'setting_section_logo',
            'Impostazioni del logo',
            array( $this, 'print_section_info' ),
            'nalug_theme_setting'
        );

        add_settings_field(
            'logo',
            'Caricare il logo',
            array( $this, 'logo_callback' ),
            'nalug_theme_setting',
            'setting_section_logo'
        );
    }

    /**
     * Sanitize each setting field as needed
     *
     * @param array $input Contains all settings fields as array keys
     */
    public function sanitize( $input )
    {
        $new_input = array();
        if( isset( $input['id_number'] ) )
            $new_input['id_number'] = absint( $input['id_number'] );

        if( isset( $input['title'] ) )
            $new_input['title'] = sanitize_text_field( $input['title'] );

        //if( isset( $input['logo'] ) )
        //    $new_input['logo'] =  wp_handle_upload($input["logo"], array('test_form' => false));

        return $new_input;
    }

    /** 
     * Print the Section text
     */
    public function print_section_info()
    {
        print 'Enter your settings below:';
    }

    /** 
     * Get the settings option array and print one of its values
     */
    public function id_number_callback()
    {
        printf(
            '<input type="text" id="id_number" name="nalug_theme_options[id_number]" value="%s" />',
            isset( $this->options['id_number'] ) ? esc_attr( $this->options['id_number']) : ''
        );
    }

    /** 
     * Get the settings option array and print one of its values
     */
    public function title_callback()
    {
        printf(
            '<input type="text" id="title" name="nalug_theme_options[title]" value="%s" />',
            isset( $this->options['title'] ) ? esc_attr( $this->options['title']) : ''
        );
    }

    public function logo_callback()
    {
        printf(
            '<input type="file" id="logo" name="nalug_theme_options[logo]" /><br />%s',
            isset( $this->options['logo'] ) ? esc_attr( $this->options['logo'] ) : ''
          );
    }



}

if( is_admin() )
    $my_settings_page = new MySettingsPage();

    if(! function_exists('nalug_setup')) :
    function nalug_setup(){
      /*
       * Let WordPress manage the document title.
       * By adding theme support, we declare that this theme does not use a
       * hard-coded <title> tag in the document head, and expect WordPress to
       * provide it for us.
       */
      add_theme_support( 'title-tag' );

      //add theme support for post image thumbs
      add_theme_support('post-thumbnails');
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



    // Register NaLug scripts
    function load_scripts(){
      global $wp_scripts;
      if( !is_admin() ){
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
    }
    add_action( 'wp_enqueue_scripts',  'load_scripts'  );

      // register and load NaLUG styles
    function load_styles(){
        global $wp_styles;
        if ( !is_admin() ){
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
      add_action( 'wp_footer', 'custom_scripts_to_footer' );
