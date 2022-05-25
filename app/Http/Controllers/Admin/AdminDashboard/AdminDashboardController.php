<?php

namespace App\Http\Controllers\Admin\AdminDashboard;

use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;

class AdminDashboardController extends Controller
{

    public function index()
    {

        $totalUsers=User::all()->count();
        $newUsers=User::whereDate('created_at',Date::today())->count();
        $activeUsers=User::where('profile_status_id',1)->count();
        $verifiedUsers=User::where('is_verified',1)->count();

        return view('Admin.Dashboard.index',compact(
            'totalUsers',
        'newUsers',
        'activeUsers',
        'verifiedUsers'));
    }
}
