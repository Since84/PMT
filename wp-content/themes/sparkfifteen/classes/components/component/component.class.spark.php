<?php 
/*
	Spark Component: Component
	Description: Fully featured, customizable component
*/

/*
	CLASS Component
	Contains all functions for this component
	Includes all dependencies
*/
	class Component {
		function __construct() {

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
			wp_enqueue_script( 'component-script', 'component.spark.js', array('jquery'),,true );
			wp_enqueue_style( 'component-style', 'component.spark.css' );
		}

	}



?>

