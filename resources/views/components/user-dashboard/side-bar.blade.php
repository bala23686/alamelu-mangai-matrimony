@php
$user = Auth::user();
$shortlist_count = \App\Models\Master\UserShortListInfoMaster\UserShortListInfoMaster::where('shortlisted_by', '=', Auth::user()->id)->get();
$image_src = $user_info->gender_id == 1 ? asset('assets/Website/male.png') : asset('assets/Website/female.png');
@endphp

<div class="dashboard-sidebar mb-3 shadow">
    <div class="user-image">
        <img @if (!empty($user_image_with_path)) src="{{ $user_image_with_path }}"
            @else
            src="{{ $image_src }}" @endif
            alt="#">

        <h3>
            <span><a class="text-primary fw-bold" href="">{{ $user->username }}</a></span>
            <span class="fw-light">{{ $user->user_profile_id }}</span>
        </h3>
        {{-- <h3>Profile ID:
            <span><a class="text-primary"
                    href="{{ route('viewprofile.show', $user->id) }}">{{ $user->user_profile_id }}</a></span>
        </h3> --}}
    </div>

    <div class="text-center">
        <h6 class="fw-light mt-1">Profile Performance</h6>
        <div class="progress">
            <div class="progress-bar progress-bar-striped progress-bar-animated bg-{{ $bgColor ?? '' }}"
                role="progressbar" aria-valuenow="{{ $performance ?? '' }}" aria-valuemin="0" aria-valuemax="100"
                style="width: {{ $performance ?? '' }}%">
                {{ $performance ?? '' }}%
            </div>
        </div>
    </div>

    <div class="dashboard-menu">
        <ul>
            <li>
                <a class="{{ Request::is('*/dashboard') ? 'active' : '' }}" href="{{ route('user.dashboard') }}"><i
                        class="lni lni-dashboard"></i>
                    Dashboard</a>
            </li>

            @if ($user_info->profile_basic_status == 1)
                <li>
                    <a class="{{ Request::is('*/user-Profile/' . auth()->user()->id) ? 'active' : '' }}"
                        href="{{ route('user.profile.show', auth()->user()->id) }}"><i class="lni lni-eye"></i>
                        View My
                        Profile</a>
                </li>
            @endif

            <li>
                <a class="{{ Request::is('*/user-Profile/' . auth()->user()->id . '/edit') ? 'active' : '' }}"
                    href="{{ route('user.profile.edit', auth()->user()->id) }}"><i class="lni lni-pencil-alt"></i>
                    Update
                    Profile</a>
            </li>

            <li>
                <a class="{{ Request::is('*/partnerPreferences/*') ? 'active' : '' }}"
                    href="{{ route('user.preference', auth()->user()->id) }}"><i class="lni lni-users"></i>
                    Partner
                    Preferences</a>
            </li>
            <li>
                <a class="{{ Request::is('*/upload-Document/*') ? 'active' : '' }}"
                    href="{{ route('document.upload.index') }}"><i class="lni lni-add-files"></i>
                    Upload Documents</a>
            </li>
            <li>
                <a class="{{ Request::is('*/match') ? 'active' : '' }}" href="{{ route('user.matches') }}"><i
                        class="lni lni-magnet"></i>Matches <sup class="text-danger h6"></sup> </a>
            </li>

            <li>
                <a class="{{ Request::is('*/myShortlist/*') ? 'active' : '' }}"
                    href="{{ route('user.shortlists', auth()->user()->id) }}"><i class="lni lni-heart"></i>
                    ShortList &nbsp;&nbsp;
                    @if ($shortlist_count != null)
                        <span
                            class="badge rounded-pill badge-notification bg-primary">{{ $shortlist_count->count() }}
                        </span>
                    @else
                        <span class="badge rounded-pill badge-notification bg-primary">0
                        </span>
                    @endif
                </a>
            </li>
            <li>
                <a class="{{ Request::is('*/myGallery/*') ? 'active' : '' }}"
                    href="{{ route('user.gallery.show', auth()->user()->id) }}"><i class="lni lni-image"></i>
                    My Gallery</a>
            </li>

            {{-- <li>
                <a class="{{ Request::is('*/package/*') ? 'active' : '' }}"
                    href="{{ route('user.packageinfo', auth()->user()->id) }}"><i class="lni lni-rupee"></i>
                    Package
                    Details</a>
            </li> --}}

            <li>
                <a class="{{ Request::is('*/userTransaction/*') ? 'active' : '' }}"
                    href="{{ route('user.transaction', auth()->user()->id) }}"><i class="lni lni-printer"></i>
                    Transaction
                    History</a>
            </li>
            {{-- <div class="button text-center">
                <a class="btn" href="{{ route('user.logout') }}">LOGOUT</a>
            </div> --}}
        </ul>
    </div>
</div>




{{-- // document.querySelector('.progress-value > span').each(function() {
        //     document.querySelector(this).prop('Counter', 0).animate({
        //         Counter: document.querySelector(this).text('10')
        //     }, {
        //         duration: 3500,
        //         easing: 'swing',
        //         step: function(now) {
        //             document.querySelector(this).text(Math.ceil(now));
        //         }
        //     });
        // }); --}}
