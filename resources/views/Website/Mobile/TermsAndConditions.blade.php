@extends('Website.layouts.checkout_main')
@section('content')

    <section id="contact-us" class="contact-us section">
        <div class="container">
            <div class="contact-head wow fadeInUp" data-wow-delay=".4s">
                <div class="row">
                    <div class="col-lg-10 offset-lg-1 col-12">
                        <div class="form-main">
                            <div class="form-title">
                                <h2 class="text-center">Terms And Conditions</h2>
                                <div>
                                    {{ $privacyInfo->company_privacy_policy }}
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
