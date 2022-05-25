<?php

namespace App\Http\Controllers\Admin\Masters\JobMaster;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Masters\JobMasterRequest\JobMasterRequest;
use App\Models\Master\JobMaster\JobMaster;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class JobMasterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jobList = Cache::rememberForever('jobList', function () {

            return JobMaster::where('job_status', 1)->get();
        });

        return view('Admin.pages.Masters.JobMaster.index', ['jobList' => $jobList]);
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
    public function store(JobMasterRequest $request)
    {
        if (JobMaster::create($request->validated())) {
            toast('Job Added Successfully', 'success');
            return redirect()->route('admin.job.index');
        }
        toast('Something went Wrong', 'error');
        return redirect()->route('admin.job.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return response(json_encode(JobMaster::find($id)));
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
    public function update(JobMasterRequest $request, $id)
    {
        if (JobMaster::find($id)->update($request->validated())) {
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

            if (JobMaster::destroy($id)) {
                toast('Job Deleted Successfully', 'success');
                return redirect()->route('admin.job.index');
            }
            toast('Something went Wrong', 'error');
            return redirect()->route('admin.job.index');
        } catch (QueryException $th) {

            toast('Cannot Delete Langauge Already in Use', 'error');
            return redirect()->route('admin.job.index');
        }
    }
}
