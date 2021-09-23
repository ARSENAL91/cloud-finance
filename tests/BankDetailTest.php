<?php

use PHPUnit\Framework\TestCase;
use Wwjpackages\CloudFinance\Application;

class BankDetailTest extends TestCase
{

    /**
     * @param Application $app
     */
    public function testIndex()
    {
        $config = [
            'host' => '127.0.0.1',
            'company_key' => '1jUFC8u0u98',
            'company_secret' => '22ed103d20c0527f1f4cf8a52016c7bd',
        ];
        $app = new Application($config);
        $arr['account'] = 123;
        $arr['acc_name'] = '123';
        $arr['bank_name'] = '中国银行';
        $arr['detail'][] = [
            'serial_code' => '123',
            'the_date' =>  '2021-08-01',
            'the_time' => '21312313123',
            'receive_trans' => '收入',
            'receive_amount' =>'123',
            'trans_amount' =>'0',
            'pay_account' =>'13212312',
            'pay_name' => '专科人',
            'receiver_account' => '',
            'receiver_name' => '',
            'the_type' => '了下',
            'purpose' => '摘要',
            'reference' =>'reference',
            'comments' =>'comments',
            'use_way' => 'use_way',
            'unique_id' =>'111',
        ];
        $arr['detail'][] = [
            'serial_code' => '123',
            'the_date' =>  '2021-08-02',
            'the_time' => '21312313123',
            'receive_trans' => '支出',
            'receive_amount' =>'0',
            'trans_amount' =>'31',
            'pay_account' =>'13212312',
            'pay_name' => '专科人',
            'receiver_account' => 'receiver_account',
            'receiver_name' => 'receiver_name',
            'the_type' => '了下',
            'purpose' => '摘要',
            'reference' =>'reference1',
            'comments' =>'comments1',
            'use_way' => 'use_way1',
            'unique_id' =>'222',
        ];
        try {
            $result = $app->bankDetail->syncDetail($arr);
            $res = $this->assertIsArray($result);
        } catch (\Wwjpackages\CloudFinance\Exception\RequestFailException $e) {
            $this->assertTrue(false, $e->getMessage());
        }
    }


}