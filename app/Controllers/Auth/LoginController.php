<?php

namespace App\Controllers\Auth;

use Cartalyst\Sentinel\Native\Facades\Sentinel;
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

    /**
     * Show the login form
     *
     * @param Slim\Psr7\Request $request
     * @param Slim\Psr7\Response $response
     * @return void
     */
    public function index($request, $response)
    {
        return $this->view->render($response, 'pages/auth/login.twig');
    }

    /**
     * Try to sign in the user.
     *
     * @param Slim\Psr7\Request  $request
     * @param Slim\Psr7\Response $response
     * @return void
     */
    public function signIn($request, $response)
    {
        $data = $request->getParsedBody();

        if (!$user = Sentinel::authenticate($data)) {
            dd('Incorrect credentials');
        }
        dd($user);
        return $response;
    }
}