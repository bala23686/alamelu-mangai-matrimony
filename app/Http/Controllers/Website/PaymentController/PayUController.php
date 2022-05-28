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
        $this->middleware('is_member')->only(['payNow']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $id)
    {
        // dd($request->amount);
        $payment_infomation = PayUPaymentHelper::initialize();
        $price = $request->amount;
        $gst = ($price * 18) / 100;
        $total = $price + $gst;
        $payment_infomation->toUser($id, $total)
            ->package($request->packageId)
            ->sha512()
            ->get();
        return view('Website.Payment.checkout', compact(['payment_infomation', 'gst', 'price']));
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


            $updateStatus = User::where('id', $user->id)->update(["is_paid" => 1]);
            $updateStatus ? true : false;

            //getting the last transaction
            $transaction_info = UserTransaction::where('user_id', $user->id)
                ->orderBy('tr_id', 'DESC')->first();

            //section to generating invoice & mailing to party
            $invoice = (new InvoiceAction($transaction_info->tr_id))
                ->generateInvoice();


            $userInfo = User::with('userBasicInfo')->where('id', (int)$user->id)->first();


            //section to send a mail to user if the they have a mail id
            // $invoice != null ?

            //     (new InvocieMailAction($userInfo, (string)$invoice))
            //     ->mailInvoice()
            //     : 0;
            //update payment status


            return redirect()
                ->route('user.payments.payU.paymentDone', $user->id)
                ->with('pay-u-payment-success', $invoice, $transaction_info);
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
    public function payNow()
    {
        return view('Website.Payment.payNow')->with('user', auth()->user());
    }
}
