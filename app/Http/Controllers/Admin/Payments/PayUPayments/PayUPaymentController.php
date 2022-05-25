<?php

namespace App\Http\Controllers\Admin\Payments\PayUPayments;

use App\Actions\Invoice\InvocieMailAction;
use App\Actions\Invoice\InvoiceAction;
use App\Actions\Package\PackageAction;
use App\Actions\Payment\PaymentAction;
use App\Helpers\Payments\PayU\PayUPaymentHelper;
use App\Http\Controllers\Controller;
use App\Models\Master\PackageMaster\PackageMaster;
use App\Models\User;
use App\Models\UserTransaction\UserTransaction;
use Illuminate\Http\Request;

class PayUPaymentController extends Controller
{



    public function __construct()
    {
        $this->middleware('is_admin')->only(['index']);
    }


    /**
     * index function
     * This method loads the required fields & hash for accessing the pay-u payment
     * gateway
     * @param Request $request
     * @return void
     */
    public function index(Request $request, $user_id)
    {

        $payment_infomation = PayUPaymentHelper::initialize();

        $payment_infomation->toUser($user_id, $request->amount)
            ->package($request->packageId)
            ->sha512()
            ->get();



        return view('Admin.Payments.Payu.index', compact('payment_infomation'));
    }



    /**
     * success function
     * This Function is called after the success response from
     * the PayU Payment Gateway
     * @param Request $request
     * @return void
     */
    public function success(Request $request)
    {


        $mihpayid = $request->mihpayid;
        $hash = $request->hash;
        $key = $request->key;
        $transactionID = $request->txnid;
        $productID = $request->productinfo;
        $amount = $request->amount;
        $userEmail = $request->email;


        $payment_verification = PayUPaymentHelper::initialize();

        if ($payment_verification->verifyTransaction($transactionID, $key)) {


            $package = PackageMaster::find($productID);
            $user = User::where('email', $userEmail)->first();
            //more infomation abouts this transaction
            $payment_infos = [
                "tr_package_name" => $package->package_name,
                "tr_package_price" => $package->package_price,
                "tr_package_views" => $package->package_allowed_profile,
                "tr_package_photo_upload" => $package->package_photo_upload,
                "tr_package_interest" => $package->package_interest_allowed,
            ];

            //section that handle the user Payment process the payment
            $payment = (new PaymentAction((int)2))
                ->payTo($user->id)
                ->setAmount((int)$amount)
                ->setInvoiceNumber($transactionID)
                ->paymentInfo($payment_infos)
                ->processPayment();

            // $payment hold payment  processed status true-for success false for error

            $is_processed = $payment
                ? (new PackageAction((int)$user->id))
                ->purchasedPackage((int)$package->id)
                ->purchaseNewPackAge()
                : false;



            //getting the last transaction
            $transaction_info = UserTransaction::where('user_id', $user->id)
                ->orderBy('tr_id', 'DESC')->first();

            //section to generating invoice & mailing to party
            $invioce = (new InvoiceAction($transaction_info->tr_id))
                ->generateInvoice();


            $userInfo = User::with('userBasicInfo')->where('id', (int)$user->id)->first();


            //section to send a mail to user if the they have a mail id
            $invioce != null ?

                (new InvocieMailAction($userInfo, (string)$invioce))
                ->mailInvoice()
                : 0;

            return redirect()
                ->route('admin.payments.payu.payusuccess', $user->id)
                ->with('pay-u-payment-success', $invioce);
        }
    }

    /**
     * failed function
     * This Function is called after the failed response from
     * the PayU Payment Gateway
     * @param Request $request
     * @return void
     */
    public function failed(Request $request)
    {

        return redirect()->route('admin.profile.index');
    }



    public function payusuccess()
    {

        return view('Admin.Payments.Payu.payusuccess');
    }
}
