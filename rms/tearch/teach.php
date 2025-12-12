<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../static/teach.css" title="" type="" />
    <title>tearch dashboard</title>
  </head>
  <body>
<div class="dashboard-container">
    <div class="summary-grid">
        <div class="card summary-card">
            <div class="card-icon"><i class="fas fa-users"></i></div>
            <div class="card-text">
                <p class="summary-title">My Students</p>
                <h2 class="summary-number">85</h2>
                <p class="summary-detail">3 classes</p>
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
                <h3 class="action-title">Enter Results</h3>
            </div>
            <p class="action-description">Add or update student grades and marks</p>
            <a href="add_redult.php">
            <button class="primary-button">Enter Results</button>
            </a>
        </div>

        <div class="card action-card">
            <div class="action-header">
                <i class="fas fa-user-friends"></i>
                <h3 class="action-title">View My Students</h3>
            </div>
            <p class="action-description">See list of students in your classes</p>
            <a href="Students.php">
            <button class="secondary-button">View Students</button>
            </a>
        </div>

        <div class="card action-card">
            <div class="action-header">
                <i class="fas fa-eye"></i>
                <h3 class="action-title">View Results</h3>
            </div>
            <p class="action-description">Review previously entered student results</p>
            <a href="result.php">
            <button class="secondary-button">View All Results</button>
            </a>
        </div>

        <div class="card action-card">
            <div class="action-header">
                <i class="fas fa-plus-circle"></i>
                <h3 class="action-title">Add student</h3>
            </div>
            <p class="action-description">Create a new assignment or test</p>
            <a href="add_redult.php">
              
            <button class="secondary-button">Add student</button>
            </a>
        </div>
    </div>
  </div>
  </body>
</html>