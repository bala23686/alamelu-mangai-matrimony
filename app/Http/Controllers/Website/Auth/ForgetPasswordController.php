<?php

namespace App\Http\Controllers\Website\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use App\Mail\UserForgotPassword;


class ForgetPasswordController extends Controller
{
    public function userpasswordReset(Request $request)
    {
        if ($request->isMethod('post')) {
            $userData = User::select('id', 'email')->where('email', '=', $request->email)->first();
            if ($userData) {
                $token = md5($request->email);
                User::where('email', $request->email)->update(['token' => $token]);
            }
            if (empty($userData)) {
                return redirect()->back()->with('warning', 'Email does not exist !');
            } else {
                //mail with link
                Mail::to($request->email)->send(new UserForgotPassword($userData, $token));
                return redirect()->back()->with('message', 'Password reset Mail Sent Successfully !');
            }
        } else {
            return view('Website.Auth.passwordreset')->with('warning', 'Something Went Wrong');
        }
    }

    #Password Reset
    public function userpassResetUpdate(Request $request, $token = null)
    {
        if ($token) {
            if ($request->isMethod('post')) {

                $validatedData = $request->validate([
                    'new_password' => 'required|min:8',
                    'new_confirm_password' => 'required|min:8|same:new_password',
                ]);

                $userCredentialupdate = User::where('token', $token)->first();
                if ($userCredentialupdate) {
                    $userCredentialupdate->token = 'NULL';
                    $userCredentialupdate->password = Hash::make($request->new_confirm_password);
                    $userCredentialupdate->save();
                    return redirect()->route('/')->with('message', 'Your Password Reset Successfully! Now you can Login');
                } else {
                    return redirect()->route('/')->with('error', 'Something went wrong!');
                }
            } else {
                return view('Website.Auth.passwordresetupdate', compact('token'))->with('info', 'Please Try Again');
            }
        }
    }
}
