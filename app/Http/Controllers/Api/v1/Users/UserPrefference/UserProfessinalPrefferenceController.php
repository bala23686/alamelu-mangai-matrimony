<?php

namespace App\Http\Controllers\Api\v1\Users\UserPrefference;

use App\Http\Controllers\Controller;
use App\Http\Requests\Website\Dashboard\PartnerPreferenceRequests\ProfessionalPreferenceDetailsRequest;
use App\Http\Resources\Users\UserProfessional\UserProfessionalPrefferenceInfoResource;
use App\Models\Master\UserPreferenceInfoMaster\UserPreferenceInfo;
use App\Models\Master\UserProfessionalMaster\UserProfessionalMaster;
use App\Services\Website\DashboardServices\PartnerPreferenceServices\ProfessionalPreferenceUpdateServices;
use Illuminate\Http\Request;

class UserProfessinalPrefferenceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProfessionalPreferenceDetailsRequest $request, ProfessionalPreferenceUpdateServices $service)
    {
        return  $service->HandleProfessionalPreferenceUpdate($request, $request->user()->id)
            ? response()->json(['message' => 'User Professional Preferrence information updated'], 201)
            : response()->json(['message' => ''], 500);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request,$id)
    {
        if($request->user()->id==$id)
        {

            $user_professional_prefference=UserPreferenceInfo::find($id);

            return UserProfessionalPrefferenceInfoResource::make($user_professional_prefference);
        }
        return response()->json(["message"=>"Action Denied"],401);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProfessionalPreferenceDetailsRequest $request, ProfessionalPreferenceUpdateServices $service, $id)
    {
        if($request->user()->id==$id)
        {
            return  $service->HandleProfessionalPreferenceUpdate($request, $request->user()->id)
            ? response()->json(['message' => 'User Professional Preferrence information updated'], 201)
            : response()->json(['message' => ''], 500);
        }

        return response()->json(["message"=>"Action Denied"],401);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
