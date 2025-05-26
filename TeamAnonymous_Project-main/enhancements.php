<?php
session_start();
require_once("db_connection.php");

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['username']) && isset($_POST['password'])) {
    $conn = mysqli_connect($servername, $username, $password, $dbname);

    
    if (!$conn) {
        die("❌ Database connection failed: " . mysqli_connect_error());
    }

    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    $query = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($conn, $query);

    $user = mysqli_fetch_assoc($result);
    
    if ($user) {
        $_SESSION['username'] = $user['username'];
        header("Location: manage.php");
        exit();
    } else {
        echo " Incorrect username or password.";
    }
} else {
    echo " Please submit the form first.";
}
session_destroy()
?>