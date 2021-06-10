<?php


namespace Wwjpackages\CloudFinance\Wages;


use Wwjpackages\CloudFinance\Kernel\BaseService;

class Service extends BaseService
{
    const SyncWages = '/api/api/organizations/wages/sync';

    public function syncWages(array $data): array
    {
        $params = [

        ];
        return $this->attempt('post', self::SyncWages, $params);
    }
}