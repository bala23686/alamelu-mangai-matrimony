<?php

namespace App\Http\Controllers\Api\v1\UserTransaction;

use App\Http\Controllers\Controller;
use App\Models\UserTransaction\UserTransaction;
use Illuminate\Http\Request;

class UserTransactionApiController extends Controller
{


    public function getUserTransactions(Request $request)
    {

        $query = UserTransaction::query();

        $sum = $query->sum('tr_amount_paid');


        //filtering from_date && to_date
        if ($request->has('from_date') && $request->from_date != null && $request->has('to_date') && $request->to_date != null) {

            $query->whereBetween('tr_date', [$request->from_date, $request->to_date]);
        }

        //section to filter by payment method

        if ($request->has('payment_mode') && $request->payment_mode != 0) {
            $query->where('tr_mode', $request->payment_mode);
        }


        $filteredSum = $query->sum('tr_amount_paid');
        //final section to pagination
        $data = $query->paginate(10);


        return response(json_encode(["data" => $data, "sum" => $sum, "filteredSum" => $filteredSum], 200));
    }
}
