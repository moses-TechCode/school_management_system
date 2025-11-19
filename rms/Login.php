<?php
session_start();
include('config.php');

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $role = $_POST['role'];

    if ($role == "admin") {
        $sql = "SELECT * FROM admins WHERE username='$username' AND password='$password'";
    } 
    elseif ($role == "tearch") {
      $sql = "SELECT * FROM tearch WHERE user_name='$username' AND pswd='$password'";
    }
    else {
        $sql = "SELECT * FROM students WHERE roll_no='$username' AND password='$password'";
    }

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $data = $result->fetch_assoc();
        $_SESSION['user_id'] = $data['id'];
        $_SESSION['role'] = $role;

        if ($role == "admin") {
            header("Location: Admin/admin.php");
        }
        elseif($role=="tearch"){
          
          header("Location: Teach/teach.php");
        }
        else {
            header("Location:  Students/students.php");
        }
    } else {
        $error = "Invalid credentials!";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="static/form.css">
  <script src="js/index.js"></script>
  <title>Result_managemet</title>
</head>
<body>
    <form method="POST">
    <h2>login</h2>
        <input type="text" name="username" placeholder="Username or Roll No" required>
        <input type="password" name="password" placeholder="Password" required><br>
        <select name="role">
            <option value="admin">Admin</option>
            <option value="student">Student</option>
            <option value="tearch">tearch</option>
        </select>
        <button type="submit" name="login">Login</button>
               <p style="color:red;"><?php if(isset($error)) echo $error; ?></p>
    </form>
</body>
</html>