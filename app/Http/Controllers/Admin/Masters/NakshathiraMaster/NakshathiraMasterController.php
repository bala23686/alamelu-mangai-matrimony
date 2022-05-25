<?php

namespace App\Http\Controllers\Admin\Masters\NakshathiraMaster;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Masters\StarMasterRequest\StarMasterRequest;
use App\Models\Master\RasiMaster\RasiMaster;
use App\Models\Master\StarMaster\StarMaster;
use App\Traits\Controllers\Admin\Masters\NakshathiraMaster\NakshathiraMasterMethods;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class NakshathiraMasterController extends Controller
{

    use NakshathiraMasterMethods;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $starList = Cache::rememberForever('starList', function () {

            return StarMaster::where('star_status', 1)->with('Rasi')->get();
        });

        $rasiList = Cache::rememberForever('rasiList', function () {

            return RasiMaster::where('rasi_status', 1)->get();
        });

        return view('Admin.pages.Masters.NakshathiraMaster.index', ['rasiList' => $rasiList, 'starList' => $starList]);
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
    public function store(StarMasterRequest $request)
    {
        if (StarMaster::create($request->validated())) {
            toast('Star Added Successfully', 'success');
            return redirect()->route('admin.nakshathira.index');
        }
        toast('Something went Wrong', 'error');
        return redirect()->route('admin.nakshathira.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return response(json_encode(StarMaster::find($id)->load('Rasi')));
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
    public function update(StarMasterRequest $request, $id)
    {
        if (StarMaster::find($id)->update($request->validated())) {
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

            if (StarMaster::destroy($id)) {
                toast('Star Deleted Successfully', 'success');
                return redirect()->route('admin.nakshathira.index');
            }
            toast('Something went Wrong', 'error');
            return redirect()->route('admin.nakshathira.index');
        } catch (QueryException $th) {

            toast('Cannot Delete Star Already in Use', 'error');
            return redirect()->route('admin.nakshathira.index');
        }
    }
}
