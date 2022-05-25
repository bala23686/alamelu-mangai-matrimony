<?php

namespace App\Http\Controllers\Website\PartnerPreference\ReligiousPreference;

use App\Http\Controllers\Controller;
use App\Http\Requests\Website\Dashboard\PartnerPreferenceRequests\ReligiousPreferenceDetailsRequest;
use App\Services\Website\DashboardServices\PartnerPreferenceServices\ReligiousPreferenceUpdateServices;
use Illuminate\Http\Request;

class ReligiousPreferenceController extends Controller
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
    public function update(ReligiousPreferenceDetailsRequest $request, ReligiousPreferenceUpdateServices $service, $id)
    {
        return $service->HandleReligiousPreferenceUpdate($request, $id)
            ? response()->json(['message' => 'Partner Religious Preference updated'], 200)
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
