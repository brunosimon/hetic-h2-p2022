<?php

/**
 * Passwords
 */
define('SALT', '9sç;èd§fytç87d,,');

/**
 * Session
 */
session_start();

/**
 * Database
 */
define('DB_HOST', 'localhost');
define('DB_PORT', '8889');
define('DB_NAME', 'hetic_p2022_g1_passwords');
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
