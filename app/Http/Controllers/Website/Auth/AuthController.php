<?php

namespace App\Http\Controllers\Website\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\UsersRequest\UserRegistrationRequest;
use App\Models\Master\UserBasicInfoMaster\UserBasicInfoMaster;
use App\Services\UserRegistrationService\UserRegistrationService;
use App\Models\Master\UserShortListInfoMaster\UserShortListInfoMaster;
use App\Models\Master\UserPackageInfoMaster\UserPackageInfoMaster;

class AuthController extends Controller
{
    public function __construct()
    {
        //
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return  view('Website.Auth.login');
    }


    public function store(UserRegistrationRequest $request)
    {

        $existInfo = User::where('phonenumber', $request->phonenumber)
            ->orWhere('email', $request->email)
            ->first();

        if ($existInfo) {
            if ($existInfo->phonenumber) {
                toastr()->error('User Phone Number Already Exists !');
                return back();
            }

            if ($existInfo->email) {
                toastr()->error('User Email Already Exists !');
                return back();
            }
        }

        $service = new  UserRegistrationService;

        $service->HandleUserRegistration($request);
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            toastr()->success('Account Created Successfully');
            return redirect()->route('user.payments.pay-Now', auth()->id());
        } else {
            toastr()->error('Something Went Wrong');
            return back();
        }
    }


    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        $remember_me = $request->has('remember') ? true : false;
        $email = $request->input('email');
        $password = $request->input('password');
        if (Auth::attempt(
            ['email' => $email, 'password' => $password],
            $remember_me

        )) {
            $user = User::where('email', $email)->first();
            Auth::login($user);
            // dd($user);
            toastr()->success('Logged In Successfully');
            return redirect()->route('user.dashboard');
        } else {
            toastr()->error('Invalid Credentials');
            return back();
        }
    }

    public function dashboard()
    {
        if (Auth::check()) {
            $data = [
                'shortlist_user' => UserShortListInfoMaster::with('userShortListInfo')->with('ShortlistBasicInfo')->where('shortlisted_by', '=', auth()->user()->id)
                    ->latest()->paginate(3),
                'package_info' => UserPackageInfoMaster::with('Package')->where('user_id', '=', auth()->user()->id)->first(),

            ];
            return view('Website.userDashboard.index', $data)->with('user', auth()->user());
        }
        toastr()->error('Something Went Wrong');
        return Redirect::to('/');
    }


    public function logout()
    {
        Session::flush();
        Auth::logout();
        toastr()->success('Logged Out');
        return redirect('/');
    }
}
