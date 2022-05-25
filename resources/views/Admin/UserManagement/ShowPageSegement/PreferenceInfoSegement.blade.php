<div id="tab-top-7" x-data="{
    religionList: [],
    casteList: [],
    choosedEducationList:{{ $singleUserInfo->userBasicInfos->profile_pref_info_status == 1? $singleUserInfo->userPreferrenceInfo->partner_education: '[]' }},
    choosedJobList:{{ $singleUserInfo->userBasicInfos->profile_pref_info_status == 1? $singleUserInfo->userPreferrenceInfo->partner_job: '[]' }},
    choosedComplexionList:{{ $singleUserInfo->userBasicInfos->profile_pref_info_status == 1? $singleUserInfo->userPreferrenceInfo->partner_complexion: '[]' }},
    choosedLanguageList:{{ $singleUserInfo->userBasicInfos->profile_pref_info_status == 1? $singleUserInfo->userPreferrenceInfo->partner_mother_tongue: '[]' }},
    choosedCountryList:{{ $singleUserInfo->userBasicInfos->profile_pref_info_status == 1? $singleUserInfo->userPreferrenceInfo->partner_country: '[]' }},
    choosedJobCountryList:{{ $singleUserInfo->userBasicInfos->profile_pref_info_status == 1? $singleUserInfo->userPreferrenceInfo->partner_job_country: '[]' }},
    choosedRasiList:{{ $singleUserInfo->userBasicInfos->profile_pref_info_status == 1? $singleUserInfo->userPreferrenceInfo->partner_rasi : '[]' }},
    martialList: [],
    rasiList: [],
    jobList: [],
    languageList: [],
    countryList: [],
    jobCountryList: [],
    complextionList: [],
    educationList: [],
    ageList: [],
    heightList: [],
    salaryList: [],
    isLoadingPreferneceInfo: true,
    isLoadingProcessing: true,
    SingleUserPreferenceInfo: {

        partner_age_from: '{{ $singleUserInfo->userBasicInfos->profile_pref_info_status == 1? $singleUserInfo->userPreferrenceInfo->partner_age_from: '""' }}',
        partner_age_to: '{{ $singleUserInfo->userBasicInfos->profile_pref_info_status == 1? $singleUserInfo->userPreferrenceInfo->partner_age_to: '""' }}',
        partner_height_to: '{{ $singleUserInfo->userBasicInfos->profile_pref_info_status == 1? $singleUserInfo->userPreferrenceInfo->partner_height_to: '""' }}',
        partner_height_from: '{{ $singleUserInfo->userBasicInfos->profile_pref_info_status == 1? $singleUserInfo->userPreferrenceInfo->partner_height_from: '""' }}',
        partner_martial_status: '{{ $singleUserInfo->userBasicInfos->profile_pref_info_status == 1? $singleUserInfo->userPreferrenceInfo->partner_martial_status: '""' }}',
        partner_complexion: '{{ $singleUserInfo->userBasicInfos->profile_pref_info_status == 1? $singleUserInfo->userPreferrenceInfo->partner_complexion: '""' }}',
        partner_mother_tongue: '{{ $singleUserInfo->userBasicInfos->profile_pref_info_status == 1? $singleUserInfo->userPreferrenceInfo->partner_mother_tongue: '""' }}',
        partner_job: {{ $singleUserInfo->userBasicInfos->profile_pref_info_status == 1? $singleUserInfo->userPreferrenceInfo->partner_job: '""' }},
        partner_job_country: '{{ $singleUserInfo->userBasicInfos->profile_pref_info_status == 1? $singleUserInfo->userPreferrenceInfo->partner_job_country: '""' }}',
        partner_job_details: '{{ $singleUserInfo->userBasicInfos->profile_pref_info_status == 1? $singleUserInfo->userPreferrenceInfo->partner_job_details: 'something about your Job prefference' }}',
        partner_education: {{ $singleUserInfo->userBasicInfos->profile_pref_info_status == 1? $singleUserInfo->userPreferrenceInfo->partner_education: '""' }},
        partner_education_details: '{{ $singleUserInfo->userBasicInfos->profile_pref_info_status == 1? $singleUserInfo->userPreferrenceInfo->partner_education_details: 'something about your education prefference' }}',
        partner_salary: '{{ $singleUserInfo->userBasicInfos->profile_pref_info_status == 1? $singleUserInfo->userPreferrenceInfo->partner_salary: '0' }}',
        partner_religion: '{{ $singleUserInfo->userBasicInfos->profile_pref_info_status == 1? $singleUserInfo->userPreferrenceInfo->partner_religion: '""' }}',
        partner_caste: '{{ $singleUserInfo->userBasicInfos->profile_pref_info_status == 1? $singleUserInfo->userPreferrenceInfo->partner_caste: '""' }}',
        partner_rasi: '{{ $singleUserInfo->userBasicInfos->profile_pref_info_status == 1? $singleUserInfo->userPreferrenceInfo->partner_rasi: '""' }}',
        partner_country: '{{ $singleUserInfo->userBasicInfos->profile_pref_info_status == 1? $singleUserInfo->userPreferrenceInfo->partner_country: '""' }}',

    },
    loadAgeList() {

        axios.get('{{ route('admin.submaster.age.ssr') }}')
            .then((e) => {

                this.ageList = e.data


            })
    },
    loadHeightList() {

        axios.get('{{ route('admin.submaster.height.ssr') }}')
            .then((e) => {

                this.heightList = e.data


            })
    },
    loadMartialList() {

        axios.get('{{ route('admin.submaster.m-status.ssr') }}')
            .then((e) => {

                this.martialList = e.data


            })
    },
    loadReligionList() {

        axios.get('{{ route('admin.submaster.religion.ssr') }}')
            .then((e) => {

                this.religionList = e.data
                this.isLoadingPreferneceInfo = false
                this.isLoadingProcessing = false


            })
    },
    loadCasteList() {

        axios.get('{{ route('admin.submaster.caste.ssr') }}')
            .then((e) => {

                this.casteList = e.data


            })
    },
    loadRasiList() {

        axios.get('{{ route('admin.submaster.rasi.ssr') }}')
            .then((e) => {

                this.rasiList = e.data


            })
    },
    loadComplexionList() {

        axios.get('{{ route('admin.submaster.complextion.ssr') }}')
            .then((e) => {

                this.complextionList = e.data


            })
    },
    loadLanguageList() {

        axios.get('{{ route('admin.submaster.language.ssr') }}')
            .then((e) => {

                this.languageList = e.data


            })
    },
    loadSalaryList() {

        axios.get('{{ route('admin.submaster.salary.ssr') }}')
            .then((e) => {

                this.salaryList = e.data


            })
    },
    loadCountryList() {

        axios.get('{{ route('admin.submaster.country.ssr') }}')
            .then((e) => {

                this.countryList = e.data
                this.jobCountryList = e.data


            })
    },
    loadEducationList() {

        axios.get('{{ route('admin.submaster.education.ssr') }}')
            .then((e) => {

                this.educationList = e.data


            })
    },
    loadJobList() {

        axios.get('{{ route('admin.submaster.job.ssr') }}')
            .then((e) => {

                this.jobList = e.data


            })
    },
    loadStateListByCountry(id, isJob = 0) {

        if (isJob == 0) {
            this.SingleUserPreferenceInfo.partner_state = 0
            this.SingleUserPreferenceInfo.partner_city = 0
        } else {
            this.SingleUserPreferenceInfo.partner_job_state = 0
            this.SingleUserPreferenceInfo.partner_job_city = 0
        }

        axios.get('{{ route('admin.statebycountry.ssr', '') }}/' + id)
            .then((e) => {

                if (isJob == 0) {

                    this.fullStateList = e.data

                } else {
                    this.fullJobStateList = e.data
                }



            })
    },
    loadCityListByState(id, isJob = 0) {

        if (isJob == 0) {
            this.SingleUserPreferenceInfo.partner_city = 0

        } else {

            this.SingleUserPreferenceInfo.partner_job_city = 0
        }

        axios.get('{{ route('admin.citybystate.ssr', '') }}/' + id)
            .then((e) => {

                if (isJob == 0) {

                    this.fullCityList = e.data


                } else {

                    this.fullJobCityList = e.data
                }


            })
    },
    loadCasteListByReligion(id) {

        this.SingleUserPreferenceInfo.user_caste_id = 0
        axios.get('{{ route('admin.casteByReligion.ssr', '') }}/' + id)
            .then((e) => {

                this.casteList = e.data


            })
    },
    loadStarListByRasi(id) {
        this.SingleUserPreferenceInfo.user_star_id = 0
        axios.get('{{ route('admin.nakshathiraByRasi.ssr', '') }}/' + id)
            .then((e) => {

                this.starList = e.data


            })
    },
    updateUserPrefferenceBasicInformation() {

        this.isLoadingProcessing = true

        let choosedComplexionID=[]
        let choosedLanguageID=[]
        let choosedCountryID=[]


        this.choosedComplexionList.map((complexion)=>{
            choosedComplexionID.push(complexion.id)
        })

        this.choosedLanguageList.map((language)=>{
            choosedLanguageID.push(language.id)
        })

        this.choosedCountryList.map((country)=>{
            choosedCountryID.push(country.id)
        })



        let data = {
            partner_age_from: this.SingleUserPreferenceInfo.partner_age_from,
            partner_age_to: this.SingleUserPreferenceInfo.partner_age_to,
            partner_height_from: this.SingleUserPreferenceInfo.partner_height_from,
            partner_height_to: this.SingleUserPreferenceInfo.partner_height_to,
            partner_martial_status: this.SingleUserPreferenceInfo.partner_martial_status,
            partner_complexion: choosedComplexionID,
            partner_mother_tongue: choosedLanguageID,
            partner_country: choosedCountryID,
            partner_state: this.SingleUserPreferenceInfo.partner_state,
            partner_city: this.SingleUserPreferenceInfo.partner_city,

        }

        axios.put('{{ route('admin.profile.updateUserPrefferenceBasicInformation', $singleUserInfo->id) }}', data)
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
            .catch((e)=>{

                Swal.fire({
                    position: 'top-end',
                    icon: 'error',
                    title: 'Check Out Fields',
                    showConfirmButton: false,
                    toast: true,
                    timer: 1500
                }).then(() => {

                    this.isLoadingProcessing = false

                })
            })

    },
    updateUserPrefferenceJobInformation() {


        this.isLoadingProcessing = true

        let choosedEducationID=[]
        let choosedJobID=[]
        let choosedJobCountryID=[]

        this.choosedEducationList.map((education)=>{
            choosedEducationID.push(education.id)
        })
        this.choosedJobList.map((job)=>{
            choosedJobID.push(job.id)
        })
        this.choosedJobCountryList.map((country)=>{
            choosedJobCountryID.push(country.id)
        })

        let data = {
            partner_education: choosedEducationID,
            partner_education_details: this.SingleUserPreferenceInfo.partner_education_details,
            partner_job: choosedJobID,
            partner_job_details: this.SingleUserPreferenceInfo.partner_job_details,
            partner_job_country: choosedJobCountryID,
            partner_annual_income: this.SingleUserPreferenceInfo.partner_salary,
        }

        axios.put('{{ route('admin.profile.updateUserPrefferenceJobInformation', $singleUserInfo->id) }}', data)
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
                    title: 'Checkout The Feilds',
                    showConfirmButton: false,
                    toast: true,
                    timer: 1500
                }).then(() => {

                    this.isLoadingProcessing = false

                })
            })
    },
    updateUserPrefferenceReligiousInformation() {

        this.isLoadingProcessing = true

        let choosedRasiID=[]

        this.choosedRasiList.map((education)=>{
            choosedRasiID.push(education.id)
        })
        let data = {
            partner_religion: this.SingleUserPreferenceInfo.partner_religion,
            partner_caste: this.SingleUserPreferenceInfo.partner_caste,
            partner_rasi: choosedRasiID,
        }

        axios.put('{{ route('admin.profile.updateUserPrefferenceReligiousInformation', $singleUserInfo->id) }}', data)
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
                    title: 'Check out All Fields',
                    showConfirmButton: false,
                    toast: true,
                    timer: 1500
                }).then(() => {
                    this.isLoadingProcessing = false
                })
            })
    },
    updateEducationSeleted(id) {

        let choosedInfo = this.educationList.filter((edu) => edu.id == id)
        this.educationList = this.educationList.filter((edu) => edu.id != id)
        this.choosedEducationList.push(choosedInfo[0])

    },
    updateComplexionSeleted(id){

        let choosedInfo = this.complextionList.filter((edu) => edu.id == id)
        this.complextionList = this.complextionList.filter((edu) => edu.id != id)
        this.choosedComplexionList.push(choosedInfo[0])

    },
    updateLanguageSeleted(id){

        let choosedInfo = this.languageList.filter((edu) => edu.id == id)
        this.languageList = this.languageList.filter((edu) => edu.id != id)
        this.choosedLanguageList.push(choosedInfo[0])

    },
    updateCountrySeleted(id){

        let choosedInfo = this.countryList.filter((edu) => edu.id == id)
        this.countryList = this.countryList.filter((edu) => edu.id != id)
        this.choosedCountryList.push(choosedInfo[0])

    },
    updateJobCountrySeleted(id){

        let choosedInfo = this.jobCountryList.filter((edu) => edu.id == id)
        this.jobCountryList = this.jobCountryList.filter((edu) => edu.id != id)
        this.choosedJobCountryList.push(choosedInfo[0])

    },
    updateRasiSeleted(id){

        let choosedInfo = this.rasiList.filter((edu) => edu.id == id)
        this.rasiList = this.rasiList.filter((edu) => edu.id != id)
        this.choosedRasiList.push(choosedInfo[0])

    },
    deleteEducationSelected(id) {
        let deletedInfo = this.choosedEducationList.filter((cho) => cho.id == id)
        this.choosedEducationList = this.choosedEducationList.filter((cho) => cho.id != id)
        console.log('\t from this :' + deletedInfo)
        this.educationList = [...this.educationList, deletedInfo[0]]
    },
    deleteComplexionSelected(id) {
        let deletedInfo = this.choosedComplexionList.filter((cho) => cho.id == id)
        this.choosedComplexionList = this.choosedComplexionList.filter((cho) => cho.id != id)
        console.log('\t from this :' + deletedInfo)
        this.complextionList = [...this.complextionList, deletedInfo[0]]
    },
    deleteLanguageSelected(id) {
        let deletedInfo = this.choosedLanguageList.filter((cho) => cho.id == id)
        this.choosedLanguageList = this.choosedLanguageList.filter((cho) => cho.id != id)
        console.log('\t from this :' + deletedInfo)
        this.languageList = [...this.languageList, deletedInfo[0]]
    },
    deleteCountrySelected(id) {
        let deletedInfo = this.choosedCountryList.filter((cho) => cho.id == id)
        this.choosedCountryList = this.choosedCountryList.filter((cho) => cho.id != id)
        console.log('\t from this :' + deletedInfo)
        this.countryList = [...this.countryList, deletedInfo[0]]
    },
    deleteJobCountrySelected(id) {
        let deletedInfo = this.choosedJobCountryList.filter((cho) => cho.id == id)
        this.choosedJobCountryList = this.choosedJobCountryList.filter((cho) => cho.id != id)
        this.jobCountryList = [...this.jobCountryList, deletedInfo[0]]
    },
    deleteRasiSelected(id) {
        let deletedInfo = this.choosedRasiList.filter((cho) => cho.id == id)
        this.choosedRasiList = this.choosedRasiList.filter((cho) => cho.id != id)
        this.rasiList = [...this.rasiList, deletedInfo[0]]
    },
    filterEducationOnLoad() {
        for (let i = 0; i < this.choosedEducationList.length; i++) {
            this.educationList = this.educationList.filter((edu) => edu.id != this.choosedEducationList[i].id)
        }
    },
    filterComplexionOnLoad() {
        for (let i = 0; i < this.choosedComplexionList.length; i++) {
            this.complextionList = this.complextionList.filter((com) => com.id != this.choosedComplexionList[i].id)
        }
    },
    filterLanguageOnLoad() {
        for (let i = 0; i < this.choosedLanguageList.length; i++) {
            this.languageList = this.languageList.filter((com) => com.id != this.choosedLanguageList[i].id)
        }
    },
    filterCountryOnLoad() {
        for (let i = 0; i < this.choosedCountryList.length; i++) {
            this.countryList = this.countryList.filter((com) => com.id != this.choosedCountryList[i].id)
        }
    },
    filterJobCountryOnLoad() {
        for (let i = 0; i < this.choosedJobCountryList.length; i++) {
            this.jobCountryList = this.jobCountryList.filter((com) => com.id != this.choosedJobCountryList[i].id)
        }
    },
    filterRasiOnLoad() {
        for (let i = 0; i < this.choosedRasiList.length; i++) {
            this.rasiList = this.rasiList.filter((com) => com.id != this.choosedRasiList[i].id)
        }
    },
    updateJobSeleted(id) {

        let choosedInfo = this.jobList.filter((edu) => edu.id == id)
        this.jobList = this.jobList.filter((edu) => edu.id != id)
        this.choosedJobList.push(choosedInfo[0])

    },
    deleteJobSelected(id) {
        let deletedInfo = this.choosedJobList.filter((cho) => cho.id == id)
        this.choosedJobList = this.choosedJobList.filter((cho) => cho.id != id)
        console.log('\t from this :' + deletedInfo)
        this.jobList = [...this.jobList, deletedInfo[0]]
    },
    filterJobOnLoad() {
        for (let i = 0; i < this.choosedJobList.length; i++) {
            console.log('heloohgdjghfasdgj'+this.choosedJobList[i].id);
            this.jobList = this.jobList.filter((job) => job.id != this.choosedJobList[i].id)
        }
    }

}" x-init="loadSalaryList();
loadJobList();
loadEducationList();
loadLanguageList();
loadCountryList();
loadComplexionList();
loadMartialList();
loadAgeList();
loadHeightList();
loadRasiList();
loadCasteList();
loadReligionList();

