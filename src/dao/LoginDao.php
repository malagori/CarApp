<?php

/**
 * Author: Mehmood Alam Khan
 * Email: malagori@kth.se
 * Dated: 5 April 2014
 */

require_once( "../utility/Utility.php" );
require_once('../utility/CustomException.php');
require_once('../utility/MyConstants.php');

class LoginDao {

	public function __construct()
	{
     

	}

	public function __destruct()
	{

	}
	
	function LoginUser(){
		/*
		 * check if the kund already exist in the database
		 */
		
	}
	
	function LoginAdmin(){
		try{
			$LoginAdmin = false;
			// get value from the textfields

			$UserName 	= $_REQUEST['username'];
			$Password 	= $_REQUEST['password'];
            
            
			$util = new Utility;
			$util->dbConnection();
            
			$query = "SELECT * FROM `User` WHERE `Username`='".$UserName."' AND `password`='".$Password."'";
			//echo $query;
            $sql = $util->executeQuery($query);
			$result = mysqli_num_rows($sql);
            
			$util->dbClose();
			
			if($result>0)
			{
				$LoginAdmin = true;
                
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
		return $LoginAdmin;
	}
}
?>