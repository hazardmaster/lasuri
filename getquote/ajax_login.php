<?php
session_start();
include('connection.php');
extract($_POST);
extract($_GET);

if(!empty($email_id))
{	
 $pass=md5($password);
	$que=mysqli_query($con,"select * from userinsurance where email='$email_id' and password='$pass'");
	
	 $row= mysqli_num_rows($que);
 
	  if($row)
	 {	
		
	 	 
		$_SESSION['insuranceuser']=$email_id;
	 
		echo "<script>window.location='index.php?page=dashboard'</script>";
	 }
	 else
	 {
	 echo "<span class='glyphicon glyphicon-exclamation-sign' style='color:red'></span> 
	 <font color='red'>Invalid Login Please Try Again</font>";
	 }
	 	
	
	
	}


 
?>
