<?php

use League\Container\Container;
use Slim\Factory\AppFactory;
use Slim\Views\TwigMiddleware;

require_once __DIR__ . '/../vendor/autoload.php';

// Specify the container we use for the Slim app
$container = new Container();
AppFactory::setContainer($container);

require_once __DIR__ . '/container.php';

// Creating a Slim app
$app = AppFactory::create();
$app->add(TwigMiddleware::createFromContainer($app));

// Load the routes
require_once __DIR__ . '/../routes/web.php';
