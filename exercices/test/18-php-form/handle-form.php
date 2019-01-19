<?php

    // Error and success messages
    $messages = [
        'error' => [],
        'success' => [],
    ];

    // Genders
    $genders = ['male', 'female'];
    
    // Test if form sent
    if(!empty($_POST))
    {
        // Default gender if not sent
        if(empty($_POST['gender']))
        {
            $_POST['gender'] = '';
        }

        // Debug
        echo '<pre>';
        print_r($_POST);
        echo '</pre>';

        // Get all values
        $login = $_POST['login'];
        $age = $_POST['age'];
        $gender = $_POST['gender'];
        $biography = $_POST['biography'];

        // Handle errors
        if(empty($login))
        {
            $messages['error'][] = 'Empty login';
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

        if(empty($biography))
        {
            $messages['error'][] = 'Empty biography';
        }

        // Success
        if(empty($messages['error']))
        {
            $messages['success'][] = 'All good';
        }
    }

    // Form not sent
    else
    {
        $_POST['login'] = '';
        $_POST['age'] = '';
        $_POST['gender'] = '';
        $_POST['biography'] = '';
    }