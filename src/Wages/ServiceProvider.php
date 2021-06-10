<?php


namespace Wwjpackages\CloudFinance\Organization;


use Pimple\Container;
use Pimple\ServiceProviderInterface;

class ServiceProvider implements ServiceProviderInterface
{


    public function register(Container $app)
    {
        $app['wages'] = function ($app) {
            return new Service($app->getConfig(), $app['httpClient']);
        };
    }

}