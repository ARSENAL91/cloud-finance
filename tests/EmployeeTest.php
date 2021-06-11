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
            'host' => 'localhost',
            'company_key' => '1KM3yA5yPWq',
            'company_secret' => 'f8183b73ba03b53ba5aa3c80508dba53',
        ];
        $app = new Application($config);

        try {
            $result = $app->organization->syncEmployee([
                'real_name' =>'123',
                'employee_no' => '12313',
                'organization_name' => 'xxx222',
                'job_title' =>'侧上位',
                'id_card' => '333222222222222222',
                'mobile' => '1323443123',
                'status' => '在职',
                'entry_date' => '2000-01-01',
                'dimission_date' => '',
                'comments' =>  '',
            ]);
            $res  = $this->assertIsArray($result);
        } catch (\Wwjpackages\CloudFinance\Exception\RequestFailException $e) {
            $this->assertTrue(false, $e->getMessage());
        }
    }



}