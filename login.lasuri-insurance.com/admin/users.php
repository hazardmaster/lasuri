
		<div class="col-sm-12 text-left">
		  
		   <ul class="pager">
  <li class="previous"><a href="index.php?page=subcategory&pagi=<?php echo $pagi;?>">Previous</a></li>
  <li class="next"><a href="index.php?page=subcategory&pagi='<?php echo $last;?>'">Next</a></li>
</ul>
			 <form method="post">
					<button class="btn btn-primary  "><a href="#" data-toggle="modal" data-target="#regx" ><font color="white">
				Add  New user</font></a> </button>
				  <p class="text-right"> <input type="submit" class="btn btn-primary"  name="delete" value="Delete Selected Sub-Category"/></p> 
				    <p>
				   <table class="table table-bordered table-responsive">
					<tr class="warning">
						<th>	sr.No</th>
						<th>	User name	</th>
						<th>	Gender	</th>
						<th>	Address	</th>
						<th>	City</th>
						<th>	District	</th>
						<th>	Mobile	</th>
						<th>	Email	</th>
						<th>	Date	</th>						 
						<th>	Delete		</th>
						<th>	Modify		</th>						
					</tr>
					<hr/>
					<?php
						//delete subcategory
						 if(isset($_POST['delete']))
						{
							$sid=implode(',',$_POST['sid']);
							//echo $sid;
							//update values of subcategory table
							$data="delete from userinsurance WHERE user_id in(".$sid.")";
							mysqli_query($con,$data);	
							header('location:index.php?page=users');
						}
						
						$d="select count(subcat_id) from userinsurance";
						$v=mysqli_query($con,$d);
						
						$row=mysqli_fetch_array($v,MYSQL_NUM);
						$rec_count=$row[0];	
							$rec_limit=10;
         if( isset($_GET{'pagi'} ) )
			 {
            $pagi = $_GET{'pagi'} + 1;
            $offset = $rec_limit * $pagi ;
         }else {
            $pagi = 0;
            $offset = 0;
         }
         
		 
         $left_rec = $rec_count - ($pagi * $rec_limit);
		$data1="SELECT * FROM userinsurance  LIMIT $offset, $rec_limit";
						$val1=mysqli_query($con,$data1);
						$inc=1;
						$i=1;		
						while($r=mysqli_fetch_array($val1,MYSQLI_ASSOC))
						{
							echo "<tr>";
								 
								echo "<td>".$i."</td>";
				echo "<td>".$r['user_fname']." ".$r['user_lname']."</td>";
								echo "<td>".$r['user_gender']."</td>";
								echo "<td>".$r['user_address']."</td>";
								echo "<td>".$r['user_city']."</td>";
								echo "<td>".$r['user_district']."</td>";
								echo "<td>".$r['user_mobile']."</td>";
								echo "<td>".$r['email']."</td>";
								echo "<td>".$r['date']."</td>";
								echo "<td> <input type='checkbox' name='sid[]' value='".$r['user_id']."'/></td>";
								echo "<td> <a href='index.php?page=editusers&sid=".$r['user_id']."'>
								Edit</a></td>";
								 
							echo "</tr>";
							$i++;
							$inc++;
						}
					?>
					<tr>
					<?php
			   if( $pagi > 0 )
						 {
								 $last = $pagi - 2;
							  echo "<a href = \"index.php?page=users&pagi=$last\">Prev</a> |";
								echo "<a href = \"index.php?page=users&pagi=$pagi\">Next</a>";
								 
								 }
								 else if( $pagi == 0 )
								  {
							 echo "<a href='index.php?page=users&pagi=$pagi'>Next</a>";
								 }
								 else if( $left_rec < $rec_limit ) {
									$last = $pagi - 2;
									echo "<a href='index.php?page=users&pagi=$last'>Prev</a>";
						 }
				?></tr>
				   </table>
 
				  </form>
		  
		</div>
  	<!-- for registration -->
