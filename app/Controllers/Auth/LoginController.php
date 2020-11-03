<?php

namespace App\Controllers\Auth;

use Cartalyst\Sentinel\Native\Facades\Sentinel;
use Slim\Flash\Messages;
use Slim\Interfaces\RouteParserInterface;
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
     * Hold the flash message instance.
     *
     * @var Messages
     */
    protected $flash;

    /**
     * Hold the route parser instance.
     *
     * @var RouteParserInterface
     */
    protected $routeParser;

    /**
     * Creating a new instance of this object.
     *
     * @param Twig $view
     * @param Messages $flash
     * @param RouteParserInterface $routeParser
     * @return $this
     */
    public function __construct(Twig $view, Messages $flash, RouteParserInterface $routeParser) {
        $this->view = $view;
        $this->flash = $flash;
        $this->routeParser =  $routeParser;
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

        try {
            if (!$user = Sentinel::authenticate($data)) {
                throw new \Exception('Incorrect email or password :(');
            }
        } catch (\Exception $e) {
            $this->flash->addMessage('status', $e->getMessage());

            return $response->withHeader('Location', $this->redirectTo('auth.login'));
        }

        return $response->withHeader('Location', $this->redirectTo('home'));
    }

    /**
     * Get the route name we want to redirect to after logout.
     *
     * @param String $routeName
     * @return void
     */
    protected function redirectTo(String $routeName)
    {
        return $this->routeParser->urlFor($routeName);
    }
}