<?php

namespace App\Http\Controllers\Api\v1\Users\UserBasicInfo;

use App\Http\Controllers\Controller;
use App\Http\Requests\Website\Dashboard\ProfilesRequests\BasicDetailsRequest;
use App\Http\Resources\Users\UserBasicInfo\UserBasicInfoResource;
use App\Models\Master\UserBasicInfoMaster\UserBasicInfoMaster;
use App\Services\Website\DashboardServices\ProfileServices\BasicDetailsUpdateServices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class UserBasicInfoController extends Controller
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
    public function store(BasicDetailsRequest $request, BasicDetailsUpdateServices $service)
    {

        $is_success = $service->HandleBasicDetails($request, $request->user()->id);

        return $is_success
            ? response()->json($request, 200)
            : response()->json(["meassage" => "Something went wrong"], 500);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {

        if($id==$request->user()->id)
        {
            return Cache::rememberForever('user_basic_info' . $id, function () use ($id) {

                $user_basic_info =  UserBasicInfoMaster::with([
                    'Gender',
                    'MartialStatus',
                    'MotherTongue',
                    'Complex',
                    'Height',
                    'EatingHabit',
                ])
                    ->where('user_id', $id)
                    ->first();
                return UserBasicInfoResource::make($user_basic_info);
            });
        }

        return response()->json(["message"=>"Trying to fetch information which does not belongs to user token"],403);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BasicDetailsRequest $request, BasicDetailsUpdateServices $service, $id)
    {
        if($id==$request->user()->id)
        {
            $is_success = $service->HandleBasicDetails($request, $id);

            return $is_success
                ? response()->json($request, 200)
                : response()->json(["meassage" => "Something went wrong"], 500);
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
