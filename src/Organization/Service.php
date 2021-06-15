<?php


namespace Wwjpackages\CloudFinance\Organization;


use Wwjpackages\CloudFinance\Kernel\BaseService;

class Service extends BaseService
{
    const SyncEmployee = '/api/api/organizations/employees/sync';
    const SyncOrganization = '/api/api/organizations/organization/sync';

    public function syncEmployee(array $data): array
    {
        $params = ['list' => []];
        foreach ($data as $v) {
            $params['list'][] = [
                'real_name' => $v['real_name'],
                'employee_no' => $v['employee_no'],
                'organization_name' => $v['organization_name'],
                'job_title' => $v['job_title'],
                'id_card' => $v['id_card'],
                'mobile' => $v['mobile'],
                'status' => $v['status'],
                'entry_date' => $v['entry_date'],
                'dimission_date' => $v['dimission_date'] ?: '0000-00-00',
            ];
        }

        return $this->attempt('post', self::SyncEmployee, $params);
    }


    public function syncOrganization(array $data): array
    {
        $params = [
            'name' => $data['name'],
            'sync_unique_sign' => $data['sync_unique_sign'],
        ];
        return $this->attempt('post', self::SyncOrganization, $params);
    }
}