<?php
session_start();
include('../config.php');

if (!isset($_SESSION['role']) || $_SESSION['role'] != 'tearch') {
  header("Location: ../login.php");
  exit;
}

$teacher_id = $_SESSION['user_id'];

// Get students assigned to this teacher
$students = mysqli_query($conn,
    "SELECT * FROM students WHERE teacher_id = '$teacher_id'"
);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style>
        details {
            margin-bottom: 15px;
            background: #f8f8f8;
            padding: 10px;
            border-radius: 8px;
        }
        summary {
            cursor: pointer;
            font-weight: bold;
            background: #ddd;
            padding: 8px;
            border-radius: 5px;
        }
        table {
            margin-top: 10px;
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #444;
            padding: 6px;
        }
    </style>

    <title>Teacher Students Results</title>
</head>
<body>

<h2>Students & Their Results</h2>

<?php while ($student = $students->fetch_assoc()): ?>

    <details>
        <summary><?= $student['name'] ?> (<?= $student['roll_no'] ?>)</summary>

        <?php
        $sid = $student['id'];
        $results = mysqli_query($conn,
            "SELECT * FROM results WHERE student_id = '$sid'"
        );
        ?>

        <?php if ($results->num_rows > 0): ?>
            <table>
                <tr>
                    <th>Subject</th>
                    <th>Marks</th>
                    <th>Grade</th>
                </tr>

                <?php while($r = $results->fetch_assoc()): ?>
                <tr>
                    <td><?= $r['subject'] ?></td>
                    <td><?= $r['marks'] ?></td>
                    <td><?= $r['grade'] ?></td>
                </tr>
                <?php endwhile; ?>
            </table>
        <?php else: ?>
            <p>No results recorded yet.</p>
        <?php endif; ?>

    </details>

<?php endwhile; ?>

</body>
</html>