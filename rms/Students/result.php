<?php
include('../config.php');

if (!isset($_SESSION['role']) || $_SESSION['role'] != 'student') {
    header("Location: login.php");
    exit;
}

$id = $_SESSION['user_id'];

// Default query: load ALL results
$sql = "SELECT * FROM results WHERE student_id=$id";

// If user selects a term
if (isset($_POST["term"])) {
    $term = $_POST["term"];

    if ($term == "term1") {
        $sql = "SELECT * FROM results WHERE student_id=$id AND term=1";
    } elseif ($term == "term2") {
        $sql = "SELECT * FROM results WHERE student_id=$id AND term=2";
    } elseif ($term == "term3") {
        $sql = "SELECT * FROM results WHERE student_id=$id AND term=3";
    }
}

// Run the query
$results = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="../static/Result.css">
<title>Student Dashboard | RMS</title>

<style>
.list{
  width: 100%;
  box-shadow: 3px 4px 6px rgb(153,164,170);
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: 10px;
  gap: 10px;
}
.list button{
  border: 2px solid rgba(107,183,204,0.231);
  border-radius: 10px;
  padding: 10px;
}
</style>

</head>
<body>

<div class="container">
    <h2 class="title">Results for Me</h2>

    <!-- Buttons to select terms -->
    <form class="list" method="post">
        <button type="submit" name="term" value="term1">Term 1</button>
        <button type="submit" name="term" value="term2">Term 2</button>
        <button type="submit" name="term" value="term3">Term 3</button>
    </form>

    <div class="table-container">
        <table>
            <tr class="header">
                <th>Subject</th>
                <th>Marks</th>
                <th>Grade</th>
            </tr>

            <tbody>
            <?php if ($results && $results->num_rows > 0): ?>
                <?php while($r = $results->fetch_assoc()): ?>
                <tr>
                    <td><?= $r['subject'] ?></td>
                    <td><?= $r['marks'] ?></td>
                    <td><?= $r['grade'] ?></td>
                </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr>
                    <td colspan="3" style="padding:20px; text-align:center;">No results found.</td>
                </tr>
            <?php endif; ?>
            </tbody>

        </table>
    </div>
 <a href="download_pdf.php" class="btn">Download Report Card (PDF)</a>
</div>

</body>
</html>