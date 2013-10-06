<?php
class Order
{
    const STATUS_PLACED = 1;
    const STATUS_CANCELLED = 2;

    public function __construct(User $user)
    {
        $this->user = $user;
        $this->status = self::STATUS_PLACED;
    }

    public function cancel()
    {
        $this->status = self::STATUS_CANCELLED;
    }
}
