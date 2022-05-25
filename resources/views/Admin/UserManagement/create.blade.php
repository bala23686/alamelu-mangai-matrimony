@extends('layouts.Admin.app')

@section('tab_tittle')
    Create Profile |  {{$company->company_name}}
@endsection

@section('meta_tages')
@endsection


@section('page_pre_title')
    Create New Profile
@endsection

@section('page-title')
    New Profile
@endsection



@section('page_content')
    <div x-data="{
        genderList: [],
        religionList: [],
        casteList: [],
        isLoading: true,
        username:null,
        phonenumber:null,
        email:null,
        password:null,
        password_confirmation:null,
        gender:null,
        dob:null,
        religion:null,
        caste:null,
        loadGenderList() {

            axios.get('{{ route('admin.submaster.gender.ssr') }}')
            .then((e) => {
                console.log(e.data)
                this.genderList = e.data
                this.isLoading = false
                console.log(this.genderList)

            })
        },

        loadReligionList() {

            axios.get('{{ route('admin.submaster.religion.ssr') }}')
            .then((e) => {
                console.log(e.data)
                this.religionList = e.data
                this.isLoading = false
                console.log(this.religionList)

            })
        },
        loadCasteByReligionChoosed(id) {

            axios.get('{{ route('admin.casteByReligion.ssr','') }}/'+id)
            .then((e) => {
                console.log(e.data)
                this.casteList = e.data
                this.isLoading = false
                console.log(this.casteList)

            })
        },
        generateNewPassword() {
            $refs.newPassword.value = Math.floor((Math.random() * 1000000) + 1);
            this.password = Math.floor((Math.random() * 1000000) + 1);
        },
        RegisterNewProfile() {


            let data = new FormData()

            data.append('username',this.username)
            data.append('phonenumber',this.phonenumber)
            data.append('email',this.email)
            data.append('password',this.password)
            data.append('password_confirmation',this.password_confirmation)
            data.append('gender',this.gender)
            data.append('dob',this.dob)
            data.append('religion',this.religion)
            data.append('caste',this.caste)

            axios.post('{{ route('admin.profile.registerNewUser') }}',data)
            .then((e) => {
                 if(e.status==201)
                 {

                    console.log(e.userId)
                    console.log(e)
                    let userId=e.data.userId
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'User Registered',
                        showConfirmButton: false,
                        toast: true,
                        timer: 1500
                    }).then(() => {
                        let url='{{ route('admin.profile.show','') }}/'+userId
                        window.location.href = url
                    })

                 }
            })
        },

    }" x-init="loadGenderList();loadReligionList();
    ">
        <div class="col-md-10 offset-md-1">
            <div class="card">
                <div class="card-header d-flex">
                    <h3 class="card-title">Create New Profile</h3>
                </div>
                <div class="card-body">
                    <div class="container">
                        <form>
                            <div class="form-group mb-3 row">
                                <label class="form-label col-md-3 col-form-label">User Name</label>
                                <div class="col-md-4">
                                    <input type="text"  x-model="username" class="form-control" x-bind:class="(username=='') ? 'form-control is-invalid is-invalid-lite' : '' " aria-describedby="emailHelp"
                                        placeholder="Enter Username">
                                </div>
                            </div>
                            <div class="form-group mb-3 row">
                                <label class="form-label col-md-3 col-form-label">User Phone Number</label>
                                <div class="col-md-4">
                                    <input type="text"   x-model="phonenumber" class="form-control" maxlength="10" x-bind:class="(phonenumber=='' || phonenumber.length>10 || phonenumber.length<10 || isNaN(phonenumber.length>10)) ? 'is-invalid is-invalid-lite' : '' " aria-describedby="emailHelp"
                                        placeholder="Enter Phone Number">
                                </div>
                            </div>
                            <div class="form-group mb-3 row">
                                <label class="form-label col-md-3 col-form-label">User Email</label>
                                <div class="col-md-4">
                                    <input type="email"  x-model="email" class="form-control" x-bind:class="(email=='') ? 'is-invalid is-invalid-lite' : (/^([A-Za-z]|[0-9])+$/.test(email) && !email=='' ) ? 'is-invalid is-invalid-lite': ''  " aria-describedby="emailHelp"
                                        placeholder="Enter Email">
                                </div>
                            </div>
                            <div class="form-group mb-3 row">
                                <label class="form-label col-md-3 col-form-label">User Password</label>
                                <div class="col-md-4">
                                    <div class="input-group">
                                        <input type="text" x-ref="newPassword"  x-model="password" class="form-control" aria-describedby="emailHelp"
                                        placeholder="Enter Password">
                                        <button x-on:click="generateNewPassword" type="button" class="btn btn-success"><svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                class="icon icon-tabler icon-tabler-brand-svelte" width="24" height="24"
                                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                                stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                <path
                                                    d="M15 8l-5 3l.821 -.495c1.86 -1.15 4.412 -.49 5.574 1.352a3.91 3.91 0 0 1 -1.264 5.42l-5.053 3.126c-1.86 1.151 -4.312 .591 -5.474 -1.251a3.91 3.91 0 0 1 1.263 -5.42l.26 -.16">
                                                </path>
                                                <path
                                                    d="M8 17l5 -3l-.822 .496c-1.86 1.151 -4.411 .491 -5.574 -1.351a3.91 3.91 0 0 1 1.264 -5.42l5.054 -3.127c1.86 -1.15 4.311 -.59 5.474 1.252a3.91 3.91 0 0 1 -1.264 5.42l-.26 .16">
                                                </path>
                                            </svg>Generate</button>

                                    </div>
                                </div>
                            </div>
                            <div class="form-group mb-3 row">
                                <label class="form-label col-md-3 col-form-label">User Password Confirm</label>
                                <div class="col-md-4">
                                    <input type="text"  x-model="password_confirmation" maxlength="6" class="form-control" x-bind:class="(password_confirmation=='' || password!=password_confirmation ) ? 'is-invalid is-invalid-lite' : '' " aria-describedby="emailHelp"
                                        placeholder="Confrim Password">
                                </div>
                            </div>
                            <div class="form-group mb-3 row">
                                <label class="form-label col-md-3 col-form-label">User Gender</label>
                                <div class="col-md-4">
                                    <select class="form-select" x-model="gender" x-bind:class="(gender=='' || gender==0 ) ? 'is-invalid is-invalid-lite' : '' ">
                                        <option  value="0">Choose The Gender</option>
                                                <template x-for="gender in genderList" :key="gender.id">
                                                    <option x-bind:value="gender.id" x-text="gender.gender_name"></option>
                                                </template>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group mb-3 row">
                                <label class="form-label col-md-3 col-form-label">User DOB</label>
                                <div class="col-md-4">
                                    <input type="date"  x-model="dob" class="form-control" x-bind:class="(dob=='') ? 'is-invalid is-invalid-lite' : '' " aria-describedby="emailHelp"
                                        placeholder="Enter Phonenumber">
                                </div>
                            </div>
                            <div class="form-group mb-3 row">
                                <label class="form-label col-md-3 col-form-label">Select Religion </label>
                                <div class="col-md-4">
                                    <select class="form-select"  x-model="religion"  x-bind:class="(religion=='' || religion==0) ? 'is-invalid is-invalid-lite' : '' " x-on:change="($el)=>loadCasteByReligionChoosed($el.target.value)">
                                        <option selected value="0" >Choose The Religion</option>
                                                <template x-for="religion in religionList" :key="religion.id">
                                                    <option x-bind:value="religion.id" x-text="religion.religion_name"></option>
                                                </template>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group mb-3 row">
                                <label class="form-label col-md-3 col-form-label">Select Caste</label>
                                <div class="col-md-4">
                                    <select class="form-select"  x-model="caste" x-bind:class="(caste=='' || caste==0) ? 'is-invalid is-invalid-lite' : '' ">
                                        <option selected value="0" >Choose The Caste</option>
                                                <template x-for="caste in casteList" :key="caste.id">
                                                    <option x-bind:value="caste.id" x-text="caste.caste_name"></option>
                                                </template>
                                    </select>
                                </div>
                            </div>
                            <div class="form-footer text-end">
                                <button type="button" x-on:click="RegisterNewProfile" class="btn btn-success"><svg xmlns="http://www.w3.org/2000/svg"
                                        class="icon icon-tabler icon-tabler-user-plus" width="24" height="24"
                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <circle cx="9" cy="7" r="4"></circle>
                                        <path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2"></path>
                                        <path d="M16 11h6m-3 -3v6"></path>
                                    </svg>Register User</button>
                            </div>
                        </form>
                    </div>
                </div>
                {{-- card footer section --}}
                <div class="card-footer text-end">
                    <a href="{{ route('admin.profile.index') }}" class="btn btn-danger"><svg
                            xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-user-x" width="24"
                            height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <circle cx="9" cy="7" r="4"></circle>
                            <path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2"></path>
                            <path d="M17 9l4 4m0 -4l-4 4"></path>
                        </svg>Cancel</a>
                    <a href="{{ route('admin.profile.index') }}" class="btn btn-dark mx-2"><svg
                            xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-arrow-left" width="24"
                            height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <line x1="5" y1="12" x2="19" y2="12"></line>
                            <line x1="5" y1="12" x2="11" y2="18"></line>
                            <line x1="5" y1="12" x2="11" y2="6"></line>
                        </svg>Back</a>
                </div>
                {{-- end of card footer section --}}
            </div>
        </div>

    </div>
    </div>
@endsection('page_content')


@section('scripts')
    <script>
        $(function() {

            //section to handle user view button
            $('body').on('click', '.userView', function() {
                var userId = $(this).attr('data-id')

                window.location.href = "{{ route('admin.profile.show', '') }}/" + userId

            });
            //end section to handle user view button

            //section to handle user Delete button
            $('body').on('click', '.userDelete', function() {
                var userId = $(this).attr('data-id')
                console.log(userId);
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.value) {

                        let url = '{{ route('admin.profile.index') }}/' + userId

                        axios.delete(url)
                            .then((e) => {
                                Swal.fire({
                                    position: 'top-end',
                                    icon: 'success',
                                    title: 'User Deleted',
                                    showConfirmButton: false,
                                    toast: true,
                                    timer: 1500
                                }).then(() => {
                                    window.location.href =
                                        "{{ route('admin.profile.index') }}"
                                })
                            }).catch((e) => {
                                Swal.fire({
                                    position: 'top-end',
                                    icon: 'error',
                                    title: 'User Infomation cannot be deleted',
                                    toast: true,
                                    showConfirmButton: false,
                                    timer: 1500
                                })
                            })

                    }
                });


            });
            //end section to handle user Delete button

        });
    </script>
@endsection
