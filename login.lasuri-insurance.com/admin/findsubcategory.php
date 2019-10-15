<?php
	include ('../connection.php'); 
	$id=$_GET['id'];
	$sql="select * from subcategory where cat_id='".$id."'";
	$query=mysqli_query($con,$sql);
	echo '<select  class="form-control" name="subcatid" id="subcategory">';
	while($a=mysqli_fetch_array($query,MYSQLI_ASSOC))
	{
		echo '<option value="'.$a['subcat_id'].'"> '.$a['subcat_name'].'</option>';
	}
echo '</select>';
?>