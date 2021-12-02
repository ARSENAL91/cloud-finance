<?php


namespace Wwjpackages\CloudFinance\ContactsSettlement;


use Wwjpackages\CloudFinance\Kernel\BaseService;

class Service extends BaseService
{
    const URL = '/api/api/voucher/getSixExchangesData';
    public function index(array $data): array
    {
        $params = [
            'key' => $data['key'] ?? '',
        ];
        return $this->attempt('post', self::URL, $params);
    }

}