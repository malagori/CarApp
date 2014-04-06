<?php

/**
 * Author: Mehmood Alam Khan
 * Email: malagori@kth.se
 * Dated: 5 April 2014
 */


 require_once('CustomException.php');
 require_once('MyConstants.php');

class Utility
{	
	private $con;
	
	public function setConnection($c){
		$this->con = $c;
	}
	
	public function getConnection(){
		return $this->con;
	}
	
	public function __construct()
	{

	}

	public function __destruct()
	{

	}
	
	function dbConnection()
	{
		/*
		 * this function creates a db connection
		 * 
		 */
		try{
			$this->setConnection(mysqli_connect(MyConstants::DB_HOST,MyConstants::DB_USER,MyConstants::DB_PASSWORD, MyConstants::DB_NAME));
			
			if(!$this->getConnection()){
				//$this->setConnection(null);
				throw new Exception();
			}
		}catch(Exception $sqlEx){
			throw new CustomException("\r\nMessage:Database Connection Error\r\nFunction :Utility: dbConnection() ");
		}
		
	}
	
	function dbClose()
	{
		mysqli_close($this->getConnection());
	}
	
	function executeQuery($myQuery){
		return mysqli_query($this->getConnection(), $myQuery);
	}
	
	function begin()
	{
		@mysqli_query("BEGIN");
	}
	function commit()
	{
		@mysqli_query("COMMIT");
	}
	function rollback()
	{
		@mysqli_query("ROLLBACK");
	}

}
?>