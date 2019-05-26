<?php

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

// Autoload
require 'vendor/autoload.php';

// Initialise Slim
$app = new \Slim\App([
    'settings' => [
        'displayErrorDetails' => true,
    ]
]);

// Container
$container = $app->getContainer();

$container['view'] = function($container)
{
    $twig = new \Slim\Views\Twig('./views');

    $router = $container->get('router');
    $uri = \Slim\Http\Uri::createFromEnvironment(new \Slim\Http\Environment($_SERVER));
    $twig->addExtension(new \Slim\Views\TwigExtension($router, $uri));

    return $twig;
};

// Create routes
$app
    ->get(
        '/',
        function(Request $request, Response $response)
        {
            // Create some data
            $viewData = [];

            $viewData['seo'] = new \StdClass();
            $viewData['seo']->title = 'bruno simon';
            $viewData['seo']->description = 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus eaque, ea delectus qui reiciendis ex dignissimos assumenda dolores dolorum fuga aliquam ad, veritatis debitis, recusandae vel maxime placeat dolor! Excepturi.';

            $viewData['title'] = 'Bienvenue sur mon folio';
            $viewData['picture'] = 'https://avatars.dicebear.com/v2/male/simonbruno.svg';
            $viewData['introduction'] = 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Enim, error molestias? Consequatur quaerat, quidem corrupti soluta sint illum voluptates mollitia suscipit omnis totam eaque aspernatur nobis fuga. Sed, laudantium ducimus.';
            $viewData['yearOfBirth'] = 1990;
            $viewData['available'] = true;

            $viewData['projects'] = [
                [
                    'title' => 'Cool project',
                    'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Excepturi, obcaecati adipisci? Quod voluptatem eos ab libero rem! Praesentium ullam iure fuga voluptatem. At aspernatur cumque necessitatibus. Ducimus iusto magni quas.',
                ],
                [
                    'title' => 'Another project',
                    'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Excepturi, obcaecati adipisci? Quod voluptatem eos ab libero rem! Praesentium ullam iure fuga voluptatem. At aspernatur cumque necessitatibus. Ducimus iusto magni quas.',
                ],
                [
                    'title' => 'Awesome project',
                    'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Excepturi, obcaecati adipisci? Quod voluptatem eos ab libero rem! Praesentium ullam iure fuga voluptatem. At aspernatur cumque necessitatibus. Ducimus iusto magni quas.',
                ],
            ];

            return $this->view->render($response, 'pages/home.twig', $viewData);
        }
    )
    ->setName('home')
;

$app
    ->get(
        '/about',
        function($request, $response)
        {
            return $this->view->render($response, 'pages/about.twig');
        }
    )
    ->setName('about')
;

$app
    ->get(
        '/page/{number}',
        function($request, $response, $arguments)
        {
            die('page '.$arguments['number']);
        }
    )
    ->setName('page')
;

// Run Slim
$app->run();