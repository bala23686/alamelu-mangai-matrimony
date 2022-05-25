<?php

namespace App\Http\Controllers\Admin\Masters\HoroScopeMaster;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Masters\HoroScopeMasterRequest\HoroSCopeMasterRequest;
use App\Models\Master\HoroScopeMaster\HoroScopeMaster;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class HoroScopeMasterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $horoscopeList = Cache::rememberForever('horoscopeList', function () {

            return HoroScopeMaster::where('horoscope_status', 1)->get();
        });

        return view('Admin.pages.Masters.HoroScopeMaster.index', ['horoscopeList' => $horoscopeList]);
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
    public function store(HoroSCopeMasterRequest $request)
    {
        if (HoroScopeMaster::create($request->validated())) {
            toast('Horoscope Added Successfully', 'success');
            return redirect()->route('admin.horoscope.index');
        }
        toast('Something went Wrong', 'error');
        return redirect()->route('admin.horoscope.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return response(json_encode(HoroScopeMaster::find($id)));
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
    public function update(HoroSCopeMasterRequest $request, $id)
    {
        if (HoroScopeMaster::find($id)->update($request->validated())) {
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

            if (HoroScopeMaster::destroy($id)) {
                toast('Horoscope Deleted Successfully', 'success');
                return redirect()->route('admin.horoscope.index');
            }
            toast('Something went Wrong', 'error');
            return redirect()->route('admin.horoscope.index');
        } catch (QueryException $th) {

            toast('Cannot Delete Horoscope Already in Use', 'error');
            return redirect()->route('admin.horoscope.index');
        }
    }
}
