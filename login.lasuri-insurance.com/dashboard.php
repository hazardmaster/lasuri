<?php
@$opt1=$_GET['page1'];
	if(!isset($_SESSION['insuranceuser']))
	{
		header("location:index.php");
	}
	$email=$_SESSION['insuranceuser'];
	$sql="select * from userinsurance where email='".$email."'";
	$query=mysqli_query($con,$sql);
	$a=mysqli_fetch_array($query,MYSQLI_ASSOC);
?>
<style>
.linkcolort {
	background-color: white;
}
</style>

<div class="row">
<div class="container-fluid">
<div class="col-sm-2">
<br>
<br>
		<ul class="nav menu linkcolort">
			 
			<li><a href="index.php?page=dashboard">My Profile</a></li> 
			<li><a href="index.php?page=dashboard&page1=mypolicy">My Policies</a></li>
			
			<li><a href="index.php?page=dashboard&page1=editprofile">Edit Profile</a></li>
			  
		</ul>
</div>

<div class="col-sm-10"><br><br><br>
<?php
	if($opt1=='mypolicy')
	{
		include('mypolicy.php');
	}
	else if ($opt1=='editprofile')
	{
		include('editprofile.php');
	}
	else
	{
	?>
<div class="well">
<h2 class="" align="center">

Welcome <?php echo $a['user_fname']; ?></h2>
<div class="text-left">	
	<div class="row text-left">
	<div class="col-sm-6 text-left">
			<table class="table">
				<tr>
					<thead><td><h3 class="text-primary">Name: </h3></td>
					<td><h3 class="text-danger"><?php echo $a['user_fname']." ".$a['user_lname']; ?></h3></td></thead>
				</tr>
			</table>
	</div>
	<div class="col-sm-6">
		<table class="table">
				<tr>
					<thead> <td><h3 class="text-primary ">Mobile No:</h3></td>
					<td><h3 class="text-danger"><?php echo $a['user_mobile']; ?></h3></td></thead>
				</tr>
			</table>
	</div>
	</div>
	
	<div class="row">
	<div class="col-sm-6">
			<table class="table">
				<tr>
					<thead><td><h3 class="text-primary ">Gender:</h3></td>
					<td><h3 class="text-danger"><?php echo $a['user_gender']; ?></h3></td></thead>
				</tr>
			</table>
	</div>
	<div class="col-sm-6">
				<table class="table">
				<tr>
					<thead><td><h3 class="text-primary ">City:</h3></td>
					<td><h3 class="text-danger"><?php echo $a['user_city']; ?></h3></td></thead>
				</tr>
			</table>
	</div>
	</div>
		<div class="row">
	<div class="col-sm-6">
			<table class="table">
				<tr>
					<thead><td><h3 class="text-primary ">County: </h3></td>
					<td><h3 class="text-danger"><?php echo $a['user_district']; ?></h3></td></thead>
				</tr>
			</table>
	</div>
	<div class="col-sm-6">
				<table class="table">
				<tr>
					<thead><td><h3 class="text-primary ">Address: </h3></td>
					<td><h3 class="text-danger"><?php echo $a['user_address']; ?></h3></td></thead>
				</tr>
			</table>
	</div>
	</div>
</div>
</div>
</div>
</div>
</div>
	<?php
	}
	?>