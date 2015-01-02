<?php 
/*
	CLASS Spark_Form
	Contains all functions for this component
	Includes all dependencies
*/

	class SparkForm {
		private static $spark_options = array(
			'template'		=>	'searchform'
		);

		function __construct($options) {
			// Set Options
			self::$spark_options = ( $options ? $options : self::$spark_options );

			//Add Actions
			add_action('init', array($this, 'initAction'));
			add_action('wp_enqueue_scripts', array($this, 'enqueueScripts'));

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
			wp_enqueue_script( 'form-script', get_template_directory_uri().'/classes/components/form/form.spark.js', array('jquery'),'',true );
			wp_enqueue_style( 'form-style', get_template_directory_uri().'/classes/components/form/form.spark.css' );
		}

		/** FUNCTION getOptions
		  * applies actions to be run at admin init
		**/
		public static function getOptions(){
	       return self::$spark_options;
		}	

		public static function getContext(){
			  $context        			= Timber::get_context();
			  return $context;
		}

		/** FUNCTION getView
		  * returns TIMBER template.
		**/
		public static function getView(){
			return Timber::compile( 
				'/classes/components/form/views/' 
				. self::$spark_options['template']
				.'.html.twig', 
				self::getContext() );
		}

	}



?>

