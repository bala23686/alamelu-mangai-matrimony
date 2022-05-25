<?php

namespace App\Http\Controllers\Admin\Masters\CountryMaster;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Masters\CountryMasterRequest\CountryMasterRequest;
use App\Models\Master\CountryMaster\CountryMaster;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class CountryMasterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $countryList = Cache::rememberForever('countryList', function () {

            return CountryMaster::where('country_status', 1)->get();
        });

        return view('Admin.pages.Masters.CountryMaster.index', ['countryList' => $countryList]);
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
    public function store(CountryMasterRequest $request)
    {
        if (CountryMaster::create($request->validated())) {
            toast('Country Added Successfully', 'success');
            return redirect()->route('admin.country.index');
        }
        toast('Something went Wrong', 'error');
        return redirect()->route('admin.country.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return response(json_encode(CountryMaster::find($id)));
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
    public function update(CountryMasterRequest $request, $id)
    {
        if (CountryMaster::find($id)->update($request->validated())) {
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

            if (CountryMaster::destroy($id)) {
                toast('Country Deleted Successfully', 'success');
                return redirect()->route('admin.country.index');
            }
            toast('Something went Wrong', 'error');
            return redirect()->route('admin.country.index');
        } catch (QueryException $th) {

            toast('Cannot Delete Country Already in Use', 'error');
            return redirect()->route('admin.country.index');
        }
    }
}
