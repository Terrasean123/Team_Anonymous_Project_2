<?php
session_start();
require_once("db_connection.php");

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['username']) && isset($_POST['password']) && ($_POST['reg_password']) && ($_POST['usernmame'])) {
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

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['reg_username']) && isset($_POST['reg_password'])) {

    $conn = mysqli_connect($servername, $username, $password, $dbname);

    if (!$conn) {
        die("❌ Database connection failed: " . mysqli_connect_error());
    }

    $reg_username = trim($_POST['reg_username']);
    $reg_password = trim($_POST['reg_password']);

    // Username rule: 5-20 characters, letters, numbers, underscores only
    if (!preg_match('/^[a-zA-Z0-9_]{5,20}$/', $reg_username)) {
        die("❌ Username must be 5-20 characters long and contain only letters, numbers, and underscores.");
    }

    // Password rule example:
    // At least 8 characters, at least one uppercase letter, one lowercase letter, one number, one special character
    if (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).{8,}$/', $reg_password)) {
        die("❌ Password must be at least 8 characters and include uppercase, lowercase, number, and special character.");
    }

    // Check if username already exists
    $stmt = mysqli_prepare($conn, "SELECT id FROM users WHERE username = ?");
    mysqli_stmt_bind_param($stmt, "s", $reg_username);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_store_result($stmt);

    if (mysqli_stmt_num_rows($stmt) > 0) {
        die("❌ Username already exists. Please choose another.");
    }
    mysqli_stmt_close($stmt);

    // Hash the password before storing
    $password_hash = password_hash($reg_password, PASSWORD_DEFAULT);

    // Insert new user securely using prepared statements
    $stmt = mysqli_prepare($conn, "INSERT INTO users (username, password) VALUES (?, ?)");
    mysqli_stmt_bind_param($stmt, "ss", $reg_username, $password_hash);
    
    if (mysqli_stmt_execute($stmt)) {
        echo "✅ Registration successful. You may now log in.";
    } else {
        echo "❌ Registration failed: " . mysqli_error($conn);
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conn);

} else {
    echo "⚠️ Please submit the registration form with username and password.";
}
?>
session_destroy()
?>