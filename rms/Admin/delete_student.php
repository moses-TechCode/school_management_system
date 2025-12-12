<?php
session_start();
include('../config.php');

if (!isset($_SESSION['role']) || $_SESSION['role'] != 'admin') {
    header("Location: login.php");
    exit;
}

$id = $_GET['id'];
$conn->query("DELETE FROM students WHERE id=$id");
header("Location: Index.php");
exit;
?>