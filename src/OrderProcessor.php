<?php
class OrderProcessor
{
    public function __construct(OrderDataSource $orderDataSource, MailerService $m)
    {
        $this->emailer = $m;
        $this->orderDataSource = $orderDataSource;
    }

    public function processOrder(Order $order)
    {
        return $this->emailer->sendConfirmation($order);
        //return true;
    }

    public function cancelById($id)
    {
        $order = $this->orderDataSource->retrieve($id);

        if (false === $order) {
            return false;
        }

        $order['status'] = Order::STATUS_CANCELLED;
        return $this->orderDataSource->save($order);
    }
}
