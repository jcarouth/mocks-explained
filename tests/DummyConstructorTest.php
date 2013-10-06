<?php
class DummyConstructorTest extends PHPUnit_Framework_TestCase
{
    public function testGetMockWithConstructorArguments()
    {
        $dummyUser = $this->getMock(
            'User', // Class to mock
            null,                   // Methods to mock
            array(),                // constructor params
            '',                     // mock Class name
            false                   // call the constructor?
        );

        $this->assertInstanceOf('User', $dummyUser);
    }

    public function testCleanedUpWithMockBuilder()
    {
        $dummyUser = $this->getMockBuilder('User')
            ->disableOriginalConstructor()
            ->getMock();
        $this->assertInstanceOf('User', $dummyUser);
    }
}
