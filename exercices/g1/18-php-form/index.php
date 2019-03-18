<?php
    include 'database.php';
    include 'form-handler.php';

    if(!empty($_GET['deleteId']))
    {
        $prepare = $pdo->prepare('
            DELETE FROM
                users
            WHERE
                id = :id
        ');

        $prepare->bindValue('id', $_GET['deleteId']);

        $prepare->execute();
    }

    $query = $pdo->query('SELECT * FROM users');
    $users = $query->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Form</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <h1>Form</h1>

    <?php foreach($messages['error'] as $_message): ?>
        <div class="message error">
            <?= $_message ?>
        </div>
    <?php endforeach; ?>

    <?php foreach($messages['success'] as $_message): ?>
        <div class="message success">
            <?= $_message ?>
        </div>
    <?php endforeach; ?>

    <form action="#" method="post">

        <div class="field">
            <label for="login">Login</label>
            <br>
            <input type="text" name="login" value="<?= $_POST['login'] ?>" id="login">
        </div>

        <div class="field">
            <label for="password">Password</label>
            <br>
            <input type="password" name="password" value="<?= $_POST['password'] ?>" id="password">
        </div>

        <div class="field">
            <label for="age">Age</label>
            <br>
            <input type="number" name="age" value="<?= $_POST['age'] ?>" id="age">
        </div>

        <div class="field">
            Gender

            <?php foreach($genders as $_gender): ?>
                <br>
                <label>
                    <input
                        type="radio"
                        name="gender"
                        value="<?= $_gender; ?>"
                        <?= $_POST['gender'] === $_gender ? 'checked' : '' ?>
                    >
                    <?= ucfirst($_gender); ?>
                </label>
            <?php endforeach; ?>
        </div>

        <div class="field">
            <input type="submit">
        </div>

    </form>

    <h1>Users</h1>

    <table>
        <tr>
            <th>#</th>
            <th>login</th>
            <th>password</th>
            <th>age</th>
            <th>gender</th>
            <th>actions</th>
        </tr>
        <?php foreach($users as $_user): ?>
            <tr>
                <td><?= $_user->id ?></td>
                <td><?= $_user->login ?></td>
                <td><?= $_user->password ?></td>
                <td><?= $_user->age ?></td>
                <td><?= $_user->gender ?></td>
                <td>
                    <a href="?deleteId=<?= $_user->id ?>">delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>