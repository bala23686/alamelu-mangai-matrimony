<?php

namespace App\Http\Controllers\Admin\Masters\PackageMaster;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Masters\PackageMasterRequest\PackageMasterRequest;
use App\Models\Master\PackageMaster\PackageMaster;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class PackageMasterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $packagelist = Cache::rememberForever('packagelist', function () {

            return PackageMaster::where('package_status', 1)->get();
        });

        return view('Admin.pages.Masters.PackageMaster.index', ['packagelist' => $packagelist]);
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
    public function store(PackageMasterRequest $request)
    {

        if (PackageMaster::create($request->validated())) {
            toast('Package Added Successfully', 'success');
            return redirect()->route('admin.package.index');
        }
        toast('Something went Wrong', 'error');
        return redirect()->route('admin.package.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return response(json_encode(PackageMaster::find($id)));
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
    public function update(PackageMasterRequest $request, $id)
    {
        if (PackageMaster::find($id)->update($request->validated())) {
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

            if (PackageMaster::destroy($id)) {
                toast('Package Deleted Successfully', 'success');
                return redirect()->route('admin.package.index');
            }
            toast('Something went Wrong', 'error');
            return redirect()->route('admin.package.index');
        } catch (QueryException $th) {

            toast('Cannot Delete Package Already in Use', 'error');
            return redirect()->route('admin.package.index');
        }
    }
}
