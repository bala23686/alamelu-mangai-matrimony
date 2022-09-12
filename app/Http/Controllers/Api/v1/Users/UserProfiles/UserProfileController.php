<?php

namespace App\Http\Controllers\Api\v1\Users\UserProfiles;

use App\Http\Controllers\Controller;
use App\Http\Resources\User\UserResource;
use App\Services\Profiles\UserProfileService;
use Illuminate\Http\Request;
use App\Models\Master\UserShortListInfoMaster\UserShortListInfoMaster;

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
        $shortlist_profiles = UserShortListInfoMaster::where('shortlisted_by', '=', auth()->id())->get();

        return response()->json(['shortlisted_id' => $shortlist_profiles, 'data' => $profiles,], 200);
    }
}
