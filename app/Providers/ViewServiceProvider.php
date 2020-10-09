<?php

namespace App\Providers;

use League\Container\ServiceProvider\AbstractServiceProvider;

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

        $container->add('view', function () {
            return 'Hello VSP';
        });
    }
}