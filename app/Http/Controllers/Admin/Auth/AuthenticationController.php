<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Auth\LoginRequest;
use Illuminate\Support\Facades\Auth;

class AuthenticationController extends Controller
{


    /**
     * login function
     * This function loads the admin login page
     * @return void
     */
    public function login()
    {
        return view('Admin.Auth.login');
    }

    /**
     * adminlogin function
     * This function attempt to login as admin
     * @return void
     */
    public function adminlogin(LoginRequest $request)
    {
        //checking for credentials
        if (Auth::attempt(
            [
                'email' => $request->email,
                'password' => $request->password
            ],
            $request->remember
        )) {

            //checks for autheticated user is admin or not
            return Auth()->user()->is_admin ? redirect()->route('admin.dashboard') : toast(__('auth.unauthorized Action'), 'error', 'top-right');
        }

        toast(__('auth.unauthorized Action'), 'error', 'top-right');
        return back();
    }


    /**
     * logout function
     * This function makes Admin Logout
     * @return void
     */
    public function logout()
    {
        Auth::logout();
        return redirect()
            ->route('admin.login');
    }
}
