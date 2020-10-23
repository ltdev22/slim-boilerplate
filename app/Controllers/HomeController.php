<?php

namespace App\Controllers;

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

    public function __invoke($request, $response)
    {
        return $this->view->render($response, 'pages/home.twig');
    }
}