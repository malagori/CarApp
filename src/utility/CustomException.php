<?php

	class CustomException extends Exception
	{
		//var $type;
		//var $message;
		
		
		
		/*function CustomException($msg,$t)
		{
			$this->message=$msg;
			$this->type=$t;
		}	
		*/
		public function errorMessage()
		{
			//if(!strcasecmp($this->type,"error"))		
				//return $this->message;			
			//else			
			return 'Error on line '.$this->getLine().' in '.$this->getFile().$this->getMessage();
					
		}	
	
	}

?>