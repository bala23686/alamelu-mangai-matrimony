<div class="col-md-6">
    <div class="card " x-data="{
        newPassword: '',
        isLoadingStatus: true,
        statusList: [],
        userInfo: {
            username: '{{ $singleUserInfo->username }}',
            email: '{{ $singleUserInfo->email }}',
            phonenumber: '{{ $singleUserInfo->phonenumber }}',
            profile_status_id: '{{ $singleUserInfo->profile_status_id }}',
        },
        loadStatusList() {

            axios.get('{{ route('admin.status.ssr') }}')
                .then((e) => {

                    this.statusList = e.data
                    this.isLoadingStatus = false


                })
        },
        generateNewPassword() {
            $refs.newPassword.value = Math.floor((Math.random() * 1000000) + 1);
        },
        updateNewPassword() {

            if (confirm('Are You Sure')) {

                if ($refs.newPassword.value === '') {
                    Swal.fire({
                        position: 'center',
                        icon: 'warning',
                        title: 'Password Cannot Be Empty',
                        showConfirmButton: false,
                        toast: false,
                        timer: 1500
                    })
                } else {
                    axios.put('{{ route('admin.profile.updatePassword', $singleUserInfo->id) }}', { newPassword: $refs.newPassword.value })
                        .then(e => {
                            if (e.status == 201) {
                                Swal.fire({
                                    position: 'top-end',
                                    icon: 'success',
                                    title: e.data.message,
                                    showConfirmButton: false,
                                    toast: true,
                                    timer: 1500
                                })

                                $refs.newPassword.value = ''
                            }
                        })
                }

            }

        },
        updateUserBasicInfo() {

            let data = {
                username: this.userInfo.username,
                email: this.userInfo.email,
                phonenumber: this.userInfo.phonenumber,
                profile_status_id: this.userInfo.profile_status_id,
            }

            axios.put('{{ route('admin.profile.update', $singleUserInfo->id) }}', data)
                .then((e) => {

                    if (e.status == 201) {
                        Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: e.data.message,
                            showConfirmButton: false,
                            toast: true,
                            timer: 1500
                        }).then(() => {

                            window.location.href = '{{ route('admin.profile.show', $singleUserInfo->id) }}'
                        })
                    }

                })
        }
    }" x-init="loadStatusList();">
        <div class="card-header">
            <h4>User Basic Infomation</h4>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <div class="form-label">User Name</div>
                        <input type="text" name="username" value=""
                        class="form-control"
                            x-bind:class="(userInfo.username==='') ? 'is-invalid is-invalid-lite' : ''"
                            x-model="userInfo.username" autocomplete="off">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <div class="form-label">Email</div>
                        <input type="text" name="email"
                        class="form-control"
                            x-bind:class="(userInfo.email==='') ? ' is-invalid is-invalid-lite' : ''"
                            x-model="userInfo.email" autocomplete="off">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <div class="form-label">Phone Number</div>
                        <input type="text" name="phonenumber"
                        maxlength="10"
                            x-bind:class="(userInfo.phonenumber==='' || isNaN(userInfo.phonenumber) || userInfo.phonenumber.length>10 || userInfo.phonenumber.length<10) ? 'form-control is-invalid is-invalid-lite' : 'form-control'"
                            x-model="userInfo.phonenumber" class="form-control" x-model="userInfo.phonenumber"
                            autocomplete="off">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label">Status</label>
                        <div class="row g-2">
                            <div class="col-12" x-if="(!isLoadingStatus)">
                                <select class="form-select" x-model="userInfo.profile_status_id">
                                    <template x-for="status in statusList" :key="status.id">
                                        <option
                                            x-bind:selected=" status.id == userInfo.profile_status_id  ? true : false "
                                            x-bind:value="status.id" x-text="status.status_name"></option>
                                    </template>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="mb-3">
                        <label class="form-label">New Password</label>
                        <div class="input-group">
                            <input type="text" x-ref="newPassword" class="form-control"
                                placeholder="New Password" required>
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
                            <button x-on:click="updateNewPassword" type="button" class="btn btn-dark"><svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    class="icon icon-tabler icon-tabler-rotate-clockwise-2" width="24"
                                    height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                    fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M9 4.55a8 8 0 0 1 6 14.9m0 -4.45v5h5"></path>
                                    <line x1="5.63" y1="7.16" x2="5.63" y2="7.17"></line>
                                    <line x1="4.06" y1="11" x2="4.06" y2="11.01"></line>
                                    <line x1="4.63" y1="15.1" x2="4.63" y2="15.11"></line>
                                    <line x1="7.16" y1="18.37" x2="7.16" y2="18.38"></line>
                                    <line x1="11" y1="19.94" x2="11" y2="19.95"></line>
                                </svg>Update</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-2">
                <button x-on:click="updateUserBasicInfo" type="button" class="btn btn-primary w-25 float-end">
                    Update Info
                </button>
            </div>
        </div>
    </div>
</div>
