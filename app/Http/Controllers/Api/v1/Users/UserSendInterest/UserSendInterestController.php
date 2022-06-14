<?php

namespace App\Http\Controllers\Api\v1\Users\UserSendInterest;

use App\Events\SendEvent;
use App\Http\Controllers\Controller;
use App\Models\Master\UserPackageInfoMaster\UserPackageInfoMaster;
use App\Models\Master\UserShowInterestInfoMaster\UserShowInterestInfoMaster;
use App\Models\User;
use Illuminate\Support\Facades\Event;
use Illuminate\Http\Request;

class UserSendInterestController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $user = User::find(auth()->user()->id)->load('userPackageInfo');

        $if_already_sent_interest = UserShowInterestInfoMaster::where('user_id', $user->id)
            ->where('interested_users_id', $request->userid)
            ->first();



        if ($if_already_sent_interest == null) {

            if ($user->userPackageInfo->interest_remaining > 0)
            {
                Event::dispatch((new SendEvent($user, $request->userid)));

                UserPackageInfoMaster::where('user_id', $user->id)->first()
                    ->decrement('interest_remaining', 1);

                UserShowInterestInfoMaster::create([
                    "user_id" => $user->id,
                    "interested_users_id" => $request->userid,
                    "user_interested_acceptance" => 2,
                ]);

                return response()->json([], 200);
            }

            return response()->json(["message" => "upgrade your package"], 422);
        }

        return response()->json(["message" => "Already interest Sent "], 421);
    }
}
