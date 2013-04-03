<?php
class RequestTest extends PHPUnit_Framework_TestCase
{
    public function setUp()
    {
    }

    public function tearDown()
    {

    }

    public function testInitialization()
    {
        $this->assertTrue(new \RESTWork\Http\Request instanceof \RESTWork\Http\Request);
    }
}