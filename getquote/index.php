<?php
session_start();
ob_start();
	include ("connection.php");
	if (isset($_POST['submit'])) {
			$plan = $_POST['your-message'] ;
			echo $plan;
		}	else{
			echo "post not set";
		}
?>
