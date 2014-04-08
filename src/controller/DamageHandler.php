<?php

ini_set('display_errors', 'On');
error_reporting(E_ALL | E_STRICT);
/**
 * Author: Mehmood Alam Khan
 * Email: malagori@kth.se
 * Dated: 5 April 2014
 */
require_once( "../dao/DamageDao.php" );
require_once( "../utility/Logger.php" );	
require_once('../utility/CustomException.php');
require_once('../utility/MyConstants.php');

class DamageHandler{
	
	public function __construct(){}
	public function __destruct(){}
	
	function processRequest($action){
		/*
		 * This function handles usecases related to Damage 
		 */

		if ($action == "registerDamage"){
			return $this->registerDamage();
		}else if ($action == "searchDamage"){
			return $this->searchDamage(); 
		}
	}
	
	function registerDamage(){
		try{
			$registered = false;
			$damageDAO = new DamageDao;
			//$registered = $damageDAO->checkDamage();
			if ($registered == false)
			{
				$registered = $damageDAO->registerDamage();
			}
			else
			{
				echo '<META http-equiv="refresh" content="0;URL='.MyConstants::ABS_URL.MyConstants::DAMAGE_REG_FAILURE_PAGE.MyConstants::DAMAGE_REG_EXCEPTION.'">';
			}
		}
		catch(CustomException $sqlEx)
		{
			$msg = $sqlEx->errorMessage();
			Logger::logException($msg);
			echo '<META http-equiv="refresh" content="0;URL='.MyConstants::ABS_URL.MyConstants::DAMAGE_REG_FAILURE_PAGE.MyConstants::DAMAGE_REG_EXCEPTION.'">';
		}
		catch(Exception $ex)
		{
			$msg = $ex->getMessage();
			Logger::logException($msg);
			echo '<META http-equiv="refresh" content="0;URL='.MyConstants::ABS_URL.MyConstants::DAMAGE_REG_FAILURE_PAGE.MyConstants::DAMAGE_REG_EXCEPTION.'">';
		}
		return $registered;
	}

}

// create object of DamageHandler class
$damageHandler = new DamageHandler;
$action = $_REQUEST["action"];

$done = $damageHandler->processRequest($action);
if($done){
	echo '<META http-equiv="refresh" content="0;URL='.MyConstants::ABS_URL.'src/html_code/kundReg.php">';

}


?>