<?php 
 session_start();
 //echo "hello";
unset($_SESSION['insuranceuser']);
//$_SESSION['insuranceuser']="hello";
	//echo "logout";

header('location:http://www.lasuri-insurance.com/Lasuri/');
?>
