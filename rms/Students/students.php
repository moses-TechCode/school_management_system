<?php
session_start();
include('../config.php');

if (!isset($_SESSION['role']) || $_SESSION['role'] != 'student') {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../static/CDs.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <title>Student Dashboard | RMS</title>
</head>
<body>
  <nav>
     <a href="logout.php">Logout</a>
     <div> loble primary school</div>
  </nav>
 
    <div class="dashboard-container">
    <div class="summary-grid">
        <div class="card summary-card">
            <div class="card-icon"><i class="fas fa-users"></i></div>
            <div class="card-text">
                <p class="summary-title">overall grade</p>
                <h2 class="summary-number">A</h2>
                <p class="summary-detail">100% avarege</p>
            </div>
        </div>

        <div class="card summary-card">
            <div class="card-icon"><i class="fas fa-book-open"></i></div>
            <div class="card-text">
                <p class="summary-title">Subjects</p>
                <h2 class="summary-number">8</h2>
                <p class="summary-detail">Mathematics, Science, etc.</p>
            </div>
        </div>

        <div class="card summary-card">
            <div class="card-icon"><i class="fas fa-file-alt"></i></div>
            <div class="card-text">
                <p class="summary-title">overall performance</p>
                <h2 class="summary-number">good</h2>
                <p class="summary-detail">1 this term</p>
            </div>
        </div>
    </div>
<div><?php include("result.php")?></div>

</div>
</body>
</html>