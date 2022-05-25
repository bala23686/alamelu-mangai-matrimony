<?php

namespace App\Http\Controllers\Admin\Masters\CasteMaster;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Masters\CasteMasterRequest\CasteMasterRequest;
use App\Models\Master\CasteMaster\CasteMaster;
use App\Models\Master\ReligionMaster\ReligionMaster;
use App\Traits\Controllers\Admin\Masters\CasteMaster\CasteMasterMethods;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class CasteMasterController extends Controller
{

    use CasteMasterMethods;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $casteList = Cache::rememberForever('casteList', function () {

            return CasteMaster::where('caste_status', 1)->with('Religion')->get();
        });

        $religionList = Cache::rememberForever('religionList', function () {

            return ReligionMaster::where('religion_status', 1)->get();
        });

        return view('Admin.pages.Masters.CasteMaster.index', ['religionList' => $religionList, 'casteList' => $casteList]);
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
    public function store(CasteMasterRequest $request)
    {
        if (CasteMaster::create($request->validated())) {
            toast('Caste Added Successfully', 'success');
            return redirect()->route('admin.caste.index');
        }
        toast('Something went Wrong', 'error');
        return redirect()->route('admin.caste.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return response(json_encode(CasteMaster::find($id)->load('Religion')));
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
    public function update(CasteMasterRequest $request, $id)
    {
        if (CasteMaster::find($id)->update($request->validated())) {
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

            if (CasteMaster::destroy($id)) {
                toast('Caste Deleted Successfully', 'success');
                return redirect()->route('admin.caste.index');
            }
            toast('Something went Wrong', 'error');
            return redirect()->route('admin.caste.index');
        } catch (QueryException $th) {

            toast('Cannot Delete Star Already in Use', 'error');
            return redirect()->route('admin.caste.index');
        }
    }



}
