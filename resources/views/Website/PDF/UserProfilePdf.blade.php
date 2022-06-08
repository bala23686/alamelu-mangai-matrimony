<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alamelu Mangai Matrimony</title>
    <style>
        * {
            margin: 0;
            padding: 0;

        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            margin: 2rem;
            margin-right: 2rem;
            background-color: rgb(248, 248, 248);
            line-height: 1.5rem;
            font-size: 0.8rem;
        }

        .row:after {
            content: "";
            display: table;
            clear: both;
        }

        .col-4 {
            float: left;
            width: 33%;
        }

        .col-6 {
            float: left;
            width: 50%;
        }


        hr {
            margin: 10px 0;
            border: 0.5px groove dimgrey;
        }

        .logo-section {
            padding: 1rem 0;
        }

        .box {
            margin: 0 30px;
        }

        .box-body {
            margin: 0 30px;
        }

        .box h4 {
            color: royalblue;
        }

        ul span {

            color: royalblue;
        }

        table {
            border-collapse: collapse;
        }

        table td {
            width: 3rem;
            height: 3rem;
            border: 0.5px solid dimgrey;
            text-align: center;
        }

    </style>
</head>

<body>

    <div class="logo-section">
        <center>
            <h4>Alamelu Mangai Matrimony</h4>
        </center>
    </div>

    <div class="row">
        <div class="col-6">
            <img width="75%"
                @if (!empty($userInfo->userBasicInfos->image_with_path)) src="{{ $userInfo->userBasicInfos->image_with_path }}"
                                            @else
                src="https://www.kindpng.com/picc/m/207-2074624_white-gray-circle-avatar-png-transparent-png.png" @endif
                alt="Preview">
        </div>
        <div class="col-6" style="margin-top: 1rem">
            <h3>{{ $userInfo->user_profile_id }}</h3>
            <h4><span class="text-dark">I'm</span>
                {{ $userInfo->userBasicInfos->user_full_name }}</h4>

            <hr style="width: 50%">

            <ul style="margin-left: 1rem">
                @if (!empty($userInfo->userBasicInfos))
                    <li>
                        {{ $userInfo->userBasicInfos->age }}
                        Yrs</li>
                    <li>
                        {{ $userInfo->userBasicInfos->MartialStatus->martial_status_name }}
                    </li>
                @endif

                @if (!empty($userReligiousInfo))
                    <li>
                        {{ $userReligiousInfo->Religion->religion_name ?? '-' }},
                        {{ $userReligiousInfo->Caste->caste_name ?? '-' }}</li>
                @endif

                @if (!empty($userPlaceInfo))
                    <li>
                        {{ $userPlaceInfo->userCity->city_name ?? '-' }}
                        ,{{ $userPlaceInfo->userState->state_name ?? '-' }}
                        ,{{ $userPlaceInfo->userCountry->country_name ?? '-' }}
                    </li>
                @endif

                @if (!empty($UserProfessionInfo))
                    <li>
                        @forelse ($UserProfessionInfo->user_education_id as $education)
                            {{ $education->education_name }},
                        @empty
                            <span>-</span>
                        @endforelse
                    </li>
                @endif
            </ul>
        </div>
    </div>
    <hr>
    <div class="box">
        <h4 style="color: royalblue">Basic Information</h4>
        <ul class="box-body">
            <div class="row">
                <div class="col-6">
                    <li>
                        <span>
                            Mobile No
                            : </span>{{ $userInfo->phonenumber }}
                    </li>
                    <li>
                        <span>
                            Alt. Mobile No :
                        </span>{{ $userInfo->userBasicInfos->user_mobile_no }}
                    </li>

                    <li>
                        <span>
                            Height :
                        </span>
                        {{ $userInfo->userBasicInfos->Height->height_feet_cm ?? '-' }}
                    </li>
                    <li>
                        <span>
                            Complexion :
                        </span>
                        {{ $userInfo->userBasicInfos->Complex->complexion_name }}
                    </li>
                </div>

                <div class="col-6" style="margin-left: 1rem">
                    <li>
                        <span>
                            Mother Tongue :
                        </span>
                        {{ $userInfo->userBasicInfos->MotherTongue->language_name }}
                    </li>
                    <li>
                        <span>
                            Marital Status :
                        </span>
                        {{ $userInfo->userBasicInfos->MartialStatus->martial_status_name }}
                    </li>
                    <li>
                        <span>
                            Eating Habit :
                        </span>
                        {{ $userInfo->userBasicInfos->EatingHabit->habit_type_name }}
                    </li>
                    <li>
                        <span>
                            Disability :
                        </span>
                        {{ ($userInfo->userBasicInfos->is_disable = 1) ? 'Yes' : 'No' }}
                    </li>
                </div>
            </div>
        </ul>
    </div>

    @if (!empty($UserFamilyInfo))
        <div class="box">
            <hr>
            <h4>Family Information</h4>
            <ul class="box-body">
                <div class="row">
                    <div class="col-6">
                        <li><span>Father
                                Name :</span>
                            {{ $UserFamilyInfo->user_father_name }}
                        </li>
                        <li><span>Father's
                                Occupation
                                :</span>
                            {{ $UserFamilyInfo->user_father_job_details }}
                        </li>
                        <li><span>Mother
                                Name :</span>
                            {{ $UserFamilyInfo->user_mother_name }}
                        </li>
                    </div>
                    <div class="col-6" style="margin-left: 1rem">
                        <li><span>Mother's
                                Occupation
                                :</span>
                            {{ $UserFamilyInfo->user_mother_job_details }}
                        </li>

                        <li><span>Family
                                Status :</span>
                            {{ $UserFamilyInfo->FamilyStatusSubMaster->family_type_name }}
                        </li>
                        <li><span>Siblings
                                Details
                                :</span>
                            {{ $UserFamilyInfo->user_sibling_details }}
                        </li>
                    </div>
                </div>
            </ul>
        </div>
    @endif


    @if (!empty($UserProfessionInfo))
        <div class="box">
            <hr>
            <h4>Professional Information</h4>
            <ul class="box-body">
                <div class="row">
                    <div class="col-6">
                        <li><span>Education
                                :</span>
                            @forelse ($UserProfessionInfo->user_education_id as $education)
                                {{ $education->education_name }},
                            @empty
                                <span>-</span>
                            @endforelse
                        </li>
                        <li><span>Education
                                Detials
                                :</span>
                            {{ $UserProfessionInfo->user_education_details }}
                        </li>
                        <li><span>Job
                                :</span>
                            {{ $UserProfessionInfo->Job->job_name }}
                        </li>
                        <li><span>Job
                                Details :</span>
                            {{ $UserProfessionInfo->user_job_details }}
                        </li>
                    </div>
                    <div class="col-6" style="margin-left: 1rem">
                        <li><span>Annual
                                Income :</span>
                            Rs. {{ $UserProfessionInfo->user_annual_income }}
                        </li>
                        <li><span>Job
                                Country :</span>
                            {{ $UserProfessionInfo->JobCountry->country_name }}
                        </li>
                        <li><span>Job
                                State :</span>
                            {{ $UserProfessionInfo->JobState->state_name }}
                        </li>
                        <li><span>Job
                                City :</span>
                            {{ $UserProfessionInfo->JobCity->city_name }}
                        </li>
                    </div>
                </div>
            </ul>
        </div>
    @endif

    @if (!empty($userReligiousInfo))
        <div class="box">
            <hr>
            <h4>Religious Information</h4>
            <ul class="box-body">
                <div class="row">
                    <div class="col-6">
                        <li>
                            <span>
                                Religion :
                            </span>
                            {{ $userReligiousInfo->Religion->religion_name }}
                        </li>
                        <li>
                            <span>
                                Caste :
                            </span>
                            {{ $userReligiousInfo->Caste->caste_name }}
                        </li>
                        <li>
                            <span>Sub-Caste :
                            </span>
                            {{ $userReligiousInfo->sub_caste }}
                        </li>
                        <li><span>Rasi
                                :</span>
                            {{ $userReligiousInfo->Rasi->rasi_name }}</li>
                    </div>
                    <div class="col-6" style="margin-left: 1rem">
                        <li><span>Star
                                :</span>
                            {{ $userReligiousInfo->Star->star_name }}
                        </li>
                        <li><span>Dhosam
                                :</span>
                            {{ ($userReligiousInfo->dhosam = 1) ? 'Yes' : 'No' }}
                        </li>
                        <li><span>Birth
                                Time :</span>
                            {{ $userReligiousInfo->user_birth_time }}
                        </li>
                        <li><span>Birth
                                Place :</span>
                            {{ $userReligiousInfo->user_birth_place }}
                        </li>
                    </div>
                </div>
            </ul>
        </div>
    @endif

    @if (!empty($UserPreferenceInfo))
        <div class="box">
            <hr>
            <h4>Partner Preference </h4>
            <ul class="box-body">
                <div class="row">
                    <div class="col-4">
                        <li><span>Partner's Age :</span>
                            {{ $UserPreferenceInfo->partner_age_from ?? '-' }} to
                            {{ $UserPreferenceInfo->partner_age_to ?? '-' }}
                        </li>
                        <li><span>Partner's Height :</span>
                            {{ $UserPreferenceInfo->HeightFrom->height_feet_cm ?? '-' }} to
                            {{ $UserPreferenceInfo->HeightTo->height_feet_cm ?? '-' }}
                        </li>
                        <li><span>Marital
                                Status :</span>
                            {{ $UserPreferenceInfo->MartialStatus->martial_status_name ?? '-' }}
                        </li>
                        <li><span>Complexion :</span>
                            @forelse ($UserPreferenceInfo->partner_complexion as $partner_complexion)
                                {{ $partner_complexion->complexion_name }},
                            @empty
                                <span>-</span>
                            @endforelse
                        </li>
                    </div>

                    <div class="col-4" style="margin-left: 1rem;">
                        <li><span>Mother
                                Tongue :</span>
                            @forelse ($UserPreferenceInfo->partner_mother_tongue as $partner_tongue)
                                {{ $partner_tongue->language_name }},
                            @empty
                                <span>-</span>
                            @endforelse
                        </li>
                        <li><span>Partner's Salary :</span>
                            {{ $UserPreferenceInfo->partner_salary ?? '-' }}
                        </li>
                        <li><span>Partner's Location
                                :</span>
                            @forelse ($UserPreferenceInfo->partner_country as $partner_country)
                                {{ $partner_country->country_name }},
                            @empty
                                <span>-</span>
                            @endforelse
                        </li>
                        <li><span>Job
                                Location :</span>
                            @forelse ($UserPreferenceInfo->partner_job_country as $part_job_country)
                                {{ $part_job_country->country_name }},
                            @empty
                                <span>-</span>
                            @endforelse
                        </li>
                    </div>

                    <div class="col-4" style="margin-left: 1rem;">
                        <li><span>Partner's Education
                                :</span>
                            @forelse ($UserPreferenceInfo->partner_education as $partner_education)
                                {{ $partner_education->education_name }},
                            @empty
                                <span>-</span>
                            @endforelse
                        </li>
                        <li><span>Prefer
                                Details :</span>
                            {{ $UserPreferenceInfo->partner_education_details ?? '-' }}
                        </li>
                        <li><span>Partner Religion :</span>
                            {{ $UserPreferenceInfo->Religion->religion_name ?? '-' }}
                        </li>
                        <li><span>Partner Caste :</span>
                            {{ $UserPreferenceInfo->Caste->caste_name ?? '-' }}
                        </li>
                    </div>
                </div>
            </ul>
        </div>
        </div>
    @endif

    @if (!empty($UserHoroscopeInfo))
        <div class="box">
            <hr>
            <h4 class="panel-title">Horoscope Information</h4>
            <div class="box-body">
                <div class="row">
                    @if ($UserHoroscopeInfo->user_jathakam_rasi_katam_is_filled == 1)
                        <div class="col-6">
                            <h5>Jathaka
                                Katam (RASI)</h5>
                            <table>
                                <tbody>
                                    <tr>
                                        <td>
                                            {{ $UserHoroscopeInfo->rasi_katam_row_1_col_1->flatten()->pluck('horoscope_name')[0] ?? '-' }}
                                        </td>
                                        <td>
                                            {{ $UserHoroscopeInfo->rasi_katam_row_1_col_2->flatten()->pluck('horoscope_name')[0] ?? '-' }}

                                        </td>
                                        <td>
                                            {{ $UserHoroscopeInfo->rasi_katam_row_1_col_3->flatten()->pluck('horoscope_name')[0] ?? '-' }}

                                        </td>
                                        <td>
                                            {{ $UserHoroscopeInfo->rasi_katam_row_1_col_4->flatten()->pluck('horoscope_name')[0] ?? '-' }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            {{ $UserHoroscopeInfo->rasi_katam_row_2_col_1->flatten()->pluck('horoscope_name')[0] ?? '-' }}
                                        </td>
                                        <td colspan="2">
                                            <h5>RASI</h5>
                                        </td>
                                        <td>
                                            {{ $UserHoroscopeInfo->rasi_katam_row_2_col_4->flatten()->pluck('horoscope_name')[0] ?? '-' }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            {{ $UserHoroscopeInfo->rasi_katam_row_3_col_1->flatten()->pluck('horoscope_name')[0] ?? '-' }}

                                        </td>
                                        <td colspan="2">
                                            <h5>CHART</h5>
                                        </td>
                                        <td>
                                            {{ $UserHoroscopeInfo->rasi_katam_row_3_col_4->flatten()->pluck('horoscope_name')[0] ?? '-' }}

                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            {{ $UserHoroscopeInfo->rasi_katam_row_4_col_1->flatten()->pluck('horoscope_name')[0] ?? '-' }}

                                        </td>
                                        <td>
                                            {{ $UserHoroscopeInfo->rasi_katam_row_4_col_2->flatten()->pluck('horoscope_name')[0] ?? '-' }}

                                        </td>
                                        <td>
                                            {{ $UserHoroscopeInfo->rasi_katam_row_4_col_3->flatten()->pluck('horoscope_name')[0] ?? '-' }}

                                        </td>
                                        <td>
                                            {{ $UserHoroscopeInfo->rasi_katam_row_4_col_4->flatten()->pluck('horoscope_name')[0] ?? '-' }}

                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    @endif

                    @if ($UserHoroscopeInfo->user_jathakam_navamsam_katam_is_filled == 1)
                        <div class="col-6">
                            <h5>Jathaka
                                Katam (NAVAASAM)</h5>
                            <table>
                                <tbody>
                                    <tr>
                                        <td>
                                            {{ $UserHoroscopeInfo->navam_katam_row_1_col_1->flatten()->pluck('horoscope_name')[0] ?? '-' }}
                                        </td>
                                        <td>
                                            {{ $UserHoroscopeInfo->navam_katam_row_1_col_2->flatten()->pluck('horoscope_name')[0] ?? '-' }}
                                        </td>
                                        <td>
                                            {{ $UserHoroscopeInfo->navam_katam_row_1_col_3->flatten()->pluck('horoscope_name')[0] ?? '-' }}
                                        </td>
                                        <td>
                                            {{ $UserHoroscopeInfo->navam_katam_row_1_col_4->flatten()->pluck('horoscope_name')[0] ?? '-' }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            {{ $UserHoroscopeInfo->navam_katam_row_2_col_1->flatten()->pluck('horoscope_name')[0] ?? '-' }}
                                        </td>
                                        <td colspan="2">
                                            <h5>NAVAMSAM</h5>
                                        </td>
                                        <td>
                                            {{ $UserHoroscopeInfo->navam_katam_row_2_col_4->flatten()->pluck('horoscope_name')[0] ?? '-' }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            {{ $UserHoroscopeInfo->navam_katam_row_3_col_1->flatten()->pluck('horoscope_name')[0] ?? '-' }}
                                        </td>
                                        <td colspan="2">
                                            <h5>CHART</h5>
                                        </td>
                                        <td>
                                            {{ $UserHoroscopeInfo->navam_katam_row_3_col_4->flatten()->pluck('horoscope_name')[0] ?? '-' }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            {{ $UserHoroscopeInfo->navam_katam_row_4_col_1->flatten()->pluck('horoscope_name')[0] ?? '-' }}
                                        </td>
                                        <td>
                                            {{ $UserHoroscopeInfo->navam_katam_row_4_col_2->flatten()->pluck('horoscope_name')[0] ?? '-' }}
                                        </td>
                                        <td>
                                            {{ $UserHoroscopeInfo->navam_katam_row_4_col_3->flatten()->pluck('horoscope_name')[0] ?? '-' }}
                                        </td>
                                        <td>
                                            {{ $UserHoroscopeInfo->navam_katam_row_4_col_4->flatten()->pluck('horoscope_name')[0] ?? '-' }}
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    @endif
                    {{-- @if ($UserHoroscopeInfo->user_jathakam_image_is_uploaded == 1)
                                        <div class="col-md-6 text-center">
                                            <a href="{{ $UserHoroscopeInfo->user_jathakam_image }}" target="_blank"
                                                rel="noopener noreferrer">
                                                <img src="{{ $UserHoroscopeInfo->user_jathakam_image }}"
                                                    class="card-img-top w-50 rounded">
                                            </a>
                                        </div>
                                    @endif --}}
                </div>
            </div>
        </div>
    @endif

</body>

</html>
