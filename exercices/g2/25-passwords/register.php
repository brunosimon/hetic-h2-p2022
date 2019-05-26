<?php

    include 'config.php';

    $message = '';

    if(!empty($_POST))
    {
        $email = $_POST['email'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

        $prepare = $pdo->prepare(
            'INSERT INTO users (email, password) VALUES (:email, :password)'
        );
        $prepare->bindValue('email', $email);
        $prepare->bindValue('password', $password);
        $prepare->execute();

        $message = 'User created';
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
</head>
<body>
    <h1>Register</h1>
    <ul>
        <li><a href="private.php">Private</a></li>
        <li><a href="register.php">Register</a></li>
        <li><a href="login.php">Login</a></li>
        <li><a href="logout.php">Logout</a></li>
    </ul>
    <?= $message ?>
    <form action="#" method="post">
        <div>
            <input type="email" name="email"> Email
        </div>
        <div>
            <input type="password" name="password"> Password
        </div>
        <div>
            <input type="submit">
        </div>
    </form>
</body>
</html>