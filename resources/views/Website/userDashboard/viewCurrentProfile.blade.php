@extends('Website.Layouts.default')
<style>
    body {
        background: #EFCDA4;
    }

    .slider {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 500px;
        height: 60px;
        padding: 30px;
        padding-left: 40px;
        background: #fcfcfc;
        border-radius: 20px;
        display: flex;
        align-items: center;
        box-shadow: 0px 15px 40px #7E6D5766;
    }

    .slider p {
        font-size: 26px;
        font-weight: 600;
        font-family: Open Sans;
        padding-left: 30px;
        color: #7E6D57;
    }

    .slider input[type=”range”] {
        -webkit-appearance: none !important;
        width: 420px;
        height: 2px;
        background: #7E6D57;
        border: none;
        outline: none;
    }

    .slider input[type=”range”]::-webkit-slider-thumb {
        -webkit-appearance: none !important;
        width: 30px;
        height: 30px;
        background: #fcfcfc;
        border: 2px solid #7E6D57;
        border-radius: 50%;
        cursor: pointer;
    }

    .slider input[type=”range”]::-webkit-slider-thumb:hover {
        background: #7E6D57;
    }

    .ml-cust-3 {
        margin-left: 3rem;
    }

    ul li {
        font-weight: 500 !important;
        padding: 0.25rem;
    }

    .pl-cust-6 {
        padding-left: 6rem;
    }

