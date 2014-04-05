<?php
/**
 * Author: Mehmood Alam Khan
 * Email: malagori@kth.se
 */
	// to log all the exceptions that occur during the script execution , exceptions are logged here while a proper message is displayed to the user
	class Logger
	{
		public function __construct()
		{
	
		}
	
		public function __destruct()
		{
	
		}
		
		function logException($exception)
		{
			$myFile = "../logs/bug_report_file.txt";
			$newline="\r\n"; 
			
			$file=fopen($myFile,"a") or exit("Unable to open file!");
			
					
			fwrite($file,$newline.$newline.'New Exception ');
			
						
			fwrite($file,' Dated : '.date("m/d/y :H:i:s",time()).$newline);
			
			fwrite($file,'Exception : '.$exception);
			
						
			fclose($file);		// to close file
			

		}
	}
?>