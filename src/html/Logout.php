<?php

/**
 * Author: Mehmood Alam Khan
 * Email: malagori@kth.se
 * Dated: 12 April 2014
 */

session_start();
require_once('../utility/MyConstants.php');
	
$_SESSION = array(); 
session_destroy(); 
echo '<META http-equiv="refresh" content="0;URL='.MyConstants::ABS_URL.'/index.php?logout=true">';
//header( "Location: ".MyConstants::ABS_URL."/index.php?logout=true" );

?>