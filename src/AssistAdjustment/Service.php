<?php


namespace Wwjpackages\CloudFinance\AssistAdjustment;


use Wwjpackages\CloudFinance\Kernel\BaseService;

class Service extends BaseService
{
    const URL = '/api/api/assistAdjustments';

    public function index(array $data): array
    {
        $params = [
            'category_id' => $data['category_id'],
        ];
        return $this->attempt('get', self::URL, $params);
    }
}