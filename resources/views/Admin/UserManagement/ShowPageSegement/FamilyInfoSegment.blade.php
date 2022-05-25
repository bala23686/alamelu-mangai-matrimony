<div id="tab-top-2" x-data="{
    familyStatusList: [],
    noSiblingsList: [
        { id: 0, no: 0 },
        { id: 1, no: 1 },
        { id: 2, no: 2 },
        { id: 3, no: 3 },
        { id: 4, no: 4 },
        { id: 5, no: 5 },
    ],
    isLoadingFamilyStatus: true,
    isLoadingProcessing: true,
    isSiblingsReached: false,
    errors:{
        user_family_status:''
    },
    SingleUserFamilyInfo: {

        user_father_name: '{{ $singleUserInfo->userBasicInfos->profile_fam_info_status == 1 ? $singleUserInfo->userFamilyInfos->user_father_name : 'Mr.' }}',
        user_father_job_details: '{{ $singleUserInfo->userBasicInfos->profile_fam_info_status == 1 ? $singleUserInfo->userFamilyInfos->user_father_job_details : 'Details About Father Job' }}',
        user_mother_name: '{{ $singleUserInfo->userBasicInfos->profile_fam_info_status == 1 ? $singleUserInfo->userFamilyInfos->user_mother_name : 'Ms.' }}',
        user_mother_job_details: '{{ $singleUserInfo->userBasicInfos->profile_fam_info_status == 1 ? $singleUserInfo->userFamilyInfos->user_mother_job_details : 'Details About Mother Job' }}',
        user_family_status: '{{ $singleUserInfo->userBasicInfos->profile_fam_info_status == 1 ? $singleUserInfo->userFamilyInfos->user_family_status : '-1' }}',
        no_of_sibling: '{{ $singleUserInfo->userBasicInfos->profile_fam_info_status == 1 ? $singleUserInfo->userFamilyInfos->no_of_sibling : '0' }}',
        no_of_brothers: {{ $singleUserInfo->userBasicInfos->profile_fam_info_status == 1 ? $singleUserInfo->userFamilyInfos->no_of_brothers : '0' }},
        no_of_sisters: {{ $singleUserInfo->userBasicInfos->profile_fam_info_status == 1 ? $singleUserInfo->userFamilyInfos->no_of_sisters : '0' }},
        no_of_brothers_married: {{ $singleUserInfo->userBasicInfos->profile_fam_info_status == 1 ? $singleUserInfo->userFamilyInfos->no_of_brothers_married : '0' }},
        no_of_sisters_married: {{ $singleUserInfo->userBasicInfos->profile_fam_info_status == 1 ? $singleUserInfo->userFamilyInfos->no_of_sisters_married : '0' }},
        user_sibling_details: '{{ $singleUserInfo->userBasicInfos->profile_fam_info_status == 1 ? $singleUserInfo->userFamilyInfos->user_sibling_details : 'Details About Siblings' }}',
        paternal_uncle_address: '{{ $singleUserInfo->userBasicInfos->profile_fam_info_status == 1 ? $singleUserInfo->userFamilyInfos->paternal_uncle_address : 'Paternal Uncle Address' }}',

    },
    balanceSiblings:0,
    familyMembersValidation(){

        let membersSelectedTotal=Number(this.SingleUserFamilyInfo.no_of_brothers)+Number(this.SingleUserFamilyInfo.no_of_sisters)

        this.balanceSiblings=Number(this.SingleUserFamilyInfo.no_of_sibling)-membersSelectedTotal+1

    },
    loadFamilyStatusList() {

        axios.get('{{ route('admin.submaster.familystatus.ssr') }}')
            .then((e) => {

                this.familyStatusList = e.data
                this.isLoadingFamilyStatus = false
                this.isLoadingProcessing = false


            })
    },
    updateUserFamilyInformation() {


        let data = {
            user_father_name: this.SingleUserFamilyInfo.user_father_name,
            user_mother_name: this.SingleUserFamilyInfo.user_mother_name,
            user_father_job_details: this.SingleUserFamilyInfo.user_father_job_details,
            user_mother_job_details: this.SingleUserFamilyInfo.user_mother_job_details,
            user_family_status: this.SingleUserFamilyInfo.user_family_status,
            no_of_sibling: this.SingleUserFamilyInfo.no_of_sibling,
            no_of_brothers: this.SingleUserFamilyInfo.no_of_brothers,
            no_of_sisters: this.SingleUserFamilyInfo.no_of_sisters,
            no_of_brothers_married: this.SingleUserFamilyInfo.no_of_brothers_married,
            no_of_sisters_married: this.SingleUserFamilyInfo.no_of_sisters_married,
            user_sibling_details: this.SingleUserFamilyInfo.user_sibling_details,
            paternal_uncle_address: this.SingleUserFamilyInfo.paternal_uncle_address,
        }

        axios.put('{{ route('admin.profile.updateUserFamilyInformation', $singleUserInfo->id) }}', data)
            .then(e => {

                if (e.status == 201) {

                    this.errors.user_family_status=''
                    console.log('from sucees then',e)
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

            }).catch((e)=>{


                Swal.fire({
                    position: 'top-end',
                    icon: 'error',
                    title: `Checkout All The Fields`,
                    showConfirmButton: false,
                    toast: true,
                    timer: 1500
                })

                this.errors.user_family_status=e.errors.user_family_status[0]

            })

    },

}" x-init="familyMembersValidation();loadFamilyStatusList();" class="card tab-pane">
    <div class="card-body">
        <template x-if="isLoadingFamilyStatus">
            <div class="mb-3">
                <label class="form-label">Loading....</label>
                <div class="progress">
                    <div class="progress-bar progress-bar-indeterminate bg-dark"></div>
                </div>
            </div>
        </template>
        <div class="card-title">User Family Information #2</div>
        <div class="" id="demo"></div>
        <div class="row" x-show="!isLoadingFamilyStatus">
            <div class="col-md-5">
                <div class="form-group mb-3 ">
                    <label class="form-label">Father Full Name</label>
                    <div>
                        <input type="text" x-model="SingleUserFamilyInfo.user_father_name" class="form-control"
                            x-bind:class="(SingleUserFamilyInfo.user_father_name == '') ? ' is-invalid is-invalid-lite' : ''"
                            aria-describedby="emailHelp" placeholder="Enter Father Full Name">
                    </div>
                </div>
            </div>
            <div class="col-md-7">
                <div class="mb-3">
                    <label class="form-label">Father Job Details <span class="form-label-description"
                            x-text="SingleUserFamilyInfo.user_father_job_details.length+'/100'"></span></label>
                    <textarea class="form-control"
                        x-bind:class="(SingleUserFamilyInfo.user_father_job_details === '' || SingleUserFamilyInfo
                            .user_father_job_details.length > 100) ? ' is-invalid is-invalid-lite' : ''"
                        x-model="SingleUserFamilyInfo.user_father_job_details" name="example-textarea-input" rows="3"
                        placeholder="Content..">

                        </textarea>
                </div>
            </div>
        </div>
        <div class="row" x-show="!isLoadingFamilyStatus">
            <div class="col-md-5">
                <div class="form-group mb-3 ">
                    <label class="form-label">Mother Full Name</label>
                    <div>
                        <input type="text" x-model="SingleUserFamilyInfo.user_mother_name" class="form-control"
                            x-bind:class="(SingleUserFamilyInfo.user_mother_name === '') ? ' is-invalid is-invalid-lite' : ''"
                            aria-describedby="emailHelp" placeholder="Enter Mother Full Name">
                    </div>
                </div>
            </div>
            <div class="col-md-7">
                <div class="mb-3">
                    <label class="form-label">Mother Job Details <span class="form-label-description"
                            x-text="SingleUserFamilyInfo.user_mother_job_details.length+'/100'"></span></label>
                    <textarea class="form-control"
                        x-bind:class="(SingleUserFamilyInfo.user_mother_job_details === '' || SingleUserFamilyInfo
                            .user_mother_job_details.length > 100) ? ' is-invalid is-invalid-lite' : ''"
                        x-model="SingleUserFamilyInfo.user_mother_job_details" name="example-textarea-input" rows="3"
                        placeholder="Content..">
                        </textarea>
                </div>
            </div>
        </div>
        <div class="row" x-show="!isLoadingFamilyStatus">
            <div class="col-md-5">
                <div class="mb-3 px-1">
                    <label class="form-label">Family Status {{''}} <span x-text="errors.user_family_status"></span></label>
                    <div class="row g-2">
                        <div class="col-12" x-if="(!isLoadingFamilyStatus)">
                            <select class="form-select" x-model="SingleUserFamilyInfo.user_family_status"
                                x-bind:class="(SingleUserFamilyInfo.user_family_status == 0) ? ' is-invalid is-invalid-lite' : ''">
                                <option value="0">Choose Family Status</option>
                                <template x-for="familyStatus in familyStatusList" :key="familyStatus.id">
                                    <option
                                        x-bind:selected="familyStatus.id == SingleUserFamilyInfo.user_family_status ? true : false"
                                        x-bind:value="familyStatus.id" x-text="familyStatus.family_type_name">
                                    </option>
                                </template>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-7">
                <div class="mb-3">
                    <label class="form-label">No Of Siblings</label>
                    <div class="row g-2">
                        <div class="col-12" x-if="(!isLoadingFamilyStatus)">
                            <select class="form-select"
                            x-on:change="familyMembersValidation"
                            x-model="SingleUserFamilyInfo.no_of_sibling"
                                x-bind:class="(SingleUserFamilyInfo.no_of_sibling == -1) ? ' is-invalid is-invalid-lite' : ''">
                                <option value="0">Choose no siblings</option>
                                <template x-for="siblings in noSiblingsList" :key="siblings.id">
                                    <option
                                        x-bind:selected="siblings.id == SingleUserFamilyInfo.no_of_sibling ? true : false"
                                        x-bind:value="siblings.id" x-text="siblings.no+'-Members'">
                                    </option>
                                </template>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <template x-if="SingleUserFamilyInfo.no_of_sibling>0">
            <div class="row" x-show="!isLoadingFamilyStatus">
                <div class="col-md-3">
                    <div class="mb-3 px-1">
                        <label class="form-label required">No of Brothers</label>
                        <div class="row g-2">
                            <div class="col-12" x-if="(!isLoadingFamilyStatus)">
                                <select class="form-select" x-bind:disabled="isSiblingsReached && SingleUserFamilyInfo.no_of_brothers==0 ? true : false" x-on:change="familyMembersValidation" x-model="SingleUserFamilyInfo.no_of_brothers">
                                    <option value="0">Choose No of Brothers</option>
                                    <template x-for="siblings in noSiblingsList" :key="siblings.id">
                                        <template x-if="siblings.id<balanceSiblings || siblings.id==SingleUserFamilyInfo.no_of_brothers">
                                            <option
                                                x-bind:selected="siblings.id == SingleUserFamilyInfo.no_of_brothers ? true : false"
                                                x-bind:value="siblings.id" x-text="siblings.no+'-brothers'">
                                            </option>
                                        </template>
                                    </template>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="mb-3 px-1">
                        <label class="form-label required">No of Sisters</label>
                        <div class="row g-2">
                            <div class="col-12" x-if="(!isLoadingFamilyStatus)">
                                <select class="form-select" x-bind:disabled="isSiblingsReached && SingleUserFamilyInfo.no_of_sisters==0 ? true : false" x-on:change="familyMembersValidation" x-model="SingleUserFamilyInfo.no_of_sisters">
                                    <option value="0">Choose No of Sisters</option>
                                    <template x-for="siblings in noSiblingsList" :key="siblings.id">
                                        <template x-if="siblings.id<balanceSiblings || siblings.id==SingleUserFamilyInfo.no_of_sisters">
                                            <option
                                                x-bind:selected="siblings.id == SingleUserFamilyInfo.no_of_sisters ? true : false"
                                                x-bind:value="siblings.id" x-text="siblings.no+'-Sisters'">
                                            </option>
                                        </template>
                                    </template>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="mb-3 px-1">
                        <label class="form-label">No of Brothers Married &nbsp; (optional)</label>
                        <div class="row g-2">
                            <div class="col-12" x-if="(!isLoadingFamilyStatus)">
                                <select class="form-select" x-bind:disabled="isSiblingsReached && SingleUserFamilyInfo.no_of_brothers_married==0 ? true : false" x-on:change="familyMembersValidation" x-model="SingleUserFamilyInfo.no_of_brothers_married">
                                    <option value="0">Choose Brothers Maried</option>
                                    <template x-for="siblings in noSiblingsList" :key="siblings.id">
                                        <template x-if="siblings.id<=SingleUserFamilyInfo.no_of_brothers">
                                            <option
                                                x-bind:selected="siblings.id == SingleUserFamilyInfo.no_of_brothers_married ? true :
                                                    false"
                                                x-bind:value="siblings.id" x-text="siblings.no+'-Married'">
                                            </option>
                                        </template>
                                    </template>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="mb-3 px-1">
                        <label class="form-label" >No of Sisters Married &nbsp; (optional)</label>
                        <div class="row g-2">
                            <div class="col-12" x-if="(!isLoadingFamilyStatus)">
                                <select class="form-select"  x-on:change="familyMembersValidation" x-model="SingleUserFamilyInfo.no_of_sisters_married">
                                    <option value="0">Choose Sisters Married</option>
                                    <template x-for="siblings in noSiblingsList" :key="siblings.id">
                                        <template x-if="siblings.id<=SingleUserFamilyInfo.no_of_sisters">
                                            <option
                                                x-bind:selected="siblings.id == SingleUserFamilyInfo.no_of_sisters_married ? true : false"
                                                x-bind:value="siblings.id" x-text="siblings.no+'-Married'">
                                            </option>
                                        </template>
                                    </template>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </template>
        <div class="row" x-show="!isLoadingFamilyStatus">
            <div class="col-md-12">
                <div class="mb-3">
                    <label class="form-label">Sibblings Details <span class="form-label-description"
                            x-text="SingleUserFamilyInfo.user_sibling_details.length+'/100'"></span></label>
                    <textarea class="form-control" x-model="SingleUserFamilyInfo.user_sibling_details"
                        x-bind:class="(SingleUserFamilyInfo.user_sibling_details == '' || SingleUserFamilyInfo.user_sibling_details
                            .length > 100) ? ' is-invalid is-invalid-lite' : ''"
                        name="example-textarea-input" rows="3" placeholder="Content..">

                        </textarea>
                </div>
            </div>
        </div>
        <div class="row" x-show="!isLoadingFamilyStatus">
            <div class="col-md-12">
                <div class="mb-3">
                    <label class="form-label">Paternal Uncle Adress <span class="form-label-description"
                            x-text="SingleUserFamilyInfo.paternal_uncle_address.length+'/100'"></span></label>
                    <textarea class="form-control" x-model="SingleUserFamilyInfo.paternal_uncle_address"
                        x-bind:class="(SingleUserFamilyInfo.paternal_uncle_address == '' || SingleUserFamilyInfo.paternal_uncle_address
                            .length > 100) ? ' is-invalid is-invalid-lite' : ''"
                        name="example-textarea-input" rows="3" placeholder="Content..">
                        </textarea>
                </div>
            </div>
        </div>
    </div>
    <div class="card-footer">
        <div class="d-flex justify-content-end">
            <button x-on:click="updateUserFamilyInformation" type="button" class="btn btn-success">
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
