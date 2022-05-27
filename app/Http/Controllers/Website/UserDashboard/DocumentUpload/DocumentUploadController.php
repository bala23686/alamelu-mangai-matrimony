<?php

namespace App\Http\Controllers\Website\UserDashBoard\DocumentUpload;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Website\DashboardServices\ProfileServices\BasicDetailsUpdateServices;
use App\Helpers\File\ImageUploadHelper\ImageUploadHelper;
use App\Models\Master\UserBasicInfoMaster\UserBasicInfoMaster;

class DocumentUploadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Website.userDashboard.documentUpload')->with('user', auth()->user());
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
    public function uploadMedicalCertificate(Request $request, BasicDetailsUpdateServices $service, $id)
    {
        $this->validate($request, [
            'medical_certificate' => ['required']
        ]);



        $medical_certificate = ImageUploadHelper::storeImage($request->medical_certificate, UserBasicInfoMaster::USER_MEDICAL_CERIFICATE_IMAGE_PATH);

        return $service->handleMedicalCertificateUpload($medical_certificate, $id)
            ? response()->json(['message' => 'User Medical Certificate Uploaded'], 201)
            : response()->json(['message' => ''], 500);
    }


    public function uploadTenthCertificate(Request $request, BasicDetailsUpdateServices $service, $id)
    {
        $this->validate($request, [
            'tenth_certificate' => ['required']
        ]);

        $tenth_certificate = ImageUploadHelper::storeImage($request->tenth_certificate, UserBasicInfoMaster::USER_TENTH_CERIFICATE_IMAGE_PATH);

        return $service->handleTenthCertificateUpload($tenth_certificate, $id)
            ? response()->json(['message' => 'User Tenth Certificate Uploaded'], 201)
            : response()->json(['message' => ''], 500);
    }


    public function uploadTwelthCertificate(Request $request, BasicDetailsUpdateServices $service, $id)
    {
        $this->validate($request, [
            'twelth_certificate' => ['required']
        ]);

        $twelth_certificate = ImageUploadHelper::storeImage($request->twelth_certificate, UserBasicInfoMaster::USER_TWELTH_CERIFICATE_IMAGE_PATH);

        return $service->handleTwelthCertificateUpload($twelth_certificate, $id)
            ? response()->json(['message' => 'User Twelth Certificate Uploaded'], 201)
            : response()->json(['message' => ''], 500);
    }


    public function uploadCollegeTc(Request $request, BasicDetailsUpdateServices $service, $id)
    {
        $this->validate($request, [
            'clg_tc' => ['required']
        ]);

        $clg_tc = ImageUploadHelper::storeImage($request->clg_tc, UserBasicInfoMaster::USER_CLG_TC_IMAGE_PATH);

        return $service->handleClgTcUpload($clg_tc, $id)
            ? response()->json(['message' => 'User College Tc Uploaded'], 201)
            : response()->json(['message' => ''], 500);
    }
}
