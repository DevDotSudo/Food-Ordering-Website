<?php
include 'db_connection.php';

define('ADMIN_USERNAME', 'Admin');
define('ADMIN_PASSWORD', 'admin123');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/admin_login.css">
    <title>Admin Login</title>
</head>
<body>
<div class="login-container">
        <h2>Login Form</h2>
        <form action="admin_login.php" method="post">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required><br>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required><br>

            <input type="submit" value="Login">
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $username = $_POST['username'];
            $password = $_POST['password'];

            if ($username === ADMIN_USERNAME && $password === ADMIN_PASSWORD) {
                echo "<script>alert('Login successful!'); window.location.href = 'admin_dashboard.php';</script>";
            } else {
                echo "<script>alert('Incorrect Username or Password!'); window.location.href = 'admin_dashboard.php';</script>";
            }
        }
        $conn->close();
        ?>
    </div>
</body>
</html>
