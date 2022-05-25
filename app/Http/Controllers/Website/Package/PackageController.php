<?php

namespace App\Http\Controllers\Website\Package;

use App\Helpers\Model\ProductSetting\PackageSettingHelper;
use App\Http\Controllers\Controller;
use App\Models\Master\PackageMaster\PackageMaster;
use App\Models\Master\UserPackageInfoMaster\UserPackageInfoMaster;
use App\Models\User;
use App\Models\UserTransaction\UserTransaction;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Actions\Package\PackageAction;
use Auth;
use App\Actions\Payment\PaymentAction;

class PackageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $packages = ['packageInfo' => PackageMaster::all()];

        // dump($packages);
        return view('Website.packages', $packages);
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
        if (auth()->user()->id == $id) {
            $data = [
                'packages' => PackageMaster::all()
            ];
            return view('Website.userDashboard.package', $data)->with('user', auth()->user());
        } else {
            toast('error', 'something went wrong');
            return back();
        }
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

    public function update_packages(Request $request, $id)
    {
    }
}
