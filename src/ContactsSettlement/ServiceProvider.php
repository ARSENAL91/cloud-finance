<?php


namespace Wwjpackages\CloudFinance\ContactsSettlement;


use Pimple\Container;
use Pimple\ServiceProviderInterface;

class ServiceProvider implements ServiceProviderInterface
{


    public function register(Container $app)
    {
        $app['contactsSettlement'] = function ($app) {
            return new Service($app->getConfig(), $app['httpClient']);
        };
    }

}