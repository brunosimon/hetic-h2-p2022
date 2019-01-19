<?php
    include 'handle-form.php'
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PHP - Form</title>
    <style>
        .message
        {
            padding: 10px;
            border: 1px solid;
        }

        .message.success
        {
            color: green;
        }

        .message.error
        {
            color: red;
        }
    </style>
</head>
<body>
    <!-- Messages -->
    <?php if(!empty($messages['error'])): ?>
        <?php foreach($messages['error'] as $_message): ?>
            <div class="message error"><?= $_message ?></div>
        <?php endforeach; ?>
    <?php endif; ?>

    <?php if(!empty($messages['success'])): ?>
        <?php foreach($messages['success'] as $_message): ?>
            <div class="message success"><?= $_message ?></div>
        <?php endforeach; ?>
    <?php endif; ?>

    <!-- Form -->
    <form action="#" method="post">
        
        <label for="login">Login:</label>
        <br>
        <input type="text" name="login" id="login" value="<?= $_POST['login']; ?>">

        <br>

        <label for="age">Age:</label>
        <br>
        <input type="number" name="age" id="age" value="<?= $_POST['age']; ?>">

        <br>

        Gender:
        <br>
        <label>
            <input type="radio" name="gender" value="male" <?= $_POST['gender'] === 'male' ? 'checked' : ''; ?>> Male
        </label>
        <label>
            <input type="radio" name="gender" value="female" <?= $_POST['gender'] === 'female' ? 'checked' : ''; ?>> Female
        </label>

        <br>

        <label for="biography">Biography:</label>
        <br>
        <textarea name="biography" id="biography" cols="30" rows="6"><?= $_POST['biography']; ?></textarea>

        <br>
        <input type="submit">

    </form>
</body>
</html>