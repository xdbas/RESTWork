<?php
class RESTWorkTest extends PHPUnit_Framework_TestCase
{

    public function setUp()
    {
    }

    public function tearDown()
    {
    }

    public function testSetup()
    {
        $this->assertEquals('\\', DS);
        $this->assertEquals('C:\\Apache24\\htdocs\\simplewebservice\\', BASE);
        $this->assertEquals('C:\\Apache24\\htdocs\\simplewebservice\\application\\', APPLICATION_PATH);
        $this->assertEquals('C:\\Apache24\\htdocs\\simplewebservice\\application\\public\\', PUBLIC_PATH);
        $this->assertEquals('C:\\Apache24\\htdocs\\simplewebservice\\restwork\\', SYSTEM_PATH);
    }


}