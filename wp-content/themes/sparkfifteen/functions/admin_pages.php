<?php 
	
	/** 
	  * Register Admin Pages
	**/
	wp_enqueue_script('autosave');
	wp_enqueue_script('post');
	if ( user_can_richedit() )
		wp_enqueue_script('editor');
		wp_enqueue_script('thickbox');
		wp_enqueue_script('media-upload');

	register_setting( 'home_page', 'home_gallery' );

	global $sparkTheme;
	$sparkTheme = new SparkTheme();
	add_theme_page( "Home Page", "Home", "edit_pages", "home_admin", array( $sparkTheme, 'createHomePageAdminMenu') );

?>