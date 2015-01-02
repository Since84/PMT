<?php 
/**
 * Spark Main Single Page Template
 * 
 * This is the base for all templates within spark.
 * It includes the global header and footer.
 * The home page will default to this template ( home.php ) unless otherwise configured. 
 * 
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Spark
 * @subpackage SparkFifteen
 * @since SparkFifteen 1.0
 */ 
wp_head();
global $post;

$context = Timber::get_context();

//Header Section ( Using SparkHeader Class )
$sparkHeader = new SparkHeader(array(
  'showLogo'      =>  true
  ,'headerRight'  =>  'sidebars/sidebar-social.php' //Template for right side ( /views/components/... )
  ,'nav'          =>  'nav' //Menu name for nav menu
  ,'template'     =>  'header' //Name of header template
  ,'isJs'         =>  false
));

$sparkContent = new SparkContent();

/// Get Content
//Header 
$context['header'] = $sparkHeader::getView();

//feature Section ( Using SparkGallery shortcode )
$context['feature'] = 
	has_post_format( 'gallery' ) 
		? do_shortcode(get_post_meta( $post->ID, 'gallery', true )) 
		: null;

$context['feature'] = 
	has_post_format( 'image' ) 
		? get_the_post_thumbnail( $post->ID, 'full' ) 
		: $context['feature'];

$context['feature_sidebar'] = 
	has_post_format('gallery') || has_post_format( 'image' ) 
		? Timber::get_sidebar('sidebars/sidebar-action.php') 
		: null; 


// Page Content
$context['content'] = $sparkContent::getRoll();

// Sidebar
$context['sidebar'] = 
	has_post_format('gallery') || has_post_format( 'image' ) 
		? Timber::get_sidebar('sidebars/sidebar-page-w-feature.php') 
		: Timber::get_sidebar('sidebars/sidebar-page-w-feature.php');


///Display Page 
Timber::render('/views/templates/page.html.twig', $context);

get_footer();
wp_footer();