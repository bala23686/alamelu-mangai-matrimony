<?php

namespace App\Http\Controllers\Website\PartnerPreference\BasicPreference;

use App\Http\Controllers\Controller;
use App\Http\Requests\Website\Dashboard\PartnerPreferenceRequests\BasicPreferenceDetailsRequest;
use App\Services\Website\DashboardServices\PartnerPreferenceServices\BasicPartnerPreferenceUpdateServices;
use Illuminate\Http\Request;

class BasicPreferenceController extends Controller
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
    public function update(BasicPreferenceDetailsRequest $request, BasicPartnerPreferenceUpdateServices $service, $id)
    {
        return $service->HandleBasicPartnerPreferenceUpdate($request, $id)
            ? response()->json(['message' => 'Basic Partner Preference Details updated'], 200)
            : response()->json(['error' => 'Something went wrong'], 500);
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
}
