<?php
session_start();
include("./checkinfo/connect.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="dist\css\style.css">
    <title><?php echo "Sign in" ?> </title>
</head>
<body class="body">
    <form class="form" action="checkinfo/checklog.php" method="POST">
        <div>
            <input class="form__input" type="text" name="username" placeholder="username" required><br><br>
            <input class="form__input" type="password" name="password" placeholder="password" required><br><br>
            <button class="form__btn" type=submit name="submit">Sign in</button>
        </div>
    </form>
</body>
</html>