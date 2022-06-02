@extends('Website.layouts.default')
@section('content')
    <main>
        <!-- HERO SECTION START -->
        <section class="hero-area style2" id="start">
            <div class="container-lg">
                <div class="row align-items-center">
                    <div class="col-lg-12 col-md-12 col-12 position-absolute"
                        style="z-index:-1;left: 0px;padding: 0px !important;">
                        <div id="carouselExampleIndicators" class="carousel slide carousel-fade" data-bs-ride="carousel">
                            <div class="carousel-indicators">
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0"
                                    class="active" aria-current="true" aria-label="Slide 1"></button>
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                                    aria-label="Slide 2"></button>
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                                    aria-label="Slide 3"></button>
                            </div>

                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="https://images.pexels.com/photos/1911580/pexels-photo-1911580.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" class="d-block w-100" alt="..." loading='eager'>
                                </div>
                                <div class="carousel-item">
                                    <img src="https://images.pexels.com/photos/1456669/pexels-photo-1456669.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"
                                        class="d-block w-100" alt="..." loading='eager'>
                                </div>
                                <div class="carousel-item">
                                    <img src="https://images.pexels.com/photos/12200847/pexels-photo-12200847.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" class="d-block w-100" alt="...">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-5 col-md-12 col-12 col-sm-12 mb-4">
                        <div class="card shadow border-0">
                            <div class="card-body">
                                <h4 class="p-2 fw-light"><span class="fw-bolder text-primary">அலமேலு மங்கை</span> திருமண தகவல் மையம்</h4>
                                {{-- <h5 class="text-center fw-normal">(சைவ பிள்ளை மட்டும்)</h5> --}}
                                <hr>

                                <ul class="text-dark p-0 m-0">
                                    <li class="small text-danger fw-bold">குறிப்பு :</li>
                                    <li>1. நுழைவு கட்டணம் ₹ 1000 + 18% GST.</li>
                                    <li>2. <span class="text-danger">இந்து</span> சைவபிள்ளை, பிள்ளைமார், கார்காத்தார், பிராமணர்கள், ஐயர், ஐயங்கார், சைவ செட்டியார் (மட்டும்). (OC Candidates only).</li>
                                    <li>3. நுழைவு கட்டணம் எக்காரணம் கொண்டும் திருப்பி தரப்படமாட்டாது.</li>
                                    <li>4. தரகர்கள் அனுமதி இல்லை.</li>
                                    <li>5. தொலைப்பேசி எண் தரப்படமாட்டாது.</li>
                                    <li>6. நிர்வாக தொலைப்பேசி எண் <span class="text-primary fw-bold lead">9092756325</span> (4PM - 9PM).</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-5 offset-lg-2 col-md-12 col-12 col-sm-12">
                        <div class="search-form style2 wow fadeInRight mt-0 pt-3 pb-4 shadow  @if (Auth()->check() && Auth()->user()->is_admin != 1) invisible @endif"
                            data-wow-delay=".5s">
                            <h3 class="text-center fw-light">Register Here !!!</h3>
                            <div class="row pt-4">
                                <!-- REGISTER FORM START -->
                                <form class="" id="registerForm" action="{{route('register')}}" method="POST">
                                    <div class="col-12 row">
                                        <div class="col-3 search-input">
                                            <label for="username">Name</label>
                                        </div>
                                        <div class="col-9 search-input">
                                            <input type="text" name="username" id="username" placeholder="Enter Your Name"
                                                autofocus>
                                            <small class="text-danger"></small>
                                        </div>
                                    </div>

                                    <div class="col-12 row">
                                        <div class="col-3 search-input">
                                            <label for="mobile">Phone</label>
                                        </div>
                                        <div class="col-3 search-input">
                                            <select name="" id="">
                                                <option value="none">+91</option>
                                                <option value="none" selected hidden>+91</option>
                                            </select>
                                        </div>
                                        <div class="col-6 search-input">
                                            <input type="text" name="phonenumber" id="phonenumber"
                                                placeholder="Phone Number" maxlength="10">
                                            <small class="text-danger"></small>
                                        </div>
                                    </div>

                                    <div class="col-12 row">
                                        <div class="col-3 search-input">
                                            <label for="email">E-Mail</label>
                                        </div>
                                        <div class="col-9 search-input danger">
                                            <input type="email" name="email" id="email" placeholder="Enter Your Mail">
                                            <small class="text-danger"></small>
                                        </div>
                                    </div>

                                    <div class="col-12 row ">
                                        <div class="col-3 search-input">
                                            <label for="password">Password</label>
                                        </div>
                                        <div class="col-9 search-input">
                                            <input type="password" name="password" id="password"
                                                placeholder="Enter Your Password">
                                            <small class="text-danger"></small>
                                        </div>
                                    </div>

                                    <div class="col-12 row">
                                        <div class="col-3 search-input">
                                            <label for="password">Confirm Password</label>
                                        </div>
                                        <div class="col-9 search-input">
                                            <input type="password" name="password_confirmation" id="confirm_password"
                                                placeholder="Enter Your Password Again">
                                            <small class="text-danger"></small>
                                        </div>
                                    </div>

                                    <div class="col-12 row">
                                        <div class="col-3 search-input">
                                            <label for="">Gender</label>
                                        </div>
                                        <div class="col-9 search-input">
                                            <select name="gender" id="gender">
                                                @foreach ($gender as $row)
                                                    <option value="{{ $row->id }}">{{ $row->gender_name }}
                                                    </option>
                                                @endforeach
                                                <option value="" selected hidden>Select Gender</option>
                                            </select>
                                            <small class="text-danger"></small>
                                        </div>
                                    </div>

                                    <div class="col-12 row">
                                        <div class="col-3 search-input">
                                            <label for="dob">Date OF Birth</label>
                                        </div>
                                        <div class="col-9 search-input">
                                            <input type="date" name="dob" id="dob" onclick="this.max=`${(new Date().getFullYear()) - 18}-12-31`">
                                            <small class="text-danger"></small>
                                        </div>
                                    </div>

                                    <div class="col-12 row">
                                        <div class="col-3 search-input">
                                            <label for="religion">Religion</label>
                                        </div>
                                        <div class="col-9 search-input">
                                            <select name="religion" id="religion">
                                                <option selected hidden value>Select Religion</option>
                                                @foreach ($religion as $row)
                                                    <option value="{{ $row->id }}">{{ $row->religion_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <small class="text-danger"></small>
                                        </div>
                                    </div>

                                    <div class="col-12 row">
                                        <div class="col-3 search-input">
                                            <label for="caste">Caste</label>
                                        </div>
                                        <div class="col-9 search-input">
                                            <select name="caste" id="caste" disabled>
                                                <option selected hidden value=''>Select Caste</option>
                                            </select>
                                            <small class="text-danger"></small>
                                        </div>
                                    </div>

                                    <div class="col-12 row mt-2">
                                        <div class="col-3 search-input">
                                            <label for="">Must Be</label>
                                        </div>
                                        <div class="col-9 p-0 d-flex justify-content-start">
                                            <div>
                                                <input type="checkbox" id="veg" name="veg" checked> <label class="" for="veg">
                                                    Vegetarian
                                                 </label>
                                            </div>&nbsp;&nbsp;|&nbsp;&nbsp;
                                            <div>
                                                <input type="checkbox" id="teetotaler" name="teetotaler" checked> <label class="" for="teetotaler">
                                                    Teetotaler
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>

                                    <div class="col-12 row">
                                        <div class="col-3 text-enter" style="text-align:right">
                                            <input class="" type="checkbox" name="terms" id="terms">
                                        </div>
                                        <div class="col-9" style="text-align: left">
                                            <label class="small" for="flexCheckDefault2">
                                                I accept the <a href="#" rel="noopener noreferrer">Terms of Use
                                                    & Privacy Policy</a>
                                            </label>
                                        </div>
                                    </div>
                                    @csrf

                                    <div class="col-md-12 text-center mt-2">
                                        <input id="userRegister" form="registerForm"
                                            class="col-12 btn btn-primary btn-block pr-0" type="submit" value="Register"
                                            onclick="formSubmit()" disabled>
                                    </div>
                                </form>
                                <!-- REGISTER FORM END -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- HERO SECTION END -->

        <!-- TRENDING SECTION START -->
        @if (Auth()->check() && Auth()->user()->is_admin != 1 && Auth()->user()->is_paid)
            <section class="items-tab pt-5">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="title">
                                <h2 class="fw-light wow fadeInUp" data-wow-delay=".4s">Now On Trending !</h2>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12">
                            <nav>
                                <div class="nav nav-tabs mb-3" id="nav-tab" role="tablist">
                                    <button class="nav-link active" id="nav-new-tab" data-bs-toggle="tab"
                                        data-bs-target="#nav-new" type="button" role="tab" aria-controls="nav-new"
                                        aria-selected="true">New Profiles </button>
                                </div>
                            </nav>

                            <div class="tab-content bg-white" id="nav-tabContent">
                                <div class="tab-pane fade show active" id="nav-new" role="tabpanel"
                                    aria-labelledby="nav-new-tab">
                                    <div class="categories">
                                        <div class="container">
                                            <div class="cat-inner shadow border-0">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="category-slider">
                                                            @foreach ($new_user_info as $new_user)
                                                                @php
                                                                    $image_src = ($new_user->userBasicInfos->gender_id == 1) ? asset('assets/Website/male.png') : asset('assets/Website/female.png');
                                                                @endphp
                                                                @if (Auth()->check() && Auth()->user()->is_admin != 1)
                                                                    @if ($new_user->id != Auth()->user()->id)

                                                                        <a href='{{ route('viewprofile.show', $new_user->id) }}'
                                                                            target="_blank">
                                                                            <div class="single-item-grid">
                                                                                <div class="image">
                                                                                    <img class="rounded"
                                                                                        src="{{ $new_user->userBasicInfos->user_profile_image ? $new_user->userBasicInfos->image_with_path : $image_src }}"
                                                                                        alt="#" loading='eager'>
                                                                                </div>
                                                                                <div class="text-center">
                                                                                    <h6 class="text-primary fw-normal">
                                                                                        {{ $new_user->user_profile_id ?? '-' }}</h6>
                                                                                        <p class="badge bg-primary fw-normal">VIEW</p>
                                                                                </div>
                                                                            </div>
                                                                        </a>
                                                                    @endif
                                                                @else
                                                                    <a data-bs-toggle="modal" data-bs-target="#exampleModal"
                                                                        href='javascript:void(0)'>
                                                                        <div class="single-item-grid">
                                                                            <div class="image">
                                                                                <img class="rounded"
                                                                                    src="{{ $new_user->userBasicInfos->user_profile_image ? $new_user->userBasicInfos->image_with_path : $image_src }}"
                                                                                    alt="#" loading='eager'>
                                                                            </div>
                                                                            <div class="text-center">
                                                                                <h6 class="text-primary fw-normal">
                                                                                    {{ $new_user->user_profile_id ?? '-' }}</h6>
                                                                                    <p class="badge bg-primary fw-normal">VIEW</p>
                                                                            </div>
                                                                        </div>
                                                                    </a>
                                                                @endif
                                                            @endforeach
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
                </div>
            </section>
        @endif
        <!-- TRENDING SECTION END -->

        <!-- ABOUT SECTION START -->
        <section class="about-us section bg-light">
            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-lg-6 col-md-12 col-12">
                        <div class="content-left wow fadeInLeft" data-wow-delay=".3s">
                            <img src="{{ asset('web/images/about-us.jpg') }}" alt="#">

                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-12">
                        <div class="content-right wow fadeInRight" data-wow-delay=".5s">
                            <span class="sub-heading">About</span>
                            <h2 class="fw-light">
                                {{-- About {{ $webInfo->company_name }}</h2>--}}
                            <p>{{ $webInfo->company_about }}</p>
                                {{-- <h3 class="fw-light">What We Do</h3>
                                <p>{{ $webInfo->company_name }}</p> --}}
                        </div>
                    </div>

                </div>
            </div>
        </section>
        <!-- ABOUT SECTION END -->



        <!-- BASIC SEARCH SECTION START -->
        @if (Auth()->check() && Auth()->user()->is_admin != 1 && Auth()->user()->is_paid)
            <section class="mt-5">
                <div class="container">
                    <div class="row ">
                        <div class="col-md-12 col-12">
                            <div class="content">
                                <div class="text-center">
                                    <h3 class="wow fadeInUp fw-light" data-wow-delay=".4s">Are you Waiting For Your
                                        Future Partner !!
                                    </h3>
                                    <p class="wow fadeInUp pt-2" data-wow-delay=".6s">Don't Wait. Let Search Profiles.</p>
                                </div>
                                <div class="mt-2">
                                    <h5 class="text-center pt-3 h5">Search By Profile ID</h5>
                                    <div class="col-md-4 offset-md-4">
                                        <form id='profile_id_form'>
                                            @csrf
                                            <div class="input-group">
                                                <input name="profile_id" id='profile_id' type="text" class="form-control"
                                                    placeholder="Enter Profile ID" required>
                                                <button id="profileIdBtn" class="btn btn-primary" type="button">Search</button>
                                            </div>
                                        </form>
                                    </div>
                                    <div id='profileResult' class="mt-2">
                                        <!-- HERE SHOW THE PROFILE RESULTS -->
                                    </div>
                                </div>

                                <div class="items-tab mt-3 mb-4">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-12">
                                                <nav>
                                                    <div class="nav nav-tabs mb-0" id="nav-tab" role="tablist">
                                                        <button class="nav-link active" id="nav-basic-tab" data-bs-toggle="tab"
                                                            data-bs-target="#nav-basic" type="button" role="tab"
                                                            aria-controls="nav-basic" aria-selected="true">Basic Search</button>
                                                    </div>
                                                </nav>
                                                <div class="tab-content" id="nav-tabContent">
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
                                                                                id='home_search_religion' required>
                                                                                <option value="" selected hidden>Select Religion
                                                                                </option>
                                                                                @foreach ($religion as $row)
                                                                                    <option value="{{ $row->id }}">
                                                                                        {{ $row->religion_name }}
                                                                                    </option>
                                                                                @endforeach
                                                                            </select>
                                                                        </div>
                                                                        <div class="col-md-4 search-input mb-3">
                                                                            <span>Caste <span
                                                                                    class="small text-primary">(Select
                                                                                    Religion)</span></span>
                                                                            <select name="search_caste"
                                                                                id='home_search_caste' disabled>
                                                                                <option value="" selected hidden>Select Caste
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
                                                                                    <input type="range"
                                                                                        name="search_from_age" min="0"
                                                                                        max="60" value="18" id="slider-1"
                                                                                        oninput="slideOne()">
                                                                                    <input type="range"
                                                                                        name="search_to_age" min="0"
                                                                                        max="60" value="30" id="slider-2"
                                                                                        oninput="slideTwo()">
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-md-4">

                                                                        </div>

                                                                    </div>
                                                                    <div class="row mt-4 mb-4">
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
        @endif
        <!-- BASIC SEARCH SECTION END -->


        <!-- DYNAMIC ADS SECTION START -->
        {{-- <div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="https://3c5239fcccdc41677a03-1135555c8dfc8b32dc5b4bc9765d8ae5.ssl.cf1.rackcdn.com/Adver--Banners--150x750px-RIOT.jpg"
                        class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="https://3c5239fcccdc41677a03-1135555c8dfc8b32dc5b4bc9765d8ae5.ssl.cf1.rackcdn.com/Adver--Banners--150x750px-RIOT.jpg"
                        class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="https://3c5239fcccdc41677a03-1135555c8dfc8b32dc5b4bc9765d8ae5.ssl.cf1.rackcdn.com/Adver--Banners--150x750px-RIOT.jpg"
                        class="d-block w-100" alt="...">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div> --}}
        <!-- DYNAMIC ADS SECTION END -->

        <!-- ACHIVEMENT SECTION START -->
        <section class="our-achievement section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-3 col-12">
                        <div class="single-achievement wow fadeInUp" data-wow-delay=".2s">
                            <h3 class="counter"><span id="secondo1" class="countup"
                                    cup-end="1250">1250</span>+
                            </h3>
                            <p>Trusted Profiles</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-12">
                        <div class="single-achievement wow fadeInUp" data-wow-delay=".4s">
                            <h3 class="counter"><span id="secondo2" class="countup"
                                    cup-end="350">350</span>+
                            </h3>
                            <p>Featured Profiles</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-12">
                        <div class="single-achievement wow fadeInUp" data-wow-delay=".6s">
                            <h3 class="counter"><span id="secondo3" class="countup"
                                    cup-end="2500">2500</span>+
                            </h3>
                            <p>Reguler Members</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-12">
                        <div class="single-achievement wow fadeInUp" data-wow-delay=".6s">
                            <h3 class="counter"><span id="secondo3" class="countup"
                                    cup-end="250">250</span>+
                            </h3>
                            <p>Premium Profiles</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- ACHIVEMENT SECTION END -->

       <!-- REGISTER DEMO SECTION START-->
    <section class="how-works bg-white mt-5 mb-5">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <h2 class="wow fadeInUp fw-light" data-wow-delay=".4s">Register In 3 Steps</h2>
                        {{-- <p class="wow fadeInUp" data-wow-delay=".6s">Lorem ipsum dolor sit amet consectetur
                            adipisicing
                            elit. Veritatis voluptatum perferendis soluta. Quas, nostrum quaerat esse nulla expedita
                            rem? Ad.</p> --}}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-4 col-12">

                    <div class="single-work wow fadeInUp" data-wow-delay=".2s">
                        <span class="serial"><i class="lni lni-user"></i></span>
                        <h3 class="fw-light">Create Account</h3>
                        <p>To create a profile on the Alamelu Mangai Matrimony webiste, the users need to register by
                            filling a simple form.</p>
                        <br>
                    </div>

                </div>
                <div class="col-lg-4 col-md-4 col-12">

                    <div class="single-work wow fadeInUp" data-wow-delay=".4s">
                        <span class="serial"><i class="lni lni-rupee"></i></span>
                        <h3 class="fw-light">Payment</h3>
                        <p>On our website,the registration fee is &#8377;1000.After registration, the user put up profile.
                        </p>
                        <br>
                    </div>

                </div>
                <div class="col-lg-4 col-md-4 col-12">

                    <div class="single-work wow fadeInUp" data-wow-delay=".6s">
                        <span class="serial"><i class="lni lni-heart"></i></span>
                        <h3 class="fw-light">Find Your Perfect Pair</h3>
                        <p>We recommend matches as per your expectations, helping you connect with prospects and assisting
                            you to find your perfect match.</p>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!-- REGISTER DEMO SECTION END-->

        <!-- TESTIMONIALS SECTION START-->
        <section class="testimonials section">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="section-title align-center gray-bg">
                            <h2 class="wow fadeInUp fw-light" data-wow-delay=".4s" aria-hidden="true">What People Say</h2>
                            <p class="wow fadeInUp" data-wow-delay=".6s">Read Our Happy Stories</p>
                        </div>
                    </div>
                </div>
                <div class="row testimonial-slider">
                    <div class="col-lg-4 col-md-6 col-12">

                        <div class="single-testimonial rounded shadow">
                            <div class="quote-icon">
                                <i class="lni lni-quotation"></i>
                            </div>
                            <div class="author">
                                <img src=" {{asset('web/images/testimonial_img/testimonial-1.jpg')}} " alt="#">
                                <h4 class="name">
                                    Hari Krishnan & Gayathiri

                                </h4>
                            </div>
                            <div class="text">
                                <p>"My whole family thanks Alamelu Mangai Matrimony for helping find a good life partner for me. Without you this would not have been possible."</p>
                            </div>
                        </div>

                    </div>
                    <div class="col-lg-4 col-md-6 col-12">

                        <div class="single-testimonial rounded shadow">
                            <div class="quote-icon">
                                <i class="lni lni-quotation"></i>
                            </div>
                            <div class="author">
                                <img src="{{asset('web/images/testimonial_img/testimonial-2.jpg')}}" alt="#">
                                <h4 class="name">
                                    Sudharshan & Abhirami

                                </h4>
                            </div>
                            <div class="text">
                                <p>"Thanks a lot for the whole team of Alamelu Mangai Matrimony for helping to find my soul mate."</p>
                                <br>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-12">
                        <div class="single-testimonial rounded shadow">
                            <div class="quote-icon">
                                <i class="lni lni-quotation"></i>
                            </div>
                            <div class="author">
                                <img src="{{asset('web/images/testimonial_img/testimonial-3.jpg')}}" alt="#">
                                <h4 class="name">
                                    Adhitya & Nandhini

                                </h4>
                            </div>
                            <div class="text">
                                <p>"After searching everywhere, we came to Alamelu Mangai Matrimony and was impressed on getting a good match within two months."</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="section-title align-center gray-bg">
                            <h2 class="wow fadeInUp fw-light" data-wow-delay=".4s" aria-hidden="true">Now it is your turn to be happily married </h2>
                            <a class="btn btn-primary btn-lg" href="#start"><i
                                class="lni lni-user"></i> Register Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- TESTIMONIALS SECTION END -->
    </main>

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
                                "<div class='card col-md-4 offset-md-4 shadow'>" +
                                "<div class='row'>" +
                                "<div class='col-md-5'>" +
                                "<img src='" + src + "' class='w-50'>" +
                                "</div>" +
                                "<div class='col-md-7 text-center align-middle mt-2'>" +
                                "<h5>" + res.user_profile_id + "</h5>" +
                                "@if (Auth()->check() && Auth()->user()->is_admin != 1)"+

"<a href='" +href + "' target='_blank' class='btn btn-primary btn-sm'>View Profile</a>" +
                                        "@else"+
                                            "<a data-bs-toggle='modal' data-bs-target='#exampleModal'"+
                                                "href='javascript:void(0)' class='btn btn-primary'>View Profile</a>"+
                                        "@endif"+
                                "</div>" +
                                "</div>" +
                                "</div>");

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


        // HOME RELIGION - CASTE
        $('#home_search_religion').on('change', function() {
            let religionId = $(this).val();
            let url = '{{ route('getCaste') }}?religion_id=' + religionId;
            getAjaxValue(url, function(data) {
                $('#home_search_caste').empty();
                $('#home_search_caste').append('<option value="" hidden>Select Caste</option>');

                $.each(data, function(key, caste) {
                    $('#home_search_caste').append('<option value="' +
                        caste.id +
                        '">' + caste.caste_name + '</option>');
                });
                $('#home_search_caste').removeAttr('disabled');
            })
        })

        // DYNAMIC DROPDOWN - RELIGION - CASTE
        $(function(){
            $('#religion').on('change', function() {
                var religionID = this.value;
                $('#caste').html('');
                $.ajax({
                    url: '{{ route('getCaste') }}?religion_id=' + religionID,
                    type: "GET",
                    data: {
                        "_token": "{{ csrf_token() }}"
                    },
                    dataType: "json",
                    success: function(data) {
                        if (data) {
                            $('#caste').empty();
                            $('#caste').append('<option  hidden>Choose Caste</option>');
                            $.each(data, function(key, caste) {
                                $('select[name="caste"]').append('<option value="' + caste.id +
                                    '">' + caste.caste_name + '</option>');
                            });
                            $('#caste').removeAttr('disabled');
                        } else {
                            $('#caste').empty();
                        }
                    }
                });
            });
        })

    </script>
    <!-- SCRIPTS SECTION END -->
@stop
