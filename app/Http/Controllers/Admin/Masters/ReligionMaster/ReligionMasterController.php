<?php

namespace App\Http\Controllers\Admin\Masters\ReligionMaster;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Masters\ReligionMasterRequest\ReligionMasterRequest;
use App\Models\Master\ReligionMaster\ReligionMaster;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class ReligionMasterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $religionList = Cache::rememberForever('religionList', function () {

            return ReligionMaster::where('religion_status', 1)->get();
        });

        return view('Admin.pages.Masters.ReligionMaster.index', ['religionList' => $religionList]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ReligionMasterRequest $request)
    {
        if (ReligionMaster::create($request->validated())) {
            toast('Religion Added Successfully', 'success');
            return redirect()->route('admin.religion.index');
        }
        toast('Something went Wrong', 'error');
        return redirect()->route('admin.religion.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return response(json_encode(ReligionMaster::find($id)));
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
    public function update(ReligionMasterRequest $request, $id)
    {
        if (ReligionMaster::find($id)->update($request->validated())) {
            return response(json_encode([]), 200);
        }

        return;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {

            if (ReligionMaster::destroy($id)) {
                toast('Religion Deleted Successfully', 'success');
                return redirect()->route('admin.religion.index');
            }
            toast('Something went Wrong', 'error');
            return redirect()->route('admin.religion.index');
        } catch (QueryException $th) {

            toast('Cannot Delete Religion Already in Use', 'error');
            return redirect()->route('admin.religion.index');
        }
    }
}
