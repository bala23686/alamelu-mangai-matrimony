<?php

namespace App\Http\Controllers\Admin\Masters\RasiMaster;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Masters\RasiMasterRequest\RasiMasterStoreRequest;
use App\Models\Master\RasiMaster\RasiMaster;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Cache;


class RasiMasterController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $rasiList = Cache::rememberForever('rasiList', function () {

            return RasiMaster::where('rasi_status', 1)->get();
        });

        return view('Admin.pages.Masters.RasiMaster.index', ['RasiList' => $rasiList]);
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
    public function store(RasiMasterStoreRequest $request)
    {

        if (RasiMaster::create($request->validated())) {
            toast('Rasi Added Successfully', 'success');
            return redirect()->route('admin.rasi.index');
        }
        toast('Something went Wrong', 'error');
        return redirect()->route('admin.rasi.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RasiMasterStoreRequest $request, $id)
    {
        if (RasiMaster::find($id)->update($request->validated())) {
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

            if (RasiMaster::destroy($id)) {
                toast('Rasi Deleted Successfully', 'success');
                return redirect()->route('admin.rasi.index');
            }
            toast('Something went Wrong', 'error');
            return redirect()->route('admin.rasi.index');
        } catch (QueryException $th) {

            toast('Cannot Delete Rasi Already in Use', 'error');
            return redirect()->route('admin.rasi.index');
        }
    }
}
