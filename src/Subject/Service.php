<?php


namespace Wwjpackages\CloudFinance\Subject;


use Wwjpackages\CloudFinance\Kernel\BaseService;

class Service extends BaseService
{
    const URL = '/api/api/subjects';

    public function index(array $data): array
    {
        $params = [
            'name' => $data['name'] ?? '',
            'is_last' => $data['is_last'] ?? '',
            'subject_code' => $data['subject_code'] ?? [],
            'level' => $data['level'] ?? '',
            'with_attribute' => $data['with_attribute'] ?? '',
            'page' => $data['page'] ?? 1,
            'pagesize' => $data['pagesize'] ?? 10,
        ];
        return $this->attempt('get', self::URL, $params);
    }
}