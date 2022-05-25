<div id="tab-top-1" x-data="{
    genderList: [],
    heightList: [],
    languageList: [],
    eatingHabitList: [],
    martialStatusList: [],
    complextionList: [],
    isDiableList: [{ id: 0, is_diable_text: 'No' }, { id: 1, is_diable_text: 'Yes' }],
    isLoadingGender: true,
    isLoadingProcessing: true,
    isLoadingHeight: true,
    isLoadingComplexion: true,
    isLoadingLanguage: true,
    isLoadingEatingHabit: true,
    isLoadingMartialStatus: true,
    SingleUserInfo: {

        userFullname: '{{ $singleUserInfo->userBasicInfos->user_full_name }}',
        user_mobile_no: '{{ $singleUserInfo->userBasicInfos->user_mobile_no!=null ? $singleUserInfo->userBasicInfos->user_mobile_no : null }}',
        dob: '{{ $singleUserInfo->userBasicInfos->dob }}',
        about: '{{ $singleUserInfo->userBasicInfos->about !=null ? $singleUserInfo->userBasicInfos->about : 'Write something about You'  }}',
        age: '{{ $singleUserInfo->userBasicInfos->age!=null ? $singleUserInfo->userBasicInfos->age : '""' }}',
        gender_id: '{{ $singleUserInfo->userBasicInfos->gender_id }}',
        user_height_id: '{{ $singleUserInfo->userBasicInfos->user_height_id }}',
        user_mother_tongue: '{{ $singleUserInfo->userBasicInfos->user_mother_tongue!=null ? $singleUserInfo->userBasicInfos->user_mother_tongue : '""' }}',
        martial_id: '{{ $singleUserInfo->userBasicInfos->martial_id!=null ? $singleUserInfo->userBasicInfos->martial_id : '""' }}',
        user_eating_habit_id: '{{ $singleUserInfo->userBasicInfos->user_eating_habit_id!=null ? $singleUserInfo->userBasicInfos->user_eating_habit_id : '""' }}',
        user_complexion_id: '{{ $singleUserInfo->userBasicInfos->user_complexion_id!=null ? $singleUserInfo->userBasicInfos->user_complexion_id : '""' }}',
        is_disable: '{{ $singleUserInfo->userBasicInfos->is_disable }}',
    },
    loadGenderList() {

        axios.get('{{ route('admin.submaster.gender.ssr') }}')
            .then((e) => {

                this.genderList = e.data
                this.isLoadingGender = false


            })
    },
    loadHeightList() {

        axios.get('{{ route('admin.submaster.height.ssr') }}')
            .then((e) => {

                this.heightList = e.data
                this.isLoadingHeight = false
                this.isLoadingProcessing = false


            })
    },
    loadComplexionList() {

        axios.get('{{ route('admin.submaster.complextion.ssr') }}')
            .then((e) => {

                this.complextionList = e.data
                this.isLoadingComplexion = false


            })
    },
    loadEatingHabitList() {

        axios.get('{{ route('admin.submaster.eatinghabit.ssr') }}')
            .then((e) => {

                this.eatingHabitList = e.data
                this.isLoadingEatingHabit = false


            })
    },
    loadLanguageList() {

        axios.get('{{ route('admin.submaster.language.ssr') }}')
            .then((e) => {

                this.languageList = e.data
                this.isLoadingLanguage = false


            })
    },
    loadMartialStatusList() {

        axios.get('{{ route('admin.submaster.m-status.ssr') }}')
            .then((e) => {

                this.martialStatusList = e.data
                this.isLoadingMartialStatus = false


            })
    },
    updateUserBasicInformation() {

        this.isLoadingProcessing=true
        let data= {

            user_full_name:this.SingleUserInfo.userFullname,
            mobile:this.SingleUserInfo.user_mobile_no,
            age:this.SingleUserInfo.age,
            about:this.SingleUserInfo.about,
            dob:this.SingleUserInfo.dob,
            gender:this.SingleUserInfo.gender_id,
            height:this.SingleUserInfo.user_height_id,
            user_complexion:this.SingleUserInfo.user_complexion_id,
            martial_status:this.SingleUserInfo.martial_id,
            mother_tongue:this.SingleUserInfo.user_mother_tongue,
            eating_habit:this.SingleUserInfo.user_eating_habit_id,
            disability:this.SingleUserInfo.is_disable,
        }



        axios.put('{{ route('admin.profile.updateUserBasicInformation', $singleUserInfo->id)  }}',data)
            .then((e) => {


                if (e.status == 201) {
                    this.isLoadingProcessing=false
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: e.data.message,
                        showConfirmButton: false,
                        toast: true,
                        timer: 1500
                    }).then(() => {


                    })
                }

            })
            .catch((e)=>{
                this.isLoadingProcessing=false
                Swal.fire({
                    position: 'top-end',
                    icon: 'error',
                    title: 'Checkout All Fields Are Filled',
                    showConfirmButton: false,
                    toast: true,
                    timer: 1500
                })
            })
    },

}" x-init="loadComplexionList();
loadEatingHabitList();
loadMartialStatusList();
loadLanguageList();
loadGenderList();
loadHeightList()" class="card tab-pane active show">
    <div class="card-body">
        <template x-if="isLoadingHeight">
            <div class="mb-3">
                <label class="form-label">Loading....</label>
                <div class="progress">
                    <div class="progress-bar progress-bar-indeterminate bg-dark"></div>
                </div>
            </div>
        </template>
        <div class="card-title">User Basic Information #1</div>
        <div class="row" x-show="!isLoadingHeight">
            <div class="col-md-4">
                <div class="form-group mb-3 ">
                    <label class="form-label">User Full Name</label>
                    <div>
                        <input type="text" x-model="SingleUserInfo.userFullname" class="form-control"
                            x-bind:class="(SingleUserInfo.userFullname==='') ? ' is-invalid is-invalid-lite' : ''"
                            aria-describedby="emailHelp" placeholder="Enter User Full Name">
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="mb-3">
                    <label class="form-label">Date Of Birth</label>
                    <input class="form-control mb-2"
                        x-bind:class="(SingleUserInfo.dob==='') ? ' is-invalid is-invalid-lite' : ''"
                        placeholder="Select a date" type="date" id="datepicker-default" x-model="SingleUserInfo.dob">
                </div>
            </div>
            <div class="col-md-4">
                <div class="mb-3">
                    <label class="form-label">Contact Number</label>
                    <input class="form-control mb-2"
                        x-bind:class="(SingleUserInfo.user_mobile_no=='' || isNaN(SingleUserInfo.user_mobile_no) || SingleUserInfo.user_mobile_no.length<10 || SingleUserInfo.user_mobile_no.length>10) ? ' is-invalid is-invalid-lite' : ''"
                        placeholder="Enter User Contact Number" type="text" maxlength="10" id="datepicker-default" x-model="SingleUserInfo.user_mobile_no">
                </div>
            </div>
        </div>
        <div class="row" x-show="!isLoadingHeight">
            <div class="col-md-12">
                <div class="mb-3 px-1" x-if="(!isLoadingGender)">
                    <label class="form-label">About You<span
                        class="form-label-description"
                        x-text="SingleUserInfo.about.length+'/100'"></span></label>
                <textarea class="form-control" x-bind:class="(SingleUserInfo.about==='' || SingleUserInfo.about.length>100) ? ' is-invalid is-invalid-lite' : ''"
                    x-model="SingleUserInfo.about"
                    name="example-textarea-input" rows="3" placeholder="Content..">
                    </textarea>
                </div>
            </div>
        </div>
        <div class="row" x-show="!isLoadingHeight">
            <div class="col-md-4">
                <div class="form-group mb-3 ">
                    <label class="form-label">Age</label>
                    <div>
                        <input type="Number" x-model="SingleUserInfo.age" class="form-control"
                            x-bind:class="(SingleUserInfo.age=='') ? ' is-invalid is-invalid-lite' : ''"
                            aria-describedby="emailHelp" placeholder="Enter Age">
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="mb-3 px-1">
                    <label class="form-label">Gender </label>
                    <div class="row g-2">
                        <div class="col-12" x-if="(!isLoadingGender)">
                            <select class="form-select" x-model="SingleUserInfo.gender_id"
                                x-bind:class="(SingleUserInfo.gender_id==0) ? ' is-invalid is-invalid-lite' : ''">
                                <option value="0">Choose Gender</option>
                                <template x-for="gender in genderList" :key="gender.id">
                                    <option x-bind:selected=" gender.id == SingleUserInfo.gender_id  ? true : false "
                                        x-bind:value="gender.id" x-text="gender.gender_name">
                                    </option>
                                </template>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group mb-3 ">
                    <label class="form-label">Height</label>
                    <div class="row g-2">
                        <div class="col-12" x-if="(!isLoadingHeight)">
                            <select class="form-select" x-model="SingleUserInfo.user_height_id"
                                x-bind:class="(SingleUserInfo.height==0) ? ' is-invalid is-invalid-lite' : ''">
                                <option value="0">Choose Height</option>
                                <template x-for="height in heightList" :key="height.id">
                                    <option x-bind:selected="height.id == SingleUserInfo.user_height_id  ? true : false "
                                        x-bind:value="height.id" x-text="height.height_feet_cm">
                                    </option>
                                </template>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row" x-show="!isLoadingHeight">
            <div class="col-md-4">
                <div class="mb-3 px-1">
                    <label class="form-label">Lanuage</label>
                    <div class="row g-2">
                        <div class="col-12" x-if="(!isLoadingLanguage)">
                            <select class="form-select" x-model="SingleUserInfo.user_mother_tongue"
                                x-bind:class="(SingleUserInfo.user_mother_tongue==0) ? ' is-invalid is-invalid-lite' : ''">
                                <option value="0">Choose Lanuage</option>
                                <template x-for="language in languageList" :key="language.id">
                                    <option
                                        x-bind:selected="language.id == SingleUserInfo.user_mother_tongue  ? true : false "
                                        x-bind:value="language.id" x-text="language.language_name">
                                    </option>
                                </template>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group mb-3 ">
                    <label class="form-label">Martial Status</label>
                    <div class="row g-2">
                        <div class="col-12" x-if="(!isLoadingMartialStatus)">
                            <select class="form-select" x-model="SingleUserInfo.martial_id"
                                x-bind:class="(SingleUserInfo.martial_id==0) ? ' is-invalid is-invalid-lite' : ''">
                                <option value="0">Choose Martial Status</option>
                                <template x-for="mstatus in martialStatusList" :key="mstatus.id">
                                    <option x-bind:selected="mstatus.id == SingleUserInfo.martial_id  ? true : false "
                                        x-bind:value="mstatus.id" x-text="mstatus.martial_status_name">
                                    </option>
                                </template>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="mb-3 px-1">
                    <label class="form-label">Eating Habit</label>
                    <div class="row g-2">
                        <div class="col-12" x-if="(!isLoadingEatingHabit)">
                            <select class="form-select" x-model="SingleUserInfo.user_eating_habit_id"
                                x-bind:class="(SingleUserInfo.user_eating_habit_id==0) ? ' is-invalid is-invalid-lite' : ''">
                                <option value="0">Choose The Eating Habit</option>
                                <template x-for="habit in eatingHabitList" :key="habit.id">
                                    <option
                                        x-bind:selected="habit.id == SingleUserInfo.user_eating_habit_id  ? true : false "
                                        x-bind:value="habit.id" x-text="habit.habit_type_name">
                                    </option>
                                </template>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row" x-show="!isLoadingHeight">
            <div class="col-md-6">
                <div class="form-group mb-3 ">
                    <label class="form-label">Complexion Status</label>
                    <div class="row g-2">
                        <div class="col-12" x-if="(!isLoadingComplexion)">
                            <select class="form-select" x-model="SingleUserInfo.user_complexion_id"
                                x-bind:class="(SingleUserInfo.user_complexion_id==0) ? ' is-invalid is-invalid-lite' : ''">
                                <option value="0">Choose Complexion</option>
                                <template x-for="complextion in complextionList" :key="complextion.id">
                                    <option
                                        x-bind:selected="complextion.id == SingleUserInfo.user_complexion_id  ? true : false "
                                        x-bind:value="complextion.id" x-text="complextion.complexion_name">
                                    </option>
                                </template>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3 px-1">
                    <label class="form-label">Is-Disabled</label>
                    <div class="row g-2">
                        <div class="col-12" x-if="(!isLoadingComplexion)">
                            <select class="form-select" x-model="SingleUserInfo.is_disable"
                                x-bind:class="(SingleUserInfo.is_disable==2) ? ' is-invalid is-invalid-lite' : ''">
                                <option value="2">Choose Is-Disable</option>
                                <template x-for="diable in isDiableList" :key="diable.id">
                                    <option x-bind:selected="diable.id == SingleUserInfo.is_disable  ? true : false "
                                        x-bind:value="diable.id" x-text="diable.is_diable_text">
                                    </option>
                                </template>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card-footer">
        <div class="d-flex justify-content-end">
            <button x-on:click="updateUserBasicInformation" type="button" class="btn btn-success">
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
