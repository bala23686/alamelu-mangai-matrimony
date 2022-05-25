<?php

namespace App\Http\Controllers\Admin\Masters\EducationMaster;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Masters\EducationMasterRequest\EducationMasterRequest;
use App\Models\Master\EducationMaster\EducationMaster;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class EducationMasterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $educationList = Cache::rememberForever('educationList', function () {

            return EducationMaster::where('education_status', 1)->get();
        });

        return view('Admin.pages.Masters.EducationMaster.index', ['educationList' => $educationList]);
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
    public function store(EducationMasterRequest $request)
    {
        if (EducationMaster::create($request->validated())) {
            toast('Education Added Successfully', 'success');
            return redirect()->route('admin.education.index');
        }
        toast('Something went Wrong', 'error');
        return redirect()->route('admin.education.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return response(json_encode(EducationMaster::find($id)));
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
    public function update(EducationMasterRequest $request, $id)
    {

        if (EducationMaster::find($id)->update($request->validated())) {
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

            if (EducationMaster::destroy($id)) {
                toast('Education Deleted Successfully', 'success');
                return redirect()->route('admin.education.index');
            }
            toast('Something went Wrong', 'error');
            return redirect()->route('admin.education.index');
        } catch (QueryException $th) {

            toast('Cannot Delete Education Already in Use', 'error');
            return redirect()->route('admin.education.index');
        }
    }
}
