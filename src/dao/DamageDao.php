<?php
/**
 * Author: Mehmood Alam Khan
 * Email: malagori@kth.se
 * Dated: 6 April 2014
 */

require_once( "../utility/Utility.php" );
require_once('../utility/CustomException.php');
require_once('../utility/MyConstants.php');

class DamageDao {

	public function __construct(){}

	public function __destruct(){}
	
	function checkCar(){
		/*
		 * check if the kund already exist in the database
		 */
		
	}
	
	function registerDamage(){
		try{
            
			$registered = false;
			// get value from the textfields
            
             
            $InsuranceID = $_REQUEST['bilmarke'];
			$SkadeNr	= $_REQUEST['form1_skade_nr'];
			$Skadedag   = $_REQUEST['form1_Skade_dag'];
			$Skadetyp 	= $_REQUEST['form1_Skadetyp'];
            $AntalSkador = $_REQUEST['check'];
        
            
			$Skadeuppgifte= null;
            
            
			if (isset($_POST['radioD'])) { // if ANY of the options was checked
  				$antaldorrarID= $_POST['radioD']; // echo the choice
			}
			//$bilmarkeList = array('--Select Bilmärke--', 'Alfa Romeo', 'Aston Martin', 'Audi');
			//$bilmarkeID = $bilmarkeList[$_POST['bilmarke']];
			$bilmarkeID = $_POST['bilmarke'];
			//$forgList = array('--Select Forg--','Svart', 'Vit', 'R�d', 'Bl�', 'Gul','Gr�', 'Gr�n', 'Brun', 'Silver');
			//$forgID = $forgList[$_POST['farg']];
			//$forgID = $_POST['farg'];
			//$forgKod	= $_REQUEST['form1_fargKod'];
			
			//$CID= 1;
			
		
			$util = new Utility;
			$util->dbConnection();
			$query = 'insert into Damage (InsuranceID, SkadeNr, SkadeDay, SkadetypID, AntalSkador, Ersattningsbar, Vallande, Sjalvrisk, Momspliktig, REGID) values("'.$InsuranceID.'","'.$SkadeNr.'","'.$Skadedag.'","'.$Skadetyp.'","'.$AntalSkador.'","1","1","1","1","1")';
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