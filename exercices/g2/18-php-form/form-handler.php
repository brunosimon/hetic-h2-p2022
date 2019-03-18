<?php

// Error and success messages
$messages = [
    'error' => [],
    'success' => [],
];

// Genders
$genders = [
    'male',
    'female',
    'other',
];

// Form sent
if(!empty($_POST))
{
    // Default gender
    if(!isset($_POST['gender']))
    {
        $_POST['gender'] = '';
    }

    // Debug
    echo '<pre>';
    print_r($_POST);
    echo '</pre>';

    // Get variables
    $login = trim($_POST['login']);
    $password = $_POST['password'];
    $age = (int)$_POST['age'];
    $gender = $_POST['gender'];

    // Handle errors
    if(empty($login))
    {
        $messages['error'][] = 'Missing login';
    }

    if(empty($password))
    {
        $messages['error'][] = 'Missing password';
    }
    else if(strlen($password) < 5)
    {
        $messages['error'][] = 'Password too short';
    }

    if(empty($age))
    {
        $messages['error'][] = 'Missing age';
    }
    else if($age < 1 || $age > 127)
    {
        $messages['error'][] = 'Wrong age';
    }

    if(empty($gender))
    {
        $messages['error'][] = 'Missing gender';
    }
    else if(!in_array($gender, $genders))
    {
        $messages['error'][] = 'Wrong gender';
    }

    // Success
    if(empty($messages['error']))
    {
        $prepare = $pdo->prepare('
            INSERT INTO
                users (login, password, age, gender)
            VALUES
                (:login, :password, :age, :gender)
        ');

        $prepare->bindValue('login', $login);
        $prepare->bindValue('password', $password);
        $prepare->bindValue('age', $age);
        $prepare->bindValue('gender', $gender);

        $prepare->execute();

        $messages['success'][] = 'User registered';

        $_POST['login'] = '';
        $_POST['password'] = '';
        $_POST['age'] = '';
        $_POST['gender'] = '';
    }
}

// Form not sent
else
{
    $_POST['login'] = '';
    $_POST['password'] = '';
    $_POST['age'] = '';
    $_POST['gender'] = '';
}