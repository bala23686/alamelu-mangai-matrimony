<?php

 namespace App\Actions\Invoice;

use App\Helpers\Model\ProductSetting\CompanySettingHelper;
use App\Models\Master\UserBasicInfoMaster\UserBasicInfoMaster;
use App\Models\UserTransaction\UserTransaction;
use Barryvdh\DomPDF\Facade\Pdf;
use Dompdf\Dompdf;
use Dompdf\Options;
use Illuminate\Support\Facades\Storage;

 class InvoiceAction
 {

    private $transaction_id;
    private $transaction_info;

    public $pdf;

     /**
      * InvoiceAction function
      * This action takes care of generating & saving to data base
      * @param integer|string $transaction_id
      */
     public function __construct(string $transaction_id)
     {
            $this->transaction_id=$transaction_id;
     }

     /**
      * generateInvoice function
      *
      * @return self
      */
     public function generateInvoice():string
     {

        $this->transaction_info=UserTransaction::where('tr_id',$this->transaction_id)->first();

        $transactionInfo=$this->transaction_info;
        $companyInfo=CompanySettingHelper::all();
        $clientInfo=UserBasicInfoMaster::where('user_id',$this->transaction_info->user_id)->first();
         $data=[
            "invoice"=>$transactionInfo,
            "company"=>$companyInfo,
            "logo"=>(string)CompanySettingHelper::loadLogoFile(),
            "client"=>$clientInfo,
         ];

         $options = new Options();
        $options->set('isRemoteEnabled', true);
        $pdf = new Dompdf($options);

        $pdf = Pdf::loadView('Invoices.Invoice', $data);

        Storage::put("public/invoice/{$this->transaction_info->tr_id}.pdf", $pdf->output());

        $this->transaction_info->tr_invoice_pdf="{$this->transaction_info->tr_id}.pdf";

        $this->transaction_info->save();

         $invoice_file_name=$this->transaction_id.".pdf";

       return  $invoice_file_name;


     }


 }
