<?php

session_start();

ob_start();

	include ("connection.php");

	// include ("loginmodal.php");

	// include ("registrationmodal.php");

	//$sql="select * from category inner join subcategory on category.cat_id=subcategory.cat_id ";

	$sql="select * from category";

	$query=mysqli_query($con,$sql);

	$quer=mysqli_query($con,$sql);

	$head=mysqli_query($con,"select * from header");

	$header=mysqli_fetch_array($head);

	$logos=$header['logo'];

	

?>

<!DOCTYPE html>

<html lang="en">

<head>

  <title><?php echo $header['title']; ?></title>

  <meta charset="utf-8">

  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="icon" href="images/favicon.png">

  <link rel="stylesheet" href="css/bootstrap.min.css">  

  <link rel="stylesheet" href="public/css/default.css" type="text/css">	 

  <style>

    /* Remove the navbar's default margin-bottom and rounded borders */

  .navbar {

      margin-bottom: 0;

      border-radius: 0;

      align-items: center;

    }

    

    /* Add a company theme background color and some padding to the footer */

		footer {

		      background-color: #800000;

		      padding: 25px;

		    }

		.dropdown:hover .dropdown-menu 

			{

		    display: block;

		    margin-top: 0; 

			}

		.p

			{

				font-family:helvetica,verdana,arial,geneva,arial black;

			}



		.whitebacks {

				background-color: white;

			}

		a {

				color: black;	

			} 



		.linkcolor {

			color: white;

		}



		nav {

			-webkit-box-align: center;

		}

  </style>



</head>



<body>

<nav class="navbar navbar-full navbar-light text-center" style="background-color: #800000;">

  <div class="container-fluid text-center center"><img src="images/Banner.png" align="center" alt="">

    <div class="navbar-header text-center">

      <a class="navbar-brand text-center" href="index.php"></a>

    </div>

    <ul class="nav navbar-nav text-center" style="background-color: white">

      <li class="active text-center"><a href="index.php">Home</a></li>

     

	  <?php

		while($a=mysqli_fetch_array($query,MYSQLI_ASSOC))

		{	

			$cat_id=$a['cat_id'];

			$sql1="select * from subcategory where cat_id='".$cat_id."'";

			$query1=mysqli_query($con,$sql1);

			

			?>

			<li class="dropdown active"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><?php echo $a['cat_name'] ?><span class="caret"></span></a>

        <ul class="dropdown-menu">

			<?php

				while($b=mysqli_fetch_array($query1,MYSQLI_ASSOC))

				{

					

					echo '<li ><a href="index.php?page=plans&id='.$b["subcat_id"].'">'. $b['subcat_name'] .'</a></li>';

					

				}

			?>      

        </ul>

      </li>

			

			<?php

		}

		?>

	  

      

    </ul>

	<ul class="nav navbar-nav navbar-right" style="background-color: white">

	<?php

		if(isset($_SESSION['insuranceuser']))

		{

			?>

			<li class="active"><a href="index.php?page=dashboard" ><span class="glyphicon glyphicon-user" ></span> Dashboard</a></li>

			<li class="active"><a href="logout.php" ><span class="glyphicon glyphicon-log-out" ></span> Logout</a></li>

			<?php

		}

		else {

	?>			

	 

      		<?php

		}

	?>

        </ul>

      </div>



</nav>



