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
            'host' => 'localhost',
            'company_key' => '1u3EDSI6sd3',
            'company_secret' => 'b9cc0481858dbdcddb425fe2321bf5a3',
        ];
        
        $app = new Application($config);
        $this->assertTrue(true);
        return $app;
    }
}