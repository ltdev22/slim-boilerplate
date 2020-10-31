<?php

namespace App\Providers;

use Cartalyst\Sentinel\Native\Facades\Sentinel;
use League\Container\ServiceProvider\AbstractServiceProvider;
use Slim\Views\Twig;

class ViewServiceProvider extends AbstractServiceProvider
{
    /**
     * What this provider is going to provide?
     *
     * @var array
     */
    protected $provides = ['view'];

    /**
     * @inheritDoc
     * 
     * @see League\Container\ServiceProvider\AbstractServiceProvider
     * @see League\Container\ServiceProvider\ServiceProviderInterface
     */
    public function register()
    {
        $container = $this->getContainer();

        $twig = Twig::create(
            __DIR__ . '/../../resources/views', // specify the path for the views
            [
                'cache' => false,
            ]
        );

        $this->registerGlobals($twig);

        // Add new Twig instance to view container
        $container->add('view', $twig);
    }

    /**
     * Register variables that we want to be available on 
     * every single page and template of the entire application.
     *
     * @param Twig $twig
     * @return void
     */
    protected function registerGlobals(Twig $twig)
    {
        $twig->getEnvironment()->addGlobal('user', Sentinel::check());
    }
}