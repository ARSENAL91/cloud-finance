<?php


namespace Wwjpackages\CloudFinance\Subject;


use Pimple\Container;
use Pimple\ServiceProviderInterface;

class ServiceProvider implements ServiceProviderInterface
{


    public function register(Container $app)
    {
        $app['subject'] = function ($app) {
            return new Service($app->getConfig(), $app['httpClient']);
        };
    }

}