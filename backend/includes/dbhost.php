<?php
// Database credentials
$host = "localhost";
$user = "zendlean_sasihubdb";      
$password = "root@sasihub";      
$dbname = "zendlean_sasihub";

// Create connection
$conn = new mysqli($host, $user, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// Connected successfully
