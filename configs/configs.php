<?php
$servername = "localhost";
// $servername = "sql105.epizy.com";
$username = "root";
// $username = "epiz_30554971";
$password = "";
// $password = "mP96xgmTrP";
// $dbname = "coffeemanagement";
$dbname = "healthcare";
// $dbname = "epiz_30554971_healthcare";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
mysqli_set_charset($conn, 'UTF8');
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
