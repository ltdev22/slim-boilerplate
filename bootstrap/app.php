<?php

use Slim\Factory\AppFactory;

require_once __DIR__ . '/../vendor/autoload.php';

$app = AppFactory::create();

// Load the routes
require_once __DIR__ . '/../routes/web.php';