<?php

	@$opt=@$_GET['page'];

	if ($opt=='plans')

	{

		include('plans.php');

	}

	else if ($opt=='buy')

	{

		include('buy.php');

	}

	else if ($opt=='confirmbooking')

	{

		include('confirmbooking.php');

	}	

	else if ($opt=='pay')

	{

		include('pay.php');

	}

		else if ($opt=='dashboard')

	{

		include('dashboard.php');

	}

	else

	{		

	?>





  <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">

  <!-- Indicators -->

  <!-- <ol class="carousel-indicators">

    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>

    <li data-target="#carousel-example-generic" data-slide-to="1"></li>

    <li data-target="#carousel-example-generic" data-slide-to="2"></li>

  </ol> -->



  <!-- Wrapper for slides -->

  <div class="carousel-inner" role="listbox">

    <div class="item active">

      <img src="images/in3.jpg" alt="..." class="img img-responsive img-thumbnail" width="100%" height="auto">

      <div class="carousel-caption">



      </div>

    </div>

    <!-- <div class="item">

      <img src="images/in3.jpg" alt="..." class="img img-responsive img-thumbnail" width="100%" height="auto">

      <div class="carousel-caption">

       

      </div>

    </div> -->

	<!-- <div class="item">

      <img src="images/in4.jpg" alt="..." class="img img-responsive img-thumbnail" width="100%" height="auto">

      <div class="carousel-caption">

        

      </div>

    </div> -->

 

  </div>

 <!-- Controls -->

  <!-- <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">

    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>

    <span class="sr-only">Previous</span>

  </a>

  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">

    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>

    <span class="sr-only">Next</span>

  </a>

</div> -->



			

	

 

 <br>

 <br>

 <div class="row">

	

	<div class="col-sm-1">

	</div>

		<div class="col-sm-3" >

		<div class="panel panel-primary" width="60%" >

			<div class="panel-heading">

				<h3 class="panel-title">Lasuri Insurance Agency</h3>

			</div>

			 <div class="panel-body">

				<p >

					Lasuri Insurance Agency is a world class Insurance Agency incorporated under the Kenyan law as Private Limited Liability Company. Our Agency is established on the principles of honesty, integrity and Personal Service. 

				</p>

				<p> <br/>

					<h3> Our Promise &amp; Legacy </h3> <br/>

					Lasuri Insurance is an Independent Agency that has serves thousands in the Kenya for over 5 years. <br/> At Lasuri Insurance, our experienced team is able to evaluate and market your insurance needs to a broad range of highly rated insurance companies.

				</p>		

				

			 </div>

		</div>

	</div>

	

	<div class="col-sm-5" >

		<div class="panel panel-primary" width="60%" height="60%">

			<div class="panel-heading">

				<h3 class="panel-title">We Promise</h3>

			</div>

			<div class="panel-body">

				<p>

					<li>Professionalism</li>

					<li> Integrity</li>

					<li> Teamwork</li>

					<li> Commitment</li>

					<li>Enthusiasm</li>

					<li>Accountability</li>

					<li> Innovation</li>

					<li> Timely Communication</li>

				</p>

			</div>

		</div>

	</div>

	<div class="col-sm-3" >

		<div class="panel panel-primary" width="60%" >

			<div class="panel-heading ">

				<h3 class="panel-title">Policy Types </h3>

			</div>

			 <div class="panel-body">

				<ul style="color:maroon">

							<?php

								while($a1=mysqli_fetch_array($quer,MYSQLI_ASSOC))

								{	

									$cat_id1=$a1['cat_id'];

									$sql11="select * from subcategory where cat_id='".$cat_id1."'";

									//$sql11="select * from subcategory";

									$query2=mysqli_query($con,$sql11);

									

								?>

								<li style="color:maroon"><?php echo $a1['cat_name'] ?></span>

								<ul class="a">

									<?php

										while($b1=mysqli_fetch_array($query2,MYSQLI_ASSOC))

										{

											

											echo '<li class="a"><a href="index.php?page=plans&id='.$b1["subcat_id"].'">'. $b1['subcat_name'] .'</a></li>';

											

										}

									?>      

								</ul>

							  </li>

									

									<?php

								}

								?>

				</ul>

			 </div>

		</div>

	</div>

 </div>

<br><br>

<?php

}



?>

<footer class="container-fluid text-center">

  <div class="col-lg-12">

            <ul class="nav nav-pills nav-justified ">

			<?php

			$footer=mysqli_query($con,"select * from footer");

	$foter=mysqli_fetch_array($footer);

			?>

                <li class="linkcolor"><!-- <a href="<?php echo $foter['link']; ?>"> --><?php echo $foter['text']; ?></a></li>

               

            </ul>

        </div>

</footer>

<script src="js/jquery.min.js"></script>

  <script src="js/bootstrap.min.js"></script>

   <script src="js/jquery-1.11.1.min.js"></script>

  <script src="js/jquery-1.12.0.js"></script>

  <script src="js/bootstrap.min.js"></script>

  <script src="js/jquery-ui.js"></script>

  <script src="js/jquery.timer.js"></script>

  <link rel="stylesheet" href="js/jquery-ui.css">

  <script src="js/jquery-1.11.1.min.js"></script>

  <script src="js/jquery-ui-1.8.17.custom.min.js"></script>

  

		  <script type="text/javascript" src="js/jquery-1.12.0.js"></script>

        <script type="text/javascript" src="js/zebra_datepicker.js"></script>

        <script type="text/javascript" src="js/core.js"></script>

		

</body>

</html>



<?php

	ob_end_flush();

?>