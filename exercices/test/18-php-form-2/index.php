<?php
    include './config.php';
    include './form-handler.php';

    $query = $pdo->query('SELECT * FROM users');
    $users = $query->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PHP - Form</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <!-- Messages -->
    <?php foreach($messages['error'] as $_message): ?>
        <div class="message error"><?= $_message ?></div>
    <?php endforeach; ?>

    <?php foreach($messages['success'] as $_message): ?>
        <div class="message success"><?= $_message ?></div>
    <?php endforeach; ?>

    <!-- Form -->
    <form action="#" method="post">
    
        <div class="field">
            <label for="login">Login</label>
            <br>
            <input type="text" name="login" id="login" value="<?= $_POST['login'] ?>">
        </div>

        <div class="field">
            <label for="password">Password</label>
            <br>
            <input type="password" name="password" id="password" value="<?= $_POST['password'] ?>">
        </div>

        <div class="field">
            <label for="age">Age</label>
            <br>
            <input type="number" name="age" id="age" value="<?= $_POST['age'] ?>">
        </div>

        <div class="field">
            Gender
            <br>
            <label>
                <input type="radio" name="gender" value="male" <?= $_POST['gender'] === 'male' ? 'checked' : '' ?>>
                Male
            </label>
            <label>
                <input type="radio" name="gender" value="female" <?= $_POST['gender'] === 'female' ? 'checked' : '' ?>>
                Female
            </label>
        </div>

        <div class="field">
            <input type="submit">
        </div>

    </form>

    <h2>Users</h2>

    <table>
        <tr>
            <th>#</th>
            <th>login</th>
            <th>password</th>
            <th>age</th>
            <th>gender</th>
        </tr>
        <?php foreach($users as $_user): ?>
            <tr>
                <td><?= $_user->id ?></td>
                <td><?= $_user->login ?></td>
                <td><?= $_user->password ?></td>
                <td><?= $_user->age ?></td>
                <td><?= $_user->gender ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
