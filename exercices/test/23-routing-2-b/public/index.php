<?php

/**
 * Configuration
 */
define('URL', 'http://localhost:8888/p2022/exercices/test/23-routing-2-b/public/');

/**
 * Routing
 */

$q = !empty($_GET['q']) ? $_GET['q'] : '';
$controller = '404';

if($q === '')
{
    $controller = 'home';
}
else if($q === 'about')
{
    $controller = 'about';
}
else if(preg_match('/^article\/[1-9][0-9]*$/', $q))
{
    $controller = 'article';
}

include '../controllers/'.$controller.'.php';