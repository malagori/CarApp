<?php
session_start();

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
	
	function CheckUser(){
		/*
		 * check if the kund already exist in the database
		 */
		
	}
	
	function LoginUser(){
		try{
			$loginUser = false;
			// get value from the textfields

			$userName 	= $_REQUEST['username'];
			$password 	= $_REQUEST['password'];
            
            
			$util = new Utility;
			$util->dbConnection();
            
			$query = "SELECT * FROM `User` WHERE `UserName`='".$userName."' AND `Password`='".$password."'";
			//echo $query;
            $sql = $util->executeQuery($query);
			$result = mysqli_num_rows($sql);
            
			$util->dbClose();
			
			if($result>0)
			{
				$loginUser = true;
                
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
		return $loginUser;
	}
}
?>