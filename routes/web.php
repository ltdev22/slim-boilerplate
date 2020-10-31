<?php

use App\Controllers\Auth\LoginController;
use App\Controllers\HomeController;

$app->get('/', HomeController::class)->setName('home');

$app->get('/login', LoginController::class . ':index')->setName('auth.login');
$app->post('/login', LoginController::class . ':signIn');

$app->get('/about', function ($request, $response, $args) use ($container) {
    return $container->get('view')->render($response, 'pages/about.twig');
})->setName('about');