<?php

use App\Controllers\Auth\LoginController;
use App\Controllers\Auth\LogoutController;
use App\Controllers\HomeController;

// We attach to the container any of the conrtollers we are using
// in the application and inject any dependencies we use in here.
$container->add(HomeController::class, function () use ($container) {
    return new HomeController(
        $container->get('view')
    );
});

$container->add(LoginController::class, function () use ($container, $app) {
    return new LoginController(
        $container->get('view'),
        $container->get('flash'),
        $app->getRouteCollector()->getRouteParser()
    );
});

$container->add(LogoutController::class, function () use ($app) {
    return new LogoutController(
        $app->getRouteCollector()->getRouteParser()
    );
});