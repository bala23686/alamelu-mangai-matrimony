<?php

namespace App\Actions\Payment;

use App\Enums\Payment\PayMentEnum;
use App\Helpers\Utility\InvoiceNumberHelper;
use App\Models\UserTransaction\UserTransaction;
use Carbon\Carbon;
use Exception;

class PaymentAction
{

    private $payment_method;
    private $invoice_number=null;
    private $payment_amount;
    private $payment_to;
    private $tr_package_name;
    private $tr_package_price;
    private $tr_package_views;
    private $tr_package_photo_upload;
    private $tr_package_interest;

    /**
     * PaymentAction Class handles the payment of user done
     *
     * @param integer $paymentType
     * $paymentType is a variable pass the Type of payment
     */
    public function __construct(int $paymentType)
    {
        if(!PayMentEnum::ALl_PAYMENT_TYPE[$paymentType])
        {
            throw new Exception('Not a valid Payment Type');
        }

        $this->payment_method=$paymentType;

        return $this;
    }

    /**
     * setAmount function
     * this function set the payment amount to user
     * @param float $amount
     * @return self
     */
    public function setAmount(int $amount):self
    {
        $this->payment_amount=$amount;

        return $this;
    }

    /**
     * payTo function
     * this function set the user_id of payment done by user
     * @param integer $user_id
     * @return self
     */
    public function payTo(int $user_id):self
    {
        $this->payment_to=$user_id;
        return $this;
    }

    /**
     * payTo function
     * this function set the user_id of payment done by user
     * @param integer $payment_info
     * @return self
     */
    public function paymentInfo(array $payment_info=null):self
    {

        if($payment_info)
        {
            $this->tr_package_name=$payment_info['tr_package_name'];
            $this->tr_package_price=$payment_info['tr_package_price'];
            $this->tr_package_views=$payment_info['tr_package_views'];
            $this->tr_package_photo_upload=$payment_info['tr_package_photo_upload'];
            $this->tr_package_interest=$payment_info['tr_package_interest'];
        }


        return $this;
    }

    /**
     * getInvoiceNumber function
     * this function set the user_id of payment done by user
     * @param integer $user_id
     * @return self
     */

    private function getInvoiceNumber()
    {
        $this->invoice_number=InvoiceNumberHelper::GenerateInvoiceNumber();


    }

    /**
     * setInvoiceNumber function
     * this function set the invoice number of payment done by user
     * @param integer $user_id
     * @return self
     */

    public function setInvoiceNumber(string $invoiceNumber):self
    {
        $this->invoice_number=$invoiceNumber;

        return $this;
    }

    /**
     * payTo function
     * this function set the user_id of payment done by user
     * @param integer $user_id
     * @return self
     */
    public function processPayment():bool
    {
         //vailidating the mandatory fields before Processing
        if($this->payment_method!=null && $this->payment_to!=null && $this->payment_amount!=null)
        {

            if($this->invoice_number==null)
            {
                $this->getInvoiceNumber();
            }


            //dynamicaly payment process the done by choosed Payment method

            switch($this->payment_method)
            {
                // case PayMentEnum::COH_PAYMENT:   ? true : false ; break;
                case PayMentEnum::COH_PAYMENT: return $this->processCashOnHandPayment() ? true : false ; break;
                case PayMentEnum::ONLINE_PAYMENT: return $this->processCashOnHandPayment() ? true : false ; break;
            }



        }
        else
        {
            throw new Exception('Cannot Process Payment');
        }

        throw new Exception('Something went wrong');

    }

    /**
     * processCashOnHandPayment function
     * this function takes care of payment done on cash on hand
     * @return boolean
     */
    private function processCashOnHandPayment() : bool
    {

        try {

            $is_transaction_success =  UserTransaction::create([
                "tr_id"=>$this->invoice_number,
                "user_id"=>$this->payment_to,
                "tr_mode"=>$this->payment_method,
                "tr_amount_paid"=>$this->payment_amount,
                "tr_package_name"=>$this->tr_package_name,
                "tr_package_price"=>$this->tr_package_price,
                "tr_package_views"=>$this->tr_package_views,
                "tr_package_photo_upload"=>$this->tr_package_photo_upload,
                "tr_date"=>Carbon::now(),
                "tr_package_interest"=>$this->tr_package_interest,
            ]);

        }
        catch (\Exception $e)
        {
            dd($e);
        }

    return $is_transaction_success ? true : false;
    }


}
