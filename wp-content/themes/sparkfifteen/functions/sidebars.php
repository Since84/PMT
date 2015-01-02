<?php 
	
	/** 
	  * Register Sidebars
	**/

	// register_sidebar(array(
	// 	'name'          => __( 'Sidebar name', 'theme_text_domain' ),
	// 	'id'            => 'unique-sidebar-id',
	// 	'description'   => '',
	//     'class'         => '',
	// 	'before_widget' => '<li id="%1$s" class="widget %2$s">',
	// 	'after_widget'  => '</li>',
	// 	'before_title'  => '<h2 class="widgettitle">',
	// 	'after_title'   => '</h2>' 
	// ));

	register_sidebar(array(
		'name'          => __( 'Social'),
		'id'            => 'social',
		'description'   => 'Contains all social networking and sharing widgets',
	    'class'         => 'spark-social-sidebar',
		'before_widget' => '<div id="%1$s" class="spark-widget widget %2$s">',
		'after_widget'  => '</div>'
	));

	register_sidebar( array(
	    'name'         => __( 'Action' ),
	    'id'           => 'action-buttons',
	    'description'  => __( 'Will Display Call to Action Buttons.' )
	) );

	register_sidebar( array(
	    'name'         => __( 'Page' ),
	    'id'           => 'page-sidebar',
	    'description'  => __( '' )
	) );

	register_sidebar( array(
	    'name'         => __( 'Footer Sitemap' ),
	    'id'           => 'footer',
	    'description'  => __( 'Widgets for Sitemap.' )
	) );

	register_sidebar( array(
	    'name'         => __( 'Footer Sidebar' ),
	    'id'           => 'footer-sidebar',
	    'description'  => __( 'Sidebar for Site Footer.' )
	) );


?>