<?php
ob_start();
require_once("config/pdoConnect.php");

/**
 * Template Name: Company Comparison
 *
 * @package flatsome
 */

get_header(); 

if (isset($_POST["submit"])) {
	$category = $_POST["category"];
	$cover = $_POST["cover"];
	$plan = $_POST["plan"];
	$firstName = $_POST["firstName"];
	$lastName = $_POST["lastName"];
	$email = $_POST["email"];
	$phone = $_POST["phone"];
	$message = $_POST["message"];

	if ($conn) {

		$stmt = $conn->prepare("INSERT INTO clientDetails (firstName,lastName,email,phone,message,category,cover,plan) VALUES (:firstName,:lastName,:email,:phone,:message,:category,:cover,:plan)");

		$stmt->bindParam(':firstName', $firstName);

		$stmt->bindParam(':lastName', $lastName);

		$stmt->bindParam(':email', $email);

		$stmt->bindParam(':phone', $phone);

		$stmt->bindParam(':message', $message);

		$stmt->bindParam(':category', $category);

		$stmt->bindParam(':cover', $cover);

		$stmt->bindParam(':plan', $plan);

		$stmt->execute();
		
	}else{
		echo "What!!";
	}	

}

?>
<style>
	.animation {

      -webkit-animation-duration: 2s;

      -webkit-animation-iteration-count: infinite; 

    }
    
</style>

<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<div class="w3-container w3-card-4">
	  <h2><b>Relevant Companies</b></h2>

	  <table class="w3-table-all w3-hoverable">
	    <thead>
	      <tr class="w3-light-grey">
	        <th>Company</th>
	        <th>Cover</th>
	        <th>Plan</th>
	        <th>Amount</th>
	        <th>Details</th>
	        <th></th>	        
	      </tr>
	    </thead>

	    <tbody>
	    	<?php 
			$sql = "SELECT * FROM policies WHERE cover='$cover' AND plan='$plan' ORDER BY amount ASC";
			$stmt = $conn->query($sql);      

			while($datarows = $stmt->fetch()){
					$company = $datarows['company'];
					$cover = $datarows["cover"];
					$plan = $datarows['plan'];
					$amount = $datarows['amount'];
					$ID = $datarows['ID'];
				?> 
				<tr style="padding: 10px">
					<td><?php echo  $company; ?></td>
					<td><?php echo  $cover; ?></td>
					<td><?php echo  $plan; ?></td>
					<td><?php echo  $amount; ?></td>
					<td><a href="#">Details</a></td>	
					<td><a href="http://www.lasuri-insurance.com/insurance-period?id=<?php echo $ID; ?>&email=<?php echo $email; ?>" style="background: maroon; color: white;" class="w3-button w3-hover-grey w3-large animation">BUY</a></td>
				</tr>
			<?php }
		?>	
	    </tbody>
	  </table>
	</div>

 

<?php 
get_footer(); 

ob_get_flush();

?>