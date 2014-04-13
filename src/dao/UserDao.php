<?php

/**
 * Author: Mehmood Alam Khan
 * Email: malagori@kth.se
 * Dated: 5 April 2014
 */

require_once( "../utility/Utility.php" );
require_once('../utility/CustomException.php');
require_once('../utility/MyConstants.php');

class UserDao {

	public function __construct()
	{

	}

	public function __destruct()
	{

	}
	
	function checkUser(){
		/*
		 * check if the kund already exist in the database
		 */
		
	}
	
	function registerUser(){
		try{
			$registered = false;
			// get value from the textfields
			$Name 	= $_REQUEST['Name'];
			$UserName 	= $_REQUEST['UserName'];
			$Email 		= $_REQUEST['Email'];
            $Password 	= $_REQUEST['Password'];
			
			$util = new Utility;
			$util->dbConnection();
			$query = 'insert into User(Name, UserName, Email, Password) values("'.$Name.'","'.$UserName.'","'.$Email.'","'.$Password.'")';
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