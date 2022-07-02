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
            'company_key' => '1u3EDSI6sd3',
            'company_secret' => 'b9cc0481858dbdcddb425fe2321bf5a3',
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
            var_dump($result);
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