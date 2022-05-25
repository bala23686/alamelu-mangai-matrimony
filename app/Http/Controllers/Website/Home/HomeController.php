<?php

namespace App\Http\Controllers\Website\Home;

use App\Helpers\Model\ProductSetting\CompanySettingHelper;
use App\Helpers\Model\ProductSetting\PackageSettingHelper;
use App\Helpers\Model\ProductSetting\PrivacySettingHelper;
use App\Http\Controllers\Controller;
use App\Models\Master\CasteMaster\CasteMaster;
use App\Models\Master\GenderMaster\GenderMaster;
use App\Models\Master\HeightMaster\HeightMaster;
use App\Models\Master\ReligionMaster\ReligionMaster;
use App\Models\Master\UserBasicInfoMaster\UserBasicInfoMaster;
use App\Models\SubMaster\MartialStatusSubMaster\MartialStatusSubMaster;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Symfony\Component\HttpKernel\Profiler\Profile;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gender_id = '';
        if (Auth()->check() && Auth()->user()->is_admin != 1) {
            $gender = UserBasicInfoMaster::select('gender_id')->where('user_id', Auth()->user()->id)->first();
            $gender_id = $gender->gender_id == 1 ? 2 : 1;
        };

        $home_page_data = [
            'gender' => GenderMaster::all(),
            'religion' => ReligionMaster::all(),
            'caste' => CasteMaster::all(),
            'marital_status' => MartialStatusSubMaster::all(),
            'height' => HeightMaster::all(),
        ];

        if ($gender_id != '') {
            $home_page_data['new_user_info'] = User::with('userBasicInfos')
                ->where(['is_verified' => 1, 'profile_status_id' => 1])
                ->whereRelation('userBasicInfos', ['gender_id' => $gender_id, 'martial_id' => 2])
                ->orderBy('id', 'DESC')
                ->get();
        } else {
            $home_page_data['new_user_info'] = User::with('userBasicInfos')
                ->where(['is_verified' => 1, 'profile_status_id' => 1])
                ->orderBy('id', 'DESC')
                ->get();
        }

        // dd($home_page_data['new_user_info']);

        return view('Website.index', $home_page_data);
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
}
