<?php
/*
Plugin Name: Elite Accordion
Plugin URI: http://elitetheme.net/plugins/elite-accordian/
Description: This plugin will add an expand collapse accordi0n feature inside a post or page.
Author: Elite Theme
Author URI: http://elitetheme.net
Version: 1.0.0
*/
define( 'ELITE_ACCORDIAN', '3.0.2' );
define( 'ELITE_ACCORDIAN__MINIMUM_WP_VERSION', '3.9' );
define( 'ELITE_ACCORDIAN__PLUGIN_URL', plugin_dir_url( __FILE__ ) );
define( 'ELITE_ACCORDIAN__PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
define( 'ELITE_ACCORDIAN_DELETE_LIMIT', 100000 );
// Hooks  functions into the  filters
function my_add_mce_button() {
	// check user permissions
	if ( !current_user_can( 'edit_posts' ) && !current_user_can( 'edit_pages' ) ) {
		return;
	}
	// check if WYSIWYG is enabled
	if ( 'true' == get_user_option( 'rich_editing' ) ) {
		add_filter( 'mce_external_plugins', 'my_add_tinymce_plugin' );
		add_filter( 'mce_buttons', 'my_register_mce_button' );
	}
}
add_action('admin_head', 'my_add_mce_button');

// Declare script for new button
function my_add_tinymce_plugin( $plugin_array ) {
	$plugin_array['my_mce_button'] = plugins_url( '/js/mce-button.js', __FILE__);
	return $plugin_array;
}

// Register new button in the editor
function my_register_mce_button( $buttons ) {
	array_push( $buttons, 'my_mce_button' );
	return $buttons;
}

/*javascript load from wordpress directroy*/

	function elite_accordian_script_latest() {
		wp_enqueue_script( 'jquery');
	}

	add_action( 'init', 'elite_accordian_script_latest' );

	// // main js load
	// wp_enqueue_script( 'main', plugins_url('/js/main.js', __FILE__),array('jquery'),1.0,true);
	// wp_enqueue_script( 'moordanizr', plugins_url('/js/modernizr.js',__FILE__),array('jquery'),1.0,true);
	function main() {
		wp_enqueue_script( 'main', plugins_url('/js/main.js', __FILE__),array('jquery'),1.0,true);
	}

	add_action( 'wp_enqueue_scripts', 'main' );
	  
	function mordanizr_js() {
		wp_enqueue_script( 'moordanizr', plugins_url('/js/modernizr.js',__FILE__),array('jquery'),1.0,true);
	}

	add_action( 'wp_enqueue_scripts', 'mordanizr_js' );


	/* Adding Plugin custm CSS file */
function add_elite_stylesheet() 
{
    wp_enqueue_style( 'elite-accordion-plugin-style', plugins_url('/css/elite_style.css', __FILE__ ) );
    
}

add_action('wp_head', 'add_elite_stylesheet');

/* Generates Toggles Shortcode */
function elite_accordion_main($atts, $content = null) {
	return ('<div class="accordion">'.do_shortcode($content).'</div>');
}
add_shortcode ("eliteaccordion", "elite_accordion_main");

function elite_accordion_toggles($atts, $content = null) {
	extract(shortcode_atts(array(
        'title'      => ''
    ), $atts));
	
	return ('<h3 class="panel-title">'.$title. '</h3> <div class="panel-content"><p>' .$content. '</p></div>');
}
add_shortcode ("elitetoggle", "elite_accordion_toggles");




