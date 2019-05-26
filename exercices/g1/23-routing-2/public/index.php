<?php

/**
 * Configuration
 */
define('URL', 'http://localhost:8888/p2022/exercices/g1/23-routing-2/public/');

/**
 * Routing
 */

// Get 'q' param
$q = !empty($_GET['q']) ? $_GET['q'] : 'home';

// Define controller
$controller = '404';

if($q == 'home')
{
    $controller = 'home';
}
else if($q == 'about-us')
{
    $controller = 'about';
}
else if(preg_match('/^article\/[1-9][0-9]*$/', $q))
{
    $controller = 'article';
}

// Include controller
include '../controllers/'.$controller.'.php';