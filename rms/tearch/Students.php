<?php
session_start();
include('../config.php');

if (!isset($_SESSION['role']) || $_SESSION['role'] != 'tearch') {
  header("Location: ../login.php");
  exit;
}
$teacher_id = $_SESSION['user_id'];

$students = mysqli_query($conn, "SELECT * FROM students WHERE teacher_id = '$teacher_id'");
?>

<!DOCTYPE html>
<html>
<head>
    <title>sudent_in_class | RMS</title>
    <link rel="stylesheet" href="../static/Result.css">
     <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <div id="hide"></div>
    <table border="1" cellpadding="5">
        <tr><th>ID</th><th>Name</th><th>Roll No</th><th>Class</th><th>Email</th><th>Actions</th></tr>
        <?php while($row = $students->fetch_assoc()): ?>
        <tr>
            <td><?= $row['id'] ?></td>
            <td><?= $row['name'] ?></td>
            <td><?= $row['roll_no'] ?></td>
            <td><?= $row['class'] ?></td>
            <td><?= $row['email'] ?></td>
            <td>
                <a href="edit_student.php?id=<?= $row['id'] ?>">Edit</a> | 
                <a href="delete_student.php?id=<?= $row['id'] ?>">Delete</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
    
    <script src="../js/manage_students.js"></script>
</body>
</html>
