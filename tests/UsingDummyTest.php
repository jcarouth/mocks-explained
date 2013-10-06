<?php
class UsingDummyTest extends \PHPUnit_Framework_TestCase
{
    public function testCancelOrderMarksOrderCancelled()
    {
        $user = $this->getMock('User', array(), array(1));
        $order = new Order($user);
        $order->cancel();
        $this->assertEquals(
            Order::STATUS_CANCELLED,
            $order->status
        );
    }

    public function testCancelWithMockBuilder()
    {
        $dummyUser = $this->getMockBuilder('User')
            ->disableOriginalConstructor()
            ->getMock();
        $order = new Order($dummyUser);
        $order->cancel();
        $this->assertEquals(
            Order::STATUS_CANCELLED,
            $order->status
        );
    }
}
