<?php
/*
*	Spark Post Styles
*
*/

function my_mce_before_init_insert_formats( $init_array ) {  
	// Define the style_formats array
	$style_formats = array(  
		// Each array child is a format with it's own settings
		array(  
			'title' => 'Script Text',  
			'inline' => 'span',  
			'classes' => 'script-text',
			'wrapper' => false,
			
		),
		array(  
			'title' => 'Gray Script Text',  
			'inline' => 'span',  
			'classes' => 'gray-script-text',
			'wrapper' => false,
			
		),
		array(  
			'title' => 'Large Red',  
			'inline' => 'span',  
			'classes' => 'large-red',
			'wrapper' => false,
			
		),
		array(  
			'title' => 'Red Circle',  
			'block' => 'div',  
			'classes' => 'red-circle',
			'wrapper' => false,
			
		),
		array(  
			'title' => 'Float Left',  
			'block' => 'div',  
			'classes' => 'float-left',
			'wrapper' => false,
			
		),
		array(  
			'title' => 'Float Right',  
			'block' => 'div',  
			'classes' => 'float-right',
			'wrapper' => false,
			
		),
		array(  
			'title' => 'About Bio',  
			'block' => 'div',  
			'classes' => 'bio-left',
			'wrapper' => true,
			
		),
		array(  
			'title' => 'Two Column List',  
			'block' => 'div',  
			'classes' => 'two-column-list',
			'wrapper' => true,
			
		),
		array(  
			'title' => 'Testimonial',  
			'block' => 'div',  
			'classes' => 'testimonial',
			'wrapper' => true,
			
		)
	);  
	// Insert the array, JSON ENCODED, into 'style_formats'
	$init_array['style_formats'] = json_encode( $style_formats );  
	
	return $init_array;  
  
} 
// Attach callback to 'tiny_mce_before_init' 
add_filter( 'tiny_mce_before_init', 'my_mce_before_init_insert_formats' );

function wpb_mce_buttons_2($buttons) {
	array_unshift($buttons, 'styleselect');
	return $buttons;
}
add_filter('mce_buttons_2', 'wpb_mce_buttons_2');