<div class="modal fade" id="regx" tabindex="-1" role="dialog" >
  <div class="modal-dialog" role="document">
    	<div class="modal-content">
   
        <div class="modal-header style="padding:35px 80px;">
          <p class="text-center"><button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4><span class="glyphicon glyphicon-lock"></span> Sign Up</h4></p>
        </div>
      	<div class="modal-body">
	<form role="form"  id="myForm" method='post' name="myForm">
	  <div class="alert alert-success" id="err3" role="alert"></div>
            <div class="form-group">
			
				<div class="row">
					<div class="col-sm-6">
					  <label for="fname1"><span class="glyphicon glyphicon-user" ></span> First Name*</label>
					  <input type="text" class="form-control" name="fname" id="fname1"  
					  onblur="validate('fname', this.value)" placeholder="Enter Your First Name">
						<p id="fname"> </p>
					</div>
					
					<div class="col-sm-6">
					   <label for="lname1"><span class="glyphicon glyphicon-user"></span> Last Name*</label>
						<input type="text" class="form-control" name="lname"  
						id="lname1" onblur="validate('lname', this.value)"placeholder="Enter Your Last Name">
						<p id="lname"></p>
					</div>
				</div>
            </div>
 
			<div class="form-group">
				<div class="row">
					<div class="col-sm-6">
						 <label> Gender*</label>
						<select name="gender" class="form-control" id="gender">
							<option Value="Male">Male</option>
							<option Value="Female">Female</option>		 
						</select>
					</div>
					<div class="col-sm-6">
					 <div class="form-group">
              <label for="address">Address*</label>
              <input type="text" class="form-control" id="address1" onblur="validate('address', this.value)"
			  name="address" placeholder="Enter Your Address"  >
			  <p id="address"></p>
            </div>
					</div>
					
					<!--<div class="col-sm-6">
					  <label for="dob"> Date of Birth*</label>
					  <input type="text" class="form-control" id="dob" name="dob" required>
					</div>-->
					<!--<link rel="stylesheet" href="public/css/reset.css" type="text/css">-->
        <link rel="stylesheet" href="public/css/default.css" type="text/css">
       <!-- <link rel="stylesheet" href="public/css/style.css" type="text/css">-->
		  <script type="text/javascript" src="js/jquery-1.12.0.js"></script>
        <script type="text/javascript" src="js/zebra_datepicker.js"></script>
        <script type="text/javascript" src="js/core.js"></script>
    
<script>
 
  $(document).ready(function() {
	$('#dob').Zebra_DatePicker({
    // remember that the way you write down dates
    // depends on the value of the "format" property!
    //direction: [startdate,enddate]
});
  }); 
 
				 
		 
		
		</script>
 
				</div>               
            </div>
			<!--<div class="form-group">
              <label for="nid">National Identity Card No.*</label>
              <input type="text" class="form-control" id="nid1" name="nid"
			  onblur="validate('nid', this.value)" placeholder="Enter Your National Identity Number">
			  <p id="nid"></p>
            </div>-->
			
			
			
			<div class="form-group">
				<div class="row">
					<div class="col-sm-6">
						 <label for="city">City*</label>
						  <input type="text" class="form-control" id="city1" onblur="validate('city', this.value)"
						  name="city" placeholder="Enter Your  City"  >
						  <p id="city"></p>
					</div>
			        <div class="col-sm-6">
						 <label for="district">District*</label>
						  <input type="text" class="form-control" id="district1" 
						  onblur="validate('district', this.value)" name="district"  
						  placeholder="Enter Your District">
						  <p id="district"></p>
					</div>
				</div>
            </div>
			
			<div class="form-group">
               <div class="row">
				   <div class="col-sm-6">
					
					  		 
              <label for="contact">Mobile No.*</label>
              <input type="number" class="form-control" id="contact1" name="contact"
				onblur="validate('contact', this.value)"   placeholder="Enter Your Contact Phone Number">
				<p id="contact"></p>
				   </div>
				    <div class="col-sm-6">
					<label for="mobile">Alternate Phone No.</label>
					<input type="number" class="form-control" id="mobile" name="mobile" placeholder="Enter Your Mobile No. ">

				   </div>
			   </div>
            </div>
			
			 	 <div class="form-group">
				<div class="row">
					<div class="col-sm-6">
					  <label for="email1"> Email Address*</label>
					  <input type="email" class="form-control" id="email1" 
					  onblur="validate('email', this.value)"   name="email" placeholder="Enter Email Address">
					  <p id="email"></p>
					</div>
					 <div class="col-sm-6">
					  <label for="iemail"> Confirm Email Address*</label>
					  <input type="email" class="form-control"   id="iemail1" name="iemail"
					  onkeypress="validate('iemail', this.value)" placeholder="Confirm Email Address">
					  <p id="iemail"></p>
					</div>
				</div>
            </div>
			
			 
            <div class="form-group">
				<div class="row">
					<div class="col-sm-6">
					  <label for="password1"><span class="glyphicon glyphicon-eye-open"></span> Password*</label>
					  <input type="password" class="form-control" id="password1"  
					  onblur="validate('password', this.value)"
					  name="password" placeholder="Enter Password">
						<p id="password"></p>
					</div>
					 <div class="col-sm-6">
					  <label for="cpassword1"><span class="glyphicon glyphicon-eye-open"></span> Confirm Password*</label>
					  <input type="password" class="form-control" id="cpassword1" name="cpassword"  
						onkeypress="validate('cpassword', this.value)" placeholder="Confirm Password">
						<p id="cpassword"></p>
					</div>
				</div>
            </div>
            <div class="checkbox">
              <label><input type="checkbox" required value="" checked>I agree to <a href="#">Terms & Conditions</a></label>
            </div>
              <button type="submit" name="register" id="register" onclick="checkForm()"
			  class="btn btn-success btn-block">Register Me</button>
          </form>
		
        </div>
      
    <div class="modal-footer">
       <button type="button" class="btn btn-success" data-dismiss="modal">Cancel</button>
	</div>
