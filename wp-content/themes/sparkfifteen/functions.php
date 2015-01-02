<?php
/**
  *	Spark 15 functions and definitions
  * 
  * @package WordPress
  * @subpackage Spark_15
  * @since Spark 15 1.0
  *
**/

/**
  * Class Autoloader
  * autoloads classes from all files
**/
  function my_autoloader($class) {
      if ( $class != "ACF" )
       include 'classes/' . $class . '.class.php';
  }

  spl_autoload_register('my_autoloader');


/**
  * Include Spark Class
  * Base class for all spark functions and definitions
**/
  global $sparkTheme;
  $sparkTheme = new SparkTheme();