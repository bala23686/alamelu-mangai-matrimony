<?php

namespace App\View\Components\userDashboard;

use App\Models\Master\UserBasicInfoMaster\UserBasicInfoMaster;
use App\Models\Master\UserShortListInfoMaster\UserShortListInfoMaster;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;

class sideBar extends Component
{


    public $user;
    public $performance;
    public $bgColor;
    public $status;





    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(User $user,$status,$performance,$bgColor)
    {
        $this->user = $user;
        $this->status = $status;
        $this->performance = $performance;
        $this->bgColor = $bgColor;


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
