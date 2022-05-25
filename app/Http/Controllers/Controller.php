<?php

namespace App\Http\Controllers;

use App\Helpers\Model\ProductSetting\CompanySettingHelper;
use App\Helpers\Model\ProductSetting\PackageSettingHelper;
use App\Helpers\Model\ProductSetting\PrivacySettingHelper;
use App\Models\Master\UserBasicInfoMaster\UserBasicInfoMaster;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    public function __construct()
    {
    }
}
