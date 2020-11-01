<?php

namespace App\Controllers\Auth;

use Cartalyst\Sentinel\Native\Facades\Sentinel;
use Slim\Interfaces\RouteParserInterface;

class LogoutController
{
    /**
     * Undocumented variable
     *
     * @var RouteParserInterface
     */
    protected $routeParser;

    /**
     * Creating a new instance of this object.
     *
     * @param RouteParserInterface $routeParser
     * @return $this
     */
    public function __construct(RouteParserInterface $routeParser) {
        $this->routeParser = $routeParser;
    }

    /**
     * Logout the user.
     *
     * @param Slim\Psr7\Request $request
     * @param Slim\Psr7\Response $response
     * @return void
     */
    public function __invoke($request, $response)
    {
        Sentinel::logout();

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