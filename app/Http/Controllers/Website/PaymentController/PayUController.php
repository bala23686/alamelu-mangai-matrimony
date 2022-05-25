<?php

namespace App\Http\Controllers\Website\PaymentController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helpers\Payments\PayU\PayUPaymentHelper;
use App\Models\Master\PackageMaster\PackageMaster;
use App\Models\User;
use App\Actions\Payment\PaymentAction;
use App\Actions\Package\PackageAction;
use App\Models\UserTransaction\UserTransaction;
use App\Actions\Invoice\InvoiceAction;
use App\Actions\Invoice\InvocieMailAction;

class PayUController extends Controller
{
    public function __construct()
    {
        $this->middleware('is_member')->only(['index']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $payment_infomation = PayUPaymentHelper::initialize();

        $payment_infomation->toUser(auth()->id(), 1000)
            ->package(1)
            ->sha512()
            ->get();



        return view('Website.Payment.checkout', compact('payment_infomation'));
    }
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
                ->route('user.payments.payu.payusuccess', $user->id)
                ->with('pay-u-payment-success', $invioce);
        }
    }
    public function payusuccess()
    {

        return view('Website.Payment.success');
    }
    public function failed(Request $request)
    {

        return redirect()->route('Home');
    }
}
