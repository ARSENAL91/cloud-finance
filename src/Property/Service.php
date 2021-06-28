<?php


namespace Wwjpackages\CloudFinance\Property;


use Wwjpackages\CloudFinance\Kernel\BaseService;

class Service extends BaseService
{
    const URL = '/api/api/property/sync';

    public function sync(array $data): array
    {
        $params = [
            'buy_date' => $data['buy_date'] ?? '',
            'sync_type' => $data['sync_type'] ?? 'n',
            'property' => $data['property'] ?? [],
            'purchase' => $data['purchase'] ?? [],
        ];
        return $this->attempt('post', self::URL, $params);
    }
}
