<?php
$servername = "localhost:3306";

$username = "lasuriin_getQWot";

$password = "[W,[wWSZ6j^f";



try {

    $conn = new PDO("mysql:host=$servername;dbname=lasuriin_getquote", $username, $password);

    // set the PDO error mode to exception

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 

    }

catch(PDOException $e)

    {

    echo "Connection failed: " . $e->getMessage();

    }
?>