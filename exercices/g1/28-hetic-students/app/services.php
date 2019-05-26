<?php

// retrieve container
$container = $app->getContainer();

// Add Twig service
$container['view'] = function($container)
{
    $twig = new \Slim\Views\Twig('../views');

    $router = $container->get('router');
    $uri = \Slim\Http\Uri::createFromEnvironment(new \Slim\Http\Environment($_SERVER));
    $twig->addExtension(new \Slim\Views\TwigExtension($router, $uri));

    return $twig;
};

// Add database service with PDO
$container['db'] = function($container)
{
    $db = $container['settings']['db'];

    $pdo = new PDO('mysql:host='.$db['host'].';dbname='.$db['name'].';port='.$db['port'], $db['user'], $db['pass']);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    return $pdo;
};