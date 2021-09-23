<?php


namespace Wwjpackages\CloudFinance\BankDetail;


use Pimple\Container;
use Pimple\ServiceProviderInterface;

class ServiceProvider implements ServiceProviderInterface
{


    public function register(Container $app)
    {
        $app['bankDetail'] = function ($app) {
            return new Service($app->getConfig(), $app['httpClient']);
        };
    }

}