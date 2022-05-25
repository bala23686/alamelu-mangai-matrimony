@extends('Website.layouts.default')
<style>
    @import url(https://fonts.googleapis.com/css?family=Lato:400,700);

    body {
        background: #F2F2F2;
        padding: 0;
        maring: 0;
    }

    #price {
        text-align: center;
    }

    .plan {
        display: inline-flex;
        margin: 10px 1%;

        font-family: 'Lato', Arial, sans-serif;
    }

    .plan-inner {
        background: #fff;
        margin: 0 auto;
        min-width: 280px;
        max-width: 100%;
        position: relative;
    }

    .entry-title {
        background: #53CFE9;
        height: 140px;
        position: relative;
        text-align: center;
        color: #fff;
        margin-bottom: 30px;
    }

    .entry-title>h3 {
        background: #20BADA;
        font-size: 20px;
        padding: 5px 0;
        text-transform: uppercase;
        font-weight: 700;
        margin: 0;
    }

    .entry-title .price {
        position: absolute;
        bottom: -25px;
        background: #20BADA;
        height: 95px;
        width: 95px;
        margin: 0 auto;
        left: 0;
        right: 0;
        overflow: hidden;
        border-radius: 50px;
        border: 5px solid #fff;
        line-height: 80px;
        font-size: 28px;
        font-weight: 700;
    }

    .price span {
        position: absolute;
        font-size: 9px;
        bottom: -10px;
        left: 30px;
        font-weight: 400;
    }

    .entry-content {
        color: #323232;
    }

    .entry-content ul {
        margin: 0;
        padding: 0;
        list-style: none;
        text-align: center;
    }

    .entry-content li {
        border-bottom: 1px solid #E5E5E5;
        padding: 10px 0;
    }

    .entry-content li:last-child {
        border: none;
    }

    .btn {
        padding: 3em 0;
        text-align: center;


    }

    .btn a {
        background: #ffffff;
        padding: 10px 30px;
        color: rgb(0, 0, 0);
        text-transform: uppercase;
        font-weight: 700;
        text-decoration: none
    }

    .hot {
        position: absolute;
        top: -7px;
        background: #F80;
        color: #fff;
        text-transform: uppercase;
        z-index: 2;
        padding: 2px 5px;
        font-size: 9px;
        border-radius: 2px;
        right: 10px;
        font-weight: 700;
    }

    .basic .entry-title {
        background: #75DDD9;
    }

    .basic .entry-title>h3 {
        background: #44CBC6;
    }

    .basic .price {
        background: #44CBC6;
    }

    .standard .entry-title {
        background: #4484c1;
    }

    .standard .entry-title>h3 {
        background: #3772aa;
    }

    .standard .price {
        background: #3772aa;
    }

    .ultimite .entry-title>h3 {
        background: #DD4B5E;
    }

    .ultimite .entry-title {
        background: #F75C70;
    }

    .ultimite .price {
        background: #DD4B5E;
    }

</style>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css"
    integrity="sha384-3AB7yXWz4OeoZcPbieVW64vVXEwADiYyAEhwilzWsLw+9FgqpyjjStpPnpBO8o8S crossorigin=" anonymous">
@section('content')
    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-12">
                    <ul class="breadcrumb-nav">
                        <li><a href="{{ route('user.dashboard') }}">Home</a></li>
                        <li>Plan Details</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <section class="dashboard pt-3">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-4 col-12">
                    <x-user-dashboard.side-bar></x-user-dashboard.side-bar>
                </div>
                <div class="col-lg-9 col-md-8 col-12">
                    <div class="main-content">
                        <div class="dashboard-block mt-0 profile-settings-block mb-3">
                            <h3 class="text-center fw-light mt-3 mb-4">Current Plan Details</h3>
                        </div>
                        <section class="pricing-table">
                            <div class="container">
                                <div class="row">
                                    @foreach ($package_details as $package)
                                        <div class="col-lg-6 " style="margin: 0 auto">
                                            <div class="single-table wow fadeInUp" data-wow-delay=".2s">
                                                <div class="table-head">
                                                    <div class="price">
                                                        <h2 class="amount">
                                                            &#x20b9;{{ $package->PackageInfo->package_price }}
                                                        </h2>
                                                    </div>
                                                    <h4 class="title">
                                                        {{ $package->PackageInfo->package_name }}
                                                    </h4>
                                                </div>
                                                <br>
                                                <ul class="table-list">
                                                    <li>Remaining :<strong>{{ $package->user_views_remaining }}</strong>
                                                        Profile Visit
                                                    </li>
                                                    <li>Remaining :<strong>{{ $package->photo_upload_remaining }}</strong>
                                                        Photo Upload
                                                    </li>
                                                    <li>Remaining :<strong>{{ $package->interest_remaining }}</strong>
                                                        Express
                                                        Interest</li>
                                                    {{-- <li>Expiry Date :<strong>{{ $package->package_valid_for }}</strong> Days --}}
                                                    <li>Expiry Date :<strong>
                                                            @if (\App\Helpers\Utility\PackageHelper::package_validity($user->id))
                                                                {{ \Carbon\Carbon::parse($package->expires_on)->format('d/m/Y') }}
                                                            @else
                                                                <span class="text-danger">Expired</span>
                                                            @endif
                                                        </strong>
                                                    </li>
                                                </ul>

                                                <div class="row mt-3">
                                                    <div class="col-lg-6">

                                                        <a class="btn btn-primary btn-sm">Current Plan
                                                        </a>

                                                    </div>
                                                    <div class="col-lg-6">

                                                        <a class="btn btn-success btn-sm"
                                                            href="{{ route('purchaseNew.show', $user->id) }}">Upgrade
                                                            Plan</a>

                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    @endforeach

                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </section>

@stop
