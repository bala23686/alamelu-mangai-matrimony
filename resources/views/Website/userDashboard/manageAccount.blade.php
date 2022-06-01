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
                            <h3 class="text-center fw-light mt-3 mb-4">Manage Account</h3>
                        </div>
                        <div id="account-setting" class="mt-0 profile-settings-block mb-3">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="fw-normal">Account Setting</h5>
                                </div>
                                <div class="card-body">
                                    <div class="profile-setting-form">
                                        <div class="row">
                                            <form role="form" action="{{ route('password.change') }}" method="post">
                                                @csrf
                                                <div class="row">
                                                    <div class="col-lg-6 col-12">
                                                        <div class="form-group">
                                                            <div class="input-group">
                                                                <span class="input-group-addon"><i
                                                                        class="glyphicon glyphicon-envelope color-blue"></i></span>

                                                                <label for="" class="text-primary">Email :</label>
                                                                <input type="email" name="email"
                                                                    placeholder="Enter Your Email Address"
                                                                    class="form-control" id="email"
                                                                    value="{{ Auth::user()->email }}" readonly>

                                                                @if ($errors->has('email'))
                                                                    <span
                                                                        class="text-danger">{{ $errors->first('email') }}</span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-12">
                                                        <div class="form-group">
                                                            <div class="input-group">
                                                                <label for="" class="text-primary">Username :</label>
                                                                <input type="email" name=""
                                                                    placeholder="Enter Your Email Address"
                                                                    class="form-control" id=""
                                                                    value="{{ Auth::user()->username }}" readonly>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-12">
                                                        <div class="form-group">
                                                            <div class="input-group">
                                                                <label for="" class="text-primary">Mobile Number:</label>
                                                                <input type="number" name=""
                                                                    placeholder="Enter Your Email Address"
                                                                    class="form-control" id=""
                                                                    value="{{ Auth::user()->phonenumber }}" readonly>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-6 col-12">
                                                        <div class="form-group">
                                                            <label for="" class="text-primary">Note :<span>You can change
                                                                    password</span></label>
                                                            <input name="recover-submit" class="btn btn-primary btn-sm"
                                                                value="Change Password" type="submit">
                                                        </div>

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
    </section>

@stop
