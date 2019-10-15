	<!-- for registration -->
	<!DOCTYPE html>
<html>
<head>
	<title> Lasuri Insurance Registration Portal </title>
	<!-- <link rel="stylesheet" a href="style\forlogin.css"> -->
	<link rel="stylesheet" type="text/css" href="style/forsignup.css">
	<!-- <link rel="stylesheet" a href="css\font-awesome.min.css"> -->
	<link rel="icon" href="images/favicon.png">
</head>
<body>

<div class="modal fade" id="regx" tabindex="-1" role="dialog" >
  <div class="modal-dialog" role="document">
    	<div class="modal-content centered">
   
        <!-- <img src="images/logor.png" alt=""> -->
      	<div class="modal-body modal-body-registration">
      		<div class="centered">
      			<img src="images/logor.png" alt="">      			
      		</div>

      		<div class="modal-header modal-header-login">
          
          <h4 class="centered">Register To Get Cover </h4>
        </div>
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
			<div class="form-group">
              <label for="nid">National Identity Card No.*</label>
              <input type="text" class="form-control" id="nid1" name="nid"
			  onblur="validate('nid', this.value)" placeholder="Enter Your National Identity Number">
			  <p id="nid"></p>
            </div>
			
			
			
			<div class="form-group">
				<div class="row">
					<div class="col-sm-6">
						 <label for="city">City*</label>
						  <input type="text" class="form-control" id="city1" onblur="validate('city', this.value)"
						  name="city" placeholder="Enter Your  City"  >
						  <p id="city"></p>
					</div>
			        <div class="col-sm-6">
						 <label for="district">County*</label>
						  <input type="text" class="form-control" id="district1" 
						  onblur="validate('district', this.value)" name="district"  
						  placeholder="Enter Your County">
						  <p id="district"></p>
					</div>
				</div>
            </div>
			
			<div class="form-group">
               <div class="row">
					<!-- <div class="col-sm-6">
					<label for="mobile">Mobile No.*</label>
					<input type="number" class="form-control" id="mobile" name="mobile" placeholder="Enter Your Mobile No. ">
				   </div>
 -->
				   <div class="col-sm-6">					  		 
              <label for="contact"> Mobile No.* </label>
              <input type="number" class="form-control" id="contact1" name="contact"
				onblur="validate('contact', this.value)"   placeholder="Enter Your Alternate Phone Number">
				<p id="contact"></p>
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
            <div class="checkbox">
              <button type="submit" name="register" id="register" onclick="checkForm()"
			  class="btn btn-success btn-block btn-css">Sign Up</button>
			  <a href="http://www.lasuri-insurance.com/Lasuri/" class="btn btn-success btn-css"> Cancel </a>
			  <!-- <button type="button" class="btn btn-success btn-css" data-dismiss="modal">Cancel</button> -->
			</div>

			  
          </form>
		
        </div>
      
    
</form>
<div class="modal-footer">
       
				</div>
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
		
 		$("#err3").html("<h3 class='text-center text-danger'>Please enter your county.</h3>");
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

 </body>
 </html>
 
<!-- registration model end -->