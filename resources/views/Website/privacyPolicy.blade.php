@extends('Website.layouts.default')
@section('content')

    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-12">
                    <ul class="breadcrumb-nav">
                        <li><a href="index.html">Home</a></li>
                        <li>Privacy Policy</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <section id="contact-us" class="contact-us section">
        <div class="container">
            <div class="contact-head wow fadeInUp" data-wow-delay=".4s">
                <div class="row">
                    <div class="col-lg-10 offset-lg-1 col-12">
                        <div class="form-main">
                            <div class="form-title">
                                <h2 class="text-center">Privacy Policy</h2>
                                    <div>
                                        {!! $privacy_policy->company_privacy_policy !!}
                                    </div>
                            </div>
                            <div class="row">

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop
