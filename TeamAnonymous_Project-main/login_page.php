<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Login</title>
    <link rel="stylesheet" href="styles/style.css">
</head>
<body>
    <?php include 'header.inc'; ?>
    <div id="logins">
        <h1>Manager Login</h1>
        <form class="login" method="POST" action="enhancements.php">
            <input type="text" name="username" placeholder="Enter username" required />
            <input type="password" name="password" placeholder="Enter password" required />
            <button type="submit" name="log_sudmit">Login</button>
        </form>
        <h2>Register</h2>
        <form class="register" method="POST" action="enhancements.php">
            <input type="text" name="reg_username" placeholder="Choose a username" required />
            <div class="rule">Username must be 3 to 15 characters, letters and numbers only.</div>
            <input type="password" name="reg_password" placeholder="Create a password" required />
            <div class="rule">Password must be at least 6 characters long.</div>
            <button type="submit" name="reg_sudmit">Register</button>
        </form>
    </div>
    <?php include 'footer.inc'; ?>
</body>
</html>
