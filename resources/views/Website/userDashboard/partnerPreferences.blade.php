@extends('Website.layouts.default')

@section('content')

    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-12">
                    <ul class="breadcrumb-nav">
                        <li><a href="{{ route('user.dashboard') }}">Home</a></li>
                        <li>Partner Preference</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <section class="dashboard mt-3">
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
                            <h3 class="text-center fw-light mt-3 mb-4">Tell Us Your Expectations About Partner !</h3>
                            <div class="post-ad-tab">
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="fw-normal">Basic Preference Details</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="profile-setting-form">
                                            <form id="basicpreferenceform" name="basicpreferenceform">
                                                @csrf
                                                @method('PUT')

                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <span>Age</span>
                                                        <div class="wrapper">
                                                            <div class="values">
                                                                <span id="range1">
                                                                    0
                                                                </span>
                                                                <span> &dash; </span>
                                                                <span id="range2">
                                                                    60
                                                                </span>
                                                            </div>
                                                            <div class="range-container pt-2">
                                                                <div class="slider-track"></div>
                                                                <input type="range" name="partner_age_from" min="0"
                                                                    max="60"
                                                                    value="{{ $data['partner']->partner_age_from ?? '18' }}"
                                                                    id="slider-1" oninput="slideOne()">
                                                                <input type="range" name="partner_age_to" min="0"
                                                                    max="60"
                                                                    value="{{ $data['partner']->partner_age_to ?? '30' }}"
                                                                    id="slider-2" oninput="slideTwo()">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    {{-- <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>Partner Age(From)</label>
                                                            <input name="partner_age_from" type="number"
                                                                placeholder="Enter Age "
                                                                value="{{ $partner->partner_age_from }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>Partner Age(To)</label>
                                                            <input name="partner_age_to" type="number"
                                                                placeholder="Enter Age"
                                                                value="{{ $partner->partner_age_to }}">
                                                        </div>
                                                    </div> --}}


                                                    <div class="  col-lg-4 col-12">
                                                        <div class="form-group">
                                                            <label>Height(From)</label>
                                                            <select class="form-control form-select"
                                                                name="partner_height_from"
                                                                aria-label="Default select example">
                                                                <option hidden selected value>Select Height</option>
                                                                @foreach ($data['height'] as $row)
                                                                    <option value="{{ $row->id }}"
                                                                        {{ $data['partner']->partner_height_from == $row->id ? 'selected' : '' }}>
                                                                        {{ $row->height_feet_cm }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-12">
                                                        <div class="form-group">
                                                            <label>Height(To)</label>
                                                            <select class="form-control form-select"
                                                                name="partner_height_to"
                                                                aria-label="Default select example">
                                                                <option hidden selected value>Select Height</option>
                                                                @foreach ($data['height'] as $row)
                                                                    <option value="{{ $row->id }}"
                                                                        {{ $data['partner']->partner_height_to == $row->id ? 'selected' : '' }}>
                                                                        {{ $row->height_feet_cm }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div class="form-group">
                                                            <label>Martial Status</label>
                                                            <select class="form-select" aria-label="Default select example"
                                                                id="mstatus" name="partner_martial_status">
                                                                <option hidden selected value="">Select Martial Status
                                                                </option>
                                                                @foreach ($data['martial_status'] as $row)
                                                                    <option value="{{ $row->id }}"
                                                                        {{ $data['partner']->partner_martial_status == $row->id ? 'selected' : '' }}>
                                                                        {{ $row->martial_status_name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-12">
                                                        <div class="form-group">
                                                            <label>Complexion</label>
                                                            <select id="complexion_select" name="partner_complexion[]"
                                                                multiple>

                                                                @foreach ($data['complexion'] as $row)
                                                                    <option value="{{ $row->id }}"
                                                                        @if (in_array($row->id, $complexionId)) selected="in_array( $complexionId == $row->id)">
                                                                                {{ $row->complexion_name }}
                                                                                 @else > {{ $row->complexion_name }} @endif
                                                                        </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-12">
                                                        <div class="form-group">
                                                            <label>Prefer Language</label>
                                                            <select id="language_select" name="partner_mother_tongue[]"
                                                                multiple>

                                                                @foreach ($data['language'] as $row)
                                                                    <option value="{{ $row->id }}"
                                                                        @if (in_array($row->id, $LanguageId)) selected="in_array( $LanguageId == $row->id)">
                                                                                    {{ $row->language_name }}
                                                                                     @else > {{ $row->language_name }} @endif
                                                                        </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-4 col-12">
                                                        <div class="form-group">
                                                            <label>Country</label>
                                                            <select name="partner_country[]" id="partner_country" multiple>
                                                                @foreach ($data['country'] as $row)
                                                                    <option value="{{ $row->id }}"
                                                                        @if (in_array($row->id, $countryId)) selected="in_array( $countryId == $row->id)">
                                                                                        {{ $row->country_name }}
                                                                                         @else > {{ $row->country_name }} @endif
                                                                        </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 mt-2">
                                                        <button id="updatebasicpref" type="button"
                                                            class="btn btn-primary btn-sm float-end">Update Basic
                                                            Preferences</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="fw-normal">Professional Preference Details</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="profile-setting-form">
                                            <form id="profpreferenceform" name="profpreferenceform">
                                                @csrf
                                                @method('PUT')
                                                <div class="row">

                                                    <div class="col-lg-6 col-12">
                                                        <div class="form-group mb-3">
                                                            <label>Education</label>
                                                            <select id="education_select" name="partner_education[]"
                                                                multiple>

                                                                @foreach ($data['education'] as $row)
                                                                    <option value="{{ $row->id }}"
                                                                        @if (in_array($row->id, $educationId)) selected="in_array( $educationId == $row->id)">
                                                                            {{ $row->education_name }}
                                                                             @else > {{ $row->education_name }} @endif
                                                                        </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-6 col-12">
                                                        <div class="form-group mb-3">
                                                            <label>Job</label>
                                                            <select id="job_select" name="partner_job[]" multiple>
                                                                @foreach ($data['job'] as $row)
                                                                    <option value="{{ $row->id }}"
                                                                        @if (in_array($row->id, $jobId)) selected="in_array( $jobId == $row->id)">
                                                                        {{ $row->job_name }}
                                                                         @else > {{ $row->job_name }} @endif
                                                                        </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-12">
                                                        <div class="form-group ">
                                                            <label>Education In Detail</label>
                                                            <input name="partner_education_details" type="text"
                                                                placeholder="Describe your education"
                                                                value="{{ $data['partner']->partner_education_details }}">
                                                        </div>
                                                    </div>


                                                    <div class="col-lg-4 col-12">
                                                        <div class="form-group">
                                                            <label>Job In Detail</label>
                                                            <input name="partner_job_details" type="text"
                                                                placeholder="Describe your Job"
                                                                value="{{ $data['partner']->partner_job_details }}">
                                                        </div>
                                                    </div>
                                                    <div class="    col-lg-4 col-12">
                                                        <div class="form-group">
                                                            <label>Job In Country</label>
                                                            <select name="partner_job_country[]" id="partner_job_country"
                                                                multiple>
                                                                {{-- <option hidden selected value>Select Country
                                                                </option> --}}
                                                                @foreach ($data['country'] as $row)
                                                                    <option value="{{ $row->id }}"
                                                                        @if (in_array($row->id, $jobCountry)) selected="in_array( $jobCountry == $row->id)">
                                                                            {{ $row->country_name }}
                                                                             @else > {{ $row->country_name }} @endif
                                                                        </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    {{-- <div class="col-lg-4 col-12">
                                                        <div class="form-group">
                                                            <label>Job In State</label>
                                                            <select class="form-control form-select"
                                                                name="partner_job_state" id="partner_job_state">
                                                                <option hidden selected value>Select State</option>
                                                                @foreach ($state as $row)
                                                                    <option value="{{ $row->id }}"
                                                                        {{ $partner->partner_job_state == $row->id ? 'selected' : '' }}>
                                                                        {{ $row->state_name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-12">
                                                        <div class="form-group">
                                                            <label>Job In City</label>
                                                            <select class="form-control form-select" name="partner_job_city"
                                                                id="partner_job_city">
                                                                <option hidden selected value>Select City</option>
                                                                @foreach ($city as $row)
                                                                    <option value="{{ $row->id }}"
                                                                        {{ $partner->partner_job_city == $row->id ? 'selected' : '' }}>
                                                                        {{ $row->city_name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div> --}}
                                                    <div class="col-lg-4 col-12">
                                                        <div class="form-group">
                                                            <label>Annual Income</label>
                                                            <select class="form-control form-select"
                                                                name="partner_annual_income">

                                                                @foreach ($data['salary'] as $row)
                                                                    <option value="{{ $row->id }}"
                                                                        {{ $data['partner']->partner_salary == $row->id ? 'selected' : '' }}>
                                                                        {{ $row->salary_amount }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    {{-- <div class="col-12 mt-3 mb-3">
                                                        <div class="form-group">
                                                            <label>Annual Income<span
                                                                    class="text-danger">*</span></label>
                                                            <div class="range-slider">
                                                                <div id="tooltip"></div>
                                                                <input name="partner_annual_income" id="range" type="range"
                                                                    min="50000" max="10000000" step="25000" value="50000">
                                                            </div>
                                                        </div>
                                                    </div> --}}

                                                    <div class="col-12 mt-3 mb-3">

                                                        <button id="updateprofpref" type="button"
                                                            class="btn btn-primary btn-sm float-end">Update
                                                            Professional Preferences</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="fw-normal">Religious Details</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="profile-setting-form">
                                            <form id="relpreferenceform" name="relpreferenceform">
                                                @csrf
                                                @method('PUT')
                                                <div class="row">
                                                    <div class="col-lg-4 col-12">
                                                        <div class="form-group">
                                                            <label>Caste No Bar</label>
                                                            <select class="form-control form-select"
                                                                aria-label="Default select example" id="caste_no_bar"
                                                                name="caste_no_bar">
                                                                <option hidden selected value>Select</option>
                                                                <option value="1"
                                                                    @if ($data['partner']->caste_no_bar == 1) {{ 'selected' }} @endif>
                                                                    Yes</option>
                                                                <option value="0"
                                                                    @if ($data['partner']->caste_no_bar == 0) {{ 'selected' }} @endif>
                                                                    No</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-12">
                                                        <div class="form-group">
                                                            <label>Religion</label>
                                                            <select class="form-control form-select"
                                                                name="partner_religion" id="partner_religion">
                                                                <option hidden selected value>Select Religion</option>
                                                                @foreach ($data['religion'] as $row)
                                                                    <option value="{{ $row->id }}"
                                                                        {{ $data['partner']->partner_religion == $row->id ? 'selected' : '' }}>
                                                                        {{ $row->religion_name }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-12">
                                                        <div class="form-group">
                                                            <label>Caste<span class="small text-primary">(Select
                                                                    religion first )</span></label>
                                                            <select class="form-control form-select" name="partner_caste"
                                                                id="partner_caste">
                                                                <option hidden selected value>Select
                                                                    Caste</option>
                                                                @foreach ($data['caste'] as $row)
                                                                    <option value="{{ $row->id }}"
                                                                        {{ $data['partner']->partner_caste == $row->id ? 'selected' : '' }}>
                                                                        {{ $row->caste_name }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    {{-- <div class="col-lg-4 col-12">
                                                        <div class="form-group">
                                                            <label>Sub-Caste</label>
                                                            <input name="partner_subcaste" type="text"
                                                                placeholder="Enter Your Sub Caste" value="{{ $partner->partner_sub_caste}}">
                                                        </div>
                                                    </div> --}}
                                                    <div class="col-lg-4 col-12">
                                                        <div class="form-group">
                                                            <label>Rasi</label>
                                                            <select name="partner_rasi[]" id="partner_rasi" multiple>
                                                                {{-- <option hidden selected value>Select
                                                                    Rasi</option> --}}
                                                                @foreach ($data['rasi'] as $row)
                                                                    <option value="{{ $row->id }}"
                                                                        @if (in_array($row->id, $rasiId)) selected="in_array( $rasiId == $row->id)">
                                                                            {{ $row->rasi_name }}
                                                                             @else > {{ $row->rasi_name }} @endif
                                                                        </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    {{-- <div class="col-lg-4 col-12">
                                                        <div class="form-group">
                                                            <label>Star(Natchathiram)</label>
                                                            <select class="form-control form-select" name="partner_star"
                                                                id="partner_star">
                                                                <option hidden selected value>Select
                                                                    Star</option>
                                                                @foreach ($star as $row)
                                                                    <option value="{{ $row->id }}"
                                                                        {{ $partner->partner_star == $row->id ? 'selected' : '' }}>
                                                                        {{ $row->star_name }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div> --}}
                                                    {{-- <div class="col-lg-4 col-12">
                                                        <div class="form-group">
                                                            <label>Dhosham</label>
                                                            <select class="form-control form-select"
                                                                aria-label="Default select example" name="partner_dhosam"
                                                                id="partner_dhosam">
                                                                <option hidden selected value>Select
                                                                    Dhosham</option>

                                                                <option value="1"
                                                                    @if ($data['partner']->partner_dhosam == '1') {{ 'selected' }} @endif>
                                                                    Yes</option>
                                                                <option value="2"
                                                                    @if ($data['partner']->partner_dhosam == '2') {{ 'selected' }} @endif>
                                                                    No</option>
                                                                <option value="3"
                                                                    @if ($data['partner']->partner_dhosam == '3') {{ 'selected' }} @endif>
                                                                    Dont' Know</option>
                                                            </select>
                                                        </div>
                                                    </div> --}}
                                                    <div class="col-12">
                                                        <button id="updatereligiouspref" type="button"
                                                            class="btn btn-primary btn-sm float-end">Update
                                                            Religious Preferences</button>
                                                    </div>
                                                </div>
                                            </form>
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

    <script>
        // $('#jobselect').select2({
        //     width: '100%',
        //     placeholder: "Select an Option",
        //     allowClear: true
        // });

        $(document).ready(function() {
            var x = new SlimSelect({
                select: '#education_select',
                placeholder: 'Select Education',

            });

            var job_select = new SlimSelect({
                select: '#job_select',
                placeholder: 'Select Job',

            });

            var x = new SlimSelect({
                select: '#complexion_select',
                placeholder: 'Select Complexion',
            });
            var x = new SlimSelect({
                select: '#language_select',
                placeholder: 'Select Language',
            });
            var x = new SlimSelect({
                select: '#partner_country',
                placeholder: 'Select Country',
            });
            var x = new SlimSelect({
                select: '#partner_rasi',
                placeholder: 'Select Rasi',
            });
            var x = new SlimSelect({
                select: '#partner_job_country',
                placeholder: 'Select Job Country',
            });

            // $('.select2-multiple').select2({
            //     width: '100%',
            //     placeholder: "Select an Option",
            //     allowClear: true
            // });

            // Partner Basic Preference Info Update
            let basicpreference = $("#basicpreferenceform").prop('elements');

            $.each(basicpreference, function(i, field) {
                $(this).on("click", function() {
                    let labels = $(this).siblings('label');
                    let errMsg = "";

                    if (labels.children()[1]) {
                        labels.children()[1].remove();
                    }

                    $(this).removeClass('')
                });

            });
            $("#updatebasicpref").click(function() {

                let valid = false;
                let basicpreferences = $("#basicpreferenceform").prop('elements');

                $.each(basicpreferences, function(i, field) {
                    const inputs = ['lname', 'about', 'mobile', undefined];
                    let inputName = $(this).attr('name');
                    let inputVal = $(this).val();

                    let labels = $(this).siblings('label');
                    let errMsg = "";

                    if (inputs.includes(inputName)) {
                        return;
                    } else {
                        if (inputVal === '') {
                            $(this).addClass('');
                            if (labels.children()[1]) {
                                labels.children()[1].remove();
                            }
                            labels.append(errMsg);
                            valid = false;
                        } else {
                            valid = true;
                        }
                    }
                });

                let profInfoForm = $("#basicpreferenceform").serializeArray();
                let formData = new FormData();
                let URL = "{{ route('basic.preference.update', $user->id) }}";
                $.each(profInfoForm, function(i, field) {
                    formData.append(field.name, field.value);
                });


                if (valid) {

                    $.ajax({
                        url: URL,
                        type: "POST",
                        data: formData,
                        processData: false,
                        contentType: false,
                        success: function(data, textStatus, jqXHR) {
                            toastr.success(data.message);

                        },
                        error: function(jqXHR, textStatus, errorThrown) {
                            // console.log(errorThrown);
                            toastr.error(errorThrown);
                        }
                    });
                }

                event.preventDefault();
            });

            // Partner Professional Details Update
            let profprefDetail = $("#profpreferenceform").prop('elements');

            $.each(profprefDetail, function(i, field) {
                $(this).on("click", function() {
                    let labels = $(this).siblings('label');
                    let errMsg = "";

                    if (labels.children()[1]) {
                        labels.children()[1].remove();
                    }

                    $(this).removeClass('')
                });

            });
            $("#updateprofpref").click(function() {

                let valid = false;
                let profprefDetails = $("#profpreferenceform").prop('elements');

                $.each(profprefDetails, function(i, field) {
                    const inputs = ['lname', 'about', 'mobile', undefined];
                    let inputName = $(this).attr('name');
                    let inputVal = $(this).val();

                    let labels = $(this).siblings('label');
                    let errMsg = "";

                    if (inputs.includes(inputName)) {
                        return;
                    } else {
                        if (inputVal === '') {
                            $(this).addClass('');
                            if (labels.children()[1]) {
                                labels.children()[1].remove();
                            }
                            labels.append(errMsg);
                            valid = false;
                        } else {
                            valid = true;
                        }
                    }
                });

                let profInfoForm = $("#profpreferenceform").serializeArray();
                let formData = new FormData();
                let URL = "{{ route('professional.preference.update', $user->id) }}";
                $.each(profInfoForm, function(i, field) {
                    formData.append(field.name, field.value);
                });


                if (valid) {

                    $.ajax({
                        url: URL,
                        type: "POST",
                        data: formData,
                        processData: false,
                        contentType: false,
                        success: function(data, textStatus, jqXHR) {
                            toastr.success(data.message);

                        },
                        error: function(jqXHR, textStatus, errorThrown) {
                            // console.log(errorThrown);
                            toastr.error(errorThrown);
                        }
                    });
                }

                event.preventDefault();
            });
            // ##############
            // Partner Religious Details Update
            let relprefDetail = $("#relpreferenceform").prop('elements');

            $.each(relprefDetail, function(i, field) {
                $(this).on("click", function() {
                    let labels = $(this).siblings('label');
                    let errMsg = "";

                    if (labels.children()[1]) {
                        labels.children()[1].remove();
                    }

                    $(this).removeClass('')
                });

            });
            $("#updatereligiouspref").click(function() {

                let valid = false;
                let relprefDetails = $("#relpreferenceform").prop('elements');

                $.each(relprefDetails, function(i, field) {
                    const inputs = ['lname', 'about', 'mobile', undefined];
                    let inputName = $(this).attr('name');
                    let inputVal = $(this).val();

                    let labels = $(this).siblings('label');
                    let errMsg = "";

                    if (inputs.includes(inputName)) {
                        return;
                    } else {
                        if (inputVal === '') {
                            $(this).addClass('');
                            if (labels.children()[1]) {
                                labels.children()[1].remove();
                            }
                            labels.append(errMsg);
                            valid = false;
                        } else {
                            valid = true;
                        }
                    }
                });

                let profInfoForm = $("#relpreferenceform").serializeArray();
                let formData = new FormData();
                let URL = "{{ route('religious.preference.update', $user->id) }}";
                $.each(profInfoForm, function(i, field) {
                    formData.append(field.name, field.value);
                });


                if (valid) {

                    $.ajax({
                        url: URL,
                        type: "POST",
                        data: formData,
                        processData: false,
                        contentType: false,
                        success: function(data, textStatus, jqXHR) {
                            toastr.success(data.message);

                        },
                        error: function(jqXHR, textStatus, errorThrown) {
                            // console.log(errorThrown);
                            toastr.error(errorThrown);
                        }
                    });
                }

                event.preventDefault();
            });
            // ##############
            //Dynamic Dropdown - Partner  Native Info
            $('#partner_country').on('change', function() {
                var countryId = this.value;
                $('#partner_state').html('');
                $.ajax({
                    url: '{{ route('getStates') }}?country_id=' + countryId,
                    type: 'get',
                    success: function(res) {
                        $('#partner_state').html('<option value="" >Select State</option>');
                        $.each(res, function(key, value) {
                            $('#partner_state').append('<option value="' + value
                                .id + '">' + value.state_name + '</option>');
                        });
                        $('#partner_city').html('<option value="">Select City</option>');
                    }
                });
            });
            $('#partner_state').on('change', function() {
                var stateId = this.value;
                $('#partner_city').html('');
                $.ajax({
                    url: '{{ route('getCities') }}?state_id=' + stateId,
                    type: 'get',
                    success: function(res) {
                        $('#partner_city').html('<option value="">Select City</option>');
                        $.each(res, function(key, value) {
                            $('#partner_city').append('<option value="' + value
                                .id + '">' + value.city_name + '</option>');
                        });
                    }
                });
            });
            //Job Country-State-City
            $('#partner_job_country').on('change', function() {
                var countryId = this.value;
                $('#partner_job_state').html('');
                $.ajax({
                    url: '{{ route('getStates') }}?country_id=' + countryId,
                    type: 'get',
                    success: function(res) {
                        $('#partner_job_state').html('<option value="">Select State</option>');
                        $.each(res, function(key, value) {
                            $('#partner_job_state').append('<option value="' + value
                                .id + '">' + value.state_name + '</option>');
                        });
                        $('#partner_job_city').html('<option value="">Select City</option>');
                    }
                });
            });
            $('#partner_job_state').on('change', function() {
                var stateId = this.value;
                $('#partner_job_city').html('');
                $.ajax({
                    url: '{{ route('getCities') }}?state_id=' + stateId,
                    type: 'get',
                    success: function(res) {
                        $('#partner_job_city').html('<option value="">Select City</option>');
                        $.each(res, function(key, value) {
                            $('#partner_job_city').append('<option value="' + value
                                .id + '">' + value.city_name + '</option>');
                        });
                    }
                });
            });

            //Religion-caste Dropdown
            $('#partner_religion').on('change', function() {
                var religionID = this.value;
                $('#partner_caste').html('');
                $.ajax({
                    url: '{{ route('getCaste') }}?religion_id=' + religionID,
                    type: 'get',
                    success: function(res) {
                        $('#partner_caste').html('<option value="">Select Caste</option>');
                        $.each(res, function(key, value) {
                            $('#partner_caste').append('<option value="' + value
                                .id + '">' + value.caste_name + '</option>');
                        });

                    }
                });
            });

            // Rasi-Star DROPDOWN
            // $('#partner_rasi').on('change', function() {
            //     var rasiID = this.value;
            //     $('#partner_star').html('');
            //     $.ajax({
            //         url: '{{ route('getStar') }}?rasi_id=' + rasiID,
            //         type: 'get',
            //         success: function(res) {
            //             $('#partner_star').html('<option value="">Select Star</option>');
            //             $.each(res, function(key, value) {
            //                 $('#partner_star').append('<option value="' + value
            //                     .id + '">' + value.star_name + '</option>');
            //             });

            //         }
            //     });
            // });


            //Religion-caste Dropdown
            // $('#partner_religion').on('change', function() {
            //     var religionID = $(this).val();
            //     if (religionID) {
            //         $.ajax({
            //             url: '/getCaste/' + religionID,
            //             type: "GET",
            //             data: {
            //                 "_token": "{{ csrf_token() }}"
            //             },
            //             dataType: "json",
            //             success: function(data) {
            //                 if (data) {
            //                     $('#partner_caste').empty();
            //                     $('#partner_caste').append(
            //                         '<option  hidden>Choose Caste</option>');
            //                     $.each(data, function(key, value) {
            //                         $('select[name="partner_caste"]').append(
            //                             '<option value="' +
            //                             value.id +
            //                             '">' + value.caste_name + '</option>');
            //                     });
            //                 } else {
            //                     $('#partner_caste').empty();
            //                 }
            //             }
            //         });
            //     } else {
            //         $('#partner_caste').empty();
            //     }
            // });
            // //RASI-STAR-dropdown
            // $('#partner_rasi').on('change', function() {
            //     var rasiID = $(this).val();
            //     if (rasiID) {
            //         $.ajax({
            //             url: '/getStar/' + rasiID,
            //             type: "GET",
            //             data: {
            //                 "_token": "{{ csrf_token() }}"
            //             },
            //             dataType: "json",
            //             success: function(data) {
            //                 if (data) {
            //                     $('#partner_star').empty();
            //                     $('#partner_star').append(
            //                         '<option  hidden>Choose Star</option>');
            //                     $.each(data, function(key, value) {
            //                         $('select[name="partner_star"]').append(
            //                             '<option value="' +
            //                             value.id +
            //                             '">' + value.star_name + '</option>');
            //                     });
            //                 } else {
            //                     $('#partner_star').empty();
            //                 }
            //             }
            //         });
            //     } else {
            //         $('#partner_star').empty();
            //     }
            // });
        });
        //
        const
            range = document.getElementById('range'),
            tooltip = document.getElementById('tooltip'),
            setValue = () => {
                const
                    newValue = Number((range.value - range.min) * 100 / (range.max - range.min)),
                    newPosition = 16 - (newValue * 0.32);
                tooltip.innerHTML = `<span>${range.value}</span>`;
                tooltip.style.left = `calc(${newValue}% + (${newPosition}px))`;
                document.documentElement.style.setProperty("--range-progress", `calc(${newValue}% + (${newPosition}px))`);
            };
        document.addEventListener("DOMContentLoaded", setValue);
        range.addEventListener('input', setValue);
    </script>

@stop
