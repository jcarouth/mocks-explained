<?php
class MockingAndSpyingTest extends \PHPUnit_Framework_TestCase
{
    public function testTheMockTellsMeWhenAMethodIsNotCalled()
    {
        $order = $this->getMockBuilder('Order')
            ->disableOriginalConstructor()
            ->getMock();
        $order->id = 1;
        $order->orderNumber = '111111';
        $order->email = 'test@example.net';

        $emailer = $this->getMockBuilder('MailerService')
            ->disableOriginalConstructor()
            ->getMock();

        $emailer->expects($this->once())
            ->method('sendConfirmation')
            ->with($order)
            ->will($this->returnValue(true));

        $dataSource = $this->getMockBuilder('OrderDataSource')
            ->disableOriginalConstructor()
            ->getMock();

        $processor = new OrderProcessor($dataSource, $emailer);
        $this->assertTrue($processor->processOrder($order));
    }
}
