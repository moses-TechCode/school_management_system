<?php
session_start();
include('../config.php');

if (!isset($_SESSION['role']) || $_SESSION['role'] != 'admin') {
    header("Location: ../login.php");
    exit;
}

if (isset($_POST['add_student'])) {
    $name = $_POST['name'];
    $roll_no = $_POST['roll_no'];
    $class = $_POST['class'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);

    $sql = "INSERT INTO students (name, roll_no, class, email, password)
            VALUES ('$name', '$roll_no', '$class', '$email', '$password')";
    
    if ($conn->query($sql) === TRUE) {
        $msg = "Student added successfully!";
    } else {
        $msg = "Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Student | RMS</title>
    <link rel="stylesheet" href="../static/Submit_forms.css">
</head>
<body>
  <div class="obody">
    

<form method="POST">
<h2>Add New Student</h2>
    <label>Name:</label>
    <input type="text" name="name" required>

    <label>Roll No:</label>
    <input type="text" name="roll_no" required>
    
    <label>Class:</label>
    <input type="text" name="class" required>

    <label>Email:</label>
    <input type="email" name="email" required>

    <label>Password:</label>
    <input type="password" name="password" required>
    
    <button type="submit" name="add_student">Add Student</button>
    <p style="color:green;"><?php if(isset($msg)) echo $msg; ?></p>
</form>
</div>
</body>
</html>