<?php

namespace App\Http\Controllers\Website\Transaction;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserTransaction\UserTransaction;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\PDF;


class UserTransactionController extends Controller
{
    public function index($id)
    {

        // $data = [];
        $transaction = UserTransaction::where('user_id', $id)->get();


        // dd($data);
        // print_r($data);
        return view('Website.userDashboard.transaction', compact('transaction'))->with('user', auth()->user());
    }

    public function createPDF()
    {
        // Retrieve all items from the db
        $transaction = UserTransaction::where('user_id', '=', auth()->user())->get();
        view()->share('transaction', $transaction);
        $pdf = PDF::loadView('Invoices.invoice', $transaction);
        return $pdf->download('file-pdf.pdf');
    }
}
