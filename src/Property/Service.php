<?php


namespace Wwjpackages\CloudFinance\Property;


use Wwjpackages\CloudFinance\Kernel\BaseService;

class Service extends BaseService
{
    const URL = '/api/api/property/sync';

    public function index(array $data): array
    {
        $params = [
            'buy_date' => $data['buy_date'] ?? date('Y-m-d H:i:s'),
            'sync_type' => $data['is_last'] ?? 'n',
            'porperty' => $data['porperty'] ?? [],
            'purchase' => $data['purchase'] ?? [],
        ];
        return $this->attempt('post', self::URL, $params);
    }
}