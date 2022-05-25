<?php

namespace App\Http\Controllers\Api\v1\Users\UserPrefference;

use App\Http\Controllers\Controller;
use App\Http\Requests\Website\Dashboard\PartnerPreferenceRequests\ReligiousPreferenceDetailsRequest;
use App\Http\Resources\Users\UserProfessional\UserReligiousPrefferenceInfoResource;
use App\Models\Master\UserPreferenceInfoMaster\UserPreferenceInfo;
use App\Services\Website\DashboardServices\PartnerPreferenceServices\ReligiousPreferenceUpdateServices;
use Illuminate\Http\Request;

class UserReligiousPrefferenceController extends Controller
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
    public function store(ReligiousPreferenceDetailsRequest $request, ReligiousPreferenceUpdateServices $service)
    {
        return  $service->HandleReligiousPreferenceUpdate($request, $request->user()->id)
            ? response()->json(['message' => 'User Religious Preferrence information updated'], 201)
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
        if ($request->user()->id == $id) {

            $user_religious_info=UserPreferenceInfo::find($id)
            ->load('Religion')
            ->load('Caste');

            return UserReligiousPrefferenceInfoResource::make($user_religious_info);
        }
        return response()->json(["message" => "Action Denied"], 401);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ReligiousPreferenceDetailsRequest $request, ReligiousPreferenceUpdateServices $service, $id)
    {
        if ($request->user()->id == $id) {

            return  $service->HandleReligiousPreferenceUpdate($request, $request->user()->id)
                ? response()->json(['message' => 'User Religious Preferrence information updated'], 201)
                : response()->json(['message' => ''], 500);
        }
        return response()->json(["message" => "Action Denied"], 401);
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
