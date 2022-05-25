<?php

namespace App\Http\Controllers\Website\ShortList;

use App\Http\Controllers\Controller;
use App\Models\Master\UserShortListInfoMaster\UserShortListInfoMaster;
use Illuminate\Http\Request;
use App\Models\Master\UserBasicInfoMaster\UserBasicInfoMaster;



class ShortListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $shortlist                 = new UserShortListInfoMaster;
        $shortlist->user_id        = $request->id;
        $shortlist->shortlisted_by = auth()->user()->id;
        if ($shortlist->save()) {
            return 1;
        } else {
            return 0;
        }
    }

    public function remove(Request $request)
    {
        $shortlist = UserShortListInfoMaster::where('user_id', $request->id)->where('shortlisted_by', auth()->user()->id)->first()->id;
        if (UserShortListInfoMaster::destroy($shortlist)) {
            return 1;
        } else {
            return 0;
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $shortlist_profiles = [
            'userinfo' => UserShortListInfoMaster::with('userShortListInfo')->with('ShortlistBasicInfo')->where('shortlisted_by', '=', $id)
                ->latest()->paginate(10)
        ];
        return view('Website.userDashboard.shortlist', $shortlist_profiles)->with('user', auth()->user());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function addToShortList($id)
    {
        $shortlist                 = new UserShortListInfoMaster;
        $shortlist->user_id        = $id;
        $shortlist->shortlisted_by = auth()->user()->id;
        if ($shortlist->save()) {
            return 1;
        } else {
            return 0;
        }
    }


    public function removeShortlist($id)
    {
        $shortlist = UserShortListInfoMaster::where(['user_id' => $id, 'shortlisted_by' => auth()->user()->id])->first();
        if ($shortlist->delete()) {
            return 1;
        } else {
            return 0;
        }
    }
}
