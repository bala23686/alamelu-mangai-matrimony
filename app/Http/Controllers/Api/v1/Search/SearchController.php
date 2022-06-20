<?php

namespace App\Http\Controllers\Api\v1\Search;

use App\Http\Controllers\Controller;
use App\Http\Resources\User\UserResource;
use App\Http\Resources\Users\UserBasicInfo\UserBasicInfoResource;
use App\Services\Website\SearchServices\AdvancedSearchService;
use App\Services\Website\SearchServices\BasicSearchService;
use App\Services\Website\SearchServices\ProfileIdFindService;
use Illuminate\Http\Request;

class SearchController extends Controller
{


    public function searchById(Request $request, ProfileIdFindService $service)
    {

        $searchInfo = $service->ProfileIdSearch($request);
        if ($searchInfo) {
            return UserResource::make($searchInfo);
        }

        return response()->json(['message' => 'no user found'], 404);
    }


    public function basicSearch(Request $request, BasicSearchService $service)
    {
        $basicSearchInfo = $service->BasicSearch($request);

        if ($basicSearchInfo) {
            return UserBasicInfoResource::collection($basicSearchInfo);
        }

        return response()->json(['message' => 'no users found'], 404);
    }


    public function advanceSearch(Request $request,AdvancedSearchService $service)
    {
        $advanceSerachInfo=$service->AdvancedSearch($request);

            if($advanceSerachInfo)
            {
                return UserBasicInfoResource::collection($advanceSerachInfo);
            }

            return response()->json(['message' => 'no users found'], 404);
    }
}
