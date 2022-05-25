<?php

namespace App\Helpers\Utility;

use App\Models\UserTransaction\UserTransaction;
use DateTime;

class InvoiceNumberHelper
{


    public static function GenerateInvoiceNumber():string
    {

       try{

        $current_date_time = new DateTime();

        $date_sequence = $current_date_time->format("dmy");

        //section generate the sequence of running number of trip sheet

        $lastTransactionId = UserTransaction::orderBy('tr_id', 'desc')->first();

        if (!$lastTransactionId)
            // We get here if there is no TripSheet at all
            // If there is no Trip sheet number set it to 0, which will be 1 at the end.
            $number = 0;
        else

            $number = substr($lastTransactionId->tr_id, 8);


        return "IN".$date_sequence. sprintf('%03d', intval($number) + 1);

       }
       catch (\Exception $e)
       {
           dd($e);
       }

    }


}
