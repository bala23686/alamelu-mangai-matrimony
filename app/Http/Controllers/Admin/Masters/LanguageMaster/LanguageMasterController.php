<?php

namespace App\Http\Controllers\Admin\Masters\LanguageMaster;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Masters\LanguageMasterRequest\LanguageMasterRequest;
use App\Models\Master\LanguageMaster\LanguageMaster;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class LanguageMasterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $languageList = Cache::rememberForever('languageList', function () {

            return LanguageMaster::where('language_status', 1)->get();
        });

        return view('Admin.pages.Masters.LanguageMaster.index', ['languageList' => $languageList]);
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
    public function store(LanguageMasterRequest $request)
    {
        if (LanguageMaster::create($request->validated())) {
            toast('Language Added Successfully', 'success');
            return redirect()->route('admin.language.index');
        }
        toast('Something went Wrong', 'error');
        return redirect()->route('admin.language.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return response(json_encode(LanguageMaster::find($id)));
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
    public function update(LanguageMasterRequest $request, $id)
    {
        if (LanguageMaster::find($id)->update($request->validated())) {
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

            if (LanguageMaster::destroy($id)) {
                toast('Language Deleted Successfully', 'success');
                return redirect()->route('admin.language.index');
            }
            toast('Something went Wrong', 'error');
            return redirect()->route('admin.language.index');
        } catch (QueryException $th) {

            toast('Cannot Delete Langauge Already in Use', 'error');
            return redirect()->route('admin.language.index');
        }
    }
}
