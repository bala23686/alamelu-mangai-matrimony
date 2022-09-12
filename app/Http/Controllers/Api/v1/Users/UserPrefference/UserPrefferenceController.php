<?php

namespace App\Http\Controllers\Api\v1\Users\UserPrefference;

use App\Http\Controllers\Controller;
use App\Http\Requests\Website\Dashboard\PartnerPreferenceRequests\BasicPreferenceDetailsRequest;
use App\Http\Resources\Users\UserProfessional\UserProfessionalBasicInfoResource;
use App\Models\Master\UserBasicInfoMaster\UserBasicInfoMaster;
use App\Models\Master\UserPreferenceInfoMaster\UserPreferenceInfo;
use App\Services\Website\DashboardServices\PartnerPreferenceServices\BasicPartnerPreferenceUpdateServices;
use Illuminate\Http\Request;

class UserPrefferenceController extends Controller
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
    public function store(BasicPreferenceDetailsRequest $request, BasicPartnerPreferenceUpdateServices $service)
    {
        return  $service->HandleBasicPartnerPreferenceUpdate($request, $request->user()->id)
        ? response()->json(['message' => 'User Basic Preferrence information updated'], 201)
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


            $user_basic_prefference=UserPreferenceInfo::find($id)
            ->load('HeightTo')
            ->load('HeightFrom')
            ->load('MartialStatus');

            return UserProfessionalBasicInfoResource::make($user_basic_prefference);


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BasicPreferenceDetailsRequest $request, BasicPartnerPreferenceUpdateServices $service, $id)
    {

        if($request->user()->id==$id)
        {

            return  $service->HandleBasicPartnerPreferenceUpdate($request, $request->user()->id)
        ? response()->json(['message' => 'User Basic Preferrence information updated'], 201)
        : response()->json(['message' => ''], 500);


        }

        return response()->json(["message"=>'Action Denied'],401);

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
