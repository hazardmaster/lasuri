<?php 
$catid=$_GET['catid'];
extract($_POST);
//echo $catid;
$sql="select * from category where cat_id='".$catid."'";
$query=mysqli_query($con,$sql);
$a=mysqli_fetch_array($query,MYSQLI_ASSOC);
if(isset($edit))
{
	 
	//echo $catname;
	$sql1="update category set cat_name='$catname' where cat_id='".$catid."'";
	if(mysqli_query($con,$sql1))
	{
		header('location:index.php?page=category');
	}
	else
	{
		echo mysqli_error($con);
	}
}

?>
	<h1 class="text-center text-danger">Edit Category </h2>
			<form role="form" method="post" enctype="multipart/form-data">
				<div class="form-group">
				  <label for="category">Category Name:</label>
				  <input type="text" class="form-control" id="category" name="catname" 
				  placeholder="Enter category name" required="required"  value="<?php echo $a['cat_name']; ?>">
			   </div>      
			<input type="submit" class=" btn btn-primary" value="Edit Category" name="edit"/>
			</form> 