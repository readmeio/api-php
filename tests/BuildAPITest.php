<?php
/**
 * Created by PhpStorm.
 * User: rafiq
 * Date: 8/7/17
 * Time: 11:41 AM
 */

namespace tests;
use PHPUnit\Framework\TestCase;
use ReadmeAPI\Build;
require 'vendor/autoload.php';

final class BuildAPITest extends TestCase
{
    public function testConfig()
    {
        $build = new Build();
        $build->config('abdul_f9cfcade4264cba870585a','');
        $this->assertEquals('abdul_f9cfcade4264cba870585a',$build->api_key);
    }

    public function testMultiplication()
    {
        $build = new Build();
        $build->config('abdul_f9cfcade4264cba870585a','');
        $rp = $build->run('math','multiply',array('numbers' => array(1,2,3)));
        $this->assertEquals(6, $rp);
    }

    public function testTempDeprecated() {
        $build = new Build();
        $build->config('abdul_f9cfcade4264cba870585a','');
        $rp = $build->run('temp-deprecated','sayHello',array('name' => "Greg"));
        $this->assertRegexp('/Greg/', $rp);
    }
}
