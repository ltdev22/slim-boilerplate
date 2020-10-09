<?php

namespace App\Providers;

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

        // Add new Twig instance to view container
        $container->add(
            'view',
            Twig::create(
                __DIR__ . '/../../resources/views', // specify the path for the views
                [
                    'cache' => false,
                ]
            )
        );
    }
}