<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8;" />
    <style>
        body {
            font-family: "Dejavu Sans";
        }

    </style>
    <title>Document</title>
    <!-- CSS only -->
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap.min.css"
        integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap-theme.min.css"
        integrity="sha384-6pzBo3FDv/PJ8r2KRkGHifhEocL+1X2rVCTTkUfGk7/0pbek5mMa1upzvWbrUbOZ" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/js/bootstrap.min.js"
        integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous">
    </script>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-xs-4 align-middle col-xs-offset-2">
                {{-- <img src="{{ $userBasicInfo->image_with_path }}" alt=""> --}}

                <img width="75%"
                {{-- @if (!empty($userBasicInfo->image_with_path)) src="{{ $userBasicInfo->image_with_path }}"
                                                @else --}}
                    src="https://www.kindpng.com/picc/m/207-2074624_white-gray-circle-avatar-png-transparent-png.png"
                    {{-- @endif  --}}
                    alt="Preview">
            </div>

            <div class="col-xs-6">
                <h3 class="">{{ $userInfo->user_profile_id }}</h3>
                <h4><span class="text-dark">I'm</span>
                    {{ $userBasicInfo->user_full_name }}</h4>

                <ul class="text list-unstyled">
                    @if (!empty($userBasicInfo))
                        <li class="mt-2"><i class="fa-regular fa-calendar-check"></i>
                            &nbsp;{{ $userBasicInfo->age }}
                            Yrs</li>
                        <li class="mt-2"><i class="fa-solid fa-chess-queen"></i>
                            &nbsp;{{ $userBasicInfo->MartialStatus->martial_status_name }}
                        </li>
                    @endif

                    @if (!empty($userReligiousInfo))
                        <li class="mt-2"><i class="fa-brands fa-canadian-maple-leaf"></i>
                            &nbsp;{{ $userReligiousInfo->Religion->religion_name ?? '-' }},
                            {{ $userReligiousInfo->Caste->caste_name ?? '-' }}</li>
                    @endif

                    @if (!empty($userPlaceInfo))
                        <li class="mt-2"><i class="fa-solid fa-street-view"></i>
                            &nbsp;{{ $userPlaceInfo->userCity->city_name ?? '-' }}
                            ,{{ $userPlaceInfo->userState->state_name ?? '-' }}
                            ,{{ $userPlaceInfo->userCountry->country_name ?? '-' }}
                        </li>
                    @endif

                    @if (!empty($UserProfessionInfo))

                        <li class="mt-2"><i class="fa-solid fa-graduation-cap"></i>&nbsp;
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

        <div class="panel panel-primary">
            <div class="panel-heading">
                <h2 class="panel-title">Basic Information</h2>
            </div>
            <div class="panel-body">
                <ul class="">
                    <div class="row">
                        <div class="col-xs-4 col-xs-offset-1">
                            <li>
                                <span class="text-primary">
                                    Mobile No
                                    : </span>{{ $userInfo->phonenumber }}
                            </li>
                            <li>
                                <span class="text-primary">
                                    Alt. Mobile No :
                                </span>{{ $userInfo->userBasicInfos->user_mobile_no }}
                            </li>

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
                                {{ $userBasicInfo->Complex->complexion_name }}
                            </li>
                        </div>

                        <div class="col-xs-6 col-xs-offset-1">
                            <li>
                                <span class="text-primary">
                                    Mother Tongue :
                                </span>
                                {{ $userBasicInfo->MotherTongue->language_name }}
                            </li>
                            <li>
                                <span class="text-primary">
                                    Marital Status :
                                </span>
                                {{ $userBasicInfo->MartialStatus->martial_status_name }}
                            </li>
                            <li>
                                <span class="text-primary">
                                    Eating Habit :
                                </span>
                                {{ $userBasicInfo->EatingHabit->habit_type_name }}
                            </li>
                            <li>
                                <span class="text-primary">
                                    Disability :
                                </span>
                                {{ ($userBasicInfo->is_disable = 1) ? 'Yes' : 'No' }}
                            </li>
                        </div>
                    </div>
                </ul>
            </div>
        </div>


        @if (!empty($UserProfessionInfo))
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Professional Information</h3>
                </div>
                <div class="panel-body">
                    <div>
                        <ul>
                            <div class="row">
                                <div class="col-xs-4 col-xs-offset-1">
                                    <li><span class="text-primary">Education
                                            :</span>
                                        @forelse ($UserProfessionInfo->user_education_id as $education)
                                            {{ $education->education_name }},
                                        @empty
                                            <span>-</span>
                                        @endforelse
                                    </li>
                                    <li><span class="text-primary">Education
                                            Detials
                                            :</span>
                                        {{ $UserProfessionInfo->user_education_details }}
                                    </li>
                                    <li><span class="text-primary">Job
                                            :</span>
                                        {{ $UserProfessionInfo->Job->job_name }}
                                    </li>
                                    <li><span class="text-primary">Job
                                            Details :</span>
                                        {{ $UserProfessionInfo->user_job_details }}
                                    </li>
                                </div>
                                <div class="col-xs-6 col-xs-offset-1">
                                    <li><span class="text-primary">Annual
                                            Income :</span>
                                        {{ $UserProfessionInfo->user_annual_income }}
                                    </li>
                                    <li><span class="text-primary">Job
                                            Country :</span>
                                        {{ $UserProfessionInfo->JobCountry->country_name }}
                                    </li>
                                    <li><span class="text-primary">Job
                                            State :</span>
                                        {{ $UserProfessionInfo->JobState->state_name }}
                                    </li>
                                    <li><span class="text-primary">Job
                                            City :</span>
                                        {{ $UserProfessionInfo->JobCity->city_name }}
                                    </li>
                                </div>
                            </div>
                        </ul>
                    </div>
                </div>
            </div>
        @endif

        @if (!empty($userReligiousInfo))
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Religious Information</h3>
                </div>
                <div class="panel-body">
                    <div>
                        <ul>
                            <div class="row">
                                <div class="col-xs-4 col-xs-offset-1">
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
                                        {{ $userReligiousInfo->sub_caste }}
                                    </li>
                                    <li><span class="text-primary">Rasi
                                            :</span>
                                        {{ $userReligiousInfo->Rasi->rasi_name }}</li>
                                </div>
                                <div class="col-xs-6 col-xs-offset-1">
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
                            </div>
                        </ul>
                    </div>
                </div>
            </div>
        @endif


        @if (!empty($UserPreferenceInfo))
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Partner Preference </h3>
                </div>
                <div class="panel-body">
                    <ul>
                        <div class="row">
                            <div class="col-xs-4">
                                <li><span class="text-primary">Partner's Age :</span>
                                    {{ $UserPreferenceInfo->partner_age_from }} to
                                    {{ $UserPreferenceInfo->partner_age_to }}
                                </li>
                                <li><span class="text-primary">Partner's Height :</span>
                                    {{ $UserPreferenceInfo->HeightFrom->height_feet_cm }} to
                                    {{ $UserPreferenceInfo->HeightTo->height_feet_cm }}
                                </li>
                                <li><span class="text-primary">Marital
                                        Status :</span>
                                    {{ $UserPreferenceInfo->MartialStatus->martial_status_name }}
                                </li>
                                <li><span class="text-primary">Complexion :</span>
                                    @forelse ($UserPreferenceInfo->partner_complexion as $partner_complexion)
                                        {{ $partner_complexion->complexion_name }},
                                    @empty
                                        <span>-</span>
                                    @endforelse
                                </li>
                            </div>

                            <div class="col-xs-4">
                                <li><span class="text-primary">Mother
                                        Tongue :</span>
                                    @forelse ($UserPreferenceInfo->partner_mother_tongue as $partner_tongue)
                                        {{ $partner_tongue->language_name }},
                                    @empty
                                        <span>-</span>
                                    @endforelse
                                </li>
                                <li><span class="text-primary">Partner's Salary :</span>
                                    {{ $UserPreferenceInfo->partner_salary }}
                                </li>
                                <li><span class="text-primary">Partner's Location
                                        :</span>
                                    @forelse ($UserPreferenceInfo->partner_country as $partner_country)
                                        {{ $partner_country->country_name }},
                                    @empty
                                        <span>-</span>
                                    @endforelse
                                </li>
                                <li><span class="text-primary">Job
                                        Location :</span>
                                    @forelse ($UserPreferenceInfo->partner_job_country as $part_job_country)
                                        {{ $part_job_country->country_name }},
                                    @empty
                                        <span>-</span>
                                    @endforelse
                                </li>
                            </div>

                            <div class="col-xs-4">
                                <li><span class="text-primary">Partner's Education
                                        :</span>
                                    @forelse ($UserPreferenceInfo->partner_education as $partner_education)
                                        {{ $partner_education->education_name }},
                                    @empty
                                        <span>-</span>
                                    @endforelse
                                </li>
                                <li><span class="text-primary">Prefer
                                        Details :</span>
                                    {{ $UserPreferenceInfo->partner_education_details }}
                                </li>
                                <li><span class="text-primary">Partner Religion :</span>
                                    {{ $UserPreferenceInfo->Religion->religion_name }}
                                </li>
                                <li><span class="text-primary">Partner Caste :</span>
                                    {{ $UserPreferenceInfo->Caste->caste_name }}
                                </li>
                            </div>
                        </div>
                    </ul>
                </div>
            </div>
        @endif

        @if (!empty($UserHoroscopeInfo))
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Horoscope Information</h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                        @if ($UserHoroscopeInfo->user_jathakam_rasi_katam_is_filled == 1)
                            <div class="col-xs-6">
                                <h5 class="fw-normal text-center">Jathaka
                                    Katam (RASI)</h5>
                                <table class="table table-bordered mt-4">
                                    <tbody>
                                        <tr>
                                            <td class="jathakatam small text-center align-middle">
                                                {{ $UserHoroscopeInfo->rasi_katam_row_1_col_1->flatten()->pluck('horoscope_name')[0] ?? '-' }}
                                            </td>
                                            <td class="jathakatam small text-center align-middle">
                                                {{ $UserHoroscopeInfo->rasi_katam_row_1_col_2->flatten()->pluck('horoscope_name')[0] ?? '-' }}

                                            </td>
                                            <td class="jathakatam  small text-center align-middle">
                                                {{ $UserHoroscopeInfo->rasi_katam_row_1_col_3->flatten()->pluck('horoscope_name')[0] ?? '-' }}

                                            </td>
                                            <td class="jathakatam small text-center align-middle">
                                                {{ $UserHoroscopeInfo->rasi_katam_row_1_col_4->flatten()->pluck('horoscope_name')[0] ?? '-' }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="jathakatam small text-center align-middle">
                                                {{ $UserHoroscopeInfo->rasi_katam_row_2_col_1->flatten()->pluck('horoscope_name')[0] ?? '-' }}
                                            </td>
                                            <td colspan="2" class="bg-dark-lt align-middle">
                                                <h5 class="fw-light text-center">RASI</h5>
                                            </td>
                                            <td class="jathakatam small text-center align-middle">
                                                {{ $UserHoroscopeInfo->rasi_katam_row_2_col_4->flatten()->pluck('horoscope_name')[0] ?? '-' }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="jathakatam small text-center align-middle">
                                                {{ $UserHoroscopeInfo->rasi_katam_row_3_col_1->flatten()->pluck('horoscope_name')[0] ?? '-' }}

                                            </td>
                                            <td colspan="2" class="bg-dark-lt align-middle">
                                                <h5 class="fw-light text-center">CHART</h5>
                                            </td>
                                            <td class="jathakatam small text-center align-middle">
                                                {{ $UserHoroscopeInfo->rasi_katam_row_3_col_4->flatten()->pluck('horoscope_name')[0] ?? '-' }}

                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="jathakatam small text-center align-middle">
                                                {{ $UserHoroscopeInfo->rasi_katam_row_4_col_1->flatten()->pluck('horoscope_name')[0] ?? '-' }}

                                            </td>
                                            <td class="jathakatam small text-center align-middle">
                                                {{ $UserHoroscopeInfo->rasi_katam_row_4_col_2->flatten()->pluck('horoscope_name')[0] ?? '-' }}

                                            </td>
                                            <td class="jathakatam small text-center align-middle">
                                                {{ $UserHoroscopeInfo->rasi_katam_row_4_col_3->flatten()->pluck('horoscope_name')[0] ?? '-' }}

                                            </td>
                                            <td class="jathakatam small text-center align-middle">
                                                {{ $UserHoroscopeInfo->rasi_katam_row_4_col_4->flatten()->pluck('horoscope_name')[0] ?? '-' }}

                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        @endif

                        @if ($UserHoroscopeInfo->user_jathakam_navamsam_katam_is_filled == 1)
                            <div class="col-xs-6">
                                <h5 class="fw-normal text-center">Jathaka
                                    Katam (NAVAASAM)</h5>
                                <table class="table table-bordered mt-4">
                                    <tbody>
                                        <tr>
                                            <td class="jathakatam small text-center align-middle">
                                                {{ $UserHoroscopeInfo->navam_katam_row_1_col_1->flatten()->pluck('horoscope_name')[0] ?? '-' }}
                                            </td>
                                            <td class="jathakatam small text-center align-middle">
                                                {{ $UserHoroscopeInfo->navam_katam_row_1_col_2->flatten()->pluck('horoscope_name')[0] ?? '-' }}
                                            </td>
                                            <td class="jathakatam small text-center align-middle">
                                                {{ $UserHoroscopeInfo->navam_katam_row_1_col_3->flatten()->pluck('horoscope_name')[0] ?? '-' }}
                                            </td>
                                            <td class="jathakatam small text-center align-middle">
                                                {{ $UserHoroscopeInfo->navam_katam_row_1_col_4->flatten()->pluck('horoscope_name')[0] ?? '-' }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="jathakatam small text-center align-middle">
                                                {{ $UserHoroscopeInfo->navam_katam_row_2_col_1->flatten()->pluck('horoscope_name')[0] ?? '-' }}
                                            </td>
                                            <td colspan="2" class="bg-dark-lt align-middle">
                                                <h5 class="fw-light text-center">NAVAMSAM</h5>
                                            </td>
                                            <td class="jathakatam small text-center align-middle">
                                                {{ $UserHoroscopeInfo->navam_katam_row_2_col_4->flatten()->pluck('horoscope_name')[0] ?? '-' }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="jathakatam small text-center align-middle">
                                                {{ $UserHoroscopeInfo->navam_katam_row_3_col_1->flatten()->pluck('horoscope_name')[0] ?? '-' }}
                                            </td>
                                            <td colspan="2" class="bg-dark-lt align-middle">
                                                <h5 class="fw-light text-center">CHART</h5>
                                            </td>
                                            <td class="jathakatam small text-center align-middle">
                                                {{ $UserHoroscopeInfo->navam_katam_row_3_col_4->flatten()->pluck('horoscope_name')[0] ?? '-' }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="jathakatam small text-center align-middle">
                                                {{ $UserHoroscopeInfo->navam_katam_row_4_col_1->flatten()->pluck('horoscope_name')[0] ?? '-' }}
                                            </td>
                                            <td class="jathakatam small text-center align-middle">
                                                {{ $UserHoroscopeInfo->navam_katam_row_4_col_2->flatten()->pluck('horoscope_name')[0] ?? '-' }}
                                            </td>
                                            <td class="jathakatam small text-center align-middle">
                                                {{ $UserHoroscopeInfo->navam_katam_row_4_col_3->flatten()->pluck('horoscope_name')[0] ?? '-' }}
                                            </td>
                                            <td class="jathakatam small text-center align-middle">
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
    </div>
</body>

</html>
