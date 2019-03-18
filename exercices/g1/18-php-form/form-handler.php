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
];

// Form sent
if(!empty($_POST))
{
    // Debug
    echo '<pre>';
    print_r($_POST);
    echo '</pre>';

    // Add missing data
    if(!isset($_POST['gender']))
    {
        $_POST['gender'] = '';
    }

    // Get data
    $login = trim($_POST['login']);
    $password = $_POST['password'];
    $age = (int)$_POST['age'];
    $gender = $_POST['gender'];

    // Check errors
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

    // Check success
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

        $execute = $prepare->execute();

        if(!$execute)
        {
            $messages['error'][] = 'An error occured';
        }
        else
        {
            $messages['success'][] = 'User registered';

            $_POST['login'] = '';
            $_POST['password'] = '';
            $_POST['age'] = '';
            $_POST['gender'] = '';
        }
    }
}
else
{
    $_POST['login'] = '';
    $_POST['password'] = '';
    $_POST['age'] = '';
    $_POST['gender'] = '';
}