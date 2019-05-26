<?php

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

// Autoload
require 'vendor/autoload.php';

// Initialise Slim
$app = new \Slim\App();

// Container
$container = $app->getContainer();

$container['view'] = function($container)
{
    $view = new \Slim\Views\Twig('./views');

    $router = $container->get('router');
    $uri = \Slim\Http\Uri::createFromEnvironment(new \Slim\Http\Environment($_SERVER));
    $view->addExtension(new \Slim\Views\TwigExtension($router, $uri));

    return $view;
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
            $viewData['available'] = false;

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

            // Return a twig render
            return $this->view->render($response, 'pages/home.twig', $viewData);
        }
    )
    ->setName('home')
;

$app
    ->get(
        '/category/{category:[a-z0-9_-]{3,}}/page/{number:[1-9][0-9]*}',
        function(Request $request, Response $response, $arguments)
        {
            echo 'Page '.$arguments['number'].' de category '.$arguments['category'];
        }
    )
    ->setName('test')
;

// Run Slim
$app->run();