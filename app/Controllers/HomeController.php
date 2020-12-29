<?php

namespace App\Controllers;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Slim\Views\Twig;

class HomeController
{
    /**
     * Hold the view instance.
     *
     * @var Twig
     */
    protected $view;

    /**
     * Creating a new instance of this.
     *
     * @param Twig $view
     * @return $this
     */
    public function __construct(Twig $view) {
        $this->view = $view;
    }

    /**
     * Render Homepage.
     *
     * @param ServerRequestInterface    $request
     * @param ResponseInterface         $response
     * @return void
     */
    public function __invoke(ServerRequestInterface $request, ResponseInterface $response)
    {
        return $this->view->render($response, 'pages/home.twig');
    }
}