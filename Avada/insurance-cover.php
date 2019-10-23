<?php
require_once("config/pdoConnect.php");

$connect = mysqli_connect("localhost:3306", "lasuriin_getQWot", "[W,[wWSZ6j^f", "lasuriin_getquote");
/**
 * Template Name: Insurance-Cover
 *
 * @package flatsome
 */



get_header();
 
?>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
 	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
 	
  	<script>
	 //  	$( document ).ready(function() {
		//     $('#category').on("change", function(){
		//     	var category;
		//     	 category = this.value;

		//     	 $.ajax({
		// 			  type : "post",
		// 			  dataType : "json",
		// 			  url : ajax_object.ajaxurl,
		// 			  data : 'category='+category,
		// 			  success: function(response) {
		// 			    // You can put any code here to run if the response is successful.

		// 			    // This will allow you to see the response
		// 			    console.log(response);
		// 			  }
		// 			});

		//   //   	$.ajax({
		// 		//  type: 'post',
		// 		//  url: 'ajaxChange.php',
		// 		//  data: {
		// 		//   category:category
		// 		//  },
		// 		//  success: function (response) {
		// 		//  	console.log(response);
		// 		//  	console.log(url);
		// 		//   	document.getElementById("new_select").innerHTML=response; 
		// 		//  }

		// 		// });
		//     });
		// });
 	</script>

<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
 <div class="w3-container w3-card-4"> 
	<div class="w3-row">
		<div class="w3-col s6">
			<form action="http://www.lasuri-insurance.com/client-info/" method="POST">
			  	<h1>Select Your Cover Below:</h1>
			  				<!-- Category -->
			  				<label>Category</label>

			  				<select name="category" id="category" class="w3-select w3-border" >
							   <option value="">Select Category</option>
								  <?php  
								  	$sql = "SELECT * FROM category";

								        $stmt = $conn->query($sql);

								      while($datarows = $stmt->fetch()){    
								    ?>
								<option value="<?php echo $datarows["name"]; ?>"><?php echo $datarows["name"]; ?>									
								</option>							
								   <?php } ?>
							</select>

							<!-- <select class="w3-select w3-border" name="category" id="category" onchange="returnCover(this.value)">
							 </select><br><br>

							 <p id="categoryOutput"></p>-->

							 <!-- Cover -->
							<label>Cover</label>
							<select class="w3-select w3-border" name="insurance-cover" id="insurance-cover">
								<option value="" disabled selected>Choose Your Option</option>
								 
								<?php   
								  	$sql = "SELECT * FROM subcategory";

								    $stmt = $conn->query($sql);

								    while($datarows = $stmt->fetch()){ ?>   
								     <option value="<?php echo $datarows["subcat_name"]; ?>">
								     	<?php echo $datarows["subcat_name"]; ?>
								     </option>	
								  <?php } ?>								  						   
							 </select><br><br>

							 <!-- Plan -->
							<label>Plan</label>
							<select class="w3-select w3-border" name="insurance-plan">
							    <option value="" disabled selected>Choose your option</option>
							    <option value="platinum">Platinum</option>
							    <option value="gold">Gold</option>
							    <option value="silverPlus">Silver Plus</option>
							    <option value="silver">Silver</option>
							    <option value="coverMe">Cover Me</option>
							  </select><br>	<br>  
						  
				<p><input type="submit" name="submit" value="Submit" style="background: maroon; color: white;" class="w3-btn"></p>
			</form>
		</div>
		<div class="w3-col s6">
			<img src="http://www.lasuri-insurance.com/Lasuri/wp-content/uploads/2019/08/covered.jpg" width="100%" height="100%">
		</div>
	</div>
 
  </div>

<?php get_footer(); ?>

