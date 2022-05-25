<?php

namespace App\Http\Controllers\Website\Search;

use App\Http\Controllers\Controller;
use App\Models\Master\CasteMaster\CasteMaster;
use App\Models\Master\CityMaster\CityMaster;
use App\Models\Master\CountryMaster\CountryMaster;
use App\Models\Master\EducationMaster\EducationMaster;
use App\Models\Master\GenderMaster\GenderMaster;
use App\Models\Master\HeightMaster\HeightMaster;
use App\Models\Master\JobMaster\JobMaster;
use App\Models\Master\LanguageMaster\LanguageMaster;
use App\Models\Master\RasiMaster\RasiMaster;
use App\Models\Master\ReligionMaster\ReligionMaster;
use App\Models\Master\StarMaster\StarMaster;
use App\Models\Master\StateMaster\StateMaster;
use App\Models\Master\UserBasicInfoMaster\UserBasicInfoMaster;
use App\Models\SubMaster\EatingHabitSubMaster\EatingHabitSubMaster;
use App\Models\SubMaster\MartialStatusSubMaster\MartialStatusSubMaster;
use App\Models\User;
use App\Services\Website\SearchServices\AdvancedSearchService;
use App\Services\Website\SearchServices\BasicSearchService;
use App\Services\Website\SearchServices\ProfileIdFindService;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use PHPUnit\Framework\Constraint\IsEmpty;
use SebastianBergmann\Environment\Console;

use function PHPUnit\Framework\isEmpty;

class SearchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $search_page_data = [
            'gender' => GenderMaster::all(),
            'religion' => ReligionMaster::all(),
            'marital_status' => MartialStatusSubMaster::all(),
            'height' => HeightMaster::all(),
            'mother_tongue' => LanguageMaster::all(),
            'education' => EducationMaster::all(),
            'job' => JobMaster::all(),
            'eating_habits' => EatingHabitSubMaster::all(),
            'city' => CityMaster::all(),
            'state' => StateMaster::all(),
            'country' => CountryMaster::all(),
            'rasi' => RasiMaster::all(),
        ];
        return view('Website.search', $search_page_data);
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
        //
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

    /**
     * Search By The User Options.
     *
     * @param  \Illuminate\Http\Request  $request
     */

    public function profile_id_search(Request $request)
    {
        $profile_id_find_service = new ProfileIdFindService();
        $profile_data = $profile_id_find_service->ProfileIdSearch($request);
        return $profile_data ? response()->json(['data' => $profile_data, 'status' => 200]) : response()->json(['status' => 500]);
    }

    public function basic_search(Request $request)
    {
        $basic_search_service = new BasicSearchService();
        $basic_data = $basic_search_service->BasicSearch($request);

        if ($basic_data) {
            toastr()->success('Users Found');
            return  Redirect::route('search.results')->with('data', $basic_data);
        } else {
            toastr()->error('Users Not Found');
            return Redirect::route('Search')->with(['error' => 'No Matches Found !']);
        }
    }

    public function advanced_search(Request $request)
    {
        $advanced_search_service = new AdvancedSearchService();
        $advanced_data = $advanced_search_service->AdvancedSearch($request);

        if ($advanced_data) {
            toastr()->success('Users Found');
            return  Redirect::route('search.results')->with('data', $advanced_data);
        } else {
            toastr()->error('Users Not Found');
            return Redirect::route('Search')->with(['error' => 'No Matches Found !']);
        }
    }
}
