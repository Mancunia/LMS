<?php

class lms_con{

// truncate string at word
  function truncate($string) {  

    $limit=30;
    $break=" ";
	
	if (strlen($string) <= $limit) return $string;
	
	if (false !== ($max = strpos($string, $break, $limit))) {
		 
		if ($max < strlen($string) - 1) {
			
			$string = substr($string, 0, $max) . $pad;
			
		}
		
	}
	
	return $string;
	
    }








}








?>