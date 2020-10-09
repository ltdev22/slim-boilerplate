<?php

$app->get('/', function ($request, $response, $args) use ($container) {
    $response->getBody()->write($container->get('view'));
    return $response;
});