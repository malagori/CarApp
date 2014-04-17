<?php
ini_set('display_errors', 'On');
error_reporting(E_ALL | E_STRICT);
/**
 * Author: Mehmood Alam Khan
 * Email: malagori@kth.se
 * Dated: 13 April 2014
 */


require_once('src/dao/QRDao.php');
require_once('src/utility/Logger.php');
require_once('src/utility/CustomException.php');
require_once('src/utility/MyConstants.php');



class QRHandler {

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

		if ($action == MyConstants::CHECK_STATUS){
			return $this->checkStatus();
		}
	}

	function checkStatus(){
		try{

			$qrDAO = new QRDao;
			$found = $qrDAO->checkStatus();

			if ($found == True){
				echo '<META http-equiv="refresh" content="0;URL='.MyConstants::ABS_URL.MyConstants::STATUS_MAIN_PAGE.'">';
			}else{
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

	}

}

	// create object of QRHandler class
	$qrHandler = new QRHandler;
	$action = $_SESSION['action'];
		
	$qrHandler->processRequest($action);


?>