</style>
@section('content')
    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-12">
                    <ul class="breadcrumb-nav">
                        <li><a href="{{ route('user.dashboard') }}">Home</a></li>
                        <li>Edit Profile</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <section class="dashboard mt-3">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-4 col-12">
                    <x-user-dashboard.side-bar />
                </div>
                <div class="col-lg-9">
                    <div class="item-details">
                        <div class="container">
                            <div class="top-area shadow">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="product-images">
                                            <main id="gallery">
                                                <div class="main-img">
                                                    <img class='rounded' id='profileImg'
                                                        @if ($userBasicInfo->image_with_path) src="{{ $userBasicInfo->image_with_path }}"
                                                                @else
                                                                    src="{{ asset('assets/Website/avatar.png') }}" @endif
                                                        alt="Preview">
                                                </div>
                                                <div class="images">
                                                    <img class='rounded'
                                                        @if ($user_image_with_path) src="{{ $user_image_with_path }}"
                                                                @else
                                                                    src="{{ asset('assets/Website/avatar.png') }}" @endif
                                                        alt="Preview">

                                                    @foreach ($user_photos as $photos)
                                                        <img src={{ $photos->image_full_path }} class="img rounded"
                                                            alt="#">
                                                    @endforeach
                                                </div>
                                            </main>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-12 col-12 mt-lg-4">
                                        <div class="product-info">
                                            <h1 class="lead fw-normal">{{ $userInfo->user_profile_id ?? 'TM#######' }}
                                            </h1>
                                            <h5 class="price pt-2"><span class="text-dark">I'm</span>
                                                {{ $userBasicInfo->user_full_name }}</h5>
                                            <hr>
                                            <div class="row">
                                                <div class="col-12">
                                                    <ul class="text">
                                                        <li class="location m-0 p-0"><i class="lni lni-user"></i>
                                                            I'm&nbsp;{{ $userBasicInfo->age }}
                                                            Yrs</li>

                                                        <li class="location m-0 p-0"><i class="lni lni-phone"></i>
                                                            {{ $userInfo->phonenumber }}
                                                        </li>
                                                        <li class="location m-0"><i class="lni lni-envelope"></i>
                                                            {{ $userInfo->email }}
                                                        </li>
                                                    </ul>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="item-details-blocks">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-12 mb-3">
                                        <div class="single-block shadow">
                                            <h3 class="float-start">More Information</h3>
                                            <div class="float-end">
                                                <div x-data='userShortList'>
                                                    <button id='getPdf' class="btn btn-warning btn-sm" target="_blank"><i
                                                            class="lni lni-download"></i>
                                                        Download PDF</button>
                                                </div>
                                            </div>

                                            <div class="accordion" id="accordionExample">
                                                <div class="accordion-item">
                                                    <h2 class="accordion-header" id="headingTwo">
                                                        <button class="accordion-button" type="button"
                                                            data-bs-toggle="collapse" data-bs-target="#collapseTwo"
                                                            aria-expanded="false" aria-controls="collapseTwo">
                                                            Basic Details <i class="lni lni-chevron-down"></i>
                                                        </button>
                                                    </h2>

                                                    <div id="collapseTwo" class="accordion-collapse"
                                                        aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                                        <div class="accordion-body">
                                                            <div class="p-3">
                                                                <ul>
                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <div class="contactInfo">
                                                                                <li class="p-2">
                                                                                    <span class="text-primary fw-bold">
                                                                                        Alt. Mobile No :
                                                                                    </span>{{ $userInfo->userBasicInfos->user_mobile_no }}
                                                                                </li>
                                                                            </div>

                                                                            {{-- <div x-data='userShortList'>
                                                                                <li class="p-2 d-flex">
                                                                                    <span class="text-primary fw-bold">
                                                                                        Mobile No :</span>
                                                                                    <span x-text="viewMobNum"
                                                                                        class="view-num-1">**********</span
                                                                                        x-data="userShortList">
                                                                                    <a x-on:click='viewNumber' href="javascript:void(0)"
                                                                                        class="btn btn-success btn-sm">show</a>
                                                                                </li>
                                                                                <li class="p-2">
                                                                                    <span class="text-primary fw-bold">
                                                                                        Alt. Mobile No :
                                                                                    </span><span x-text="viewAltNum">**********</span>
                                                                                </li>
                                                                            </div> --}}

                                                                            <li class="p-2">
                                                                                <span class="text-primary fw-bold">
                                                                                    Height :
                                                                                </span>
                                                                                {{ $userBasicInfo->Height->height_feet_cm ?? '-' }}
                                                                            </li>
                                                                            <li class="p-2">
                                                                                <span class="text-primary fw-bold">
                                                                                    Complexion :
                                                                                </span>
                                                                                {{ $userBasicInfo->Complex->complexion_name ?? '-' }}
                                                                            </li>
                                                                            <li class="p-2">
                                                                                <span class="text-primary fw-bold">
                                                                                    Mother Tongue :
                                                                                </span>
                                                                                {{ $userBasicInfo->MotherTongue->language_name ?? '-' }}
                                                                            </li>
                                                                        </div>
                                                                        <div class="col-md-6">

                                                                            <li class="p-2">
                                                                                <span class="text-primary fw-bold">
                                                                                    Marital Status :
                                                                                </span>
                                                                                {{ $userBasicInfo->MartialStatus->martial_status_name ?? '-' }}
                                                                            </li>
                                                                            <li class="p-2">
                                                                                <span class="text-primary fw-bold">
                                                                                    Eating Habit :
                                                                                </span>
                                                                                {{ $userBasicInfo->EatingHabit->habit_type_name ?? '-' }}
                                                                            </li>
                                                                            <li class="p-2">
                                                                                <span class="text-primary fw-bold">
                                                                                    Disability :
                                                                                </span>
                                                                                {{ ($userBasicInfo->is_disable = 1) ? 'Yes' : 'No' }}
                                                                            </li>

                                                                        </div>
                                                                    </div>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                @if (!empty($userReligiousInfo) && $userBasicInfo->profile_religion_status == 1)
                                                    <div class="accordion-item">
                                                        <h2 class="accordion-header" id="headingThree">
                                                            <button class="accordion-button collapsed" type="button"
                                                                data-bs-toggle="collapse" data-bs-target="#collapseThree"
                                                                aria-expanded="false" aria-controls="collapseThree">
                                                                Religion Information <i class="lni lni-chevron-down"></i>
                                                            </button>
                                                        </h2>
                                                        <div id="collapseThree" class="accordion-collapse collapse"
                                                            aria-labelledby="headingThree"
                                                            data-bs-parent="#accordionExample">
                                                            <div class="accordion-body">
                                                                <div class="p-3">
                                                                    <ul>
                                                                        <div class="row">
                                                                            <div class="col-md-6">
                                                                                <li class="p-2">
                                                                                    <span class="text-primary fw-bold">
                                                                                        Religion :
                                                                                    </span>
                                                                                    {{ $userReligiousInfo->Religion->religion_name }}
                                                                                </li>
                                                                                <li class="p-2">
                                                                                    <span class="text-primary fw-bold">
                                                                                        Caste :
                                                                                    </span>
                                                                                    {{ $userReligiousInfo->Caste->caste_name }}
                                                                                </li>
                                                                                <li class="p-2">
                                                                                    <span
                                                                                        class="text-primary fw-bold">Sub-Caste
                                                                                        :
                                                                                    </span>
                                                                                    {{ $userReligiousInfo->sub_caste }}
                                                                                </li>
                                                                                <li class="p-2"><span
                                                                                        class="text-primary fw-bold">Rasi
                                                                                        :</span>
                                                                                    {{ $userReligiousInfo->Rasi->rasi_name }}
                                                                                </li>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <li class="p-2"><span
                                                                                        class="text-primary fw-bold">Star
                                                                                        :</span>
                                                                                    {{ $userReligiousInfo->Star->star_name }}
                                                                                </li>
                                                                                <li class="p-2"><span
                                                                                        class="text-primary fw-bold">Dhosam
                                                                                        :</span>
                                                                                    {{ ($userReligiousInfo->dhosam = 1) ? 'Yes' : 'No' }}
                                                                                </li>
                                                                                <li class="p-2"><span
                                                                                        class="text-primary fw-bold">Birth
                                                                                        Time :</span>
                                                                                    {{ $userReligiousInfo->user_birth_time }}
                                                                                </li>
                                                                                <li class="p-2"><span
                                                                                        class="text-primary fw-bold">Birth
                                                                                        Place :</span>
                                                                                    {{ $userReligiousInfo->user_birth_place }}
                                                                                </li>
                                                                            </div>
                                                                        </div>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif

                                                @if (!empty($UserProfessionInfo) && $userBasicInfo->profile_pro_info_status == 1)
                                                    <div class="accordion-item">
                                                        <h2 class="accordion-header" id="headingThree">
                                                            <button class="accordion-button collapsed" type="button"
                                                                data-bs-toggle="collapse" data-bs-target="#collapseFive"
                                                                aria-expanded="false" aria-controls="collapseFive">
                                                                Professional Information <i
                                                                    class="lni lni-chevron-down"></i>
                                                            </button>
                                                        </h2>
                                                        <div id="collapseFive" class="accordion-collapse collapse"
                                                            aria-labelledby="headingThree"
                                                            data-bs-parent="#accordionExample">
                                                            <div class="accordion-body">
                                                                <div class="p-3">
                                                                    <ul>
                                                                        <div class="row">
                                                                            <div class="col-md-6">
                                                                                <li class="p-2"><span
                                                                                        class="text-primary fw-bold">Education
                                                                                        :</span>
                                                                                    {{-- {{ $UserProfessionInfo->Education->education_name ?? '' }} --}}
                                                                                </li>
                                                                                <li class="p-2"><span
                                                                                        class="text-primary fw-bold">Education
                                                                                        Detials
                                                                                        :</span>
                                                                                    {{ $UserProfessionInfo->user_education_details }}
                                                                                </li>
                                                                                <li class="p-2"><span
                                                                                        class="text-primary fw-bold">Job
                                                                                        :</span>
                                                                                    {{ $UserProfessionInfo->Job->job_name }}
                                                                                </li>
                                                                                <li class="p-2"><span
                                                                                        class="text-primary fw-bold">Job
                                                                                        Details :</span>
                                                                                    {{ $UserProfessionInfo->user_job_details }}
                                                                                </li>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <li class="p-2"><span
                                                                                        class="text-primary fw-bold">Annual
                                                                                        Income :</span>
                                                                                    {{ $UserProfessionInfo->AnnualIncome->salary_amount }}
                                                                                </li>
                                                                                <li class="p-2"><span
                                                                                        class="text-primary fw-bold">Job
                                                                                        Country :</span>
                                                                                    {{ $UserProfessionInfo->JobCountry->country_name }}
                                                                                </li>
                                                                                <li class="p-2"><span
                                                                                        class="text-primary fw-bold">Job
                                                                                        State :</span>
                                                                                    {{ $UserProfessionInfo->JobState->state_name }}
                                                                                </li>
                                                                                <li class="p-2"><span
                                                                                        class="text-primary fw-bold">Job
                                                                                        City :</span>
                                                                                    {{ $UserProfessionInfo->JobCity->city_name }}
                                                                                </li>
                                                                            </div>
                                                                        </div>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif

                                                @if (!empty($UserFamilyInfo) && $userBasicInfo->profile_fam_info_status == 1)
                                                    <div class="accordion-item">
                                                        <h2 class="accordion-header" id="headingThree">
                                                            <button class="accordion-button collapsed" type="button"
                                                                data-bs-toggle="collapse" data-bs-target="#collapseSix"
                                                                aria-expanded="false" aria-controls="collapseSix">
                                                                Family Details <i class="lni lni-chevron-down"></i>
                                                            </button>
                                                        </h2>
                                                        <div id="collapseSix" class="accordion-collapse collapse"
                                                            aria-labelledby="headingThree"
                                                            data-bs-parent="#accordionExample">
                                                            <div class="accordion-body">
                                                                <ul>
                                                                    <div class="row">
                                                                        <div class="col-md-4">
                                                                            <li class="p-2"><span
                                                                                    class="text-primary fw-bold">Father
                                                                                    Name :</span>
                                                                                {{ $UserFamilyInfo->user_father_name }}
                                                                            </li>
                                                                            <li class="p-2"><span
                                                                                    class="text-primary fw-bold">Father's
                                                                                    Occupation
                                                                                    :</span>
                                                                                {{ $UserFamilyInfo->user_father_job_details }}
                                                                            </li>
                                                                        </div>
                                                                        <div class="col-md-4">
                                                                            <li class="p-2"><span
                                                                                    class="text-primary fw-bold">Mother
                                                                                    Name :</span>
                                                                                {{ $UserFamilyInfo->user_mother_name }}
                                                                            </li>
                                                                            <li class="p-2"><span
                                                                                    class="text-primary fw-bold">Mother's
                                                                                    Occupation
                                                                                    :</span>
                                                                                {{ $UserFamilyInfo->user_mother_job_details }}
                                                                            </li>
                                                                        </div>

                                                                        <div class="col-md-4">
                                                                            <li class="p-2"><span
                                                                                    class="text-primary fw-bold">Family
                                                                                    Status :</span>
                                                                                {{ $UserFamilyInfo->FamilyStatusSubMaster->family_type_name }}
                                                                            </li>
                                                                            <li class="p-2"><span
                                                                                    class="text-primary fw-bold">Siblings
                                                                                    Details
                                                                                    :</span>
                                                                                {{ $UserFamilyInfo->user_sibling_details }}
                                                                            </li>
                                                                        </div>
                                                                    </div>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif

                                                @if ($userBasicInfo->profile_pref_info_status == 1)
                                                    <div class="accordion-item">
                                                        <h2 class="accordion-header" id="headingThree">
                                                            <button class="accordion-button collapsed" type="button"
                                                                data-bs-toggle="collapse" data-bs-target="#collapseSeven"
                                                                aria-expanded="false" aria-controls="collapseSeven">
                                                                Partner Preferences
                                                            </button>
                                                        </h2>
                                                        <div id="collapseSeven" class="accordion-collapse collapse"
                                                            aria-labelledby="headingThree"
                                                            data-bs-parent="#accordionExample">
                                                            <div class="accordion-body">
                                                                <ul>
                                                                    <div class="row">

                                                                        <div class="col-md-4">
                                                                            <li class="p-2"><span
                                                                                    class="text-primary fw-bold">Partner's
                                                                                    Age :</span>
                                                                                {{ $UserPreferenceInfo->partner_age_from ?? '-' }}
                                                                                to
                                                                                {{ $UserPreferenceInfo->partner_age_to ?? '-' }}
                                                                            </li>
                                                                            <li class="p-2"><span
                                                                                    class="text-primary fw-bold">Partner's
                                                                                    Height :</span>
                                                                                {{ $UserPreferenceInfo->HeightFrom->height_feet_cm ?? '-' }}
                                                                                to
                                                                                {{ $UserPreferenceInfo->HeightTo->height_feet_cm ?? '-' }}
                                                                            </li>
                                                                            <li class="p-2"><span
                                                                                    class="text-primary fw-bold">Marital
                                                                                    Status :</span>
                                                                                {{ $UserPreferenceInfo->MartialStatus->martial_status_name ?? '-' }}
                                                                            </li>
                                                                            <li class="p-2"><span
                                                                                    class="text-primary fw-bold">Complexion
                                                                                    :</span>
                                                                                @foreach ($UserPreferenceInfo->partner_complexion as $partner_complexion)
                                                                                    {{ $partner_complexion->complexion_name ?? '-' }},
                                                                                @endforeach
                                                                            </li>
                                                                        </div>

                                                                        <div class="col-md-4">
                                                                            <li class="p-2"><span
                                                                                    class="text-primary fw-bold">Mother
                                                                                    Tongue :</span>
                                                                                @foreach ($UserPreferenceInfo->partner_mother_tongue as $partner_tongue)
                                                                                    {{ $partner_tongue->language_name ?? '-' }},
                                                                                @endforeach
                                                                            </li>
                                                                            <li class="p-2"><span
                                                                                    class="text-primary fw-bold">Partner's
                                                                                    Salary :</span>
                                                                                {{ $UserPreferenceInfo->partner_salary ?? '-' }}
                                                                            </li>

                                                                            <li class="p-2"><span
                                                                                    class="text-primary fw-bold">Partner's
                                                                                    Location
                                                                                    :</span>
                                                                                @foreach ($UserPreferenceInfo->partner_country as $partner_country)
                                                                                    {{ $partner_country->country_name ?? '-' }},
                                                                                @endforeach

                                                                            </li>
                                                                            <li class="p-2"><span
                                                                                    class="text-primary fw-bold">Job
                                                                                    Location :</span>
                                                                                @foreach ($UserPreferenceInfo->partner_job_country as $partner_job_country)
                                                                                @endforeach
                                                                            </li>
                                                                        </div>

                                                                        <div class="col-md-4">
                                                                            <li class="p-2"><span
                                                                                    class="text-primary fw-bold">Partner's
                                                                                    Education
                                                                                    :</span>
                                                                                @foreach ($UserPreferenceInfo->partner_education as $partner_education)
                                                                                @endforeach

                                                                            </li>
                                                                            <li class="p-2"><span
                                                                                    class="text-primary fw-bold">Education
                                                                                    Details :</span>
                                                                                {{ $UserPreferenceInfo->partner_education_details ?? '-' }}
                                                                            </li>
                                                                            <li class="p-2"><span
                                                                                    class="text-primary fw-bold">Partner's
                                                                                    Job :</span>
                                                                                {{ $UserPreferenceInfo->Job->job_name ?? '-' }}
                                                                            </li>
                                                                            <li class="p-2"><span
                                                                                    class="text-primary fw-bold">Job
                                                                                    Details :</span>
                                                                                @foreach ($UserPreferenceInfo->partner_job as $partner_job)
                                                                                @endforeach
                                                                            </li>
                                                                        </div>

                                                                    </div>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif

                                                @if (!empty($UserHoroscopeInfo) && $userBasicInfo->profile_jakt_info_status == 1)
                                                    <div class="accordion-item">
                                                        <h2 class="accordion-header" id="headingThree">
                                                            <button class="accordion-button collapsed" type="button"
                                                                data-bs-toggle="collapse" data-bs-target="#collapseEight"
                                                                aria-expanded="false" aria-controls="collapseEight">
                                                                Horoscope Details
                                                            </button>
                                                        </h2>
                                                        <div id="collapseEight" class="accordion-collapse collapse"
                                                            aria-labelledby="headingThree"
                                                            data-bs-parent="#accordionExample">
                                                            <div class="accordion-body">
                                                                <p class="text-center">
                                                                    {{ $UserHoroscopeInfo->user_jathakam_katam_info }}
                                                                </p>
                                                                <div class="row mt-2 justify-content-center">
                                                                    @if ($UserHoroscopeInfo->user_jathakam_rasi_katam_is_filled == 1)
                                                                        <div class="col-md-6">
                                                                            <h4 class="fw-normal text-center">Jathaka
                                                                                Katam (RASI)</h4>
                                                                            <table class="table table-bordered mt-4">
                                                                                <tbody>
                                                                                    <tr>
                                                                                        <td
                                                                                            class="jathakatam small text-center align-center">
                                                                                            {{ $UserHoroscopeInfo->rasi_katam_row_1_col_1->flatten()->pluck('horoscope_name')[0] ?? '-' }}
                                                                                        </td>
                                                                                        <td
                                                                                            class="jathakatam small text-center align-center">
                                                                                            {{ $UserHoroscopeInfo->rasi_katam_row_1_col_2->flatten()->pluck('horoscope_name')[0] ?? '-' }}

                                                                                        </td>
                                                                                        <td
                                                                                            class="jathakatam  small text-center align-center">
                                                                                            {{ $UserHoroscopeInfo->rasi_katam_row_1_col_3->flatten()->pluck('horoscope_name')[0] ?? '-' }}

                                                                                        </td>
                                                                                        <td
                                                                                            class="jathakatam small text-center align-center">
                                                                                            {{ $UserHoroscopeInfo->rasi_katam_row_1_col_4->flatten()->pluck('horoscope_name')[0] ?? '-' }}
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td
                                                                                            class="jathakatam small text-center align-center">
                                                                                            {{ $UserHoroscopeInfo->rasi_katam_row_2_col_1->flatten()->pluck('horoscope_name')[0] ?? '-' }}
                                                                                        </td>
                                                                                        <td colspan="2"
                                                                                            class="bg-dark-lt align-middle">
                                                                                            <h5
                                                                                                class="fw-light text-center">
                                                                                                RASI</h4>
                                                                                        </td>
                                                                                        <td
                                                                                            class="jathakatam small text-center align-center">
                                                                                            {{ $UserHoroscopeInfo->rasi_katam_row_2_col_4->flatten()->pluck('horoscope_name')[0] ?? '-' }}
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td
                                                                                            class="jathakatam small text-center align-center">
                                                                                            {{ $UserHoroscopeInfo->rasi_katam_row_3_col_1->flatten()->pluck('horoscope_name')[0] ?? '-' }}

                                                                                        </td>
                                                                                        <td colspan="2"
                                                                                            class="bg-dark-lt align-middle">
                                                                                            <h5
                                                                                                class="fw-light text-center">
                                                                                                CHART</h5>
                                                                                        </td>
                                                                                        <td
                                                                                            class="jathakatam small text-center align-center">
                                                                                            {{ $UserHoroscopeInfo->rasi_katam_row_3_col_4->flatten()->pluck('horoscope_name')[0] ?? '-' }}

                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td
                                                                                            class="jathakatam small text-center align-center">
                                                                                            {{ $UserHoroscopeInfo->rasi_katam_row_4_col_1->flatten()->pluck('horoscope_name')[0] ?? '-' }}

                                                                                        </td>
                                                                                        <td
                                                                                            class="jathakatam small text-center align-center">
                                                                                            {{ $UserHoroscopeInfo->rasi_katam_row_4_col_2->flatten()->pluck('horoscope_name')[0] ?? '-' }}

                                                                                        </td>
                                                                                        <td
                                                                                            class="jathakatam small text-center align-center">
                                                                                            {{ $UserHoroscopeInfo->rasi_katam_row_4_col_3->flatten()->pluck('horoscope_name')[0] ?? '-' }}

                                                                                        </td>
                                                                                        <td
                                                                                            class="jathakatam small text-center align-center">
                                                                                            {{ $UserHoroscopeInfo->rasi_katam_row_4_col_4->flatten()->pluck('horoscope_name')[0] ?? '-' }}

                                                                                        </td>
                                                                                    </tr>
                                                                                </tbody>
                                                                            </table>
                                                                        </div>
                                                                    @endif

                                                                    @if ($UserHoroscopeInfo->user_jathakam_navamsam_katam_is_filled == 1)
                                                                        <div class="col-md-6">
                                                                            <h4 class="fw-normal text-center">Jathaka
                                                                                Katam (NAVAASAM)</h4>
                                                                            <table class="table table-bordered mt-4">
                                                                                <tbody>
                                                                                    <tr>
                                                                                        <td
                                                                                            class="jathakatam small text-center align-center">
                                                                                            {{ $UserHoroscopeInfo->navam_katam_row_1_col_1->flatten()->pluck('horoscope_name')[0] ?? '-' }}
                                                                                        </td>
                                                                                        <td
                                                                                            class="jathakatam small text-center align-center">
                                                                                            {{ $UserHoroscopeInfo->navam_katam_row_1_col_2->flatten()->pluck('horoscope_name')[0] ?? '-' }}
                                                                                        </td>
                                                                                        <td
                                                                                            class="jathakatam small text-center align-center">
                                                                                            {{ $UserHoroscopeInfo->navam_katam_row_1_col_3->flatten()->pluck('horoscope_name')[0] ?? '-' }}
                                                                                        </td>
                                                                                        <td
                                                                                            class="jathakatam small text-center align-center">
                                                                                            {{ $UserHoroscopeInfo->navam_katam_row_1_col_4->flatten()->pluck('horoscope_name')[0] ?? '-' }}
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td
                                                                                            class="jathakatam small text-center align-center">
                                                                                            {{ $UserHoroscopeInfo->navam_katam_row_2_col_1->flatten()->pluck('horoscope_name')[0] ?? '-' }}
                                                                                        </td>
                                                                                        <td colspan="2"
                                                                                            class="bg-dark-lt align-middle">
                                                                                            <h5
                                                                                                class="fw-light text-center">
                                                                                                NAVAMSAM</h5>
                                                                                        </td>
                                                                                        <td
                                                                                            class="jathakatam small text-center align-center">
                                                                                            {{ $UserHoroscopeInfo->navam_katam_row_2_col_4->flatten()->pluck('horoscope_name')[0] ?? '-' }}
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td
                                                                                            class="jathakatam small text-center align-center">
                                                                                            {{ $UserHoroscopeInfo->navam_katam_row_3_col_1->flatten()->pluck('horoscope_name')[0] ?? '-' }}
                                                                                        </td>
                                                                                        <td colspan="2"
                                                                                            class="bg-dark-lt align-middle">
                                                                                            <h5
                                                                                                class="fw-light text-center">
                                                                                                CHART</h5>
                                                                                        </td>
                                                                                        <td
                                                                                            class="jathakatam small text-center align-center">
                                                                                            {{ $UserHoroscopeInfo->navam_katam_row_3_col_4->flatten()->pluck('horoscope_name')[0] ?? '-' }}
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td
                                                                                            class="jathakatam small text-center align-center">
                                                                                            {{ $UserHoroscopeInfo->navam_katam_row_4_col_1->flatten()->pluck('horoscope_name')[0] ?? '-' }}
                                                                                        </td>
                                                                                        <td
                                                                                            class="jathakatam small text-center align-center">
                                                                                            {{ $UserHoroscopeInfo->navam_katam_row_4_col_2->flatten()->pluck('horoscope_name')[0] ?? '-' }}
                                                                                        </td>
                                                                                        <td
                                                                                            class="jathakatam small text-center align-center">
                                                                                            {{ $UserHoroscopeInfo->navam_katam_row_4_col_3->flatten()->pluck('horoscope_name')[0] ?? '-' }}
                                                                                        </td>
                                                                                        <td
                                                                                            class="jathakatam small text-center align-center">
                                                                                            {{ $UserHoroscopeInfo->navam_katam_row_4_col_4->flatten()->pluck('horoscope_name')[0] ?? '-' }}
                                                                                        </td>
                                                                                    </tr>
                                                                                </tbody>
                                                                            </table>
                                                                        </div>
                                                                    @endif
                                                                    @if ($UserHoroscopeInfo->user_jathakam_image_is_uploaded == 1)
                                                                        <div class="col-md-6 text-center">
                                                                            <a href="{{ $UserHoroscopeInfo->user_jathakam_image }}"
                                                                                target="_blank" rel="noopener noreferrer">
                                                                                <img src="{{ $UserHoroscopeInfo->user_jathakam_image }}"
                                                                                    class="card-img-top w-50 rounded">
                                                                            </a>
                                                                        </div>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- PDF SECTION START --}}
    <section class="d-none">
        <div class="container" id="pdf-content">
            <div class="row">
                <div class="col-md-12 border border-2 border-primary rounded">
                    <div class="text-center pt-3 pb-3">
                        {{-- <img class="img-responsive" src="" alt="Logo Here"> --}}
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6 text-center align-self-center">
                            {{-- <img class='w-25' id='profileImg'
                                @if ($userBasicInfo->image_with_path) src="{{ $userBasicInfo->image_with_path }}"
                                            @else
                                            src="{{ asset('assets/Website/avatar.png') }}" @endif
                                alt="Preview"> --}}
                        </div>
                        @php
                            $caste_no_bar = \App\Models\Master\UserPreferenceInfoMaster\UserPreferenceInfo::where('user_id', '=', $userInfo->id)
                                ->where('caste_no_bar', '=', 1)
                                ->get();
                            // dd($caste_no_bar);
                            // dd($view_contact);
                        @endphp
                        <div class="col-md-6">
                            <div class="">
                                <h1 class="lead fw-normal">{{ $userInfo->user_profile_id ?? 'TM#######' }}</h1>
                                <h5 class="price pt-2"><span class="text-dark">I'm</span>
                                    {{ $userBasicInfo->user_full_name }}</h5>
                                @if ($caste_no_bar != null)
                                    <span class="badge bg-info text-dark">Yes</span>
                                @endif

                                <hr>
                                <div class="row">
                                    <div class="col-12">
                                        <ul class="text">
                                            <li class="location m-0"><i class="lni lni-user"></i>
                                                &nbsp;{{ $userBasicInfo->age }}
                                                Yrs</li>
                                            <li class="location m-0"><i class="lni lni-certificate"></i>
                                                &nbsp;{{ $userReligiousInfo->Religion->religion_name ?? '-' }} -
                                                {{ $userReligiousInfo->Caste->caste_name ?? '-' }}</li>

                                            <li class="location m-0"><i class="lni lni-map-marker"></i>
                                                {{ $userPlaceInfo->userCity->city_name ?? '-' }}
                                                ,{{ $userPlaceInfo->userState->state_name ?? '-' }}
                                                ,{{ $userPlaceInfo->userCountry->country_name ?? '-' }}
                                            </li>
                                            <li class="location m-0"><i class="lni lni-graduation"></i>
                                                {{ $UserProfessionInfo->Education->education_name ?? '-' }}
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <hr>

                    <div>
                        <h5 class="fw-normal ml-cust-3">
                            Basic Information
                        </h5>
                        <ul class="row ">
                            <div class="col-md-7 pl-cust-6">

                                <li>
                                    <span class="text-primary">
                                        Height :
                                    </span>
                                    {{ $userBasicInfo->Height->height_feet_cm ?? '-' }}
                                </li>
                                <li>
                                    <span class="text-primary">
                                        Complexion :
                                    </span>
                                    {{ $userBasicInfo->Complex->complexion_name ?? '-' }}
                                </li>
                            </div>
                            <div class="col-md-5">
                                <li>
                                    <span class="text-primary">
                                        Mother Tongue :
                                    </span>
                                    {{ $userBasicInfo->MotherTongue->language_name ?? '-' }}
                                </li>
                                <li>
                                    <span class="text-primary">
                                        Marital Status :
                                    </span>
                                    {{ $userBasicInfo->MartialStatus->martial_status_name ?? '-' }}
                                </li>
                                <li>
                                    <span class="text-primary">
                                        Eating Habit :
                                    </span>
                                    {{ $userBasicInfo->EatingHabit->habit_type_name ?? '-' }}
                                </li>
                                <li>
                                    <span class="text-primary">
                                        Disability :
                                    </span>
                                    {{ ($userBasicInfo->is_disable = 1) ? 'Yes' : 'No' }}
                                </li>
                            </div>
                        </ul>
                    </div>



                    @if (!empty($userReligiousInfo))
                        <hr>
                        <div>
                            <h5 class="fw-normal ml-cust-3">
                                Religion Information
                            </h5>
                            <ul class="row">
                                <div class="col-md-7 pl-cust-6">
                                    <li>
                                        <span class="text-primary">
                                            Religion :
                                        </span>
                                        {{ $userReligiousInfo->Religion->religion_name }}
                                    </li>
                                    <li>
                                        <span class="text-primary">
                                            Caste :
                                        </span>
                                        {{ $userReligiousInfo->Caste->caste_name }}
                                    </li>
                                    <li>
                                        <span class="text-primary">Sub-Caste :
                                        </span>
                                        {{-- {{ $userReligiousInfo->sub_caste }} --}}
                                    </li>
                                    <li><span class="text-primary">Rasi
                                            :</span>
                                        {{ $userReligiousInfo->Rasi->rasi_name }}</li>
                                </div>
                                <div class="col-md-5">
                                    <li><span class="text-primary">Star
                                            :</span>
                                        {{ $userReligiousInfo->Star->star_name }}
                                    </li>
                                    <li><span class="text-primary">Dhosam
                                            :</span>
                                        {{ ($userReligiousInfo->dhosam = 1) ? 'Yes' : 'No' }}
                                    </li>
                                    <li><span class="text-primary">Birth
                                            Time :</span>
                                        {{ $userReligiousInfo->user_birth_time }}
                                    </li>
                                    <li><span class="text-primary">Birth
                                            Place :</span>
                                        {{ $userReligiousInfo->user_birth_place }}
                                    </li>
                                </div>
                            </ul>
                        </div>
                    @endif

                    @if (!empty($UserProfessionInfo))
                        <hr>
                        <div>
                            <h5 class="fw-normal ml-cust-3">
                                Professional Information
                            </h5>
                            <ul class="row">
                                <div class="col-md-7 pl-cust-6">
                                    <li><span class="text-primary">Education :</span>
                                        {{ $UserProfessionInfo->Education->education_name ?? '' }}
                                    </li>
                                    <li><span class="text-primary">Education Detials
                                            :</span>
                                        {{ $UserProfessionInfo->user_education_details ?? '-' }}
                                    </li>
                                    <li><span class="text-primary">Job
                                            :</span>
                                        {{ $UserProfessionInfo->Job->job_name ?? '-' }}
                                    </li>
                                    <li><span class="text-primary">Job
                                            Details :</span>
                                        {{ $UserProfessionInfo->user_job_details ?? '-' }}
                                    </li>
                                </div>
                                <div class="col-md-5">
                                    <li><span class="text-primary">Annual Income :</span>
                                        {{ $UserProfessionInfo->AnnualIncome->salary_amount ?? '-' }}
                                    </li>
                                    <li><span class="text-primary">Job
                                            Country :</span>
                                        {{ $UserProfessionInfo->JobCountry->country_name ?? '-' }}
                                    </li>
                                    <li><span class="text-primary">Job
                                            State :</span>
                                        {{ $UserProfessionInfo->JobState->state_name ?? '-' }}
                                    </li>
                                    <li><span class="text-primary">Job
                                            City :</span>
                                        {{ $UserProfessionInfo->JobCity->city_name ?? '-' }}
                                    </li>
                                </div>
                            </ul>
                        </div>
                    @endif

                    @if (!empty($UserFamilyInfo))
                        <hr>
                        <div>
                            <h5 class="fw-normal ml-cust-3">
                                Family Details
                            </h5>
                            <ul class="row">
                                <div class="col-md-7 pl-cust-6">
                                    <li><span class="text-primary">Father
                                            Name :</span>
                                        {{ $UserFamilyInfo->user_father_name }}
                                    </li>
                                    <li><span class="text-primary">Father's
                                            Occupation
                                            :</span>
                                        {{-- {{ $UserFamilyInfo->user_father_job_details }} --}}
                                        qwqwqw
                                    </li>

                                    <li><span class="text-primary">Mother
                                            Name :</span>
                                        {{ $UserFamilyInfo->user_mother_name }}
                                    </li>
                                </div>

                                <div class="col-md-5">
                                    <li><span class="text-primary">Mother's
                                            Occupation
                                            :</span>
                                        {{-- {{ $UserFamilyInfo->user_mother_job_details }} --}}qwqw
                                    </li>
                                    <li><span class="text-primary">Family
                                            Status :</span>
                                        {{ $UserFamilyInfo->FamilyStatusSubMaster->family_type_name }}
                                    </li>
                                    <li><span class="text-primary">Siblings
                                            Details
                                            :</span>
                                        {{ $UserFamilyInfo->user_sibling_details }}
                                    </li>
                                </div>
                            </ul>
                        </div>
                    @endif



                    @if (!empty($UserPreferenceInfo))
                        <hr>
                        <div>
                            <h5 class="fw-normal ml-cust-3">
                                Partner Preferences
                            </h5>

                            <ul class="row">
                                <div class="col-md-7 pl-cust-6">
                                    <li><span class="text-primary">Caste No Bar :</span>
                                        @if ($caste_no_bar != null)
                                            Yes
                                        @else
                                            No
                                        @endif
                                    </li>
                                    <li><span class="text-primary">Partner's Age :</span>
                                        {{ $UserPreferenceInfo->partner_age_from }} to
                                        {{ $UserPreferenceInfo->partner_age_to }}
                                    </li>
                                    <li><span class="text-primary">Partner's Height
                                            :</span>
                                        {{ $UserPreferenceInfo->HeightFrom->height_feet_cm }} to
                                        {{ $UserPreferenceInfo->HeightTo->height_feet_cm }}
                                    </li>
                                    <li><span class="text-primary">Marital
                                            Status :</span>
                                        {{ $UserPreferenceInfo->MartialStatus->martial_status_name }}
                                    </li>
                                    <li><span class="text-primary">Complexion :</span>
                                        @foreach ($UserPreferenceInfo->partner_complexion as $partner_complexion)
                                            {{ $partner_complexion->complexion_name }},
                                        @endforeach
                                    </li>
                                    <li><span class="text-primary">Mother
                                            Tongue :</span>
                                        @foreach ($UserPreferenceInfo->partner_mother_tongue as $partner_tongue)
                                            {{ $partner_tongue->language_name }}
                                        @endforeach
                                    </li>
                                    <li><span class="text-primary">Partner's Salary
                                            :</span>
                                        {{ $UserPreferenceInfo->partner_salary }}
                                    </li>
                                </div>

                                <div class="col-md-5">
                                    <li><span class="text-primary">Partner's Location
                                            :</span>
                                        @foreach ($UserPreferenceInfo->partner_country as $partner_country)
                                            {{ $partner_country->country_name }}
                                        @endforeach

                                    </li>
                                    <li><span class="text-primary">Job
                                            Location :</span>
                                        {{ $UserPreferenceInfo->partner_job_city ?? '' }},
                                        {{ $UserPreferenceInfo->partner_job_state ?? '' }},
                                        {{ $UserPreferenceInfo->partner_job_country ?? '' }}
                                    </li>
                                    <li><span class="text-primary">Partner's Education
                                            :</span>
                                        {{ $UserPreferenceInfo->Education->education_name ?? '-' }}
                                    </li>
                                    <li><span class="text-primary">Education Details
                                            :</span>
                                        {{ $UserPreferenceInfo->partner_education_details }}
                                    </li>
                                    <li><span class="text-primary">Partner's Job
                                            :</span>
                                        {{ $UserPreferenceInfo->Job->job_name ?? '-' }}
                                    </li>
                                    <li><span class="text-primary">Job
                                            Details :</span>
                                        {{ $UserPreferenceInfo->partner_job_details }}
                                    </li>
                                </div>
                            </ul>
                        </div>
                    @endif

                    @if (!empty($UserHoroscopeInfo))
                        <hr>
                        <div>
                            <h5 class="fw-normal text-center">
                                Horoscope Details
                            </h5>

                            <p class="text-center">
                                {{ $UserHoroscopeInfo->user_jathakam_katam_info }}</p>
                            <div class="row mt-2 justify-content-center">
                                {{-- @if ($UserHoroscopeInfo->user_jathakam_rasi_katam_is_filled == 1) --}}
                                <div class="col-md-6">

                                    <table class="table table-bordered mt-4 border-secondary">
                                        <tbody>
                                            <tr>
                                                <td class="jathakatam small text-center align-center">
                                                    {{ $UserHoroscopeInfo->rasi_katam_row_1_col_1->flatten()->pluck('horoscope_name')[0] ?? '-' }}
                                                </td>
                                                <td class="jathakatam small text-center align-center">
                                                    {{ $UserHoroscopeInfo->rasi_katam_row_1_col_2->flatten()->pluck('horoscope_name')[0] ?? '-' }}

                                                </td>
                                                <td class="jathakatam  small text-center align-center">
                                                    {{ $UserHoroscopeInfo->rasi_katam_row_1_col_3->flatten()->pluck('horoscope_name')[0] ?? '-' }}

                                                </td>
                                                <td class="jathakatam small text-center align-center">
                                                    {{ $UserHoroscopeInfo->rasi_katam_row_1_col_4->flatten()->pluck('horoscope_name')[0] ?? '-' }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="jathakatam small text-center align-center">
                                                    {{ $UserHoroscopeInfo->rasi_katam_row_2_col_1->flatten()->pluck('horoscope_name')[0] ?? '-' }}
                                                </td>
                                                <td colspan="2" class="bg-dark-lt align-middle">
                                                    <h5 class="fw-light text-center">RASI</h4>
                                                </td>
                                                <td class="jathakatam small text-center align-center">
                                                    {{ $UserHoroscopeInfo->rasi_katam_row_2_col_4->flatten()->pluck('horoscope_name')[0] ?? '-' }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="jathakatam small text-center align-center">
                                                    {{ $UserHoroscopeInfo->rasi_katam_row_3_col_1->flatten()->pluck('horoscope_name')[0] ?? '-' }}

                                                </td>
                                                <td colspan="2" class="bg-dark-lt align-middle">
                                                    <h5 class="fw-light text-center">CHART</h5>
                                                </td>
                                                <td class="jathakatam small text-center align-center">
                                                    {{ $UserHoroscopeInfo->rasi_katam_row_3_col_4->flatten()->pluck('horoscope_name')[0] ?? '-' }}

                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="jathakatam small text-center align-center">
                                                    {{ $UserHoroscopeInfo->rasi_katam_row_4_col_1->flatten()->pluck('horoscope_name')[0] ?? '-' }}

                                                </td>
                                                <td class="jathakatam small text-center align-center">
                                                    {{ $UserHoroscopeInfo->rasi_katam_row_4_col_2->flatten()->pluck('horoscope_name')[0] ?? '-' }}

                                                </td>
                                                <td class="jathakatam small text-center align-center">
                                                    {{ $UserHoroscopeInfo->rasi_katam_row_4_col_3->flatten()->pluck('horoscope_name')[0] ?? '-' }}

                                                </td>
                                                <td class="jathakatam small text-center align-center">
                                                    {{ $UserHoroscopeInfo->rasi_katam_row_4_col_4->flatten()->pluck('horoscope_name')[0] ?? '-' }}

                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                {{-- @endif

                                    @if ($UserHoroscopeInfo->user_jathakam_navamsam_katam_is_filled == 1) --}}
                                <div class="col-md-6">
                                    <table class="table table-bordered mt-4 border-secondary">
                                        <tbody>
                                            <tr>
                                                <td class="jathakatam small text-center align-center">
                                                    {{ $UserHoroscopeInfo->navam_katam_row_1_col_1->flatten()->pluck('horoscope_name')[0] ?? '-' }}
                                                </td>
                                                <td class="jathakatam small text-center align-center">
                                                    {{ $UserHoroscopeInfo->navam_katam_row_1_col_2->flatten()->pluck('horoscope_name')[0] ?? '-' }}
                                                </td>
                                                <td class="jathakatam small text-center align-center">
                                                    {{ $UserHoroscopeInfo->navam_katam_row_1_col_3->flatten()->pluck('horoscope_name')[0] ?? '-' }}
                                                </td>
                                                <td class="jathakatam small text-center align-center">
                                                    {{ $UserHoroscopeInfo->navam_katam_row_1_col_4->flatten()->pluck('horoscope_name')[0] ?? '-' }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="jathakatam small text-center align-center">
                                                    {{ $UserHoroscopeInfo->navam_katam_row_2_col_1->flatten()->pluck('horoscope_name')[0] ?? '-' }}
                                                </td>
                                                <td colspan="2" class="bg-dark-lt align-middle">
                                                    <h5 class="fw-light text-center">NAVAMSAM</h5>
                                                </td>
                                                <td class="jathakatam small text-center align-center">
                                                    {{ $UserHoroscopeInfo->navam_katam_row_2_col_4->flatten()->pluck('horoscope_name')[0] ?? '-' }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="jathakatam small text-center align-center">
                                                    {{ $UserHoroscopeInfo->navam_katam_row_3_col_1->flatten()->pluck('horoscope_name')[0] ?? '-' }}
                                                </td>
                                                <td colspan="2" class="bg-dark-lt align-middle">
                                                    <h5 class="fw-light text-center">CHART</h5>
                                                </td>
                                                <td class="jathakatam small text-center align-center">
                                                    {{ $UserHoroscopeInfo->navam_katam_row_3_col_4->flatten()->pluck('horoscope_name')[0] ?? '-' }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="jathakatam small text-center align-center">
                                                    {{ $UserHoroscopeInfo->navam_katam_row_4_col_1->flatten()->pluck('horoscope_name')[0] ?? '-' }}
                                                </td>
                                                <td class="jathakatam small text-center align-center">
                                                    {{ $UserHoroscopeInfo->navam_katam_row_4_col_2->flatten()->pluck('horoscope_name')[0] ?? '-' }}
                                                </td>
                                                <td class="jathakatam small text-center align-center">
                                                    {{ $UserHoroscopeInfo->navam_katam_row_4_col_3->flatten()->pluck('horoscope_name')[0] ?? '-' }}
                                                </td>
                                                <td class="jathakatam small text-center align-center">
                                                    {{ $UserHoroscopeInfo->navam_katam_row_4_col_4->flatten()->pluck('horoscope_name')[0] ?? '-' }}
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                {{-- @endif --}}
                                @if ($UserHoroscopeInfo->user_jathakam_image_is_uploaded == 1)
                                    <div class="col-md-6 text-center">
                                        <a href="{{ $UserHoroscopeInfo->user_jathakam_image }}" target="_blank"
                                            rel="noopener noreferrer">
                                            <img src="{{ $UserHoroscopeInfo->user_jathakam_image }}"
                                                class="card-img-top w-50 rounded">
                                        </a>
                                    </div>
                                @endif
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
    {{-- PDF SECTION END --}}

    <script>
        // SWAP IMAGES
        $($('.images').children()).click(function(index, element) {
            console.log(this.src);
            var img = $('<img />', {
                src: this.src,
                'class': 'rounded'
            });

            $('.main-img').html(img).show();
        });
        // SWAP IMAGES

        $("#getPdf").click(function() {

            document.querySelector(".preloader").style.opacity = "1";
            document.querySelector(".preloader").style.display = "block";

            // setTimeout(() => {
            //     document.querySelector(".preloader").style.opacity = "0";
            //     document.querySelector(".preloader").style.display = "none";
            // }, 3000);

            const doc = document.getElementById('pdf-content');
            console.log(doc);
            console.log(window);
            var opt = {
                margin: 0.1,
                filename: 'myfile.pdf',
                image: {
                    type: 'jpeg',
                    quality: 1
                },
                html2canvas: {
                    scale: 6
                },
                jsPDF: {
                    unit: 'in',
                    format: 'letter',
                    orientation: 'portrait'
                }
            };
            html2pdf().from(doc).set(opt).save(
                "{{ $userBasicInfo->user_full_name . '-' . $userInfo->user_profile_id }}.pdf");

            document.querySelector(".preloader").style.opacity = "0";
            document.querySelector(".preloader").style.display = "none";
        })
    </script>
@endsection
