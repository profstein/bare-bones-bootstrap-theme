<?php
/**
 * Require the wp_bootstrap_navwalker file that will allow for Bootstrap nav menus to be used with the built-in WP menu system
 */
require get_template_directory() . '/vendor/wp_bootstrap_navwalker.php';




// Add in support for featured images, custom image sizes, set default nav menu, 
function bare_bones_setup() {
    /*
    * ADD THEME SUPPORT
    * Docs here: https://codex.wordpress.org/Function_Reference/add_theme_support
    */
    
    if ( function_exists( 'add_theme_support' ) ) {
         https://codex.wordpress.org/Post_Thumbnails
        add_theme_support('automatic-feed-links'); // adds rss feed information to pages
        add_theme_support('html5', array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption'
        ));
        add_theme_support( 'title-tag' ); // see for more info: https://codex.wordpress.org/Title_Tag

        /*
        * FEATURED IMAGES
        */
        //The following lines allow for featured images and tells WP what sizes to make available when you upload an image. More info here: https://codex.wordpress.org/Post_Thumbnails#Add_New_Post_Thumbnail_Sizes
        add_theme_support('post-thumbnails'); //This enables featured images:
        set_post_thumbnail_size( 150, 150, true ); // default thumb size (true means it is cropped)

        // additional image sizes
        add_image_size( 'post-featured', 1250, 9999 ); //1250 pixels wide (and unlimited height)
        add_image_size( 'post-large', 800, 600, true ); //800 wide by 600 high (cropped)
        add_image_size( 'post-medium', 600, 340, true ); //600 wide by 340 high (cropped)
    
    }// end if that checks for add_theme_support
    
    /*
    * ADD NAVIGATION MENU
    */
    register_nav_menu('primary', 'Primary Menu'); //register's the main menu

}
add_action('after_setup_theme','bare_bones_setup');


 /*
* ADD IN EXTERNAL CSS AND JS (BOOTSTRAP and others)
*/

function bare_bones_bootstrap_enqueue_scripts() {
	$template_url = get_template_directory_uri();
	// jQuery.
	wp_enqueue_script( 'jquery' );
	// Bootstrap
	wp_enqueue_script( 'bootstrap-script', $template_url . '/js/bootstrap.min.js', array( 'jquery' ), null, true );
	wp_enqueue_style( 'bootstrap-style', $template_url . '/css/bootstrap.min.css' );
	//Main Style
	wp_enqueue_style( 'main-style', get_stylesheet_uri() );
	// Load Thread comments WordPress script.
	if ( is_singular() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'bare_bones_bootstrap_enqueue_scripts', 1 );





?>