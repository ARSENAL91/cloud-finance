<?php


namespace Wwjpackages\CloudFinance\Property;


use Pimple\Container;
use Pimple\ServiceProviderInterface;

class ServiceProvider implements ServiceProviderInterface
{


    public function register(Container $app)
    {
        $app['property'] = function ($app) {
            return new Service($app->getConfig(), $app['httpClient']);
        };
    }

}