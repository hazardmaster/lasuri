<?php
session_start();
ob_start();
include('../connection.php');
if(!isset($_SESSION['user']))
{
	header('location:adminlogin.php');
}
	 
	
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Lasuri Admin Dashboard</title>

<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/datepicker3.css" rel="stylesheet">
<link href="css/styles.css" rel="stylesheet">
<link rel="icon" href="images/favicon.png">

<!--Icons-->
<script src="js/lumino.glyphs.js"></script>
<!--<script src="js/jquery.min.js"></script>-->
<script src="js/jquery-1.11.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<!--[if lt IE 9]>
<script src="js/html5shiv.js"></script>
<script src="js/respond.min.js"></script>
<![endif]-->

</head>

<body>
	<h3>Welcome<?php $_SESSION['user']?></h3>
	<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<b class="navbar-brand">Lasuri Admin Dashboard</b>
				
				 
				<ul class="user-menu">
					<li class="dropdown pull-right">
						<a href="logout.php">
						<svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use>
						</svg> Logout <span  ></span></a>
						 
					</li>
				</ul>
			</div>
							
		</div><!-- /.container-fluid -->
	</nav>
		
	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar" style="border-right:2px solid gray">
		<form role="search">
			 
		</form>
		<ul class="nav menu" >
			 
			<li><a href="index.php"><span class="glyphicon glyphicon-user"></span>Dashboard</a></li>
			<li><a href="index.php?page=category"><span class="glyphicon glyphicon-edit"></span>Types of insurance</a></li>
			<li><a href="index.php?page=subcategory"><span class="glyphicon glyphicon-edit"></span>Insurance Policies</a></li>
			<li><a href="index.php?page=plans"><span class="glyphicon glyphicon-edit"></span>Insurance Plans</a></li>
			<li><a href="index.php?page=policysold"><span class="glyphicon glyphicon-edit"></span>Policy Sold</a></li>
			<li><a href="index.php?page=users"><span class="glyphicon glyphicon-edit"></span>Clients</a></li>
			<!-- <li><a href="index.php?page=header"><span class="glyphicon glyphicon-edit"></span>Header</a></li> -->
			<!-- <li><a href="index.php?page=footer"><span class="glyphicon glyphicon-edit"></span>Footer</a></li> -->
			 <!-- <li><a href="index.php?page=banner"><span class="glyphicon glyphicon-edit"></span>Banner</a></li> -->
		</ul>

	</div><!--/.sidebar-->
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		
		<?php
		error_reporting(1);
			@$opt=$_GET['page'];
			if($opt=='category')
			{
				include ('category.php');
			}
			else if($opt=='users')
			{
				include ('users.php');
			}
			
			else if($opt=='header')
			{
				include ('header.php');
			}
			else if($opt=='editheader')
			{
				include ('editheader.php');
			}
			
			else if($opt=='footer')
			{
				
				include ('footer.php');
			}
			else if($opt=='editfooter')
			{
				
				include ('editfooter.php');
			}
			
			else if($opt=='subcategory')
			{
				include ('subcategory.php');
			}
			else if($opt=='plans')
			{
				include ('plans.php');
			}
			else if($opt=='edittheatre')
			{
				include ('edittheatre.php');
			}
			else if($opt=='editshow')
			{
				include ('editshow.php');
			}
			else if($opt=='editmovie')
			{
				include ('editmovie.php');
			}
			else if($opt=='policysold')
			{
				include ('policysold.php');
			}
			else if($opt=='editcategory')
			{
				include ('editcategory.php');
			}
			else if($opt=='editsubcategory')
			{
				include ('editsubcategory.php');
			}
			else if($opt=='editplan')
			{
				include ('editplan.php');
			}

			
			else
			{
		?>
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header" align="center" style="color:#FEA502">Welcome Back <?php echo $_SESSION['user']?></h1>
			</div>
		</div><!--/.row-->
		
		<div class="row">
			 
			<div class="col-xs-6 col-md-4 col-lg-4">
				<div class="panel panel-teal panel-widget">
					<div class="row no-padding">
						<div class="col-sm-2 col-lg-4 widget-left">
							<svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg>
						</div>
						<div class="col-sm-8 col-lg-6 widget-right">
							<div class="large">
							<?php 
								$q=mysqli_query($con,"select count(user_id) from userinsurance");
								$c=mysqli_fetch_row($q);
								echo $c[0];
							?></div>
							<div class="text-muted"><a href="index.php?page=users">All Users</a></div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xs-6 col-md-4 col-lg-4">
				<div class="panel panel-teal panel-widget">
					<div class="row no-padding">
						<div class="col-sm-2 col-lg-4 widget-left">
							<svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg>
						</div>
						<div class="col-sm-8 col-lg-6 widget-right">
							<div class="large">
							<?php 
								$q=mysqli_query($con,"select count(cat_id) from category");
								$c=mysqli_fetch_row($q);
								echo $c[0];
							?></div>
							<div class="text-muted"><a href="index.php?page=category">Types of insurance</a></div>
						</div>
					</div>
				</div>
			</div>
		</div>
		
			<div class="row">
			<div class="col-xs-6 col-md-4 col-lg-4">
				<div class="panel panel-teal panel-widget">
					<div class="row no-padding">
						<div class="col-sm-2 col-lg-4 widget-left">
							<svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg>
						</div>
						<div class="col-sm-8 col-lg-6 widget-right">
							<div class="large">
							<?php 
								$q=mysqli_query($con,"select count(id) from plans");
								$c=mysqli_fetch_row($q);
								echo $c[0];
							?></div>
							<div class="text-muted"><a href="index.php?page=plans">Insurance plans</a></div>
						</div>
					</div>
				</div>
			</div>
			 
		
		
		
		<div class="col-xs-6 col-md-4 col-lg-4">
				<div class="panel panel-teal panel-widget">
					<div class="row no-padding">
						<div class="col-sm-2 col-lg-4 widget-left">
							<svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg>
						</div>
						<div class="col-sm-4 col-lg-4 widget-right">
							<div class="large">
							<?php 
								$q=mysqli_query($con,"select count(txn_id) from transaction");
								$c=mysqli_fetch_row($q);
								echo $c[0];
							?></div>
							<div class="text-muted"><a href="index.php?page=policysold">Policy sold</a></div>
						</div>
					</div>
				</div>
			</div>
			 
		</div>
		<!--/.row-->
		
		 
		
		 
	 
<?php
			}
			
	 
	ob_end_flush();
?>
 