<?php
session_start();
include('../config.php');

if (!isset($_SESSION['role']) || $_SESSION['role'] != 'admin') {
    header("Location: ../login.php");
    exit;
}

$students = $conn->query("SELECT * FROM students");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard | RMS</title>
    <link rel="stylesheet" href="../static/student.css">
    <link rel="stylesheet" href="../static/Admin.css">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body>
  <?php
  include("mune.php")
  ?>

 
    <div class="dashboard-container">
    <div class="summary-grid">
        <div class="card summary-card">
            <div class="card-icon"><i class="fas fa-users"></i></div>
            <div class="card-text">
                <p class="summary-title"> Students in school</p>
                <?php

$sql = "SELECT COUNT(*) AS total_students FROM students";
$result = $conn->query($sql);
$row = $result->fetch_assoc();


?>
                <h2 class="summary-number"><?php
                echo$row['total_students'];
                ?></h2>
                <p class="summary-detail">5 grades</p>
            </div>
        </div>

        <div class="card summary-card">
            <div class="card-icon"><i class="fas fa-book-open"></i></div>
            <div class="card-text">
                <p class="summary-title">Subjects</p>
                <h2 class="summary-number">4</h2>
                <p class="summary-detail">Mathematics, Science, etc.</p>
            </div>
        </div>

        <div class="card summary-card">
            <div class="card-icon"><i class="fas fa-file-alt"></i></div>
            <div class="card-text">
                <p class="summary-title">Results Entered</p>
                <h2 class="summary-number">78</h2>
                <p class="summary-detail">7 pending</p>
            </div>
        </div>
    </div>

    <div class="actions-grid">
        <div class="card action-card">
            <div class="action-header">
                <i class="fas fa-file-signature"></i>
                <h3 class="action-title">manage Students</h3>
            </div>
            <p class="action-description"> see or update Students information</p>
          <a href="result.php">
          <button class="primary-button">manage Students</button>
          </a>  
        </div>

        <div class="card action-card">
            <div class="action-header">
                <i class="fas fa-user-friends"></i>
                <h3 class="action-title">new tearch</h3>
            </div>
            <p class="action-description">add teacher information</p>
            <a href="../Teach/addtearch.php">
              
            <button class="secondary-button">add terchs</button>
            </a>
        </div>

        <div class="card action-card">
            <div class="action-header">
                <i class="fas fa-eye"></i>
                <h3 class="action-title">View Results</h3>
            </div>
            <p class="action-description">Review previously entered student results</p>
            <a href="All_results.php">
            <button class="secondary-button">View All Results</button>
            </a>
        </div>

        <div class="card action-card">
            <div class="action-header">
                <i class="fas fa-plus-circle"></i>
                <h3 class="action-title">Add students</h3>
            </div>
            <p class="action-description">add new students</p>
            <a href="add_students.php">
              
            <button class="secondary-button">Add students</button>
            </a>
        </div>
    </div>
</div>
</body>
</html>