<?php

namespace App\Providers;

use League\Container\ServiceProvider\AbstractServiceProvider;
use Slim\Flash\Messages;

class FlashServiceProvider extends AbstractServiceProvider
{
    /**
     * What this provider is going to provide?
     *
     * @var array
     */
    protected $provides = ['flash'];

    /**
     * @inheritDoc
     * 
     * @see League\Container\ServiceProvider\AbstractServiceProvider
     * @see League\Container\ServiceProvider\ServiceProviderInterface
     */
    public function register()
    {
        $this->getContainer()->share('flash', function () {
            return new Messages();
        });
    }
}