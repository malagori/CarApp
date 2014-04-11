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

	function processRequest($action){
		/*
		 * This function handles usecases related to Kund 
		 */

		if ($action == "LoginAdmin"){
			return $this->LoginAdmin();
		}else if ($action == "LoginUser"){
			return $this->LoginUser(); 
		}
	}
	
	function LoginAdmin(){
		try{
			$LoginAdmin = false;
			$LoginDAO = new LoginDao;
			//$registered = $kundDAO->checkKund();
			if ($LoginAdmin == false)
			{
				$LoginAdmin = $LoginDAO->LoginAdmin();
			}
			else
			{
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
		return $LoginAdmin;
	}

}

// create object of KundHandler class
$LoginHandler = new LoginHandler;
$action = $_REQUEST["action"];

$done = $LoginHandler->processRequest($action);

if($done)

{

$_SESSION['logged']=MyConstants::ADMIN_SET;
$expiretime = MyConstants::ADMIN_SESSION_EXPIRE_TIME;
$_SESSION['expire'] = time() + $expiretime;

 echo '<META http-equiv="refresh" content="0;URL='.MyConstants::ABS_URL.'src/html/Index.php?'.SID.'">';
}
else
{
$_SESSION['logged']=MyConstants::ADMIN_CLEAR;
$expiretime = MyConstants::ADMIN_EXPIRED_VALUE; // 2 hours
$_SESSION['expire'] = time()+$expiretime;
echo '<META http-equiv="refresh" content="0;URL='.MyConstants::ABS_URL.'index.php">';
}



?>