<?php

// Set up a default global error handler

use App\Exceptions\ExceptionHandler;

$errorMiddleware = $app->addErrorMiddleware(true, true, true);

$errorMiddleware->setDefaultErrorHandler(
    new ExceptionHandler(
        $container->get('flash'),
        $app->getResponseFactory()
    )
);