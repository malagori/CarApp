<?php

/**
 * Author: Mehmood Alam Khan
 * Email: malagori@kth.se
 * Dated: 5 April 2014
 */

require_once( "../utility/Utility.php" );
require_once('../utility/CustomException.php');
require_once('../utility/MyConstants.php');

class BilmarkDao {

	public function __construct()
	{

	}

	public function __destruct()
	{

	}
	
	function checkBilmarke(){
		/*
		 * check if the kund already exist in the database
		 */
		
	}
	
	function addBilmarke(){
		try{
			$registered = false;
			// get value from the textfields
			$Bilmarke 	= $_REQUEST['Bilmarke'];
			
			
			$util = new Utility;
			$util->dbConnection();
			$query = 'insert into Bilmarke(BrandName) values("'.$Bilmarke.'")';
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