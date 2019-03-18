<?php

/**
 * Configuration
 */
define('URL', 'http://localhost:8888/p2022/exercices/test/23-routing-2/public/');

/**
 * Routing
 */
$q = !empty($_GET['q']) ? $_GET['q'] : 'home';
$controller = '404';

if($q === 'home')
{
    $controller = 'home';
}
else if($q === 'about')
{
    $controller = 'about';
}
else if(preg_match('/^article\/[0-9]+$/', $q))
{
    $controller = 'article';
}

include '../controllers/'.$controller.'.php';