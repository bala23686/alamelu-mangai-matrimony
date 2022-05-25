<?php

namespace App\Http\Controllers\Admin\UserManagement;

use App\Helpers\Model\ProductSetting\CompanySettingHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UserManagement\UserUpdateRequest;
use App\Models\User;
use App\Traits\Controllers\Admin\UserManagement\UserManagementMethods;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class UserMasterController extends Controller
{

    use UserManagementMethods;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Admin.UserManagement.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.UserManagement.create');
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

        $userInfo =  User::find($id)
        ->load('status')
        ->load('userFamilyInfos')
        ->load('userBasicInfos')
        ->load('userProfessinalInfos')
        ->load('userNativeInfo')
        ->load('userReligeonInfo')
        ->load('userPreferrenceInfo')
        ->load('userPackageInfo')
        ->load('userHoroScopeInfo');

        return view('Admin.UserManagement.show',['singleUserInfo'=>$userInfo]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {



        $userInfo =  User::find($id)
                    ->load('userBasicInfos')
                    ->load('userPackageInfo');

        $company_info = CompanySettingHelper::all();




       return view('Admin.UserManagement.edit',['singleUserInfo'=>$userInfo,'companyInfo'=>$company_info]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserUpdateRequest $request, $id)
    {
        $user = User::find($id)->update($request->validated());

        return $user ? response()->json(['message' => 'Information Updated'], 201) :response()->json(['message' => ''], 500);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

      return User::destroy($id);

    }
}
