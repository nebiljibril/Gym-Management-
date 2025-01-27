<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "gymmanagement";

$mysqli = new mysqli($servername, $username, $password, $dbname);

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

function executeQuery($mysqli, $query, $data) {
    $stmt = $mysqli->prepare($query);
    if ($stmt === false) {
        die("Error preparing statement: " . $mysqli->error);
    }

    $stmt->bind_param(str_repeat('s', count($data)), ...$data);
    $result = $stmt->execute();
    if ($result === false) {
        die("Error executing statement: " . $stmt->error);
    }

    $stmt->close();

    return $result;
}
?>
