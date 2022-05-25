<?php

namespace App\Helpers\Payments\PayU;

use App\Helpers\Utility\InvoiceNumberHelper;
use App\Models\Master\PackageMaster\PackageMaster;
use App\Models\Payment\PaymentGateWay;
use App\Models\User;
use Dotenv\Util\Str;
use Illuminate\Support\Facades\Http;

class PayUPaymentHelper
{

    public $key;
    public $transactionId;
    public $amount;
    public $packageName;
    public $packageId;
    public $firstName;
    public $email;
    public $phone;
    public $surl;
    public $furl;
    public $hash;
    public $checkoutUrl;
    private $salt;

    private function __construct()
    {
        $gateWay_info = PaymentGateWay::where('payment_gateway_name', 'PayU Money')->first();
        $this->key = $gateWay_info->key;
        $this->checkoutUrl = $gateWay_info->checkout_url;
        $this->salt = $gateWay_info->salt;
        $this->surl = route('admin.payments.payu.success');
        $this->furl = route('admin.payments.payu.failure');
    }

    public static function initialize(): self
    {
        return new self;
    }

    public  function toUser(int $id, int $amount): self
    {

        $this->amount = $amount;

        $user = User::find($id)->load('userBasicInfo');

        $this->firstName = $user->userBasicInfo->user_full_name;
        $this->email = $user->email;
        $this->phone = $user->userBasicInfo->user_mobile_no;

        return $this;
    }

    public function package(int $id): self
    {

        $package_info = PackageMaster::find($id);

        $this->packageName = $package_info->package_name;
        $this->packageId = $package_info->id;

        return $this;
    }

    public function sha512(): self
    {
        $this->transactionId = InvoiceNumberHelper::GenerateInvoiceNumber();
        // $this->transactionId = 'TRID81636'; testing

        $data = $this->key .
            "|" . $this->transactionId .
            "|" . $this->amount .
            "|" . $this->packageId .
            "|" . $this->firstName .
            "|" . $this->email . "|||||||||||" . $this->salt;


        $this->hash = hash('sha512', $data);

        return $this;
    }

    public function get(): self
    {
        return $this;
    }

    public  function verifyTransaction(string $transactionID, string $key): bool
    {

        $command = 'verify_payment';

        $data = $key .
            "|" . $command .
            "|" . $transactionID . "|" .  $this->salt;

        $verification_hash = hash('sha512', $data);

        $response = Http::payumoney()->asForm()->post('/postservice?form=2', ['key' => $key, 'hash' => $verification_hash, 'var1' => $transactionID, 'command' => $command]);

        if ($response->successful()) {

            $res = $response->json();

            return $res['status'] == 1 ? true : false;
        }

        return false;
    }
}
