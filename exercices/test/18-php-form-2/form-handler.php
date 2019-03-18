<?php

    // Error and success messages
    $messages = [
        'error' => [],
        'success' => [],
    ];

    // Genders
    $genders = ['male', 'female'];

    // Form sent
    if(!empty($_POST))
    {
        if(empty($_POST['gender']))
        {
            $_POST['gender'] = '';
        }

        // Get all values
        $login = $_POST['login'];
        $password = $_POST['password'];
        $age = $_POST['age'];
        $gender = $_POST['gender'];

        // Handle errors
        if(empty($login))
        {
            $messages['error'][] = 'Empty login';
        }

        if(empty($password))
        {
            $messages['error'][] = 'Empty password';
        }
        else if(strlen($password) < 5)
        {
            $messages['error'][] = 'Password to short';
        }

        if(empty($age))
        {
            $messages['error'][] = 'Empty age';
        }
        else if($age <= 0 || $age > 120)
        {
            $messages['error'][] = 'Wrong age';
        }

        if(empty($gender))
        {
            $messages['error'][] = 'Empty gender';
        }
        else if(!in_array($gender, $genders))
        {
            $messages['error'][] = 'Wrong gender';
        }

        // Success
        if(empty($messages['error']))
        {
            // Save in DB
            $prepare = $pdo->prepare('
                INSERT INTO
                    users (login, password, age, gender)
                VALUES
                    (:login, :password, :age, :gender)
            ');
            
            $prepare->bindValue(':login', $login);
            $prepare->bindValue(':password', $password);
            $prepare->bindValue(':age', $age);
            $prepare->bindValue(':gender', $gender);

            $execute = $prepare->execute();

            if($execute)
            {
                $messages['success'][] = 'User registered';
            }
            else
            {
                $messages['error'][] = 'An error occured while saving';
            }
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