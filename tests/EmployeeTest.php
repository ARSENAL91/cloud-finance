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
            'company_key' => '24eIcUDAKvcS',
            'company_secret' => '1c6d3994ab274af36093b7eebb7e1742',
        ];
        $app = new Application($config);
        $arr[] = [
            'real_name' => '123',
            'employee_no' => '12313',
            'organization_name' => '技术部',
            'job_title' => '侧上位',
            'id_card' => '333222222222222222',
            'mobile' => '1323443123',
            'status' => '在职',
            'entry_date' => '2000-01-01',
            'dimission_date' => '',
            'comments' => '',
        ];
        $arr[] = [
            'real_name' => '邬伟杰',
            'employee_no' => '2221',
            'organization_name' => '技术部',
            'job_title' => '侧上位',
            'id_card' => '333222223422222',
            'mobile' => '1323443153',
            'status' => '在职',
            'entry_date' => '2000-01-01',
            'dimission_date' => '',
            'comments' => '',
        ];

        try {
            $result = $app->organization->syncEmployee($arr);
            $res = $this->assertIsArray($result);
        } catch (\Wwjpackages\CloudFinance\Exception\RequestFailException $e) {
            $this->assertTrue(false, $e->getMessage());
        }
    }


}