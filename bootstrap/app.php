<?php

use League\Container\Container;
use Slim\Factory\AppFactory;

require_once __DIR__ . '/../vendor/autoload.php';

// Specify the container we use for the Slim app
$container = new Container();
AppFactory::setContainer($container);

// Creating a Slim app
$app = AppFactory::create();

require_once __DIR__ . '/container.php';

// Load the routes
require_once __DIR__ . '/../routes/web.php';
