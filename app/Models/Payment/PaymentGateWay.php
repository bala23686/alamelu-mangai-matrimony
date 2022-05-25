<?php

namespace App\Models\Payment;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentGateWay extends Model
{
    use HasFactory;


    protected $table='payment_gate_ways';


    protected $fillable=[
        'payment_gateway_name',
        'key',
        'salt',
        'checkout_url',
        'active_status',
    ];
}
