<?php 
	
	/** 
	  * Hooks and Filters
	**/
	global $sparkGallery;
	$sparkGallery = new SparkGallery();

	add_filter( 'post_gallery', array( $sparkGallery, 'galleryShortcode'), 10, 4 );


?>