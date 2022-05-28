@extends('Website.layouts.default')

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
                    @php
                        $user=App\Models\User::find(auth()->user()->id)->load('userBasicInfo');
                        [$performance,$bgColor]=App\Helpers\UserSideBar\UserSideBarHelper::make($user)->logic();
                    @endphp
                    <x-user-dashboard.side-bar  :user="$user" :status="0" :performance="$performance" :bgColor="$bgColor" />
                </div>
                <div class="col-lg-9 col-md-8 col-12">
                    <div class="main-content">
                        {{-- <div class="dashboard-block mt-0 profile-settings-block mb-3">
                            <h4 class="text-center fw-light mt-3 mb-4">Current Plan Details</h4>
                        </div> --}}
                        <section class="pricing-table section">
                            <div class="container">
                                <div class="row">
                                    @foreach ($packages as $package)
                                        <div class="col-lg-6 " style="margin: 0 auto">
                                            <div class="single-table wow fadeInUp" data-wow-delay=".2s">
                                                <div class="table-head">
                                                    <div class="price">
                                                        <h2 class="amount">
                                                            &#x20b9;{{ $package->package_price }}
                                                        </h2>
                                                    </div>
                                                    <h4 class="title">
                                                        {{ $package->package_name }}
                                                    </h4>
                                                </div>
                                                <br>
                                                <ul class="table-list">
                                                    <li>Remaining
                                                        :<strong>{{ $package->package_allowed_profile }}</strong>
                                                        Profile Visit
                                                    </li>
                                                    <li>Remaining :<strong>{{ $package->package_photo_upload }}</strong>
                                                        Photo Upload
                                                    </li>
                                                    <li>Remaining
                                                        :<strong>{{ $package->package_interest_allowed }}</strong>
                                                        Express
                                                        Interest</li>
                                                    <li>Expiry Date :<strong>{{ $package->package_valid_for }}</strong>
                                                        Months
                                                        {{-- <li>Validity :<strong>
                                                            @if (\App\Helpers\Utility\PackageHelper::package_validity($user->id))
                                                            @else
                                                                <span class="text-danger">Expired</span>
                                                            @endif
                                                        </strong>
                                                    </li> --}}
                                                </ul>
                                                <div class="row">
                                                    @if (\App\Helpers\Utility\PackageHelper::get_remaining_package_value($user->id, 'user_package_id') == $package->id)
                                                        <div class="col-lg-6">
                                                            <div class="button">
                                                                <a class="btn btn-primary btn-lg btn-block float-start">Current
                                                                    Plan
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="button">
                                                                <a href="{{ route('user.payments.payU', $user->id) }}?amount={{ $package->package_price }}&&packageId={{ $package->id }}"
                                                                    class="btn btn-primary btn-lg btn-block float-end">Purchase
                                                                    again</a>
                                                            </div>
                                                        </div>
                                                    @else
                                                        <div class="col-lg-12">
                                                            <div class="button">
                                                                <a id="update_package"
                                                                    class="btn btn-primary btn-lg btn-block float-end"
                                                                    href="{{ route('user.payments.payU', $user->id) }}?amount={{ $package->package_price }}&&packageId={{ $package->id }}">Purchase
                                                                    Plan
                                                                </a>
                                                            </div>
                                                        </div>
                                                    @endif
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
