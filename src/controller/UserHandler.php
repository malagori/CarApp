<?php
ini_set('display_errors', 'On');
error_reporting(E_ALL | E_STRICT);
/**
 * Author: Mehmood Alam Khan
 * Email: malagori@kth.se
 * Dated: 5 April 2014
 */

require_once('../dao/UserDao.php');
require_once('../utility/Logger.php');	
require_once('../utility/CustomException.php');
require_once('../utility/MyConstants.php');



class UserHandler {

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

		if ($action == "RegisterUser"){
			return $this->registerUser();
		}else if ($action == "searchKund"){
			return $this->searchKund(); 
		}
	}
	
	function registerUser(){
		try{
			$registered = false;
			$UserDAO = new UserDao;
			//$registered = $kundDAO->checkKund();
			if ($registered == false)
			{
				$registered = $UserDAO->registerUser();
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
		return $registered;
	}

}

// create object of KundHandler class
$UserHandler = new UserHandler;
$action = $_REQUEST["action"];

$done = $UserHandler->processRequest($action);

if($done){
	echo '<META http-equiv="refresh" content="0;URL='.MyConstants::ABS_URL.'src/html/AdminMain.php?page=User">';
   

}



?>