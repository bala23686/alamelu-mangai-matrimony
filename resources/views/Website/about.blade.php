@extends('Website.layouts.default')
@section('content')

    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-12">
                    <ul class="breadcrumb-nav">
                        <li><a href="{{ route('Home') }}">Home</a></li>
                        <li>About Us</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>


    <section class="about-us section">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-lg-6 col-md-12 col-12">
                    <div class="content-left wow fadeInLeft" data-wow-delay=".3s">
                        <img src="assets/images/about/choose-left.jpg" alt="#">
                        <a href="https://www.youtube.com/watch?v=r44RKWyfcFw&amp;fbclid=IwAR21beSJORalzmzokxDRcGfkZA1AtRTE__l5N4r09HcGS5Y6vOluyouM9EM"
                            class="glightbox video"><i class="lni lni-play"></i></a>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-12">

                    <div class="content-right wow fadeInRight" data-wow-delay=".5s">

                        <span class="sub-heading">About</span>
                        <h2>
                            About Our Company</h2>
                        <p> {!! $data !!}</p>
                        <h3>Why Us</h3>
                        <ul>
                            <li>1. <span class="text-primary">Professional :</span>Team of Experienced Professionals /
                                Counselors
                                under one roof to make sure that Our Team is always beside you like a Member of the
                                Family, unless this Entire Process of Matchmaking is Complete. </li>
                            <li>2. <span class="text-primary">100% Confidential :</span> Your privacy is our utmost
                                priority.</li>
                            <li>3. <span class="text-primary">Perfect Matches :</span> </li>
                            <li>4. <span class="text-primary">Safety</span>At AlameluMangaiMatrimony.com, safety and
                                privacy, of
                                the member is
                                top priority.We let you decide who to give your contact information to. </li>
                            <li>5. <span class="text-primary">Consultant Support :</span>We make sure to give you our 100%
                                support from the beginning to the very last stage till your marriage got fixed </li>

                        </ul>

                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="our-achievement section">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-3 col-12">
                    <div class="single-achievement wow fadeInUp" data-wow-delay=".2s">
                        <h3 class="counter"><span id="secondo1" class="countup" cup-end="1250">1250</span>+
                        </h3>
                        <p>Regular Ads</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-3 col-12">
                    <div class="single-achievement wow fadeInUp" data-wow-delay=".4s">
                        <h3 class="counter"><span id="secondo2" class="countup" cup-end="350">350</span>+
                        </h3>
                        <p>Locations</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-3 col-12">
                    <div class="single-achievement wow fadeInUp" data-wow-delay=".6s">
                        <h3 class="counter"><span id="secondo3" class="countup" cup-end="2500">2500</span>+
                        </h3>
                        <p>Regular Members</p>
                    </div>
                </div>
                {{-- <div class="col-lg-3 col-md-3 col-12">
                    <div class="single-achievement wow fadeInUp" data-wow-delay=".6s">
                        <h3 class="counter"><span id="secondo3" class="countup" cup-end="250">250</span>+</h3>
                        <p>Premium Ads</p>
                    </div>
                </div> --}}
            </div>
        </div>
    </section>


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


    <section class="testimonials section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title align-center gray-bg">
                        <h2 class="wow fadeInUp" data-wow-delay=".4s">What People Say</h2>
                        <p class="wow fadeInUp" data-wow-delay=".6s">There are many variations of passages of Lorem
                            Ipsum available, but the majority have suffered alteration in some form.</p>
                    </div>
                </div>
            </div>
            <div class="row testimonial-slider">
                <div class="col-lg-4 col-md-6 col-12">

                    <div class="single-testimonial">
                        <div class="quote-icon">
                            <i class="lni lni-quotation"></i>
                        </div>
                        <div class="author">
                            <img src="assets/images/testimonial/testi1.jpg" alt="#">
                            <h4 class="name">
                                Jane Anderson
                                <span class="deg">Founder & CEO</span>
                            </h4>
                        </div>
                        <div class="text">
                            <p>"It’s amazing how much easier it has been to meet new people and create instant
                                connections. I have the exact same personality, the only thing that has changed is my
                                mindset and a few behaviors."</p>
                        </div>
                    </div>

                </div>
                <div class="col-lg-4 col-md-6 col-12">

                    <div class="single-testimonial">
                        <div class="quote-icon">
                            <i class="lni lni-quotation"></i>
                        </div>
                        <div class="author">
                            <img src="assets/images/testimonial/testi2.jpg" alt="#">
                            <h4 class="name">
                                Devid Samuyel
                                <span class="deg">Web Developer</span>
                            </h4>
                        </div>
                        <div class="text">
                            <p>"It’s amazing how much easier it has been to meet new people and create instant
                                connections. I have the exact same personality, the only thing that has changed is my
                                mindset and a few behaviors."</p>
                        </div>
                    </div>

                </div>
                <div class="col-lg-4 col-md-6 col-12">

                    <div class="single-testimonial">
                        <div class="quote-icon">
                            <i class="lni lni-quotation"></i>
                        </div>
                        <div class="author">
                            <img src="assets/images/testimonial/testi3.jpg" alt="#">
                            <h4 class="name">
                                Jully Sulli
                                <span class="deg">Ui/Ux Designer</span>
                            </h4>
                        </div>
                        <div class="text">
                            <p>"It’s amazing how much easier it has been to meet new people and create instant
                                connections. I have the exact same personality, the only thing that has changed is my
                                mindset and a few behaviors."</p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
@stop
