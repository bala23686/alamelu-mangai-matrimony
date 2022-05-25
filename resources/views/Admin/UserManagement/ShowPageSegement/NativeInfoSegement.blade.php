<div id="tab-top-5" x-data="{
    educationList: [],
    jobList: [],
    countryList: [],
    stateList: [],
    fullStateList: [],
    fullCityList: [],
    cityList: [],
    salaryList: [],
    isLoadingNativeInfo: true,
    isLoadingProcessing:true,
    SingleUserNativeInfo: {

        user_country_id: '{{ $singleUserInfo->userBasicInfos->profile_location_status == 1? $singleUserInfo->userNativeInfo->user_country_id: '""' }}',
        user_state_id: '{{ $singleUserInfo->userBasicInfos->profile_location_status == 1? $singleUserInfo->userNativeInfo->user_state_id: '""' }}',
        user_city_id: '{{ $singleUserInfo->userBasicInfos->profile_location_status == 1? $singleUserInfo->userNativeInfo->user_city_id: '""' }}',


    },
    loadFullStateList() {

        axios.get('{{ route('admin.submaster.state.ssr') }}')
            .then((e) => {

                this.fullStateList = e.data


            })
    },
    loadFullCityList() {

        axios.get('{{ route('admin.submaster.city.ssr') }}')
            .then((e) => {

                this.fullCityList = e.data


            })
    },
    loadCountryList() {

        axios.get('{{ route('admin.submaster.country.ssr') }}')
            .then((e) => {

                this.countryList = e.data
                this.isLoadingNativeInfo = false
                this.isLoadingProcessing = false


            })
    },
    loadSalaryList() {

        axios.get('{{ route('admin.submaster.salary.ssr') }}')
            .then((e) => {

                this.salaryList = e.data


            })
    },
    loadStateListByCountry(id) {
        this.SingleUserNativeInfo.user_state_id=0
        axios.get('{{ route('admin.statebycountry.ssr', '') }}/' + id)
            .then((e) => {

                this.stateList = e.data


            })
    },
    loadCityListByState(id) {
        this.SingleUserNativeInfo.user_city_id=0
        axios.get('{{ route('admin.citybystate.ssr', '') }}/' + id)
            .then((e) => {

                this.cityList = e.data


            })
    },
    updateUserProfessinalInformation() {

        this.isLoadingProcessing = true

        let data = {
            user_country: this.SingleUserNativeInfo.user_country_id,
            user_state: this.SingleUserNativeInfo.user_state_id,
            user_city: this.SingleUserNativeInfo.user_city_id,

        }

        axios.put('{{ route('admin.profile.updateUserNativeInformation', $singleUserInfo->id) }}', data)
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

            })
            .catch(e=>{

                Swal.fire({
                    position: 'top-end',
                    icon: 'error',
                    title: 'Check all the Fields Are filled',
                    showConfirmButton: false,
                    toast: true,
                    timer: 1500
                }).then(() => {
                    this.isLoadingProcessing = false
                })
            })

    },

}" x-init="loadFullCityList();
loadFullStateList();
loadSalaryList();
loadCountryList();
loadEducationList();" class="card tab-pane">
    <div class="card-body">
        <template x-if="isLoadingNativeInfo">
            <div class="mb-3">
                <label class="form-label">Loading....</label>
                <div class="progress">
                    <div class="progress-bar progress-bar-indeterminate bg-dark"></div>
                </div>
            </div>
        </template>
        <div class="card-title">User Native Information #5</div>
        <div class="row" x-show="!isLoadingNativeInfo">
            <div class="col-md-4">
                <div class="mb-3 px-1">
                    <label class="form-label">Choose Native Country</label>
                    <div class="row g-2">
                        <div class="col-12" x-if="(!isLoadingNativeInfo)">
                            <select class="form-select" x-on:change="($el)=>loadStateListByCountry($el.target.value)"
                                x-model="SingleUserNativeInfo.user_country_id"
                                x-bind:class="(SingleUserNativeInfo.user_country_id==0) ? ' is-invalid is-invalid-lite' : ''">
                                <option value="0">Choose Country</option>
                                <template x-for="country in countryList" :key="country.id">
                                    <option
                                        x-bind:selected="country.id == SingleUserNativeInfo.user_country_id  ? true : false "
                                        x-bind:value="country.id" x-text="country.country_name">
                                    </option>
                                </template>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="mb-3 px-1">
                    <label class="form-label">Choose Native State</label>
                    <div class="row g-2">
                        <template x-if="(SingleUserNativeInfo.user_state_id=='')">
                            <div class="col-12">
                                <select class="form-select"
                                    x-on:change="($el)=>loadCityListByState($el.target.value)"
                                    x-model="SingleUserNativeInfo.user_state_id"
                                    x-bind:class="(SingleUserNativeInfo.user_state_id==0) ? ' is-invalid is-invalid-lite' : ''">
                                    <option value="0">Choose State</option>
                                    <template x-for="state in stateList" :key="state.id">
                                        <option
                                            x-bind:selected="state.id == SingleUserNativeInfo.user_state_id  ? true : false "
                                            x-bind:value="state.id" x-text="state.state_name">
                                        </option>
                                    </template>
                                </select>
                            </div>
                        </template>
                        <template x-if="(SingleUserNativeInfo.user_state_id!='')">
                            <div class="col-12">
                                <select class="form-select"
                                    x-on:change="($el)=>loadCityListByState($el.target.value)"
                                    x-model="SingleUserNativeInfo.user_state_id"
                                    x-bind:class="(SingleUserNativeInfo.user_state_id==0) ? ' is-invalid is-invalid-lite' : ''">
                                    <option value="0">Choose State</option>
                                    <template x-for="fstate in fullStateList" :key="fstate.id">
                                        <option
                                            x-bind:selected="fstate.id == SingleUserNativeInfo.user_state_id  ? true : false "
                                            x-bind:value="fstate.id" x-text="fstate.state_name">
                                        </option>
                                    </template>
                                </select>
                            </div>
                        </template>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="mb-3 px-1">
                    <label class="form-label">Choose Native City</label>
                    <div class="row g-2">
                        <template x-if="(SingleUserNativeInfo.user_city_id=='')">
                            <div class="col-12">
                                <select class="form-select" x-model="SingleUserNativeInfo.user_city_id"
                                    x-bind:class="(SingleUserNativeInfo.user_city_id==0) ? ' is-invalid is-invalid-lite' : ''">
                                    <option value="0">Choose City</option>
                                    <template x-for="city in cityList" :key="city.id">
                                        <option
                                            x-bind:selected="city.id == SingleUserNativeInfo.user_city_id  ? true : false "
                                            x-bind:value="city.id" x-text="city.city_name">
                                        </option>
                                    </template>
                                </select>
                            </div>
                        </template>
                        <template x-if="(SingleUserNativeInfo.user_city_id!='')">
                            <div class="col-12">
                                <select class="form-select" x-model="SingleUserNativeInfo.user_city_id"
                                    x-bind:class="(SingleUserNativeInfo.user_city_id==0) ? ' is-invalid is-invalid-lite' : ''">
                                    <option value="0">Choose City</option>
                                    <template x-for="fcity in fullCityList" :key="fcity.id">
                                        <option
                                            x-bind:selected="fcity.id == SingleUserNativeInfo.user_city_id  ? true : false "
                                            x-bind:value="fcity.id" x-text="fcity.city_name">
                                        </option>
                                    </template>
                                </select>
                            </div>
                        </template>
                    </div>
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
