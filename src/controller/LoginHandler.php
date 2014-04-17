<?php
ini_set('display_errors', 'On');
error_reporting(E_ALL | E_STRICT);

/**
 * Author: Mehmood Alam Khan
 * Email: malagori@kth.se
 * Dated: 5 April 2014
 */

require_once( "../dao/LoginDao.php" );
require_once( "../utility/Logger.php" );
require_once('../utility/CustomException.php');
require_once('../utility/MyConstants.php');

class LoginHandler {

	public function __construct()
	{

	}

	public function __destruct()
	{

	}

	function ProcessRequest($action){
		/*
		 * This function handles usecases related to Kund
		 */

		if ($action == "LoginUser"){
			return $this->LoginUser();
		}else if ($action == "LogoutUser"){
			return $this->logoutUser();
		}
	}

	function LoginUser(){
		try{
			$loginUser = false;
			$loginDAO = new LoginDao;
			//$registered = $kundDAO->checkKund();
			if ($loginUser == false)
			{
				$loginUser = $loginDAO->LoginUser();
			}
			else
			{
				session_destroy();
				echo '<META http-equiv="refresh" content="0;URL='.MyConstants::ABS_URL.MyConstants::KUND_REG_FAILURE_PAGE.MyConstants::KUND_REG_EXCEPTION.'">';
			}
		}
		catch(CustomException $sqlEx)
		{
			$msg = $sqlEx->errorMessage();
			Logger::logException($msg);
			echo '<META http-equiv="refresh" content="0;URL='.MyConstants::ABS_URL.MyConstants::KUND_REG_FAILURE_PAGE.MyConstants::KUND_REG_EXCEPTION.'">';
		}
		catch(Exception $ex)
		{
			$msg = $ex->getMessage();
			Logger::logException($msg);
			echo '<META http-equiv="refresh" content="0;URL='.MyConstants::ABS_URL.MyConstants::KUND_REG_FAILURE_PAGE.MyConstants::KUND_REG_EXCEPTION.'">';
		}
		return $loginUser;
	}

}

// create object of KundHandler class
$LoginHandler = new LoginHandler;
$action = $_REQUEST["action"];

$done = $LoginHandler->ProcessRequest($action);

$userName 	= $_REQUEST['username'];

if($done == True and $userName == MyConstants::ADMIN_USERNAME){	
	$_SESSION['logged']=MyConstants::ADMIN_SET;
	$expiretime = MyConstants::ADMIN_SESSION_EXPIRE_TIME;
	$_SESSION['expire'] = time() + $expiretime;
	$_SESSION['loggedUser']= $userName;

	echo '<META http-equiv="refresh" content="0;URL='.MyConstants::ABS_URL.'src/html/AdminMain.php">';

}else if ($done == True and $userName != MyConstants::ADMIN_USERNAME){
	$_SESSION['logged']=MyConstants::ADMIN_SET;
	$expiretime = MyConstants::ADMIN_SESSION_EXPIRE_TIME;
	$_SESSION['expire'] = time() + $expiretime;
	$_SESSION['loggedUser']= $userName;
	echo '<META http-equiv="refresh" content="0;URL='.MyConstants::ABS_URL.'src/html/UserMain.php">';
	
}else{
	
	$_SESSION['logged']=MyConstants::ADMIN_CLEAR;
}



?>