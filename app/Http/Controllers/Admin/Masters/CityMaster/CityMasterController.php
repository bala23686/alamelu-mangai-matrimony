<?php

namespace App\Http\Controllers\Admin\Masters\CityMaster;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Masters\CityMasterRequest\CityMasterRequest;
use App\Models\Master\CityMaster\CityMaster;
use App\Models\Master\StateMaster\StateMaster;
use App\Traits\Controllers\Admin\Masters\CityMaster\CityMasterMethods;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class CityMasterController extends Controller
{

    use CityMasterMethods;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cityList = Cache::rememberForever('cityList', function () {

            return CityMaster::where('city_status', 1)->with('State')->get();
        });

        $stateList = Cache::rememberForever('stateList', function () {

            return StateMaster::where('state_status', 1)->get();
        });

        return view('Admin.pages.Masters.CityMaster.index', ['stateList' => $stateList, 'cityList' => $cityList]);
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
    public function store(CityMasterRequest $request)
    {
        if (CityMaster::create($request->validated())) {
            toast('City Added Successfully', 'success');
            return redirect()->route('admin.city.index');
        }
        toast('Something went Wrong', 'error');
        return redirect()->route('admin.city.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return response(json_encode(CityMaster::find($id)->load('State')));
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
    public function update(CityMasterRequest $request, $id)
    {
        if (CityMaster::find($id)->update($request->validated())) {
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

            if (CityMaster::destroy($id)) {
                toast('City Deleted Successfully', 'success');
                return redirect()->route('admin.city.index');
            }
            toast('Something went Wrong', 'error');
            return redirect()->route('admin.city.index');
        } catch (QueryException $th) {

            toast('Cannot Delete City Already in Use', 'error');
            return redirect()->route('admin.city.index');
        }
    }
}
