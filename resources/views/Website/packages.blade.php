@extends('Website.layouts.default')
@section('content')

    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-12">
                    <ul class="breadcrumb-nav">
                        <li><a href="{{ route('user.dashboard') }}">Home</a></li>
                        <li>Packages & Pricing</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <section class="pricing-table mb-3">
        <div class="container">
            <div class="row">
                @foreach ($packageInfo as $package)
                    <div class="col-lg-3 col-md-6 col-12">
                        <div class="single-table wow fadeInUp shadow" data-wow-delay=".2s">
                            <div class="table-head">
                                <div class="price">
                                    <h3 class="amount">{{ $package->package_price }}<span class="duration">/
                                            {{ $package->package_valid_for }}
                                            Month</span></h3>
                                </div>
                                <h5 class="title">{{ $package->package_name }}</h5>
                            </div>
                            <ul class="table-list">
                                <li>{{ $package->package_allowed_profile }} Allowed Profile</li>
                                <li>{{ $package->package_photo_upload }} Photos To Upload</li>
                                <li>{{ $package->package_interest_allowed }} Send Interests</li>
                            </ul>
                            <div class="button">
                                <a class="btn" href="{{ $package->id }}">Choose Plan</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

@stop
