<?php
session_start();
include('../config.php');

if (!isset($_SESSION['role']) || $_SESSION['role'] != 'tearch') {
    header("Location: ../login.php");
    exit;
}

$students = $conn->query("SELECT * FROM students");

if (isset($_POST['add_result'])) {
    $student_id = $_POST['student_id'];
    $subject = $_POST['subject'];
    $marks = $_POST['marks'];

    // Calculate grade automatically
    if ($marks >= 80) $grade = "A";
    elseif ($marks >= 70) $grade = "B";
    elseif ($marks >= 60) $grade = "C";
    elseif ($marks >= 50) $grade = "D";
    else $grade = "F";

    $sql = "INSERT INTO results (student_id, subject, marks, grade)
            VALUES ('$student_id', '$subject', '$marks', '$grade')";

    if ($conn->query($sql) === TRUE) {
        $msg = "Result added successfully!";
    } else {
        $msg = "Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Result | RMS</title>
    <link rel="stylesheet" href="../static/Submit_forms.css">
</head>
<body>
<form method="POST">
<h2>Add Student Result</h2>  
    <label>Student:</label><br>
    <select name="student_id" required>
        <option value="">Select Student</option>
        <?php while($s = $students->fetch_assoc()): ?>
            <option value="<?= $s['id'] ?>"><?= $s['name'] ?> (<?= $s['roll_no'] ?>)</option>
        <?php endwhile; ?>
    </select><br><br>

    <label>Subject:</label><br>
    <input type="text" name="subject" required><br><br>

    <label>Marks:</label><br>
    <input type="number" name="marks" required><br><br>

    <button type="submit" name="add_result">Add Result</button>
</form>
<a href="teach.php">⬅ Back to Dashboard</a>
<p style="color:green;"><?php if(isset($msg)) echo $msg; ?></p>
</body>
</html>