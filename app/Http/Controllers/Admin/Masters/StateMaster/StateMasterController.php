<?php

namespace App\Http\Controllers\Admin\Masters\StateMaster;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Masters\StateMasterRequest\StateMasterRequest;
use App\Models\Master\CountryMaster\CountryMaster;
use App\Models\Master\StateMaster\StateMaster;
use App\Traits\Controllers\Admin\Masters\StateMaster\StateMasterMethods;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class StateMasterController extends Controller
{

    use StateMasterMethods;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stateList = Cache::rememberForever('stateList', function () {

            return StateMaster::where('state_status', 1)->with('Country')->get();
        });

        $countryList = Cache::rememberForever('countryList', function () {

            return CountryMaster::where('country_status', 1)->get();
        });

        return view('Admin.pages.Masters.StateMaster.index', ['countryList' => $countryList, 'stateList' => $stateList]);
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
    public function store(StateMasterRequest $request)
    {
        if (StateMaster::create($request->validated())) {
            toast('State Added Successfully', 'success');
            return redirect()->route('admin.state.index');
        }
        toast('Something went Wrong', 'error');
        return redirect()->route('admin.state.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return response(json_encode(StateMaster::find($id)->load('Country')));
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
    public function update(StateMasterRequest $request, $id)
    {
        if (StateMaster::find($id)->update($request->validated())) {
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

            if (StateMaster::destroy($id)) {
                toast('State Deleted Successfully', 'success');
                return redirect()->route('admin.state.index');
            }
            toast('Something went Wrong', 'error');
            return redirect()->route('admin.state.index');
        } catch (QueryException $th) {

            toast('Cannot Delete State Already in Use', 'error');
            return redirect()->route('admin.state.index');
        }
    }
}
