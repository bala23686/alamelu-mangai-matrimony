<?php

namespace App\Jobs\Invoice;

use App\Mail\Invoice\InvoiceMail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendInvoiceJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;


    public  $user;
    public string $invoice;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct( $user,string $invoice)
    {
        $this->user=$user;
        $this->invoice=$invoice;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Mail::to($this->user->email)
        ->send(new InvoiceMail($this->user,$this->invoice));
    }
}
