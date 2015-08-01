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
// Register NaLug scripts
function nalug_scripts(){
	wp_enqueue_style('fontawesome','https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css',array(), null);
}
add_action( 'wp_enqueue_scripts', 'nalug_scripts' );
