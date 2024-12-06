<?php
$servername = "localhost";
$username = "SudoDotDev";
$password = "101802";
$dbname = "food_ordering";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "<script>console.log('Login successful!');</script>"
?>
