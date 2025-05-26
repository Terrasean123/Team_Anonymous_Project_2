<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Manage EOI</title>
    <link rel="stylesheet" href="styles/style.css">
</head>
<body>
    <?php include 'header.inc'; ?>
    <div id="logins">
        <h1>Manager Login</h1>
        <form class="logins" method="POST" action="enhancements.php">
            <input type="text" placeholder="Enter username" name="username">
            <input type="password" placeholder="Enter password" name="password">
            <button type="submit" name="log_sudmit">Login</button>
        </form>
        <form class="register" method="POST" action="enhancements.php">
            <input type="text" placeholder="Enter username" name="reg_username">
            <input type="password" placeholder="Enter password" name="reg_password">
            <button type="submit" name="reg_sudmit">Register</button>
        </form>
    <div>
</body>
</html>
<?php

?>

<?php include 'footer.inc'; ?>