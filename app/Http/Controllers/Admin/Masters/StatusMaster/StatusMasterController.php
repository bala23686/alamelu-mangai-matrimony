<?php

namespace App\Http\Controllers\Admin\Masters\StatusMaster;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Masters\StatusMasterRequest\StatusMasterRequest;
use App\Models\Master\StatusMaster\StatusMaster;
use App\Traits\Controllers\Admin\Masters\StatusMaster\StatusMasterMethods;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class StatusMasterController extends Controller
{

    use StatusMasterMethods;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $statusList = Cache::rememberForever('statusList', function () {

            return StatusMaster::where('status_status', 1)->get();
        });

        return view('Admin.pages.Masters.StatusMaster.index', ['statusList' => $statusList]);
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
    public function store(StatusMasterRequest $request)
    {
        if (StatusMaster::create($request->validated())) {
            toast('Status Added Successfully', 'success');
            return redirect()->route('admin.status.index');
        }
        toast('Something went Wrong', 'error');
        return redirect()->route('admin.status.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return response(json_encode(StatusMaster::find($id)));
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
    public function update(StatusMasterRequest $request, $id)
    {
        if (StatusMaster::find($id)->update($request->validated())) {
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

            if (StatusMaster::destroy($id)) {
                toast('Status Deleted Successfully', 'success');
                return redirect()->route('admin.status.index');
            }
            toast('Something went Wrong', 'error');
            return redirect()->route('admin.status.index');
        } catch (QueryException $th) {

            toast('Cannot Delete Status Already in Use', 'error');
            return redirect()->route('admin.status.index');
        }
    }
}
