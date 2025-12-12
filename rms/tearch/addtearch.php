<?php
session_start();
include('../config.php');

if (!isset($_SESSION['role']) || $_SESSION['role'] != 'admin') {
    header("Location: ../login.php");
    exit;
}
$sql="SELECT * FROM GradeAnDclass";
$grade_classes= mysqli_query($conn,$sql);
if (isset($_POST['add_student'])) {
    $name = $_POST['name'];
    $Phone_number = $_POST['phone'];
    $GradeClassId = $_POST['grade_class_id'];
    $password = md5($_POST['password']);

    $sql = "INSERT INTO tearch (user_name,Phone_number,GradeClassId,pswd)
            VALUES ('$name','$Phone_number','$GradeClassId', '$password')";
    
    if ($conn->query($sql) === TRUE) {
        $msg = "tearch added successfully!";
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
<form method="POST">
<h2>Add New tearch</h2>
    <label>Name:</label>
    <input type="text" name="name" required>
    <label>phone number</label>
    <input type="number" name="phone" required>
    <label>Password:</label>
    <input type="password" name="password" required>
    <select name="grade_class_id" required>
        <option value="">select</option>
        <?php while($s = $grade_classes->fetch_assoc()): ?>
            <option value="<?= $s['id'] ?>"><?= $s['grade'] ?> (<?= $s['Class'] ?>)</option>
        <?php endwhile; ?>
    </select><br><br>
    <button type="submit" name="add_student">Add Student</button>
</form>
<p style="color:green;"><?php if(isset($msg)) echo $msg; ?></p>
</body>
</html>