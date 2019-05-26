<?php

    session_start();

    if(!empty($_POST))
    {
        $pseudo = $_POST['pseudo'];

        // // Sauvegarder le pseudo en cookie
        // setcookie('pseudo', $pseudo, time() + 60 * 60 * 24, '/');
        // $_COOKIE['pseudo'] = $pseudo;

        // Sauvegarder le pseudo en session
        $_SESSION['pseudo'] = $pseudo;
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Livre d'or</title>
</head>
<body>
    <form action="#" method="post">
        <div>
            <input
                type="text"
                name="pseudo"
                value="<?= isset($_SESSION['pseudo']) ? $_SESSION['pseudo'] : '' ?>"
            > Pseudo
        </div>
        <div>
            <textarea></textarea>
        </div>
        <div>
            <input type="submit">
        </div>
    </form>
</body>
</html>