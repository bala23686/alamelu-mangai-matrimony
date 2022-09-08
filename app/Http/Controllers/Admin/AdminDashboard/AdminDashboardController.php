<?php

namespace App\Http\Controllers\Admin\AdminDashboard;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Date;

class AdminDashboardController extends Controller
{

    public function index()
    {

        $totalUsers = User::where('is_admin', 0)->get()->count();
        $newUsers = User::where('is_admin', 0)->whereDate('created_at', Date::today())->count();
        $activeUsers = User::where('profile_status_id', 1)->count();
        $verifiedUsers = User::where('is_verified', 1)->count();

        //to calculate Total Disk Space
        // $total_disk = disk_total_space('/');
        // $total_disk_size = $total_disk / 1073741824;

        // $free_disk = disk_free_space('/');
        // $used_disk = $total_disk - $free_disk;

        // $disk_used_size = $used_disk / 1073741824;
        // $use_disk = round(100 - (($disk_used_size / $total_disk_size) * 100));

        // $diskuse = round(100 - ($use_disk));

        //to calculate Total Cpu Usage
        // $cpu_loaded = sys_getloadavg();
        // $load_width = $cpu_loaded[0];
        // $load = $cpu_loaded[0];

        return view('Admin.Dashboard.index', compact(
            'totalUsers',
            'newUsers',
            'activeUsers',
            'verifiedUsers',
            // 'diskuse',
            // 'load'
        ));
    }
}
