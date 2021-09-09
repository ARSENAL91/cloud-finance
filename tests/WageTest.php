<?php

use PHPUnit\Framework\TestCase;
use Wwjpackages\CloudFinance\Application;

class EmployeeTest extends TestCase
{

    /**
     * @param Application $app
     */
    public function testGetApplication()
    {
        $config = [
            'host' => '127.0.0.1',
            'company_key' => '1dM1t5Eayfh',
            'company_secret' => '777346eda483cecb70620ac27c999c95',
        ];
        $app = new Application($config);
        $arr[] = [
            'organization_name' => '财务部',
            'the_month' => '2021-01-01',
            'employee_no' => '12313',
            'base_wage' =>1,
            'person_insurance' => 2,
            'company_insurance' => 3,
            'person_accumulation' => 4,
            'company_accumulation' => 5,
            'gross_special_tax' => 6,
            'person_tax' =>7,
            'actual_wage' => 8,
            'agile_detail' =>[
                ['name'=>'奖金','amount'=>1],
                ['name'=>'扣款','amount'=>2],
            ],
        ];
        $arr[] = [
            'organization_name' => '财务部',
            'the_month' => '2021-01-01',
            'employee_no' => '1',
            'base_wage' =>1,
            'person_insurance' => 2,
            'company_insurance' => 3,
            'person_accumulation' => 4,
            'company_accumulation' => 5,
            'gross_special_tax' => 6,
            'person_tax' =>7,
            'actual_wage' => 8,
            'agile_detail' =>[
                ['name'=>'奖金','amount'=>1],
                ['name'=>'扣款','amount'=>2],
            ],
        ];
        try {
            $result = $app->wages->syncWages($arr);
            $res = $this->assertIsArray($result);
        } catch (\Wwjpackages\CloudFinance\Exception\RequestFailException $e) {
            $this->assertTrue(false, $e->getMessage());
        }
    }


}