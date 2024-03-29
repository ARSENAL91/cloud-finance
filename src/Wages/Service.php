<?php


namespace Wwjpackages\CloudFinance\Wages;


use Wwjpackages\CloudFinance\Kernel\BaseService;

class Service extends BaseService
{
    const SYNC_WAGES = '/api/api/wages/sync';
    const SYNC_ANNUAL_BONUS = '/api/api/wages/annual/bonus/sync';
    const SYNC_PROVIDENT_FUND = '/api/api/wages/providentFunds/sync';
    const SYNC_SOCIAL_SECURITY_FUND = '/api/api/wages/socialSecurityFunds/sync';

    /**
     *
     * @param array $data
     * @return array
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
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

        return $this->attempt('post', self::SYNC_WAGES, $params);
    }

    /**
     *
     * @param array $data
     * @return array
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function syncAnnualBonus(array $data): array
    {
        $params = [];
        foreach ($data as $v){
            $params['list'][] = $v;
        }

        return $this->attempt('post', self::SYNC_ANNUAL_BONUS, $params);
    }


    /**
     * 公积金同步
     * @param array $data
     * @return array
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function syncProvidentFund(array $data): array
    {
        $params['the_month'] = $data['the_month'];
        foreach ($data['funds'] as $fund) {
            $params['funds'][] = [
                'department_name' => $fund['department_name'],
                'employee_name' => $fund['employee_name'],
                'id_card' => $fund['id_card'],
                'person_amount' => $fund['person_amount'],
                'company_amount' => $fund['company_amount'],
            ];
        }
        $params['funds'] = json_encode($params['funds']);
        return $this->attempt('post', self::SYNC_PROVIDENT_FUND, $params);
    }

    /**
     * 社保同步
     * @param array $data
     * @return array
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function syncSocialSecurityFund(array $data): array
    {
        $params['the_month'] = $data['the_month'];
        foreach ($data['funds'] as $fund) {
            $params['funds'][] = $fund;
        }
        $params['funds'] = json_encode($params['funds']);
        return $this->attempt('post', self::SYNC_SOCIAL_SECURITY_FUND, $params);
    }
}