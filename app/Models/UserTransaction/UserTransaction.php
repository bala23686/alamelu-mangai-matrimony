<?php

namespace App\Models\UserTransaction;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserTransaction extends Model
{
    use HasFactory;

    protected $table = "user_transactions";


    protected $fillable = [


        'tr_id',
        'user_id',
        'tr_package_name',
        'tr_package_price',
        'tr_amount_paid',
        'tr_package_views',
        'tr_package_photo_upload',
        'tr_package_interest',
        'tr_mode',
        'tr_invoice_pdf',
        'tr_date',

    ];

    protected $appends = ['invoice_full_path'];

    protected $casts = [
        'created_at' => 'date:d-m-Y',
        'updated_at' => 'date:d-m-Y',
        'tr_date' => 'date:d-m-Y',
    ];

    public function getInvoiceFullPathAttribute()
    {

        return url('/') . "/storage/invoice/" . $this->tr_invoice_pdf;
    }
    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
    public function userInfo(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id', 'user_id');
    }
}
