<?php

namespace tests\PluginRekap\Libraries;

use PHPUnit_Framework_TestCase;
use PluginRekap\Libraries\Segments;

class SegmentsTest extends PHPUnit_Framework_TestCase{

    /**
     * @var Segments
     */
    private $segments;

    public function setUp()
    {
        parent::setUp(); // TODO: Change the autogenerated stub
        $this->segments = new Segments();
    }

    public function test_valid(){
        $this->assertTrue($this->segments->valid('1234x5.5.5'));
        $this->assertTrue($this->segments->valid('1234x5'));
        $this->assertTrue($this->segments->valid('12x5'));
        $this->assertTrue($this->segments->valid('124x5.5'));
        $this->assertTrue($this->segments->valid('1234x5.5'));
        $this->assertFalse($this->segments->valid('1234x'));
        $this->assertFalse($this->segments->valid('1234'));
        $this->assertFalse($this->segments->valid('12345x2.2.2'));
        $this->assertFalse($this->segments->valid('12345x2.2.2.2'));
        $this->assertFalse($this->segments->valid('1x2'));
        $this->assertFalse($this->segments->valid('15x2.2.2'));
    }

    public function test_getSegments(){
        $this->assertTrue($this->segments->valid('1234x5.5.5'));
        $this->assertEquals(array([
            'left' => '1234',
            'right' => '5.5.5',
        ]), $this->segments->getSegments());

        $this->assertTrue($this->segments->valid('345x5'));
        $this->assertEquals(array([
            'left' => '345',
            'right' => '5',
        ]), $this->segments->getSegments());

        $this->assertTrue($this->segments->valid('8689x5.20'));
        $this->assertEquals(array([
            'left' => '8689',
            'right' => '5.20',
        ]), $this->segments->getSegments());
    }

}