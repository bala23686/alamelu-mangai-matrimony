<?php

namespace App\Http\Controllers\Api\v1\Users\UserFamily;

use App\Http\Controllers\Controller;
use App\Http\Requests\Website\Dashboard\ProfilesRequests\FamilyDetailsRequest;
use App\Http\Resources\Users\UserFamilyInfo\UserFamilyInfoResource;
use App\Models\Master\UserFamilyInfoMaster\UserFamilyInfoMaster;
use App\Services\Website\DashboardServices\ProfileServices\FamilyDetailsUpdateServices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class UserFamilyInfoController extends Controller
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
    public function store(FamilyDetailsRequest $request,FamilyDetailsUpdateServices $service)
    {
        return $service->HandleUpdateFamilyDetails($request, $request->user()->id)
            ? response()->json(['message' => 'Family Information Updated'], 201)
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

            return Cache::rememberForever('user_famil_info'.$id,function()use($id)
            {
                $user_family_info=UserFamilyInfoMaster::where('user_id',$id)
                ->first()->load('FamilyStatusSubMaster');
                return UserFamilyInfoResource::make($user_family_info);
            });

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(FamilyDetailsRequest $request,FamilyDetailsUpdateServices $service, $id)
    {
        if($request->user()->id==$id)
        {
        return $service->HandleUpdateFamilyDetails($request, $id)
        ? response()->json(['message' => 'Family Information Updated'], 201)
        : response()->json(['message' => 'something went wrong'], 500);
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
