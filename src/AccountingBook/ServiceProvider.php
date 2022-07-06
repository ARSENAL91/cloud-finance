<?php


namespace Wwjpackages\CloudFinance\AccountingBook;


use Pimple\Container;
use Pimple\ServiceProviderInterface;

class ServiceProvider implements ServiceProviderInterface
{


    public function register(Container $app)
    {
        $app['accountingBook'] = function ($app) {
            return new Service($app->getConfig(), $app['httpClient']);
        };
    }

}