" class="card tab-pane">
    <div class="card-body">
        <template x-if="isLoadingPreferneceInfo">
            <div class="mb-3">
                <label class="form-label">Loading....</label>
                <div class="progress">
                    <div class="progress-bar progress-bar-indeterminate bg-dark"></div>
                </div>
            </div>
        </template>
        <div class="card-title">User Preferences Information #7</div>
        {{-- row-one start --}}
        <div class="row" x-show="!isLoadingPreferneceInfo">
            {{-- row-one col-one start --}}
            <div class="col-md-6 ">
                <label class="form-label">Basic Preferences</label>
                <fieldset class="form-fieldset">
                    <div class="mb-3" x-if="isLoadingPreferneceInfo">
                        <label class="form-label">Set Min Age</label>
                        <select class="form-select"
                        x-on:change="SingleUserPreferenceInfo.partner_age_to=0"
                        x-model="SingleUserPreferenceInfo.partner_age_from">
                            <option selected value="0">Choose min age</option>
                            <template x-for="age in ageList" :key="age.id">
                                <option
                                    x-bind:selected="age.id == SingleUserPreferenceInfo.partner_age_from  ? true : false "
                                    x-bind:value="age.id" x-text="age.age">
                                </option>
                            </template>
                        </select>
                    </div>
                    <div class="mb-3" x-if="isLoadingPreferneceInfo">
                        <label class="form-label">Set Max Age</label>
                        <select class="form-select" x-model="SingleUserPreferenceInfo.partner_age_to">
                            <option selected value="0">Choose max age</option>
                            <template x-for="age in ageList" :key="age.id">
                                <template x-if="SingleUserPreferenceInfo.partner_age_from<age.id">
                                <option
                                    x-bind:selected="age.id == SingleUserPreferenceInfo.partner_age_to  ? true : false "
                                    x-bind:value="age.id" x-text="age.age">
                                </option>
                            </template>
                            </template>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Min-Height</label>
                        <div class="row g-2">
                            <div class="col-12" x-if="(isLoadingPreferneceInfo)">
                                <select class="form-select"
                                x-on:change="SingleUserPreferenceInfo.partner_height_to=0"
                                x-model="SingleUserPreferenceInfo.partner_height_from">
                                    <option selected value="0">Choose min height</option>
                                    <template x-for="height in heightList" :key="height.id">
                                        <option
                                            x-bind:selected="height.id == SingleUserPreferenceInfo.partner_height_from  ? true : false "
                                            x-bind:value="height.id" x-text="height.height_feet_cm">
                                        </option>
                                    </template>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Max-Height</label>
                        <div class="row g-2">
                            <div class="col-12" x-if="(isLoadingPreferneceInfo)">
                                <select class="form-select" x-model="SingleUserPreferenceInfo.partner_height_to">
                                    <option selected value="0">Choose max height</option>
                                    <template x-for="height in heightList" :key="height.id">
                                        <template x-if="SingleUserPreferenceInfo.partner_height_from<height.id">
                                        <option
                                            x-bind:selected="height.id == SingleUserPreferenceInfo.partner_height_to  ? true : false "
                                            x-bind:value="height.id" x-text="height.height_feet_cm">
                                        </option>
                                    </template>
                                    </template>
                                </select>
                            </div>
                        </div>
                    </div>

                </fieldset>
            </div>
            {{-- row-one col-one end --}}
            {{-- row-one col-two start --}}
            <div class="col-md-6">
                <label class="form-label">Basic Preferences</label>
                <fieldset class="form-fieldset">
                    <div class="mb-3">
                        <label class="form-label">Martial Status</label>
                        <div class="row g-2">
                            <div class="col-12" x-if="(isLoadingPreferneceInfo)">
                                <select class="form-select"
                                    x-model="SingleUserPreferenceInfo.partner_martial_status">
                                    <option value="0">Choose Martial Status</option>
                                    <template x-for="mstatus in martialList" :key="mstatus.id">
                                        <option
                                            x-bind:selected="mstatus.id == SingleUserPreferenceInfo.partner_martial_status  ? true : false "
                                            x-bind:value="mstatus.id" x-text="mstatus.martial_status_name">
                                        </option>
                                    </template>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3" x-if="isLoadingPreferneceInfo">
                        <div class="form-selectgroup form-selectgroup-pills mb-2">
                            <template x-for="(list,index) in choosedComplexionList">
                                <div>
                                    <label class="form-selectgroup-item" :key="list.id">
                                        <input type="text" x-bind:id="list.id" class="form-selectgroup-input"
                                            x-on:click="($el)=>deleteComplexionSelected($el.target.id)">
                                        <span class="form-selectgroup-label">
                                            <span x-text="list.complexion_name"></span>
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                class="icon icon-tabler icon-tabler-x" width="24" height="24"
                                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                                stroke-linecap="round" stroke-linejoin="round">
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
                        <select type="text" class="form-select" x-on:mouseover="filterComplexionOnLoad" x-on:change="($el)=>updateComplexionSeleted($el.target.value)"
                            placeholder="Select a Comlpexion preferenecess" id="select-tags-advanced" value="" tabindex="-1">
                            <option selected value="0">Choose Complexion</option>
                            <template x-for="complextion in complextionList" :key="complextion.id">
                                <option
                                    x-bind:value="complextion.id" x-text="complextion.complexion_name">
                                </option>
                            </template>
                        </select>
                    </div>
                    <div class="mb-3" x-if="isLoadingPreferneceInfo">
                        <div class="form-selectgroup form-selectgroup-pills mb-2">
                            <template x-for="(list,index) in choosedLanguageList">
                                <div>
                                    <label class="form-selectgroup-item" :key="list.id">
                                        <input type="text" x-bind:id="list.id" class="form-selectgroup-input"
                                            x-on:click="($el)=>deleteLanguageSelected($el.target.id)">
                                        <span class="form-selectgroup-label">
                                            <span x-text="list.language_name"></span>
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                class="icon icon-tabler icon-tabler-x" width="24" height="24"
                                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                                stroke-linecap="round" stroke-linejoin="round">
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
                        <select type="text" class="form-select" x-on:mouseover="filterLanguageOnLoad" x-on:change="($el)=>updateLanguageSeleted($el.target.value)"
                            placeholder="Select a Comlpexion preferenecess" id="select-tags-advanced" value="" tabindex="-1">
                            <option selected value="0">Choose Language Prefercene</option>
                            <template x-for="language in languageList" :key="language.id">
                                <option
                                    x-bind:value="language.id" x-text="language.language_name">
                                </option>
                            </template>
                        </select>
                    </div>
                    <div class="mb-3">
                        <div class="form-selectgroup form-selectgroup-pills mb-2">
                            <template x-for="(list,index) in choosedCountryList">
                                <div>
                                    <label class="form-selectgroup-item" :key="list.id">
                                        <input type="text" x-bind:id="list.id" class="form-selectgroup-input"
                                            x-on:click="($el)=>deleteCountrySelected($el.target.id)">
                                        <span class="form-selectgroup-label">
                                            <span x-text="list.country_name"></span>
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                class="icon icon-tabler icon-tabler-x" width="24" height="24"
                                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                                stroke-linecap="round" stroke-linejoin="round">
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
                        <select type="text" class="form-select" x-on:mouseover="filterCountryOnLoad" x-on:change="($el)=>updateCountrySeleted($el.target.value)"
                            placeholder="Select a Country preferenecess" id="select-tags-advanced" value="" tabindex="-1">
                            <option selected value="0">Choose Preferred Country</option>
                            <template x-for="country in countryList" :key="country.id">
                                <option
                                    x-bind:value="country.id" x-text="country.country_name">
                                </option>
                            </template>
                        </select>
                    </div>
                </fieldset>
            </div>
            {{-- row-one col-two end --}}
        </div>
        {{-- star  of row-one-save-button --}}
        <div class="row" x-show="!isLoadingPreferneceInfo">
            <div class="col-md-4 offset-md-8">
                <button x-on:click="updateUserPrefferenceBasicInformation" type="button" class="btn btn-dark float-end">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-device-floppy"
                        width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M6 4h10l4 4v10a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2">
                        </path>
                        <circle cx="12" cy="14" r="2"></circle>
                        <polyline points="14 4 14 8 8 8 8 4"></polyline>
                    </svg> Save
                </button>
            </div>
        </div>
        {{-- end  of row-one-save-button --}}
        {{-- start-of-row-two --}}
        <div class="row" x-show="!isLoadingPreferneceInfo">
            {{-- row-two col-one start --}}
            <div class="col-md-6 ">
                <label class="form-label">Professional Preferences</label>
                <fieldset class="form-fieldset">
                    <div class="mb-3" x-if="isLoadingPreferneceInfo">
                        <div class="test">
                            <label class="form-label">User Prefered Education</label>
                            <div class="form-selectgroup form-selectgroup-pills mb-2">
                                <template x-for="(list,index) in choosedEducationList">
                                    <div>
                                        <label class="form-selectgroup-item" :key="list.id">
                                            <input type="text" x-bind:id="list.id" class="form-selectgroup-input"
                                                x-on:click="($el)=>deleteEducationSelected($el.target.id)">
                                            <span class="form-selectgroup-label">
                                                <span x-text="list.education_name"></span>
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    class="icon icon-tabler icon-tabler-x" width="24" height="24"
                                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                                    stroke-linecap="round" stroke-linejoin="round">
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
                            <select type="text" class="form-select" x-on:mouseover="filterEducationOnLoad" x-on:change="($el)=>updateEducationSeleted($el.target.value)"
                                placeholder="Select a Job preferenecess" id="select-tags-advanced" value="" tabindex="-1">

                                <option selected value="0">Choose Education</option>
                                <template x-for="education in educationList" :key="education.id">
                                    <option
                                        x-bind:selected="education.id == SingleUserPreferenceInfo.partner_education  ? true : false "
                                        x-bind:value="education.id" x-text="education.education_name">
                                    </option>
                                </template>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3" x-if="isLoadingPreferneceInfo">
                        <label class="form-label">Education Prefference Details <span class="form-label-description"
                                x-text="SingleUserPreferenceInfo.partner_education_details.length+'/100'"></span></label>
                        <textarea class="form-control" x-model="SingleUserPreferenceInfo.partner_education_details"
                            name="example-textarea-input" rows="3" placeholder="Content..">
                        </textarea>
                    </div>
                    <div class="mb-3">
                        <div class="row g-2">
                            <div class="col-12" x-if="(isLoadingPreferneceInfo)">
                                <div class="test">
                                    <label class="form-label">User Prefered Job</label>
                                    <div class="form-selectgroup form-selectgroup-pills mb-2">
                                        <template x-for="(list,index) in choosedJobList">
                                            <div>
                                                <label class="form-selectgroup-item" :key="list.id">
                                                    <input type="text" x-bind:id="list.id" class="form-selectgroup-input"
                                                        x-on:click="($el)=>deleteJobSelected($el.target.id)">
                                                    <span class="form-selectgroup-label">
                                                        <span x-text="list.job_name"></span>
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                            class="icon icon-tabler icon-tabler-x" width="24" height="24"
                                                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                                            stroke-linecap="round" stroke-linejoin="round">
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
                                    <select type="text" class="form-select" x-on:mouseover="filterJobOnLoad" x-on:change="($el)=>updateJobSeleted($el.target.value)"
                                        placeholder="Select a Job preferenecess" id="select-tags-advanced" value="" tabindex="-1">

                                        <option selected value="0">Choose Job</option>
                                        <template x-for="job in jobList" :key="job.id">
                                            <option
                                                x-bind:value="job.id" x-text="job.job_name">
                                            </option>
                                        </template>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Job Prefference Details <span class="form-label-description"
                                x-text="SingleUserPreferenceInfo.partner_job_details.length+'/100'"></span></label>
                        <textarea class="form-control" x-model="SingleUserPreferenceInfo.partner_job_details" name="example-textarea-input"
                            rows="3" placeholder="Content..">
                    </textarea>
                    </div>
                </fieldset>
            </div>
            {{-- row-one col-one end --}}
            {{-- row-one col-two start --}}
            <div class="col-md-6">
                <label class="form-label">Professional Preferences</label>
                <fieldset class="form-fieldset">
                    <div class="mb-3">
                        <div class="form-selectgroup form-selectgroup-pills mb-2">
                            <template x-for="(list,index) in choosedJobCountryList">
                                <div>
                                    <label class="form-selectgroup-item" :key="list.id">
                                        <input type="text" x-bind:id="list.id" class="form-selectgroup-input"
                                            x-on:click="($el)=>deleteJobCountrySelected($el.target.id)">
                                        <span class="form-selectgroup-label">
                                            <span x-text="list.country_name"></span>
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                class="icon icon-tabler icon-tabler-x" width="24" height="24"
                                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                                stroke-linecap="round" stroke-linejoin="round">
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
                        <select type="text" class="form-select" x-on:mouseover="filterJobCountryOnLoad" x-on:change="($el)=>updateJobCountrySeleted($el.target.value)"
                            placeholder="Select a Country preferenecess" id="select-tags-advanced" value="" tabindex="-1">
                            <option selected value="0">Choose Preferred Job Country</option>
                            <template x-for="country in jobCountryList" :key="country.id">
                                <option
                                    x-bind:value="country.id" x-text="country.country_name">
                                </option>
                            </template>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label mb-2">Prefered Salary</label>
                        <label class="form-label">Income : <span x-text="SingleUserPreferenceInfo.partner_salary"></span></label>
                        <input type="range" class="form-range mb-2 noUi-target noUi-ltr noUi-horizontal noUi-txt-dir-ltr mb-2" x-model="SingleUserPreferenceInfo.partner_salary"  min="50000" max="10000000" step="25000">
                    </div>
                </fieldset>
            </div>

            {{-- row-one col-two end --}}
        </div>
        {{-- end-of-row-two --}}
        {{-- star  of row-two-save-button --}}
        <div class="row" x-show="!isLoadingPreferneceInfo">
            <div class="col-md-4 offset-md-8">
                <button x-on:click="updateUserPrefferenceJobInformation" type="button" class="btn btn-dark float-end">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-device-floppy"
                        width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M6 4h10l4 4v10a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2">
                        </path>
                        <circle cx="12" cy="14" r="2"></circle>
                        <polyline points="14 4 14 8 8 8 8 4"></polyline>
                    </svg> Save
                </button>
            </div>
        </div>
        {{-- end  of row-two-save-button --}}

        {{-- start-of-row-three --}}
        <div class="row" x-show="!isLoadingPreferneceInfo">
            {{-- row-two col-one start --}}
            <div class="col-md-6 ">
                <label class="form-label">Religious Preferences</label>
                <fieldset class="form-fieldset">
                    <div class="row" x-show="!isLoadingPreferneceInfo">
                        <div class="col-md-12">
                            <div class="mb-3 px-1">
                                <label class="form-label">Choose Religion </label>
                                <div class="row g-2">
                                    <div class="col-12">
                                        <select class="form-select"
                                            x-on:change="($el)=>loadCasteListByReligion($el.target.value)"
                                            x-model="SingleUserPreferenceInfo.partner_religion">
                                            <option value="0">Choose Religion</option>
                                            <template x-for="relegion in religionList" :key="relegion.id">
                                                <option
                                                    x-bind:selected="relegion.id == SingleUserPreferenceInfo.partner_religion  ? true : false "
                                                    x-bind:value="relegion.id" x-text="relegion.religion_name">
                                                </option>
                                            </template>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row" x-show="!isLoadingPreferneceInfo">
                        <div class="col-md-12">
                            <div class="mb-3 px-1">
                                <label class="form-label">Choose Caste </label>
                                <div class="row g-2">
                                    <div class="col-12">
                                        <select class="form-select" x-model="SingleUserPreferenceInfo.partner_caste">
                                            <option value="0">Choose User Caste</option>
                                            <template x-for="caste in casteList" :key="caste.id">
                                                <template
                                                x-if="caste.caste_religion==SingleUserPreferenceInfo.partner_religion">
                                                    <option
                                                        x-bind:selected="caste.id == SingleUserPreferenceInfo.partner_religion  ? true : false "
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
                </fieldset>
            </div>
            {{-- row-one col-one end --}}
            {{-- row-one col-two start --}}
            <div class="col-md-6">
                <label class="form-label">Religious  Preferences</label>
                <fieldset class="form-fieldset">
                    <div class="row" x-show="!isLoadingPreferneceInfo">
                        <div class="col-md-12">
                            <div class="mb-3 px-1">
                                <div class="form-selectgroup form-selectgroup-pills mb-2">
                                    <template x-for="(list,index) in choosedRasiList">
                                        <div>
                                            <label class="form-selectgroup-item" :key="list.id">
                                                <input type="text" x-bind:id="list.id" class="form-selectgroup-input"
                                                    x-on:click="($el)=>deleteRasiSelected($el.target.id)">
                                                <span class="form-selectgroup-label">
                                                    <span x-text="list.rasi_name"></span>
                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                        class="icon icon-tabler icon-tabler-x" width="24" height="24"
                                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                                        stroke-linecap="round" stroke-linejoin="round">
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
                                <select type="text" class="form-select" x-on:mouseover="filterRasiOnLoad" x-on:change="($el)=>updateRasiSeleted($el.target.value)"
                                    placeholder="Select a Rasi preferenecess" id="select-tags-advanced" value="" tabindex="-1">
                                    <option selected value="0">Choose Preferred Rasi</option>
                                    <template x-for="rasi in rasiList" :key="rasi.id">
                                        <option
                                            x-bind:value="rasi.id" x-text="rasi.rasi_name">
                                        </option>
                                    </template>
                                </select>
                            </div>
                        </div>
                    </div>
                </fieldset>
            </div>
            {{-- row-one col-two end --}}
        </div>
        {{-- end-of-row-three --}}
    </div>
    <div class="card-footer">
        <div class="d-flex justify-content-end">
            <button x-on:click="updateUserPrefferenceReligiousInformation" type="button" class="btn btn-success">
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
