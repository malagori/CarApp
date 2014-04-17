<?php

/**
 * Author: Mehmood Alam Khan
 * Email: malagori@kth.se
 * Dated: 13 April 2014
 */

require_once('src/utility/Logger.php');	
require_once('src/utility/CustomException.php');
require_once('src/utility/MyConstants.php');
require_once( "src/utility/Utility.php" );



class QRDao {

	public function __construct()
	{

	}

	public function __destruct()
	{

	}


	function checkStatus(){
		try{
			$found = false;
			
			$carID 		= $_SESSION['CarID'];
			$damageID	= $_SESSION['DamageID'];
			
			$util = new Utility;
			$util->dbConnection();
			$query 	= "select 	`S`.`StatusType`, `S`.`StartEnd`, `S`.`Description`, 
							  	`S`.`BokadID`, `S`.`BeraknadKlart`, `S`.`KlarDatum`, `S`.`REGID`, `S`.`DID` 
						from 	`Status` AS `S`
						where 	`S`.`REGID` = '".$carID."' and `S`.`DID` = '".$damageID."'
						";
			
			$result = $util->executeQuery($query);
			
			$num	=$util->returnNumRows($result);
			
			
			$util->dbClose();
			
			if($num>0)
			{
				$i=0;
				$dataRows=array();;
				while ($row= $util->fetchArray($result))
				{
					$dataRows[$i]=$row;
					$i=$i+1;
				}//end of while
				
				$_SESSION['allRecords'] = $dataRows;

				$found = true;
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
		return $found;
	}
}
?>