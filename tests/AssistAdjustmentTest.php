<?php

use PHPUnit\Framework\TestCase;
use Wwjpackages\CloudFinance\Application;

class AssistAdjustmentTest extends TestCase
{

    /**
     * 查辅助核算
     * @param Application $app
     * @depends ApplicationTest::testGetApplication
     */
    public function testIndex(Application $app)
    {
        try {
            $result = $app->assistAdjustment->index([
                'category_id' => 1
            ]);
            $this->assertIsArray($result);
        } catch (\Wwjpackages\CloudFinance\Exception\RequestFailException $e) {
            $this->assertTrue(false, $e->getMessage());
        }
    }

}