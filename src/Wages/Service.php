<?php


namespace Wwjpackages\CloudFinance\Wages;


use Wwjpackages\CloudFinance\Kernel\BaseService;

class Service extends BaseService
{
    const SyncWages = '/api/api/wages/sync';

    public function syncWages(array $data): array
    {
        $params = [];
        foreach ($data as $v){
            $params['list'][] = [
                'organization_name' => $v['organization_name'],
                'employee_no' => $v['employee_no'],
                'the_month' => $v['the_month'],
                'base_wage' => $v['base_wage'],
                'person_insurance' => $v['person_insurance'],
                'company_insurance' => $v['company_insurance'],
                'person_accumulation' => $v['person_accumulation'],
                'company_accumulation' => $v['company_accumulation'],
                'gross_special_tax' => $v['gross_special_tax'],
                'person_tax' => $v['person_tax'],
                'actual_wage' => $v['actual_wage'],
                'agile_detail' => $v['agile_detail'],
            ];
        }

        return $this->attempt('post', self::SyncWages, $params);
    }
}