@extends('Website.layouts.default')

@section('content')
    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-12">
                    <ul class="breadcrumb-nav">
                        <li><a href="{{ route('user.dashboard') }}">Home</a></li>
                        <li>Dashboard</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <section class="dashboard pt-3">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-4 col-12">
                    <x-user-dashboard.side-bar />
                </div>

                <div class="col-lg-9 col-md-8 col-12">
                    <div class="main-content">
                        <div class="details-lists">
                            {{-- <div class="row">
                                <div class="col-lg-3 col-md-3 col-12">

                                    <div class="single-list">
                                        <div class="list-icon">
                                            <i class="lni lni-users"></i>
                                        </div>
                                        <h3>
                                            {!! \App\Helpers\Utility\PackageHelper::get_remaining_package_value($user->id, 'user_views_remaining') !!}
                                            <span>Total Profiles</span>
                                        </h3>
                                    </div>

                                </div>
                                <div class="col-lg-3 col-md-3 col-12">
                                    <div class="single-list two">
                                        <div class="list-icon">
                                            <i class="lni lni-image"></i>
                                        </div>
                                        <h3>
                                            {!! \App\Helpers\Utility\PackageHelper::get_remaining_package_value($user->id, 'photo_upload_remaining') !!}
                                            <span>Photo Upload</span>
                                        </h3>
                                    </div>

                                </div>
                                <div class="col-lg-3 col-md-3 col-12">

                                    <div class="single-list three">
                                        <div class="list-icon">
                                            <i class="lni lni-heart-filled"></i>
                                        </div>
                                        <h3>
                                            {!! \App\Helpers\Utility\PackageHelper::get_remaining_package_value($user->id, 'interest_remaining') !!}
                                            <span>Express Interest </span>
                                        </h3>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-12">
                                    <div class="single-list four">
                                        <div class="list-icon">
                                            <i class="lni lni-calendar"></i>
                                        </div>
                                        <h3>
                                            @if (\App\Helpers\Utility\PackageHelper::package_validity($user->id))
                                                <p>{{ \Carbon\Carbon::parse($package_info->expires_on)->diffInDays() }}
                                                To be expire</p>
                                            @else
                                                <p class="text-danger">Expired</p>
                                            @endif
                                        </h3>

                                    </div>

                                </div>
                            </div> --}}
                        </div>

                        <div class="row">
                            {{-- <div class="col-lg-6 col-md-12 col-12">

                                <div class="activity-log dashboard-block">
                                    <h3 class="block-title">My Activity Log</h3>
                                    <ul>
                                        <li>
                                            <div class="log-icon">
                                                <i class="lni lni-alarm"></i>
                                            </div>
                                            <a href="javascript:void(0)" class="title">Your Profile
                                                Updated!</a>
                                            <span class="time">12 Minutes Ago</span>
                                            <span class="remove"><a href="javascript:void(0)"><i
                                                        class="lni lni-close"></i></a></span>
                                        </li>
                                        <li>
                                            <div class="log-icon">
                                                <i class="lni lni-alarm"></i>
                                            </div>
                                            <a href="javascript:void(0)" class="title">You change your
                                                password</a>
                                            <span class="time">59 Minutes Ago</span>
                                            <span class="remove"><a href="javascript:void(0)"><i
                                                        class="lni lni-close"></i></a></span>
                                        </li>
                                        <li>
                                            <div class="log-icon">
                                                <i class="lni lni-alarm"></i>
                                            </div>
                                            <a href="javascript:void(0)" class="title">You submit a new
                                                ads</a>
                                            <span class="time">8 hours Ago</span>
                                            <span class="remove"><a href="javascript:void(0)"><i
                                                        class="lni lni-close"></i></a></span>
                                        </li>
                                        <li>
                                            <div class="log-icon">
                                                <i class="lni lni-alarm"></i>
                                            </div>
                                            <a href="javascript:void(0)" class="title">You subscribe as a pro
                                                user!</a>
                                            <span class="time">1 day Ago</span>
                                            <span class="remove"><a href="javascript:void(0)"><i
                                                        class="lni lni-close"></i></a></span>
                                        </li>
                                    </ul>
                                </div>
                            </div> --}}

                            <div class="col-lg-6 col-md-12 col-md-6" style="padding-top: 30px">
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="fs-16 mb-0 align-center">Current package</h5>
                                    </div>
                                    <div class="card-body">

                                        <ul class="list-group list-group-raw fs-15 mb-4 pb-4 border-bottom">
                                            <li class="list-group-item py-2">
                                                <i class="las la-check text-success mr-2"></i>
                                                Package Name
                                                :<strong>&nbsp;{{ $package_info->PackageInfo->package_name }}</strong>
                                            </li>
                                            <li class="list-group-item py-2">
                                                <i class="las la-check text-success mr-2"></i>
                                                Package Price
                                                :<strong>&nbsp;&#8377;{{ $package_info->PackageInfo->package_price + ($package_info->PackageInfo->package_price * 18) / 100 }}</strong>
                                                (includes 18%
                                                of GST)

                                            </li>
                                            {{-- <li class="list-group-item py-2">
                                                <i class="las la-check text-success mr-2"></i>
                                                Package Validity
                                                :<strong>&nbsp;{{ \Carbon\Carbon::parse($package_info->expires_on)->diffInDays() }}
                                                    days remaining</strong>
                                            </li> --}}

                                            {{-- <li class="list-group-item py-2">
                                                <i class="las la-check text-success mr-2"></i>
                                                Express Interests
                                                :<strong>{{ \App\Helpers\Utility\PackageHelper::get_remaining_package_value($user->id, 'interest_remaining') }}</strong>
                                            </li>
                                            <li class="list-group-item py-2">
                                                <i class="las la-check text-success mr-2"></i>
                                                Gallery Photo Upload
                                                :<strong>{{ \App\Helpers\Utility\PackageHelper::get_remaining_package_value($user->id, 'photo_upload_remaining') }}</strong>
                                            </li>
                                            <li class="list-group-item py-2">
                                                <i class="las la-check text-success mr-2"></i>
                                                Available Phone No. Counts
                                                :<strong>{{ \App\Helpers\Utility\PackageHelper::get_remaining_package_value($user->id, 'user_views_remaining') }}</strong>
                                            </li> --}}
                                        </ul>
                                        <div class="row">
                                            <div class='col-6 justify-center'>
                                                <h6 class="fs-18 mb-3">
                                                    Status:
                                                    @if (\App\Helpers\Utility\PackageHelper::package_validity($user->id))
                                                        <span class="text-success">Active</span>
                                                    @else
                                                        <span class="text-danger">In-Active</span>
                                                    @endif
                                                </h6>
                                            </div>
                                            {{-- <div class='col-6'><a href="{{ route('purchaseNew.show', $user->id) }}"
                                                    class="btn btn-success d-inline-block float-end">Upgrade Package</a>
                                            </div> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12 col-md-6">
                                <div class="recent-items dashboard-block">
                                    <h3 class="block-title">ShortListed User</h3>
                                    <ul>
                                        @foreach ($shortlist_user as $shorlist_users)
                                            <li>
                                                <div class="image">
                                                    <a
                                                        href="{{ route('viewprofile.show', $shorlist_users->userShortListInfo->id) }}"><img
                                                            @if (!empty($shorlist_users->userShortListInfo->image_with_path)) src="{{ $shorlist_users->userShortListInfo->image_with_path }}"
                                                            @else
                                                            src="{{ asset('assets/Website/avatar.png') }}" @endif></a>
                                                </div>
                                                <a href="{{ route('viewprofile.show', $shorlist_users->userShortListInfo->id) }}"
                                                    class="title">{{ $shorlist_users->userShortListInfo->username }}</a>
                                                {{-- <span class="time">12 Minutes Ago</span> --}}
                                                <span
                                                    class="time">{{ \Carbon\Carbon::parse($shorlist_users->updated_at)->diffForHumans() }}</span>
                                                <span class="remove"><a><i class="lni lni-close"
                                                            onclick="remove_shortlist({{ $shorlist_users->userShortListInfo->id }})"></i></a></span>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
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
