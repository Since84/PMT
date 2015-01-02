<?php 
/*
	CLASS Spark_Gallery
	Contains all functions for this component
	Includes all dependencies
*/

	class SparkGallery {
		private static $spark_options = array(
			'template'	=>	'rotator'
			,'type'		=>	'shortcode'
			,'context'	=>	null
		);

		function __construct($options=null) {
			// Set Options
			self::$spark_options = ( $options ? $options : self::$spark_options );

			//Add Actions
			add_action('init', array($this, 'initAction'));
			add_action('wp_enqueue_scripts', array($this, 'enqueueScripts'));

			self::getGallery();

		}

		/** FUNCTION initAction
		  * applies actions to be run at init
		**/
		function initAction(){
		}

		/** FUNCTION adminInitAction
		  * applies actions to be run at admin init
		**/
		function adminInitAction(){

		}

		/** FUNCTION sparkEnqueueScripts
		  * applies actions to be run at admin init
		**/
		function enqueueScripts(){
			$template = self::$spark_options['template'];
			wp_enqueue_script( 'gallery-script', get_template_directory_uri().'/classes/components/gallery/gallery.spark.js', array('jquery', 'backbone'),'',true );
			wp_enqueue_style( 'gallery-style', get_template_directory_uri().'/classes/components/gallery/gallery.spark.css' );

			wp_enqueue_script( 'gallery-template-script', get_template_directory_uri().'/classes/components/gallery/templates/'.$template.'/'.$template.'.gallery.spark.js', array('jquery', 'backbone'),'',true );
			wp_enqueue_style( 'gallery-template-script', get_template_directory_uri().'/classes/components/gallery/templates/'.$template.'/'.$template.'.gallery.spark.css');
		}

		/** FUNCTION getOptions
		  * applies actions to be run at admin init
		**/
		public static function getOptions(){
	       return self::$spark_options;
		}	

		public static function getContext(){
			  $context = Timber::get_context();
			  return $context;
		}

		static function galleryShortcode($empty, $attr){
			$ids = explode(',', $attr['ids']);
			$slides = self::getGallery('shortcode', $ids);

			return $slides;
		}

		/** FUNCTION getGallery
		  * returns HTML string
		**/
		public static function getGallery($type=null, $slides=null, $template=null){
			global $post;
			static $newslides;

			switch($type){
				case "shortcode":

					foreach ( $slides as $slide ) {
						$context = Timber::get_context();
						$context['slide'] = wp_get_attachment_image( $slide, 'full' );
						$newslides[]= Timber::compile('/classes/components/gallery/views/image-slide.html.twig', $context );
						$context=null;
					}
				break;

				case "post_type":
				break;

				case "manual":
					foreach ( $slides as $slide ) {
						$context = Timber::get_context();
						$context['slide'] = wp_get_attachment_image( $slide, 'full' );
						$newslides[]= Timber::compile('/classes/components/gallery/views/image-slide.html.twig', $context );
						$context=null;
					}
				break;

				default:
				break;
			}
			$context = Timber::get_context();

			if ( $newslides ){

				$context['slides'] = $newslides;
				$context['slidedata'] = json_encode( $newslides );
				$view = ( $template ? $template : self::$spark_options['template'] );
				$gallery = self::getView($view, $context );

				return $gallery;

			}

		}

		// public static function getSlides($slides){
		// 	if ( !self::$spark_options['slides'] && !$slides ){

		// 	}
		// 	return $slides;
		// }  

		/** FUNCTION getView
		  * returns TIMBER template.
		**/
		public static function getView($template=null, $context=null){
			return Timber::compile( 
				'/classes/components/gallery/templates/' 
				. ( $template ? $template : self::$spark_options['template'] )
				.'/'.( $template ? $template : self::$spark_options['template'] )
				.'.html.twig', 
				( $context ? $context : self::getContext() ));
	}

	}


