<?php


namespace App\Helpers\UserSideBar;

use App\Models\User;

class UserSideBarHelper
{

    private $status;
    private $user;
    private $bgColor;
    private $performance;


    public  $info = [];

    private function __construct(User $user)
    {
        $this->user = $user;
    }

    public static function make(User $user): self
    {
        return new UserSideBarHelper($user);
    }

    public function logic(): array
    {
        if ($this->user->userBasicInfo->profile_basic_status == 1) {
            $this->status++;
        }
        if ($this->user->userBasicInfo->profile_religion_status == 1) {
            $this->status++;
        }
        if ($this->user->userBasicInfo->profile_location_status == 1) {
            $this->status++;
        }
        if ($this->user->userBasicInfo->profile_pro_info_status == 1) {
            $this->status++;
        }
        if ($this->user->userBasicInfo->profile_fam_info_status == 1) {
            $this->status++;
        }
        if ($this->user->userBasicInfo->profile_jakt_info_status == 1) {
            $this->status++;
        }
        if ($this->user->userBasicInfo->profile_pref_info_status == 1) {
            $this->status++;
        }


        if ($this->status > 0) {
            $this->performance = ceil((100 / 7) * ($this->status));
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

        $this->info[] = $this->performance;
        $this->info[] = $this->bgColor;
        return $this->info;
    }
}
