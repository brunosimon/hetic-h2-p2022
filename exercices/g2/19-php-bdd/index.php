<?php

include 'database.php';

// // Get users
// $query = $pdo->query('SELECT * FROM users WHERE id = 3');
// $users = $query->fetchAll();

// // Insert user
// $exec = $pdo->exec('
//     INSERT INTO
//         users (login, password, age, gender)
//     VALUES
//         (\'Toto\', \'azertyuio\', 25, \'female\')
// ');

// echo '<pre>';
// var_dump($exec);
// echo '</pre>';

// // Update user
// $exec = $pdo->exec('
//     UPDATE
//         users
//     SET
//         login = \'Kakou\'
//     WHERE
//         id = 7 OR id = 10
// ');

// echo '<pre>';
// var_dump($exec);
// echo '</pre>';

// // Delete user
// $exec = $pdo->exec('
//     DELETE FROM
//         users
//     WHERE
//         id = 10
// ');

// echo '<pre>';
// var_dump($exec);
// echo '</pre>';

$prepare = $pdo->prepare('
    INSERT INTO
        users (login, password, age, gender)
    VALUES
        (:login, :password, :age, :gender)
');

$execute = $prepare->execute([
    'login' => 'James',
    'password' => 'azertyui',
    'age' => 30,
    'gender' => 'male',
]);

echo '<pre>';
var_dump($execute);
echo '</pre>';