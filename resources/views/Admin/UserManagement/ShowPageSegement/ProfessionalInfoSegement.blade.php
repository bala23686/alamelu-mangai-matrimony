<div id="tab-top-4" x-data="{
    educationList: [],
    jobList: [],
    countryList: [],
    stateList: [],
    fullStateList: [],
    fullCityList: [],
    cityList: [],
    salaryList: [],
    choosedProfessionalEducationList: {{ $singleUserInfo->userBasicInfos->profile_pro_info_status == 1 ? $singleUserInfo->userProfessinalInfos->user_education_id : '[]' }},
    isLoadingEducation: true,
    isLoadingProcessing: true,
    isLoadingJob: true,
    SingleUserEducationInfo: {

        user_education_id: '{{ $singleUserInfo->userBasicInfos->profile_pro_info_status == 1 ? $singleUserInfo->userProfessinalInfos->user_education_id : '""' }}',
        user_education_details: '{{ $singleUserInfo->userBasicInfos->profile_pro_info_status == 1 ? $singleUserInfo->userProfessinalInfos->user_education_details : 'More Details About Your Education' }}',
        user_job_id: '{{ $singleUserInfo->userBasicInfos->profile_pro_info_status == 1 ? $singleUserInfo->userProfessinalInfos->user_job_id : '""' }}',
        user_job_details: '{{ $singleUserInfo->userBasicInfos->profile_pro_info_status == 1 ? $singleUserInfo->userProfessinalInfos->user_job_details : 'More Details About Your Job' }}',
        user_job_country: '{{ $singleUserInfo->userBasicInfos->profile_pro_info_status == 1 ? $singleUserInfo->userProfessinalInfos->user_job_country : '""' }}',
        user_job_state: '{{ $singleUserInfo->userBasicInfos->profile_pro_info_status == 1 ? $singleUserInfo->userProfessinalInfos->user_job_state : '""' }}',
        user_job_city: '{{ $singleUserInfo->userBasicInfos->profile_pro_info_status == 1 ? $singleUserInfo->userProfessinalInfos->user_job_city : '""' }}',
        user_annual_income: '{{ $singleUserInfo->userBasicInfos->profile_pro_info_status == 1 ? $singleUserInfo->userProfessinalInfos->user_annual_income : '0' }}',

    },
    loadEducationList() {

        axios.get('{{ route('admin.submaster.education.ssr') }}')
            .then((e) => {

                this.educationList = e.data
                this.isLoadingEducation = false
                this.isLoadingProcessing = false


            })
    },
    loadJobList() {

        axios.get('{{ route('admin.submaster.job.ssr') }}')
            .then((e) => {

                this.jobList = e.data
                this.isLoadingJob = false


            })
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


            })
    },
    loadStateListByCountry(id) {
        this.SingleUserEducationInfo.user_job_state = 0
        axios.get('{{ route('admin.statebycountry.ssr', '') }}/' + id)
            .then((e) => {

                this.stateList = e.data


            })
    },
    loadCityListByState(id) {
        this.SingleUserEducationInfo.user_job_city = 0
        axios.get('{{ route('admin.citybystate.ssr', '') }}/' + id)
            .then((e) => {

                this.cityList = e.data


            })
    },
    updateProfessionalEducationSeleted(id) {

        let choosedInfo = this.educationList.filter((edu) => edu.id == id)
        this.educationList = this.educationList.filter((edu) => edu.id != id)
        this.choosedProfessionalEducationList.push(choosedInfo[0])

        console.log(this.choosedProfessionalEducationList)

    },
    deleteEducationSelected(id) {
        let deletedInfo = this.choosedProfessionalEducationList.filter((cho) => cho.id == id)
        this.choosedProfessionalEducationList = this.choosedProfessionalEducationList.filter((cho) => cho.id != id)
        console.log('\t from this :' + deletedInfo)
        this.educationList = [...this.educationList, deletedInfo[0]]
    },
    filterEducationOnLoad() {
        for (let i = 0; i < this.choosedProfessionalEducationList.length; i++) {
            this.educationList = this.educationList.filter((edu) => edu.id != this.choosedProfessionalEducationList[i].id)
        }
    },
    updateUserProfessinalInformation() {

        this.isLoadingProcessing = true
        let choosedEducationID=[]

        this.choosedProfessionalEducationList.map((education)=>{
            choosedEducationID.push(education.id)
        })


        let data = {
            user_education: choosedEducationID,
            user_education_details: this.SingleUserEducationInfo.user_education_details,
            user_job: this.SingleUserEducationInfo.user_job_id,
            user_job_details: this.SingleUserEducationInfo.user_job_details,
            user_working_country: this.SingleUserEducationInfo.user_job_country,
            user_working_state: this.SingleUserEducationInfo.user_job_state,
            user_working_city: this.SingleUserEducationInfo.user_job_city,
            user_annual_income: this.SingleUserEducationInfo.user_annual_income,
        }

        axios.put('{{ route('admin.profile.updateUserProfessionalInformation', $singleUserInfo->id) }}', data)
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
                    title: 'Check all The Fields are Filled',
                    showConfirmButton: false,
                    toast: true,
                    timer: 1500
                }).then(() => {

                    this.isLoadingProcessing = false
                })
            })

    },

}" x-init="
loadFullCityList();
loadFullStateList();
loadCountryList();
loadJobList();
loadEducationList();" class="card tab-pane">
    <div class="card-body">
        <template x-if="isLoadingEducation">
            <div class="mb-3">
                <label class="form-label">Loading....</label>
                <div class="progress">
                    <div class="progress-bar progress-bar-indeterminate bg-dark"></div>
                </div>
            </div>
        </template>
        <div class="card-title">User Professional Information #4</div>
        <div class="row" x-show="!isLoadingEducation">
            <div class="col-md-6">
                <div class="mb-3 px-1" x-if="isLoadingEducation">
                    <label class="form-label">Edutcation</label>
                    <div class="form-selectgroup form-selectgroup-pills mb-2" >
                        <template x-for="(list,index) in choosedProfessionalEducationList" >
                            <div>
                                <label class="form-selectgroup-item" :key="list.id">
                                    <input type="text" x-bind:id="list.id" class="form-selectgroup-input"
                                        x-on:click="($el)=>deleteEducationSelected($el.target.id)">
                                    <span class="form-selectgroup-label">
                                        <span x-text="list.education_name"></span>
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-x"
                                            width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                                            stroke="currentColor" fill="none" stroke-linecap="round"
                                            stroke-linejoin="round">
                                            <desc>Download more icon variants from https://tabler-icons.io/i/x
                                            </desc>
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <line x1="18" y1="6" x2="6" y2="18"></line>
                                            <line x1="6" y1="6" x2="18" y2="18"></line>
                                        </svg>
                                    </span>
                                </label>
                            </div>
                        </template>
                    </div>
                    <select type="text" class="form-select" x-on:mouseover="filterEducationOnLoad"
                        x-on:change="($el)=>updateProfessionalEducationSeleted($el.target.value)"
                        placeholder="Select a Education preferenecess" id="select-tags-advanced" value="" tabindex="-1">
                        <option selected value="0">Choose Education</option>
                        <template x-for="education in educationList" :key="education.id">
                            <option
                                x-bind:value="education.id" x-text="education.education_name">
                            </option>
                        </template>
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3 px-1">
                    <label class="form-label">Country</label>
                    <div class="row g-2">
                        <div class="col-12" x-if="(!isLoadingEducation)">
                            <select class="form-select" x-on:change="($el)=>loadStateListByCountry($el.target.value)"
                                x-model="SingleUserEducationInfo.user_job_country"
                                x-bind:class="(SingleUserEducationInfo.user_job_country == 0) ? ' is-invalid is-invalid-lite' : ''">
                                <option value="0">Choose Country</option>
                                <template x-for="country in countryList" :key="country.id">
                                    <option
                                        x-bind:selected="country.id == SingleUserEducationInfo.user_job_country ? true : false"
                                        x-bind:value="country.id" x-text="country.country_name">
                                    </option>
                                </template>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row" x-show="!isLoadingEducation">
            <div class="col-md-6">
                <div class="mb-3">
                    <label class="form-label">User Education Details <span class="form-label-description"
                            x-text="SingleUserEducationInfo.user_education_details.length+'/100'"></span></label>
                    <textarea class="form-control"
                        x-bind:class="(SingleUserEducationInfo.user_education_details === '' || SingleUserEducationInfo
                            .user_education_details.length > 100) ? ' is-invalid is-invalid-lite' : ''"
                        x-model="SingleUserEducationInfo.user_education_details" name="example-textarea-input" rows="3"
                        placeholder="Content..">

                        </textarea>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3 px-1">
                    <label class="form-label">State</label>
                    <div class="row g-2">
                        <template x-if="(SingleUserEducationInfo.user_job_state=='')">
                            <div class="col-12">
                                <select class="form-select"
                                    x-on:change="($el)=>loadCityListByState($el.target.value)"
                                    x-model="SingleUserEducationInfo.user_job_state"
                                    x-bind:class="(SingleUserEducationInfo.user_job_state == 0) ? ' is-invalid is-invalid-lite' : ''">
                                    <option value="0">Choose State</option>
                                    <template x-for="state in stateList" :key="state.id">
                                        <option
                                            x-bind:selected="state.id == SingleUserEducationInfo.user_job_state ? true : false"
                                            x-bind:value="state.id" x-text="state.state_name">
                                        </option>
                                    </template>
                                </select>
                            </div>
                        </template>
                        <template x-if="(SingleUserEducationInfo.user_job_state!='')">
                            <div class="col-12">
                                <select class="form-select"
                                    x-on:change="($el)=>loadCityListByState($el.target.value)"
                                    x-model="SingleUserEducationInfo.user_job_state"
                                    x-bind:class="(SingleUserEducationInfo.user_job_state == 0) ? ' is-invalid is-invalid-lite' : ''">
                                    <option value="0">Choose State</option>
                                    <template x-for="fstate in fullStateList" :key="fstate.id">
                                        <option
                                            x-bind:selected="fstate.id == SingleUserEducationInfo.user_job_state ? true : false"
                                            x-bind:value="fstate.id" x-text="fstate.state_name">
                                        </option>
                                    </template>
                                </select>
                            </div>
                        </template>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mb-1" x-show="!isLoadingJob">
            <div class="col-md-6">
                <div class="mb-3 px-1">
                    <label class="form-label">Job Profession</label>
                    <div class="row g-2">
                        <div class="col-12" x-if="(!isLoadingJob)">
                            <select class="form-select" x-model="SingleUserEducationInfo.user_job_id"
                                x-bind:class="(SingleUserEducationInfo.user_job_id == 0) ? ' is-invalid is-invalid-lite' : ''">
                                <option value="0">Choose Job Profession</option>
                                <template x-for="job in jobList" :key="job.id">
                                    <option
                                        x-bind:selected="job.id == SingleUserEducationInfo.user_job_id ? true : false"
                                        x-bind:value="job.id" x-text="job.job_name">
                                    </option>
                                </template>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3 px-1">
                    <label class="form-label">City</label>
                    <div class="row g-2">
                        <template x-if="(SingleUserEducationInfo.user_job_city=='')">
                            <div class="col-12">
                                <select class="form-select" x-model="SingleUserEducationInfo.user_job_city"
                                    x-bind:class="(SingleUserEducationInfo.user_job_city == 0) ? ' is-invalid is-invalid-lite' : ''">
                                    <option value="0">Choose City</option>
                                    <template x-for="city in cityList" :key="city.id">
                                        <option
                                            x-bind:selected="city.id == SingleUserEducationInfo.user_job_city ? true : false"
                                            x-bind:value="city.id" x-text="city.city_name">
                                        </option>
                                    </template>
                                </select>
                            </div>
                        </template>
                        <template x-if="(SingleUserEducationInfo.user_job_city!='')">
                            <div class="col-12">
                                <select class="form-select" x-model="SingleUserEducationInfo.user_job_city"
                                    x-bind:class="(SingleUserEducationInfo.user_job_city == 0) ? ' is-invalid is-invalid-lite' : ''">
                                    <option value="0">Choose City</option>
                                    <template x-for="fcity in fullCityList" :key="fcity.id">
                                        <option
                                            x-bind:selected="fcity.id == SingleUserEducationInfo.user_job_city ? true : false"
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
        <div class="row" x-show="!isLoadingEducation">
            <div class="col-md-6">
                <div class="mb-3">
                    <label class="form-label">User Job Details <span class="form-label-description"
                            x-text="SingleUserEducationInfo.user_job_details.length+'/100'"></span></label>
                    <textarea class="form-control"
                        x-bind:class="(SingleUserEducationInfo.user_job_details === '' || SingleUserEducationInfo.user_job_details
                            .length > 100) ? ' is-invalid is-invalid-lite' : ''"
                        x-model="SingleUserEducationInfo.user_job_details" name="example-textarea-input" rows="3"
                        placeholder="Content..">

                        </textarea>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3 px-1">
                    <label class="form-label">Salary (Annual Income)</label>
                    <div class="row g-2">
                        <div class="col-12" x-if="(!isLoadingEducation)">
                            <div class="mb-3">
                                <label class="form-label">Income : <span x-text="SingleUserEducationInfo.user_annual_income"></span></label>
                                <input type="range" class="form-range mb-2 noUi-target noUi-ltr noUi-horizontal noUi-txt-dir-ltr mb-2" x-model="SingleUserEducationInfo.user_annual_income"  min="50000" max="10000000" step="25000">
                              </div>
                            {{-- <select class="form-select" x-model="SingleUserEducationInfo.user_annual_income"
                                x-bind:class="(SingleUserEducationInfo.user_annual_income == 0) ? ' is-invalid is-invalid-lite' : ''">
                                <option value="0">Choose Salary</option>
                                <template x-for="salary in salaryList" :key="salary.id">
                                    <option
                                        x-bind:selected="salary.id == SingleUserEducationInfo.user_annual_income ? true : false"
                                        x-bind:value="salary.id" x-text="salary.salary_amount">
                                    </option>
                                </template>
                            </select> --}}
                        </div>
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
