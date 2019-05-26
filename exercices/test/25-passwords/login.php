<?php

    include 'config.php';

    $message = '';

    if(!empty($_POST))
    {
        $email = $_POST['email'];
        $salt = hash('md5', $email.SALT);
        $password = $_POST['password'];

        $prepare = $pdo->prepare('SELECT * FROM users WHERE email = :email LIMIT 1');
        $prepare->execute([
            'email' => $email,
        ]);
        $user = $prepare->fetch();

        if(!$user)
        {
            $message = 'User not found';
        }
        else
        {
            if(!password_verify($password, $user->password))
            {
                $message = 'User found by password different';
            }
            else
            {
                $message = 'User connected';

                $_SESSION['user'] = $user;
            }
        }
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
</head>
<body>
    <h1>Login</h1>
    <ul>
        <li><a href="inscription.php">Inscription</a></li>
        <li><a href="login.php">Login</a></li>
        <li><a href="private.php">Private</a></li>
        <li><a href="disconnect.php">Disconnect</a></li>
    </ul>

    <p><?= $message ?></p>

    <form action="#" method="POST">
        <div>
            <input type="email" name="email" id="email">
            <label for="email">Email</label>
        </div>
        <div>
            <input type="password" name="password" id="password">
            <label for="password">Password</label>
        </div>
        <div>
            <input type="submit">
        </div>
    </form>
</body>
</html>