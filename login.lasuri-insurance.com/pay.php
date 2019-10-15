<?php
	$id=$_SESSION['id'];
	$duration=$_SESSION['duration'];
	$price=$_SESSION['price'];
	$email=$_SESSION['insuranceuser'];
	$sql="insert into transaction values('','".$id."','".$duration."','".$price."','".$email."')";
	 mysqli_query($con,$sql);
 $sql1="select * from transaction order by txn_id desc";
 $query1=mysqli_query($con,$sql1);
 $x=mysqli_fetch_array($query1,MYSQLI_ASSOC);
 ?>
 
 <style>
 .whitebacks {
		background-color: white;
	}
 
</style>
<div class="">
<h1 class="text-primary text-center whitebacks">Congratulations! Your payment was successful.</h1>
<div class="row ">
<div class="col-sm-3">
</div>
<div class="col-sm-8 whitebacks">
<table>
<tr>
<td colspan="2"><label>Transaction ID-</label></td><td> <p class="text-right"><?php echo $x['txn_id']; ?></p></td>
</tr>
<tr>
<td colspan="2"><label>Plan-</label></td><td> <p class="text-right"><?php echo $_SESSION['plan']; ?>.</p></td>
</tr>
<tr>
<td colspan="2"><label>Insurance Company</label></td><td> <p class="text-right"><?php echo $_SESSION['insurer']; ?>.</p></td>
</tr>
<tr>
<td colspan="2"><label>Premium Duration</label></td><td> <p class="text-right"><?php echo $_SESSION['duration']; ?>.year</p></td>
</tr>
<tr>
<td colspan="2"><label> Sum Insured</label></td><td> <p class="text-right">KES.<?php echo $_SESSION['sum']; ?>.</p></td>
</tr> 
<tr>
 


</tr>
</table>
</div>
</div>
</div>
 

 
	 