<?php

namespace App\Http\Controllers\Api\v1\Users\UserNative;

use App\Http\Controllers\Controller;
use App\Http\Requests\Website\Dashboard\ProfilesRequests\NativeInfoRequest;
use App\Http\Resources\Users\UserNative\UserNativeInfoResource;
use App\Models\Master\UserNativeInfoMaster\UserNativeInfoMaster;
use App\Services\Website\DashboardServices\ProfileServices\NativeInfoUpdateServices;
use Illuminate\Http\Request;

class UserNativeInfoController extends Controller
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
    public function store(NativeInfoRequest $request, NativeInfoUpdateServices $service)
    {
        return  $service->HandleNativeDetailsUpdate($request, $request->user()->id)
        ? response()->json(['message' => 'User Native information created'], 201)
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
            $user_native_info=UserNativeInfoMaster::where('user_id',$id)
                        ->with(['Country','State','City'])
                        ->first();

            return UserNativeInfoResource::make($user_native_info);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(NativeInfoRequest $request, NativeInfoUpdateServices $service, $id)
    {
        if($request->user()->id==$id)
        {
            return  $service->HandleNativeDetailsUpdate($request, $id)
        ? response()->json(['message' => 'User Native information Updated'], 200)
        : response()->json(['message' => ''], 500);
        }

        return response()->json(['message' => 'Invalid Action'], 403);
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
