<?php
/**
 * Created by PhpStorm.
 * User: rafiq
 * Date: 8/7/17
 * Time: 11:41 AM
 */

namespace tests;

use PHPUnit\Framework\TestCase;


final class EmailTest extends TestCase
{
    public function testConfigAPI()
    {
        $this->assertEquals(
            'user@example.com',
            \BuildAPI::config('ddddd','123456')
        );
    }


}
