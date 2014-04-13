<?php
ini_set('display_errors', 'On');
error_reporting(E_ALL | E_STRICT);
/**
 * Author: Mehmood Alam Khan
 * Email: malagori@kth.se
 * Dated: 5 April 2014
 */

require_once('../dao/InsuranceDao.php');
require_once('../utility/Logger.php');	
require_once('../utility/CustomException.php');
require_once('../utility/MyConstants.php');

class InsuranceHandler {

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

		if ($action == "AddInsurance"){
			return $this->AddInsurance();
		}else if ($action == "searchInsurance"){
			return $this->SearchInsurance(); 
		}
	}
	
	function AddInsurance(){
		try{
			$registered = false;
			$InsuranceDao = new InsuranceDao;
           
			//$registered = $kundDAO->checkKund();
			if ($registered == false)
			{
				$registered = $InsuranceDao->addInsurance();
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
$InsuranceHandler = new InsuranceHandler;
$action = $_REQUEST["action"];

$done = $InsuranceHandler->processRequest($action);

if($done){
	echo '<META http-equiv="refresh" content="0;URL='.MyConstants::ABS_URL.'src/html/AdminMain.php?page=Insurance">';
   

}



?>