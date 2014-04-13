<?php

/**
 * Author: Mehmood Alam Khan
 * Email: malagori@kth.se
 * Dated: 5 April 2014
 */

require_once( "../utility/Utility.php" );
require_once('../utility/CustomException.php');
require_once('../utility/MyConstants.php');

class FargkodDao {

	public function __construct()
	{

	}

	public function __destruct()
	{

	}
	
	function checkFargkod(){
		/*
		 * check if the kund already exist in the database
		 */
		
	}
	
	function addFargkod(){
		try{
			$registered = false;
			// get value from the textfields
			$Fargkod 	= $_REQUEST['Fargkod'];
			
			
			$util = new Utility;
			$util->dbConnection();
			$query = 'insert into FargKod(ColorType) values("'.$Fargkod.'")';
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