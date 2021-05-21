<?php

use PHPUnit\Framework\TestCase;
use Wwjpackages\CloudFinance\Application;

class ProductionPlanTest extends TestCase
{

    /**
     * 同步组织
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