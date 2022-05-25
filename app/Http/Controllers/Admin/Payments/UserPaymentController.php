<?php

namespace App\Http\Controllers\Admin\Payments;

use App\Actions\Invoice\InvocieMailAction;
use App\Actions\Invoice\InvoiceAction;
use App\Actions\Package\PackageAction;
use App\Actions\Payment\PaymentAction;
use App\Enums\PayMentEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\Payments\UserPaymentRequest;
use App\Models\User;
use App\Models\UserTransaction\UserTransaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class UserPaymentController extends Controller
{

    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(UserPaymentRequest $request)
    {
        //more infomation abouts this transaction
        $payment_infos = [
            "tr_package_name"=>$request->tr_package_name,
            "tr_package_price"=>$request->tr_package_price,
            "tr_package_views"=>$request->tr_package_views,
            "tr_package_photo_upload"=>$request->tr_package_photo_upload,
            "tr_package_interest"=>$request->tr_package_interest,
        ];

        //section that handle the user Payment process the payment
        $payment = (new PaymentAction((int)$request->tr_mode))
                    ->payTo($request->user_id)
                    ->setAmount((int)$request->tr_amount_paid)
                    ->paymentInfo($payment_infos)
                    ->processPayment();

        // $payment hold payment  processed status true-for success false for error

        $is_processed= $payment
        ? (new PackageAction((int)$request->user_id))
            ->purchasedPackage((int)$request->package_id)
            ->purchaseNewPackAge()
        : false ;



        //getting the last transaction
        $transaction_info=UserTransaction::where('user_id',$request->user_id)
                            ->orderBy('tr_id', 'DESC')->first();

        //section to generating invoice & mailing to party
         $invioce = (new InvoiceAction($transaction_info->tr_id))
                      ->generateInvoice();


        $userInfo=User::with('userBasicInfo')->where('id',(int)$request->user_id)->first();


        //section to send a mail to user if the they have a mail id
        $invioce!=null ?

         (new InvocieMailAction($userInfo,(string)$invioce))
         ->mailInvoice()
         :0;

        return $is_processed && $invioce!=null
            ? response()->json(['message' => 'Payment Done Successfully','invoice'=>$invioce], 200)
            :response()->json(['message' => 'something went wrong'], 500);

    }
}
