<div id="tab-top-1" x-data="{
    genderList: [],
    bloodList: [],
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
    isUploadingMedicalCertificate: false,
    isUploadingTenthCertificate: false,
    isUploadingTwelthCertificate: false,
    isUploadingClgTc: false,
    isUploadingAdharCard: false,
    userMedicalCertificateFile: '',
    userTenthCertificateFile: '',
    userTwelthCertificateFile: '',
    userClgTcFile: '',
    userAdharCardFile: '',
    SingleUserInfo: {

        userFullname: '{{ $singleUserInfo->userBasicInfos->user_full_name }}',
        user_mobile_no: '{{ $singleUserInfo->userBasicInfos->user_mobile_no != null ? $singleUserInfo->userBasicInfos->user_mobile_no : null }}',
        dob: '{{ $singleUserInfo->userBasicInfos->dob }}',
        about: '{{ $singleUserInfo->userBasicInfos->about != null ? $singleUserInfo->userBasicInfos->about : 'Write something about You' }}',
        user_address: '{{ $singleUserInfo->userBasicInfos->user_address != null ? $singleUserInfo->userBasicInfos->user_address : 'User Address' }}',
        age: '{{ $singleUserInfo->userBasicInfos->age != null ? $singleUserInfo->userBasicInfos->age : '""' }}',
        gender_id: '{{ $singleUserInfo->userBasicInfos->gender_id }}',
        blood_group: '{{ $singleUserInfo->userBasicInfos->blood_group }}',
        is_tenth_passed: '{{ $singleUserInfo->userBasicInfos->is_tenth_passed }}',
        adhard_card_no: '{{ $singleUserInfo->userBasicInfos->adhard_card_no }}',
        adhard_card_image: '{{ $singleUserInfo->userBasicInfos->adhard_card_image }}',
        adhard_card_image_is_uploaded: '{{ $singleUserInfo->userBasicInfos->adhard_card_image_is_uploaded }}',
        medical_certificate: '{{ $singleUserInfo->userBasicInfos->medical_certificate }}',
        user_height_id: '{{ $singleUserInfo->userBasicInfos->user_height_id }}',
        user_mother_tongue: '{{ $singleUserInfo->userBasicInfos->user_mother_tongue != null ? $singleUserInfo->userBasicInfos->user_mother_tongue : '""' }}',
        martial_id: '{{ $singleUserInfo->userBasicInfos->martial_id != null ? $singleUserInfo->userBasicInfos->martial_id : '""' }}',
        user_eating_habit_id: '{{ $singleUserInfo->userBasicInfos->user_eating_habit_id != null ? $singleUserInfo->userBasicInfos->user_eating_habit_id : '""' }}',
        user_complexion_id: '{{ $singleUserInfo->userBasicInfos->user_complexion_id != null ? $singleUserInfo->userBasicInfos->user_complexion_id : '""' }}',
        is_disable: '{{ $singleUserInfo->userBasicInfos->is_disable }}',
    },
    SingleUserInfoFiles: {
        medical_certificate: '{{ $singleUserInfo->userBasicInfos->medicalCertificateWithPath }}',
        tenth_marksheet: '{{ $singleUserInfo->userBasicInfos->tenthCertificateWithPath }}',
        twelth_marksheet: '{{ $singleUserInfo->userBasicInfos->twelthCertificateWithPath }}',
        clg_tc: '{{ $singleUserInfo->userBasicInfos->collegeTcWithPath }}',
        adharCard: '{{ $singleUserInfo->userBasicInfos->adharImageWithPath }}',
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
    loadBloodList() {

        axios.get('{{ route('admin.submaster.blood.ssr') }}')
            .then((e) => {

                this.bloodList = e.data


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

        this.isLoadingProcessing = true
        let data = {

            user_full_name: this.SingleUserInfo.userFullname,
            mobile: this.SingleUserInfo.user_mobile_no,
            age: this.SingleUserInfo.age,
            about: this.SingleUserInfo.about,
            user_address: this.SingleUserInfo.user_address,
            blood_group: this.SingleUserInfo.blood_group,
            dob: this.SingleUserInfo.dob,
            gender: this.SingleUserInfo.gender_id,
            is_tenth_passed: this.SingleUserInfo.is_tenth_passed,
            height: this.SingleUserInfo.user_height_id,
            user_complexion: this.SingleUserInfo.user_complexion_id,
            martial_status: this.SingleUserInfo.martial_id,
            mother_tongue: this.SingleUserInfo.user_mother_tongue,
            eating_habit: this.SingleUserInfo.user_eating_habit_id,
            disability: this.SingleUserInfo.is_disable,
        }



        axios.put('{{ route('admin.profile.updateUserBasicInformation', $singleUserInfo->id) }}', data)
            .then((e) => {


                if (e.status == 201) {
                    this.isLoadingProcessing = false
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
            .catch((e) => {
                this.isLoadingProcessing = false
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

    fileChosenAdharCard($el) {
        this.userAdharCardFile = $el.target.files[0]

    },
    fileChosenMedicalCertificate($el) {
        this.userMedicalCertificateFile = $el.target.files[0]

    },
    fileChosenTenthCertificate($el) {
        this.userTenthCertificateFile = $el.target.files[0]
    },
    fileChosenTwelthCertificate($el) {
        this.userTenthCertificateFile = $el.target.files[0]
    },
    fileChosenClgTc($el) {
        this.userClgTcFile = $el.target.files[0]
    },
    updateUserClgTc() {
        this.isUploadingClgTc = true
        let data = new FormData()

        data.append('clg_tc', this.userClgTcFile)

        axios.post('{{ route('admin.profile.uploadCollegeTc', $singleUserInfo->id) }}', data)
            .then((e) => {


                if (e.status == 201) {
                    this.isUploadingClgTc = false
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
            .catch((e) => {
                this.isUploadingClgTc = false
                Swal.fire({
                    position: 'top-end',
                    icon: 'error',
                    title: 'Upload Failed',
                    showConfirmButton: false,
                    toast: true,
                    timer: 1500
                })
            })
    },
    updateUserAdharCard() {
        this.isUploadingAdharCard = true
        let data = new FormData()
        data.append('userAdharCardNo', this.SingleUserInfo.adhard_card_no)
        data.append('userAdharCard', this.userAdharCardFile)


        axios.post('{{ route('admin.profile.adharCardUpload', $singleUserInfo->id) }}', data)
            .then((e) => {


                if (e.status == 201) {
                    this.isUploadingAdharCard = false
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
            .catch((e) => {
                this.isUploadingAdharCard = false
                Swal.fire({
                    position: 'top-end',
                    icon: 'error',
                    title: 'Upload Failed',
                    showConfirmButton: false,
                    toast: true,
                    timer: 1500
                })
            })
    },
    updateUserTwelthCertificate() {
        this.isUploadingTwelthCertificate = true
        let data = new FormData()

        data.append('twelth_certificate', this.userTenthCertificateFile)

        axios.post('{{ route('admin.profile.uploadTwelthCertificate', $singleUserInfo->id) }}', data)
            .then((e) => {


                if (e.status == 201) {
                    this.isUploadingTwelthCertificate = false
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
            .catch((e) => {
                this.isUploadingTwelthCertificate = false
                Swal.fire({
                    position: 'top-end',
                    icon: 'error',
                    title: 'Upload Failed',
                    showConfirmButton: false,
                    toast: true,
                    timer: 1500
                })
            })
    },
    updateUserTenthCertificate() {
        this.isUploadingTenthCertificate = true
        let data = new FormData()

        data.append('tenth_certificate', this.userTenthCertificateFile)

        axios.post('{{ route('admin.profile.uploadTenthCertificate', $singleUserInfo->id) }}', data)
            .then((e) => {


                if (e.status == 201) {
                    this.isUploadingTenthCertificate = false
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
            .catch((e) => {
                this.isUploadingTenthCertificate = false
                Swal.fire({
                    position: 'top-end',
                    icon: 'error',
                    title: 'Upload Failed',
                    showConfirmButton: false,
                    toast: true,
                    timer: 1500
                })
            })
    },
    updateUserMedicalCertificate() {
        this.isUploadingMedicalCertificate = true
        let data = new FormData()

        data.append('medical_certificate', this.userMedicalCertificateFile)

        axios.post('{{ route('admin.profile.uploadMedicalCertificate', $singleUserInfo->id) }}', data)
            .then((e) => {


                if (e.status == 201) {
                    this.isUploadingMedicalCertificate = false
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
            .catch((e) => {
                this.isUploadingMedicalCertificate = false
                Swal.fire({
                    position: 'top-end',
                    icon: 'error',
                    title: 'Upload Failed',
                    showConfirmButton: false,
                    toast: true,
                    timer: 1500
                })
            })
    }


}" x-init="loadComplexionList();
loadBloodList();
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
                            x-bind:class="(SingleUserInfo.userFullname === '') ? ' is-invalid is-invalid-lite' : ''"
                            aria-describedby="emailHelp" placeholder="Enter User Full Name">
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="mb-3">
                    <label class="form-label">Date Of Birth</label>
                    <input class="form-control mb-2"
                        x-bind:class="(SingleUserInfo.dob === '') ? ' is-invalid is-invalid-lite' : ''"
                        placeholder="Select a date" type="date" id="datepicker-default" x-model="SingleUserInfo.dob">
                </div>
            </div>
            <div class="col-md-4">
                <div class="mb-3">
                    <label class="form-label">Contact Number</label>
                    <input class="form-control mb-2"
                        x-bind:class="(SingleUserInfo.user_mobile_no == '' || isNaN(SingleUserInfo.user_mobile_no) || SingleUserInfo
                            .user_mobile_no.length < 10 || SingleUserInfo.user_mobile_no.length > 10) ?
                        ' is-invalid is-invalid-lite' : ''"
                        placeholder="Enter User Contact Number" type="text" maxlength="10" id="datepicker-default"
                        x-model="SingleUserInfo.user_mobile_no">
                </div>
            </div>
        </div>
        <div class="row" x-show="!isLoadingHeight">
            <div class="col-md-6">
                <div class="mb-3 px-1" x-if="(!isLoadingGender)">
                    <label class="form-label">About You<span class="form-label-description"
                            x-text="SingleUserInfo.about.length+'/100'"></span></label>
                    <textarea class="form-control"
                        x-bind:class="(SingleUserInfo.about === '' || SingleUserInfo.about.length > 100) ?
                        ' is-invalid is-invalid-lite' : ''"
                        x-model="SingleUserInfo.about" name="example-textarea-input" rows="3" placeholder="Content..">
                    </textarea>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3 px-1" x-if="(!isLoadingGender)">
                    <label class="form-label">Address<span class="form-label-description"
                            x-text="SingleUserInfo.user_address.length+'/100'"></span></label>
                    <textarea class="form-control"
                        x-bind:class="(SingleUserInfo.user_address === '' || SingleUserInfo.user_address.length > 100 || /(?:(?:\+?1\s*(?:[.-]\s*)?)?(?:(\s*([2-9]1[02-9]|[2-9][02-8]1|[2-9][02-8][02-9])\s*)|([2-9]1[02-9]|[2-9][02-8]1|[2-9][02-8][02-9]))\s*(?:[.-]\s*)?)([2-9]1[02-9]|[2-9][02-9]1|[2-9][02-9]{2})\s*(?:[.-]\s*)?([0-9]{4})/g.test(SingleUserInfo.user_address)) ?
                        ' is-invalid is-invalid-lite' : ''"
                        x-model="SingleUserInfo.user_address" name="example-textarea-input" rows="3" placeholder="Content..">
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
                            x-bind:class="(SingleUserInfo.age == '') ? ' is-invalid is-invalid-lite' : ''"
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
                                x-bind:class="(SingleUserInfo.gender_id == 0) ? ' is-invalid is-invalid-lite' : ''">
                                <option value="0">Choose Gender</option>
                                <template x-for="gender in genderList" :key="gender.id">
                                    <option x-bind:selected=" gender.id == SingleUserInfo.gender_id ? true : false"
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
                                x-bind:class="(SingleUserInfo.height == 0) ? ' is-invalid is-invalid-lite' : ''">
                                <option value="0">Choose Height</option>
                                <template x-for="height in heightList" :key="height.id">
                                    <option x-bind:selected="height.id == SingleUserInfo.user_height_id ? true : false"
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
                                x-bind:class="(SingleUserInfo.user_mother_tongue == 0) ? ' is-invalid is-invalid-lite' : ''">
                                <option value="0">Choose Lanuage</option>
                                <template x-for="language in languageList" :key="language.id">
                                    <option
                                        x-bind:selected="language.id == SingleUserInfo.user_mother_tongue ? true : false"
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
                                x-bind:class="(SingleUserInfo.martial_id == 0) ? ' is-invalid is-invalid-lite' : ''">
                                <option value="0">Choose Martial Status</option>
                                <template x-for="mstatus in martialStatusList" :key="mstatus.id">
                                    <option x-bind:selected="mstatus.id == SingleUserInfo.martial_id ? true : false"
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
                                x-bind:class="(SingleUserInfo.user_eating_habit_id == 0) ? ' is-invalid is-invalid-lite' : ''">
                                <option value="0">Choose The Eating Habit</option>
                                <template x-for="habit in eatingHabitList" :key="habit.id">
                                    <option
                                        x-bind:selected="habit.id == SingleUserInfo.user_eating_habit_id ? true : false"
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
            <div class="col-md-4">
                <div class="form-group mb-3 ">
                    <label class="form-label">Complexion Status</label>
                    <div class="row g-2">
                        <div class="col-12" x-if="(!isLoadingComplexion)">
                            <select class="form-select" x-model="SingleUserInfo.user_complexion_id"
                                x-bind:class="(SingleUserInfo.user_complexion_id == 0) ? ' is-invalid is-invalid-lite' : ''">
                                <option value="0">Choose Complexion</option>
                                <template x-for="complextion in complextionList" :key="complextion.id">
                                    <option
                                        x-bind:selected="complextion.id == SingleUserInfo.user_complexion_id ? true : false"
                                        x-bind:value="complextion.id" x-text="complextion.complexion_name">
                                    </option>
                                </template>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <div class="mb-3 px-1">
                    <label class="form-label">Is-Disabled</label>
                    <div class="row g-2">
                        <div class="col-12" x-if="(!isLoadingComplexion)">
                            <select class="form-select" x-model="SingleUserInfo.is_disable"
                                x-bind:class="(SingleUserInfo.is_disable == 2) ? ' is-invalid is-invalid-lite' : ''">
                                <option value="2">Choose Is-Disable</option>
                                <template x-for="diable in isDiableList" :key="diable.id">
                                    <option x-bind:selected="diable.id == SingleUserInfo.is_disable ? true : false"
                                        x-bind:value="diable.id" x-text="diable.is_diable_text">
                                    </option>
                                </template>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="mb-3 px-1">
                    <label class="form-label">Blood Group</label>
                    <div class="row g-2">
                        <div class="col-12" x-if="(!isLoadingComplexion)">
                            <select class="form-select" x-model="SingleUserInfo.blood_group"
                                x-bind:class="(SingleUserInfo.blood_groupn == 0) ? ' is-invalid is-invalid-lite' : ''">
                                <option value="0">Choose Blood Group</option>
                                <template x-for="blood in bloodList" :key="blood.id">
                                    <option x-bind:selected="blood.id == SingleUserInfo.blood_group ? true : false"
                                        x-bind:value="blood.id" x-text="blood.blood">
                                    </option>
                                </template>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <div class="mb-3 px-1">
                    <label class="form-label">Is 10th Passed</label>
                    <div class="row g-2">
                        <div class="col-12" x-if="(!isLoadingComplexion)">
                            <select class="form-select" x-model="SingleUserInfo.is_tenth_passed"
                                x-bind:class="(SingleUserInfo.is_tenth_passed == 2) ? ' is-invalid is-invalid-lite' : ''">
                                <option value="2">Choose Passed</option>
                                <option value="1">Yes</option>
                                <option value="0">No</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <template x-if="SingleUserInfo.is_tenth_passed==1">
            <div class="row" x-show="!isLoadingHeight">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label">Medical Certificate </label>
                        <div class="input-group">
                            <input type="file" class="form-control"
                                x-on:change="($el)=>fileChosenMedicalCertificate($el)" accept=".jpeg,jpg">
                            <button x-on:click="updateUserMedicalCertificate" type="button" class="btn btn-dark">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="icon icon-tabler icon-tabler-cloud-upload" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <desc>Download more icon variants from https://tabler-icons.io/i/cloud-upload</desc>
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M7 18a4.6 4.4 0 0 1 0 -9a5 4.5 0 0 1 11 2h1a3.5 3.5 0 0 1 0 7h-1"></path>
                                    <polyline points="9 15 12 12 15 15"></polyline>
                                    <line x1="12" y1="12" x2="12" y2="21"></line>
                                </svg>
                                <template x-if="!isUploadingMedicalCertificate">
                                    <span>upload</span>
                                </template>
                                <template x-if="isUploadingMedicalCertificate">
                                    <span>uploading......</span>
                                </template>
                            </button>
                            <a x-bind:href="SingleUserInfoFiles.medical_certificate" target="_blank"
                                class="btn btn-success">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-aperture"
                                    width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                    fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <desc>Download more icon variants from https://tabler-icons.io/i/aperture</desc>
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <circle cx="12" cy="12" r="9"></circle>
                                    <line x1="3.6" y1="15" x2="14.15" y2="15"></line>
                                    <line x1="3.6" y1="15" x2="14.15" y2="15" transform="rotate(72 12 12)"></line>
                                    <line x1="3.6" y1="15" x2="14.15" y2="15" transform="rotate(144 12 12)"></line>
                                    <line x1="3.6" y1="15" x2="14.15" y2="15" transform="rotate(216 12 12)"></line>
                                    <line x1="3.6" y1="15" x2="14.15" y2="15" transform="rotate(288 12 12)"></line>
                                </svg>View</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label">10(th) Certificate</label>
                        <div class="input-group">
                            <input type="file" class="form-control"
                                x-on:change="($el)=>fileChosenTenthCertificate($el)" accept=".jpeg,jpg">
                            <button x-on:click="updateUserTenthCertificate" type="button" class="btn btn-dark">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="icon icon-tabler icon-tabler-cloud-upload" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <desc>Download more icon variants from https://tabler-icons.io/i/cloud-upload</desc>
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M7 18a4.6 4.4 0 0 1 0 -9a5 4.5 0 0 1 11 2h1a3.5 3.5 0 0 1 0 7h-1"></path>
                                    <polyline points="9 15 12 12 15 15"></polyline>
                                    <line x1="12" y1="12" x2="12" y2="21"></line>
                                </svg>

                                <template x-if="!isUploadingTenthCertificate">
                                    <span>upload</span>
                                </template>
                                <template x-if="isUploadingTenthCertificate">
                                    <span>uploading..</span>
                                </template>
                            </button>
                            <a x-bind:href="SingleUserInfoFiles.tenth_marksheet" target="_blank"
                                class="btn btn-success">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-aperture"
                                    width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                    fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <desc>Download more icon variants from https://tabler-icons.io/i/aperture</desc>
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <circle cx="12" cy="12" r="9"></circle>
                                    <line x1="3.6" y1="15" x2="14.15" y2="15"></line>
                                    <line x1="3.6" y1="15" x2="14.15" y2="15" transform="rotate(72 12 12)"></line>
                                    <line x1="3.6" y1="15" x2="14.15" y2="15" transform="rotate(144 12 12)"></line>
                                    <line x1="3.6" y1="15" x2="14.15" y2="15" transform="rotate(216 12 12)"></line>
                                    <line x1="3.6" y1="15" x2="14.15" y2="15" transform="rotate(288 12 12)"></line>
                                </svg>View</a>
                        </div>
                    </div>
                </div>
            </div>
        </template>
        <template x-if="SingleUserInfo.is_tenth_passed==1">
            <div class="row" x-show="!isLoadingHeight">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label">12(th) Certificate</label>
                        <div class="input-group">
                            <input type="file" class="form-control"
                                x-on:change="($el)=>fileChosenTwelthCertificate($el)" accept=".jpeg,jpg">
                            <button x-on:click="updateUserTwelthCertificate" type="button" class="btn btn-dark">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="icon icon-tabler icon-tabler-cloud-upload" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <desc>Download more icon variants from https://tabler-icons.io/i/cloud-upload</desc>
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M7 18a4.6 4.4 0 0 1 0 -9a5 4.5 0 0 1 11 2h1a3.5 3.5 0 0 1 0 7h-1"></path>
                                    <polyline points="9 15 12 12 15 15"></polyline>
                                    <line x1="12" y1="12" x2="12" y2="21"></line>
                                </svg>
                                <template x-if="!isUploadingTwelthCertificate">
                                    <span>upload</span>
                                </template>
                                <template x-if="isUploadingTwelthCertificate">
                                    <span>uploading......</span>
                                </template>
                            </button>
                            <a x-bind:href="SingleUserInfoFiles.twelth_marksheet" target="_blank"
                                class="btn btn-success">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-aperture"
                                    width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                    fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <desc>Download more icon variants from https://tabler-icons.io/i/aperture</desc>
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <circle cx="12" cy="12" r="9"></circle>
                                    <line x1="3.6" y1="15" x2="14.15" y2="15"></line>
                                    <line x1="3.6" y1="15" x2="14.15" y2="15" transform="rotate(72 12 12)"></line>
                                    <line x1="3.6" y1="15" x2="14.15" y2="15" transform="rotate(144 12 12)"></line>
                                    <line x1="3.6" y1="15" x2="14.15" y2="15" transform="rotate(216 12 12)"></line>
                                    <line x1="3.6" y1="15" x2="14.15" y2="15" transform="rotate(288 12 12)"></line>
                                </svg>View</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label">College TC</label>
                        <div class="input-group">
                            <input type="file" class="form-control" x-on:change="($el)=>fileChosenClgTc($el)"
                                accept=".jpeg,jpg">
                            <button x-on:click="updateUserClgTc" type="button" class="btn btn-dark">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="icon icon-tabler icon-tabler-cloud-upload" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <desc>Download more icon variants from https://tabler-icons.io/i/cloud-upload</desc>
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M7 18a4.6 4.4 0 0 1 0 -9a5 4.5 0 0 1 11 2h1a3.5 3.5 0 0 1 0 7h-1"></path>
                                    <polyline points="9 15 12 12 15 15"></polyline>
                                    <line x1="12" y1="12" x2="12" y2="21"></line>
                                </svg>
                                <template x-if="!isUploadingClgTc">
                                    <span>upload</span>
                                </template>
                                <template x-if="isUploadingClgTc">
                                    <span>uploading......</span>
                                </template>
                            </button>
                            <a x-bind:href="SingleUserInfoFiles.clg_tc" target="_blank" class="btn btn-success">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-aperture"
                                    width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                    fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <desc>Download more icon variants from https://tabler-icons.io/i/aperture</desc>
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <circle cx="12" cy="12" r="9"></circle>
                                    <line x1="3.6" y1="15" x2="14.15" y2="15"></line>
                                    <line x1="3.6" y1="15" x2="14.15" y2="15" transform="rotate(72 12 12)"></line>
                                    <line x1="3.6" y1="15" x2="14.15" y2="15" transform="rotate(144 12 12)"></line>
                                    <line x1="3.6" y1="15" x2="14.15" y2="15" transform="rotate(216 12 12)"></line>
                                    <line x1="3.6" y1="15" x2="14.15" y2="15" transform="rotate(288 12 12)"></line>
                                </svg>View</a>
                        </div>
                    </div>
                </div>
            </div>
        </template>
        <template x-if="SingleUserInfo.is_tenth_passed==1">
            <div class="row" x-show="!isLoadingHeight">
                <div class="col-md-6">
                    <div class="form-group mb-3 ">


                        <label class="form-label">Adhar Card No</label>
                        <div>
                            <input type="text" x-model="SingleUserInfo.adhard_card_no" class="form-control"
                                x-bind:class="(SingleUserInfo.adhard_card_no == '' || isNaN(SingleUserInfo.adhard_card_no) ) ? ' is-invalid is-invalid-lite' : ''"
                                maxlength="14"  aria-describedby="emailHelp" placeholder="Enter Adhar Card Number">
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label">Adhar Card Image</label>
                        <div class="input-group">
                            <input type="file" class="form-control"
                                x-on:change="($el)=>fileChosenAdharCard($el)" accept=".jpeg,jpg">
                            <button x-on:click="updateUserAdharCard" type="button" class="btn btn-dark">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="icon icon-tabler icon-tabler-cloud-upload" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <desc>Download more icon variants from https://tabler-icons.io/i/cloud-upload</desc>
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M7 18a4.6 4.4 0 0 1 0 -9a5 4.5 0 0 1 11 2h1a3.5 3.5 0 0 1 0 7h-1"></path>
                                    <polyline points="9 15 12 12 15 15"></polyline>
                                    <line x1="12" y1="12" x2="12" y2="21"></line>
                                </svg>
                                <template x-if="!isUploadingAdharCard">
                                    <span>Save & Upload</span>
                                </template>
                                <template x-if="isUploadingAdharCard">
                                    <span>uploading......</span>
                                </template>
                            </button>
                            <a x-bind:href="SingleUserInfoFiles.adharCard" target="_blank"
                                class="btn btn-success">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-aperture"
                                    width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                    fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <desc>Download more icon variants from https://tabler-icons.io/i/aperture</desc>
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <circle cx="12" cy="12" r="9"></circle>
                                    <line x1="3.6" y1="15" x2="14.15" y2="15"></line>
                                    <line x1="3.6" y1="15" x2="14.15" y2="15" transform="rotate(72 12 12)"></line>
                                    <line x1="3.6" y1="15" x2="14.15" y2="15" transform="rotate(144 12 12)"></line>
                                    <line x1="3.6" y1="15" x2="14.15" y2="15" transform="rotate(216 12 12)"></line>
                                    <line x1="3.6" y1="15" x2="14.15" y2="15" transform="rotate(288 12 12)"></line>
                                </svg>View</a>
                        </div>
                    </div>
                </div>


            </div>
        </template>
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
