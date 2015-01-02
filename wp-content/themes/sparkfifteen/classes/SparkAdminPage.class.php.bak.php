<?php 
/*
	CLASS SparkAdminPage
	Contains all functions for this component
	Includes all dependencies
*/

	class SparkAdminPage {
		// private $options;

		function __construct() {
			//Add Actions
			// add_action('admin_menu', array($this, 'addAdminPage'));
			// add_action('admin_init', array($this, 'initAdminPage'));
		}

		/** FUNCTION addAdminPage
		  * applies actions to be run at admin init
		**/
		function addAdminPage(){
			add_theme_page( 
				"Home Page"
				, "Home"
				, "edit_pages"
				, "home_admin"
				, array( $this, 'createAdminPage') 
			);			
		}

		/** FUNCTION initAdminPage
		  * applies actions to be run at admin init
		**/
		function initAdminPage(){
			// register_setting(
	  //           'home_page_options' // Option group
	  //           ,'home_options' // Option name
	  //           // ,array( $this, 'sanitize' ) // Sanitize
	  //       );

	  //       add_settings_section(
	  //           'home_gallery', // ID
	  //           'Home Page Gallery', // Title
	  //           array( $this, 'gallerySectionInfo' ), // Callback
	  //           'home_page_options' // Page
	  //       );  

	  //       add_settings_field(
	  //           'gallery_ids', // ID
	  //           'Gallery Slides', // Title 
	  //           array( $this, 'galleryIdsField' ), // Callback
	  //           'home_page_options', // Page
	  //           'home_gallery' // Section           
	  //       );    

		}

		/** FUNCTION createAdminPage
		  * applies actions to be run at admin init
		**/
		function createAdminPage(){
        // Set class property
	        // $this->options = get_option( 'home_options' );
	        ?>
	        <div class="wrap">
	            <h2>Settings</h2>           
	            <form method="post" action="options.php">
	            <?php
	                // This prints out all hidden setting fields
	                // settings_fields( 'home_page_options' );   
	                // do_settings_sections( 'home_gallery' );
	                // submit_button(); 
	            ?>
	            </form>
	        </div>
	        <?php		
		}

		/** FUNCTION gallerySectionInfo
		  * applies actions to be run at admin init
		**/
		function gallerySectionInfo(){	
			print "This";
		}	

		/** FUNCTION galleryIdsField
		  * applies actions to be run at admin init
		**/
		function galleryIdsField(){	
			// $galleryContent = isset( $this->options['gallery_ids'] ) ? $this->options['gallery_ids'] : '';
			// wp_editor( $galleryContent, 'home_gallery' );

		}	

		/** FUNCTION sparkEnqueueScripts
		  * applies actions to be run at admin init
		**/
		// function enqueueScripts(){
		// 	wp_enqueue_script( 'content-script', get_template_directory_uri().'/classes/components/content/content.spark.js', array('jquery'),'',true );
		// 	wp_enqueue_style( 'content-style', get_template_directory_uri().'/classes/components/content/content.spark.css' );
		// }

		/** FUNCTION getOptions
		  * applies actions to be run at admin init
		**/
		public static function getOptions(){
	       return self::$spark_options;
		}	

		public static function getContext(){
			  $context 	= ( self::$spark_options['context'] ? self::$spark_options['context'] : Timber::get_context() );

			  return $context;
		}

		/** FUNCTION getView
		  * returns TIMBER template.
		**/
		public static function getView(){
			return Timber::compile( 
				'/classes/components/content/views/' 
				. self::$spark_options['template']
				.'.html.twig', 
				self::getContext() );
		}

	}



?>

