@extends('Website.layouts.default')

@php
$image_src = $user_data['user_info']->gender_id == 1 ? asset('assets/Website/male.png') : asset('assets/Website/female.png');
@endphp

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
                    @php
                    $user=App\Models\User::find(auth()->user()->id)->load('userBasicInfo');
                    [$performance,$bgColor]=App\Helpers\UserSideBar\UserSideBarHelper::make($user)->logic();
                @endphp
                <x-user-dashboard.side-bar  :user="$user" :status="0" :performance="$performance" :bgColor="$bgColor" />
                </div>

                <div class="col-lg-9 col-md-8 col-12">
                    <div class="main-content">
                        <div class="dashboard-block mt-0 profile-settings-block mb-3">
                            <h4 class="text-center fw-light mt-2 mb-2">Update Your Profile Here !</h4>
                            <div class="post-ad-tab">
                                <div class="text-center">
                                    <form id="profileImgForm">
                                        @csrf
                                        <div class="image">
                                            <img class='shadow' id='profileImg'
                                                @if ($user_data['user_image_with_path']) src="{{ $user_data['user_image_with_path'] }}"
                                                @else
                                                    src="{{ $image_src }}" @endif
                                                alt="Preview">
                                        </div>
                                        <input class="d-none" type="file" name='profileImage' id="profileInput"
                                            accept="image/*">

                                        <div class="mt-2">
                                            <button type="button" id="profileUpload" class="btn btn-primary btn-sm"
                                                name="profile_pic"><i class="lni lni-add-files"></i> Upload</button>
                                            <button type="button" id="profileClear" class="btn btn-danger btn-sm"><i
                                                    class="lni lni-trash"></i> Delete</button>
                                        </div>
                                    </form>
                                </div>
                                <br>

                                <div class="accordion" id="accordionExample">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingOne">
                                            <button class="accordion-button fw-normal" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true"
                                                aria-controls="collapseOne">
                                                1.Basic Details <i class="lni lni-chevron-down"></i>
                                            </button>

                                        </h2>
                                        <div id="collapseOne" class="accordion-collapse collapse show"
                                            aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                <div class="profile-setting-form">
                                                    <form id="basicDetailsForm" name="basicDetailsForm">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="row">
                                                            <div class="col-lg-4">
                                                                <div class="form-group">
                                                                    <label>User Full Name<span class="small text-secondary">
                                                                            &nbsp;(Optional)</span></label>
                                                                    <input name="user_full_name" id="user_full_name"
                                                                        type="text"
                                                                        value="{{ $user_data['user_info']->user_full_name }}"
                                                                        placeholder="Enter Your Last Name">
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-4 ">
                                                                <div class="form-group">
                                                                    <label>Date of Birth<span
                                                                            class="text-danger">*</label>
                                                                    <input name="dob" type="date" class="bg-muted"
                                                                        onclick="this.max=`${(new Date().getFullYear()) - 18}-12-31`"
                                                                        value="{{ $user_data['user_info']->dob }}">
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-4">
                                                                <div class="form-group">
                                                                    <label>Age<span class="text-danger">*</span></label>
                                                                    <input name="age" id='userAge' type="text"
                                                                        class="form-input bg-muted" readonly>
                                                                </div>
                                                            </div>

                                                            <div class="col-lg-4">
                                                                <div class="">
                                                                    <label>Gender<span
                                                                            class="text-danger">*</span></label>
                                                                    <select class="form-control form-select" name="gender"
                                                                        aria-label="Default select example">
                                                                        <option hidden selected value>Select Gender
                                                                        </option>
                                                                        @foreach ($user_data['gender'] as $row)
                                                                            <option value="{{ $row->id }}"
                                                                                {{ $user_data['user_info']->gender_id == $row->id ? 'selected' : '' }}>
                                                                                {{ $row->gender_name }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>

                                                            <div class="col-lg-4">
                                                                <div class="form-group">
                                                                    <label>Mobile<span class="small text-secondary">
                                                                            &nbsp;(Alternative)</span></label>
                                                                    <input type="tel" id="phone" maxlength="10"
                                                                        name="mobile" placeholder="+91"
                                                                        value="{{ $user_data['user_info']->user_mobile_no }}">
                                                                </div>
                                                            </div>


                                                            <div class="col-lg-4 col-12">
                                                                <div class="form-group">
                                                                    <label>Height<span
                                                                            class="text-danger">*</span></label>
                                                                    <select class="form-control form-select" name="height"
                                                                        aria-label="Default select example">
                                                                        <option hidden selected value>Select Height
                                                                        </option>
                                                                        @foreach ($user_data['height'] as $row)
                                                                            <option value="{{ $row->id }}"
                                                                                {{ $user_data['user_info']->user_height_id == $row->id ? 'selected' : '' }}>
                                                                                {{ $row->height_feet_cm }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>

                                                            <div class="col-lg-4">
                                                                <div class="form-group">
                                                                    <label>Martial Status<span
                                                                            class="text-danger">*</span></label>
                                                                    <select class="form-select"
                                                                        aria-label="Default select example"
                                                                        id="martialStatus" name="martial_status">
                                                                        <option hidden selected value="">Select Martial
                                                                            Status
                                                                        </option>
                                                                        @foreach ($user_data['martial_status'] as $row)
                                                                            <option value="{{ $row->id }}"
                                                                                {{ $user_data['user_info']->martial_id == $row->id ? 'selected' : '' }}>
                                                                                {{ $row->martial_status_name }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-4 col-12">
                                                                <div class="form-group">
                                                                    <label>Mother Tongue<span
                                                                            class="text-danger">*</span></label>
                                                                    <select class="form-select"
                                                                        aria-label="Default select example"
                                                                        id="motherTongue" name="mother_tongue">
                                                                        <option hidden selected value="">Select Your Mother
                                                                            Tongue
                                                                        </option>
                                                                        @foreach ($user_data['language'] as $row)
                                                                            <option value="{{ $row->id }}"
                                                                                {{ $user_data['user_info']->user_mother_tongue == $row->id ? 'selected' : '' }}>
                                                                                {{ $row->language_name }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-4 col-12">
                                                                <div class="form-group">
                                                                    <label>Complexion<span
                                                                            class="text-danger">*</span></label>
                                                                    <select class="form-select"
                                                                        aria-label="Default select example"
                                                                        id="complexion_select" name="user_complexion">
                                                                        <option hidden selected>Select Your
                                                                            Complexion
                                                                        </option>
                                                                        @foreach ($user_data['complexion'] as $row)
                                                                            <option value="{{ $row->id }}"
                                                                                {{ $user_data['user_info']->user_complexion_id == $row->id ? 'selected' : '' }}>
                                                                                {{ $row->complexion_name }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-4 col-12">
                                                                <div class="form-group">
                                                                    <label>Eating Habit<span
                                                                            class="text-danger">*</span></label>
                                                                    <select class="form-control form-select"
                                                                        name="eating_habit" id="eatingHabit">
                                                                        <option hidden selected value="">Select</option>
                                                                        @foreach ($user_data['habit'] as $row)
                                                                            <option value="{{ $row->id }}"
                                                                                {{ $user_data['user_info']->user_eating_habit_id == $row->id ? 'selected' : '' }}>
                                                                                {{ $row->habit_type_name }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-4 col-12">
                                                                <div class="form-group">
                                                                    <label>Blood Group<span
                                                                            class="text-danger">*</span></label>
                                                                    <select class="form-control form-select"
                                                                        name="blood_group" id="bloodGroup">
                                                                        <option hidden selected
                                                                            value="{{ $user_data['user_info']->blood_group ?? '' }}">
                                                                            {{ $user_data['user_info']->blood_group ?? 'Select' }}
                                                                        </option>
                                                                        <option value="A+">A+</option>
                                                                        <option value="B+">B+</option>
                                                                        <option value="AB+">AB+</option>
                                                                        <option value="O+">O+</option>
                                                                        <option value="A-">A-</option>
                                                                        <option value="B-">B-</option>
                                                                        <option value="AB-">AB-</option>
                                                                        <option value="O-">O-</option>
                                                                    </select>
                                                                </div>
                                                            </div>

                                                            <div class="col-lg-4 col-12">
                                                                <div class="form-group">
                                                                    <label>Disability<span
                                                                            class="text-danger">*</span></label>
                                                                    <select class="form-control form-select"
                                                                        name="disability" id="disability">
                                                                        <option disabled hidden value="">Select
                                                                        </option>
                                                                        <option value="1"
                                                                            @if ($user_data['user_info']->disability == '1') {{ 'selected' }} @endif>
                                                                            No</option>
                                                                        <option value="2"
                                                                            @if ($user_data['user_info']->disability == '2') {{ 'selected' }} @endif>
                                                                            Yes</option>

                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-6">
                                                                <div class="">
                                                                    <label for="user_address" class="text-dark">Address
                                                                        <span class="small text-danger">*
                                                                        </span></label>
                                                                    <textarea style="text-align: left" class="form-control text-justify" name='user_address' id="userAddress" rows="1"
                                                                        value="{{ $user_data['user_info']->user_address }}">{{ $user_data['user_info']->user_address }}</textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-6">
                                                                <div class="">
                                                                    <label for="exampleFormControlTextarea1"
                                                                        class="text-dark">About
                                                                        You<span class="small text-secondary">
                                                                            &nbsp;(Optional)</span></label>
                                                                    <textarea style="text-align: left" class="form-control text-left" name="about" id="about" rows="1"
                                                                        value="{{ $user_data['user_info']->about }}"></textarea>
                                                                </div>
                                                            </div>

                                                            <div class="col-12 mt-3 mb-3">
                                                                <button id="updateBasicDetails" type="button"
                                                                    class="btn btn-primary btn-sm float-end">Update
                                                                    Basic
                                                                    Details</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingTwo">
                                            <button class="accordion-button collapsed fw-normal" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#collapseTwo"
                                                aria-expanded="false" aria-controls="collapseTwo">
                                                2.Family Details <i class="lni lni-chevron-down"></i>
                                            </button>
                                        </h2>
                                        <div id="collapseTwo" class="accordion-collapse collapse"
                                            aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                <div class="profile-setting-form">
                                                    <form id="familyInfoForm" name="familyInfoForm">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="row">
                                                            <div class="col-lg-4 col-12">
                                                                <div class="form-group">
                                                                    <label>Father/Gaurdian Name<span
                                                                            class="text-danger">*</span></label>
                                                                    <input name="user_father_name" type="text"
                                                                        placeholder="Enter Your Father/Guardian Name"
                                                                        value="{{ $user_data['user_family_info']->user_father_name }}">
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-4 col-12">
                                                                <div class="form-group">
                                                                    <label>Mother Name<span
                                                                            class="text-danger">*</span></label>
                                                                    <input name="user_mother_name" type="text"
                                                                        placeholder="Enter Your Mothername/Guardian Name"
                                                                        value="{{ $user_data['user_family_info']->user_mother_name }}">
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-4 col-12">
                                                                <div class="form-group">
                                                                    <label>Father Occupation<span
                                                                            class="text-danger">*</span></label>
                                                                    <input name="user_father_job_details" type="text"
                                                                        placeholder="Enter Your Father Occupation"
                                                                        value="{{ $user_data['user_family_info']->user_father_job_details }}">
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-4 col-12">
                                                                <div class="form-group">
                                                                    <label>Mother Occupation<span
                                                                            class="text-danger">*</span></label>
                                                                    <input name="user_mother_job_details" type="text"
                                                                        placeholder="Enter Your Mother Occupation"
                                                                        value="{{ $user_data['user_family_info']->user_mother_job_details }}">
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-4 col-12">
                                                                <div class="form-group">
                                                                    <label>Family Status<span
                                                                            class="text-danger">*</span></label>
                                                                    <select class="form-control form-select"
                                                                        name="user_family_status"
                                                                        aria-label="Default select example">
                                                                        <option hidden selected value>Select Family Status
                                                                        </option>
                                                                        @foreach ($user_data['family_status'] as $row)
                                                                            <option value="{{ $row->id }}"
                                                                                {{ $user_data['user_family_info']->user_family_status == $row->id ? 'selected' : '' }}>
                                                                                {{ $row->family_type_name }}</option>
                                                                        @endforeach

                                                                    </select>
                                                                </div>
                                                            </div>

                                                            <div class="col-lg-4 col-12">
                                                                <div class="form-group">
                                                                    <label>Total No. Of Siblings<span
                                                                            class="text-danger">*</span></label>
                                                                    <select class="form-control form-select"
                                                                        name="no_of_sibling" id="no_of_sibling">
                                                                        <option selected disabled value="">Select No. Of
                                                                            Sibling
                                                                        </option>
                                                                        @for ($i = 0; $i < 7; $i++)
                                                                            <option value="{{ $i }}">
                                                                                {{ $i }} - Siblings</option>
                                                                        @endfor
                                                                    </select>
                                                                </div>
                                                            </div>

                                                            <div class="col-lg-3 col-12" id='bro_div'>
                                                                <div class="form-group">
                                                                    <label for="no_brothers">No. Of Brothers<span
                                                                            class="text-danger">*</span></label>
                                                                    <select class="form-control form-select"
                                                                        name="no_of_brothers" id="no_of_bro">
                                                                    </select>
                                                                </div>
                                                            </div>

                                                            <div class="col-lg-3 col-12" id='sis_div'>
                                                                <div class="form-group">
                                                                    <label for="no_sisters">No. Of Sisters<span
                                                                            class="text-danger">*</span></label>
                                                                    <select class="form-control form-select"
                                                                        name="no_of_sisters" id="no_of_sis">
                                                                    </select>
                                                                </div>
                                                            </div>

                                                            <div class="col-lg-3 col-12" id='marr_bro_div'>
                                                                <div class="form-group">
                                                                    <label for="no_m_brothers">No. Of Married Brothers<span
                                                                            class="text-danger">*</span></label>
                                                                    <select class="form-control form-select"
                                                                        name="no_of_brothers_married" id="married_bro">

                                                                    </select>
                                                                </div>
                                                            </div>

                                                            <div class="col-lg-3 col-12" id='marr_sis_div'>
                                                                <div class="form-group">
                                                                    <label for="no_m_sisters">No. Of Married Sisters<span
                                                                            class="text-danger">*</span></label>
                                                                    <select class="form-control form-select"
                                                                        name="no_of_sisters_married" id="married_sis">

                                                                    </select>
                                                                </div>
                                                            </div>

                                                            <div class="col-lg-4 col-12">
                                                                <div class="form-group">
                                                                    <label for="sibling_details">Sibling Details<span
                                                                            class="small text-secondary">
                                                                            &nbsp;(Optional)</span></label>
                                                                    <input name="user_sibling_details" type="text"
                                                                        placeholder="Siblings Details"
                                                                        value="{{ $user_data['user_family_info']->user_sibling_details }}">
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-8 col-12">
                                                                <div class="form-group">
                                                                    <label for="sibling_details">Relative Address<span
                                                                            class="small text-secondary">
                                                                            &nbsp;(Paternal)</span></label>
                                                                    <input name="paternal_uncle_address" type="text"
                                                                        placeholder="Enter Paternal Relative Address Clearly"
                                                                        value="{{ $user_data['user_family_info']->paternal_uncle_address }}">
                                                                </div>
                                                            </div>
                                                            <div class="col-12 mt-3 mb-3">
                                                                <button id="updatefamilyinfo" type="button"
                                                                    class="btn btn-primary btn-sm float-end">Update
                                                                    Family Details</button>
                                                            </div>

                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingFour">
                                        <button class="accordion-button collapsed fw-normal" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#native" aria-expanded="false"
                                            aria-controls="native">
                                            3.Native Info Details <i class="lni lni-chevron-down"></i>
                                        </button>
                                    </h2>
                                    <div id="native" class="accordion-collapse collapse" aria-labelledby="headingThree"
                                        data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <div class="profile-setting-form">
                                                <form id="nativeInfoForm" name="nativeInfoForm">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="row">
                                                        <div class="col-lg-4 col-12">
                                                            <div class="form-group">
                                                                <label>Country<span class="text-danger">*</span></label>
                                                                <select class="form-select" name="user_country"
                                                                    id="country">
                                                                    <option hidden selected value="">Select Country
                                                                    </option>
                                                                    @foreach ($user_data['country'] as $row)
                                                                        {{-- <option
                                                                            {{-- value="{{ $row->id }} {{ $user_native_info->user_country_id == $row->id ? 'selected' : '' }}"> --}}
                                                                        {{-- {{ $row->country_name }}</option> --}}
                                                                        <option value="{{ $row->id }}"
                                                                            @if ($user_data['user_native_info']->user_country_id === $row->id || old('user_country_id') === $row->id) selected @endif>
                                                                            {{ $row->country_name }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 col-12">
                                                            <div class="form-group">
                                                                <label>State<span class="text-danger">*</span></label>

                                                                <select class="form-select" name="user_state"
                                                                    id="state">
                                                                    <option hidden selected value="">Select State
                                                                    </option>
                                                                    @foreach ($user_data['state'] as $row)
                                                                        <option value="{{ $row->id }}"
                                                                            {{ $user_data['user_native_info']->user_state_id == $row->id ? 'selected' : '' }}>
                                                                            {{ $row->state_name }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 col-12">
                                                            <div class="form-group">
                                                                <label>City<span class="text-danger">*</span></label>
                                                                <select class="form-select" name="user_city" id="city">
                                                                    <option hidden selected value="">Select city
                                                                    </option>
                                                                    @foreach ($user_data['city'] as $row)
                                                                        <option value="{{ $row->id }}"
                                                                            {{ $user_data['user_native_info']->user_city_id == $row->id ? 'selected' : '' }}>
                                                                            {{ $row->city_name }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 mt-3 mb-3 ">
                                                            <button id="updatenativeinfodetails" type="button"
                                                                class="btn btn-primary btn-sm float-end">Update
                                                                Native Info Details</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingThree">
                                        <button class="accordion-button collapsed fw-normal" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false"
                                            aria-controls="collapseThree">
                                            4.Professional Details <i class="lni lni-chevron-down"></i>
                                        </button>
                                    </h2>
                                    <div id="collapseThree" class="accordion-collapse collapse"
                                        aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <div class="profile-setting-form">
                                                <form name="professionalInfoForm" id="professionalInfoForm">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="row">

                                                        <div class="col-lg-4 col-12">
                                                            <div class="form-group">
                                                                <label>Education<span
                                                                        class="text-danger">*</span></label>
                                                                <select id="user_education" name="user_education[]"
                                                                    multiple>

                                                                    @foreach ($user_data['education'] as $row)
                                                                        <option value="{{ $row->id }}"
                                                                            @if (in_array($row->id, $educationId)) selected="in_array( $educationId == $row->id)">
                                                                                            {{ $row->education_name }}
                                                                                             @else > {{ $row->education_name }} @endif
                                                                            </option>
                                                                    @endforeach

                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-4 col-12">
                                                            <div class="form-group">
                                                                <label>Education In Detail<span
                                                                        class="small text-secondary">
                                                                        &nbsp;(Optional)</span></label>
                                                                <input name="user_education_details" type="text"
                                                                    placeholder="Describe your education"
                                                                    value="{{ $user_data['user_prof_info']->user_education_details }}">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 col-12">
                                                            <div class="form-group">
                                                                <label>Job<span class="text-danger">*</span></label>
                                                                <select class="form-control form-select" name="user_job"
                                                                    aria-label="Default select example">
                                                                    <option hidden selected value>Select Your Job
                                                                    </option>
                                                                    @foreach ($user_data['job'] as $row)
                                                                        <option value="{{ $row->id }}"
                                                                            {{ $user_data['user_prof_info']->user_job_id == $row->id ? 'selected' : '' }}>
                                                                            {{ $row->job_name }}</option>
                                                                    @endforeach

                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 col-12">
                                                            <div class="form-group">
                                                                <label>Job In Detail<span class="small text-secondary">
                                                                        &nbsp;(Optional)</span></label>
                                                                <input name="user_job_details" type="text"
                                                                    placeholder="Describe your Job"
                                                                    value="{{ $user_data['user_prof_info']->user_job_details }}">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 col-12">
                                                            <div class="form-group">
                                                                <label>Job In Country<span
                                                                        class="text-danger">*</span></label>
                                                                <select class="form-select" name="user_working_country"
                                                                    id="user_working_country">
                                                                    <option hidden selected value>Select Country
                                                                    </option>
                                                                    @foreach ($user_data['country'] as $row)
                                                                        <option value="{{ $row->id }}"
                                                                            {{ $user_data['user_prof_info']->user_job_country == $row->id ? 'selected' : '' }}>
                                                                            {{ $row->country_name }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 col-12">
                                                            <div class="form-group">
                                                                <label>Job In State<span
                                                                        class="text-danger">*</span><span
                                                                        class="small text-primary">(Select
                                                                        country)</span></span></label>
                                                                <select class="form-select" name="user_working_state"
                                                                    id="job_state">
                                                                    <option hidden selected value>Select State</option>
                                                                    @foreach ($user_data['state'] as $row)
                                                                        <option value="{{ $row->id }}"
                                                                            {{ $user_data['user_prof_info']->user_job_state == $row->id ? 'selected' : '' }}>
                                                                            {{ $row->state_name }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 col-12">
                                                            <div class="form-group">
                                                                <label>Job In City<span
                                                                        class="text-danger">*</span><span
                                                                        class="small text-primary">(Select
                                                                        State)</span></label>
                                                                <select class="form-select" name="user_working_city"
                                                                    id="job_city">
                                                                    <option hidden selected value>Select City</option>
                                                                    @foreach ($user_data['city'] as $row)
                                                                        <option value="{{ $row->id }}"
                                                                            {{ $user_data['user_prof_info']->user_job_city == $row->id ? 'selected' : '' }}>
                                                                            {{ $row->city_name }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <div class="d-flex">
                                                                    <label>Annual Income<span
                                                                            class="text-danger">*</span></label>&nbsp;&nbsp;&nbsp;<span
                                                                        class="text-primary fw-bold" id='salaryText'>₹
                                                                        {{ $user_data['user_prof_info']->user_annual_income ?? '50000' }}</span>
                                                                </div>

                                                                <input name="user_annual_income" type="range"
                                                                    class="form-range position-relative" id="customRange1"
                                                                    value="{{ $user_data['user_prof_info']->user_annual_income ?? '50000' }}"
                                                                    min="50000" max="10000000" step="25000"
                                                                    oninput="salaryText.innerText = this.value">
                                                            </div>
                                                        </div>
                                                        {{-- <div class="col-lg-4 col-12">
                                                            <div class="form-group">
                                                                <label>Annual Income<span
                                                                        class="text-danger">*</span></label>
                                                                <select class="form-control form-select"
                                                                    name="user_annual_income"
                                                                    aria-label="Default select example">
                                                                    <option hidden selected value>Select Annual Income
                                                                    </option>
                                                                    @foreach ($user_data['salary'] as $row)
                                                                        <option value="{{ $row->id }}"
                                                                            {{ $user_data['user_prof_info']->user_annual_income == $row->id ? 'selected' : '' }}>
                                                                            {{ $row->salary_amount }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div> --}}
                                                        <div class="col-12 mt-3 mb-3 ">
                                                            <button id="updateprofdetails" type="button"
                                                                class="btn btn-primary btn-sm float-end">Update
                                                                Professional Details</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingFour">
                                        <button class="accordion-button collapsed fw-normal" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#religious" aria-expanded="false"
                                            aria-controls="religious">
                                            5.Religious Details <i class="lni lni-chevron-down"></i>
                                        </button>
                                    </h2>
                                    <div id="religious" class="accordion-collapse collapse" aria-labelledby="headingThree"
                                        data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <div class="profile-setting-form">
                                                <form id="ReligiousInfoForm" name="ReligiousInfoForm">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="row">
                                                        <div class="col-lg-4 col-12">
                                                            <div class="form-group">
                                                                <label>Religion<span
                                                                        class="text-danger">*</span></label>
                                                                <select class="form-control form-select"
                                                                    name="user_religion" id="user_religion"
                                                                    aria-label="Default select example">
                                                                    <option hidden selected value>Select Religion
                                                                    </option>
                                                                    @foreach ($user_data['religion'] as $row)
                                                                        <option value="{{ $row->id }}"
                                                                            @if ($user_data['user_religious_info']->user_religion_id === $row->id || old('user_religion_id') === $row->id) selected @endif>

                                                                            {{ $row->religion_name }}</option>
                                                                    @endforeach

                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 col-12">
                                                            <div class="form-group">
                                                                <label>Caste<span class="text-danger">*</span><span
                                                                        class="small text-primary">(Select
                                                                        Religion)</span></label>
                                                                <select class="form-control form-select" name="user_caste"
                                                                    id="user_caste" aria-label="Default select example">
                                                                    <option hidden selected value>Select Caste</option>
                                                                    @foreach ($user_data['caste'] as $row)
                                                                        <option value="{{ $row->id }}"
                                                                            {{ $user_data['user_religious_info']->user_caste_id == $row->id ? 'selected' : '' }}>
                                                                            {{ $row->caste_name }}</option>
                                                                    @endforeach

                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 col-12">
                                                            <div class="form-group">
                                                                <label>Sub-Caste<span
                                                                        class="text-danger">*</span></label>
                                                                <input name="user_subcaste" type="text"
                                                                    placeholder="Enter Your Sub Caste"
                                                                    value="{{ $user_data['user_religious_info']->sub_caste }}">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 col-12">
                                                            <div class="form-group">
                                                                <label>Rasi<span class="text-danger">*</span></label>
                                                                <select class="form-control form-select" name="user_rasi"
                                                                    aria-label="Default select example" id="user_rasi">
                                                                    <option hidden selected value>Select Rasi</option>
                                                                    @foreach ($user_data['rasi'] as $row)
                                                                        <option value="{{ $row->id }}"
                                                                            @if ($user_data['user_religious_info']->user_rasi_id === $row->id || old('user_rasi_id') === $row->id) selected @endif>
                                                                            {{ $row->rasi_name }}</option>
                                                                    @endforeach

                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 col-12">
                                                            <div class="form-group">
                                                                <label>Star(Natchathiram)<span
                                                                        class="text-danger">*</span><span
                                                                        class="small text-primary">(Select
                                                                        Rasi)</span></label>
                                                                <select class="form-control form-select" name="user_star"
                                                                    aria-label="Default select example" id="user_star">
                                                                    <option hidden selected value>Select Star</option>
                                                                    {{-- @foreach ($user_data['star'] as $row)
                                                                            <option value="{{ $row->id }} "
                                                                                {{ $user_data['user_religious_info']->user_star_id == $row->id ? 'selected' : '' }}>
                                                                                {{ $row->star_name }}</option>
                                                                        @endforeach --}}

                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 col-12">
                                                            <div class="form-group">
                                                                <label>Dhosham<span class="text-danger">*</span></label>
                                                                <select class="form-control form-select"
                                                                    aria-label="Default select example" id="user_dhosam"
                                                                    name="user_dhosam">
                                                                    <option hidden selected value>Select</option>
                                                                    <option value="1"
                                                                        @if (old('user_dhosam') == '1') {{ 'selected' }} @endif>
                                                                        Yes</option>
                                                                    <option value="2"
                                                                        @if (old('user_dhosam') == '2') {{ 'selected' }} @endif>
                                                                        No</option>
                                                                    <option value="3"
                                                                        @if (old('user_dhosam') == '3') {{ 'selected' }} @endif>
                                                                        Dont' Know</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="">
                                                                <textarea class="form-control" placeholder="Enter Details About Your Dhosam" name="dhosam_details"
                                                                    id="dhosam_details" rows="2"></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 col-12">
                                                            <div class="form-group">
                                                                <label>Birth Time<span
                                                                        class="text-danger">*</span></label>
                                                                <input name="user_btime" type="time"
                                                                    value="{{ $user_data['user_religious_info']->user_birth_time }}">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 col-12">
                                                            <div class="form-group">
                                                                <label>Birth Place<span
                                                                        class="text-danger">*</span></label>
                                                                <input name="user_bplace" type="text"
                                                                    placeholder="Enter Your Birth Place"
                                                                    value="{{ $user_data['user_religious_info']->user_birth_place }}">
                                                            </div>
                                                        </div>
                                                        <div class="col-12 mt-3 mb-3">
                                                            <button type="button" id="updateReligiousInfo"
                                                                class="btn btn-primary btn-sm float-end">Update
                                                                Religious Details</button>
                                                        </div>
                                                    </div>
                                            </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingFour">
                                        <button class="accordion-button collapsed fw-normal" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#horoscope" aria-expanded="false"
                                            aria-controls="horoscope">
                                            6.Horoscope Details <i class="lni lni-chevron-down"></i>
                                        </button>
                                    </h2>

                                    @include(
                                        'Website.userDashboard.editProfile.horoScopeSection.horoScopeSection'
                                    )
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>


    <script>
        //dhosam details
        $("#dhosam_details").hide();

        $("#user_dhosam").change(function() {
            var val = $("#user_dhosam").val();
            if (val == 1) {
                $("#dhosam_details").show();
            } else {
                $("#dhosam_details").hide();
            }
        });
        //end of dhosam details

        $(function() {
            // multiselect
            var x = new SlimSelect({
                select: '#user_education'
            });
            // var x = new SlimSelect({
            //     select: '#user_working_country'
            // });

            // $('#txtDate').datepicker({
            //     format: "dd/mm/yyyy"
            // });

            //***************************************************
            // UPLOAD PROFILE IMAGE
            function readURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $('#profileImg').attr('src', e.target.result);
                    }
                    reader.readAsDataURL(input.files[0]);
                }
                var ofile = document.getElementById('profileInput').files[0];
                var imgData = new FormData();
                imgData.append("profileImage", ofile);
                let URL = "{{ route('userImage.update', $user->id) }}";
                let profileImgForm = $("#profileImgForm").serializeArray();
                $.each(profileImgForm, function(i, field) {
                    imgData.append(field.name, field.value);
                });

                $.ajax({
                    url: URL,
                    type: "POST",
                    data: imgData,
                    processData: false,
                    contentType: false,
                    success: function(data, textStatus, jqXHR) {
                        toastr.success(data.message);
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        toastr.error(errorThrown);
                    }
                });
            }
            $('#profileUpload').click(() => {
                $("#profileInput").click();

                $("#profileInput").change(function() {
                    readURL(this);
                });
            });

            //***************************************************
            // DELETE PROFILE IMAGE
            $('#profileClear').click(() => {
                $('#profileImg').attr('src',
                    "{{ asset('assets/Website/avatar.png') }}");

                let URL = "{{ route('userImage.delete', $user->id) }}";
                alert('Are You Sure Want To Delete Your Image !')
                $.ajax({
                    url: URL,
                    type: "GET",
                    processData: false,
                    contentType: false,
                    success: function(data, textStatus, jqXHR) {
                        toastr.success(data.success);
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        toastr.error(errorThrown);
                    }
                });
            });

            //***************************************************
            // CALCULATE AGE
            let dob = '{{ $user_data['user_info']->dob }}',
                year = Number(dob.substr(0, 4)),
                month = Number(dob.substr(4, 2)) - 1,
                day = Number(dob.substr(6, 2)),
                today = new Date(),
                age = today.getFullYear() - year;
            if (today.getMonth() < month || (today.getMonth() == month && today.getDate() < day)) {
                age--;
            }
            $('#userAge').val(age);

            // *********************************************
            // UPDATE BASIC USER DETAILS
            let basicDetail = $("#basicDetailsForm").prop('elements');

            $.each(basicDetail, function(i, field) {
                $(this).on("click", function() {
                    let labels = $(this).siblings('label');
                    let errMsg = "<span class='text-danger small'> Required</span>";

                    if (labels.children()[1]) {
                        labels.children()[1].remove();
                    }

                    $(this).removeClass('border border-danger')
                });

            });

            $("#updateBasicDetails").click(function() {
                const inputs = ['lname', 'about', 'mobile', undefined];
                let valid = false;
                let basicDetails = $("#basicDetailsForm").prop('elements');

                $.each(basicDetails, function(i, field) {
                    let inputName = $(this).attr('name');
                    let inputVal = $(this).val();

                    let labels = $(this).siblings('label');
                    let errMsg = "<span class='text-danger small'> Required</span>";

                    if (inputs.includes(inputName)) {
                        return;
                    } else {
                        if (inputVal === '') {
                            $(this).addClass('border border-danger');
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

                let basicDetailsForm = $("#basicDetailsForm").serializeArray();
                let formData = new FormData();
                let URL = "{{ route('profile.basic.update', $user->id) }}";
                $.each(basicDetailsForm, function(i, field) {
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
                            toastr.success('User Basic Details Updated!');
                        },
                        error: function(jqXHR, textStatus, errorThrown) {
                            toastr.error(jqXHR.responseJSON.message);
                        }
                    });
                }

                event.preventDefault();
            });

            // *********************************************
            // USER NATIVE INFO UPDATE
            let nativeDetail = $("#nativeInfoForm").prop('elements');

            $.each(nativeDetail, function(i, field) {
                $(this).on("click", function() {
                    let labels = $(this).siblings('label');
                    let errMsg = "<span class='text-danger small'> Required</span>";

                    if (labels.children()[1]) {
                        labels.children()[1].remove();
                    }

                    $(this).removeClass('border border-danger')
                });

            });

            $("#updatenativeinfodetails").click(function() {
                const inputs = [undefined];
                let valid = false;
                let nativeDetails = $("#nativeInfoForm").prop('elements');

                $.each(nativeDetails, function(i, field) {
                    let inputName = $(this).attr('name');
                    let inputVal = $(this).val();

                    let labels = $(this).siblings('label');
                    let errMsg = "<span class='text-danger small'> Required</span>";

                    if (inputs.includes(inputName)) {
                        return;
                    } else {
                        if (inputVal === '') {
                            $(this).addClass('border border-danger');
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

                let nativeInfoForm = $("#nativeInfoForm").serializeArray();
                let formData = new FormData();
                let URL = "{{ route('profile.nativeInfo.update', $user->id) }}";
                $.each(nativeInfoForm, function(i, field) {
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

            // *********************************************
            // USER PROFESSIONAL INFO UPDATE
            let professionalDetails = $("#professionalInfoForm").prop('elements');

            $.each(professionalDetails, function(i, field) {
                $(this).on("click", function() {
                    let labels = $(this).siblings('label');
                    let errMsg = "<span class='text-danger small'> Required</span>";

                    if (labels.children()[1]) {
                        labels.children()[1].remove();
                    }

                    $(this).removeClass('border border-danger')
                });

            });
            $("#updateprofdetails").click(function() {
                const inputs = ['user_job_details', 'user_education_details',
                    undefined
                ];
                let valid = false;
                let bprofessionalDetails = $("#professionalInfoForm").prop('elements');

                $.each(bprofessionalDetails, function(i, field) {
                    let inputName = $(this).attr('name');
                    let inputVal = $(this).val();

                    let labels = $(this).siblings('label');
                    let errMsg = "<span class='text-danger small'> Required</span>";

                    if (inputs.includes(inputName)) {
                        return;
                    } else {
                        if (inputVal === '') {
                            $(this).addClass('border border-danger');
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

                let profInfoForm = $("#professionalInfoForm").serializeArray();
                let formData = new FormData();
                let URL = "{{ route('profile.professionalInfo.update', $user->id) }}";
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
            // *********************************************
            // USER FAMILY INFO UPDATE
            let familyDetail = $("#familyInfoForm").prop('elements');

            $.each(familyDetail, function(i, field) {
                $(this).on("click", function() {
                    let labels = $(this).siblings('label');
                    let errMsg = "<span class='text-danger small'> Required</span>";

                    if (labels.children()[1]) {
                        labels.children()[1].remove();
                    }

                    $(this).removeClass('border border-danger')
                });
            });

            $("#updatefamilyinfo").click(function() {
                const inputs = ['user_sibling_details', undefined];
                let valid = false;
                let familyDetails = $("#familyInfoForm").prop('elements');

                $.each(familyDetails, function(i, field) {
                    let inputName = $(this).attr('name');
                    let inputVal = $(this).val();

                    let labels = $(this).siblings('label');
                    let errMsg = "<span class='text-danger small'> Required</span>";

                    if (inputs.includes(inputName)) {
                        return;
                    } else {
                        if (inputVal === '') {
                            $(this).addClass('border border-danger');
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

                let familyInfoForm = $("#familyInfoForm").serializeArray();
                let formData = new FormData();
                let URL = "{{ route('profile.familyInfo.update', $user->id) }}";
                $.each(familyInfoForm, function(i, field) {
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
            // *********************************************

            // USER RELIGIOUS INFO UPDATE
            let religiousDetail = $("#ReligiousInfoForm").prop('elements');

            $.each(religiousDetail, function(i, field) {
                $(this).on("click", function() {
                    let labels = $(this).siblings('label');
                    let errMsg = "<span class='text-danger small'> Required</span>";
                    if (labels.children()[1]) {
                        labels.children()[1].remove();
                    }
                    $(this).removeClass('border border-danger')
                });
            });

            $("#updateReligiousInfo").click(function() {
                const inputs = [undefined];
                let valid = false;
                let religiousDetails = $("#ReligiousInfoForm").prop('elements');

                $.each(religiousDetails, function(i, field) {
                    let inputName = $(this).attr('name');
                    let inputVal = $(this).val();

                    let labels = $(this).siblings('label');
                    let errMsg = "<span class='text-danger small'> Required</span>";

                    if (inputs.includes(inputName)) {
                        return;
                    } else {
                        if (inputVal === '') {
                            $(this).addClass('border border-danger');
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

                let religiousInfoForm = $("#ReligiousInfoForm").serializeArray();
                let formData = new FormData();
                let URL = "{{ route('profile.religiousInfo.update', $user->id) }}";
                $.each(religiousInfoForm, function(i, field) {
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

            // *********************************************
            // USER HOROSCOPE INFO UPDATE
            let horoscopeDetails = $("#horoscopeInfoForm").prop('elements');

            $.each(horoscopeDetails, function(i, field) {
                $(this).on("click", function() {
                    let labels = $(this).siblings('label');
                    let errMsg = "<span class='text-danger small'> Required</span>";

                    if (labels.children()[1]) {
                        labels.children()[1].remove();
                    }

                    $(this).removeClass('border border-danger')
                });

            });

            $("#updateHoroscopeInfo").click(function() {
                const inputs = [undefined];
                let valid = false;
                let bhoroscopeDetails = $("#horoscopeInfoForm").prop('elements');

                $.each(bhoroscopeDetails, function(i, field) {
                    let inputName = $(this).attr('name');
                    let inputVal = $(this).val();

                    let labels = $(this).siblings('label');
                    let errMsg = "<span class='text-danger small'> Required</span>";

                    if (inputs.includes(inputName)) {
                        return;
                    } else {
                        if (inputVal === '') {
                            $(this).addClass('border border-danger');
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

                let HoroscopeInfoForm = $("#horoscopeInfoForm").serializeArray();
                let formData = new FormData();
                let URL = "{{ route('profile.horoscopeInfo.update', $user->id) }}";
                $.each(HoroscopeInfoForm, function(i, field) {
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

            // DYNAMIC DROPDOWN - NATIVE INFO
            $('#country').on('change', function() {
                var countryId = this.value;
                $('#state').html('');
                $.ajax({
                    url: '{{ route('getStates') }}?country_id=' + countryId,
                    type: 'get',
                    success: function(res) {
                        $('#state').html('<option value="">Select State</option>');
                        $.each(res, function(key, value) {
                            $('#state').append('<option value="' + value.id + '">' +
                                value.state_name + '</option>');
                        });
                        $('#city').html('<option value="">Select City</option>');
                    }
                });
            });
            $('#state').on('change', function() {
                var stateId = this.value;
                $('#city').html('');
                $.ajax({
                    url: '{{ route('getCities') }}?state_id=' + stateId,
                    type: 'get',
                    success: function(res) {
                        $('#city').html('<option value="">Select City</option>');
                        $.each(res, function(key, value) {
                            $('#city').append('<option value="' + value
                                .id + '">' + value.city_name + '</option>');
                        });
                    }
                });
            });

            // JOB COUNTRY-STATE-CITY
            $('#user_working_country').on('change', function() {
                var countryId = this.value;
                $('#job_state').html('');
                $.ajax({
                    url: '{{ route('getStates') }}?country_id=' + countryId,
                    type: 'get',
                    success: function(res) {
                        $('#job_state').html('<option value="">Select State</option>');
                        $.each(res, function(key, value) {
                            $('#job_state').append('<option value="' + value
                                .id + '">' + value.state_name + '</option>');
                        });
                        $('#job_city').html('<option value="">Select City</option>');
                    }
                });
            });
            $('#job_state').on('change', function() {
                var stateId = this.value;
                $('#job_city').html('');
                $.ajax({
                    url: '{{ route('getCities') }}?state_id=' + stateId,
                    type: 'get',
                    success: function(res) {
                        $('#job_city').html('<option value="">Select City</option>');
                        $.each(res, function(key, value) {
                            $('#job_city').append('<option value="' + value
                                .id + '">' + value.city_name + '</option>');
                        });
                    }
                });
            });


            // // RELIGION-CASTE DROPDOWN
            $('#user_religion').on('change', function() {
                var religionID = this.value;
                $('#user_caste').html('');
                $.ajax({
                    url: '{{ route('getCaste') }}?religion_id=' + religionID,
                    type: 'get',
                    success: function(res) {
                        $('#user_caste').html('<option value="">Select Caste</option>');
                        $.each(res, function(key, value) {
                            $('#user_caste').append('<option value="' + value
                                .id + '">' + value.caste_name + '</option>');
                        });

                    }
                });
            });

            // Rasi-Star DROPDOWN
            $('#user_rasi').on('change', function() {
                var rasiID = this.value;
                $('#user_star').html('');
                $.ajax({
                    url: '{{ route('getStar') }}?rasi_id=' + rasiID,
                    type: 'get',
                    success: function(res) {
                        $('#user_star').html('<option value="">Select Star</option>');
                        $.each(res, function(key, value) {
                            $('#user_star').append('<option value="' + value
                                .id + '">' + value.star_name + '</option>');
                        });

                    }
                });
            });


            //
            // RELIGION-CASTE DROPDOWN
            // $('#user_religion').on('change', function() {
            //     var religionID = $(this).val();
            //     if (religionID) {
            //         $.ajax({
            //             url: '{{ route('getCaste') }}?religion_id=' + religionID,
            //             type: "get",
            //             success: function(data) {
            //                 if (data) {
            //                     $('#user_caste').empty();
            //                     $('#user_caste').append(
            //                         '<option  hidden>Choose Caste</option>');
            //                     $.each(data, function(key, value) {
            //                         $('select[name="user_caste"]').append(
            //                             '<option value="' +
            //                             value.id +
            //                             '">' + value.caste_name + '</option>');
            //                     });
            //                 } else {
            //                     $('#user_caste').empty();
            //                 }
            //             }
            //         });
            //     } else {
            //         $('#user_caste').empty();
            //     }
            // });

            // USER-RASI-STAR-DROPDOWN
            // $('#user_rasi').on('change', function() {

            //     var rasiID = $(this).val();
            //     if (rasiID) {
            //         $.ajax({
            //             url: '/getStar/' + rasiID,
            //             type: "get",
            //             success: function(data) {
            //                 if (data) {
            //                     $('#user_star').empty();
            //                     $('#user_star').append(
            //                         '<option  hidden>Choose Star</option>');
            //                     $.each(data, function(key, value) {
            //                         $('select[name="user_star"]').append(
            //                             '<option value="' +
            //                             value.id + '" >' +
            //                             value.star_name + '</option>');
            //                     });
            //                 } else {
            //                     $('#user_star').empty();
            //                 }
            //             }
            //         });
            //     } else {
            //         $('#user_star').empty();
            //     }
            // });

            // ================= SELECT SIBLINGS FEATURE SCRIPTS =================

            $('#bro_div,#sis_div,#marr_bro_div,#marr_sis_div').hide();

            let no_of_sibling;
            $("#no_of_sibling").change(function() {

                no_of_sibling = parseInt($("#no_of_sibling").val());

                if (no_of_sibling >= 1) {
                    $("#bro_div,#sis_div").show();

                    $('#no_of_bro').html('<option value="0" selected hidden>No. Of Brothers</option>');
                    for (let i = 0; i < no_of_sibling; i++) {
                        $('#no_of_bro').append(`<option value="${i+1}"> ${i+1} Brothers </option>`);
                    }

                    $('#no_of_sis').html('<option value="0" selected hidden>No. Of Sisters</option>');
                    for (let i = 0; i < no_of_sibling; i++) {
                        $('#no_of_sis').append(`<option value="${i+1}">  ${i+1} Sisters</option>`);
                    }

                } else {
                    $("#bro_div,#sis_div,#marr_bro_div,#marr_sis_div").hide();
                }
            });

            $("#no_of_bro").change(function() {
                let no_of_bro = parseInt($(this).val())
                let bal_sis = no_of_sibling - no_of_bro;

                if (bal_sis == 0) {
                    $('#sis_div').hide();
                } else {
                    $('#sis_div').show();

                    $('#no_of_sis').html('<option value="" selected hidden>No. Of Sisters</option>');
                    for (let i = 0; i < bal_sis; i++) {
                        $('#no_of_sis').append(`<option value="${i+1}">  ${i+1} Sisters</option>`);
                    }
                }

                if (no_of_bro == 0) {
                    $('#marr_bro_div').hide();

                } else {
                    $('#marr_bro_div').show();
                    $('#married_bro').html('<option value="0" selected hidden>Married Brothers</option>');
                    for (let i = 0; i < no_of_bro; i++) {
                        $('#married_bro').append(
                            `<option value="${i+1}">  ${i+1} Married Brothers</option>`);
                    }
                }
            })

            $("#no_of_sis").change(function() {

                let no_of_sis = parseInt($(this).val());

                let bal_bro = no_of_sibling - no_of_sis;

                // if (bal_bro == 0) {
                //     $('#bro_div').hide();
                // } else {
                //     $('#bro_div').show();
                //     $('#no_of_bro').html('<option value="" selected hidden>No. Of Brothers</option>');
                //     for (let i = 0; i < bal_bro; i++) {
                //         $('#no_of_bro').append(`<option value="${i+1}">  ${i+1} Brothers</option>`);
                //     }
                // }

                console.log(no_of_sis);

                if (no_of_sis == 0) {
                    $('#marr_sis_div').hide();

                } else {
                    $('#marr_sis_div').show();
                    $('#married_sis').html('<option value="0" selected hidden>Married Sisters</option>');
                    for (let i = 0; i < no_of_sis; i++) {
                        $('#married_sis').append(
                            `<option value="${i+1}">  ${i+1} Married Sisters</option>`);
                    }
                }
            })
        });
    </script>
@endsection
