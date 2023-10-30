<?php
/**
 * gsmtc-developer functions and definitions
*/

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}


require_once(dirname(__FILE__).'/inc/class-gsmtc-developer.php');


$developer = new Gsmtc_Developer();
//$restaurantes_api = new Abc_Restaurantes_Api();
