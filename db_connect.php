<?php     
	if( $_SERVER['HTTP_HOST'] == 'localhost'  ){
		$host = "localhost";
	}else{
		$host = "192.168.110.211"; 
	};
	
	$user = "jamesming";  
	$pw = "ourlady";     
	$database = "mynuvotv_db";  
	
	$db = mysql_connect($host,$user,$pw)
	   or die("Cannot connect to mySQL.");
	
	mysql_select_db($database,$db)
	    or die("Cannot connect to database.");
?>
