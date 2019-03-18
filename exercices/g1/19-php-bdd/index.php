<?php

include 'database.php';

// // Get users
// $query = $pdo->query('SELECT * FROM users');
// $users = $query->fetchAll();

// // Insert user
// $exec = $pdo->exec('
//     INSERT INTO
//         users (login, password, age, gender)
//     VALUES
//         (\'Tata\', \'azerty\', 25, \'male\')
// ');

// echo '<pre>';
// var_dump($exec);
// echo '</pre>';

// Update user
// $exec = $pdo->exec('
//     UPDATE
//         users
//     SET
//         login = \'Tom\',
//         password = \'qwerty\'
//     WHERE
//         id = 10
// ');

// echo '<pre>';
// var_dump($exec);
// echo '</pre>';

// // Delete user
// $exec = $pdo->exec('DELETE FROM users WHERE id = 8 OR id = 10');

// echo '<pre>';
// var_dump($exec);
// echo '</pre>';

$data = [
    'login'    => 'Birno',
    'password' => 'azertyuiop',
    'age'      => 30,
    'gender'   => 'female'
];

$prepare = $pdo->prepare('
    INSERT INTO
        users (login, password, age, gender)
    VALUES
        (:login, :password, :age, :gender)
');

$execute = $prepare->execute($data);

echo '<pre>';
var_dump($execute);
echo '</pre>';