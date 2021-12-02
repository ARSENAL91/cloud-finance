<?php

namespace Wwjpackages\CloudFinance;


use Pimple\ServiceProviderInterface;
use Wwjpackages\CloudFinance\Kernel\ServiceContainer;

/**
 * Class Application
 *
 * @package Wwjpackages\CloudFinance
 * @property \GuzzleHttp\Client $httpClient             http客户端
 * @property \Wwjpackages\CloudFinance\Organization\Service $organization           组织
 * @property \Wwjpackages\CloudFinance\Subject\Service $subject                科目
 * @property \Wwjpackages\CloudFinance\Wages\Service $wages                  工资
 * @property \Wwjpackages\CloudFinance\AssistAdjustment\Service $assistAdjustment       辅助核算
 * @property \Wwjpackages\CloudFinance\Reimburse\Service $reimburse              报销
 * @property \Wwjpackages\CloudFinance\Property\Service $property               固定资产
 * @property \Wwjpackages\CloudFinance\BankDetail\Service $bankDetail             银行流水
 * @property \Wwjpackages\CloudFinance\ContactsSettlement\Service $contactsSettlement   总部往来结算数据
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
        'wages' => \Wwjpackages\CloudFinance\Wages\ServiceProvider::class,
        'subject' => \Wwjpackages\CloudFinance\Subject\ServiceProvider::class,
        'assistAdjustment' => \Wwjpackages\CloudFinance\AssistAdjustment\ServiceProvider::class,
        'reimburse' => \Wwjpackages\CloudFinance\Reimburse\ServiceProvider::class,
        'property' => \Wwjpackages\CloudFinance\Property\ServiceProvider::class,
        'bankDetail' => \Wwjpackages\CloudFinance\BankDetail\ServiceProvider::class,
        'contactsSettlement' => \Wwjpackages\CloudFinance\ContactsSettlement\ServiceProvider::class,
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