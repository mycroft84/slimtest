<?php

date_default_timezone_set('UTC');

require 'vendor/autoload.php';

$configuration = [
    'settings' => [
        'displayErrorDetails' => true,
    ],
];
$c = new \Slim\Container($configuration);
$app = new \Slim\App($c);

// Fetch DI Container
    $container = $app->getContainer();

// Register Twig View helper
    $container['view'] = function ($c) {
        $view = new \Slim\Views\Twig(__DIR__ . DIRECTORY_SEPARATOR . 'views', [
            //'cache' => false//__DIR__.DIRECTORY_SEPARATOR.'cache'
        ]);

        // Instantiate and add Slim specific extension
        $basePath = rtrim(str_ireplace('index.php', '', $c['request']->getUri()->getBasePath()), '/');
        $view->addExtension(new \Slim\Views\TwigExtension($c['router'], $basePath));

        return $view;
    };

    $app->get('/', \Controllers\HomeController::class . ':index');

    $app->post('/post', \Controllers\HomeController::class . ':post');

    $app->run();