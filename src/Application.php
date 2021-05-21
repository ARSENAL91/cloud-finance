<?php

namespace Wwjpackages\CloudFinance;


use Pimple\ServiceProviderInterface;
use Wwjpackages\CloudFinance\Kernel\ServiceContainer;

/**
 * Class Application
 *
 * @package YiDeJia\SupplyChain
 * @property \GuzzleHttp\Client $httpClient                                    http客户端
 * @property \Wwjpackages\CloudFinance\Organization\Service $organization           组织
 */
class Application extends ServiceContainer
{


    protected $config = [];

    /**
     * 立即加载的容器
     * @var ServiceProviderInterface[]
     */
    protected $eagerProviders = [];

    /**
     * 延迟加载的容器
     * @var ServiceProviderInterface[]
     */
    protected $deferProviders = [
        'organization' => \Wwjpackages\CloudFinance\Organization\ServiceProvider::class,
    ];

    public function __construct(array $config, array $values = [])
    {
        $this->config = $config;
        parent::__construct($values);
    }

    public function getConfig()
    {
        return $this->config;
    }
}