<?php

namespace App\Enums\Payment;

class PayMentEnum
{

    public const COH_PAYMENT=1;
    public const ONLINE_PAYMENT=2;

     public const ALl_PAYMENT_TYPE = [
        self::COH_PAYMENT=>'Cash on Hand',
        self::ONLINE_PAYMENT=>'Online',
    ];


}
