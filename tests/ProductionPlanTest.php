<?php

use PHPUnit\Framework\TestCase;
use Wwjpackages\CloudFinance\Application;

class ProductionPlanTest extends TestCase
{

    /**
     * 创建生产计划
     * @param Application $app
     * @depends ApplicationTest::testGetApplication
     */
    public function testCreate($app)
    {
        try {
            $result = $app->productionPlan->create(1);
            $this->assertIsArray($result);
        } catch (\Wwjpackages\CloudFinance\Exception\RequestFailException $e) {
            $this->assertTrue(false, $e->getMessage());
        }
    }

}