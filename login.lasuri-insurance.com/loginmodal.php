	<!-- for login -->
<!DOCTYPE html>
<html>
<head>
	<title> Lasuri Login Page </title>
	<!-- <link rel="stylesheet" a href="style\forlogin.css"> -->
	<link rel="stylesheet" type="text/css" href="style/forlogin.css">
	<!-- <link rel="stylesheet" a href="css\font-awesome.min.css"> -->
	<link rel="icon" href="images/favicon.png">
</head>
<body>
	

<div class="modal fade" id="log" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    	<div class="modal-content">
   
        <div class="modal-header">       	
      	
      	<div class="modal-body modal-body-login">
      		<img src="images/logo.png" alt="">
      		<h4 class="modal-header-login">Login Here</h4>
	
         	<div class="alert alert-success" id="err" role="alert"></div>  
	     	<form action="#" method="post">
			<div class="form-group">
				<div class="input-group input-group-sm">
		 
		 <span class="input-group-addon">  
		 <span class="glyphicon glyphicon-envelope"></span></span>
						
	 <input type="email" class="form-control" name="email"  id="email" placeholder="Enter Your Email"/>
	</div>
	</div>

	<!-- for password-->
	<div class="form-group">
	<div class="input-group input-group-sm">
							
		<span class="input-group-addon">  
		 <span class="glyphicon glyphicon-lock"></span></span>
							
	 <input type="password" class="form-control" name="pass"  id="pass" placeholder="Enter Your Password"/>
					
		</div>
	</div>
	<!-- password end -->
	
		<!-- for user type-->
 
	<!-- password end -->	  
      
    <div class="modal-footer">
        <input type="submit" class="btn btn-success btn-css" id="save1"  value="Login" name="login" />
		<!-- <button type="button" class="btn btn-success btn-css" data-dismiss="modal">Cancel</button> -->
		<a href="http://www.lasuri-insurance.com/Lasuri/" class="btn btn-success btn-css"> Cancel </a>
	</div>

	<div class="forgot">
		Forgot password
	</div>
	

</form>

</div> 
  </div>
   		<script src="js/jquery-1.11.1.min.js"></script>
<script>

$(document).ready(function()
{	
	$("#err").hide();
	$("#save1").click(function()
	{		
	var email1 =$('#email').val();
	var pass1 =$('#pass').val();	
	var user =$('#user').val();
	var dataString = 'email_id='+ email1+'&password='+pass1+'&user='+user  ;
	
	if(email1== '' )
	{	
		$("#err").show();
		$("#err").hide().slideDown();
		setTimeout(function(){
		$("#err").hide();        
		}, 3000);
		
 		$("#err").html("Please enter email ");
	} 
	else if(pass1=='')
	{
	$("#err").show();
	$("#err").hide().slideDown();
	setTimeout(function(){
	$("#err").hide();        
			  }, 3000);
			  
 	$("#err").html("Please enter password");
	}
	else
	{
	$.ajax({
	type: "POST",
	url: "ajax_login.php",
	data: dataString,
	cache: false,
	success: function(result){
	$("#err").show(300);
	$('#err').html(result);
	$("#err").hide().slideDown();
	setTimeout(function(){
				  	$("#err").hide();        
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
 
<!-- login model end -->