<?php

namespace App\Exceptions;

use Psr\Http\Message\ServerRequestInterface;
use Throwable;
use App\Exceptions\ValidationException;
use Slim\Flash\Messages;
use Slim\Psr7\Factory\ResponseFactory;

class ExceptionHandler
{
    /**
     * The flash messages to be displayed.
     *
     * @var Messages
     */
    protected $flash;

    /**
     * The new response we create from responseFactory.
     *
     * @var ResponseFactory
     */
    protected $responseFactory;

    /**
     * Create a new instance.
     *
     * @param Messages $flash
     * @param ResponseFactory $responseFactory
     */
    public function __construct(Messages $flash, ResponseFactory $responseFactory)
    {
        $this->flash = $flash;
        $this->responseFactory = $responseFactory;
    }

    public function __invoke(ServerRequestInterface $request, Throwable $exception)
    {
        if ($exception instanceof ValidationException) {
            $this->flash->addMessage('errors', $exception->getErrors());

            return $this->responseFactory
                ->createResponse()
                ->withHeader('Location', $exception->getPath());
        }

        throw $excpetion;
    }
}