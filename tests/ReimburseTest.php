<?php

use PHPUnit\Framework\TestCase;
use Wwjpackages\CloudFinance\Application;

class ReimburseTest extends TestCase
{

    /**
     * 报销同步
     * @param Application $app
     * @depends ApplicationTest::testGetApplication
     */
    public function testSync(Application $app)
    {
        try {
            $result = $app->reimburse->sync([
                'code' => '1234567',
                'reimburse' => [
                    'organization' => '技术部',
                    'applicant' => 'test',
                    'created_name' => 'test',
                    'apply_amount' => '100',
                    'status' => '待提交',
                    'invoice_type' => '无票',
                    'type' => '',
                ],
//                'config_name' => '部门审核',
//                'config_flag' => 'y',
            ]);
            $this->assertIsArray($result);
        } catch (\Wwjpackages\CloudFinance\Exception\RequestFailException $e) {
            $this->assertTrue(false, $e->getMessage());
        }
    }
}