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
    <title>Add Student | RMS</title>
    <link rel="stylesheet" href="../static/all_result.css">
</head>
<body>
<nav>
 <ul>
   <li><a href="#">form 1</a></li>
   <li><a href="#">form 2</a></li>
   <li><a href="#">grade 10</a></li>
   <li><a href="#">grade 11</a></li>
   <li><a href="#">grade 12</a></li>
 </ul> 
</nav>
<div class="allbody">
 <table border="1" cellpadding="5">
        <tr><th>ID</th><th>Name</th><th>Roll No</th><th>Class</th><th>Email or phone no</th>
        <?php while($row = $students->fetch_assoc()): ?>
        <tr>
            <td><?= $row['id'] ?></td>
            <td><?= $row['name'] ?></td>
            <td><?= $row['roll_no'] ?></td>
            <td><?= $row['class'] ?></td>
            <td><?= $row['email'] ?></td>
        </tr>
        <?php endwhile; ?>
    </table>
</div>
</body>
</html>