<?php
	$email=$_SESSION['insuranceuser'];
		$sql="select * from  plans  where transaction.email='".$email."'";
	//echo $sql;
	$query=mysqli_query($con,$sql);
	//while($a=mysqli_fetch_array($query,MYSQLI_ASSOC))
?>
<table class="table table-responsive table-bordered table-striped text-center">
<caption><h2 class="text-center">Compare Policies</h2></caption>
	`<tr >
		<th class="text-center"> Insurance Plan</th>
		<th class="text-center">  </th>
		<th class="text-center">  </th>
		<th class="text-center">  </th>
		<th class="text-center">  </th>
	</tr>
	
	
</table>