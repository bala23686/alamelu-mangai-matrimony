<?php

namespace App\Http\Controllers\Website\Profile\HoroscopeDetails;

use App\Http\Controllers\Controller;
use App\Http\Requests\UsersRequest\UserHoroscopeJathakamImageRequest;
use App\Services\Website\DashboardServices\ProfileServices\HoroscopeDetailsUpdateServices;
use Illuminate\Http\Request;

class HoroscopeDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function userRasiKatamUpdate(Request $request, HoroscopeDetailsUpdateServices $service, $id)
    {

        return  $service->updateRasiKatamDetails($request, $id)
            ? response()->json(['message' => 'Rasi Katam Updated'], 201)
            : response()->json(['message' => ''], 500);
    }


    public function userRasiNavamsamUpdate(Request $request, HoroscopeDetailsUpdateServices $service, $id)
    {
        return  $service->updateNavamsamKatamDetails($request, $id)
            ? response()->json(['message' => 'Navamsam Katam Updated'], 201)
            : response()->json(['message' => ''], 500);
    }

    public function updateHoroscopeImage(UserHoroscopeJathakamImageRequest $request, HoroscopeDetailsUpdateServices $service, $id)
    {
        return  $service->updateJathakamImage($request, $id)
            ? response()->json(['message' => 'Jathaka Katam Image Uploaded'], 201)
            : response()->json(['message' => ''], 500);
    }
}
