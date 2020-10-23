<?php

use App\Controllers\HomeController;

$app->get('/', HomeController::class)->setName('home');

$app->get('/about', function ($request, $response, $args) use ($container) {
    return $container->get('view')->render($response, 'pages/about.twig');
})->setName('about');