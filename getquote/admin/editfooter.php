<?php 
$catid=$_GET['id'];
extract($_POST);
//echo $catid;
$sql="select * from footer where id='".$catid."'";
$query=mysqli_query($con,$sql);
$a=mysqli_fetch_array($query,MYSQLI_ASSOC);
if(isset($edit))
{
	 
	//echo $catname;
	$sql1="update footer set text='$title',link='$link' where id='".$catid."'";
	if(mysqli_query($con,$sql1))
	{
		header('location:index.php?page=footer');
	}
	else
	{
		echo mysqli_error($con);
	}
}

?>
	<h1 class="text-center text-danger">Update Footer</h2>
			<form role="form" method="post" enctype="multipart/form-data">
				<div class="form-group">
				  <label for="category">Title :</label>
				  <input type="text" class="form-control"  name="title" 
				   required="required"  value="<?php echo $a['text']; ?>">
			   </div> 
			   
			   <div class="form-group">
				  <label for="category">Hyperlink :</label>
				  <input type="text" class="form-control"  name="link" 
				 required="required"  value="<?php echo $a['link']; ?>">
			   </div>   
			   
			      
			<input type="submit" class=" btn btn-primary" value="Update Footer" name="edit"/>
			</form> 