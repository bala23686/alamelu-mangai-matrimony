<?php

namespace App\Mail\Invoice;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class InvoiceMail extends Mailable
{
    use Queueable, SerializesModels;

    public  $user;
    public string $invoice;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct( $user,string $invoice)
    {
        $this->user=$user;
        $this->invoice=$invoice;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        return $this->subject('')
        ->attach("storage/invoice/",[
            'as' => "{$this->invoice}",
            'mime' => 'application/pdf',
        ])
        ->markdown('emails.Invoice.InvoicePurchased',['user'=>$this->user,'url'=>url('/')]);
    }
}
