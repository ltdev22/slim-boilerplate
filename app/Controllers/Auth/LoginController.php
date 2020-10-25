<?php

namespace App\Controllers\Auth;

use Slim\Views\Twig;

class LoginController
{
    /**
     * Hold the view instance.
     *
     * @var Twig
     */
    protected $view;

    /**
     * Creating a new instance of this object.
     *
     * @param Twig $view
     * @return $this
     */
    public function __construct(Twig $view) {
        $this->view = $view;
    }

    public function index($request, $response)
    {
        return $this->view->render($response, 'pages/auth/login.twig');
    }
}