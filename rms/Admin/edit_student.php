<?php
session_start();
include('../config.php');

if (!isset($_SESSION['role']) || $_SESSION['role'] != 'admin') {
    header("Location: login.php");
    exit;
}

$id = $_GET['id'];
$student = $conn->query("SELECT * FROM students WHERE id=$id")->fetch_assoc();

if (isset($_POST['update'])) {
    $name = $_POST['name'];
    $roll_no = $_POST['roll_no'];
    $class = $_POST['class'];
    $email = $_POST['email'];

    $sql = "UPDATE students SET name='$name', roll_no='$roll_no', class='$class', email='$email' WHERE id=$id";
    
    if ($conn->query($sql) === TRUE) {
        header("Location: Index.php");
        exit;
    } else {
        $msg = "Error updating: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Student | RMS</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<h2>Edit Student Info</h2>
<a href="Index.php">⬅ Back</a>
<hr>
<form method="POST">
    <label>Name:</label><br>
    <input type="text" name="name" value="<?= $student['name'] ?>" required><br><br>

    <label>Roll No:</label><br>
    <input type="text" name="roll_no" value="<?= $student['roll_no'] ?>" ><br><br>

    <label>Class:</label><br>
    <input type="text" name="class" value="<?= $student['class'] ?>" required><br><br>

    <label>Email:</label><br>
    <input type="email" name="email" value="<?= $student['email'] ?>" required><br><br>

    <button type="submit" name="update">Update</button>
</form>
<p style="color:red;"><?php if(isset($msg)) echo $msg; ?></p>
</body>
</html>