</form>
</div> 
  </div>
   		<script src="js/jquery-1.11.1.min.js"></script>
<script>
$(document).ready(function()
{	
	$("#err3").hide();
	$("#register").click(function()
	{		
	var fname =$('#fname1').val();
	var lname =$('#lname1').val();
	var gender =$('#gender').val();
 
	var address =$('#address1').val();
	var city =$('#city1').val();
	var district =$('#district1').val();
	var contact =$('#contact1').val();
	var mobile =$('#mobile').val();
	var email =$('#email1').val();
	var iemail =$('#iemail1').val();
	var password =$('#password1').val();
	var cpassword =$('#cpassword1').val();
	 
	var dataString ='fname='+fname+'&lname='+lname+'&gender='+gender+'&address='+address+'&city='+city+'&district='+district+'&contact='+contact+'&mobile='+mobile+'&email='+email+'&iemail='+iemail+'&password='+password+'&cpassword='+cpassword;
	if(fname== '' )
	{	
		$("#err3").show();
		$("#err3").hide().slideDown();
		setTimeout(function(){
		$("#err3").hide();        
		}, 3000);
		
 		$("#err3").html("<h3 class='text-center text-danger'>Please enter your first name.	</h3>");
	} 
	else if(lname== '' )
	{	
		$("#err3").show();
		$("#err3").hide().slideDown();
		setTimeout(function(){
		$("#err3").hide();        
		}, 3000);
		
 		$("#err3").html("<h3 class='text-center text-danger'>Please enter your last name.</h3>");
	}
	else if(address== '' )
	{	
		$("#err3").show();
		$("#err3").hide().slideDown();
		setTimeout(function(){
		$("#err3").hide();        
		}, 3000);
		
 		$("#err3").html("<h3 class='text-center text-danger'>Please enter your address.</h3>");
	}
	else if(city== '' )
	{	
		$("#err3").show();
		$("#err3").hide().slideDown();
		setTimeout(function(){
		$("#err3").hide();        
		}, 3000);
		
 		$("#err3").html("<h3 class='text-center text-danger'>Please enter your city.</h3>");
	}
	else if(district== '' )
	{	
		$("#err3").show();
		$("#err3").hide().slideDown();
		setTimeout(function(){
		$("#err3").hide();        
		}, 3000);
		
 		$("#err3").html("<h3 class='text-center text-danger'>Please enter your district.</h3>");
	}
	else if(contact== '' )
	{	
		$("#err3").show();
		$("#err3").hide().slideDown();
		setTimeout(function(){
		$("#err3").hide();        
		}, 3000);
		
 		$("#err3").html("<h3 class='text-center text-danger'>Please enter your mobile no.</h3>");
	}
	else if(email== '' )
	{	
		$("#err3").show();
		$("#err3").hide().slideDown();
		setTimeout(function(){
		$("#err3").hide();        
		}, 3000);
		
 		$("#err3").html("<h3 class='text-center text-danger'>Please enter your email-id.</h3>");
	} 
	else if(iemail== '' )
	{	
		$("#err3").show();
		$("#err3").hide().slideDown();
		setTimeout(function(){
		$("#err3").hide();        
		}, 3000);
		
 		$("#err3").html("<h3 class='text-center text-danger'>Re-enter your emaild-id.</h3>");
	} 
	else if(password=='')
	{
	$("#err3").show();
	$("#err3").hide().slideDown();
	setTimeout(function(){
	$("#err3").hide();        
			  }, 3000);
			  
 	$("#err3").html("<h3 class='text-center text-danger'>Please enter password.</h3>");
	}
	else if(cpassword== '' )
	{	
		$("#err3").show();
		$("#err3").hide().slideDown();
		setTimeout(function(){
		$("#err3").hide();        
		}, 3000);
		
 		$("#err3").html("<h3 class='text-center text-danger'>Re-enter your password.</h3>");
	} 
	else
	{
			$.ajax({
	type: "POST",
	url: "ajax_registration.php",
	data: dataString,
	cache: false,
	success: function(result){
	$("#err3").show(300);
	$('#err3').html(result);
	$("#err3").hide().slideDown();
	setTimeout(function(){
				  	$("#err3").hide();        
			  }, 3000);	
	}
	});	
	}
 
return false;
	});
});
 
</script>

   
    </div>
  </div>
 
<!-- registration model end -->