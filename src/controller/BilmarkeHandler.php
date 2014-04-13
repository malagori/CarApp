<?php
ini_set('display_errors', 'On');
error_reporting(E_ALL | E_STRICT);
/**
 * Author: Mehmood Alam Khan
 * Email: malagori@kth.se
 * Dated: 5 April 2014
 */

require_once('../dao/BilmarkDao.php');
require_once('../utility/Logger.php');	
require_once('../utility/CustomException.php');
require_once('../utility/MyConstants.php');

class BilmarkHandler {

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

		if ($action == "AddBilmarke"){
			return $this->AddBilmarke();
		}else if ($action == "searchBilmarke"){
			return $this->SearchBilmarke(); 
		}
	}
	
	function AddBilmarke(){
		try{
			$registered = false;
			$BilmarkDao = new BilmarkDao;
           
			//$registered = $kundDAO->checkKund();
			if ($registered == false)
			{
				$registered = $BilmarkDao->addBilmarke();
                echo $registered;
                
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
$BilmarkHandler = new BilmarkHandler;
$action = $_REQUEST["action"];

$done = $BilmarkHandler->processRequest($action);

if($done){
	echo '<META http-equiv="refresh" content="0;URL='.MyConstants::ABS_URL.'src/html/AdminMain.php?page=Bilmarke">';
   

}



?>