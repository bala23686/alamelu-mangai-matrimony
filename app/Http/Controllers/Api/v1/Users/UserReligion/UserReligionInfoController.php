<?php

namespace App\Http\Controllers\Api\v1\Users\UserReligion;

use App\Http\Controllers\Controller;
use App\Http\Requests\Website\Dashboard\ProfilesRequests\NativeInfoRequest;
use App\Http\Requests\Website\Dashboard\ProfilesRequests\ReligiousDetailsRequest;
use App\Http\Resources\Users\UserReligiousInfo\UserReligiousInfoResource;
use App\Models\Master\UserReligiousInfoMaster\UserReligiousInfoMaster;
use App\Services\Website\DashboardServices\ProfileServices\NativeInfoUpdateServices;
use App\Services\Website\DashboardServices\ProfileServices\ReligiousDetailsUpdateServices;
use Illuminate\Http\Request;

class UserReligionInfoController extends Controller
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
    public function store(ReligiousDetailsRequest $request, ReligiousDetailsUpdateServices $service)
    {
        return  $service->HandleReligiousDetailsUpdate($request, $request->user()->id)
            ? response()->json(['message' => 'User Religious information Created'], 201)
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

            $user_religious_info=UserReligiousInfoMaster::where('user_id',$id)
                        ->with([
                        'BelognsToReligion',
                        'BelongsToCaste',
                        'BelongsToRasi',
                        'BelongsToStar'
                        ])
                        ->first();

            return UserReligiousInfoResource::make($user_religious_info);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ReligiousDetailsRequest $request, ReligiousDetailsUpdateServices $service, $id)
    {

        if($request->user()->id==$id)
        {

            return  $service->HandleReligiousDetailsUpdate($request, $id)
            ? response()->json(['message' => 'User Religious information Updated'], 201)
            : response()->json(['message' => ''], 500);

        }

        return response()->json(['message' => 'Action Denied'], 500);

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
