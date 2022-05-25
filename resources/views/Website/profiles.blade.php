@extends('Website.layouts.default')
@section('content')

    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-12">
                    <ul class="breadcrumb-nav">
                        <li><a href="{{ route('user.dashboard') }}">Home</a></li>
                        <li>Profiles</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <section class="">
        <div class="container mt-2">
            <div class="row mt-3">
                <div class="col-md-6 offset-md-5">
                    {{ $profiles->links('Website.layouts.panigation') }}
                </div>
            </div>

            <div class="row row-cols-1 row-cols-md-5 g-4 mt-2">
                @foreach ($profiles as $profile)
                    @php
                        $image_src = $profile->userBasicInfos->gender_id == 1 ? asset('assets/Website/male.png') : asset('assets/Website/female.png');
                    @endphp
                    <div class="col">
                        <div class="card h-100 shadow">
                            <div class="text-center mt-2">
                                <img src="{{ $profile->user_profile_image ? $profile->image_with_path : $image_src }}"
                                    class="img-fluid rounded w-50 text-center">
                            </div>
                            <div class="card-body">
                                <h5 class="card-title fw-normal text-primary text-center">{{ $profile->user_profile_id }}
                                </h5>
                                <div style="padding-left: 10%;">
                                    <span class="card-text"><b>Name :</b>
                                        {{ $profile->userBasicInfos->user_full_name }}</span><br>
                                    <span class="card-text"><b>Age :</b> {{ $profile->userBasicInfos->age }}
                                        yrs</span><br>
                                    <span class="card-text"><b>Gender :</b>
                                        {{ $profile->userBasicInfos->Gender->gender_name }}
                                    </span><br>

                                    <span class="card-text"><b>Status :</b>
                                        {{ $profile->userBasicInfos->MartialStatus->martial_status_name }}
                                    </span><br>
                                </div>
                                <div class="text-center mt-3">
                                    <a class="btn btn-primary" href="{{ route('viewprofile.show', $profile->id) }}"
                                        target="_blank"><span>View Profile</span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="row mt-5 mb-3">
                <div class="col-md-6 offset-md-5">
                    {{ $profiles->links('Website.layouts.panigation') }}
                </div>
            </div>
    </section>

@stop

{{-- @if ($profile->userProfessinalInfos)
                                    <div class=""><span>
                                            @foreach ($profile->userProfessinalInfos->user_education_id as $education)
                                                {{ $education->education_name }},
                                        </span>
                                @endforeach
                @endif --}}
