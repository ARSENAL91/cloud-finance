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
            'app_id' => 'JFytU4V73',
            'app_secret' => 'APUUYTnvfw97H9v3',
        ];
        
        $app = new Application($config);
        $this->assertTrue(true);
        return $app;
    }
}