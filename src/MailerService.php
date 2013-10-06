<?php
class MailerService
{
    public function sendConfirmation(Order $o)
    {
        mail(
            $o->email,
            "Order confirmation: #{$o->orderNumber}",
            "Your order is confirmed. Thanks."
        );
    }
}
