<?php
class SimpleDummyTest extends \PHPUnit_Framework_TestCase
{
    public function testDummyWithPHPUnit()
    {
        $mockUser = $this->getMock('User', array(), array(1));
        $this->assertInstanceOf('User', $mockUser);
    }
}
