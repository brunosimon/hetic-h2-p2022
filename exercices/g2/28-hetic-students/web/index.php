<?php

// Autoload
require '../vendor/autoload.php';

// Settings
require '../app/settings.php';

// Initialize Slim
$app = new \Slim\App([ 'settings' => $settings ]);

// Services
require '../app/services.php';

// Routes
require '../app/routes.php';

// Run Slim
$app->run();