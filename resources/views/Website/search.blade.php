@extends('Website.layouts.default')
@section('content')
    <!-- BREADCRUMBS START -->
    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-12">
                    <ul class="breadcrumb-nav">
                        <li><a href="{{ route('Home') }}">Home</a></li>
                        <li>Search</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- BREADCRUMBS END -->

    <section class="mt-5">
        <div class="container">
            <div class="row ">
                <div class="col-md-12 col-12">
                    <div class="content">
                        <div class="row">
                            <div class="col-md-6">
                                <h3 class="wow fadeInUp fw-light" data-wow-delay=".4s">Find Your Future Partner Here !
                                </h3>
                                <p class="wow fadeInUp" data-wow-delay=".6s">This will give you perfect match <i
                                        class="text-primary lni lni-thumbs-up"></i></p>
                            </div>
                            <div class="col-md-4 offset-md-2">
                                <form id='profile_id_form'>
                                    @csrf
                                    <div class="input-group">
                                        <input name="profile_id" id='profile_id' type="text" class="form-control"
                                            placeholder="Enter Profile ID">
                                        <button id="profileIdBtn" class="btn btn-primary" type="button">Search</button>
                                    </div>
                                </form>
                                <div id="profileResult" class="mt-2">

                                </div>
                            </div>
                        </div>

                        <div class="items-tab mt-3 mb-4 rounded shadow ">
                            <div class="container">
                                <div class="row">
                                    <div class="col-12">
                                        <nav>
                                            <div class="nav nav-tabs mb-0" id="nav-tab" role="tablist">
                                                <button class="nav-link active" id="nav-basic-tab" data-bs-toggle="tab"
                                                    data-bs-target="#nav-basic" type="button" role="tab"
                                                    aria-controls="nav-basic" aria-selected="true">Basic Search</button>
                                                <button class="nav-link" id="nav-advanced-tab" data-bs-toggle="tab"
                                                    data-bs-target="#nav-advanced" type="button" role="tab"
                                                    aria-controls="nav-advanced" aria-selected="false">Advanced
                                                    Search</button>
                                            </div>
                                        </nav>
                                        <div class="tab-content" id="nav-tabContent">
                                            <!-- BASIC SEARCH SECTION START -->
                                            <div class="tab-pane fade show active wow fadeInUp" data-wow-delay=".7s"
                                                id="nav-basic" role="tabpanel" aria-labelledby="nav-basic-tab">
                                                <div class="offset-2 col-md-8">
                                                    <div class="search-form m-0">
                                                        <form action="{{ route('basic.search') }}" method="POST">
                                                            @csrf
                                                            <div class="row mt-3">
                                                                @if (Auth()->check() && Auth()->user()->is_admin != 1)
                                                                    {{-- <div class="col-md-4 search-input text-left">
                                                                        <span class="">Looking For</span>
                                                                        <input type="text" value='Male'>
                                                                    </div> --}}
                                                                @else
                                                                    <div class="col-md-4 search-input text-left mb-3">
                                                                        <span class="">Looking For</span>
                                                                        <select name="search_gender" required>
                                                                            <option value="" selected hidden>Select Gender
                                                                            </option>
                                                                            @foreach ($gender as $row)
                                                                                <option value="{{ $row->id }}">
                                                                                    {{ $row->gender_name }}
                                                                                </option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                @endif

                                                                <div class="col-md-4 search-input mb-3">
                                                                    <span>Religion</span>
                                                                    <select name="search_religion"
                                                                        id="basic_search_religion" required>
                                                                        <option value="" selected hidden>Select Religion
                                                                        </option>
                                                                        @foreach ($religion as $row)
                                                                            <option value="{{ $row->id }}">
                                                                                {{ $row->religion_name }}
                                                                            </option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                                <div class="col-md-4 search-input">
                                                                    <span>Caste <span class="small text-primary">(Select
                                                                            Religion)</span></span>
                                                                    <select name="search_caste" id="basic_search_caste"
                                                                        required disabled>
                                                                        <option selected hidden value=''>Select Caste
                                                                        </option>

                                                                    </select>
                                                                </div>

                                                                <div class="col-md-4 search-input mb-3">
                                                                    <span>Marital Status</span>
                                                                    <select name="search_marital" required>
                                                                        <option value="" selected hidden>Select Status
                                                                        </option>
                                                                        @foreach ($marital_status as $row)
                                                                            <option value="{{ $row->id }}">
                                                                                {{ $row->martial_status_name }}
                                                                            </option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>

                                                                <div class="col-md-4 mb-3">
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
                                                                            <input type="range" name="search_from_age"
                                                                                min="0" max="60" value="18" id="slider-1"
                                                                                oninput="slideOne()">
                                                                            <input type="range" name="search_to_age" min="0"
                                                                                max="60" value="30" id="slider-2"
                                                                                oninput="slideTwo()">
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                            <div class="row mt-2 mb-4">
                                                                <div class="offset-md-3 col-md-6">
                                                                    <button type="submit"
                                                                        class="btn btn-primary shadow shake"><i
                                                                            class="lni lni-search-alt"></i>
                                                                        Search</button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- BASIC SEARCH SECTION END -->

                                            <!-- ADVANCED SEARCH SECTION START -->
                                            <div class="tab-pane wow fadeInUp" data-wow-delay=".7s" id="nav-advanced"
                                                role="tabpanel" aria-labelledby="nav-advanced-tab">
                                                <div class="offset-md-1 col-md-10">
                                                    <div class="search-form m-0">
                                                        <form action="{{ route('advanced.search') }}" method="POST">
                                                            @csrf
                                                            <div class="row mt-3">
                                                                @if (Auth()->check() && Auth()->user()->is_admin != 1)
                                                                    {{-- <div class="col-md-3 search-input text-left">
                                                                        <span class="">Looking For</span>
                                                                        <input type="text" value='Male'>
                                                                    </div> --}}
                                                                @else
                                                                    <div class="col-md-3 search-input text-left mb-3">
                                                                        <span class="">Looking For</span>
                                                                        <select name="adv_gender" class="typeahead">
                                                                            <option value="" selected hidden>Select Gender
                                                                            </option>
                                                                            @foreach ($gender as $row)
                                                                                <option value="{{ $row->id }}">
                                                                                    {{ $row->gender_name }}
                                                                                </option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                @endif

                                                                <div class="col-md-3 search-input mb-3">
                                                                    <span>Religion</span>
                                                                    <select name="adv_religion"
                                                                        id="advanced_search_religion">
                                                                        <option value="" selected hidden>Select Religion
                                                                        </option>
                                                                        @foreach ($religion as $row)
                                                                            <option value="{{ $row->id }}">
                                                                                {{ $row->religion_name }}
                                                                            </option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                                <div class="col-md-3 search-input mb-3">
                                                                    <span>Caste <span class="small text-primary">(Select
                                                                            Religion)</span></span>
                                                                    <select name="adv_caste" id="advanced_search_caste"
                                                                        disabled>
                                                                        <option value="" selected hidden>Select Caste
                                                                        </option>

                                                                    </select>
                                                                </div>
                                                                <div class="col-md-3 search-input mb-3">
                                                                    <span>Marital Status</span>
                                                                    <select name="adv_marital">
                                                                        <option value="" selected hidden>Select Status
                                                                        </option>
                                                                        @foreach ($marital_status as $row)
                                                                            <option value="{{ $row->id }}">
                                                                                {{ $row->martial_status_name }}
                                                                            </option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>

                                                                <div class="col-md-3 search-input mb-3">
                                                                    <span>Mother Tounge</span>
                                                                    <select class="search-input" name="adv_mother_tounge">
                                                                        <option value="" selected hidden>Select Mother
                                                                            Tounge
                                                                        </option>
                                                                        @foreach ($mother_tongue as $row)
                                                                            <option value="{{ $row->id }}">
                                                                                {{ $row->language_name }}
                                                                            </option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                                <div class="col-md-3 search-input">
                                                                    <span>Education</span>
                                                                    <select class="search-input" name="adv_education">
                                                                        <option value="" selected hidden>Select
                                                                            Education
                                                                        </option>
                                                                        @foreach ($education as $row)
                                                                            <option value="{{ $row->id }}">
                                                                                {{ $row->education_name }}
                                                                            </option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                                <div class="col-md-3 search-input">
                                                                    <span>Job</span>
                                                                    <select class="search-input" name="adv_job">
                                                                        <option value="" selected hidden>Select
                                                                            Job
                                                                        </option>
                                                                        @foreach ($job as $row)
                                                                            <option value="{{ $row->id }}">
                                                                                {{ $row->job_name }}
                                                                            </option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                                <div class="col-md-3 search-input">
                                                                    <span>Eating Habits</span>
                                                                    <select class="search-input" name="adv_eating_habits">
                                                                        <option value="" selected hidden>Select
                                                                            Eating Habits
                                                                        </option>
                                                                        @foreach ($eating_habits as $row)
                                                                            <option value="{{ $row->id }}">
                                                                                {{ $row->habit_type_name }}
                                                                            </option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>

                                                                <div class="col-md-3 search-input mb-3">
                                                                    <span>Rasi</span>
                                                                    <select id="adv_rasi" class="search-input"
                                                                        name="adv_rasi">
                                                                        <option value="" selected hidden>Select Rasi
                                                                        </option>
                                                                        @foreach ($rasi as $row)
                                                                            <option value="{{ $row->id }}">
                                                                                {{ $row->rasi_name }}
                                                                            </option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>

                                                                <div class="col-md-3 search-input mb-3">
                                                                    <span>Star <span class="small text-primary">(Select
                                                                            Rasi)</span></span>
                                                                    <select id="adv_star" class="search-input"
                                                                        name="adv_star" disabled>
                                                                        <option value="" selected hidden>Select Star
                                                                        </option>

                                                                    </select>
                                                                </div>
                                                                <div class="col-md-3 search-input mb-3">
                                                                    <span>Country</span>
                                                                    <select id="adv_country" class="search-input"
                                                                        name="adv_country">
                                                                        <option value="" selected hidden>Select Country
                                                                        </option>
                                                                        @foreach ($country as $row)
                                                                            <option value="{{ $row->id }}">
                                                                                {{ $row->country_name }}
                                                                            </option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>

                                                                <div class="col-md-3 search-input mb-3">
                                                                    <span>State <span class="small text-primary">(Select
                                                                            Country)</span></span>
                                                                    <select id="adv_states" class="search-input"
                                                                        name="adv_state" disabled>
                                                                        <option value="" selected hidden>Select State
                                                                        </option>

                                                                    </select>
                                                                </div>


                                                                <div class="col-md-3 search-input mb-3">
                                                                    <span>City <span class="small text-primary">(Select
                                                                            State)</span></span>
                                                                    <select id="adv_city" class="search-input"
                                                                        name="adv_city" disabled>
                                                                        <option value="" selected hidden>Select City
                                                                        </option>

                                                                    </select>
                                                                </div>

                                                            </div>

                                                            <div class="row mt-2 mb-4">
                                                                <div class="offset-md-3 col-md-6">
                                                                    <button type="submit"
                                                                        class="btn btn-primary shadow shake"><i
                                                                            class="lni lni-search-alt"></i>
                                                                        Search</button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- ADVANCED SEARCH SECTION END -->
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

    <!-- SCRIPTS SECTION START -->
    <script>
        $('#profileIdBtn').click(function(e) {
            let profileData = $('#profile_id_form').serialize();
            if ($('#profile_id').val() != '') {
                $.ajax({
                    type: "GET",
                    url: "{{ route('profile_id.search') }}",
                    data: profileData,
                    processData: false,
                    contentType: false,
                    success: function(data) {
                        if (data.status != 500) {
                            toastr.success('User Found !');
                            const res = data.data;
                            var is_verified = (res.is_verified == 0) ? 'Un Verified' : 'Verified';

                            let image_src = res.user_basic_info.gender_id == 1 ? "{{ asset('assets/Website/male.png') }}" : "{{ asset('assets/Website/female.png') }}";

                            let src = res.user_basic_info.image_with_path  || image_src;

                            let href = "{{ url('user-panel/viewProfile') }}/" + res.id;
                            $('#profileResult').append(
                                `<div class='card shadow'>
                                <div class='row'>
                                <div class='col-md-5 text-center'>
                                <img src=${src} class='w-50'>
                                </div>
                                <div class='col-md-7 text-center'>
                                <div class='mt-3'>
                                <h5 class='fw-light'>  ${res.user_profile_id}  </h5>
                                @if (Auth()->check() && Auth()->user()->is_admin != 1)

<a href='${href}' target='_blank' class='btn btn-primary btn-sm'>View Profile</a>
                                        @else
                                            <a data-bs-toggle='modal' data-bs-target='#exampleModal'
                                                href='javascript:void(0)' class='btn btn-primary'>View Profile</a>
                                        @endif
                                </div>
                                </div>
                                </div>
                                </div>`);

                        } else {
                            toastr.error('No User Found !');
                        }
                    },
                    error: function(error) {
                        toastr.error(error);
                    }
                });
            } else {
                alert('Field Is Empty !')
            }
        });

        /** DYNAMIC DROPDOWN SECTION START **/

        // AJAX REQUEST
        function getAjaxValue(url, callback) {
            $.ajax({
                url: url,
                type: "GET",
                data: {
                    "_token": "{{ csrf_token() }}"
                },
                dataType: "json",
                success: callback
            });
        }

        // BASIC RELIGION - CASTE
        $('#basic_search_religion').on('change', function() {
            let religionId = $(this).val();
            let url = '{{ route('getCaste') }}?religion_id=' + religionId;

            getAjaxValue(url, function(data) {
                $('#basic_search_caste').empty();
                $('#basic_search_caste').append('<option value="" hidden>Select Caste</option>');

                $.each(data, function(key, caste) {
                    $('#basic_search_caste').append('<option value="' +
                        caste.id +
                        '">' + caste.caste_name + '</option>');
                });
                $('#basic_search_caste').removeAttr('disabled');
            })
        })

        // ADVANCED RELIGION - CASTE
        $('#advanced_search_religion').on('change', function() {
            let religionId = $(this).val();
            let url = '{{ route('getCaste') }}?religion_id=' + religionId;

            getAjaxValue(url, function(data) {
                $('#advanced_search_caste').empty();
                $('#advanced_search_caste').append('<option value="" hidden>Select Caste</option>');

                $.each(data, function(key, caste) {
                    $('#advanced_search_caste').append('<option value="' +
                        caste.id +
                        '">' + caste.caste_name + '</option>');
                });
                $('#advanced_search_caste').removeAttr('disabled');
            })
        })

        // GET STAR BY RASI ID
        $('#adv_rasi').on('change', function() {
            let rasiId = $(this).val();
            let url = '{{ route('getStar') }}?rasi_id=' + rasiId;

            getAjaxValue(url, function(data) {
                $('#adv_star').empty();
                $('#adv_star').append('<option value="" hidden>Select Star</option>');

                $.each(data, function(key, star) {
                    $('#adv_star').append('<option value="' +
                        star.id +
                        '">' + star.star_name + '</option>');
                });
                $('#adv_star').removeAttr('disabled');
            })
        })

        // GET STATES BY COUNTRY ID
        $('#adv_country').on('change', function() {
            let countryId = $(this).val();

            let url = '{{ route('getStates') }}?country_id=' + countryId;

            getAjaxValue(url, function(data) {
                $('#adv_states').empty();
                $('#adv_states').append('<option value="" hidden>Select State</option>');

                $.each(data, function(key, states) {
                    $('#adv_states').append('<option value="' +
                        states.id +
                        '">' + states.state_name + '</option>');
                });
                $('#adv_states').removeAttr('disabled');
            })
        })

        // GET CITY BY STATES ID
        $('#adv_states').on('change', function() {
            let stateId = $(this).val();
            let url = '{{ route('getCities') }}?state_id=' + stateId;

            getAjaxValue(url, function(data) {
                $('#adv_city').empty();
                $('#adv_city').append('<option value="" hidden>Select City</option>');

                $.each(data, function(key, city) {
                    $('#adv_city').append('<option value="' +
                        city.id +
                        '">' + city.city_name + '</option>');
                });
                $('#adv_city').removeAttr('disabled');
            })
        })

        // DYNAMIC DROPDOWN SECTION END
    </script>
    <!-- SCRIPTS SECTION END -->
@endsection('content')
