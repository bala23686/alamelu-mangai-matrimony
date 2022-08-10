<?php

namespace App\Http\Controllers\Api\v1\Users\UserProfiles;

use App\Http\Controllers\Controller;
use App\Http\Resources\User\UserResource;
use App\Services\Profiles\UserProfileService;
use Illuminate\Http\Request;

class UserProfileController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, UserProfileService $service)
    {
        $profiles = $service->execute();

        return response()->json(['data' => $profiles], 200);
    }
}
