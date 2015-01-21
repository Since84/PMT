<?php 
/**
 * Spark Main Template
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

//Sidebar
$sidebarPost = new TimberPost('feature');
$sidebarPost = $sparkContent::processPosts($sidebarPost);
$sidebarContext = Timber::get_context();
$sidebarContext['content'] = $sidebarPost;
$context['sidebar'] = $sparkContent::getView($sidebarContext,'content');


//Page
$pagePost = new TimberPost();
$pagePost->post_content = apply_filters('the_content',$pagePost->post_content);
$pagePost->post_content = do_shortcode( $pagePost->post_content ); 
$pageContext = Timber::get_context();
$pageContext['content'] = $pagePost;
$context['page'] = $sparkContent::getView($pageContext,'content');

///Display Page 
Timber::render('/views/templates/page.html.twig', $context);

get_footer();
wp_footer();
?>