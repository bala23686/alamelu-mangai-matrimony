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
                toastr()->error('Email does not exist !');
                return redirect()->back();
            } else {
                //mail with link
                Mail::to($request->email)->send(new UserForgotPassword($userData, $token));
                toastr()->success('Password reset Mail Sent Successfully !');
                return redirect()->route('Home');
            }
        } else {
            toastr()->error('Something Went Wrong!');
            return view('Website.Auth.passwordreset');
        }
    }

    #Password Reset
    public function userPassResetUpdate(Request $request, $token = null)
    {
        if ($token) {
            if ($request->isMethod('post')) {

                $validatedData = $request->validate([
                    'new_password' => 'required|min:8',
                    'new_confirm_password' => 'required|min:8|same:new_password',
                ]);

                $userCredentialUpdate = User::where('token', $token)->first();

                if ($userCredentialUpdate) {
                    $userCredentialUpdate->token = 'NULL';
                    $userCredentialUpdate->password = Hash::make($request->new_confirm_password);
                    $userCredentialUpdate->save();
                    toastr()->success('Your Password Reset Successfully! Now you can Login');
                    return redirect()->route('Home');
                } else {
                    toastr()->error('Something went wrong! Try Again!');
                    return redirect()->route('Home');
                }
            } else {
                toastr()->error('Try Again!');

                return view('Website.Auth.passwordresetupdate', compact('token'));
            }
        }
    }
    public function dashboardReset(Request $request)
    {
        if ($request->isMethod('post')) {
            $userData = User::select('id', 'email')->where('email', '=', $request->email)->first();
            if ($userData) {
                $token = md5($request->email);
                User::where('email', $request->email)->update(['token' => $token]);
            }
            if (empty($userData)) {
                toastr()->error('Email does not exist !');
                return redirect()->back();
            } else {
                //mail with link
                Mail::to($request->email)->send(new UserForgotPassword($userData, $token));
                toastr()->success('Password reset Mail Sent Successfully !');
                return redirect()->back();
            }
        } else {
            toastr()->error('Something Went Wrong!');
            return back();
        }
    }
}
