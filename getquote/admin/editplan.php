<?php
	$id=$_GET['id'];
	$sql="select * from plans where id='".$id."'";
	$query=mysqli_query($con,$sql);
	$a=mysqli_fetch_array($query);
	extract($_POST);
	if(isset($edit))
{
	 
	//echo $catname;
	$sql1="update plans set insurer='".$company."', inputfield1='".$field1."' , inputfield3='".$field3."',
	inputfield2='".$field2."', inputfield4='".$field4."' ,price='".$price."'
	,sum_insured='".$sum."' where id='".$id."'";
	if(mysqli_query($con,$sql1))
	{
		header('location:index.php?page=plans');
	}
	else
	{
		echo mysqli_error($con);
	}
}
?>	
<form role="form" method="post" enctype="multipart/form-data">
				 
			 
			   			   
			   <div class="form-group">
				  <label for="company">Insurance Company</label>
				  <input type="text" class="form-control" id="company" name="company" value="<?php echo $a['insurer']; ?>"
				  placeholder="Enter Insurance Company Name" required="required">
			   </div>
				<div class="form-group">
				<div class="row">
				<div class="col-sm-6">
					<label for="sum">Sum Insured</label>
				  <input type="number" class="form-control" id="sum" name="sum" value="<?php echo $a['sum_insured']; ?>" 
				  placeholder="Enter Sum Insured." required="required">
				</div>
				<div class="col-sm-6">
					<label for="price">Annual prmium</label>
				  <input type="number" class="form-control" id="price" name="price" value="<?php echo $a['price']; ?>"
				  placeholder="Enter price for one year." required="required">
				</div>
				</div>
				  
			   </div>			   
			   
			   <div class="form-group">
				  <label for="fiel1">Field 1:</label>
				  <textarea class="form-control" name="field1" id="field1" >
					<?php echo $a['inputfield1']; ?>
				  </textarea>
			   </div>
			   <div class="form-group">
				  <label for="fiel2">Field 2:</label>
				  <textarea class="form-control" name="field2" id="field2">
					<?php echo $a['inputfield2']; ?>
				  </textarea>
			   </div>
			   <div class="form-group">
				  <label for="field3">Field 3:</label>
				  <textarea class="form-control" name="field3" id="field3">
					<?php echo $a['inputfield3']; ?>
				  </textarea>
			   </div>
			   <div class="form-group">
				  <label for="fiel4">Field 4:</label>
				  <textarea class="form-control" name="field4" id="field4">
					<?php echo $a['inputfield4']; ?>
				  </textarea>
			   </div>
			   
			   
				 
        <div class="modal-footer">
			<input type="submit" class=" btn btn-primary" value="Edit Insurance Plan" name="edit"/>
			</form> 