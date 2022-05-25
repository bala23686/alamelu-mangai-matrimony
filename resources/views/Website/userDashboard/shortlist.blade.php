@extends('Website.layouts.default')
{{-- <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet"> --}}
<style>
    body {
        background: #DCDCDC;
        margin-top: 20px;
    }

    .card-box {
        padding: 20px;
        border-radius: 3px;
        margin-bottom: 30px;
        background-color: #fff;
    }

    .social-links li a {
        border-radius: 50%;
        color: rgba(121, 121, 121, .8);
        display: inline-block;
        height: 30px;
        line-height: 27px;
        border: 2px solid rgba(121, 121, 121, .5);
        text-align: center;
        width: 30px
    }

    .social-links li a:hover {
        color: #797979;
        border: 2px solid #797979
    }

    .thumb-lg {
        height: 88px;
        width: 88px;
    }

    .img-thumbnail {
        padding: .25rem;
        background-color: #fff;
        border: 1px solid #dee2e6;
        border-radius: .25rem;
        max-width: 100%;
        height: auto;
    }

    .text-pink {
        color: #ff679b !important;
    }

    .btn-rounded {
        border-radius: 2em;
    }

    .text-muted {
        color: #98a6ad !important;
    }

    h4 {
        line-height: 22px;
        font-size: 18px;
    }

</style>
@section('content')
    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-12">
                    <ul class="breadcrumb-nav">
                        <li><a href="{{ route('user.dashboard') }}">Home</a></li>
                        <li>ShortLists</li>
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
                            <h3 class="text-center fw-light mt-3 mb-4">ShortListed Profiles</h3>
                        </div>
                        <div id="shorlist_data" class="mt-0 profile-settings-block mb-3">
                            <div class="row">
                                @foreach ($userinfo as $shorlist_users)
                                    @php
                                        $image_src = $shorlist_users->ShortlistBasicInfo->gender_id == 1 ? asset('assets/Website/male.png') : asset('assets/Website/female.png');
                                    @endphp
                                    <div class="col-md-3">
                                        <div class="text-center">
                                            <div class="member-card p-2 shadow rounded bg-white">
                                                <div class="thumb-lg member-thumb mx-auto">
                                                    <img class="rounded-circle img-thumbnail mt-2"
                                                        @if (!empty($user_image_with_path)) src="{{ $user_image_with_path }}"
                                                        @else src="{{ $image_src }}" @endif
                                                        alt="#">
                                                </div>
                                                <div class="content mt-3">
                                                    <ul class="info">
                                                        <li class="like" data-bs-toggle="tooltip"
                                                            data-bs-placement="top" title="Remove From Shortlist"><span
                                                                role="button" class="badge rounded-pill bg-danger"
                                                                onclick="remove_shortlist({{ $shorlist_users->user_id }})">Remove</span>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="mt-2">
                                                    <h6>{{ $shorlist_users->userShortListInfo->username }}</h6>
                                                    <p class="text-muted">ID: <span><a href="#"
                                                                class="text-primary">{{ $shorlist_users->userShortListInfo->user_profile_id ?? 'TM######' }}</a></span>
                                                    </p>
                                                </div>

                                                <div class="mt-3">
                                                    <div style="display: flex;justify-content: space-around;">
                                                        <div class="">
                                                            <p class="mb-0 text-dark">Age</p>
                                                            <p>{{ $shorlist_users->ShortlistBasicInfo->age }}</p>
                                                        </div>

                                                        <div class="">
                                                            <p class="mb-0 text-dark">Gender</p>
                                                            <p>{{ $shorlist_users->ShortlistBasicInfo->genderInfo->gender_name }}
                                                            </p>
                                                        </div>

                                                        <div class="">
                                                            <p class="mb-0 text-dark">Location</p>
                                                            <p>{{ $shorlist_users->ShortlistPlaceInfo->userState->state_name }}
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <a type="button"
                                                    href="{{ route('viewprofile.show', $shorlist_users->userShortListInfo->id) }}"
                                                    class="btn btn-primary mt-2 mb-2 btn-rounded waves-effect w-md waves-light">View
                                                    Profile</a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end col -->
                                @endforeach
                            </div>
                            <!-- end row -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
        function remove_shortlist(id) {
            $.post('{{ route('user.remove_from_shortlists') }}', {
                    _token: '{{ csrf_token() }}',
                    id: id
                },
                function(data) {
                    if (data == 1) {
                        $("#shortlisted_member_" + id).hide();
                        // location.reload();
                        toastr.success('You Have Removed This User From Shortlist');

                    } else {
                        toastr.console.error('Something went wrong');
                    }
                    location.reload();
                }
            );
        }
    </script>
@stop
