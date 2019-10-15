<?php
	$email=$_SESSION['insuranceuser'];
		$sql="select * from transaction inner join plans on transaction.id=plans.id where transaction.email='".$email."'";
	//echo $sql;
	$query=mysqli_query($con,$sql);
	//while($a=mysqli_fetch_array($query,MYSQLI_ASSOC))
	if(mysqli_num_rows($query))
	{
?>
<style>
.linkcolort {
	background-color: white;
}	
</style>
<table class="table table-responsive table-bordered table-striped text-center linkcolort">
<caption><h2 class="text-center linkcolort">My Policies</h2></caption>
	`<tr class="linkcolort">
		<th class="text-center"> Insurance Plan</th>
		<th class="text-center"> Insurer</th>
		<th class="text-center">  Sum Insured</th>
		<th class="text-center">  Premium Duration</th>
		<th class="text-center">  Annual Premium</th>
	</tr>
	<?php
		while($a=mysqli_fetch_array($query,MYSQLI_ASSOC))
		{
			?>
				<tr>
					<td><?php echo $a['inputfield1']; ?></td>
					<td><?php echo $a['insurer']; ?></td>
					<td>KES. <?php echo $a['sum_insured']; ?></td>
					<td><?php echo $a['duration']; ?> year</td>
					<td>KES. <?php echo $a['annualpremium']; ?></td>
				</tr>
			<?php
		}
	?>
	
</table>
<?php
	}
	else
	{
		
		echo "<table class='table table-responsive  text-center'>";
		echo"<caption><h2 class='text-center'>My Policies</h2></caption>";
		echo "<thead><tr><td>";
		echo"<p align='center' style='font-size:19 ; color:blue'>You Did not Purchase Policy</p><br/><br/><br/>";
		echo "</td></tr></thead></table>";
	}
	?>