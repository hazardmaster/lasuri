<?php
	include ('connection.php');
	extract ($_POST);
	extract ($_GET);
	$query="select * from userinsurance where email='".$email."'";
	//echo $query;
	$sql=mysqli_query($con,$query);
	$row=mysqli_num_rows($sql);
	if ($row)
	{
		echo "<h3><span class='glyphicon glyphicon-exclamation-sign' style='color:red'></span>This emailid already exists</h3>";
	}
	else
	{
		if($email!=$iemail)
		{
			echo "<h3 color='red'><span class='glyphicon glyphicon-exclamation-sign' style='color:green'></span>Email-id does not match</h3>";
		}
		else if($password!=$cpassword)
		{
			echo "<h3 color='red'><span class='glyphicon glyphicon-exclamation-sign' style='color:red'></span> Password  does not match</h3>";
		}
		else if ($email==$iemail && $password==$cpassword)
		{
		$fname= ucwords($fname);
		$lname= ucwords($lname);
		$password= md5($password);
		 
			$sql="insert into userinsurance (user_id,user_fname,user_lname,user_gender,user_address,user_city,user_district,user_mobile,user_contact,password,email,date) values ('','".$fname."','".$lname."','".$gender."','".$address."','".$city."','".$district."','".$mobile."','".$contact."','".$password."','".$email."',now())";
			if(mysqli_query($con,$sql))
			{
				//$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"."?page=activateuser&email=".$email;
				 
					// echo "<h4 class='text-primary text-center'>Congratulations! Your Acount has been created</h4>";
					echo "<script>window.location='loginmodal.php'</script>"; 
				 
			}
			else
			{
				echo "Could not create your account".mysqli_error($con);
			}
		}
		 
	}
	 
?>
