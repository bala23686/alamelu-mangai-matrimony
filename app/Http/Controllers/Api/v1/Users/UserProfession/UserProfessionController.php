<?php

namespace App\Http\Controllers\Api\v1\Users\UserProfession;

use App\Http\Controllers\Controller;
use App\Http\Requests\Website\Dashboard\ProfilesRequests\ProfessionalDetailsRequest;
use App\Http\Resources\User\UserProfessionalInfoResource;
use App\Models\Master\UserProfessionalMaster\UserProfessionalMaster;
use App\Services\Website\DashboardServices\ProfileServices\ProfessionalDetailsUpdateServices;
use Illuminate\Http\Request;

class UserProfessionController extends Controller
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
    public function store(ProfessionalDetailsRequest $request, ProfessionalDetailsUpdateServices $service)
    {
        return  $service->HandleProfessionalDetailsUpdate($request, $request->user()->id)
        ? response()->json(['message' => 'User Professional information updated'], 201)
        : response()->json(['message' => ''], 500);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {


            $professional_info=UserProfessionalMaster::find($id)
            ->load('Education')
            ->load('Job')
            ->load('JobCountry')
            ->load('JobState')
            ->load('JobCity');
            return UserProfessionalInfoResource::make($professional_info);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProfessionalDetailsRequest $request, ProfessionalDetailsUpdateServices $service, $id)
    {
        if($request->user()->id==$id)
        {
            return  $service->HandleProfessionalDetailsUpdate($request, $request->user()->id)
            ? response()->json(['message' => 'User Professional information updated'], 201)
            : response()->json(['message' => ''], 500);
        }
        return response()->json(["message"=>"Action Denied"],403);
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
