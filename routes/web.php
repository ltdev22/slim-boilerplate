<?php

$app->get('/', function ($request, $response, $args) use ($container) {
    // $response->getBody()->write();
    return $container->get('view')->render($response, 'home.twig', ['foo' => 'test']);
})->setName('home');

$app->get('/about', function ($request, $response, $args) use ($container) {
    return $container->get('view')->render($response, 'about.twig');
})->setName('about');