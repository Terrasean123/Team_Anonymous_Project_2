<?php
session_start();
require_once("db_connection.php");

// Database connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("❌ Database connection failed: " . mysqli_connect_error());
}

// LOGIN HANDLER
if (isset($_POST['log_sudmit'])) {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    if (empty($username) || empty($password)) {
        die("⚠️ Please fill in both login fields.");
    }

    $stmt = mysqli_prepare($conn, "SELECT username, password FROM users WHERE username = ?");
    mysqli_stmt_bind_param($stmt, "s", $username);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_store_result($stmt);

    if (mysqli_stmt_num_rows($stmt) === 1) {
        mysqli_stmt_bind_result($stmt, $db_username, $db_password_hash);
        mysqli_stmt_fetch($stmt);

        if (password_verify($password, $db_password_hash)) {
            $_SESSION['username'] = $db_username;
            header("Location: manage.php");
            exit();
        } else {
            echo "❌ Incorrect username or password.";
        }
    mysqli_stmt_close($stmt);
}

// REGISTRATION HANDLER
elseif (isset($_POST['reg_sudmit'])) {
    $reg_username = trim($_POST['reg_username']);
    $reg_password = trim($_POST['reg_password']);

    if (empty($reg_username) || empty($reg_password)) {
        die("⚠️ Please fill in both registration fields.");
    }

    // Username rule: 5–20 characters, letters, numbers, and underscores only
    if (!preg_match('/^[a-zA-Z0-9_]{5,20}$/', $reg_username)) {
        die("❌ Username must be 5–20 characters and only letters, numbers, and underscores.");
    }

    // Password rule: minimum 8 characters, 1 uppercase, 1 lowercase, 1 number, 1 special character
    if (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).{8,}$/', $reg_password)) {
        die("❌ Password must be at least 8 characters and include uppercase, lowercase, number, and special character.");
    }

    // Check if username already exists
    $stmt = mysqli_prepare($conn, "SELECT username FROM users WHERE username = ?");
    mysqli_stmt_bind_param($stmt, "s", $reg_username);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_store_result($stmt);

    if (mysqli_stmt_num_rows($stmt) > 0) {
        die("❌ Username already exists.");
    }
    mysqli_stmt_close($stmt);

    // Hash and store password
    $hashed_password = password_hash($reg_password, PASSWORD_DEFAULT);
    $stmt = mysqli_prepare($conn, "INSERT INTO users (username, password) VALUES (?, ?)");
    mysqli_stmt_bind_param($stmt, "ss", $reg_username, $hashed_password);

    if (mysqli_stmt_execute($stmt)) {
        echo "✅ Registration successful. You may now log in.";
    } else {
        echo "❌ Registration failed: " . mysqli_error($conn);
    }

    mysqli_stmt_close($stmt);
}

mysqli_close($conn);
?>
