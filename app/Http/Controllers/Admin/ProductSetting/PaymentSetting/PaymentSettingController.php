<?php

namespace App\Http\Controllers\Admin\ProductSetting\PaymentSetting;

use App\Http\Controllers\Controller;
use App\Models\Payment\PaymentGateWay;
use Illuminate\Http\Request;

class PaymentSettingController extends Controller
{


    public function index()
    {
        $gateways = PaymentGateWay::all();

        return view('Admin.ProductSetting.PaymentSetting.index', compact('gateways'));
    }



    public function show($id)
    {
        $gate_way_info=PaymentGateWay::find($id);

        return view('Admin.ProductSetting.PaymentSetting.show', compact('gate_way_info'));

    }


    public function update(Request $request ,$id)
    {

        $is_saved=false;
            if($id==1)
            {
                $is_saved=PaymentGateWay::find($id)->update([
                    "key"=>$request->key,
                    "salt"=>$request->salt,
                    "checkout_url"=>$request->checkout_url,
                    "active_status"=>$request->active_status,
                ]);
            }

        if($is_saved)
        {
            return redirect()->route('admin.setting.payment-gateway.index');
        }
    }
}
