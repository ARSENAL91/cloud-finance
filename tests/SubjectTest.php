<?php

use PHPUnit\Framework\TestCase;
use Wwjpackages\CloudFinance\Application;

class SubjectTest extends TestCase
{

    /**
     * 查科目
     * @param Application $app
     * @depends ApplicationTest::testGetApplication
     */
    public function testIndex(Application $app)
    {
        try {
            $result = $app->subject->index([]);
            $this->assertIsArray($result);
        } catch (\Wwjpackages\CloudFinance\Exception\RequestFailException $e) {
            $this->assertTrue(false, $e->getMessage());
        }
    }

}