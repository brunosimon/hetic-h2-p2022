<?php

    include 'config.php';

    $message = '';

    if(!empty($_POST))
    {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $prepare = $pdo->prepare('SELECT * FROM users WHERE email = :email LIMIT 1');
        $prepare->bindValue('email', $email);
        $prepare->execute();
        $user = $prepare->fetch();

        if(!$user)
        {
            $message = 'User doesn\'t exist';
        }
        else
        {
            if(password_verify($password, $user->password))
            {
                $message = 'User connected';
                
                unset($user->password);
                $_SESSION['user'] = $user;
            }
            else
            {
                $message = 'Wrong password';
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
    <ul>
        <li><a href="inscription.php">Inscription</a></li>
        <li><a href="login.php">Login</a></li>
        <li><a href="private.php">Private</a></li>
        <li><a href="logout.php">Logout</a></li>
    </ul>
    <h1>Login</h1>
    
    <?= $message ?>

    <form action="#" method="post">
        <div>
            <input type="email" name="email" id="email"><label for="email">Email</label>
        </div>
        <div>
            <input type="password" name="password" id="password"><label for="password">Password</label>
        </div>
        <div>
            <input type="submit">
        </div>
    </form>
</body>
</html>