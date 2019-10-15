<?php 
	$sql="select * from userinsurance where email='".$_SESSION['insuranceuser']."'";
	$query=mysqli_query($con,$sql);
	$a=mysqli_fetch_array($query);
	extract ($_POST);
	if (isset($edit))
	{
		$sql="update userinsurance set user_fname='".$fname."', user_lname='".$lname."',
		user_address='".$address."', user_city='".$city."', user_district='".$district."',
		user_contact='".mobile."', user_mobile='".$contact."' where email='".$_SESSION['insuranceuser']."' ";
		$query=mysqli_query($con,$sql);
		if ($query)
		{
			header('location:index.php?page=dashboard');
		}
	}
?>
	<form role="form"  id="myForm" method='post' name="myForm">
	 <div class="row">
	 <div class="col-sm-1">
	 </div>
	 <div class="col-sm-8">
            <div class="form-group">
			
				<div class="row">
					<div class="col-sm-6">
					  <label for="fname1"><span class="glyphicon glyphicon-user" ></span> First Name*</label>
					  <input type="text" class="form-control" name="fname" id="fname1"  
					  onblur="validate('fname', this.value)"  value="<?php echo $a['user_fname']; ?>">
						<p id="fname"> </p>
					</div>
					
					<div class="col-sm-6">
					   <label for="lname1"><span class="glyphicon glyphicon-user"></span> Last Name*</label>
						<input type="text" class="form-control" name="lname"  value="<?php echo $a['user_lname']; ?>"
						id="lname1" onblur="validate('lname', this.value)"placeholder="Enter Your Last Name">
						<p id="lname"></p>
					</div>
				</div>
            </div>
 
			<div class="form-group">
				<div class="row">
					 
					<div class="col-sm-12">
					 <div class="form-group">
              <label for="address">Address*</label>
              <input type="text" class="form-control" id="address1" onblur="validate('address', this.value)"
			  name="address" value="<?php echo $a['user_address']; ?>" >
			  <p id="address"></p>
            </div>
					</div>
					
					 
				</div>               
            </div>
		 
			
			
			
			<div class="form-group">
				<div class="row">
					<div class="col-sm-6">
						 <label for="city">City*</label>
						  <input type="text" class="form-control" id="city1" onblur="validate('city', this.value)"
						  name="city"  value="<?php echo $a['user_city']; ?>">
						  <p id="city"></p>
					</div>
			        <div class="col-sm-6">
						 <label for="district">County*</label>
						  <input type="text" class="form-control" id="district1" 
						  onblur="validate('district', this.value)" name="district"  
						  value="<?php echo $a['user_district']; ?>">
						  <p id="district"></p>
					</div>
				</div>
            </div>
			
			<div class="form-group">
               <div class="row">
				   <div class="col-sm-6">
					
					  		 
              <label for="contact">Mobile No.*</label>
              <input type="number" class="form-control" id="contact1" name="contact"
				onblur="validate('contact', this.value)"   value="<?php echo $a['user_contact']; ?>">
				<p id="contact"></p>
				   </div>
				    <div class="col-sm-6">
					<label for="mobile">Alternate Phone No.</label>
					<input type="number" class="form-control" id="mobile"  value="<?php echo $a['user_mobile']; ?>" name="mobile" placeholder="Enter Your Mobile No. ">

				   </div>
			   </div>
            </div>
			
			 
			 
          <p class="text-right"><input type="submit" value="Make Changes" class="btn btn-danger" name="edit"/></p>
				</form>
			</div>
		</div>
	</div>