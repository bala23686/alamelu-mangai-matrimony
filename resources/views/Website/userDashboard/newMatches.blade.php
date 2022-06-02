@extends('Website.layouts.default')

@section('content')
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <style>
        body {
            margin-top: 20px;
            background: #f3f3f3;
        }

        .card.user-card {
            border-top: none;
            -webkit-box-shadow: 0 0 1px 2px rgba(0, 0, 0, 0.05), 0 -2px 1px -2px rgba(0, 0, 0, 0.04), 0 0 0 -1px rgba(0, 0, 0, 0.05);
            box-shadow: 0 0 1px 2px rgba(0, 0, 0, 0.05), 0 -2px 1px -2px rgba(0, 0, 0, 0.04), 0 0 0 -1px rgba(0, 0, 0, 0.05);
            -webkit-transition: all 150ms linear;
            transition: all 150ms linear;
        }

        .card {
            border-radius: 5px;
            -webkit-box-shadow: 0 1px 2.94px 0.06px rgba(4, 26, 55, 0.16);
            box-shadow: 0 1px 2.94px 0.06px rgba(4, 26, 55, 0.16);
            border: none;
            margin-bottom: 30px;
            -webkit-transition: all 0.3s ease-in-out;
            transition: all 0.3s ease-in-out;
        }

        .card .card-header {
            background-color: transparent;
            border-bottom: none;
            padding: 25px;
        }

        .card .card-header h5 {
            margin-bottom: 0;
            color: #222;
            font-size: 14px;
            font-weight: 600;
            display: inline-block;
            margin-right: 10px;
            line-height: 1.4;
        }

        .card .card-header+.card-block,
        .card .card-header+.card-block-big {
            padding-top: 0;
        }

        .user-card .card-block {
            text-align: center;
        }

        .card .card-block {
            padding: 25px;
        }

        .user-card .card-block .user-image {
            position: relative;
            margin: 0 auto;
            display: inline-block;
            padding: 5px;
            width: 110px;
            height: 110px;
        }

        .user-card .card-block .user-image img {
            z-index: 20;
            position: absolute;
            top: 5px;
            left: 5px;
            width: 100px;
            height: 100px;
        }

        .img-radius {
            border-radius: 50%;
        }

        .f-w-600 {
            font-weight: 600;
        }

        .m-b-10 {
            margin-bottom: 10px;
        }

        .m-t-25 {
            margin-top: 25px;
        }

        .m-t-15 {
            margin-top: 15px;
        }

        .card .card-block p {
            line-height: 1.4;
        }

        .text-muted {
            color: #919aa3 !important;
        }

        .user-card .card-block .activity-leval li.active {
            background-color: #2ed8b6;
        }

        .user-card .card-block .activity-leval li {
            display: inline-block;
            width: 15%;
            height: 4px;
            margin: 0 3px;
            background-color: #ccc;
        }

        .user-card .card-block .counter-block {
            color: #fff;
        }

        .bg-c-blue {
            background: linear-gradient(45deg, #4099ff, #73b4ff);
        }

        .bg-c-green {
            background: linear-gradient(45deg, #2ed8b6, #59e0c5);
        }

        .bg-c-yellow {
            background: linear-gradient(45deg, #FFB64D, #ffcb80);
        }

        .bg-c-pink {
            background: linear-gradient(45deg, #FF5370, #ff869a);
        }

        .m-t-10 {
            margin-top: 10px;
        }

        .p-20 {
            padding: 20px;
        }

        .user-card .card-block .user-social-link i {
            font-size: 30px;
        }

        .text-facebook {
            color: #3B5997;
        }

        .text-twitter {
            color: #42C0FB;
        }

        .text-dribbble {
            color: #EC4A89;
        }

        .user-card .card-block .user-image:before {
            bottom: 0;
            border-bottom-left-radius: 50px;
            border-bottom-right-radius: 50px;
        }

        .user-card .card-block .user-image:after,
        .user-card .card-block .user-image:before {
            content: "";
            width: 100%;
            height: 48%;
            border: 2px solid #4099ff;
            position: absolute;
            left: 0;
            z-index: 10;
        }

        .user-card .card-block .user-image:after {
            top: 0;
            border-top-left-radius: 50px;
            border-top-right-radius: 50px;
        }

        .user-card .card-block .user-image:after,
        .user-card .card-block .user-image:before {
            content: "";
            width: 100%;
            height: 48%;
            border: 2px solid #4099ff;
            position: absolute;
            left: 0;
            z-index: 10;
        }

        .col:hover i {

            transform: scale(1.3);

        }

    </style>
    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-12">
                    <ul class="breadcrumb-nav">
                        <li><a href="{{ route('user.dashboard') }}">Home</a></li>
                        <li>New Matches</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <section class="dashboard pt-3">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-4 col-12">
                    @php
                        $user = App\Models\User::find(auth()->user()->id)->load('userBasicInfo');
                        [$performance, $bgColor] = App\Helpers\UserSideBar\UserSideBarHelper::make($user)->logic();
                    @endphp
                    <x-user-dashboard.side-bar :user="$user" :status="0" :performance="$performance" :bgColor="$bgColor" />
                </div>

                <div class="col-lg-9 col-md-8 col-12">
                    <div class="main-content">
                        <div class="dashboard-block mt-0 profile-settings-block mb-3">
                            <h3 class="text-center fw-light mt-3 mb-4">New Matches</h3>
                        </div>
                        <div>
                            <div class="row g-3 mt-1">
                                @forelse ($profiles as $profile)
                                    @php
                                        $match_count = 0;
                                        if ($user_has_preference) {
                                            if ($profile->userBasicInfos->age >= $current_user_preference->partner_age_from && $profile->userBasicInfos->age <= $current_user_preference->partner_age_to) {
                                                $match_count++;
                                            }
                                            if ($profile->userBasicInfos->user_height_id >= $current_user_preference->partner_height_from || $profile->userBasicInfos->user_height_id <= $current_user_preference->partner_height_to) {
                                                $match_count++;
                                            }
                                            if ($profile->userBasicInfos->martial_id == $current_user_preference->partner_martial_status) {
                                                $match_count++;
                                            }
                                            if (array_key_exists($profile->userBasicInfos->user_complexion_id, $current_user_preference->partner_complexion->pluck('id'))) {
                                                $match_count++;
                                            }
                                            if (array_key_exists($profile->userBasicInfos->user_mother_tongue, $current_user_preference->partner_mother_tongue->pluck('id'))) {
                                                $match_count++;
                                            }
                                            if (array_key_exists($profile->UserProfessionInfo->user_job_id, $current_user_preference->partner_job->pluck('id'))) {
                                                $match_count++;
                                            }
                                            if (substr_compare($profile->UserProfessionInfo->getRawOriginal('user_education_id'), $current_user_preference->getRawOriginal('partner_education'), 0) == 0) {
                                                $match_count++;
                                            }
                                            if (array_key_exists($profile->UserProfessionInfo->user_job_country, $current_user_preference->partner_job_country->pluck('id'))) {
                                                $match_count++;
                                            }
                                            if ($profile->UserProfessionInfo->user_annual_income >= $current_user_preference->partner_salary && $profile->UserProfessionInfo->user_annual_income <= $current_user_preference->partner_salary) {
                                                $match_count++;
                                            }
                                            if (array_key_exists($profile->userReligeonInfo->user_rasi_id, $current_user_preference->partner_rasi->pluck('id'))) {
                                                $match_count++;
                                            }
                                            if (array_key_exists($profile->userNativeInfo->user_country_id, $current_user_preference->partner_country->pluck('id'))) {
                                                $match_count++;
                                            }
                                        }
                                    @endphp
                                    <div class="col-4">
                                        <div class="card h-100 shadow">
                                            <div class="text-center mt-2">
                                                <img src="{{ $profile->userBasicInfos->imageWithPath ? $profile->userBasicInfos->imageWithPath : '' }}"
                                                    class="img-fluid rounded w-50 text-center">
                                                <img src="{{ asset('assets/Website/male.png') }}"
                                                    class="img-fluid rounded w-50 text-center">
                                            </div>
                                            <div class="col-md-12 col-sm-12  px-1 xs-pad0 text-left">
                                                <div class="row mt-2">
                                                    <div class="col-md-12 d-flex justify-content-center">
                                                        <div class="bg-success text-white h4">
                                                            {{ $match_count }} / 11
                                                        </div>
                                                    </div>
                                                </div>
                                                <div
                                                    class="d-flex justify-content-center pt-0 font-weight-bold lato-bold fs-15 cursor-pointer outline-none color-initial xs-pad0">
                                                    <a class="color-inherit text-decoration-none col-md-12 pl-0 lh-23 xs-basic-view-lh"
                                                        target="_blank"
                                                        href='{{ route('viewprofile.show', $profile->id) }}'>
                                                        <div class="col-md-12 col-sm-12 col-12 fw-black">
                                                            <h5>{{ $profile->userBasicInfos->user_full_name }}</h5>
                                                            <span>{{ $profile->userBasicInfos->age }} yrs,
                                                                {{ $profile->userBasicInfos->Height->height_feet_cm }},</span><span>
                                                                Tamil,</span>
                                                        </div>
                                                        <div class="col-md-12 col-sm-12 col-12 fw-black"><span>
                                                                {{ $profile->userReligeonInfo->Caste->caste_name }},</span>
                                                        </div>

                                                        @if ($profile->userProfessinalInfos)
                                                            <div class="col-md-12 col-sm-12 col-12 fw-black"><span>
                                                                    @foreach ($profile->userProfessinalInfos->user_education_id as $education)
                                                                        {{ $education->education_name }},
                                                                </span>
                                                        @endforeach
                                                        <span>,</span><span>
                                                            {{ $profile->userProfessinalInfos->user_job_details }}</span><span>,</span>
                                                        @if ($profile->userNativeInfo)
                                                            <span>
                                                                {{ $profile->userNativeInfo->userCity->city_name }},
                                                            </span><span>
                                                                {{ $profile->userNativeInfo->userState->state_name }}</span>
                                                        @endif
                                                </div>
                                                <div class="col-md-12 col-sm-12 col-12 fw-black"></div>
                                @endif

                                </a>

                            </div>
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-12 mt-2 fw-black xs-mt0 d-flex justify-content-center">
                                    <a href="{{ route('viewprofile.show', $profile->id) }}" target="_blank"><span
                                            class="btn btn-primary xs-fs-12">View
                                            Full Profile</span></a>

                                </div>
                            </div>
                        @empty
                            <div class="row mt-5">
                                <div class="card p-5">
                                    <h4 class="text-center">No Matches Found</h4>
                                </div>
                            </div>
                            @endforelse
                        </div>
                        @if (!empty($profiles))
                            <div class="row mt-4 mb-4">
                                <div class="col-md-12">
                                    {{ $profiles->links('Website.layouts.panigation') }}
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        // Shortlist
        function do_shortlist(id) {
            $("#shortlist_a_id_" + id).removeAttr("onclick");
            $("#shortlist_id_" + id).html(" Shortlisting..");
            $.post('{{ route('user.add_to_shortlists') }}', {
                    _token: '{{ csrf_token() }}',
                    id: id
                },
                function(data) {
                    if (data == 1) {
                        $("#shortlist_id_" + id).html("Shortlisted");
                        $("#shortlist_id_" + id).attr("class", "d-block fs-10 opacity-60 text-primary");
                        $("#shortlist_a_id_" + id).attr("onclick", "remove_shortlist(" + id + ")");
                        toastr.success('Added To Your Shortlist');
                    } else {
                        $("#shortlist_id_" + id).html("Shortlist");
                        toastr.error('Something Went Wrong');
                    }
                }
            );
        }

        function remove_shortlist(id) {
            $("#shortlist_a_id_" + id).removeAttr("onclick");
            $("#shortlist_id_" + id).html(" Removing..");
            $.post('{{ route('user.remove_from_shortlists') }}', {
                    _token: '{{ csrf_token() }}',
                    id: id
                },
                function(data) {
                    if (data == 1) {
                        $("#shortlist_id_" + id).html("{{ 'Shortlist' }}");
                        $("#shortlist_id_" + id).attr("class", "d-block fs-10 opacity-60 text-dark");
                        $("#shortlist_a_id_" + id).attr("onclick", "do_shortlist(" + id + ")");
                        toastr.success('You Have Removed This User From Shortlist');
                    } else {
                        toastr.error('Something Went');
                    }
                }
            );
        }
    </script>
@stop
