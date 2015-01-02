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

// Page Content
$context['content'] = $sparkContent::getRoll('content-roll',null,get_posts());

// Sidebar
$context['sidebar'] = Timber::get_sidebar('sidebars/sidebar-single.php');


///Display Page 
Timber::render('/views/templates/page.html.twig', $context);

get_footer();
wp_footer();