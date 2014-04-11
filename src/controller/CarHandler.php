<?php

ini_set('display_errors', 'On');
error_reporting(E_ALL | E_STRICT);
/**
 * Author: Mehmood Alam Khan
 * Email: malagori@kth.se
 * Dated: 5 April 2014
 */

require_once( "../dao/CarDao.php" );
require_once( "../utility/Logger.php" );	
require_once('../utility/CustomException.php');
require_once('../utility/MyConstants.php');

class CarHandler{
	
	public function __construct(){}
	public function __destruct(){}
	
	function processRequest($action){
		/*
		 * This function handles usecases related to Car 
		 */

		if ($action == "registerCar"){
			return $this->registerCar();
		}else if ($action == "searchCar"){
			return $this->searchCar(); 
		}
	}
	
	function registerCar(){
		try{
			$registered = false;
			$carDAO = new CarDao;
			//$registered = $carDAO->checkCar();
			if ($registered == false)
			{
				$registered = $carDAO->registerCar();
			}
			else
			{
				echo '<META http-equiv="refresh" content="0;URL='.MyConstants::ABS_URL.MyConstants::CAR_REG_FAILURE_PAGE.MyConstants::CAR_REG_EXCEPTION.'">';
			}
		}
		catch(CustomException $sqlEx)
		{
			$msg = $sqlEx->errorMessage();
			Logger::logException($msg);
			echo '<META http-equiv="refresh" content="0;URL='.MyConstants::ABS_URL.MyConstants::CAR_REG_FAILURE_PAGE.MyConstants::CAR_REG_EXCEPTION.'">';
		}
		catch(Exception $ex)
		{
			$msg = $ex->getMessage();
			Logger::logException($msg);
			echo '<META http-equiv="refresh" content="0;URL='.MyConstants::ABS_URL.MyConstants::CAR_REG_FAILURE_PAGE.MyConstants::CAR_REG_EXCEPTION.'">';
		}
		return $registered;
	}

}

// create object of CarHandler class
$carHandler = new CarHandler;
$action = $_REQUEST["action"];

$done = $carHandler->processRequest($action);

if ($done){
	//echo '<META http-equiv="refresh" content="0;URL='.MyConstants::ABS_URL.MyConstants::KUND_REG_SUCCESS_PAGE.MyConstants::CAR_REG_EXCEPTION.'">';
    echo '<META http-equiv="refresh" content="0;URL='.MyConstants::ABS_URL.'src/html/Index.php?page=Damage">';
}


?>