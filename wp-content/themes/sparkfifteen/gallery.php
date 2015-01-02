<?php 
/* Template Name: Gallery 
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

//Get Header Using SparkHeader Class
global $sparkHeader;
$sparkHeader = new SparkHeader(array(
  'showLogo'      =>  true
  ,'headerRight'  =>  'sidebars/sidebar-social.php' //Template for right side ( /views/components/... )
  ,'nav'          =>  'nav' //Menu name for nav menu
  ,'template'     =>  'header' //Name of header template
  ,'isJs'         =>  false
));

$context['header'] = $sparkHeader::getView();

//Get Gallery Using SparkGallery Class

if ( $gallery = do_shortcode(get_post_meta( $post->ID, 'slides', true)) ) {

	$context['gallery'] = $gallery;

}



//Display Page 
Timber::render('/views/templates/home.html.twig', $context);




wp_footer();
?>