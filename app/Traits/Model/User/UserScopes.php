<?php

namespace App\Traits\Model\User;


trait UserScopes
{


    /**
     * Scope a query to only filter by User Status users.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeUserVerified($query)
    {
        return $query->where('users.is_verified', 1)
        ->where('is_admin',0);
    }


    /**
     * Scope a query to only filter by User Status users.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeUserStatus($query, $request)
    {
        return $query->where('users.profile_status_id', $request->userStatus);
    }

    /**
     * Scope a query to only filter by User Status users.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeUserPackage($query, $request)
    {
        return $query->whereRelation('userPackageInfo','user_package_id','=',$request->package);
    }

     /**
     * Scope a query to join userTables users.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeJoinUsers($query)
    {
        // return $query->join('user_basic_info_masters', 'users.id', '=', 'user_basic_info_masters.user_id')
        // ->join('user_native_info_masters', 'users.id', '=', 'user_native_info_masters.user_id')
        // ->join('user_package_info_masters', 'users.id', '=', 'user_package_info_masters.user_id')
        // ->join('user_religious_info_masters', 'users.id', '=', 'user_religious_info_masters.user_id');
    //    return  $query->join('user_native_info_masters', 'users.id', '=', 'user_native_info_masters.user_id')
    //     ->join('user_package_info_masters', 'users.id', '=', 'user_package_info_masters.user_id')
    //     ->join('user_religious_info_masters', 'users.id', '=', 'user_religious_info_masters.user_id');
    }


     /**
     * Scope a query to filter user Caste.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeCasteFilter($query,$caste)
    {
        return $query->whereRelation('userReligeonInfo','user_caste_id','=', $caste);
    }

     /**
     * Scope a query to filter user location.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeLocationFilter($query,$request)
    {
        return $query->whereRelation('userNativeInfo','user_city_id','=', $request->location);
    }


     /**
     * Scope a query to filter user location.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeGenderFilter($query,$genderId)
    {
        return $query->whereRelation('userBasicInfo','gender_id', '=',$genderId);
    }


    /**
     * Scope a query to filter user location.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeMartialFilter($query,$request)
    {
        return $query->whereRelation('userBasicInfo','martial_id', '=',$request->home_search_marital);
        // return $query->whereRelation('userBasicInfo','martial_id', '=',$request->mstatus);
    }

    /**
     * Scope a query to filter user with a Status filter active.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeSearchWithUserStatus($query,$request)
    {
        return $query->whereRaw("users.username LIKE '%" . $request->searchQuery . "%'")
        ->where('users.profile_status_id', $request->userStatus)
        ->orWhereRaw("email LIKE '%" .  $request->searchQuery . "%'")
        ->where('users.profile_status_id', $request->userStatus)
        ->orWhereRaw("users.id LIKE '%" .  $request->searchQuery . "%'")
        ->where('users.profile_status_id', $request->userStatus)
        ->orWhereRaw("users.user_profile_id LIKE '%" .  $request->searchQuery . "%'")
        ->where('users.profile_status_id', $request->userStatus)
        ->orWhereRaw("phonenumber  LIKE '%" .  $request->searchQuery . "%'")
        ->where('users.profile_status_id', $request->userStatus);
    }


    /**
     * Scope a query to filter user with a Status filter active.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeSearchWithOutUserStatus($query,$request)
    {
        return $query->whereRaw("users.username LIKE '%" . $request->searchQuery . "%'")
        ->where('is_admin', 0)

        ->orWhereRaw("users.email LIKE '%" .  $request->searchQuery . "%'")
        ->where('is_admin', 0)

        ->orWhereRaw("users.id LIKE '%" .  $request->searchQuery . "%'")
        ->where('is_admin', 0)
        ->orWhereRaw("users.id LIKE '%" .  $request->searchQuery . "%'")
        ->where('is_admin', 0)
        ->orWhereRaw("users.user_profile_id  LIKE '%" .  $request->searchQuery . "%'")
        ->where('is_admin', 0);
    }

}
