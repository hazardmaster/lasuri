<?php
extract($_POST);
//echo $_GET['sid'];
$sid=$_GET['sid'];
$sql="select * from subcategory where subcat_id ='".$sid."'";
$query=mysqli_query($con,$sql);
$a=mysqli_fetch_array($query,MYSQLI_ASSOC);
if(isset($edit))
{
	 
	//echo $catname;
	$sql1="update subcategory set subcat_name='$subcategory', field1='".$field1."' , field3='".$field3."',field2='".$field2."'
, field4='".$field4."' , field5='".$field5."'  	where subcat_id='".$sid."'";
	if(mysqli_query($con,$sql1))
	{
		header('location:index.php?page=subcategory');
	}
	else
	{
		echo mysqli_error($con);
	}
}
?>
				<form method="post">
				 <div class="form-group">
				  <label for="subcategory">Sub-Category Name:</label>
				  <input type="text" class="form-control" id="subcategory" name="subcategory" value="<?php echo $a['subcat_name']; ?>"
				  placeholder="Enter Sub-category name" required="required">
			   </div>
			   <div class="form-group">
				  <label for="field1">Insurer Company:</label>
				  <input type="text" class="form-control" id="field1" name="field1" 
				  placeholder="Enter the name of insurer" required="required" value="<?php echo $a['field1']; ?>">
			   </div>
			   <div class="form-group">
				  <label for="field2">Field 2:</label>
				  <input type="text" class="form-control" id="field2" name="field2" 
				  placeholder="Enter field 2 name" required="required" readonly value="Plan Name">
			   </div>
			   <div class="form-group">
				  <label for="field3">Field 3:</label>
				  <input type="text" class="form-control" id="field3" name="field3" value="<?php echo $a['field3']; ?>" 
				  placeholder="Enter field 3 name" required="required">
			   </div>
			   <div class="form-group">
				  <label for="field4">Field 4:</label>
				  <input type="text" class="form-control" id="field4" name="field4" value="<?php echo $a['field4']; ?>"
				  placeholder="Enter field 4 name" required="required">
			   </div>
			   <div class="form-group">
				  <label for="field5">Field 5:</label>
				  <input type="text" class="form-control" id="field5" name="field5" value="<?php echo $a['field5']; ?>"
				  placeholder="Enter field 5 name" required="required">
			   </div>
			   
				 
       
			<input type="submit" class=" btn btn-primary" value="Edit Sub-Category" name="edit"/>
			</form> 