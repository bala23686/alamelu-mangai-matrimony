<div id="tab-top-3" x-data="{
    horoscopeList: [],
    horoscopeListView: [],
    horoscopeListNavamsam: [],
    userJathakamImage: '',
    userJathakamImageChoosed: '',
    isLoadingHoroscope: true,
    isLoadingProcessing: true,
    userChangeRasiKatam: false,
    userChangeNavaamsamKatam: false,
    fileChosen($el) {

        let file = $el.target.files[0]
        this.userJathakamImage = file
        reader = new FileReader()

        reader.readAsDataURL(file)
        reader.onload = (e) => {
            this.userJathakamImageChoosed = e.target.result
            this.userProfileInfo.profileImageChanged = true
        }
    },
    rasiKatam: {
        row_1: {
            col_1: {
                dOpen: false,
                valueChoosed: [],
                valueChoosedId: [],
            },
            col_2: {
                dOpen: false,
                valueChoosed: [],
                valueChoosedId: [],
            },
            col_3: {
                dOpen: false,
                valueChoosed: [],
                valueChoosedId: [],
            },
            col_4: {
                dOpen: false,
                valueChoosed: [],
                valueChoosedId: [],
            },
        },
        row_2: {
            col_1: {
                dOpen: false,
                valueChoosed: [],
                valueChoosedId: [],
            },
            col_4: {
                dOpen: false,
                valueChoosed: [],
                valueChoosedId: [],
            },
        },
        row_3: {
            col_1: {
                dOpen: false,
                valueChoosed: [],
                valueChoosedId: [],
            },
            col_4: {
                dOpen: false,
                valueChoosed: [],
                valueChoosedId: [],
            },
        },
        row_4: {
            col_1: {
                dOpen: false,
                valueChoosed: [],
                valueChoosedId: [],
            },
            col_2: {
                dOpen: false,
                valueChoosed: [],
                valueChoosedId: [],
            },
            col_3: {
                dOpen: false,
                valueChoosed: [],
                valueChoosedId: [],
            },
            col_4: {
                dOpen: false,
                valueChoosed: [],
                valueChoosedId: [],
            },
        },
    },
    navamsamKatam: {
        row_1: {
            col_1: {
                dOpen: false,
                valueChoosed: [],
                valueChoosedId: [],
            },
            col_2: {
                dOpen: false,
                valueChoosed: [],
                valueChoosedId: [],
            },
            col_3: {
                dOpen: false,
                valueChoosed: [],
                valueChoosedId: [],
            },
            col_4: {
                dOpen: false,
                valueChoosed: [],
                valueChoosedId: [],
            },
        },
        row_2: {
            col_1: {
                dOpen: false,
                valueChoosed: [],
                valueChoosedId: [],
            },
            col_4: {
                dOpen: false,
                valueChoosed: [],
                valueChoosedId: [],
            },
        },
        row_3: {
            col_1: {
                dOpen: false,
                valueChoosed: [],
                valueChoosedId: [],
            },
            col_4: {
                dOpen: false,
                valueChoosed: [],
                valueChoosedId: [],
            },
        },
        row_4: {
            col_1: {
                dOpen: false,
                valueChoosed: [],
                valueChoosedId: [],
            },
            col_2: {
                dOpen: false,
                valueChoosed: [],
                valueChoosedId: [],
            },
            col_3: {
                dOpen: false,
                valueChoosed: [],
                valueChoosedId: [],
            },
            col_4: {
                dOpen: false,
                valueChoosed: [],
                valueChoosedId: [],
            },
        },
    },
    SingleUserHoroscopeImageInfo: {

        user_jathakam_image_is_uploaded: '{{ $singleUserInfo->userBasicInfos->profile_jakt_info_status == 1? $singleUserInfo->userHoroScopeInfo->user_jathakam_image_is_uploaded: 0 }}',
        user_jathakam_image: '{{ $singleUserInfo->userBasicInfos->profile_jakt_info_status == 1? $singleUserInfo->userHoroScopeInfo->jathakamFullImagePath: 0 }}',

    },
    SingleUserHoroscopeRasiKatamInfo: {

        user_jathakam_rasi_katam_is_filled: '{{ $singleUserInfo->userBasicInfos->profile_jakt_info_status == 1? $singleUserInfo->userHoroScopeInfo->user_jathakam_rasi_katam_is_filled: 0 }}',
        rasi_katam_row_1_col_1: {{ $singleUserInfo->userBasicInfos->profile_jakt_info_status == 1? $singleUserInfo->userHoroScopeInfo->rasi_katam_row_1_col_1: "''" }},
        rasi_katam_row_1_col_2: {{ $singleUserInfo->userBasicInfos->profile_jakt_info_status == 1? $singleUserInfo->userHoroScopeInfo->rasi_katam_row_1_col_2: "''" }},
        rasi_katam_row_1_col_3: {{ $singleUserInfo->userBasicInfos->profile_jakt_info_status == 1? $singleUserInfo->userHoroScopeInfo->rasi_katam_row_1_col_3: "''" }},
        rasi_katam_row_1_col_4: {{ $singleUserInfo->userBasicInfos->profile_jakt_info_status == 1? $singleUserInfo->userHoroScopeInfo->rasi_katam_row_1_col_4: "''" }},
        rasi_katam_row_2_col_1: {{ $singleUserInfo->userBasicInfos->profile_jakt_info_status == 1? $singleUserInfo->userHoroScopeInfo->rasi_katam_row_2_col_1: "''" }},
        rasi_katam_row_2_col_4: {{ $singleUserInfo->userBasicInfos->profile_jakt_info_status == 1? $singleUserInfo->userHoroScopeInfo->rasi_katam_row_2_col_4: "''" }},
        rasi_katam_row_3_col_1: {{ $singleUserInfo->userBasicInfos->profile_jakt_info_status == 1? $singleUserInfo->userHoroScopeInfo->rasi_katam_row_3_col_1: "''" }},
        rasi_katam_row_3_col_4: {{ $singleUserInfo->userBasicInfos->profile_jakt_info_status == 1? $singleUserInfo->userHoroScopeInfo->rasi_katam_row_3_col_4: "''" }},
        rasi_katam_row_4_col_1: {{ $singleUserInfo->userBasicInfos->profile_jakt_info_status == 1? $singleUserInfo->userHoroScopeInfo->rasi_katam_row_4_col_1: "''" }},
        rasi_katam_row_4_col_2: {{ $singleUserInfo->userBasicInfos->profile_jakt_info_status == 1? $singleUserInfo->userHoroScopeInfo->rasi_katam_row_4_col_2: "''" }},
        rasi_katam_row_4_col_3: {{ $singleUserInfo->userBasicInfos->profile_jakt_info_status == 1? $singleUserInfo->userHoroScopeInfo->rasi_katam_row_4_col_3: "''" }},
        rasi_katam_row_4_col_4: {{ $singleUserInfo->userBasicInfos->profile_jakt_info_status == 1? $singleUserInfo->userHoroScopeInfo->rasi_katam_row_4_col_4: "''" }},


    },
    SingleUserHoroscopeNavamsamKatamInfo: {

        user_jathakam_navamsam_katam_is_filled: '{{ $singleUserInfo->userBasicInfos->profile_jakt_info_status == 1? $singleUserInfo->userHoroScopeInfo->user_jathakam_navamsam_katam_is_filled: 0 }}',
        navam_katam_row_1_col_1: {{ $singleUserInfo->userBasicInfos->profile_jakt_info_status == 1? $singleUserInfo->userHoroScopeInfo->navam_katam_row_1_col_1: "''" }},
        navam_katam_row_1_col_2: {{ $singleUserInfo->userBasicInfos->profile_jakt_info_status == 1? $singleUserInfo->userHoroScopeInfo->navam_katam_row_1_col_2: "''" }},
        navam_katam_row_1_col_3: {{ $singleUserInfo->userBasicInfos->profile_jakt_info_status == 1? $singleUserInfo->userHoroScopeInfo->navam_katam_row_1_col_3: "''" }},
        navam_katam_row_1_col_4: {{ $singleUserInfo->userBasicInfos->profile_jakt_info_status == 1? $singleUserInfo->userHoroScopeInfo->navam_katam_row_1_col_4: "''" }},
        navam_katam_row_2_col_1: {{ $singleUserInfo->userBasicInfos->profile_jakt_info_status == 1? $singleUserInfo->userHoroScopeInfo->navam_katam_row_2_col_1: "''" }},
        navam_katam_row_2_col_4: {{ $singleUserInfo->userBasicInfos->profile_jakt_info_status == 1? $singleUserInfo->userHoroScopeInfo->navam_katam_row_2_col_4: "''" }},
        navam_katam_row_3_col_1: {{ $singleUserInfo->userBasicInfos->profile_jakt_info_status == 1? $singleUserInfo->userHoroScopeInfo->navam_katam_row_3_col_1: "''" }},
        navam_katam_row_3_col_4: {{ $singleUserInfo->userBasicInfos->profile_jakt_info_status == 1? $singleUserInfo->userHoroScopeInfo->navam_katam_row_3_col_4: "''" }},
        navam_katam_row_4_col_1: {{ $singleUserInfo->userBasicInfos->profile_jakt_info_status == 1? $singleUserInfo->userHoroScopeInfo->navam_katam_row_4_col_1: "''" }},
        navam_katam_row_4_col_2: {{ $singleUserInfo->userBasicInfos->profile_jakt_info_status == 1? $singleUserInfo->userHoroScopeInfo->navam_katam_row_4_col_2: "''" }},
        navam_katam_row_4_col_3: {{ $singleUserInfo->userBasicInfos->profile_jakt_info_status == 1? $singleUserInfo->userHoroScopeInfo->navam_katam_row_4_col_3: "''" }},
        navam_katam_row_4_col_4: {{ $singleUserInfo->userBasicInfos->profile_jakt_info_status == 1? $singleUserInfo->userHoroScopeInfo->navam_katam_row_4_col_4: "''" }},


    },
    resetJathakaKatam()
    {
        this.rasiKatam={}
        this.horoscopeListView=this.horoscopeList
        this.rasiKatam={
            row_1: {
                col_1: {
                    dOpen: false,
                    valueChoosed: [],
                    valueChoosedId: [],
                },
                col_2: {
                    dOpen: false,
                    valueChoosed: [],
                    valueChoosedId: [],
                },
                col_3: {
                    dOpen: false,
                    valueChoosed: [],
                    valueChoosedId: [],
                },
                col_4: {
                    dOpen: false,
                    valueChoosed: [],
                    valueChoosedId: [],
                },
            },
            row_2: {
                col_1: {
                    dOpen: false,
                    valueChoosed: [],
                    valueChoosedId: [],
                },
                col_4: {
                    dOpen: false,
                    valueChoosed: [],
                    valueChoosedId: [],
                },
            },
            row_3: {
                col_1: {
                    dOpen: false,
                    valueChoosed: [],
                    valueChoosedId: [],
                },
                col_4: {
                    dOpen: false,
                    valueChoosed: [],
                    valueChoosedId: [],
                },
            },
            row_4: {
                col_1: {
                    dOpen: false,
                    valueChoosed: [],
                    valueChoosedId: [],
                },
                col_2: {
                    dOpen: false,
                    valueChoosed: [],
                    valueChoosedId: [],
                },
                col_3: {
                    dOpen: false,
                    valueChoosed: [],
                    valueChoosedId: [],
                },
                col_4: {
                    dOpen: false,
                    valueChoosed: [],
                    valueChoosedId: [],
                },
            },
        }
    },
    resetNavamsamKatam()
    {
        this.navamsamKatam={}
        this.horoscopeListNavamsam=this.horoscopeList
        this.navamsamKatam={
            row_1: {
                col_1: {
                    dOpen: false,
                    valueChoosed: [],
                    valueChoosedId: [],
                },
                col_2: {
                    dOpen: false,
                    valueChoosed: [],
                    valueChoosedId: [],
                },
                col_3: {
                    dOpen: false,
                    valueChoosed: [],
                    valueChoosedId: [],
                },
                col_4: {
                    dOpen: false,
                    valueChoosed: [],
                    valueChoosedId: [],
                },
            },
            row_2: {
                col_1: {
                    dOpen: false,
                    valueChoosed: [],
                    valueChoosedId: [],
                },
                col_4: {
                    dOpen: false,
                    valueChoosed: [],
                    valueChoosedId: [],
                },
            },
            row_3: {
                col_1: {
                    dOpen: false,
                    valueChoosed: [],
                    valueChoosedId: [],
                },
                col_4: {
                    dOpen: false,
                    valueChoosed: [],
                    valueChoosedId: [],
                },
            },
            row_4: {
                col_1: {
                    dOpen: false,
                    valueChoosed: [],
                    valueChoosedId: [],
                },
                col_2: {
                    dOpen: false,
                    valueChoosed: [],
                    valueChoosedId: [],
                },
                col_3: {
                    dOpen: false,
                    valueChoosed: [],
                    valueChoosedId: [],
                },
                col_4: {
                    dOpen: false,
                    valueChoosed: [],
                    valueChoosedId: [],
                },
            },
        }
    },
    loadHoroscopeList() {

        axios.get('{{ route('admin.submaster.horoscope.ssr') }}')
            .then((e) => {

                this.horoscopeList = e.data
                this.horoscopeListNavamsam = e.data
                this.horoscopeListView = this.horoscopeList.map((horoInfo) => {

                    return ({ ...horoInfo, isChoosed: false })
                })
                this.isLoadingHoroscope = false
                this.isLoadingProcessing = false



            })
    },
    updateUserRasiJathakamInformation() {

        this.isLoadingProcessing = true
        let data = {
            rasi_katam_row_1_col_1: this.rasiKatam.row_1.col_1.valueChoosedId.join(','),
            rasi_katam_row_1_col_2: this.rasiKatam.row_1.col_2.valueChoosedId.join(','),
            rasi_katam_row_1_col_3: this.rasiKatam.row_1.col_3.valueChoosedId.join(','),
            rasi_katam_row_1_col_4: this.rasiKatam.row_1.col_4.valueChoosedId.join(','),
            rasi_katam_row_2_col_1: this.rasiKatam.row_2.col_1.valueChoosedId.join(','),
            rasi_katam_row_2_col_4: this.rasiKatam.row_2.col_4.valueChoosedId.join(','),
            rasi_katam_row_3_col_1: this.rasiKatam.row_3.col_1.valueChoosedId.join(','),
            rasi_katam_row_3_col_4: this.rasiKatam.row_3.col_4.valueChoosedId.join(','),
            rasi_katam_row_4_col_1: this.rasiKatam.row_4.col_1.valueChoosedId.join(','),
            rasi_katam_row_4_col_2: this.rasiKatam.row_4.col_2.valueChoosedId.join(','),
            rasi_katam_row_4_col_3: this.rasiKatam.row_4.col_3.valueChoosedId.join(','),
            rasi_katam_row_4_col_4: this.rasiKatam.row_4.col_4.valueChoosedId.join(','),
        }

        axios.put('{{ route('admin.profile.updateUserHoroscopeRasiKatam', $singleUserInfo->id) }}', data)
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

    },
    updateUserNavamsamJathakamInformation() {

        this.isLoadingProcessing = true

        let data = {
            navam_katam_row_1_col_1: this.navamsamKatam.row_1.col_1.valueChoosedId.join(','),
            navam_katam_row_1_col_2: this.navamsamKatam.row_1.col_2.valueChoosedId.join(','),
            navam_katam_row_1_col_3: this.navamsamKatam.row_1.col_3.valueChoosedId.join(','),
            navam_katam_row_1_col_4: this.navamsamKatam.row_1.col_4.valueChoosedId.join(','),
            navam_katam_row_2_col_1: this.navamsamKatam.row_2.col_1.valueChoosedId.join(','),
            navam_katam_row_2_col_4: this.navamsamKatam.row_2.col_4.valueChoosedId.join(','),
            navam_katam_row_3_col_1: this.navamsamKatam.row_3.col_1.valueChoosedId.join(','),
            navam_katam_row_3_col_4: this.navamsamKatam.row_3.col_4.valueChoosedId.join(','),
            navam_katam_row_4_col_1: this.navamsamKatam.row_4.col_1.valueChoosedId.join(','),
            navam_katam_row_4_col_2: this.navamsamKatam.row_4.col_2.valueChoosedId.join(','),
            navam_katam_row_4_col_3: this.navamsamKatam.row_4.col_3.valueChoosedId.join(','),
            navam_katam_row_4_col_4: this.navamsamKatam.row_4.col_4.valueChoosedId.join(',')
        }

        axios.put('{{ route('admin.profile.updateUserHoroscopeNavamsamKatam', $singleUserInfo->id) }}', data)
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

    },
    uploadUserJathakamImage() {

        this.isLoadingProcessing = true
        let data = new FormData()

        data.append('user_jathakam_image', this.userJathakamImage)

        axios.post('{{ route('admin.profile.updateUserHoroscopeImageUpload', $singleUserInfo->id) }}', data)
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
                    title: 'Please Check the image uploaded',
                    showConfirmButton: false,
                    toast: true,
                    timer: 1500
                }).then(() => {

                    this.isLoadingProcessing = false
                })

            })

    },

}" x-init="loadHoroscopeList();" class="card tab-pane">
    <div class="card-body">
        <div class="card-body">
            <template x-if="isLoadingHoroscope">
                <div class="mb-3">
                    <label class="form-label">Loading....</label>
                    <div class="progress">
                        <div class="progress-bar progress-bar-indeterminate bg-dark"></div>
                    </div>
                </div>
            </template>
            {{-- user jathagam rasi katam start --}}
            <div class="row">
                <div class="col-md-6 offset-3">
                    <div class="form-group mb-3 ">
                        <div class="">
                            <label class="form-label">Jathaka
                                Katam (Rasi)</label>
                            <template x-if="SingleUserHoroscopeRasiKatamInfo.user_jathakam_rasi_katam_is_filled==1">
                                <table class="table table-bordered mt-4">
                                    <tbody>
                                        <tr>
                                            <td class="jathakatam">
                                                <button type="button" class="btn btn-white p-0 m-0"
                                                    style="width: 90px ; height:60px">
                                                    <template
                                                        x-if="SingleUserHoroscopeRasiKatamInfo.rasi_katam_row_1_col_1">
                                                        <div class="d-flex flex-column">
                                                            <template
                                                                x-for="choosedStar in SingleUserHoroscopeRasiKatamInfo.rasi_katam_row_1_col_1">
                                                                <div x-text="choosedStar.horoscope_name"></div>
                                                            </template>
                                                        </div>
                                                    </template>
                                                </button>
                                            </td>
                                            <td class="jathakatam">
                                                <button type="button" class="btn btn-white"
                                                    style="width: 90px ; height:60px">
                                                    <template
                                                        x-if="SingleUserHoroscopeRasiKatamInfo.rasi_katam_row_1_col_2">
                                                        <div class="d-flex flex-column">
                                                            <template
                                                                x-for="choosedStar in SingleUserHoroscopeRasiKatamInfo.rasi_katam_row_1_col_2">
                                                                <div x-text="choosedStar.horoscope_name"></div>
                                                            </template>
                                                        </div>
                                                    </template>
                                                </button>
                                            </td>
                                            <td class="jathakatam">
                                                <button type="button" class="btn btn-white"
                                                    style="width: 90px ; height:60px">
                                                    <template
                                                        x-if="SingleUserHoroscopeRasiKatamInfo.rasi_katam_row_1_col_3">
                                                        <div class="d-flex flex-column">
                                                            <template
                                                                x-for="choosedStar in SingleUserHoroscopeRasiKatamInfo.rasi_katam_row_1_col_3">
                                                                <div x-text="choosedStar.horoscope_name"></div>
                                                            </template>
                                                        </div>
                                                    </template>
                                                </button>
                                            </td>
                                            <td class="jathakatam">
                                                <button type="button" class="btn btn-white"
                                                    style="width: 90px ; height:60px">
                                                    <template
                                                        x-if="SingleUserHoroscopeRasiKatamInfo.rasi_katam_row_1_col_4">
                                                        <div class="d-flex flex-column">
                                                            <template
                                                                x-for="choosedStar in SingleUserHoroscopeRasiKatamInfo.rasi_katam_row_1_col_4">
                                                                <div x-text="choosedStar.horoscope_name"></div>
                                                            </template>
                                                        </div>
                                                    </template>
                                                </button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="jathakatam">
                                                <button type="button" class="btn btn-white"
                                                    style="width: 90px ; height:60px">
                                                    <template
                                                        x-if="SingleUserHoroscopeRasiKatamInfo.rasi_katam_row_2_col_1">
                                                        <div class="d-flex flex-column">
                                                            <template
                                                                x-for="choosedStar in SingleUserHoroscopeRasiKatamInfo.rasi_katam_row_2_col_1">
                                                                <div x-text="choosedStar.horoscope_name"></div>
                                                            </template>
                                                        </div>
                                                    </template>
                                                </button>
                                            </td>
                                            <td colspan="2" class="bg-dark-lt">
                                                <h4 class="text-center mt-4">Rasi</h4>
                                            </td>
                                            <td class="jathakatam">
                                                <button type="button" class="btn btn-white"
                                                    style="width: 90px ; height:60px">
                                                    <template
                                                        x-if="SingleUserHoroscopeRasiKatamInfo.rasi_katam_row_2_col_4">
                                                        <div class="d-flex flex-column">
                                                            <template
                                                                x-for="choosedStar in SingleUserHoroscopeRasiKatamInfo.rasi_katam_row_2_col_4">
                                                                <div x-text="choosedStar.horoscope_name"></div>
                                                            </template>
                                                        </div>
                                                    </template>
                                                </button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="jathakatam">
                                                <button type="button" class="btn btn-white"
                                                    style="width: 90px ; height:60px">
                                                    <template
                                                        x-if="SingleUserHoroscopeRasiKatamInfo.rasi_katam_row_3_col_1">
                                                        <div class="d-flex flex-column">
                                                            <template
                                                                x-for="choosedStar in SingleUserHoroscopeRasiKatamInfo.rasi_katam_row_3_col_1">
                                                                <div x-text="choosedStar.horoscope_name"></div>
                                                            </template>
                                                        </div>
                                                    </template>
                                                </button>
                                            </td>
                                            <td colspan="2" class="bg-dark-lt">
                                                <h4 class="text-center">Chart</h4>
                                            </td>
                                            <td class="jathakatam">
                                                <button type="button" class="btn btn-white"
                                                    style="width: 90px ; height:60px">
                                                    <template
                                                        x-if="SingleUserHoroscopeRasiKatamInfo.rasi_katam_row_3_col_4">
                                                        <div class="d-flex flex-column">
                                                            <template
                                                                x-for="choosedStar in SingleUserHoroscopeRasiKatamInfo.rasi_katam_row_3_col_4">
                                                                <div x-text="choosedStar.horoscope_name"></div>
                                                            </template>
                                                        </div>
                                                    </template>
                                                </button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="jathakatam">
                                                <button type="button" class="btn btn-white"
                                                    style="width: 90px ; height:60px">
                                                    <template
                                                        x-if="SingleUserHoroscopeRasiKatamInfo.rasi_katam_row_4_col_1">
                                                        <div class="d-flex flex-column">
                                                            <template
                                                                x-for="choosedStar in SingleUserHoroscopeRasiKatamInfo.rasi_katam_row_4_col_1">
                                                                <div x-text="choosedStar.horoscope_name"></div>
                                                            </template>
                                                        </div>
                                                    </template>
                                                </button>
                                            </td>
                                            <td class="jathakatam">
                                                <button type="button" class="btn btn-white"
                                                    style="width: 90px ; height:60px">
                                                    <template
                                                        x-if="SingleUserHoroscopeRasiKatamInfo.rasi_katam_row_4_col_2">
                                                        <div class="d-flex flex-column">
                                                            <template
                                                                x-for="choosedStar in SingleUserHoroscopeRasiKatamInfo.rasi_katam_row_4_col_2">
                                                                <div x-text="choosedStar.horoscope_name"></div>
                                                            </template>
                                                        </div>
                                                    </template>
                                                </button>
                                            </td>
                                            <td class="jathakatam">
                                                <button type="button" class="btn btn-white"
                                                    style="width: 90px ; height:60px">
                                                    <template
                                                        x-if="SingleUserHoroscopeRasiKatamInfo.rasi_katam_row_4_col_3">
                                                        <div class="d-flex flex-column">
                                                            <template
                                                                x-for="choosedStar in SingleUserHoroscopeRasiKatamInfo.rasi_katam_row_4_col_3">
                                                                <div x-text="choosedStar.horoscope_name"></div>
                                                            </template>
                                                        </div>
                                                    </template>
                                                </button>
                                            </td>
                                            <td class="jathakatam">
                                                <button type="button" class="btn btn-white"
                                                    style="width: 90px ; height:60px">
                                                    <template
                                                        x-if="SingleUserHoroscopeRasiKatamInfo.rasi_katam_row_4_col_4">
                                                        <div class="d-flex flex-column">
                                                            <template
                                                                x-for="choosedStar in SingleUserHoroscopeRasiKatamInfo.rasi_katam_row_4_col_4">
                                                                <div x-text="choosedStar.horoscope_name"></div>
                                                            </template>
                                                        </div>
                                                    </template>
                                                </button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </template>

                            <template
                                x-if="userChangeRasiKatam || SingleUserHoroscopeRasiKatamInfo.user_jathakam_rasi_katam_is_filled==0">
                                <table class="table table-bordered mt-4">
                                    <tbody>
                                        <tr>
                                            <td class="jathakatam">
                                                <button type="button" x-on:click="rasiKatam.row_1.col_1.dOpen=true"
                                                    class="btn btn-white" style="width: 90px ; height:60px">
                                                    <template x-if="rasiKatam.row_1.col_1.valueChoosed">
                                                        <div class="d-flex flex-column">
                                                            <template
                                                                x-for="choosedStar in rasiKatam.row_1.col_1.valueChoosed">
                                                                <div x-text="choosedStar"></div>
                                                            </template>
                                                        </div>
                                                    </template>
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-demo"
                                                    x-show="rasiKatam.row_1.col_1.dOpen">
                                                    <template x-for="horoscope in horoscopeListView"
                                                        :key="horoscope.id" x-if="!isLoadingHoroscope">
                                                        <button type="button" x-on:click="($el)=>{
                                                            horoscopeListView=horoscopeListView.filter( horo => horo.id!=$el.target.id);
                                                                  rasiKatam.row_1.col_1.valueChoosed.push($el.target.value)
                                                                rasiKatam.row_1.col_1.valueChoosedId.push($el.target.id)
                                                                rasiKatam.row_1.col_1.dOpen=false
                                                                console.log(rasiKatam.row_1.col_1.valueChoosed)
                                                            }" x-bind:value="horoscope.horoscope_name"
                                                            x-bind:id="horoscope.id" class="dropdown-item"
                                                            x-text="horoscope.horoscope_name">
                                                        </button>
                                                    </template>
                                                </div>
                                            </td>
                                            <td class="jathakatam">
                                                <button type="button" x-on:click="rasiKatam.row_1.col_2.dOpen=true"
                                                    class="btn btn-white" style="width: 90px ; height:60px">
                                                    <template x-if="rasiKatam.row_1.col_2.valueChoosed">
                                                        <div class="d-flex flex-column">
                                                            <template
                                                                x-for="choosedStar in rasiKatam.row_1.col_2.valueChoosed">
                                                                <div x-text="choosedStar"></div>
                                                            </template>
                                                        </div>
                                                    </template>
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-demo"
                                                    x-show="rasiKatam.row_1.col_2.dOpen">
                                                    <template x-for="horoscope in horoscopeListView"
                                                        :key="horoscope.id" x-if="!isLoadingHoroscope">
                                                        <button type="button" x-on:click="($el)=>{
                                                            horoscopeListView=horoscopeListView.filter( horo => horo.id!=$el.target.id);
                                                            rasiKatam.row_1.col_2.valueChoosed.push($el.target.value)
                                                            rasiKatam.row_1.col_2.valueChoosedId.push($el.target.id)
                                                            rasiKatam.row_1.col_2.dOpen=false
                                                            console.log(rasiKatam.row_1.col_2.valueChoosed)
                                                        }" x-bind:value="horoscope.horoscope_name"
                                                            x-bind:id="horoscope.id" class="dropdown-item"
                                                            x-text="horoscope.horoscope_name">
                                                        </button>
                                                    </template>
                                                </div>
                                            </td>
                                            <td class="jathakatam">
                                                <button type="button" x-on:click="rasiKatam.row_1.col_3.dOpen=true"
                                                    class="btn btn-white" style="width: 90px ; height:60px">
                                                    <template x-if="rasiKatam.row_1.col_3.valueChoosed">
                                                        <div class="d-flex flex-column">
                                                            <template
                                                                x-for="choosedStar in rasiKatam.row_1.col_3.valueChoosed">
                                                                <div x-text="choosedStar"></div>
                                                            </template>
                                                        </div>
                                                    </template>
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-demo"
                                                    x-show="rasiKatam.row_1.col_3.dOpen">
                                                    <template x-for="horoscope in horoscopeListView"
                                                        :key="horoscope.id" x-if="!isLoadingHoroscope">
                                                        <button type="button" x-on:click="($el)=>{
                                                            horoscopeListView=horoscopeListView.filter( horo => horo.id!=$el.target.id);
                                                                rasiKatam.row_1.col_3.valueChoosed.push($el.target.value)
                                                                rasiKatam.row_1.col_3.valueChoosedId.push($el.target.id)
                                                                rasiKatam.row_1.col_3.dOpen=false
                                                                console.log(rasiKatam.row_1.col_3.valueChoosed)
                                                            }" x-bind:value="horoscope.horoscope_name"
                                                            x-bind:id="horoscope.id" class="dropdown-item"
                                                            x-text="horoscope.horoscope_name">
                                                        </button>
                                                    </template>
                                                </div>
                                            </td>
                                            <td class="jathakatam">
                                                <button type="button" x-on:click="rasiKatam.row_1.col_4.dOpen=true"
                                                    class="btn btn-white" style="width: 90px ; height:60px">
                                                    <template x-if="rasiKatam.row_1.col_4.valueChoosed">
                                                        <div class="d-flex flex-column">
                                                            <template
                                                                x-for="choosedStar in rasiKatam.row_1.col_4.valueChoosed">
                                                                <div x-text="choosedStar"></div>
                                                            </template>
                                                        </div>
                                                    </template>
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-demo"
                                                    x-show="rasiKatam.row_1.col_4.dOpen">
                                                    <template x-for="horoscope in horoscopeListView"
                                                        :key="horoscope.id" x-if="!isLoadingHoroscope">
                                                        <button type="button" x-on:click="($el)=>{
                                                                horoscopeListView=horoscopeListView.filter( horo => horo.id!=$el.target.id);
                                                                rasiKatam.row_1.col_4.valueChoosed.push($el.target.value)
                                                                rasiKatam.row_1.col_4.valueChoosedId.push($el.target.id)
                                                                rasiKatam.row_1.col_4.dOpen=false
                                                                console.log(rasiKatam.row_1.col_4.valueChoosed)
                                                            }" x-bind:value="horoscope.horoscope_name"
                                                            x-bind:id="horoscope.id" class="dropdown-item"
                                                            x-text="horoscope.horoscope_name">
                                                        </button>
                                                    </template>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="jathakatam">
                                                <button type="button" x-on:click="rasiKatam.row_2.col_1.dOpen=true"
                                                    class="btn btn-white" style="width: 90px ; height:60px">
                                                    <template x-if="rasiKatam.row_2.col_1.valueChoosed">
                                                        <div class="d-flex flex-column">
                                                            <template
                                                                x-for="choosedStar in rasiKatam.row_2.col_1.valueChoosed">
                                                                <div x-text="choosedStar"></div>
                                                            </template>
                                                        </div>
                                                    </template>
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-demo"
                                                    x-show="rasiKatam.row_2.col_1.dOpen">
                                                    <template x-for="horoscope in horoscopeListView"
                                                        :key="horoscope.id" x-if="!isLoadingHoroscope">
                                                        <button type="button" x-on:click="($el)=>{
                                                                horoscopeListView=horoscopeListView.filter( horo => horo.id!=$el.target.id);
                                                                rasiKatam.row_2.col_1.valueChoosed.push($el.target.value)
                                                                rasiKatam.row_2.col_1.valueChoosedId.push($el.target.id)
                                                                rasiKatam.row_2.col_1.dOpen=false
                                                                console.log(rasiKatam.row_2.col_1.valueChoosed)
                                                            }" x-bind:value="horoscope.horoscope_name"
                                                            x-bind:id="horoscope.id" class="dropdown-item"
                                                            x-text="horoscope.horoscope_name">
                                                        </button>
                                                    </template>
                                                </div>
                                            </td>
                                            <td colspan="2" class="bg-dark-lt">
                                                <h4 class="text-center mt-4">Rasi</h4>
                                            </td>
                                            <td class="jathakatam">
                                                <button type="button" x-on:click="rasiKatam.row_2.col_4.dOpen=true"
                                                    class="btn btn-white" style="width: 90px ; height:60px">
                                                    <template x-if="rasiKatam.row_2.col_4.valueChoosed">
                                                        <div class="d-flex flex-column">
                                                            <template
                                                                x-for="choosedStar in rasiKatam.row_2.col_4.valueChoosed">
                                                                <div x-text="choosedStar"></div>
                                                            </template>
                                                        </div>
                                                    </template>
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-demo"
                                                    x-show="rasiKatam.row_2.col_4.dOpen">
                                                    <template x-for="horoscope in horoscopeListView"
                                                        :key="horoscope.id" x-if="!isLoadingHoroscope">
                                                        <button type="button" x-on:click="($el)=>{
                                                            horoscopeListView=horoscopeListView.filter( horo => horo.id!=$el.target.id);
                                                                rasiKatam.row_2.col_4.valueChoosed.push($el.target.value)
                                                                rasiKatam.row_2.col_4.valueChoosedId.push($el.target.id)
                                                                rasiKatam.row_2.col_4.dOpen=false
                                                                console.log(rasiKatam.row_2.col_4.valueChoosed)
                                                            }" x-bind:value="horoscope.horoscope_name"
                                                            x-bind:id="horoscope.id" class="dropdown-item"
                                                            x-text="horoscope.horoscope_name">
                                                        </button>
                                                    </template>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="jathakatam">
                                                <button type="button" x-on:click="rasiKatam.row_3.col_1.dOpen=true"
                                                    class="btn btn-white" style="width: 90px ; height:60px">
                                                    <template x-if="rasiKatam.row_3.col_1.valueChoosed">
                                                        <div class="d-flex flex-column">
                                                            <template
                                                                x-for="choosedStar in rasiKatam.row_3.col_1.valueChoosed">
                                                                <div x-text="choosedStar"></div>
                                                            </template>
                                                        </div>
                                                    </template>
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-demo"
                                                    x-show="rasiKatam.row_3.col_1.dOpen">
                                                    <template x-for="horoscope in horoscopeListView"
                                                        :key="horoscope.id" x-if="!isLoadingHoroscope">
                                                        <button type="button" x-on:click="($el)=>{
                                                                horoscopeListView=horoscopeListView.filter( horo => horo.id!=$el.target.id);
                                                                rasiKatam.row_3.col_1.valueChoosed.push($el.target.value)
                                                                rasiKatam.row_3.col_1.valueChoosedId.push($el.target.id)
                                                                rasiKatam.row_3.col_1.dOpen=false
                                                                console.log(rasiKatam.row_3.col_1.valueChoosed)
                                                            }" x-bind:value="horoscope.horoscope_name"
                                                            x-bind:id="horoscope.id" class="dropdown-item"
                                                            x-text="horoscope.horoscope_name">
                                                        </button>
                                                    </template>
                                                </div>
                                            </td>
                                            <td colspan="2" class="bg-dark-lt">
                                                <h4 class="text-center">Chart</h4>
                                            </td>
                                            <td class="jathakatam">
                                                <button type="button" x-on:click="rasiKatam.row_3.col_4.dOpen=true"
                                                    class="btn btn-white" style="width: 90px ; height:60px">
                                                    <template x-if="rasiKatam.row_3.col_4.valueChoosed">
                                                        <div class="d-flex flex-column">
                                                            <template
                                                                x-for="choosedStar in rasiKatam.row_3.col_4.valueChoosed">
                                                                <div x-text="choosedStar"></div>
                                                            </template>
                                                        </div>
                                                    </template>
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-demo"
                                                    x-show="rasiKatam.row_3.col_4.dOpen">
                                                    <template x-for="horoscope in horoscopeListView"
                                                        :key="horoscope.id" x-if="!isLoadingHoroscope">
                                                        <button type="button" x-on:click="($el)=>{
                                                                horoscopeListView=horoscopeListView.filter( horo => horo.id!=$el.target.id);
                                                                rasiKatam.row_3.col_4.valueChoosed.push($el.target.value)
                                                                rasiKatam.row_3.col_4.valueChoosedId.push($el.target.id)
                                                                rasiKatam.row_3.col_4.dOpen=false
                                                                console.log(rasiKatam.row_3.col_4.valueChoosed)
                                                            }" x-bind:value="horoscope.horoscope_name"
                                                            x-bind:id="horoscope.id" class="dropdown-item"
                                                            x-text="horoscope.horoscope_name">
                                                        </button>
                                                    </template>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="jathakatam">
                                                <button type="button" x-on:click="rasiKatam.row_4.col_1.dOpen=true"
                                                    class="btn btn-white" style="width: 90px ; height:60px">
                                                    <template x-if="rasiKatam.row_4.col_1.valueChoosed">
                                                        <div class="d-flex flex-column">
                                                            <template
                                                                x-for="choosedStar in rasiKatam.row_4.col_1.valueChoosed">
                                                                <div x-text="choosedStar"></div>
                                                            </template>
                                                        </div>
                                                    </template>
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-demo"
                                                    x-show="rasiKatam.row_4.col_1.dOpen">
                                                    <template x-for="horoscope in horoscopeListView"
                                                        :key="horoscope.id" x-if="!isLoadingHoroscope">
                                                        <button type="button" x-on:click="($el)=>{
                                                                horoscopeListView=horoscopeListView.filter( horo => horo.id!=$el.target.id);
                                                                rasiKatam.row_4.col_1.valueChoosed.push($el.target.value)
                                                                rasiKatam.row_4.col_1.valueChoosedId.push($el.target.id)
                                                                rasiKatam.row_4.col_1.dOpen=false
                                                                console.log(rasiKatam.row_4.col_1.valueChoosed)
                                                            }" x-bind:value="horoscope.horoscope_name"
                                                            x-bind:id="horoscope.id" class="dropdown-item"
                                                            x-text="horoscope.horoscope_name">
                                                        </button>
                                                    </template>
                                                </div>
                                            </td>
                                            <td class="jathakatam">
                                                <button type="button" x-on:click="rasiKatam.row_4.col_2.dOpen=true"
                                                    class="btn btn-white" style="width: 90px ; height:60px">
                                                    <template x-if="rasiKatam.row_4.col_2.valueChoosed">
                                                        <div class="d-flex flex-column">
                                                            <template
                                                                x-for="choosedStar in rasiKatam.row_4.col_2.valueChoosed">
                                                                <div x-text="choosedStar"></div>
                                                            </template>
                                                        </div>
                                                    </template>
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-demo"
                                                    x-show="rasiKatam.row_4.col_2.dOpen">
                                                    <template x-for="horoscope in horoscopeListView"
                                                        :key="horoscope.id" x-if="!isLoadingHoroscope">
                                                        <button type="button" x-on:click="($el)=>{
                                                        horoscopeListView=horoscopeListView.filter( horo => horo.id!=$el.target.id);
                                                              rasiKatam.row_4.col_2.valueChoosed.push($el.target.value)
                                                            rasiKatam.row_4.col_2.valueChoosedId.push($el.target.id)
                                                            rasiKatam.row_4.col_2.dOpen=false
                                                            console.log(rasiKatam.row_4.col_2.valueChoosed)
                                                        }" x-bind:value="horoscope.horoscope_name"
                                                            x-bind:id="horoscope.id" class="dropdown-item"
                                                            x-text="horoscope.horoscope_name">
                                                        </button>
                                                    </template>
                                                </div>
                                            </td>
                                            <td class="jathakatam">
                                                <button type="button" x-on:click="rasiKatam.row_4.col_3.dOpen=true"
                                                    class="btn btn-white" style="width: 90px ; height:60px">
                                                    <template x-if="rasiKatam.row_4.col_3.valueChoosed">
                                                        <div class="d-flex flex-column">
                                                            <template
                                                                x-for="choosedStar in rasiKatam.row_4.col_3.valueChoosed">
                                                                <div x-text="choosedStar"></div>
                                                            </template>
                                                        </div>
                                                    </template>
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-demo"
                                                    x-show="rasiKatam.row_4.col_3.dOpen">
                                                    <template x-for="horoscope in horoscopeListView"
                                                        :key="horoscope.id" x-if="!isLoadingHoroscope">
                                                        <button type="button" x-on:click="($el)=>{
                                                            horoscopeListView=horoscopeListView.filter( horo => horo.id!=$el.target.id);
                                                                rasiKatam.row_4.col_3.valueChoosed.push($el.target.value)
                                                                rasiKatam.row_4.col_3.valueChoosedId.push($el.target.id)
                                                                rasiKatam.row_4.col_3.dOpen=false
                                                                console.log(rasiKatam.row_4.col_3.valueChoosed)
                                                            }" x-bind:value="horoscope.horoscope_name"
                                                            x-bind:id="horoscope.id" class="dropdown-item"
                                                            x-text="horoscope.horoscope_name">
                                                        </button>
                                                    </template>
                                                </div>
                                            </td>
                                            <td class="jathakatam">
                                                <button type="button" x-on:click="rasiKatam.row_4.col_4.dOpen=true"
                                                    class="btn btn-white" style="width: 90px ; height:60px">
                                                    <template x-if="rasiKatam.row_4.col_4.valueChoosed">
                                                        <div class="d-flex flex-column">
                                                            <template
                                                                x-for="choosedStar in rasiKatam.row_4.col_4.valueChoosed">
                                                                <div x-text="choosedStar"></div>
                                                            </template>
                                                        </div>
                                                    </template>
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-demo"
                                                    x-show="rasiKatam.row_4.col_4.dOpen">
                                                    <template x-for="horoscope in horoscopeListView"
                                                        :key="horoscope.id" x-if="!isLoadingHoroscope">
                                                        <button type="button" x-on:click="($el)=>{
                                                                 horoscopeListView=horoscopeListView.filter( horo => horo.id!=$el.target.id);
                                                                rasiKatam.row_4.col_4.valueChoosed.push($el.target.value)
                                                                rasiKatam.row_4.col_4.valueChoosedId.push($el.target.id)
                                                                rasiKatam.row_4.col_4.dOpen=false
                                                                console.log(rasiKatam.row_4.col_4.valueChoosed)
                                                            }" x-bind:value="horoscope.horoscope_name"
                                                            x-bind:id="horoscope.id" class="dropdown-item"
                                                            x-text="horoscope.horoscope_name">
                                                        </button>
                                                    </template>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </template>
                            <div class="row">
                                <template
                                    x-if="!userChangeRasiKatam ||SingleUserHoroscopeRasiKatamInfo.user_jathakam_rasi_katam_is_filled==1">
                                    <div class="col-6 col-sm-4 col-md-4 col-xl mb-3"
                                        x-on:click="userChangeRasiKatam=true">
                                        <button type="button" class="btn btn-outline-dark w-100">
                                            Change Rasi Katam
                                        </button>
                                    </div>
                                </template>
                                <template
                                    x-if="userChangeRasiKatam ||SingleUserHoroscopeRasiKatamInfo.user_jathakam_rasi_katam_is_filled==0">
                                    <div class="col-6 col-sm-4 col-md-4 col-xl mb-3">
                                        <button x-on:click="resetJathakaKatam" type="button"
                                            class="btn btn-outline-danger w-100">
                                            Reset
                                        </button>
                                    </div>
                                </template>
                                <template
                                    x-if="userChangeRasiKatam ||SingleUserHoroscopeRasiKatamInfo.user_jathakam_rasi_katam_is_filled==0">
                                    <div class="col-6 col-sm-4 col-md-4 col-xl mb-3">
                                        <button x-on:click="updateUserRasiJathakamInformation" type="button"
                                            class="btn btn-outline-success w-100">
                                            Save Rasi Katam
                                        </button>
                                    </div>
                                </template>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- End of user jathagam rasi katam start --}}
            {{-- user jathagam Navamsam katam start --}}
            <div class="row">
                <div class="col-md-6 offset-3">
                    <div class="form-group mb-3 ">
                        <label class="form-label">Jathaka
                            Katam (Navaasam)</label>
                        <div class="">
                            <template
                                x-if="SingleUserHoroscopeNavamsamKatamInfo.user_jathakam_navamsam_katam_is_filled==1">
                                <table class="table table-bordered mt-4">
                                    <tbody>
                                        <tr>
                                            <td class="jathakatam">
                                                <button type="button" class="btn btn-white"
                                                    style="width: 90px ; height:60px">
                                                    <template
                                                        x-if="SingleUserHoroscopeNavamsamKatamInfo.navam_katam_row_1_col_1">
                                                        <div class="d-flex flex-column">
                                                            <template
                                                                x-for="choosedStar in SingleUserHoroscopeNavamsamKatamInfo.navam_katam_row_1_col_1">
                                                                <div x-text="choosedStar.horoscope_name"></div>
                                                            </template>
                                                        </div>
                                                    </template>
                                                </button>
                                            </td>
                                            <td class="jathakatam">
                                                <button type="button" class="btn btn-white"
                                                    style="width: 90px ; height:60px">
                                                    <template
                                                        x-if="SingleUserHoroscopeNavamsamKatamInfo.navam_katam_row_1_col_2">
                                                        <div class="d-flex flex-column">
                                                            <template
                                                                x-for="choosedStar in SingleUserHoroscopeNavamsamKatamInfo.navam_katam_row_1_col_2">
                                                                <div x-text="choosedStar.horoscope_name"></div>
                                                            </template>
                                                        </div>
                                                    </template>
                                                </button>
                                            </td>
                                            <td class="jathakatam">
                                                <button type="button" class="btn btn-white"
                                                    style="width: 90px ; height:60px">
                                                    <template
                                                        x-if="SingleUserHoroscopeNavamsamKatamInfo.navam_katam_row_1_col_3">
                                                        <div class="d-flex flex-column">
                                                            <template
                                                                x-for="choosedStar in SingleUserHoroscopeNavamsamKatamInfo.navam_katam_row_1_col_3">
                                                                <div x-text="choosedStar.horoscope_name"></div>
                                                            </template>
                                                        </div>
                                                    </template>
                                                </button>
                                            </td>
                                            <td class="jathakatam">
                                                <button type="button" class="btn btn-white"
                                                    style="width: 90px ; height:60px">
                                                    <template
                                                        x-if="SingleUserHoroscopeNavamsamKatamInfo.navam_katam_row_1_col_4">
                                                        <div class="d-flex flex-column">
                                                            <template
                                                                x-for="choosedStar in SingleUserHoroscopeNavamsamKatamInfo.navam_katam_row_1_col_4">
                                                                <div x-text="choosedStar.horoscope_name"></div>
                                                            </template>
                                                        </div>
                                                    </template>
                                                </button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="jathakatam">
                                                <button type="button" class="btn btn-white"
                                                    style="width: 90px ; height:60px">
                                                    <template
                                                        x-if="SingleUserHoroscopeNavamsamKatamInfo.navam_katam_row_2_col_1">
                                                        <div class="d-flex flex-column">
                                                            <template
                                                                x-for="choosedStar in SingleUserHoroscopeNavamsamKatamInfo.navam_katam_row_2_col_1">
                                                                <div x-text="choosedStar.horoscope_name"></div>
                                                            </template>
                                                        </div>
                                                    </template>
                                                </button>
                                            </td>
                                            <td colspan="2" class="bg-dark-lt">
                                                <h4 class="text-center mt-4">Navamsam</h4>
                                            </td>
                                            <td class="jathakatam">
                                                <button type="button" class="btn btn-white"
                                                    style="width: 90px ; height:60px">
                                                    <template
                                                        x-if="SingleUserHoroscopeNavamsamKatamInfo.navam_katam_row_2_col_4">
                                                        <div class="d-flex flex-column">
                                                            <template
                                                                x-for="choosedStar in SingleUserHoroscopeNavamsamKatamInfo.navam_katam_row_2_col_4">
                                                                <div x-text="choosedStar.horoscope_name"></div>
                                                            </template>
                                                        </div>
                                                    </template>
                                                </button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="jathakatam">
                                                <button type="button" class="btn btn-white"
                                                    style="width: 90px ; height:60px">
                                                    <template
                                                        x-if="SingleUserHoroscopeNavamsamKatamInfo.navam_katam_row_3_col_1">
                                                        <div class="d-flex flex-column">
                                                            <template
                                                                x-for="choosedStar in SingleUserHoroscopeNavamsamKatamInfo.navam_katam_row_3_col_1">
                                                                <div x-text="choosedStar.horoscope_name"></div>
                                                            </template>
                                                        </div>
                                                    </template>
                                                </button>
                                            </td>
                                            <td colspan="2" class="bg-dark-lt">
                                                <h4 class="text-center">Chart</h4>
                                            </td>
                                            <td class="jathakatam">
                                                <button type="button" class="btn btn-white"
                                                    style="width: 90px ; height:60px">
                                                    <template
                                                        x-if="SingleUserHoroscopeNavamsamKatamInfo.navam_katam_row_3_col_4">
                                                        <div class="d-flex flex-column">
                                                            <template
                                                                x-for="choosedStar in SingleUserHoroscopeNavamsamKatamInfo.navam_katam_row_3_col_4">
                                                                <div x-text="choosedStar.horoscope_name"></div>
                                                            </template>
                                                        </div>
                                                    </template>
                                                </button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="jathakatam">
                                                <button type="button" class="btn btn-white"
                                                    style="width: 90px ; height:60px">
                                                    <template
                                                        x-if="SingleUserHoroscopeNavamsamKatamInfo.navam_katam_row_4_col_1">
                                                        <div class="d-flex flex-column">
                                                            <template
                                                                x-for="choosedStar in SingleUserHoroscopeNavamsamKatamInfo.navam_katam_row_4_col_1">
                                                                <div x-text="choosedStar.horoscope_name"></div>
                                                            </template>
                                                        </div>
                                                    </template>
                                                </button>
                                            </td>
                                            <td class="jathakatam">
                                                <button type="button" class="btn btn-white"
                                                    style="width: 90px ; height:60px">
                                                    <template
                                                        x-if="SingleUserHoroscopeNavamsamKatamInfo.navam_katam_row_4_col_2">
                                                        <div class="d-flex flex-column">
                                                            <template
                                                                x-for="choosedStar in SingleUserHoroscopeNavamsamKatamInfo.navam_katam_row_4_col_2">
                                                                <div x-text="choosedStar.horoscope_name"></div>
                                                            </template>
                                                        </div>
                                                    </template>
                                                </button>
                                            </td>
                                            <td class="jathakatam">
                                                <button type="button" class="btn btn-white"
                                                    style="width: 90px ; height:60px">
                                                    <template
                                                        x-if="SingleUserHoroscopeNavamsamKatamInfo.navam_katam_row_4_col_3">
                                                        <div class="d-flex flex-column">
                                                            <template
                                                                x-for="choosedStar in SingleUserHoroscopeNavamsamKatamInfo.navam_katam_row_4_col_3">
                                                                <div x-text="choosedStar.horoscope_name"></div>
                                                            </template>
                                                        </div>
                                                    </template>
                                                </button>
                                            </td>
                                            <td class="jathakatam">
                                                <button type="button" class="btn btn-white"
                                                    style="width: 90px ; height:60px">
                                                    <template
                                                        x-if="SingleUserHoroscopeNavamsamKatamInfo.navam_katam_row_4_col_4">
                                                        <div class="d-flex flex-column">
                                                            <template
                                                                x-for="choosedStar in SingleUserHoroscopeNavamsamKatamInfo.navam_katam_row_4_col_4">
                                                                <div x-text="choosedStar.horoscope_name"></div>
                                                            </template>
                                                        </div>
                                                    </template>
                                                </button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </template>
                            <template
                                x-if="userChangeNavaamsamKatam || SingleUserHoroscopeNavamsamKatamInfo.user_jathakam_navamsam_katam_is_filled==0">
                                <table class="table table-bordered mt-4">
                                    <tbody>
                                        <tr>
                                            <td class="jathakatam">
                                                <button type="button" x-on:click="navamsamKatam.row_1.col_1.dOpen=true"
                                                    class="btn btn-white" style="width: 90px ; height:60px">
                                                    <template x-if="navamsamKatam.row_1.col_1.valueChoosed">
                                                        <div class="d-flex flex-column">
                                                            <template
                                                                x-for="choosedStar in navamsamKatam.row_1.col_1.valueChoosed">
                                                                <div x-text="choosedStar"></div>
                                                            </template>
                                                        </div>
                                                    </template>
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-demo"
                                                    x-show="navamsamKatam.row_1.col_1.dOpen">
                                                    <template x-for="horoscope in horoscopeListNavamsam"
                                                        :key="horoscope.id" x-if="!isLoadingHoroscope">
                                                        <button type="button" x-on:click="($el)=>{
                                                            horoscopeListNavamsam=horoscopeListNavamsam.filter( horo => horo.id!=$el.target.id);
                                                            navamsamKatam.row_1.col_1.valueChoosed.push($el.target.value)
                                                                navamsamKatam.row_1.col_1.valueChoosedId.push($el.target.id)
                                                                navamsamKatam.row_1.col_1.dOpen=false
                                                                console.log(navamsamKatam.row_1.col_1.valueChoosed)
                                                            }" x-bind:value="horoscope.horoscope_name"
                                                            x-bind:id="horoscope.id" class="dropdown-item"
                                                            x-text="horoscope.horoscope_name">
                                                        </button>
                                                    </template>
                                                </div>
                                            </td>
                                            <td class="jathakatam">
                                                <button type="button" x-on:click="navamsamKatam.row_1.col_2.dOpen=true"
                                                    class="btn btn-white" style="width: 90px ; height:60px">
                                                    <template x-if="navamsamKatam.row_1.col_2.valueChoosed">
                                                        <div class="d-flex flex-column">
                                                            <template
                                                                x-for="choosedStar in navamsamKatam.row_1.col_2.valueChoosed">
                                                                <div x-text="choosedStar"></div>
                                                            </template>
                                                        </div>
                                                    </template>
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-demo"
                                                    x-show="navamsamKatam.row_1.col_2.dOpen">
                                                    <template x-for="horoscope in horoscopeListNavamsam"
                                                        :key="horoscope.id" x-if="!isLoadingHoroscope">
                                                        <button type="button" x-on:click="($el)=>{
                                                            horoscopeListNavamsam=horoscopeListNavamsam.filter( horo => horo.id!=$el.target.id);
                                                            navamsamKatam.row_1.col_2.valueChoosed.push($el.target.value)
                                                            navamsamKatam.row_1.col_2.valueChoosedId.push($el.target.id)
                                                            navamsamKatam.row_1.col_2.dOpen=false
                                                            console.log(navamsamKatam.row_1.col_2.valueChoosed)
                                                        }" x-bind:value="horoscope.horoscope_name"
                                                            x-bind:id="horoscope.id" class="dropdown-item"
                                                            x-text="horoscope.horoscope_name">
                                                        </button>
                                                    </template>
                                                </div>
                                            </td>
                                            <td class="jathakatam">
                                                <button type="button" x-on:click="navamsamKatam.row_1.col_3.dOpen=true"
                                                    class="btn btn-white" style="width: 90px ; height:60px">
                                                    <template x-if="navamsamKatam.row_1.col_3.valueChoosed">
                                                        <div class="d-flex flex-column">
                                                            <template
                                                                x-for="choosedStar in navamsamKatam.row_1.col_3.valueChoosed">
                                                                <div x-text="choosedStar"></div>
                                                            </template>
                                                        </div>
                                                    </template>
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-demo"
                                                    x-show="navamsamKatam.row_1.col_3.dOpen">
                                                    <template x-for="horoscope in horoscopeListNavamsam"
                                                        :key="horoscope.id" x-if="!isLoadingHoroscope">
                                                        <button type="button" x-on:click="($el)=>{
                                                            horoscopeListNavamsam=horoscopeListNavamsam.filter( horo => horo.id!=$el.target.id);
                                                                navamsamKatam.row_1.col_3.valueChoosed.push($el.target.value)
                                                                navamsamKatam.row_1.col_3.valueChoosedId.push($el.target.id)
                                                                navamsamKatam.row_1.col_3.dOpen=false
                                                                console.log(navamsamKatam.row_1.col_3.valueChoosed)
                                                            }" x-bind:value="horoscope.horoscope_name"
                                                            x-bind:id="horoscope.id" class="dropdown-item"
                                                            x-text="horoscope.horoscope_name">
                                                        </button>
                                                    </template>
                                                </div>
                                            </td>
                                            <td class="jathakatam">
                                                <button type="button" x-on:click="navamsamKatam.row_1.col_4.dOpen=true"
                                                    class="btn btn-white" style="width: 90px ; height:60px">
                                                    <template x-if="navamsamKatam.row_1.col_4.valueChoosed">
                                                        <div class="d-flex flex-column">
                                                            <template
                                                                x-for="choosedStar in navamsamKatam.row_1.col_4.valueChoosed">
                                                                <div x-text="choosedStar"></div>
                                                            </template>
                                                        </div>
                                                    </template>
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-demo"
                                                    x-show="navamsamKatam.row_1.col_4.dOpen">
                                                    <template x-for="horoscope in horoscopeListNavamsam"
                                                        :key="horoscope.id" x-if="!isLoadingHoroscope">
                                                        <button type="button" x-on:click="($el)=>{
                                                            horoscopeListNavamsam=horoscopeListNavamsam.filter( horo => horo.id!=$el.target.id);
                                                                navamsamKatam.row_1.col_4.valueChoosed.push($el.target.value)
                                                                navamsamKatam.row_1.col_4.valueChoosedId.push($el.target.id)
                                                                navamsamKatam.row_1.col_4.dOpen=false
                                                                console.log(navamsamKatam.row_1.col_4.valueChoosed)
                                                            }" x-bind:value="horoscope.horoscope_name"
                                                            x-bind:id="horoscope.id" class="dropdown-item"
                                                            x-text="horoscope.horoscope_name">
                                                        </button>
                                                    </template>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="jathakatam">
                                                <button type="button" x-on:click="navamsamKatam.row_2.col_1.dOpen=true"
                                                    class="btn btn-white" style="width: 90px ; height:60px">
                                                    <template x-if="navamsamKatam.row_2.col_1.valueChoosed">
                                                        <div class="d-flex flex-column">
                                                            <template
                                                                x-for="choosedStar in navamsamKatam.row_2.col_1.valueChoosed">
                                                                <div x-text="choosedStar"></div>
                                                            </template>
                                                        </div>
                                                    </template>
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-demo"
                                                    x-show="navamsamKatam.row_2.col_1.dOpen">
                                                    <template x-for="horoscope in horoscopeListNavamsam"
                                                        :key="horoscope.id" x-if="!isLoadingHoroscope">
                                                        <button type="button" x-on:click="($el)=>{
                                                                horoscopeListNavamsam=horoscopeListNavamsam.filter( horo => horo.id!=$el.target.id);
                                                                navamsamKatam.row_2.col_1.valueChoosed.push($el.target.value)
                                                                navamsamKatam.row_2.col_1.valueChoosedId.push($el.target.id)
                                                                navamsamKatam.row_2.col_1.dOpen=false
                                                                console.log(navamsamKatam.row_2.col_1.valueChoosed)
                                                            }" x-bind:value="horoscope.horoscope_name"
                                                            x-bind:id="horoscope.id" class="dropdown-item"
                                                            x-text="horoscope.horoscope_name">
                                                        </button>
                                                    </template>
                                                </div>
                                            </td>
                                            <td colspan="2" class="bg-dark-lt">
                                                <h4 class="text-center mt-4">Navamsam</h4>
                                            </td>
                                            <td class="jathakatam">
                                                <button type="button" x-on:click="navamsamKatam.row_2.col_4.dOpen=true"
                                                    class="btn btn-white" style="width: 90px ; height:60px">
                                                    <template x-if="navamsamKatam.row_2.col_4.valueChoosed">
                                                        <div class="d-flex flex-column">
                                                            <template
                                                                x-for="choosedStar in navamsamKatam.row_2.col_4.valueChoosed">
                                                                <div x-text="choosedStar"></div>
                                                            </template>
                                                        </div>
                                                    </template>
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-demo"
                                                    x-show="navamsamKatam.row_2.col_4.dOpen">
                                                    <template x-for="horoscope in horoscopeListNavamsam"
                                                        :key="horoscope.id" x-if="!isLoadingHoroscope">
                                                        <button type="button" x-on:click="($el)=>{
                                                            horoscopeListNavamsam=horoscopeListNavamsam.filter( horo => horo.id!=$el.target.id);
                                                                navamsamKatam.row_2.col_4.valueChoosed.push($el.target.value)
                                                                navamsamKatam.row_2.col_4.valueChoosedId.push($el.target.id)
                                                                navamsamKatam.row_2.col_4.dOpen=false
                                                                console.log(navamsamKatam.row_2.col_4.valueChoosed)
                                                            }" x-bind:value="horoscope.horoscope_name"
                                                            x-bind:id="horoscope.id" class="dropdown-item"
                                                            x-text="horoscope.horoscope_name">
                                                        </button>
                                                    </template>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="jathakatam">
                                                <button type="button" x-on:click="navamsamKatam.row_3.col_1.dOpen=true"
                                                    class="btn btn-white" style="width: 90px ; height:60px">
                                                    <template x-if="navamsamKatam.row_3.col_1.valueChoosed">
                                                        <div class="d-flex flex-column">
                                                            <template
                                                                x-for="choosedStar in navamsamKatam.row_3.col_1.valueChoosed">
                                                                <div x-text="choosedStar"></div>
                                                            </template>
                                                        </div>
                                                    </template>
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-demo"
                                                    x-show="navamsamKatam.row_3.col_1.dOpen">
                                                    <template x-for="horoscope in horoscopeListNavamsam"
                                                        :key="horoscope.id" x-if="!isLoadingHoroscope">
                                                        <button type="button" x-on:click="($el)=>{
                                                            horoscopeListNavamsam=horoscopeListNavamsam.filter( horo => horo.id!=$el.target.id);
                                                                navamsamKatam.row_3.col_1.valueChoosed.push($el.target.value)
                                                                navamsamKatam.row_3.col_1.valueChoosedId.push($el.target.id)
                                                                navamsamKatam.row_3.col_1.dOpen=false
                                                                console.log(navamsamKatam.row_3.col_1.valueChoosed)
                                                            }" x-bind:value="horoscope.horoscope_name"
                                                            x-bind:id="horoscope.id" class="dropdown-item"
                                                            x-text="horoscope.horoscope_name">
                                                        </button>
                                                    </template>
                                                </div>
                                            </td>
                                            <td colspan="2" class="bg-dark-lt">
                                                <h4 class="text-center">Chart</h4>
                                            </td>
                                            <td class="jathakatam">
                                                <button type="button" x-on:click="navamsamKatam.row_3.col_4.dOpen=true"
                                                    class="btn btn-white" style="width: 90px ; height:60px">
                                                    <template x-if="navamsamKatam.row_3.col_4.valueChoosed">
                                                        <div class="d-flex flex-column">
                                                            <template
                                                                x-for="choosedStar in navamsamKatam.row_3.col_4.valueChoosed">
                                                                <div x-text="choosedStar"></div>
                                                            </template>
                                                        </div>
                                                    </template>
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-demo"
                                                    x-show="navamsamKatam.row_3.col_4.dOpen">
                                                    <template x-for="horoscope in horoscopeListNavamsam"
                                                        :key="horoscope.id" x-if="!isLoadingHoroscope">
                                                        <button type="button" x-on:click="($el)=>{
                                                            horoscopeListNavamsam=horoscopeListNavamsam.filter( horo => horo.id!=$el.target.id);
                                                                navamsamKatam.row_3.col_4.valueChoosed.push($el.target.value)
                                                                navamsamKatam.row_3.col_4.valueChoosedId.push($el.target.id)
                                                                navamsamKatam.row_3.col_4.dOpen=false
                                                                console.log(navamsamKatam.row_3.col_4.valueChoosed)
                                                            }" x-bind:value="horoscope.horoscope_name"
                                                            x-bind:id="horoscope.id" class="dropdown-item"
                                                            x-text="horoscope.horoscope_name">
                                                        </button>
                                                    </template>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="jathakatam">
                                                <button type="button" x-on:click="navamsamKatam.row_4.col_1.dOpen=true"
                                                    class="btn btn-white" style="width: 90px ; height:60px">
                                                    <template x-if="navamsamKatam.row_4.col_1.valueChoosed">
                                                        <div class="d-flex flex-column">
                                                            <template
                                                                x-for="choosedStar in navamsamKatam.row_4.col_1.valueChoosed">
                                                                <div x-text="choosedStar"></div>
                                                            </template>
                                                        </div>
                                                    </template>
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-demo"
                                                    x-show="navamsamKatam.row_4.col_1.dOpen">
                                                    <template x-for="horoscope in horoscopeListNavamsam"
                                                        :key="horoscope.id" x-if="!isLoadingHoroscope">
                                                        <button type="button" x-on:click="($el)=>{
                                                            horoscopeListNavamsam=horoscopeListNavamsam.filter( horo => horo.id!=$el.target.id);
                                                                navamsamKatam.row_4.col_1.valueChoosed.push($el.target.value)
                                                                navamsamKatam.row_4.col_1.valueChoosedId.push($el.target.id)
                                                                navamsamKatam.row_4.col_1.dOpen=false
                                                                console.log(navamsamKatam.row_4.col_1.valueChoosed)
                                                            }" x-bind:value="horoscope.horoscope_name"
                                                            x-bind:id="horoscope.id" class="dropdown-item"
                                                            x-text="horoscope.horoscope_name">
                                                        </button>
                                                    </template>
                                                </div>
                                            </td>
                                            <td class="jathakatam">
                                                <button type="button" x-on:click="navamsamKatam.row_4.col_2.dOpen=true"
                                                    class="btn btn-white" style="width: 90px ; height:60px">
                                                    <template x-if="navamsamKatam.row_4.col_2.valueChoosed">
                                                        <div class="d-flex flex-column">
                                                            <template
                                                                x-for="choosedStar in navamsamKatam.row_4.col_2.valueChoosed">
                                                                <div x-text="choosedStar"></div>
                                                            </template>
                                                        </div>
                                                    </template>
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-demo"
                                                    x-show="navamsamKatam.row_4.col_2.dOpen">
                                                    <template x-for="horoscope in horoscopeListNavamsam"
                                                        :key="horoscope.id" x-if="!isLoadingHoroscope">
                                                        <button type="button" x-on:click="($el)=>{
                                                            horoscopeListNavamsam=horoscopeListNavamsam.filter( horo => horo.id!=$el.target.id);
                                                              navamsamKatam.row_4.col_2.valueChoosed.push($el.target.value)
                                                            navamsamKatam.row_4.col_2.valueChoosedId.push($el.target.id)
                                                            navamsamKatam.row_4.col_2.dOpen=false
                                                            console.log(navamsamKatam.row_4.col_2.valueChoosed)
                                                        }" x-bind:value="horoscope.horoscope_name"
                                                            x-bind:id="horoscope.id" class="dropdown-item"
                                                            x-text="horoscope.horoscope_name">
                                                        </button>
                                                    </template>
                                                </div>
                                            </td>
                                            <td class="jathakatam">
                                                <button type="button" x-on:click="navamsamKatam.row_4.col_3.dOpen=true"
                                                    class="btn btn-white" style="width: 90px ; height:60px">
                                                    <template x-if="navamsamKatam.row_4.col_3.valueChoosed">
                                                        <div class="d-flex flex-column">
                                                            <template
                                                                x-for="choosedStar in navamsamKatam.row_4.col_3.valueChoosed">
                                                                <div x-text="choosedStar"></div>
                                                            </template>
                                                        </div>
                                                    </template>
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-demo"
                                                    x-show="navamsamKatam.row_4.col_3.dOpen">
                                                    <template x-for="horoscope in horoscopeListNavamsam"
                                                        :key="horoscope.id" x-if="!isLoadingHoroscope">
                                                        <button type="button" x-on:click="($el)=>{
                                                            horoscopeListNavamsam=horoscopeListNavamsam.filter( horo => horo.id!=$el.target.id);
                                                                navamsamKatam.row_4.col_3.valueChoosed.push($el.target.value)
                                                                navamsamKatam.row_4.col_3.valueChoosedId.push($el.target.id)
                                                                navamsamKatam.row_4.col_3.dOpen=false
                                                                console.log(navamsamKatam.row_4.col_3.valueChoosed)
                                                            }" x-bind:value="horoscope.horoscope_name"
                                                            x-bind:id="horoscope.id" class="dropdown-item"
                                                            x-text="horoscope.horoscope_name">
                                                        </button>
                                                    </template>
                                                </div>
                                            </td>
                                            <td class="jathakatam">
                                                <button type="button" x-on:click="navamsamKatam.row_4.col_4.dOpen=true"
                                                    class="btn btn-white" style="width: 90px ; height:60px">
                                                    <template x-if="navamsamKatam.row_4.col_4.valueChoosed">
                                                        <div class="d-flex flex-column">
                                                            <template
                                                                x-for="choosedStar in navamsamKatam.row_4.col_4.valueChoosed">
                                                                <div x-text="choosedStar"></div>
                                                            </template>
                                                        </div>
                                                    </template>
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-demo"
                                                    x-show="navamsamKatam.row_4.col_4.dOpen">
                                                    <template x-for="horoscope in horoscopeListNavamsam"
                                                        :key="horoscope.id" x-if="!isLoadingHoroscope">
                                                        <button type="button" x-on:click="($el)=>{
                                                            horoscopeListNavamsam=horoscopeListNavamsam.filter( horo => horo.id!=$el.target.id);
                                                                navamsamKatam.row_4.col_4.valueChoosed.push($el.target.value)
                                                                navamsamKatam.row_4.col_4.valueChoosedId.push($el.target.id)
                                                                navamsamKatam.row_4.col_4.dOpen=false
                                                                console.log(navamsamKatam.row_4.col_4.valueChoosed)
                                                            }" x-bind:value="horoscope.horoscope_name"
                                                            x-bind:id="horoscope.id" class="dropdown-item"
                                                            x-text="horoscope.horoscope_name">
                                                        </button>
                                                    </template>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </template>
                            <div class="row">
                                <template
                                    x-if="!userChangeNavaamsamKatam ||SingleUserHoroscopeNavamsamKatamInfo.user_jathakam_navamsam_katam_is_filled==1">
                                    <div class="col-6 col-sm-4 col-md-4 col-xl mb-3"
                                        x-on:click="userChangeNavaamsamKatam=true">
                                        <button type="button" class="btn btn-outline-dark w-100">
                                            Change Nav-Katam
                                        </button>
                                    </div>
                                </template>
                                <template
                                    x-if="userChangeRasiKatam ||SingleUserHoroscopeRasiKatamInfo.user_jathakam_rasi_katam_is_filled==0">
                                    <div class="col-6 col-sm-4 col-md-4 col-xl mb-3">
                                        <button x-on:click="resetNavamsamKatam" type="button"
                                            class="btn btn-outline-danger w-100">
                                            Reset
                                        </button>
                                    </div>
                                </template>
                                <template
                                    x-if="userChangeNavaamsamKatam ||SingleUserHoroscopeNavamsamKatamInfo.user_jathakam_navamsam_katam_is_filled==0">
                                    <div class="col-6 col-sm-4 col-md-4 col-xl mb-3">
                                        <button x-on:click="updateUserNavamsamJathakamInformation" type="button"
                                            class="btn btn-outline-success w-100">
                                            Save Nav-Katam
                                        </button>
                                    </div>
                                </template>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- End user jathagam Navamsam katam start --}}
            <hr>
            <div class="row">
                <div class="d-flex justify-content-center">
                    <h3>OR</h3>
                </div>
            </div>
            {{-- user jathakam image upload section --}}
            <div class="row mt-5">
                <div class="col-md-6 offset-3">
                    <template x-if="SingleUserHoroscopeImageInfo.user_jathakam_image_is_uploaded==1">
                        <div class="card card-sm">
                            <a href="#" class="d-block"><img
                                    :src="SingleUserHoroscopeImageInfo.user_jathakam_image"
                                    class="card-img-top"></a>
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <button type="button"
                                        x-on:click="SingleUserHoroscopeImageInfo.user_jathakam_image_is_uploaded=0"
                                        class="btn btn-outline-dark w-100">
                                        Change Jathakam Image
                                    </button>
                                </div>
                            </div>
                        </div>
                    </template>
                    <template
                        x-if="SingleUserHoroscopeImageInfo.user_jathakam_image_is_uploaded==0 && userJathakamImage">
                        <div class="card card-sm">
                            <a href="#" class="d-block"><img :src="userJathakamImageChoosed"
                                    class="card-img-top"></a>
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <button type="button" x-on:click="uploadUserJathakamImage"
                                        class="btn btn-outline-dark w-100">
                                        Upload Jathakam Image
                                    </button>
                                </div>
                            </div>
                        </div>
                    </template>
                    <template x-if="SingleUserHoroscopeImageInfo.user_jathakam_image_is_uploaded==0">
                        <div class="form-group mb-3 ">
                            <label class="form-label ">
                                <h3>Jathaka
                                    image</h3> * (.jpeg,jpg,png)
                            </label>
                            <div class="">
                                <input x-model="userJathakamImage" x-on:change="fileChosen" type="file"
                                    class="form-control">
                            </div>
                        </div>
                    </template>
                </div>
            </div>
            {{-- End  user jathakam image upload section --}}
        </div>
        <div class="card-footer">
            <div class="d-flex justify-content-end ">
                <button type="button" x-on:click="uploadUserJathakamImage" class="btn btn-success w-25">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-device-floppy"
                        width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
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
</div>
