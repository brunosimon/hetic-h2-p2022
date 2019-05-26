<?php

    include 'config.php';

    if(empty($_SESSION['user']))
    {
        header('location: login.php');
        exit;
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Private</title>
</head>
<body>
    <ul>
        <li><a href="inscription.php">Inscription</a></li>
        <li><a href="login.php">Login</a></li>
        <li><a href="private.php">Private</a></li>
        <li><a href="logout.php">Logout</a></li>
    </ul>
    <h1>Private</h1>
    Hello <?= $_SESSION['user']->email ?>
</body>
</html>