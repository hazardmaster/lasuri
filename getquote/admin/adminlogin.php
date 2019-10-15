<?php
	session_start();		
	extract($_POST);
	 include('../connection.php');
	 //connect database 
	   
	if(isset($login))
	{
		$q=mysqli_query($con,"select * from admin where us_name='$iuser' and password='$ipassword'");
		if(mysqli_num_rows($q))
		{	
				
			$_SESSION['user']=$iuser;
			 
			header('location:index.php');
		}
		else
		{	 
			@$msg= "<h5 style='color:red'>Wrong Crendentials. Please <label for='email'><a href=''>
			Login </a></label> again.</h5>";
		}
	} 
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Lasuri Admin Login</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href=" css/bootstrap.min.css">
	<link rel="stylesheet" href=" css/style1.css">
  <link rel="icon" href="images/favicon.png">
  <script src="js/jquery.min.js"></script>
   <script src="js/bootstrap.min.js"></script>
  <style>
    /* Remove the navbar's default margin-bottom and rounded borders */
    .navbar {
      margin-bottom: 0;
      border-radius: 0;
    }
    
    /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
    .row.content {height: 450px}
    
    /* Set gray background color and 100% height */
    .sidenav {
      padding-top: 20px;
      background-color: #e9a825;
      height: 100%;
    }
    
    /* Set black background color, white text and some padding */
    footer {
      background-color: #555;
      color: white;
      padding: 15px;
    }
    
    /* On small screens, set height to 'auto' for sidenav and grid */
    @media screen and (max-width: 767px) {
      .sidenav {
        height: auto;
        padding: 15px;
      }
      .row.content {height:auto;}
    }
    .img {
      margin-top: 20px;

    }
    
  </style>
</head>
<body class="sidenav">


  
<div class="container-fluid text-center">
  <div class="row content">
    <div class="col-sm-2 sidenav">
      
       
    </div>
    <div class="col-sm-8 text-center body">
      <img class="img" src="images/logo.png" alt="">
      <p style="font-family:serif;color:  #ffffff" class="img">
		This page is for lasuri admin only. Any unauthorised user is not permitted to login through this page.
	  </p>
      <hr>
	  <?php
		echo @$msg;
	  ?>
	  <div class="container col-xs-3">
	  </div>
		<div class="container col-xs-4" >
				<?php include('loginmodel.php');?>
			<?php
				echo @$msg;
			?> 
		</div>
    </div>
    <div class="col-sm-2 sidenav">
       
    </div>
  </div>
</div>


</body>
</html>

