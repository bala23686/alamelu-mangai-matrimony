<div id="horoscope" class="accordion-collapse collapse" aria-labelledby="headingThree"
    data-bs-parent="#accordionExample">
    <div class="accordion-body">
        <div class="profile-setting-form p-3">
            <style>
                .dropdown-menu {
                    position: absolute;
                    z-index: 1000;
                    display: none;
                    min-width: 10rem;
                    padding: .5rem 0;
                    margin: 0;
                    font-size: 1rem;
                    color: #212529;
                    text-align: left;
                    list-style: none;
                    background-color: #fff;
                    background-clip: padding-box;
                    border: 1px solid rgba(0, 0, 0, .15);
                    border-radius: .25rem;
                }

                .dropdown-menu-demo {
                    display: inline-block;
                    width: 100%;
                    position: relative;
                    top: 0;
                    margin-bottom: 1rem;
                }

                td {
                    width: 80px;
                    height: 80px;
                    vertical-align: middle;
                    word-wrap: break-word;
                }

                .clear-btn {
                    position: absolute;
                    background: #dc3545;
                    padding: revert;
                    border: none;
                    border-radius: 3px;
                    color: white;
                }

                textarea {
                    text-align: center;
                }

            </style>

            <div id="tab-top-3" x-data="{
                horoscopeList: [],
                horoscopeListView: [],
                horoscopeListNavamsam: [],
                userJathakamImage: '',
                userJathakamImageChoosed: '',
                isLoadingHoroscope: true,
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
                    user_jathakam_image_is_uploaded: '{{ $user_data['user_info']->profile_jakt_info_status == 1 ? $user_data['user_Horoscope_info']->user_jathakam_image_is_uploaded : 0 }}',
                    user_jathakam_image: '{{ $user_data['user_info']->profile_jakt_info_status == 1 ? $user_data['user_Horoscope_info']->jathakamFullImagePath : 0 }}',
                },

                SingleUserHoroscopeRasiKatamInfo: {
                    user_jathakam_rasi_katam_is_filled: '{{ $user_data['user_info']->profile_jakt_info_status == 1 ? $user_data['user_Horoscope_info']->user_jathakam_rasi_katam_is_filled : 0 }}',
                    rasi_katam_row_1_col_1: {{ $user_data['user_info']->profile_jakt_info_status == 1 ? $user_data['user_Horoscope_info']->rasi_katam_row_1_col_1 : "''" }},
                    rasi_katam_row_1_col_2: {{ $user_data['user_info']->profile_jakt_info_status == 1 ? $user_data['user_Horoscope_info']->rasi_katam_row_1_col_2 : "''" }},
                    rasi_katam_row_1_col_3: {{ $user_data['user_info']->profile_jakt_info_status == 1 ? $user_data['user_Horoscope_info']->rasi_katam_row_1_col_3 : "''" }},
                    rasi_katam_row_1_col_4: {{ $user_data['user_info']->profile_jakt_info_status == 1 ? $user_data['user_Horoscope_info']->rasi_katam_row_1_col_4 : "''" }},
                    rasi_katam_row_2_col_1: {{ $user_data['user_info']->profile_jakt_info_status == 1 ? $user_data['user_Horoscope_info']->rasi_katam_row_2_col_1 : "''" }},
                    rasi_katam_row_2_col_4: {{ $user_data['user_info']->profile_jakt_info_status == 1 ? $user_data['user_Horoscope_info']->rasi_katam_row_2_col_4 : "''" }},
                    rasi_katam_row_3_col_1: {{ $user_data['user_info']->profile_jakt_info_status == 1 ? $user_data['user_Horoscope_info']->rasi_katam_row_3_col_1 : "''" }},
                    rasi_katam_row_3_col_4: {{ $user_data['user_info']->profile_jakt_info_status == 1 ? $user_data['user_Horoscope_info']->rasi_katam_row_3_col_4 : "''" }},
                    rasi_katam_row_4_col_1: {{ $user_data['user_info']->profile_jakt_info_status == 1 ? $user_data['user_Horoscope_info']->rasi_katam_row_4_col_1 : "''" }},
                    rasi_katam_row_4_col_2: {{ $user_data['user_info']->profile_jakt_info_status == 1 ? $user_data['user_Horoscope_info']->rasi_katam_row_4_col_2 : "''" }},
                    rasi_katam_row_4_col_3: {{ $user_data['user_info']->profile_jakt_info_status == 1 ? $user_data['user_Horoscope_info']->rasi_katam_row_4_col_3 : "''" }},
                    rasi_katam_row_4_col_4: {{ $user_data['user_info']->profile_jakt_info_status == 1 ? $user_data['user_Horoscope_info']->rasi_katam_row_4_col_4 : "''" }},
                },

                SingleUserHoroscopeNavamsamKatamInfo: {
                    user_jathakam_navamsam_katam_is_filled: '{{ $user_data['user_info']->profile_jakt_info_status == 1 ? $user_data['user_Horoscope_info']->user_jathakam_navamsam_katam_is_filled : 0 }}',
                    navam_katam_row_1_col_1: {{ $user_data['user_info']->profile_jakt_info_status == 1 ? $user_data['user_Horoscope_info']->navam_katam_row_1_col_1 : "''" }},
                    navam_katam_row_1_col_2: {{ $user_data['user_info']->profile_jakt_info_status == 1 ? $user_data['user_Horoscope_info']->navam_katam_row_1_col_2 : "''" }},
                    navam_katam_row_1_col_3: {{ $user_data['user_info']->profile_jakt_info_status == 1 ? $user_data['user_Horoscope_info']->navam_katam_row_1_col_3 : "''" }},
                    navam_katam_row_1_col_4: {{ $user_data['user_info']->profile_jakt_info_status == 1 ? $user_data['user_Horoscope_info']->navam_katam_row_1_col_4 : "''" }},
                    navam_katam_row_2_col_1: {{ $user_data['user_info']->profile_jakt_info_status == 1 ? $user_data['user_Horoscope_info']->navam_katam_row_2_col_1 : "''" }},
                    navam_katam_row_2_col_4: {{ $user_data['user_info']->profile_jakt_info_status == 1 ? $user_data['user_Horoscope_info']->navam_katam_row_2_col_4 : "''" }},
                    navam_katam_row_3_col_1: {{ $user_data['user_info']->profile_jakt_info_status == 1 ? $user_data['user_Horoscope_info']->navam_katam_row_3_col_1 : "''" }},
                    navam_katam_row_3_col_4: {{ $user_data['user_info']->profile_jakt_info_status == 1 ? $user_data['user_Horoscope_info']->navam_katam_row_3_col_4 : "''" }},
                    navam_katam_row_4_col_1: {{ $user_data['user_info']->profile_jakt_info_status == 1 ? $user_data['user_Horoscope_info']->navam_katam_row_4_col_1 : "''" }},
                    navam_katam_row_4_col_2: {{ $user_data['user_info']->profile_jakt_info_status == 1 ? $user_data['user_Horoscope_info']->navam_katam_row_4_col_2 : "''" }},
                    navam_katam_row_4_col_3: {{ $user_data['user_info']->profile_jakt_info_status == 1 ? $user_data['user_Horoscope_info']->navam_katam_row_4_col_3 : "''" }},
                    navam_katam_row_4_col_4: {{ $user_data['user_info']->profile_jakt_info_status == 1 ? $user_data['user_Horoscope_info']->navam_katam_row_4_col_4 : "''" }},
                },
                resetJathakaKatam() {
                    this.rasiKatam = {}
                    this.horoscopeListView = this.horoscopeList
                    this.rasiKatam = {
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
                resetNavamsamKatam() {
                    this.navamsamKatam = {}
                    this.horoscopeListNavamsam = this.horoscopeList
                    this.navamsamKatam = {
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

                                return ({
                                    ...horoInfo,
                                    isChoosed: false
                                })
                            })
                            this.isLoadingHoroscope = false
                        })
                },

                {{-- UPDATE JATHAKA KATTAM --}}
                updateUserRasiJathakamInformation() {

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

                    axios.put('{{ route('userRasiKatamUpdate', $user_data['user_info']) }}', data)
                        .then(e => {
                            console.log(e)
                            if (e.status == 201) {
                                toastr.success('Kattam Updated successfully');
                            }
                        })
                },

                {{-- UPDATE NAVAMSAM KATTAM --}}
                updateUserNavamsamJathakamInformation() {
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

                    axios.put('{{ route('userRasiNavamsamUpdate', $user_data['user_info']) }}',
                            data)
                        .then(e => {
                            if (e.status == 201) {
                                toastr.success('Kattam Updated successfully');
                            }
                        })
                },

                {{-- UPLOAD USER IMAGE --}}
                uploadUserJathakamImage() {

                    let data = new FormData()

                    data.append('user_jathakam_image', this.userJathakamImage)

                    axios.post('{{ route('updateUserHoroscopeImage', $user_data['user_info']) }}',
                            data)
                        .then(e => {
                            console.log(e)
                            if (e.status == 201) {
                                toastr.success('Iamge Uploaded successfully');
                            }
                        })
                },
            }" x-init="loadHoroscopeList();">

                <template x-if="isLoadingHoroscope">
                    <div class="mb-3">
                        <label class="form-label">Loading....</label>
                        <div class="progress">
                            <div class="progress-bar progress-bar-indeterminate bg-dark"></div>
                        </div>
                    </div>
                </template>
                {{-- USER JATHAGAM RASI KATAM START --}}
                <div class="row justify-content-center">
                    <h4 class="fw-normal text-center">Jathaka
                        Katam (RASI)</h4>
                    <!-- VIEW RASI KATTAM START -->
                    <template x-if="SingleUserHoroscopeRasiKatamInfo.user_jathakam_rasi_katam_is_filled==1">
                        <div class="col-md-6 text-center">
                            <table class="table table-bordered mt-4">
                                <tbody>
                                    <tr>
                                        <td class="jathakatam small text-center">
                                            <template x-if="SingleUserHoroscopeRasiKatamInfo.rasi_katam_row_1_col_1">
                                                <div class="d-flex flex-column">
                                                    <template
                                                        x-for="choosedStar in SingleUserHoroscopeRasiKatamInfo.rasi_katam_row_1_col_1">
                                                        <div x-text="choosedStar.horoscope_name"></div>
                                                    </template>
                                                </div>
                                            </template>
                                        </td>
                                        <td class="jathakatam small text-center align-center">
                                            <template x-if="SingleUserHoroscopeRasiKatamInfo.rasi_katam_row_1_col_2">
                                                <div class="d-flex flex-column">
                                                    <template
                                                        x-for="choosedStar in SingleUserHoroscopeRasiKatamInfo.rasi_katam_row_1_col_2">
                                                        <div x-text="choosedStar.horoscope_name"></div>
                                                    </template>
                                                </div>
                                            </template>
                                        </td>
                                        <td class="jathakatam  small text-center align-center">
                                            <template x-if="SingleUserHoroscopeRasiKatamInfo.rasi_katam_row_1_col_3">
                                                <div class="d-flex flex-column">
                                                    <template
                                                        x-for="choosedStar in SingleUserHoroscopeRasiKatamInfo.rasi_katam_row_1_col_3">
                                                        <div x-text="choosedStar.horoscope_name"></div>
                                                    </template>
                                                </div>
                                            </template>
                                        </td>
                                        <td class="jathakatam small text-center align-center">
                                            <template x-if="SingleUserHoroscopeRasiKatamInfo.rasi_katam_row_1_col_4">
                                                <div class="d-flex flex-column">
                                                    <template
                                                        x-for="choosedStar in SingleUserHoroscopeRasiKatamInfo.rasi_katam_row_1_col_4">
                                                        <div x-text="choosedStar.horoscope_name"></div>
                                                    </template>
                                                </div>
                                            </template>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="jathakatam small text-center align-center">
                                            <template x-if="SingleUserHoroscopeRasiKatamInfo.rasi_katam_row_2_col_1">
                                                <div class="d-flex flex-column">
                                                    <template
                                                        x-for="choosedStar in SingleUserHoroscopeRasiKatamInfo.rasi_katam_row_2_col_1">
                                                        <div x-text="choosedStar.horoscope_name"></div>
                                                    </template>
                                                </div>
                                            </template>
                                        </td>
                                        <td colspan="2" class="bg-dark-lt align-middle">
                                            <h4 class="fw-light text-center">RASI</h4>
                                        </td>
                                        <td class="jathakatam small text-center align-center">
                                            <template x-if="SingleUserHoroscopeRasiKatamInfo.rasi_katam_row_2_col_4">
                                                <div class="d-flex flex-column">
                                                    <template
                                                        x-for="choosedStar in SingleUserHoroscopeRasiKatamInfo.rasi_katam_row_2_col_4">
                                                        <div x-text="choosedStar.horoscope_name"></div>
                                                    </template>
                                                </div>
                                            </template>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="jathakatam small text-center align-center">
                                            <template x-if="SingleUserHoroscopeRasiKatamInfo.rasi_katam_row_3_col_1">
                                                <div class="d-flex flex-column">
                                                    <template
                                                        x-for="choosedStar in SingleUserHoroscopeRasiKatamInfo.rasi_katam_row_3_col_1">
                                                        <div x-text="choosedStar.horoscope_name"></div>
                                                    </template>
                                                </div>
                                            </template>
                                        </td>
                                        <td colspan="2" class="bg-dark-lt align-middle">
                                            <h4 class="fw-light text-center">CHART</h4>
                                        </td>
                                        <td class="jathakatam small text-center align-center">
                                            <template x-if="SingleUserHoroscopeRasiKatamInfo.rasi_katam_row_3_col_4">
                                                <div class="d-flex flex-column">
                                                    <template
                                                        x-for="choosedStar in SingleUserHoroscopeRasiKatamInfo.rasi_katam_row_3_col_4">
                                                        <div x-text="choosedStar.horoscope_name"></div>
                                                    </template>
                                                </div>
                                            </template>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="jathakatam small text-center align-center">
                                            <template x-if="SingleUserHoroscopeRasiKatamInfo.rasi_katam_row_4_col_1">
                                                <div class="d-flex flex-column">
                                                    <template
                                                        x-for="choosedStar in SingleUserHoroscopeRasiKatamInfo.rasi_katam_row_4_col_1">
                                                        <div x-text="choosedStar.horoscope_name"></div>
                                                    </template>
                                                </div>
                                            </template>
                                        </td>
                                        <td class="jathakatam small text-center align-center">
                                            <template x-if="SingleUserHoroscopeRasiKatamInfo.rasi_katam_row_4_col_2">
                                                <div class="d-flex flex-column">
                                                    <template
                                                        x-for="choosedStar in SingleUserHoroscopeRasiKatamInfo.rasi_katam_row_4_col_2">
                                                        <div x-text="choosedStar.horoscope_name"></div>
                                                    </template>
                                                </div>
                                            </template>
                                        </td>
                                        <td class="jathakatam small text-center align-center">
                                            <template x-if="SingleUserHoroscopeRasiKatamInfo.rasi_katam_row_4_col_3">
                                                <div class="d-flex flex-column">
                                                    <template
                                                        x-for="choosedStar in SingleUserHoroscopeRasiKatamInfo.rasi_katam_row_4_col_3">
                                                        <div x-text="choosedStar.horoscope_name"></div>
                                                    </template>
                                                </div>
                                            </template>
                                        </td>
                                        <td class="jathakatam small text-center align-center">
                                            <template x-if="SingleUserHoroscopeRasiKatamInfo.rasi_katam_row_4_col_4">
                                                <div class="d-flex flex-column">
                                                    <template
                                                        x-for="choosedStar in SingleUserHoroscopeRasiKatamInfo.rasi_katam_row_4_col_4">
                                                        <div x-text="choosedStar.horoscope_name"></div>
                                                    </template>
                                                </div>
                                            </template>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </template>
                    <!-- VIEW RASI KATTAM END -->

                    <!-- UPDATE RASI KATTAM START -->
                    <template
                        x-if="userChangeRasiKatam || SingleUserHoroscopeRasiKatamInfo.user_jathakam_rasi_katam_is_filled==0">
                        <div class="col-md-6">
                            <table class="table table-bordered mt-4">
                                <tbody>
                                    <tr>
                                        <td class="jathakatam">
                                            <div class="text-center">
                                                <div class="dropdown">

                                                    <template x-if="rasiKatam.row_1.col_1.valueChoosed">
                                                        <a class="" href="#" role="button"
                                                            id="dropdownMenuLink" data-bs-toggle="dropdown"
                                                            aria-expanded="false">
                                                            <div class="">
                                                                <textarea id="area" class="form-control" style="font-size: 0.9em" x-text="rasiKatam.row_1.col_1.valueChoosed.join(',')"
                                                                    cols="8" rows="1" readonly
                                                                    placeholder="Select Star"></textarea>
                                                            </div>
                                                        </a>
                                                    </template>
                                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                        <template x-for="horoscope in horoscopeListView"
                                                            :key="horoscope.id" x-if="!isLoadingHoroscope">
                                                            <li class="small"><a class="dropdown-item"
                                                                    x-on:click="($el)=>{
                                                    horoscopeListView=horoscopeListView.filter( horo => horo.id!=$el.target.id);
                                                          rasiKatam.row_1.col_1.valueChoosed.push($el.target.value)
                                                        rasiKatam.row_1.col_1.valueChoosedId.push($el.target.id)
                                                        rasiKatam.row_1.col_1.dOpen=false
                                                    }" x-bind:value="horoscope.horoscope_name"
                                                                    x-bind:id="horoscope.id" class="dropdown-item"
                                                                    x-text="horoscope.horoscope_name">
                                                                </a></li>
                                                        </template>
                                                    </ul>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="jathakatam">
                                            <div class="text-center">
                                                <div class="dropdown">
                                                    <template x-if="rasiKatam.row_1.col_2.valueChoosed">
                                                        <a class="" href="#" role="button"
                                                            id="dropdownMenuLink" data-bs-toggle="dropdown"
                                                            aria-expanded="false">
                                                            <div class="">
                                                                <textarea class="form-control" style="font-size: 0.9em" x-text="rasiKatam.row_1.col_2.valueChoosed.join(',')" cols="8"
                                                                    rows="1" readonly
                                                                    placeholder="Select Star"></textarea>
                                                            </div>
                                                        </a>
                                                    </template>
                                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                        <template x-for="horoscope in horoscopeListView"
                                                            :key="horoscope.id" x-if="!isLoadingHoroscope">
                                                            <li class="small"><a class="dropdown-item"
                                                                    x-on:click="($el)=>{
                                                                            horoscopeListView=horoscopeListView.filter( horo => horo.id!=$el.target.id);
                                                                            rasiKatam.row_1.col_2.valueChoosed.push($el.target.value)
                                                                            rasiKatam.row_1.col_2.valueChoosedId.push($el.target.id)
                                                                            rasiKatam.row_1.col_2.dOpen=false
                                                                            console.log(rasiKatam.row_1.col_2.valueChoosed)
                                                                        }" x-bind:value="horoscope.horoscope_name"
                                                                    x-bind:id="horoscope.id" class="dropdown-item"
                                                                    x-text="horoscope.horoscope_name">
                                                                </a></li>
                                                        </template>
                                                    </ul>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="jathakatam">
                                            <div class="text-center">
                                                <div class="dropdown">
                                                    <template x-if="rasiKatam.row_1.col_3.valueChoosed">
                                                        <a class="" href="#" role="button"
                                                            id="dropdownMenuLink" data-bs-toggle="dropdown"
                                                            aria-expanded="false">
                                                            <div class="">
                                                                <textarea class="form-control" style="font-size: 0.9em" x-text="rasiKatam.row_1.col_3.valueChoosed.join(',')" cols="8"
                                                                    rows="1" readonly
                                                                    placeholder="Select Star"></textarea>

                                                            </div>
                                                        </a>
                                                    </template>
                                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                        <template x-for="horoscope in horoscopeListView"
                                                            :key="horoscope.id" x-if="!isLoadingHoroscope">
                                                            <li class="small"><a class="dropdown-item"
                                                                    x-on:click="($el)=>{
                                                                            horoscopeListView=horoscopeListView.filter( horo => horo.id!=$el.target.id);
                                                                            rasiKatam.row_1.col_3.valueChoosed.push($el.target.value)
                                                                            rasiKatam.row_1.col_3.valueChoosedId.push($el.target.id)
                                                                            rasiKatam.row_1.col_3.dOpen=false
                                                                            console.log(rasiKatam.row_1.col_3.valueChoosed)
                                                                        }" x-bind:value="horoscope.horoscope_name"
                                                                    x-bind:id="horoscope.id" class="dropdown-item"
                                                                    x-text="horoscope.horoscope_name">
                                                                </a></li>
                                                        </template>
                                                    </ul>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="jathakatam">
                                            <div class="text-center">
                                                <div class="dropdown">
                                                    <template x-if="rasiKatam.row_1.col_4.valueChoosed">
                                                        <a class="" href="#" role="button"
                                                            id="dropdownMenuLink" data-bs-toggle="dropdown"
                                                            aria-expanded="false">
                                                            <div class="">
                                                                <textarea class="form-control" style="font-size: 0.9em" x-text="rasiKatam.row_1.col_4.valueChoosed.join(',')" cols="8"
                                                                    rows="1" readonly
                                                                    placeholder="Select Star"></textarea>

                                                            </div>
                                                        </a>
                                                    </template>
                                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                        <template x-for="horoscope in horoscopeListView"
                                                            :key="horoscope.id" x-if="!isLoadingHoroscope">
                                                            <li class="small"><a class="dropdown-item"
                                                                    x-on:click="($el)=>{
                                                                            horoscopeListView=horoscopeListView.filter( horo => horo.id!=$el.target.id);
                                                                            rasiKatam.row_1.col_4.valueChoosed.push($el.target.value)
                                                                            rasiKatam.row_1.col_4.valueChoosedId.push($el.target.id)
                                                                            rasiKatam.row_1.col_4.dOpen=false
                                                                            console.log(rasiKatam.row_1.col_4.valueChoosed)
                                                                        }" x-bind:value="horoscope.horoscope_name"
                                                                    x-bind:id="horoscope.id" class="dropdown-item"
                                                                    x-text="horoscope.horoscope_name">
                                                                </a></li>
                                                        </template>
                                                    </ul>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="jathakatam">
                                            <div class="text-center">
                                                <div class="dropdown">
                                                    <template x-if="rasiKatam.row_2.col_1.valueChoosed">
                                                        <a class="" href="#" role="button"
                                                            id="dropdownMenuLink" data-bs-toggle="dropdown"
                                                            aria-expanded="false">
                                                            <div class="">
                                                                <textarea class="form-control" style="font-size: 0.9em" x-text="rasiKatam.row_2.col_1.valueChoosed.join(',')" cols="8"
                                                                    rows="1" readonly
                                                                    placeholder="Select Star"></textarea>

                                                            </div>
                                                        </a>
                                                    </template>
                                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                        <template x-for="horoscope in horoscopeListView"
                                                            :key="horoscope.id" x-if="!isLoadingHoroscope">
                                                            <li class="small"><a class="dropdown-item"
                                                                    x-on:click="($el)=>{
                                                                        horoscopeListView=horoscopeListView.filter( horo => horo.id!=$el.target.id);
                                                                        rasiKatam.row_2.col_1.valueChoosed.push($el.target.value)
                                                                        rasiKatam.row_2.col_1.valueChoosedId.push($el.target.id)
                                                                        rasiKatam.row_2.col_1.dOpen=false
                                                                        console.log(rasiKatam.row_2.col_1.valueChoosed)
                                                                    }" x-bind:value="horoscope.horoscope_name"
                                                                    x-bind:id="horoscope.id" class="dropdown-item"
                                                                    x-text="horoscope.horoscope_name">
                                                                </a></li>
                                                        </template>
                                                    </ul>
                                                </div>
                                            </div>
                                        </td>
                                        <td colspan="2" class="bg-dark-lt align-middle">
                                            <h4 class="fw-light text-center">RASI</h4>
                                        </td>
                                        <td class="jathakatam">
                                            <div class="text-center">
                                                <div class="dropdown">
                                                    <template x-if="rasiKatam.row_2.col_4.valueChoosed">
                                                        <a class="" href="#" role="button"
                                                            id="dropdownMenuLink" data-bs-toggle="dropdown"
                                                            aria-expanded="false">
                                                            <div class="">
                                                                <textarea class="form-control" style="font-size: 0.9em" x-text="rasiKatam.row_2.col_4.valueChoosed.join(',')" cols="8"
                                                                    rows="1" readonly
                                                                    placeholder="Select Star"></textarea>

                                                            </div>
                                                        </a>
                                                    </template>
                                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                        <template x-for="horoscope in horoscopeListView"
                                                            :key="horoscope.id" x-if="!isLoadingHoroscope">
                                                            <li class="small"><a class="dropdown-item"
                                                                    x-on:click="($el)=>{
                                                                        horoscopeListView=horoscopeListView.filter( horo => horo.id!=$el.target.id);
                                                                        rasiKatam.row_2.col_4.valueChoosed.push($el.target.value)
                                                                        rasiKatam.row_2.col_4.valueChoosedId.push($el.target.id)
                                                                        rasiKatam.row_2.col_4.dOpen=false
                                                                        console.log(rasiKatam.row_2.col_4.valueChoosed)
                                                                    }" x-bind:value="horoscope.horoscope_name"
                                                                    x-bind:id="horoscope.id"
                                                                    class="dropdown-item"
                                                                    x-text="horoscope.horoscope_name">
                                                                </a></li>
                                                        </template>
                                                    </ul>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="jathakatam">
                                            <div class="text-center">
                                                <div class="dropdown">
                                                    <template x-if="rasiKatam.row_3.col_1.valueChoosed">
                                                        <a class="" href="#" role="button"
                                                            id="dropdownMenuLink" data-bs-toggle="dropdown"
                                                            aria-expanded="false">
                                                            <div class="">
                                                                <textarea class="form-control" style="font-size: 0.9em" x-text="rasiKatam.row_3.col_1.valueChoosed.join(',')"
                                                                    cols="8" rows="1" readonly
                                                                    placeholder="Select Star"></textarea>

                                                            </div>
                                                        </a>
                                                    </template>
                                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                        <template x-for="horoscope in horoscopeListView"
                                                            :key="horoscope.id" x-if="!isLoadingHoroscope">
                                                            <li class="small"><a class="dropdown-item"
                                                                    x-on:click="($el)=>{
                                                                        horoscopeListView=horoscopeListView.filter( horo => horo.id!=$el.target.id);
                                                                        rasiKatam.row_3.col_1.valueChoosed.push($el.target.value)
                                                                        rasiKatam.row_3.col_1.valueChoosedId.push($el.target.id)
                                                                        rasiKatam.row_3.col_1.dOpen=false
                                                                        console.log(rasiKatam.row_3.col_1.valueChoosed)
                                                                    }" x-bind:value="horoscope.horoscope_name"
                                                                    x-bind:id="horoscope.id"
                                                                    class="dropdown-item"
                                                                    x-text="horoscope.horoscope_name">
                                                                </a></li>
                                                        </template>
                                                    </ul>
                                                </div>
                                            </div>
                                        </td>
                                        <td colspan="2" class="bg-dark-lt align-middle">
                                            <h4 class="fw-light text-center">CHART</h4>
                                        </td>
                                        <td class="jathakatam">
                                            <div class="text-center">
                                                <div class="dropdown">
                                                    <template x-if="rasiKatam.row_3.col_4.valueChoosed">
                                                        <a class="" href="#" role="button"
                                                            id="dropdownMenuLink" data-bs-toggle="dropdown"
                                                            aria-expanded="false">
                                                            <div class="">
                                                                <textarea class="form-control" style="font-size: 0.9em" x-text="rasiKatam.row_3.col_4.valueChoosed.join(',')"
                                                                    cols="8" rows="1" readonly
                                                                    placeholder="Select Star"></textarea>

                                                            </div>
                                                        </a>
                                                    </template>
                                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                        <template x-for="horoscope in horoscopeListView"
                                                            :key="horoscope.id" x-if="!isLoadingHoroscope">
                                                            <li class="small"><a class="dropdown-item"
                                                                    x-on:click="($el)=>{
                                                                        horoscopeListView=horoscopeListView.filter( horo => horo.id!=$el.target.id);
                                                                        rasiKatam.row_3.col_4.valueChoosed.push($el.target.value)
                                                                        rasiKatam.row_3.col_4.valueChoosedId.push($el.target.id)
                                                                        rasiKatam.row_3.col_4.dOpen=false
                                                                        console.log(rasiKatam.row_3.col_4.valueChoosed)
                                                                    }" x-bind:value="horoscope.horoscope_name"
                                                                    x-bind:id="horoscope.id"
                                                                    class="dropdown-item"
                                                                    x-text="horoscope.horoscope_name">
                                                                </a></li>
                                                        </template>
                                                    </ul>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="jathakatam">
                                            <div class="text-center">
                                                <div class="dropdown">
                                                    <template x-if="rasiKatam.row_4.col_1.valueChoosed">
                                                        <a class="" href="#" role="button"
                                                            id="dropdownMenuLink" data-bs-toggle="dropdown"
                                                            aria-expanded="false">
                                                            <div class="">
                                                                <textarea class="form-control" style="font-size: 0.9em" x-text="rasiKatam.row_4.col_1.valueChoosed.join(',')"
                                                                    cols="8" rows="1" readonly
                                                                    placeholder="Select Star"></textarea>

                                                            </div>
                                                        </a>
                                                    </template>
                                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                        <template x-for="horoscope in horoscopeListView"
                                                            :key="horoscope.id" x-if="!isLoadingHoroscope">
                                                            <li class="small"><a class="dropdown-item"
                                                                    x-on:click="($el)=>{
                                                                        horoscopeListView=horoscopeListView.filter( horo => horo.id!=$el.target.id);
                                                                        rasiKatam.row_4.col_1.valueChoosed.push($el.target.value)
                                                                        rasiKatam.row_4.col_1.valueChoosedId.push($el.target.id)
                                                                        rasiKatam.row_4.col_1.dOpen=false
                                                                        console.log(rasiKatam.row_4.col_1.valueChoosed)
                                                                    }" x-bind:value="horoscope.horoscope_name"
                                                                    x-bind:id="horoscope.id"
                                                                    class="dropdown-item"
                                                                    x-text="horoscope.horoscope_name">
                                                                </a></li>
                                                        </template>
                                                    </ul>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="jathakatam">
                                            <div class="dropdown">
                                                <template x-if="rasiKatam.row_4.col_2.valueChoosed">
                                                    <a class="" href="#" role="button"
                                                        id="dropdownMenuLink" data-bs-toggle="dropdown"
                                                        aria-expanded="false">
                                                        <div class="">
                                                            <textarea class="form-control" style="font-size: 0.9em" x-text="rasiKatam.row_4.col_2.valueChoosed.join(',')"
                                                                cols="8" rows="1" readonly
                                                                placeholder="Select Star"></textarea>

                                                        </div>
                                                    </a>
                                                </template>
                                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                    <template x-for="horoscope in horoscopeListView"
                                                        :key="horoscope.id" x-if="!isLoadingHoroscope">
                                                        <li class="small"><a class="dropdown-item"
                                                                x-on:click="($el)=>{
                                                                    horoscopeListView=horoscopeListView.filter( horo => horo.id!=$el.target.id);
                                                                    rasiKatam.row_4.col_2.valueChoosed.push($el.target.value)
                                                                    rasiKatam.row_4.col_2.valueChoosedId.push($el.target.id)
                                                                    rasiKatam.row_4.col_2.dOpen=false
                                                                    console.log(rasiKatam.row_4.col_2.valueChoosed)
                                                                }" x-bind:value="horoscope.horoscope_name"
                                                                x-bind:id="horoscope.id" class="dropdown-item"
                                                                x-text="horoscope.horoscope_name">
                                                            </a></li>
                                                    </template>
                                                </ul>
                                            </div>
                                        </td>
                                        <td class="jathakatam">
                                            <div class="dropdown">
                                                <template x-if="rasiKatam.row_4.col_3.valueChoosed">
                                                    <a class="" href="#" role="button"
                                                        id="dropdownMenuLink" data-bs-toggle="dropdown"
                                                        aria-expanded="false">
                                                        <div class="">
                                                            <textarea class="form-control" style="font-size: 0.9em" x-text="rasiKatam.row_4.col_3.valueChoosed.join(',')"
                                                                cols="8" rows="1" readonly
                                                                placeholder="Select Star"></textarea>

                                                        </div>
                                                    </a>
                                                </template>
                                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                    <template x-for="horoscope in horoscopeListView"
                                                        :key="horoscope.id" x-if="!isLoadingHoroscope">
                                                        <li class="small"><a class="dropdown-item"
                                                                x-on:click="($el)=>{
                                                                    horoscopeListView=horoscopeListView.filter( horo => horo.id!=$el.target.id);
                                                                    rasiKatam.row_4.col_3.valueChoosed.push($el.target.value)
                                                                    rasiKatam.row_4.col_3.valueChoosedId.push($el.target.id)
                                                                    rasiKatam.row_4.col_3.dOpen=false
                                                                    console.log(rasiKatam.row_4.col_3.valueChoosed)
                                                                }" x-bind:value="horoscope.horoscope_name"
                                                                x-bind:id="horoscope.id" class="dropdown-item"
                                                                x-text="horoscope.horoscope_name">
                                                            </a></li>
                                                    </template>
                                                </ul>
                                            </div>
                                        </td>
                                        <td class="jathakatam">
                                            <div class="dropdown">
                                                <template x-if="rasiKatam.row_4.col_4.valueChoosed">
                                                    <a class="" href="#" role="button"
                                                        id="dropdownMenuLink" data-bs-toggle="dropdown"
                                                        aria-expanded="false">
                                                        <div class="">
                                                            <textarea class="form-control" style="font-size: 0.9em" x-text="rasiKatam.row_4.col_4.valueChoosed.join(',')"
                                                                cols="8" rows="1" readonly
                                                                placeholder="Select Star"></textarea>

                                                        </div>
                                                    </a>
                                                </template>
                                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                    <template x-for="horoscope in horoscopeListView"
                                                        :key="horoscope.id" x-if="!isLoadingHoroscope">
                                                        <li class="small"><a class="dropdown-item"
                                                                x-on:click="($el)=>{
                                                                    horoscopeListView=horoscopeListView.filter( horo => horo.id!=$el.target.id);
                                                                    rasiKatam.row_4.col_4.valueChoosed.push($el.target.value)
                                                                    rasiKatam.row_4.col_4.valueChoosedId.push($el.target.id)
                                                                    rasiKatam.row_4.col_4.dOpen=false
                                                                    console.log(rasiKatam.row_4.col_4.valueChoosed)
                                                                }" x-bind:value="horoscope.horoscope_name"
                                                                x-bind:id="horoscope.id" class="dropdown-item"
                                                                x-text="horoscope.horoscope_name">
                                                            </a></li>
                                                    </template>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </template>

                    <div class="row">
                        <div class="col-md-6 offset-md-3 text-center">
                            <template
                                x-if="!userChangeRasiKatam || SingleUserHoroscopeRasiKatamInfo.user_jathakam_rasi_katam_is_filled == 1">

                                <button type="button" class="btn btn-primary btn-sm"
                                    x-on:click="userChangeRasiKatam=true">
                                    Change Rasi Katam
                                </button>
                            </template>
                            <template
                                x-if="userChangeRasiKatam ||SingleUserHoroscopeRasiKatamInfo.user_jathakam_rasi_katam_is_filled==0">

                                <button x-on:click="resetJathakaKatam" type="button" class="btn btn-danger btn-sm">
                                    Reset
                                </button>

                            </template>
                            <template
                                x-if="userChangeRasiKatam || SingleUserHoroscopeRasiKatamInfo.user_jathakam_rasi_katam_is_filled == 0">

                                <button x-on:click="updateUserRasiJathakamInformation" type="button"
                                    class="btn btn-success btn-sm">
                                    Save Rasi Katam
                                </button>
                            </template>
                        </div>
                    </div>
                    <!-- UPDATE RASI KATTAM END -->
                </div>
                {{-- JATHAGAM RASI KATAM END --}}

                <hr>

                {{-- NAVAMSAM KATAM START --}}
                <div class="row justify-content-center">
                    <h4 class="fw-normal text-center">Jathaka
                        Katam (NAVAASAM)</h4>
                    <!-- VIEW NAVAASAM KATTAM START -->
                    <template x-if="SingleUserHoroscopeNavamsamKatamInfo.user_jathakam_navamsam_katam_is_filled==1">
                        <div class="col-md-6">
                            <table class="table table-bordered mt-4">
                                <tbody>
                                    <tr>
                                        <td class="jathakatam small text-center align-center">
                                            <template
                                                x-if="SingleUserHoroscopeNavamsamKatamInfo.navam_katam_row_1_col_1">
                                                <div class="d-flex flex-column">
                                                    <template
                                                        x-for="choosedStar in SingleUserHoroscopeNavamsamKatamInfo.navam_katam_row_1_col_1">
                                                        <div x-text="choosedStar.horoscope_name"></div>
                                                    </template>
                                                </div>
                                            </template>
                                        </td>
                                        <td class="jathakatam small text-center align-center">
                                            <template
                                                x-if="SingleUserHoroscopeNavamsamKatamInfo.navam_katam_row_1_col_2">
                                                <div class="d-flex flex-column">
                                                    <template
                                                        x-for="choosedStar in SingleUserHoroscopeNavamsamKatamInfo.navam_katam_row_1_col_2">
                                                        <div x-text="choosedStar.horoscope_name"></div>
                                                    </template>
                                                </div>
                                            </template>

                                        </td>
                                        <td class="jathakatam small text-center align-center">

                                            <template
                                                x-if="SingleUserHoroscopeNavamsamKatamInfo.navam_katam_row_1_col_3">
                                                <div class="d-flex flex-column">
                                                    <template
                                                        x-for="choosedStar in SingleUserHoroscopeNavamsamKatamInfo.navam_katam_row_1_col_3">
                                                        <div x-text="choosedStar.horoscope_name"></div>
                                                    </template>
                                                </div>
                                            </template>

                                        </td>
                                        <td class="jathakatam small text-center align-center">

                                            <template
                                                x-if="SingleUserHoroscopeNavamsamKatamInfo.navam_katam_row_1_col_4">
                                                <div class="d-flex flex-column">
                                                    <template
                                                        x-for="choosedStar in SingleUserHoroscopeNavamsamKatamInfo.navam_katam_row_1_col_4">
                                                        <div x-text="choosedStar.horoscope_name"></div>
                                                    </template>
                                                </div>
                                            </template>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="jathakatam small text-center align-center">

                                            <template
                                                x-if="SingleUserHoroscopeNavamsamKatamInfo.navam_katam_row_2_col_1">
                                                <div class="d-flex flex-column">
                                                    <template
                                                        x-for="choosedStar in SingleUserHoroscopeNavamsamKatamInfo.navam_katam_row_2_col_1">
                                                        <div x-text="choosedStar.horoscope_name"></div>
                                                    </template>
                                                </div>
                                            </template>

                                        </td>
                                        <td colspan="2" class="bg-dark-lt align-middle">
                                            <h5 class="fw-light text-center mt-4">NAVAMSAM</h5>
                                        </td>
                                        <td class="jathakatam small text-center align-center">

                                            <template
                                                x-if="SingleUserHoroscopeNavamsamKatamInfo.navam_katam_row_2_col_4">
                                                <div class="d-flex flex-column">
                                                    <template
                                                        x-for="choosedStar in SingleUserHoroscopeNavamsamKatamInfo.navam_katam_row_2_col_4">
                                                        <div x-text="choosedStar.horoscope_name"></div>
                                                    </template>
                                                </div>
                                            </template>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="jathakatam small text-center align-center">

                                            <template
                                                x-if="SingleUserHoroscopeNavamsamKatamInfo.navam_katam_row_3_col_1">
                                                <div class="d-flex flex-column">
                                                    <template
                                                        x-for="choosedStar in SingleUserHoroscopeNavamsamKatamInfo.navam_katam_row_3_col_1">
                                                        <div x-text="choosedStar.horoscope_name"></div>
                                                    </template>
                                                </div>
                                            </template>

                                        </td>
                                        <td colspan="2" class="bg-dark-lt align-middle">
                                            <h5 class="fw-light text-center">CHART</h5>
                                        </td>
                                        <td class="jathakatam small text-center align-center">

                                            <template
                                                x-if="SingleUserHoroscopeNavamsamKatamInfo.navam_katam_row_3_col_4">
                                                <div class="d-flex flex-column">
                                                    <template
                                                        x-for="choosedStar in SingleUserHoroscopeNavamsamKatamInfo.navam_katam_row_3_col_4">
                                                        <div x-text="choosedStar.horoscope_name"></div>
                                                    </template>
                                                </div>
                                            </template>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="jathakatam small text-center align-center">

                                            <template
                                                x-if="SingleUserHoroscopeNavamsamKatamInfo.navam_katam_row_4_col_1">
                                                <div class="d-flex flex-column">
                                                    <template
                                                        x-for="choosedStar in SingleUserHoroscopeNavamsamKatamInfo.navam_katam_row_4_col_1">
                                                        <div x-text="choosedStar.horoscope_name"></div>
                                                    </template>
                                                </div>
                                            </template>

                                        </td>
                                        <td class="jathakatam small text-center align-center">

                                            <template
                                                x-if="SingleUserHoroscopeNavamsamKatamInfo.navam_katam_row_4_col_2">
                                                <div class="d-flex flex-column">
                                                    <template
                                                        x-for="choosedStar in SingleUserHoroscopeNavamsamKatamInfo.navam_katam_row_4_col_2">
                                                        <div x-text="choosedStar.horoscope_name"></div>
                                                    </template>
                                                </div>
                                            </template>

                                        </td>
                                        <td class="jathakatam small text-center align-center">

                                            <template
                                                x-if="SingleUserHoroscopeNavamsamKatamInfo.navam_katam_row_4_col_3">
                                                <div class="d-flex flex-column">
                                                    <template
                                                        x-for="choosedStar in SingleUserHoroscopeNavamsamKatamInfo.navam_katam_row_4_col_3">
                                                        <div x-text="choosedStar.horoscope_name"></div>
                                                    </template>
                                                </div>
                                            </template>

                                        </td>
                                        <td class="jathakatam small text-center align-center">

                                            <template
                                                x-if="SingleUserHoroscopeNavamsamKatamInfo.navam_katam_row_4_col_4">
                                                <div class="d-flex flex-column">
                                                    <template
                                                        x-for="choosedStar in SingleUserHoroscopeNavamsamKatamInfo.navam_katam_row_4_col_4">
                                                        <div x-text="choosedStar.horoscope_name"></div>
                                                    </template>
                                                </div>
                                            </template>

                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </template>
                    <!-- VIEW NAVAASAM KATTAM END -->

                    <!-- UPDATE NAVAASAM KATTAM START -->
                    <template
                        x-if="userChangeNavaamsamKatam || SingleUserHoroscopeNavamsamKatamInfo.user_jathakam_navamsam_katam_is_filled==0">
                        <div class="col-md-6">
                            <table class="table table-bordered mt-4">
                                <tbody>
                                    <tr>
                                        <td class="jathakatam">
                                            <div class="text-center">
                                                <div class="dropdown">
                                                    <template x-if="navamsamKatam.row_1.col_1.valueChoosed">
                                                        <a class="" href="#" role="button"
                                                            id="dropdownMenuLink" data-bs-toggle="dropdown"
                                                            aria-expanded="false">
                                                            <div class="">
                                                                <textarea class="form-control" style="font-size: 0.9em" x-text="navamsamKatam.row_1.col_1.valueChoosed.join(',')"
                                                                    cols="8" rows="1" readonly
                                                                    placeholder="Select Star"></textarea>
                                                            </div>
                                                        </a>
                                                    </template>
                                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                        <template x-for="horoscope in horoscopeListNavamsam"
                                                            :key="horoscope.id" x-if="!isLoadingHoroscope">
                                                            <li class="small"><a class="dropdown-item"
                                                                    x-on:click="($el)=>{
                                                    horoscopeListNavamsam=horoscopeListNavamsam.filter( horo => horo.id!=$el.target.id);
                                                    navamsamKatam.row_1.col_1.valueChoosed.push($el.target.value)
                                                        navamsamKatam.row_1.col_1.valueChoosedId.push($el.target.id)
                                                        navamsamKatam.row_1.col_1.dOpen=false
                                                        console.log(navamsamKatam.row_1.col_1.valueChoosed)
                                                    }" x-bind:value="horoscope.horoscope_name"
                                                                    x-bind:id="horoscope.id"
                                                                    class="dropdown-item"
                                                                    x-text="horoscope.horoscope_name">
                                                                </a></li>
                                                        </template>
                                                    </ul>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="jathakatam">
                                            <template x-if="navamsamKatam.row_1.col_2.valueChoosed">
                                                <a class="" href="#" role="button" id="dropdownMenuLink"
                                                    data-bs-toggle="dropdown" aria-expanded="false">
                                                    <div class="">
                                                        <textarea class="form-control" style="font-size: 0.9em" x-text="navamsamKatam.row_1.col_2.valueChoosed.join(',')"
                                                            cols="8" rows="1" readonly
                                                            placeholder="Select Star"></textarea>
                                                    </div>
                                                </a>
                                            </template>
                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                <template x-for="horoscope in horoscopeListNavamsam"
                                                    :key="horoscope.id" x-if="!isLoadingHoroscope">
                                                    <li class="small"><a class="dropdown-item" x-on:click="($el)=>{
                                            horoscopeListNavamsam=horoscopeListNavamsam.filter( horo => horo.id!=$el.target.id);
                                            navamsamKatam.row_1.col_2.valueChoosed.push($el.target.value)
                                                navamsamKatam.row_1.col_2.valueChoosedId.push($el.target.id)
                                                navamsamKatam.row_1.col_2.dOpen=false
                                                console.log(navamsamKatam.row_1.col_2.valueChoosed)
                                            }" x-bind:value="horoscope.horoscope_name" x-bind:id="horoscope.id"
                                                            class="dropdown-item" x-text="horoscope.horoscope_name">
                                                        </a></li>
                                                </template>
                                            </ul>
                                        </td>
                                        <td class="jathakatam">
                                            <template x-if="navamsamKatam.row_1.col_3.valueChoosed">
                                                <a class="" href="#" role="button" id="dropdownMenuLink"
                                                    data-bs-toggle="dropdown" aria-expanded="false">
                                                    <div class="">
                                                        <textarea class="form-control" style="font-size: 0.9em" x-text="navamsamKatam.row_1.col_3.valueChoosed.join(',')"
                                                            cols="8" rows="1" readonly
                                                            placeholder="Select Star"></textarea>
                                                    </div>
                                                </a>
                                            </template>
                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                <template x-for="horoscope in horoscopeListNavamsam"
                                                    :key="horoscope.id" x-if="!isLoadingHoroscope">
                                                    <li class="small"><a class="dropdown-item" x-on:click="($el)=>{
                                            horoscopeListNavamsam=horoscopeListNavamsam.filter( horo => horo.id!=$el.target.id);
                                            navamsamKatam.row_1.col_3.valueChoosed.push($el.target.value)
                                                navamsamKatam.row_1.col_3.valueChoosedId.push($el.target.id)
                                                navamsamKatam.row_1.col_3.dOpen=false
                                                console.log(navamsamKatam.row_1.col_3.valueChoosed)
                                            }" x-bind:value="horoscope.horoscope_name" x-bind:id="horoscope.id"
                                                            class="dropdown-item" x-text="horoscope.horoscope_name">
                                                        </a></li>
                                                </template>
                                            </ul>
                                        </td>
                                        <td class="jathakatam">
                                            <template x-if="navamsamKatam.row_1.col_4.valueChoosed">
                                                <a class="" href="#" role="button" id="dropdownMenuLink"
                                                    data-bs-toggle="dropdown" aria-expanded="false">
                                                    <div class="">
                                                        <textarea class="form-control" style="font-size: 0.9em" x-text="navamsamKatam.row_1.col_4.valueChoosed.join(',')"
                                                            cols="8" rows="1" readonly
                                                            placeholder="Select Star"></textarea>
                                                    </div>
                                                </a>
                                            </template>
                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                <template x-for="horoscope in horoscopeListNavamsam"
                                                    :key="horoscope.id" x-if="!isLoadingHoroscope">
                                                    <li class="small"><a class="dropdown-item" x-on:click="($el)=>{
                                            horoscopeListNavamsam=horoscopeListNavamsam.filter( horo => horo.id!=$el.target.id);
                                            navamsamKatam.row_1.col_4.valueChoosed.push($el.target.value)
                                                navamsamKatam.row_1.col_4.valueChoosedId.push($el.target.id)
                                                navamsamKatam.row_1.col_4.dOpen=false
                                                console.log(navamsamKatam.row_1.col_4.valueChoosed)
                                            }" x-bind:value="horoscope.horoscope_name" x-bind:id="horoscope.id"
                                                            class="dropdown-item" x-text="horoscope.horoscope_name">
                                                        </a></li>
                                                </template>
                                            </ul>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="jathakatam">
                                            <template x-if="navamsamKatam.row_2.col_1.valueChoosed">
                                                <a class="" href="#" role="button" id="dropdownMenuLink"
                                                    data-bs-toggle="dropdown" aria-expanded="false">
                                                    <div class="">
                                                        <textarea class="form-control" style="font-size: 0.9em" x-text="navamsamKatam.row_2.col_1.valueChoosed.join(',')"
                                                            cols="8" rows="1" readonly
                                                            placeholder="Select Star"></textarea>
                                                    </div>
                                                </a>
                                            </template>
                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                <template x-for="horoscope in horoscopeListNavamsam"
                                                    :key="horoscope.id" x-if="!isLoadingHoroscope">
                                                    <li class="small"><a class="dropdown-item" x-on:click="($el)=>{
                                            horoscopeListNavamsam=horoscopeListNavamsam.filter( horo => horo.id!=$el.target.id);
                                            navamsamKatam.row_2.col_1.valueChoosed.push($el.target.value)
                                                navamsamKatam.row_2.col_1.valueChoosedId.push($el.target.id)
                                                navamsamKatam.row_2.col_1.dOpen=false
                                                console.log(navamsamKatam.row_2.col_1.valueChoosed)
                                            }" x-bind:value="horoscope.horoscope_name" x-bind:id="horoscope.id"
                                                            class="dropdown-item" x-text="horoscope.horoscope_name">
                                                        </a></li>
                                                </template>
                                            </ul>
                                        </td>
                                        <td colspan="2" class="bg-dark-lt align-middle">
                                            <h4 class="fw-light text-center">Navamsam</h4>
                                        </td>
                                        <td class="jathakatam">
                                            <template x-if="navamsamKatam.row_2.col_4.valueChoosed">
                                                <a class="" href="#" role="button" id="dropdownMenuLink"
                                                    data-bs-toggle="dropdown" aria-expanded="false">
                                                    <div class="">
                                                        <textarea class="form-control" style="font-size: 0.9em" x-text="navamsamKatam.row_2.col_4.valueChoosed.join(',')"
                                                            cols="8" rows="1" readonly
                                                            placeholder="Select Star"></textarea>
                                                    </div>
                                                </a>
                                            </template>
                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                <template x-for="horoscope in horoscopeListNavamsam"
                                                    :key="horoscope.id" x-if="!isLoadingHoroscope">
                                                    <li class="small"><a class="dropdown-item" x-on:click="($el)=>{
                                            horoscopeListNavamsam=horoscopeListNavamsam.filter( horo => horo.id!=$el.target.id);
                                            navamsamKatam.row_2.col_4.valueChoosed.push($el.target.value)
                                                navamsamKatam.row_2.col_4.valueChoosedId.push($el.target.id)
                                                navamsamKatam.row_2.col_4.dOpen=false
                                                console.log(navamsamKatam.row_2.col_4.valueChoosed)
                                            }" x-bind:value="horoscope.horoscope_name" x-bind:id="horoscope.id"
                                                            class="dropdown-item" x-text="horoscope.horoscope_name">
                                                        </a></li>
                                                </template>
                                            </ul>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="jathakatam">
                                            <template x-if="navamsamKatam.row_3.col_1.valueChoosed">
                                                <a class="" href="#" role="button" id="dropdownMenuLink"
                                                    data-bs-toggle="dropdown" aria-expanded="false">
                                                    <div class="">
                                                        <textarea class="form-control" style="font-size: 0.9em" x-text="navamsamKatam.row_3.col_1.valueChoosed.join(',')"
                                                            cols="8" rows="1" readonly
                                                            placeholder="Select Star"></textarea>
                                                    </div>
                                                </a>
                                            </template>
                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                <template x-for="horoscope in horoscopeListNavamsam"
                                                    :key="horoscope.id" x-if="!isLoadingHoroscope">
                                                    <li class="small"><a class="dropdown-item" x-on:click="($el)=>{
                                            horoscopeListNavamsam=horoscopeListNavamsam.filter( horo => horo.id!=$el.target.id);
                                            navamsamKatam.row_3.col_1.valueChoosed.push($el.target.value)
                                                navamsamKatam.row_3.col_1.valueChoosedId.push($el.target.id)
                                                navamsamKatam.row_3.col_1.dOpen=false
                                                console.log(navamsamKatam.row_3.col_1.valueChoosed)
                                            }" x-bind:value="horoscope.horoscope_name" x-bind:id="horoscope.id"
                                                            class="dropdown-item" x-text="horoscope.horoscope_name">
                                                        </a></li>
                                                </template>
                                            </ul>
                                        </td>
                                        <td colspan="2" class="bg-dark-lt align-middle">
                                            <h4 class="fw-light text-center">Chart</h4>
                                        </td>
                                        <td class="jathakatam">
                                            <template x-if="navamsamKatam.row_3.col_4.valueChoosed">
                                                <a class="" href="#" role="button" id="dropdownMenuLink"
                                                    data-bs-toggle="dropdown" aria-expanded="false">
                                                    <div class="">
                                                        <textarea class="form-control" style="font-size: 0.9em" x-text="navamsamKatam.row_3.col_4.valueChoosed.join(',')"
                                                            cols="8" rows="1" readonly
                                                            placeholder="Select Star"></textarea>
                                                    </div>
                                                </a>
                                            </template>
                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                <template x-for="horoscope in horoscopeListNavamsam"
                                                    :key="horoscope.id" x-if="!isLoadingHoroscope">
                                                    <li class="small"><a class="dropdown-item" x-on:click="($el)=>{
                                                horoscopeListNavamsam=horoscopeListNavamsam.filter( horo => horo.id!=$el.target.id);
                                                navamsamKatam.row_3.col_4.valueChoosed.push($el.target.value)
                                                    navamsamKatam.row_3.col_4.valueChoosedId.push($el.target.id)
                                                    navamsamKatam.row_3.col_4.dOpen=false
                                                    console.log(navamsamKatam.row_3.col_4.valueChoosed)
                                                }" x-bind:value="horoscope.horoscope_name"
                                                            x-bind:id="horoscope.id" class="dropdown-item"
                                                            x-text="horoscope.horoscope_name">
                                                        </a></li>
                                                </template>
                                            </ul>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="jathakatam">
                                            <template x-if="navamsamKatam.row_4.col_1.valueChoosed">
                                                <a class="" href="#" role="button" id="dropdownMenuLink"
                                                    data-bs-toggle="dropdown" aria-expanded="false">
                                                    <div class="">
                                                        <textarea class="form-control" style="font-size: 0.9em" x-text="navamsamKatam.row_4.col_1.valueChoosed.join(',')"
                                                            cols="8" rows="1" readonly
                                                            placeholder="Select Star"></textarea>
                                                    </div>
                                                </a>
                                            </template>
                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                <template x-for="horoscope in horoscopeListNavamsam"
                                                    :key="horoscope.id" x-if="!isLoadingHoroscope">
                                                    <li class="small"><a class="dropdown-item" x-on:click="($el)=>{
                                                horoscopeListNavamsam=horoscopeListNavamsam.filter( horo => horo.id!=$el.target.id);
                                                navamsamKatam.row_4.col_1.valueChoosed.push($el.target.value)
                                                    navamsamKatam.row_4.col_1.valueChoosedId.push($el.target.id)
                                                    navamsamKatam.row_4.col_1.dOpen=false
                                                    console.log(navamsamKatam.row_4.col_1.valueChoosed)
                                                }" x-bind:value="horoscope.horoscope_name"
                                                            x-bind:id="horoscope.id" class="dropdown-item"
                                                            x-text="horoscope.horoscope_name">
                                                        </a></li>
                                                </template>
                                            </ul>
                                        </td>
                                        <td class="jathakatam">
                                            <template x-if="navamsamKatam.row_4.col_2.valueChoosed">
                                                <a class="" href="#" role="button" id="dropdownMenuLink"
                                                    data-bs-toggle="dropdown" aria-expanded="false">
                                                    <div class="">
                                                        <textarea class="form-control" style="font-size: 0.9em" x-text="navamsamKatam.row_4.col_2.valueChoosed.join(',')"
                                                            cols="8" rows="1" readonly
                                                            placeholder="Select Star"></textarea>
                                                    </div>
                                                </a>
                                            </template>
                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                <template x-for="horoscope in horoscopeListNavamsam"
                                                    :key="horoscope.id" x-if="!isLoadingHoroscope">
                                                    <li class="small"><a class="dropdown-item" x-on:click="($el)=>{
                                                horoscopeListNavamsam=horoscopeListNavamsam.filter( horo => horo.id!=$el.target.id);
                                                navamsamKatam.row_4.col_2.valueChoosed.push($el.target.value)
                                                    navamsamKatam.row_4.col_2.valueChoosedId.push($el.target.id)
                                                    navamsamKatam.row_4.col_2.dOpen=false
                                                    console.log(navamsamKatam.row_4.col_2.valueChoosed)
                                                }" x-bind:value="horoscope.horoscope_name"
                                                            x-bind:id="horoscope.id" class="dropdown-item"
                                                            x-text="horoscope.horoscope_name">
                                                        </a></li>
                                                </template>
                                            </ul>
                                        </td>
                                        <td class="jathakatam">
                                            <template x-if="navamsamKatam.row_4.col_3.valueChoosed">
                                                <a class="" href="#" role="button" id="dropdownMenuLink"
                                                    data-bs-toggle="dropdown" aria-expanded="false">
                                                    <div class="">
                                                        <textarea class="form-control" style="font-size: 0.9em" x-text="navamsamKatam.row_4.col_3.valueChoosed.join(',')"
                                                            cols="8" rows="1" readonly
                                                            placeholder="Select Star"></textarea>
                                                    </div>
                                                </a>
                                            </template>
                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                <template x-for="horoscope in horoscopeListNavamsam"
                                                    :key="horoscope.id" x-if="!isLoadingHoroscope">
                                                    <li class="small"><a class="dropdown-item" x-on:click="($el)=>{
                                                horoscopeListNavamsam=horoscopeListNavamsam.filter( horo => horo.id!=$el.target.id);
                                                navamsamKatam.row_4.col_3.valueChoosed.push($el.target.value)
                                                    navamsamKatam.row_4.col_3.valueChoosedId.push($el.target.id)
                                                    navamsamKatam.row_4.col_3.dOpen=false
                                                    console.log(navamsamKatam.row_4.col_3.valueChoosed)
                                                }" x-bind:value="horoscope.horoscope_name"
                                                            x-bind:id="horoscope.id" class="dropdown-item"
                                                            x-text="horoscope.horoscope_name">
                                                        </a></li>
                                                </template>
                                            </ul>
                                        </td>
                                        <td class="jathakatam">
                                            <template x-if="navamsamKatam.row_4.col_4.valueChoosed">
                                                <a class="" href="#" role="button" id="dropdownMenuLink"
                                                    data-bs-toggle="dropdown" aria-expanded="false">
                                                    <div class="">
                                                        <textarea class="form-control" style="font-size: 0.9em" x-text="navamsamKatam.row_4.col_4.valueChoosed.join(',')"
                                                            cols="8" rows="1" readonly
                                                            placeholder="Select Star"></textarea>
                                                    </div>
                                                </a>
                                            </template>
                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                <template x-for="horoscope in horoscopeListNavamsam"
                                                    :key="horoscope.id" x-if="!isLoadingHoroscope">
                                                    <li class="small"><a class="dropdown-item" x-on:click="($el)=>{
                                                horoscopeListNavamsam=horoscopeListNavamsam.filter( horo => horo.id!=$el.target.id);
                                                navamsamKatam.row_4.col_4.valueChoosed.push($el.target.value)
                                                    navamsamKatam.row_4.col_4.valueChoosedId.push($el.target.id)
                                                    navamsamKatam.row_4.col_4.dOpen=false
                                                    console.log(navamsamKatam.row_4.col_4.valueChoosed)
                                                }" x-bind:value="horoscope.horoscope_name"
                                                            x-bind:id="horoscope.id" class="dropdown-item"
                                                            x-text="horoscope.horoscope_name">
                                                        </a></li>
                                                </template>
                                            </ul>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </template>

                    <div class="row">
                        <div class="col-md-6 offset-md-3 text-center">
                            <template
                                x-if="!userChangeNavaamsamKatam || SingleUserHoroscopeNavamsamKatamInfo.user_jathakam_navamsam_katam_is_filled == 1">
                                <button x-on:click="userChangeNavaamsamKatam=true" type="button"
                                    class="btn btn-primary btn-sm">
                                    Edit Navamsam Katam
                                </button>
                            </template>
                            <template
                                x-if="userChangeRasiKatam ||SingleUserHoroscopeRasiKatamInfo.user_jathakam_rasi_katam_is_filled==0">
                                <button x-on:click="resetNavamsamKatam" type="button" class="btn btn-danger btn-sm">
                                    Reset
                                </button>
                            </template>
                            <template
                                x-if="userChangeNavaamsamKatam || SingleUserHoroscopeNavamsamKatamInfo.user_jathakam_navamsam_katam_is_filled == 0">
                                <button x-on:click="updateUserNavamsamJathakamInformation" type="button"
                                    class="btn btn-success btn-sm">
                                    Save Katam
                                </button>
                            </template>
                        </div>
                    </div>
                </div>
                <!-- UPDATE NAVAASAM KATTAM END -->

                {{-- JATHAGAM NAVAMSAM KATAM END --}}


                <hr>

                <h5 class="text-center fw-normal">OR ELSE</h5>

                {{-- USER JATHAKAM IMAGE UPLOAD SECTION --}}
                <div class="row mt-3">
                    <div class="col-md-6 offset-3">
                        <template x-if="SingleUserHoroscopeImageInfo.user_jathakam_image_is_uploaded == 1">
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
                            x-if="SingleUserHoroscopeImageInfo.user_jathakam_image_is_uploaded == 0 && userJathakamImage">
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
                        <template x-if="SingleUserHoroscopeImageInfo.user_jathakam_image_is_uploaded == 0">
                            <div class="form-group mb-3 ">
                                <label class="form-label ">
                                    <h5 class="text-center fw-light">Jathaka
                                        image<span class="small text-muted">* (.jpeg, .jpg, .png)</span></h5>
                                </label>
                                <div class="">
                                    <input x-model="userJathakamImage" x-on:change="fileChosen" type="file"
                                        class="form-control" accept="image/*">
                                </div>
                            </div>
                        </template>
                    </div>
                    <div class="d-flex justify-content-end">
                        <button type="button" x-on:click="uploadUserJathakamImage" class="btn btn-success btn-sm w-25">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-device-floppy"
                                width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M6 4h10l4 4v10a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2">
                                </path>
                                <circle cx="12" cy="14" r="2"></circle>
                                <polyline points="14 4 14 8 8 8 8 4"></polyline>
                            </svg> Save
                        </button>
                    </div>
                </div>
                <!-- JATHAKAM IMAGE UPLOAD SECTION END -->
            </div>
        </div>
    </div>
</div>
