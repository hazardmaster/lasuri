<?php
require_once("config/pdoConnect.php");

$mysqli_connection = mysqli_connect("localhost:3306", "lasuriin_getQWot", "[W,[wWSZ6j^f", "lasuriin_getquote");
/**
 * Template Name: Custom Functions
 *
 * @package flatsome
 */




?>

<!DOCTYPE html>
<html>
<head>
<style>
table {
    width: 100%;
    border-collapse: collapse;
}

table, td, th {
    border: 1px solid black;
    padding: 5px;
}

th {text-align: left;}
</style>
</head>
<body>

<?php
	$q = intval($_GET['q']);

	if (!$mysqli_connection) {
	    die('Could not connect: ' . mysqli_error($mysqli_connection));
	}

	$sql="SELECT * FROM user WHERE id = '".$q."'";
	$result = mysqli_query($mysqli_connection,$sql);

	echo "<table>
	<tr>
	<th>Firstname</th>
	<th>Lastname</th>
	<th>Age</th>
	<th>Hometown</th>
	<th>Job</th>
	</tr>";
	while($row = mysqli_fetch_array($result)) {
	    echo "<tr>";
	    echo "<td>" . $row['FirstName'] . "</td>";
	    echo "<td>" . $row['LastName'] . "</td>";
	    echo "<td>" . $row['Age'] . "</td>";
	    echo "<td>" . $row['Hometown'] . "</td>";
	    echo "<td>" . $row['Job'] . "</td>";
	    echo "</tr>";
	}
	echo "</table>";
	mysqli_close($mysqli_connection);
?>
</body>
</html> 