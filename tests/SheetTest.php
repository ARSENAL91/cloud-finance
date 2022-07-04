<?php

use PHPUnit\Framework\TestCase;
use Wwjpackages\CloudFinance\Application;

class SheetTest extends TestCase
{

    /**
     * @return Application
     */
    public function testGetApplication()
    {
        $config = [
            'host' => 'localhost',
            'company_key' => '23DXuNmq2rRS',
            'company_secret' => '0054dd262ce9a9655ee5d1be25323098',
        ];

        $app = new Application($config);
        $this->assertTrue(true);
        return $app;
    }

    /**
     * 资产负债表
     * @param Application $app
     * @depends testGetApplication
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function testBalanceSheet(Application $app)
    {
        try {
            $result = $app->sheet->balanceSheet([
                'the_month' => '2022-01-01',
            ]);
            $this->assertIsArray($result);
        } catch (\Wwjpackages\CloudFinance\Exception\RequestFailException $e) {
            $this->assertTrue(false, $e->getMessage());
        }
    }

    /**
     * 利润表
     * @param Application $app
     * @depends testGetApplication
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function testProfitSheet(Application $app)
    {
        try {
            $result = $app->sheet->profitSheet([
                'the_month' => '2022-01-01',
            ]);
            $this->assertIsArray($result);
        } catch (\Wwjpackages\CloudFinance\Exception\RequestFailException $e) {
            $this->assertTrue(false, $e->getMessage());
        }
    }
}