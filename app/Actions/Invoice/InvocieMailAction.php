<?php

 namespace App\Actions\Invoice;

use App\Helpers\Model\ProductSetting\CompanySettingHelper;
use App\Jobs\Invoice\SendInvoiceJob;
use App\Models\Master\UserBasicInfoMaster\UserBasicInfoMaster;
use App\Models\User;
use App\Models\UserTransaction\UserTransaction;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Storage;

 class InvocieMailAction
 {
     private  $userInfo;
     private string $invioce;



     public function __construct( $userinfo,string $invoice)
     {
            $this->userInfo=$userinfo;
            $this->invioce=$invoice;
     }



     /**
      * mailInvoice function
      * This function send invoice to the
      * @return void
      */
     public function mailInvoice():void
     {
            SendInvoiceJob::dispatchIf($this->userInfo->email!=null,$this->userInfo,$this->invioce);

     }

 }
