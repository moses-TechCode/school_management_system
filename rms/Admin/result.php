<?php
session_start();
include('../config.php');

if (!isset($_SESSION['role']) || $_SESSION['role'] != 'admin') {
  header("Location: ../login.php");
  exit;
}

if (isset($_POST["grade"])) {
  $grade = $_POST["grade"];

  if ($grade == "grade10") {
    $sql = "SELECT * FROM students WHERE Grade_id=10";
  } elseif ($grade == "grade11") {
    $sql = "SELECT * FROM students WHERE Grade_id=11";
  } elseif ($grade == "grade12") {
    $sql = "SELECT * FROM students WHERE Grade_id=12";
  } elseif ($grade == "form1") {
    $sql = "SELECT * FROM students WHERE Grade_id='form1'";
  } elseif ($grade == "form2") {
    $sql = "SELECT * FROM students WHERE Grade_id='form2'";
  } else {
    $sql = "SELECT * FROM students";
  }

  $students = $conn->query($sql);
} else {
  $students = $conn->query("SELECT * FROM students");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard | RMS</title>
    <link rel="stylesheet" href="../static/Result.css">
    <link rel="stylesheet" href="../static/formmune.css"
</head>
<body>
  <?php
  include("mune.php");
  ?> 
  <br/>
<div class="selecter"> 
  <button id="showmune" onclick="showmune()">choose class</button>
  
<form id="form" method="POST">
  <button type="submit" name="grade" value="all">All Students</button>
  <button type="submit" name="grade" value="grade10">Grade 10</button>
  <button type="submit" name="grade" value="grade11">Grade 11</button>
  <button type="submit" name="grade" value="grade12">Grade 12</button>
  <button type="submit" name="grade" value="form1">Form 1</button>
  <button type="submit" name="grade" value="form2">Form 2</button>
    <button onclick="closeform()">close form</button>
</form>
</div>
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
    
    <script src="../js/Mune.js">
   
    </script>
</body>
</html>
