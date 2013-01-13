<?php
	$realpath = $_SERVER['DOCUMENT_ROOT']
	.'/wp-content/themes/dmp-v4';
	
	//Essential Functions
	include($realpath . '/functions/default_func.php');
	
	//Theme Options
	include($realpath . '/functions/custom_func.php');
	/*
	 * Remove the porhibit update nagging in the functions above
	 */
	 
	//Variables
	include ($realpath . '/functions/map.php');
	 
	//Theme Functions
	
	include ($realpath . '/functions/theme.php');
?>
