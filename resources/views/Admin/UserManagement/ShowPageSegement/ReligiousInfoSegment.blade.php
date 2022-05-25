<div id="tab-top-6" x-data="{
    religionList: [],
    casteList: [],
    starList: [],
    rasiList: [],
    dhosamList: [{ id: 0, type: 'No' }, { id: 1, type: 'yes' }],
    isLoadingReligiousInfo: true,
    isLoadingProcessing: true,
    SingleUserReligionInfo: {

        user_religion_id: '{{ $singleUserInfo->userReligeonInfo->user_religion_id }}',
        user_caste_id: '{{ $singleUserInfo->userReligeonInfo->user_caste_id }}',
        sub_caste: '{{ $singleUserInfo->userReligeonInfo->sub_caste ?? '""' }}',
        user_rasi_id: '{{ $singleUserInfo->userReligeonInfo->user_rasi_id ?? '""' }}',
        user_star_id: '{{ $singleUserInfo->userReligeonInfo->user_star_id ?? '""' }}',
        dhosam: '{{ $singleUserInfo->userReligeonInfo->dhosam ?? '""' }}',
        dhosam_details: '{{ $singleUserInfo->userReligeonInfo->dhosam_details ?? 'More Details About Dhosam' }}',
        user_birth_time: '{{ $singleUserInfo->userReligeonInfo->user_birth_time ?? '""' }}',
        user_birth_place: '{{ $singleUserInfo->userReligeonInfo->user_birth_place ?? '""' }}',


    },
    loadReligionList() {

        axios.get('{{ route('admin.submaster.religion.ssr') }}')
            .then((e) => {

                this.religionList = e.data
                this.isLoadingReligiousInfo = false
                this.isLoadingProcessing = false


            })
    },
    loadCasteList() {

        axios.get('{{ route('admin.submaster.caste.ssr') }}')
            .then((e) => {

                this.casteList = e.data


            })
    },
    loadStarList() {

        axios.get('{{ route('admin.submaster.star.ssr') }}')
            .then((e) => {

                this.starList = e.data


            })
    },
    loadRasiList() {

        axios.get('{{ route('admin.submaster.rasi.ssr') }}')
            .then((e) => {

                this.rasiList = e.data


            })
    },

    loadCasteListByReligion(id) {
        this.SingleUserReligionInfo.user_caste_id = 0
        axios.get('{{ route('admin.casteByReligion.ssr', '') }}/' + id)
            .then((e) => {

                this.casteList = e.data


            })
    },
    loadStarListByRasi(id) {
        this.SingleUserReligionInfo.user_star_id = 0
        axios.get('{{ route('admin.nakshathiraByRasi.ssr', '') }}/' + id)
            .then((e) => {

                this.starList = e.data


            })
    },
    updateUserProfessinalInformation() {

        this.isLoadingProcessing = true

        let data = {
            user_religion: this.SingleUserReligionInfo.user_religion_id,
            user_caste: this.SingleUserReligionInfo.user_caste_id,
            user_subcaste: this.SingleUserReligionInfo.sub_caste,
            user_rasi: this.SingleUserReligionInfo.user_rasi_id,
            user_star: this.SingleUserReligionInfo.user_star_id,
            user_dhosam: this.SingleUserReligionInfo.dhosam,
            dhosam_details: this.SingleUserReligionInfo.dhosam_details,
            user_btime: this.SingleUserReligionInfo.user_birth_time,
            user_bplace: this.SingleUserReligionInfo.user_birth_place,

        }

        axios.put('{{ route('admin.profile.updateUserReligiousInformation', $singleUserInfo->id) }}', data)
            .then(e => {


                if (e.status == 201) {

                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: e.data.message,
                        showConfirmButton: false,
                        toast: true,
                        timer: 1500
                    }).then(() => {

                        this.isLoadingProcessing = false
                    })
                }

            }).
        catch(e => {

            Swal.fire({
                position: 'top-end',
                icon: 'error',
                title: 'Check all the feilds',
                showConfirmButton: false,
                toast: true,
                timer: 1500
            }).then(() => {

                this.isLoadingProcessing = false
            })
        })

    },

}" x-init="loadRasiList();
loadStarList();
loadCasteList();
loadReligionList();" class="card tab-pane">
    <div class="card-body">
        <template x-if="isLoadingReligiousInfo">
            <div class="mb-3">
                <label class="form-label">Loading....</label>
                <div class="progress">
                    <div class="progress-bar progress-bar-indeterminate bg-dark"></div>
                </div>
            </div>
        </template>
        <div class="card-title">User Religous Information #6</div>
        <div class="row" x-show="!isLoadingReligiousInfo">
            <div class="col-md-6">
                <div class="mb-3 px-1">
                    <label class="form-label">Choose User Religion</label>
                    <div class="row g-2">
                        <div class="col-12" x-if="(!isLoadingReligiousInfo)">
                            <select class="form-select"
                                x-on:change="($el)=>loadCasteListByReligion($el.target.value)"
                                x-model="SingleUserReligionInfo.user_religion_id"
                                x-bind:class="(SingleUserReligionInfo.user_religion_id == 0) ? ' is-invalid is-invalid-lite' : ''">
                                <option value="0">Choose Country</option>
                                <template x-for="relegion in religionList" :key="relegion.id">
                                    <option
                                        x-bind:selected="relegion.id == SingleUserReligionInfo.user_religion_id ? true : false"
                                        x-bind:value="relegion.id" x-text="relegion.religion_name">
                                    </option>
                                </template>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3 px-1">
                    <label class="form-label">Choose Caste </label>
                    <div class="row g-2">
                        <div class="col-12">
                            <select class="form-select" x-model="SingleUserReligionInfo.user_caste_id"
                                x-bind:class="(SingleUserReligionInfo.user_caste_id == 0) ? ' is-invalid is-invalid-lite' : ''">
                                <option value="0">Choose User Caste</option>
                                <template x-for="caste in casteList" :key="caste.id">
                                    <template x-if="SingleUserReligionInfo.user_religion_id==caste.caste_religion">
                                    <option
                                        x-bind:selected="caste.id == SingleUserReligionInfo.user_caste_id ? true : false"
                                        x-bind:value="caste.id" x-text="caste.caste_name">
                                    </option>
                                </template>
                                </template>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row" x-show="!isLoadingReligiousInfo">
            <div class="col-md-6">
                <div class="mb-3 px-1">
                    <label class="form-label">Choose User Rasi</label>
                    <div class="row g-2">
                        <div class="col-12">
                            <select class="form-select" x-model="SingleUserReligionInfo.user_rasi_id"
                                x-on:change="($el)=>loadStarListByRasi($el.target.value)"
                                x-bind:class="(SingleUserReligionInfo.user_rasi_id == 0) ? ' is-invalid is-invalid-lite' : ''">
                                <option value="0">Choose Rasi</option>
                                <template x-for="rasi in rasiList" :key="rasi.id">
                                    <option
                                        x-bind:selected="rasi.id == SingleUserReligionInfo.user_rasi_id ? true : false"
                                        x-bind:value="rasi.id" x-text="rasi.rasi_name">
                                    </option>
                                </template>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3 px-1">
                    <label class="form-label">Choose User Star</label>
                    <div class="row g-2">
                        <div class="col-12">
                            <select class="form-select" x-on:change="($el)=>loadCityListByState($el.target.value)"
                                x-model="SingleUserReligionInfo.user_star_id"
                                x-bind:class="(SingleUserReligionInfo.user_star_id == 0) ? ' is-invalid is-invalid-lite' : ''">
                                <option value="0">Choose Star</option>
                                <template x-for="fstar in starList" :key="fstar.id">
                                    <template x-if="fstar.star_rasi_id==SingleUserReligionInfo.user_rasi_id">
                                        <option
                                            x-bind:selected="fstar.id == SingleUserReligionInfo.user_star_id ? true : false"
                                            x-bind:value="fstar.id" x-text="fstar.star_name">
                                        </option>
                                    </template>
                                </template>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row" x-show="!isLoadingReligiousInfo">
            <div class="col-md-6">
                <div class="mb-3 px-1">
                    <label class="form-label">Choose Dhosam</label>
                    <div class="row g-2">
                        <div class="col-12">
                            <select class="form-select" x-model="SingleUserReligionInfo.dhosam"
                                x-bind:class="(SingleUserReligionInfo.dhosam == 2) ? ' is-invalid is-invalid-lite' : ''">
                                <option value="2">Choose Dhosam</option>
                                <template x-for="dhosam in dhosamList" :key="dhosam.id">

                                    <option
                                        x-bind:selected="dhosam.id == SingleUserReligionInfo.dhosam ? true : false"
                                        x-bind:value="dhosam.id" x-text="dhosam.type">
                                    </option>

                                </template>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <template x-if="SingleUserReligionInfo.dhosam==1">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label">Dhosam Details <span class="form-label-description"
                                x-text="SingleUserReligionInfo.dhosam_details.length+'/100'"></span></label>
                        <textarea class="form-control" x-model="SingleUserReligionInfo.dhosam_details"
                            x-bind:class="(SingleUserReligionInfo.dhosam_details == '' || SingleUserReligionInfo.dhosam_details
                                .length > 100) ? ' is-invalid is-invalid-lite' : ''"
                            name="example-textarea-input" rows="3" placeholder="Content..">
                        </textarea>
                    </div>
                </div>
            </template>
        </div>
        <div class="row" x-show="!isLoadingReligiousInfo">
            <div class="col-md-6">
                <div class="mb-3 px-1">
                    <label class="form-label">User Birth Time</label>
                    <input class="form-control" x-model="SingleUserReligionInfo.user_birth_time"
                        x-bind:class="(SingleUserReligionInfo.user_birth_time == '') ? 'is-invalid is-invalid-lite' : ''"
                        type="time">
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3 px-1">
                    <label class="form-label">User Birth Place</label>
                    <input class="form-control" x-model="SingleUserReligionInfo.user_birth_place"
                        x-bind:class="(SingleUserReligionInfo.user_birth_place == '') ? 'is-invalid is-invalid-lite' : ''"
                        type="text">
                </div>
            </div>
        </div>
    </div>
    <div class="card-footer">
        <div class="d-flex justify-content-end">
            <button x-on:click="updateUserProfessinalInformation" type="button" class="btn btn-success">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-device-floppy" width="24"
                    height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                    stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M6 4h10l4 4v10a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2">
                    </path>
                    <circle cx="12" cy="14" r="2"></circle>
                    <polyline points="14 4 14 8 8 8 8 4"></polyline>
                </svg>
                <template x-if="!isLoadingProcessing">
                    <span>Save</span>
                </template>
                <template x-if="isLoadingProcessing">
                    <span>Processing...</span>
                </template>
            </button>
        </div>
    </div>
</div>
