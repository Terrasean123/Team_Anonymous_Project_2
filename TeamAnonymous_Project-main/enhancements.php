<?php
session_start();
require_once("db_connection.php");

$conn = mysqli_connect($servername, $username, $password, $dbname);

// Get user input
$username = trim($_POST['username']);
$password = trim($_POST['password']);

// Simple query to check credentials
$query = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
$result = mysqli_query($conn, $query);
$user = mysqli_fetch_assoc($result);

if ($user) {
  $_SESSION['username'] = $user['username'];
  header("Location: welcome.php");
  exit();
} else {
  echo "❌ Incorrect username or password.";
}
?>