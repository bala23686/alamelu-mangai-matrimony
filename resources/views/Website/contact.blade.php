@extends('Website.layouts.default')
@section('content')

    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-12">
                    <ul class="breadcrumb-nav">
                        <li><a href="{{ route('Home') }}">Home</a></li>
                        <li>Contact</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <section id="contact-us" class="contact-us section">
        <div class="container">
            <div class="contact-head wow fadeInUp" data-wow-delay=".4s">
                <div class="row">
                    <div class="col-lg-4 col-12">
                        <div class="single-head">
                            <div class="contant-inner-title">
                                <h2>Our Contacts & Location</h2>
                                <p>{{ $webInfo->company_country ?? '' }},
                                    {{ $webInfo->company_pincode ?? '' }}.</p>
                            </div>
                            <div class="single-info">
                                <h3>Opening hours</h3>
                                <ul>
                                    <li>Daily: 9.30 AM–6.00 PM</li>
                                    <li>Sunday & Holidays: Closed</li>
                                </ul>
                            </div>
                            <div class="single-info">
                                <h3>Contact info</h3>
                                <ul>
                                    <li class="mb-0"><i class="lni lni-map-marker"></i>
                                        {{ $webInfo->company_address ?? '' }},
                                        {{ $webInfo->company_city ?? '' }},
                                        {{ $webInfo->company_state ?? '' }},
                                        {{ $webInfo->company_country ?? '' }},
                                        {{ $webInfo->company_pincode ?? '' }}.</li>
                                    <li class="mb-2"><b>Tel:</b>
                                        +91-{{ $webInfo->company_contact_number ?? '' }}.</li>
                                </ul>
                            </div>
                            <div class="single-info contact-social">
                                <h3>Social contact</h3>
                                <ul>
                                    <li><a href="javascript:void(0)"><i class="lni lni-facebook-original"></i></a></li>
                                    <li><a href="javascript:void(0)"><i class="lni lni-twitter-original"></i></a></li>
                                    <li><a href="javascript:void(0)"><i class="lni lni-linkedin-original"></i></a></li>
                                    {{-- <li><a href="javascript:void(0)"><i class="lni lni-pinterest"></i></a></li> --}}
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8 col-12">
                        <div class="form-main">
                            <div class="form-title">
                                <h2 class="p-2 fw-light text-center"><span class="fw-bolder text-primary">அலமேலு
                                        மங்கை</span>
                                    திருமண தகவல் மையம்</h2>
                            </div>
                            <div class="col-lg-12 col-md-12 col-12 col-sm-12 mb-4">
                                <div class="card shadow border-0">
                                    <div class="card-body">
                                        {{-- <h4 class="p-2 fw-light"><span class="fw-bolder text-primary">அலமேலு மங்கை</span>
                                            திருமண தகவல் மையம்</h4> --}}
                                        {{-- <h5 class="text-center fw-normal">(சைவ பிள்ளை மட்டும்)</h5> --}}
                                        <h4 class="p-2 fw-light"><span class="fw-bolder text-danger">குறிப்பு :</span>
                                        </h4>
                                        <hr>

                                        <ul class="text-dark p-0 m-0">
                                            {{-- <li class="small text-danger fw-bold">குறிப்பு :</li> --}}
                                            <li>1. நுழைவு கட்டணம் ₹ 1000 + 18% GST.</li>
                                            <li>2. <span class="text-danger">இந்து</span> சைவபிள்ளை, பிள்ளைமார்,
                                                கார்காத்தார், பிராமணர்கள், ஐயர், ஐயங்கார், சைவ செட்டியார் (மட்டும்). (OC
                                                Candidates only).</li>
                                            <li>3. நுழைவு கட்டணம் எக்காரணம் கொண்டும் திருப்பி தரப்படமாட்டாது.</li>
                                            <li>4. தரகர்கள் அனுமதி இல்லை.</li>
                                            <li>5. தொலைப்பேசி எண் தரப்படமாட்டாது.</li>
                                            <li>6. நிர்வாக தொலைப்பேசி எண் <span
                                                    class="text-primary fw-bold lead">9092756325</span> (4PM - 9PM).</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop
