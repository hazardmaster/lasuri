<?php
if (!isset($_SESSION['insuranceuser']))
	{
		header('location:index.php');
	}
	$email=$_SESSION['insuranceuser'];
	 $sql="select * from userinsurance where email='".$email."'" ;
$query=mysqli_query($con,$sql);
$d=mysqli_fetch_array($query);	 
?>
<html>
<head>
 <link rel="icon" href="images/favicon.png">
<style>
.header{
background-color:white;
 background-image:none;}
   
.whitebacks {
		background-color: white;
	}
 
</style> 
<body >
<br>
<br>  
<div class="row">
		<div class="col-sm-2">
		</div>
		<div class="col-sm-8">	
			<ul class="nav nav-tabs nav-justified">
				<li >
					<a><h4 class="text-center info">Step 1-</h4><p>Make Your Selection</p></a>
				</li>
				 
				<li class="active">
				<a ><h4 class="text-center info ">Step 2-</h4><p>Confirm Booking</p></a>
				</li>
				<li><a><h4 class="text-center info">Step 3-</h4><p>Make Payment</p></a></li>
			  </ul> 
		</div>
		<div class="col-sm-2">
		</div>
	</div>
	<div class="row">
		<div class="col-sm-2">
		</div>
		<div class="col-sm-4 whitebacks">
			<div border="1px solid red" height="auto">
				<h2 style="background-color:black; padding:10px; color:white">Booking Details</h2>
				<table>
				<tr>
				<td colspan="4"><label><h4> Insurance Plan</h4></label></td>
				 <td class="text-center"><h4><?php echo $_SESSION['plan']; ?></h4></td>
				</tr>
				<tr>
				<th colspan="4"><label><h4> Insurer Company </h4></label></td>
				 <td class="text-center"><?php echo $_SESSION['insurer']; ?></td>
				</tr>
				<tr>
				<td colspan="4"><b><h4> Premium Duration </h4></b></td>
				 <td class="text-center"><?php echo $_SESSION['duration']; ?>year</td>
				</tr>
				<tr>
				<td colspan="4"><label><h4> Sum Insured </h4></label></td>
				 <td class="text-center">KES. <?php echo $_SESSION['sum'] ?></td>
				</tr>
				<tr>
				<td colspan="4"><label><h4> Annual premium </h4></label></td>
				 <td class="text-center">KES.<?php echo $_SESSION['price'];?></td>
				</tr>
				<tr>
				 
				 
				</table>
				 				
			</div>
		</div>
		<div class="col-sm-4 whitebacks">
			<h2 style="background-color:black; padding:10px; color:white">User Details</h2>
			<table>
				<tr>
				<td colspan="4"><label><h4> Full Name</h4></label></td>
				 <td class="text-center"><?php echo $d['user_fname']," ",$d['user_lname']; ?></td>
				</tr>
				<tr>
				<td colspan="4"><label><h4> Address</h4></label></td>
				 <td class="text-center"><?php echo $d['user_address']; ?></td>
				</tr>
				<tr>
				<td colspan="4"><label><h4> City</h4></label></td>
				 <td class="text-center"><?php echo $d['user_city']; ?></td>
				</tr>
				<tr>
				<td colspan="4"><label><h4> District</h4></label></td>
				 <td class="text-center"><?php echo $d['user_district']; ?></td>
				</tr>
				<tr>
				<td colspan="4"><label><h4> Mobile</h4></label></td>
				 <td class="text-center"><?php echo $d['user_contact']; ?></td>
				</tr>
				<td colspan="4"><label><h4> E-Mail</h4></label></td>
				 <td class="text-center"><?php echo $d['email']; ?></td>
				</tr>
			</table>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-2">
		</div>
		<div class="col-sm-4 whitebacks">
			<h2 style="background-color:black; padding:10px; color:white">Payment Mode</h2>
			<form method="post" action="pay.php">
				 
				<a href="index.php?page=pay" class="btn btn-lg btn-danger"/>Buy Now</a>
			</form>
			<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		</div>
		
	</div>
	</div>
	</div>
</body>
</html>