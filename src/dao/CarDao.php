<?php
/**
 * Author: Mehmood Alam Khan
 * Email: malagori@kth.se
 * Dated: 6 April 2014
 */

require_once( "../utility/Utility.php" );
require_once('../utility/CustomException.php');
require_once('../utility/MyConstants.php');

class CarDao {

	public function __construct(){}

	public function __destruct(){}
	
	function checkCar(){
		/*
		 * check if the kund already exist in the database
		 */
		
	}
	
	function registerCar(){
		try{
			$registered = false;
			// get value from the textfields
			$regNo 		= $_REQUEST['form1_Reg_nr'];
			$model 		= $_REQUEST['form1_Model'];
			$arsModel 	= $_REQUEST['form1_Arsmodel'];
			$milTal 	= $_REQUEST['form1_Miltal'];
			$antaldorrarID= null;
			if (isset($_POST['radioD'])) { // if ANY of the options was checked
  				$antaldorrarID= $_POST['radioD']; // echo the choice
			}
			//$bilmarkeList = array('--Select BilmÃ¤rke--', 'Alfa Romeo', 'Aston Martin', 'Audi');
			//$bilmarkeID = $bilmarkeList[$_POST['bilmarke']];
			$bilmarkeID = $_POST['bilmarke'];
			//$forgList = array('--Select Forg--','Svart', 'Vit', 'Ršd', 'BlŒ', 'Gul','GrŒ', 'Gršn', 'Brun', 'Silver');
			//$forgID = $forgList[$_POST['farg']];
			$forgID = $_POST['farg'];
			$forgKod	= $_REQUEST['form1_fargKod'];
			
			$CID= 1;
			
		
			$util = new Utility;
			$util->dbConnection();
			$query = 'insert into Car (REGID, BilmarkeID, Model, ArsYear, Miltal, AntaldorrarID, FargKodID, CID, FargKod) values("'.$regNo.'","'.$bilmarkeID.'","'.$model.'","'.$arsModel.'","'.$milTal.'","'.$antaldorrarID.'","'.$forgID.'","'.$CID.'","'.$forgKod.'")';
			echo $query;
			$result = $util->executeQuery($query);
			
			$util->dbClose();
			
			if($result>0)
			{
				$registered = true;
			}
		}
		catch(CustomException $sqlEx)
		{
			throw new CustomException($sqlEx->errorMessage());
		}
		catch(Exception $genEx)
		{			
			throw new CustomException($genEx->getMessage());
		}
		return $registered;
	}
}
?>