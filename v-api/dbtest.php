<?php
$host="35.224.213.115";
$username ="root1";
$password="root";
$conn = new mysqli($host, $username, $password, "db1");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
else{
	// echo "yoooo";
}
?>