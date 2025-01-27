<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "gymmanagement";
$DBlink = false;
$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$DBlink = true;
?>
