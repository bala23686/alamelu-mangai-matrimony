@extends('Website.layouts.default')

@section('content')
    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-12">
                    <ul class="breadcrumb-nav">
                        <li><a href="{{ route('user.dashboard') }}">Home</a></li>
                        <li>Manage Accout</li>
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
                        $user = App\Models\User::find(auth()->user()->id)->load('userBasicInfo');
                        [$performance, $bgColor] = App\Helpers\UserSideBar\UserSideBarHelper::make($user)->logic();
                    @endphp
                    <x-user-dashboard.side-bar :user="$user" :status="0" :performance="$performance" :bgColor="$bgColor" />
                </div>
                <div class="col-lg-9 col-md-8 col-12">
                    <div class="main-content">
                        <div class="dashboard-block mt-0 profile-settings-block mb-3">
                            <h3 class="text-center fw-light mt-3 mb-4">Account Settings</h3>
                        </div>
                        <div id="account-setting" class="mt-0 profile-settings-block mb-3">
                        </div>

                    @stop
