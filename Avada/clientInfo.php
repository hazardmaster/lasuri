<?php
require_once("config/pdoConnect.php");
/**
 * Template Name: Client Information
 *
 * @package flatsome
 */

get_header();
 
?>
<?php 
if (isset($_POST["submit"])) {
	$category = $_POST["category"];
	$cover = $_POST["insurance-cover"];
	$plan = $_POST["insurance-plan"];	

	if (!empty($cover) && !empty($plan)) { ?>

		<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<style>
			.background{
				background-image: url("http://www.lasuri-insurance.com/wp-content/uploads/2019/03/insurance.jpg");
				margin-bottom: 50px;
			}
			
		</style>

		

	<div class="w3-row w3-card-4">		
		<div class="w3-half background">
		</div>
		<div class="w3-half">
			<form action="http://www.lasuri-insurance.com/company-comparison" method="POST" class="w3-container w3-margin">
				<h1 class="w3-center">You Are Almost There</h1>
				 
				<div class="w3-row w3-section">
				  <div class="w3-col" style="width:50px"><i class="w3-xxlarge fa fa-user"></i></div>
				    <div class="w3-rest">
				      <input class="w3-input w3-border" style="color:black;" name="firstName" type="text" placeholder="First Name" required>
				    </div>
				</div>

				<div class="w3-row w3-section">
				  <div class="w3-col" style="width:50px"><i class="w3-xxlarge fa fa-user"></i></div>
				    <div class="w3-rest">
				      <input class="w3-input w3-border" style="color:black;" name="lastName" type="text" placeholder="Last Name" required>
				    </div>
				</div>

				<div class="w3-row w3-section">
				  <div class="w3-col" style="width:50px"><i class="w3-xxlarge fa fa-envelope-o"></i></div>
				    <div class="w3-rest">
				      <input class="w3-input w3-border" style="color:black;" name="email" type="text" placeholder="Email" required>
				    </div>
				</div>

				<div class="w3-row w3-section">
				  <div class="w3-col" style="width:50px"><i class="w3-xxlarge fa fa-phone"></i></div>
				    <div class="w3-rest">
				      <input class="w3-input w3-border" name="phone" style="color:black;" type="text" placeholder="Phone" required>
				    </div>
				</div>

				<div class="w3-row w3-section">
				  <div class="w3-col" style="width:50px"><i class="w3-xxlarge fa fa-pencil"></i></div>
				    <div class="w3-rest">
				      <input class="w3-input w3-border" name="message" style="color:black;" type="text" placeholder="Message">
				    </div>
				</div>

				<!-- Hidden Inputs-->
				<input type="hidden" name="cover" value="<?php echo $cover; ?>" >
				<input type="hidden" name="plan" value="<?php echo $plan; ?>" >
				<input type="hidden" name="category" value="<?php echo $category; ?>" >

				<input type="submit" name="submit" value="Proceed" style="background: maroon; color: white;" class="w3-button w3-block w3-section w3-ripple w3-padding">

			</form>
		</div>
	</div>
	

	<?php }else{
		echo "<h3 style='color:red'>Can't proceed without picking an option.</br></h3>";
		echo "Please go to <a href=\"http://www.lasuri-insurance.com/insurance-cover/\">Insurance options</a>";
	}
	
}?>

<?php get_footer(); ?>