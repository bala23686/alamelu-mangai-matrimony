<?php

namespace App\Http\Controllers\Api\v1\Users\UserShortList;

use App\Http\Controllers\Controller;
use App\Models\Master\UserShortListInfoMaster\UserShortListInfoMaster;
use Illuminate\Http\Request;

class UserShotListController extends Controller
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
    public function store(Request $request)
    {

        $is_user_already_shortlisted = UserShortListInfoMaster::where('user_id', $request->short_listed_user_id)
            ->where('shortlisted_by', auth()->user()->id)->first();

        if ($is_user_already_shortlisted == null) {
            $shortlist                 = new UserShortListInfoMaster;
            $shortlist->user_id        = $request->short_listed_user_id;
            $shortlist->shortlisted_by = auth()->user()->id;

            if ($shortlist->save()) {
                return response()->json(["message" => "User ShortListed"], 200);
            }
        }

        return response()->json(["message" => "Already User ShortListed"], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $shortlist_profiles = UserShortListInfoMaster::with('userShortListInfo')
            ->with('ShortlistBasicInfo')
            ->where('shortlisted_by', '=', $id)
            ->latest()
            ->paginate(10);

        return response()->json(["data" => $shortlist_profiles], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $is_deleted = UserShortListInfoMaster::where('user_id', '=', $id)->delete();
        // $is_deleted = UserShortListInfoMaster::destroy($id);

        return $is_deleted
            ? response()->json(["message" => "Removed From ShortList"], 204)
            : response()->json(["message" => "Something went wrong"], 500);
    }
}
