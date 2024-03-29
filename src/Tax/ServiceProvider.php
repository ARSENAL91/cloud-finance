<?php


namespace Wwjpackages\CloudFinance\Tax;


use Pimple\Container;
use Pimple\ServiceProviderInterface;

class ServiceProvider implements ServiceProviderInterface
{


    public function register(Container $app)
    {
        $app['sheet'] = function ($app) {
            return new Service($app->getConfig(), $app['httpClient']);
        };
    }

}
