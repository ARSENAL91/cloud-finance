<?php


namespace Wwjpackages\CloudFinance\AssistAdjustment;


use Pimple\Container;
use Pimple\ServiceProviderInterface;

class ServiceProvider implements ServiceProviderInterface
{


    public function register(Container $app)
    {
        $app['assistAdjustment'] = function ($app) {
            return new Service($app->getConfig(), $app['httpClient']);
        };
    }

}