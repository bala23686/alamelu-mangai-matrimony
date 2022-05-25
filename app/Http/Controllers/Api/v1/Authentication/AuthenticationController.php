<?php

namespace App\Http\Controllers\Api\v1\Authentication;

use App\Http\Controllers\Controller;
use App\Http\Requests\UsersRequest\UserLoginRequest;
use App\Http\Requests\UsersRequest\UserRegistrationRequest;
use App\Http\Resources\User\UserResource;
use App\Models\User;
use App\Services\UserRegistrationService\UserRegistrationService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticationController extends Controller
{


    /**
     * registerUser function
     * This function register the user from a mobile request
     * @param UserRegistrationRequest $request
     * @param UserRegistrationService $service
     * @return void
     */
    public function registerUser(UserRegistrationRequest $request, UserRegistrationService $service)
    {

        //this function register a new User/Profile

        if ($service->HandleUserRegistration($request)) {


            if (Auth::attempt(['phonenumber' => $request->phonenumber, 'password' => $request->password])) {

                $ability = (Auth::user()->is_admin) ? ['is_admin'] : ['is_user'];

                $token = $request->user()->createToken($request->phonenumber, $ability)->plainTextToken;

                $user = User::with('status')
                    ->where('id', Auth::user()->id)
                    ->first();

                return UserResource::make($user)->additional(['token' => $token]);
            } else {
                $response = ["message" => "Invalid Phone & Password"];
                return response(json_encode($response), 401)->header('Content-Type', 'application/json');
            }
        }
    }


    /**
     * userLogin function
     *
     * @param UserLoginRequest $request
     * @return void
     */
    public function userLogin(UserLoginRequest $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {

            $ability = (Auth::user()->is_admin) ? ['is_admin'] : ['is_user'];

            $token = $request->user()->createToken($request->email, $ability)->plainTextToken;

            $user = User::with('status')
                ->where('id', Auth::user()->id)
                ->first();

            return UserResource::make($user)->additional(['token' => $token]);
        } else {
            $response = ["message" => "Invalid Phone & Password"];
            return response(json_encode($response), 401)->header('Content-Type', 'application/json');
        }
    }

    /**
     * logoutUser function
     * This function logout the user
     * @param Request $request
     * @return void
     */
    public function logoutUser(Request $request)
    {

        $request->user()->tokens()->delete();
        return response('', 204)->header('Content-Type', 'application/json');
    }
}
