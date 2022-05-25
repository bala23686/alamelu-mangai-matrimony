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
                            <h3 class="text-center fw-light mt-3 mb-4">Member</h3>
                        </div>
                        <div id="shorlist_data" class="dashboard-block mt-0 profile-settings-block mb-3">
                            <div class="row">
                                @foreach ($users as $user)
                                    <div class="col-lg-4">
                                        <div class="text-center card-box">
                                            <div class="member-card pt-2 pb-2">
                                                <div class="thumb-lg member-thumb mx-auto">
                                                    <img class="rounded-circle img-thumbnail"
                                                        @if (!empty($user_image_with_path)) src="{{ $user_image_with_path }}"
                                                        @else src="https://cdn.icon-icons.com/icons2/1378/PNG/512/avatardefault_92824.png" @endif
                                                        alt="#">
                                                    {{-- <img src="#" class="rounded-circle img-thumbnail" alt="profile-image"> --}}
                                                </div>
                                                <div class="content">
                                                    <ul class="info">
                                                        <li class="like"><a
                                                                onclick="remove_shortlist({{ $users->user_id }})"><i
                                                                    class="lni lni-heart-filled"
                                                                    style="color: #ff679b"></i></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="">
                                                    <h6>{{ $users->userShortListInfo->username }}</h6>
                                                    <p class="text-muted">@Username <span>| </span><span><a href="#"
                                                                class="text-pink">{{ $users->userShortListInfo->user_profile_id ?? 'TM######' }}</a></span>
                                                    </p>
                                                </div>
                                                <a type="button"
                                                    href="{{ route('viewprofile.show', $users->userShortListInfo->id) }}"
                                                    class="btn btn-primary mt-3 btn-rounded waves-effect w-md waves-light">View
                                                    Profile</a>
                                                <div class="mt-4">
                                                    <div class="row">
                                                        <div class="col-4">
                                                            <div class="mt-3">
                                                                <p class="mb-0 text-muted">Age</p>
                                                                <h6>{{ $users->ShortlistBasicInfo->age }}</h6>
                                                            </div>
                                                        </div>
                                                        <div class="col-4">
                                                            <div class="mt-3">
                                                                <p class="mb-0 text-muted">Gender</p>
                                                                <h6>{{ $users->ShortlistBasicInfo->genderInfo->gender_name }}
                                                                </h6>
                                                            </div>
                                                        </div>
                                                        <div class="col-4">
                                                            <div class="mt-3">
                                                                <p class="mb-0 text-muted">Location</p>
                                                                <h6>{{ $users->ShortlistPlaceInfo->userState->state_name }}
                                                                </h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>


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
