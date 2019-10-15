<?php
ob_start();
require_once("config/pdoConnect.php");
/**
 * Template Name: Insurance Period
 *
 * @package flatsome
 */
get_header(); 
$email = $_GET["email"];
$planID = $_GET["id"];

if (isset($_POST["submit"])) {
	$amount = $_POST["amount"];
	$period = $_POST["period"];

	$totalAmount = $amount * $period;

	$stmt = $conn->prepare("UPDATE clientDetails SET amountPaid='$totalAmount',period='$period' WHERE email='$email' AND amountPaid='0' AND period='0'");	
	if ($stmt->execute()) {
		echo "Amount: ".$amount. "<br>". "Period: " . $period .' Month(s) <br>';

		echo "<h2 style='color:red'><b>Thank you for expressing interest. Our team will get to you shortly...</b></h2>";
	}else{
		echo "Execution not possible. Possible problems with your statements.";
	}
}




if (isset($planID) && isset($email) && !isset($_POST["submit"])) {		

	$sql = "SELECT company FROM policies WHERE ID='$planID'";

    $stmt = $conn->query($sql);

    while($datarows = $stmt->fetch()){

    	$companyWithPolicy = $datarows["company"];
				
    }

    $stmt = $conn->prepare("UPDATE clientDetails SET company = '$companyWithPolicy' WHERE email = '$email' AND company=''");	
	$stmt->execute();	

?>
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<div class="w3-container w3-card-4">
	 <div class="w3-row">
	 	<div class="w3-half">
	 	<form action="" method="POST">

			<label>Select Duration</label>

			<select class="w3-select w3-border" name="period">

				<option value="" disabled selected>Select Duration</option>
				<option value="1">1</option>
				<option value="2">2</option>
				<option value="3">3</option>
				<option value="4">4</option>
				<option value="5">5</option>
				<option value="6">6</option>
				<option value="7">7</option>
				<option value="8">8</option>
				<option value="9">9</option>
				<option value="10">10</option>
				<option value="11">11</option>
				<option value="12">12</option>

			</select>

			<?php 
				$sql = "SELECT amount FROM policies WHERE ID='$planID'";

				$stmt = $conn->query($sql);      

				while($datarows = $stmt->fetch()){
					$amount = $datarows['amount'];
					}
				?>	

				<h2>
					Total Insurance Sum: 
					<span class="text-primary" id="price1">
						<?php echo $amount; ?>							
					</span>
				</h2>

			 <input type="hidden" name="amount" id="oprice" value="<?php echo $amount; ?>"/>

			<p class="text-right">
				<input type="submit" name="submit" value="Checkout &nbsp;" class="btn btn-lg" style="background-color:maroon; color: white">
			</p>
		</form>
	 </div>
	 	
	 	<div class="w3-half">
	 		<img src="http://www.lasuri-insurance.com/wp-content/uploads/2019/08/umbrella.png" height="100%" width="100%">
	 	</div> 	

	</div>
	<br><br><br>
<script>
	function changeprice(str)

		{

		var xmlhttp;

		if (window.XMLHttpRequest)

		{// code for IE7+, Firefox, Chrome, Opera, Safari

		xmlhttp=new XMLHttpRequest();

		}

		else

		{// code for IE6, IE5

		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");

		}

		xmlhttp.onreadystatechange=function()

		{

		if (xmlhttp.readyState==4 && xmlhttp.status==200)

		{

		document.getElementById("price1").innerHTML=xmlhttp.responseText;

		}

		}

		var thea=document.getElementById("oprice").value;
 		//alert(thea);

		//alert("hell");

		xmlhttp.open("GET","findprice.php?value="+str+"&price="+thea,true);

		xmlhttp.send();

		}
</script>

<?php 
   }	
?>	

<?php get_footer();
ob_get_flush(); ?>