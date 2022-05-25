<?php

namespace App\View\Components\userDashboard;

use App\Models\Master\UserBasicInfoMaster\UserBasicInfoMaster;
use App\Models\Master\UserShortListInfoMaster\UserShortListInfoMaster;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;

class sideBar extends Component
{


    public $user;
    public $performance;
    public $bgColor;
    public $user_image_with_path;
    public $user_info;

    protected $listeners = ['Update'];
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->user = Auth()->user();
        $this->logic();
    }



    /**
     * own implementaion for side bar data
     */
    private function logic(): void
    {
        $userId = Auth::user()->id;

        $basicInfo = UserBasicInfoMaster::where('user_id', $userId)->first();
        $this->user_image_with_path = UserBasicInfoMaster::where('user_id', $userId)->first()->imageWithPath;
        $this->user_info = $basicInfo;

        $status = 0;

        if ($basicInfo->profile_basic_status == 1) {
            $status++;
        }
        if ($basicInfo->profile_religion_status == 1) {
            $status++;
        }
        if ($basicInfo->profile_location_status == 1) {
            $status++;
        }
        if ($basicInfo->profile_pro_info_status == 1) {
            $status++;
        }
        if ($basicInfo->profile_fam_info_status == 1) {
            $status++;
        }
        if ($basicInfo->profile_jakt_info_status == 1) {
            $status++;
        }
        if ($basicInfo->profile_pref_info_status == 1) {
            $status++;
        }


        if ($status > 0) {
            $this->performance = ceil((100 / 7) * ($status));
            if ($this->performance < 20) {
                $this->bgColor = 'danger';
            } elseif ($this->performance > 20 && $this->performance < 40) {
                $this->bgColor = 'warning';
            } elseif ($this->performance > 40 && $this->performance < 60) {
                $this->bgColor = 'primary';
            } elseif ($this->performance > 60 && $this->performance < 80) {
                $this->bgColor = 'info';
            } elseif ($this->performance > 80) {
                $this->bgColor = 'success';
            } else {
                $this->bgColor = 'secondary';
            }
        }
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.user-dashboard.side-bar');
    }
}
