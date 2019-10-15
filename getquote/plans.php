<?php
	include ('connection.php');
	//echo "hello";
	$subcat_id=$_GET['id'];
	
	$sql3="select * from plans inner join subcategory on plans.subcat_id=subcategory.subcat_id inner join category on plans.cat_id=category.cat_id where subcategory.subcat_id='".$subcat_id."'";
	
	
	//$sql3="select * from plans where subcat_id='".$subcat_id."'";
	
	$sql4="select * from subcategory where subcat_id='".$subcat_id."'";
	
	
	$query4=mysqli_query($con,$sql4);
	$query3=mysqli_query($con,$sql3);
	$query33=mysqli_query($con,$sql3);
	
	$y=mysqli_fetch_array($query3,MYSQLI_ASSOC);
	
		
?>
 <style>
    
.whitebacks {
		background-color: white;
	}
 .backcolor {
 	background-color: #800000;

 }
 .texthere {
 	color: #fff;

 }
 .sizetext{
 	font-size: 18px;
 }
 </style>
<div class="container">
	<div class="row">
	 
	<div class="col-sm-12">
	
		<?php
			echo "";
			
			?>
<div class="well backcolor">
<table class="table table-responsive table-bordered table-striped table-hover text-center">
		<?php
			echo "<h3 class='texthere'> Login To Purchase A Cover </h3>";

			echo "<caption class='text-center text-danger texthere'><h3>".$y['subcat_name']."</h3></caption>";


			// echo "Home >> ".$x['cat_name']." >> ".$x['subcat_name'];
			while($y=mysqli_fetch_array($query4,MYSQLI_ASSOC))
			{
				?>
				<tr>
					<th class="text-center"><?php echo $y['Insurance name'] ?></th>
					<th class="text-center"><?php echo $y['field2'] ?></th>
					<th class="text-center"><?php echo $y['field3'] ?></th>
					<th class="text-center"><?php echo $y['field4'] ?></th>
					<th class="text-center"><?php echo $y['field5'] ?></th>
					<th class="text-center">Cover Me</th>
					<th class="text-center">Annual Premium</th>
					<?php
						if (isset($_SESSION['insuranceuser']))
						{
						?>
						<th class="text-center">Buy Insurance</th>
						<?php
						}
					?>
				</tr>
				<?php
			}
		?>
	
 
		<?php
			while($x=mysqli_fetch_array($query33,MYSQLI_ASSOC))
			{
				?>
				<tr>
					<td><?php echo $x['insurer']; ?></td>
					<td><?php echo $x['inputfield1']; ?></td>
					<td><?php echo $x['inputfield2']; ?></td>
					<td><?php echo $x['inputfield3']; ?></td>
					<td><?php echo $x['inputfield4']; ?></td>
					 
					<td><?php echo $x['sum_insured']; ?></td>
					<td><?php echo $x['price']; ?></td>
<?php
						if (isset($_SESSION['insuranceuser']))
						{
					 
						echo '<td class="text-center"><a href="index.php?page=buy&planid='.$x['id'].'" class="btn btn-primary">Buy Now<a></td>';
					 
						}
					?>					
				</tr>
				
				
				
				<?php
			}
		?>	 
</table>
		</div>
		</div>
	</div>
</div>