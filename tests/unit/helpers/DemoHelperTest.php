<?php
namespace helpers;


use app\helpers\demo;
use tests\unit\helpers\test;

class DemoHelperTest extends \Codeception\Test\Unit
{
    /**
     * @var \UnitTester
     */
    protected $tester;

    protected function _before()
    {
    }

    protected function _after()
    {
    }

    // tests
    public function testMe()
    {
        $test = new test();
        $test->foo();exit;
        
        
        $demo = new demo();
        $val = $demo->test();
        $this->assertEquals(1,$val);
    }
}