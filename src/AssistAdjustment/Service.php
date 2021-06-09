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
            'name' => $data['name'] ?? '',
            'page' => $data['page'] ?? 1,
            'pagesize' => $data['pagesize'] ?? 10,
        ];
        return $this->attempt('get', self::URL, $params);
    }
}