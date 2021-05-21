<?php


namespace Wwjpackages\CloudFinance\Kernel\Providers;


use GuzzleHttp\Client;
use Pimple\Container;
use Pimple\ServiceProviderInterface;

class HttpClientServiceProvider implements ServiceProviderInterface
{
    /**
     * @param Container $pimple
     */
    public function register(Container $pimple)
    {
        !isset($pimple['httpClient']) && $pimple['httpClient'] = function ($app) {
            return new Client();
        };
    }
}