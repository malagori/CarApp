<?php

/**
 * Author: Mehmood Alam Khan
 * Email: malagori@kth.se
 * Dated: 5 April 2014
 */

require_once( "../utility/Utility.php" );
require_once('../utility/CustomException.php');
require_once('../utility/MyConstants.php');

class KundDao {

	public function __construct()
	{

	}

	public function __destruct()
	{

	}
	
	function checkKund(){
		/*
		 * check if the kund already exist in the database
		 */
		
	}
	
	function registerKund(){
		try{
			$registered = false;
			// get value from the textfields
			$firstNamn 	= $_REQUEST['fornamn'];
			$efterNamn 	= $_REQUEST['Efternamn'];
			$phone 		= $_REQUEST['form1_Telefone'];
			$address 	= $_REQUEST['form1_Adress'];
			$email 		= $_REQUEST['form1_Epost'];
			
			$util = new Utility;
			$util->dbConnection();
			$query = 'insert into Customer(FirstName, LastName, Address, Email) values("'.$firstNamn.'","'.$efterNamn.'","'.$address.'","'.$email.'")';
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