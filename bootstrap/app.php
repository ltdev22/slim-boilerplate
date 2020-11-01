<?php

use Cartalyst\Sentinel\Native\Facades\Sentinel;
use Cartalyst\Sentinel\Native\SentinelBootstrapper;
use League\Container\Container;
use Slim\Factory\AppFactory;
use Slim\Views\TwigMiddleware;

require_once __DIR__ . '/../vendor/autoload.php';

Sentinel::instance(
    new SentinelBootstrapper(
        require(__DIR__ . '/../config/auth.php')
    )
);

require_once __DIR__ . '/database.php';

// Specify the container we use for the Slim app
$container = new Container();
AppFactory::setContainer($container);

require_once __DIR__ . '/container.php';

// Creating a Slim app
$app = AppFactory::create();
$app->add(TwigMiddleware::createFromContainer($app));

require_once __DIR__ . '/controllers.php';

// Load the routes
require_once __DIR__ . '/../routes/web.php';
