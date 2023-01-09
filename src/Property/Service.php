<?php


namespace Wwjpackages\CloudFinance\Property;


use Wwjpackages\CloudFinance\Kernel\BaseService;

class Service extends BaseService
{
    const URL = '/api/api/property/sync';
    const DepreciationAmount = '/api/api/property/depreciation/amount/sum';

    public function sync(array $data): array
    {
        $params = [
            'booked_time' => $data['booked_time'] ?? '' ,
            'sync_type' => $data['sync_type'] ?? 'n',
            'property' => $data['property'] ?? [],
            'purchase' => $data['purchase'] ?? [],
        ];
        return $this->attempt('post', self::URL, $params);
    }

    public function getSumDepreciationAmountToCw(array $data): array
    {
        $params = [
            'the_month' => $data['the_month'] ,
            'account_set_month' => $data['the_month'] ,
        ];
        return $this->attempt('get', self::DepreciationAmount, $params);
    }

}
