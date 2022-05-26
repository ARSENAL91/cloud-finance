<?php


namespace Wwjpackages\CloudFinance\Subject;


use Wwjpackages\CloudFinance\Kernel\BaseService;

class Service extends BaseService
{
    const URL = '/api/api/subjects';
    const INFOURL = '/api/api/settings/subjects/getSubjectInfo';


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

    public function getInfo(array $data): array
    {
        $params = [
            'subject_ids' => $data['subject_ids'] ?? [],
        ];
        return $this->attempt('get', self::INFOURL, $params);
    }
}