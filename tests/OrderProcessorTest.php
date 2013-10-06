<?php
class OrderProcessorTest extends \PHPUnit_Framework_TestCase
{
    public function testUsingRealObjects()
    {
        $this->markTestSkipped('Database is not set up.');
        $processor = new OrderProcessor(
            new OrderDataSource(
                new PDO('mysql:...', '...', '...', array())
            )
        );

        $this->assertTrue($processor->cancelById(1));
    }

    public function testUsingManualStubs()
    {
        $mockPdo = $this->getMockBuilder('PDOTestHelper')
            ->getMock();
        $mailer = $this->getMock('MailerService');

        $processor = new OrderProcessor(
            new StubOrderDataSource($mockPdo),
            $mailer
        );
        $this->assertTrue($processor->cancelById(1));
    }

    public function testUsingMockFrameworkToStub()
    {
        $mockDataSource = $this->getMockBuilder('OrderDataSource')
            ->disableOriginalConstructor()
            ->getMock();

        $mockDataSource->expects($this->any())
            ->method('retrieve')
            ->will($this->returnValue(array('id' => 1, 'total' => 74.99)));

        $mockDataSource->expects($this->any())
            ->method('save')
            ->will($this->returnValue(true));

        $processor = new OrderProcessor(
            $mockDataSource,
            $this->getMock('MailerService')
        );
        $this->assertTrue($processor->cancelById(1));
    }
}
