<?php

use PHPUnit\Framework\TestCase;
use Wwjpackages\CloudFinance\Application;

class OrganizationTest extends TestCase
{

    /**
     * @return Application
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
            $result = $app->organization->syncOrganization([
                'name' => 'xxx222',
                'sync_unique_sign' => '14d'
            ]);
            $res  = $this->assertIsArray($result);
        } catch (\Wwjpackages\CloudFinance\Exception\RequestFailException $e) {
            $this->assertTrue(false, $e->getMessage());
        }
    }

}