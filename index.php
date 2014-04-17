<?php
require_once('src/utility/MyConstants.php');


$msg=$_GET['msg'];

if ($msg == MyConstants::CHECK_STATUS ){
	
	$carID= $_GET['c'];
	$damageID= $_GET['d'];
	
	//index.php?msg=checkStatus&c=car1&d=1
	session_start();
	$_SESSION['action']= $msg;
	$_SESSION['CarID']= $carID;
	$_SESSION['DamageID']= $damageID;
	
	require_once ('src/controller/QrHandler.php');
	
	/**
	 
	$statusID= $_GET['ID'];
	
	require_once ('src/controller/QrHandler.php');

	// create object of QRHandler class
	$qrHandler = new QRHandler;
	$action = $_GET['msg'];
		
	$qrHandler->processRequest($action, $statusID);
	*/
}else{
	echo $_GET['msg'];
   	include 'src/html/Login.php';
   	die(); 

}
?>