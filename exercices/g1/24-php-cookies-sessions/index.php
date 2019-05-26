<?php

    session_start();

    if(!empty($_POST))
    {
        $pseudo = $_POST['pseudo'];

        // Using cookies
        // setcookie('pseudo', $pseudo, time() + 60, '/');
        // $_COOKIE['pseudo'] = $pseudo;

        // Using sessions
        $_SESSION['pseudo'] = $pseudo;
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cookie</title>
</head>
<body>
    <form action="#" method="post">
        <div>
            <input
                type="text"
                name="pseudo"
                id="pseudo"
                value="<?= !empty($_SESSION['pseudo']) ? $_SESSION['pseudo'] : '' ?>"
            ><label for="pseudo">Pseudo</label>
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