<?php
ob_start();

	if(isset($_POST['category']))
	{
	 require('config/pdoConnect.php');

	 if (!$conn) {
	 	header("Location: google.com");
	 	exit;
	 }

	 $category = $_POST['category'];

	 $sql = "SELECT * FROM subcategory WHERE cat_id = '1' ";

	 $stmt = $conn->query($sql);

	 while($datarows = $stmt->fetch()){ 

	 	echo "<option>".$datarows['subcat_name']."</option>";

	 }
	 exit;
	}
?>