<?php
class RequestTest extends PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        require_once SYSTEM_PATH . 'SingletonTrait.php';
        require_once SYSTEM_PATH . 'Http' . DS. 'Request.php';
        require_once SYSTEM_PATH . 'Http' . DS. 'Response.php';
    }

    public function tearDown()
    {

    }

    public function testInitialization()
    {
        $this->assertTrue(\RESTWork\Http\Request::getInstance() instanceof \RESTWork\Http\Request);
        $this->assertTrue(\RESTWork\Http\Response::getInstance() instanceof \RESTWork\Http\Response);
    }
}