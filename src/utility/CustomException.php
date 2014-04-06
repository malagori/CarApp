<?php
/**
 * Author: Mehmood Alam Khan
 * Email: malagori@kth.se
 * Dated: 5 April 2014
 */
	class CustomException extends Exception
	{
		
		public function errorMessage()
		{	
			return 'Error on line '.$this->getLine().' in '.$this->getFile().$this->getMessage();
					
		}	
	
	}

?>