<?php

use PHPUnit\Framework\TestCase;
use Wwjpackages\CloudFinance\Application;

class ApplicationTest extends TestCase
{

    /**
     * @return Application
     */
    public function testGetApplication()
    {
        $config = [
            'host' => 'cw.com',
            'company_key' => 'JFytU4V73',
            'company_secret' => 'APUUYTnvfw97H9v3',
        ];
        
        $app = new Application($config);
        $this->assertTrue(true);
        return $app;
    }
}