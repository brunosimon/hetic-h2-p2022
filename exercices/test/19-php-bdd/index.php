<?php

define('DB_HOST', 'localhost');
define('DB_PORT', '8889');
define('DB_NAME', 'hetic_p2022_first');
define('DB_USER', 'root');
define('DB_PASS', 'root');

try
{
    $pdo = new PDO(
        'mysql:dbname='.DB_NAME.';host='.DB_HOST.';port='.DB_PORT,
        DB_USER,
        DB_PASS
    );

    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
}
catch(PDOException $e)
{
    die('Cannot connect');
}

// // Get data
// $query = $pdo->query('SELECT * FROM users');
// $users = $query->fetchAll();

// echo '<pre>';
// print_r($users);
// echo '</pre>';
// exit;



// // Insert data
// $exec = $pdo->exec('INSERT INTO users (login, password, age, gender) VALUES (\'james\', \'azerty\', 20, \'male\')');

// echo '<pre>';
// var_dump($exec);
// echo '</pre>';



// // Update data
// $exec = $pdo->exec('UPDATE users SET age = 60 WHERE id = 6 OR id = 7');

// echo '<pre>';
// var_dump($exec);
// echo '</pre>';



// // Delete data
// $exec = $pdo->exec('DELETE FROM users WHERE age > 30');

// echo '<pre>';
// var_dump($exec);
// echo '</pre>';



// Data
$data = [
    'login' => 'Tommy',
    'password' => 'azerty',
    'age' => 30,
    'gender' => 'male',
];

$prepare = $pdo->prepare('INSERT INTO users (login, password, age, gender) VALUES (:login, :password, :age, :gender)');
$execute = $prepare->execute($data);

echo '<pre>';
var_dump($execute);
echo '</pre>';