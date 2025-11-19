<?php
$host = "0.0.0.0";
$user = "root";
$pass = "root";
$db = "rms_db";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Database Connection Failed: " . $conn->connect_error);
}
?>