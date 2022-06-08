@extends('layouts.Admin.app')

@section('tab_tittle')
 {{ $singleUserInfo->username }} | {{ $company->company_name }}
@endsection

@section('meta_tages')

@endsection

@section('styles')
<style>
    .input--file {
        position: relative;
        color: #7f7f7f;
    }

    .input--file input[type="file"] {
        position: absolute;
        top: 0;
        left: 0;
        opacity: 0;
    }

    .jathakatam {
        width: 40px;
        height: 80px;
    }

    .dropdown-menu-demo {

        z-index: 2;
    }

</style>
@endsection

@section('page_pre_title')
    User Information
@endsection

@section('page-title')
    Name : {{ $singleUserInfo->username }}
@endsection



@section('page_content')
    <div class="container">
        <div class="row">
            {{-- top banner section of page --}}
            <div class="col-md-12">
                <div class="card" x-data="{

                    userProfileInfo: {
                        profileImage: '{{ $singleUserInfo->userBasicInfos->imageWithPath }}',
                        profileImageChanged: false,
                        profileImageNew: null,
                        profileVerificationStatus: ('{{ $singleUserInfo->is_verified }}' == 0) ? false : true,
                    },
                    fileChosen($el) {

                        let file = $el.target.files[0]
                        this.profileImageNew = file
                        reader = new FileReader()

                        reader.readAsDataURL(file)
                        reader.onload = (e) => {
                            this.userProfileInfo.profileImage = e.target.result
                            this.userProfileInfo.profileImageChanged = true
                        }
                    },
                    userUploadImage() {

                        let data = new FormData()

                        data.append('profileImage', this.profileImageNew)
                        data.append('userId', '{{ $singleUserInfo->id }}')

                        axios.post('{{ route('admin.profile.userProfileImageUpload') }}', data)
                            .then(e => {
                                if (e.status == 201) {

                                    Swal.fire({
                                        position: 'top-end',
                                        icon: 'success',
                                        title: e.data.message,
                                        showConfirmButton: false,
                                        toast: true,
                                        timer: 1500
                                    }).then(e => {

                                        this.userProfileInfo.profileImageChanged = false
                                        {{-- window.location.href = '{{ route('admin.profile.show', $singleUserInfo->id) }}' --}}
                                    })

                                }
                            })
                    },
                    verifyUser() {

                        if (confirm('Are You Sure')) {

                            axios.put('{{ route('admin.profile.updateVerificationStatus', $singleUserInfo->id) }}')
                                .then(e => {
                                    if (e.status == 201) {

                                        Swal.fire({
                                            position: 'top-end',
                                            icon: 'success',
                                            title: e.data.message,
                                            showConfirmButton: false,
                                            toast: true,
                                            timer: 1500
                                        }).then(e => {

                                            this.userProfileInfo.profileVerificationStatus = !this.userProfileInfo.profileVerificationStatus
                                            {{-- window.location.href = '{{ route('admin.profile.show', $singleUserInfo->id) }}' --}}
                                        })

                                    }
                                })


                        }

                    },
                    deleteUserProfileImage() {

                        if (confirm('Are You Sure')) {

                            axios.put('{{ route('admin.profile.deleteprofileimage', $singleUserInfo->id) }}')
                                .then(e => {
                                    if (e.status == 201) {

                                        Swal.fire({
                                            position: 'top-end',
                                            icon: 'success',
                                            title: e.data.message,
                                            showConfirmButton: false,
                                            toast: true,
                                            timer: 1500
                                        }).then(e => {

                                            window.location.href = '{{ route('admin.profile.show', $singleUserInfo->id) }}'
                                        })

                                    }
                                })
                        }
                    }
                }">
                    <div class="card-body">
                        <div class="row g-2 align-items-center">
                            <div class="col-auto">
                                <span class="avatar avatar-xl"
                                    style="background-image: url('userProfileInfo.profileImageTest')">
                                    <template x-if="userProfileInfo.profileImage">
                                        <img x-bind:src="userProfileInfo.profileImage" height="110" width="110">
                                    </template>
                                    <template x-if="!userProfileInfo.profileImage">
                                        <div class="input--file">
                                            <span>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24">
                                                    <circle cx="12" cy="12" r="3.2" />
                                                    <path
                                                        d="M9 2l-1.83 2h-3.17c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2v-12c0-1.1-.9-2-2-2h-3.17l-1.83-2h-6zm3 15c-2.76 0-5-2.24-5-5s2.24-5 5-5 5 2.24 5 5-2.24 5-5 5z" />
                                                    <path d="M0 0h24v24h-24z" fill="none" />
                                                </svg>
                                            </span>
                                            <input name="Select File" x-ref="userProfileImage" type="file" accept="image/*"
                                                x-on:change="fileChosen" />
                                        </div>
                                    </template>

                                </span>
                            </div>
                            <div class="col">
                                <h4 class="card-title m-2">
                                    {{ $singleUserInfo->username }}
                                </h4>
                                <div class="text-muted m-2">
                                    {{ $singleUserInfo->email }}
                                </div>
                                <div class="text-muted m-2">
                                    {{ $singleUserInfo->user_profile_id }}
                                </div>
                                <div class="small mt-1 px-2">
                                    <template x-if="userProfileInfo.profileVerificationStatus==1">
                                        <span class="badge bg-green-lt">Verified</span>
                                    </template>
                                    <template x-if="userProfileInfo.profileVerificationStatus==0">
                                        <span class="badge bg-danger-lt">Un-Verified</span>
                                    </template>

                                </div>
                                <template x-if="userProfileInfo.profileImageChanged">
                                    <div class="small mt-1 px-2">
                                        <div class="mb-3 mt-2">
                                            <div class="btn-group w-20">
                                                <button x-on:click="userUploadImage" type="button" class="btn btn-success">
                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                        class="icon icon-tabler icon-tabler-upload" width="24" height="24"
                                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                                        fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                        <path d="M4 17v2a2 2 0 0 0 2 2h12a2 2 0 0 0 2 -2v-2"></path>
                                                        <polyline points="7 9 12 4 17 9"></polyline>
                                                        <line x1="12" y1="4" x2="12" y2="16"></line>
                                                    </svg>Upload Image</button>
                                            </div>
                                        </div>
                                    </div>
                                </template>
                                <template x-if="!userProfileInfo.profileImageChanged">
                                    <div class="small mt-1 px-2">
                                        <div class="mb-3 mt-2">
                                            <div class="btn-group w-20">
                                                <button x-on:click="userProfileInfo.profileImage=''" type="button"
                                                    class="btn btn-dark">
                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                        class="icon icon-tabler icon-tabler-upload" width="24" height="24"
                                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                                        fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                        <path d="M4 17v2a2 2 0 0 0 2 2h12a2 2 0 0 0 2 -2v-2"></path>
                                                        <polyline points="7 9 12 4 17 9"></polyline>
                                                        <line x1="12" y1="4" x2="12" y2="16"></line>
                                                    </svg>Change Profile Image</button>
                                            </div>
                                        </div>
                                    </div>
                                </template>
                            </div>
                            <div class="col-auto">

                                <template x-if="!userProfileInfo.profileVerificationStatus">
                                    <button type="button" x-on:click="verifyUser" class="btn btn-success">
                                        Make User Verifed
                                    </button>
                                </template>
                                <template x-if="userProfileInfo.profileVerificationStatus">
                                    <button type="button" x-on:click="verifyUser" class="btn btn-danger">
                                        Make User Un-Verified
                                    </button>
                                </template>
                            </div>
                            <div class="col-auto">
                                <div class="dropdown">
                                    <a href="#" class="btn-action" data-bs-toggle="dropdown" aria-expanded="false">
                                        <!-- Download SVG icon from http://tabler-icons.io/i/dots-vertical -->
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24"
                                            height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                            fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <circle cx="12" cy="12" r="1"></circle>
                                            <circle cx="12" cy="19" r="1"></circle>
                                            <circle cx="12" cy="5" r="1"></circle>
                                        </svg>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <button type="button" x-on:click="deleteUserProfileImage"
                                            class="dropdown-item text-danger">Delete Profile Photo</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- End of top banner section of page --}}
        </div>
        {{-- second row of page --}}
        <div class="row mt-3">
            {{-- second row First column of page --}}
            @include(
                'Admin.UserManagement.ShowPageSegement.UserBasicInfoSegement'
            )
            @include(
                'Admin.UserManagement.ShowPageSegement.PackageInfoSegment'
            )
            {{-- end of second row First column of page --}}
        </div>
        {{-- End of second row of page --}}

        {{-- third row of page --}}
        <div class="row mt-3">
            {{-- third row first column of page --}}
            <div class="col-md-12">
                <div class="card-tabs ">
                    <!-- Cards navigation -->
                    <ul class="nav nav-tabs">
                        <li class="nav-item"><a href="#tab-top-1" class="nav-link active" data-bs-toggle="tab">Basic
                                Info</a></li>
                        <li class="nav-item"><a href="#tab-top-2" class="nav-link" data-bs-toggle="tab">Family
                                Info</a></li>
                        <li class="nav-item"><a href="#tab-top-3" class="nav-link"
                                data-bs-toggle="tab">Horoscope Info</a></li>
                        <li class="nav-item"><a href="#tab-top-4" class="nav-link"
                                data-bs-toggle="tab">Professional Info</a></li>
                        <li class="nav-item"><a href="#tab-top-5" class="nav-link" data-bs-toggle="tab">Native
                                Info</a></li>
                        <li class="nav-item"><a href="#tab-top-6" class="nav-link"
                                data-bs-toggle="tab">Religious Info</a></li>
                        <li class="nav-item"><a href="#tab-top-7" class="nav-link" data-bs-toggle="tab">User
                                Preference</a></li>
                    </ul>
                    <div class="tab-content">
                        <!-- Content of card #1 -->
                        @include(
                            'Admin.UserManagement.ShowPageSegement.BasicInfoSegement'
                        )
                        <!-- Content of card #2 -->
                        @include(
                            'Admin.UserManagement.ShowPageSegement.FamilyInfoSegment'
                        )
                        <!-- Content of card #3 -->
                        @include(
                            'Admin.UserManagement.ShowPageSegement.HoroscopeInfoSegement'
                        )
                        <!-- Content of card #4 -->
                        @include(
                            'Admin.UserManagement.ShowPageSegement.ProfessionalInfoSegement'
                        )
                        <!-- Content of card #5 -->
                        @include(
                            'Admin.UserManagement.ShowPageSegement.NativeInfoSegement'
                        )
                        <!-- Content of card #6 -->
                        @include(
                            'Admin.UserManagement.ShowPageSegement.ReligiousInfoSegment'
                        )
                        <!-- Content of card #7 -->
                        @include(
                            'Admin.UserManagement.ShowPageSegement.PreferenceInfoSegement'
                        )
                    </div>
                </div>
            </div>
            {{-- end of third row first column of page --}}
        </div>
        {{-- End of third row of page --}}
        {{-- fourth row of page --}}
        @include('Admin.UserManagement.Sections.UserImageUpload')
        {{-- End of fourth row of page --}}
        {{-- fifth row of page --}}
        @include('Admin.UserManagement.Sections.UserTransaction')
        {{-- End of fifth row of page --}}
    </div>
@endsection('page_content')


@section('scripts')

 @if(session()->has('pay-u-payment-success'))
    <script>

    window.open('{{Url('/')}}'+'/storage/invoice/'+{{session('pay-u-payment-success')}});
    </script>
 @endif


@endsection
