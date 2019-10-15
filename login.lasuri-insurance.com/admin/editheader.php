<?php 
$catid=$_GET['id'];
extract($_POST);
//echo $catid;
$sql="select * from header where id='".$catid."'";
$query=mysqli_query($con,$sql);
$a=mysqli_fetch_array($query,MYSQLI_ASSOC);
if(isset($edit))
{
	 $logo=$_FILES['logo']['name'];
	 
	if($logo=="")
	{
	$sql1="update header set title='$title',tag='$tag' where id='".$catid."'";
	}
	else
	{
	$logos=$a['logo'];
	
unlink("../logo/$logos");
	
$sql1="update header set title='$title',tag='$tag',logo='$logo' where id='".$catid."'";


move_uploaded_file($_FILES['logo']['tmp_name'],"../logo/".$_FILES['logo']['name']);
	}
	mysqli_query($con,$sql1);
	header('location:index.php?page=header');
	
	
}

?>
	<h1 class="text-center text-danger">Update Header</h2>
			<form role="form" method="post" enctype="multipart/form-data">
				<div class="form-group">
				  <label for="category">Title :</label>
				  <input type="text" class="form-control"  name="title" 
				   required="required"  value="<?php echo $a['title']; ?>">
			   </div> 
			   
			   <div class="form-group">
				  <label for="category">TagLine :</label>
				  <input type="text" class="form-control"  name="tag" 
				 required="required"  value="<?php echo $a['tag']; ?>">
			   </div>
			   
			   <div class="form-group">
				  <label for="category">Logo :</label>
				  <input type="file" class="form-control"  name="logo">
			   </div>   
			   
			      
			<input type="submit" class=" btn btn-primary" value="Update Header" name="edit"/>
			</form> 