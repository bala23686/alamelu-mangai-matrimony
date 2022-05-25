<div id="tab-top-1" class="card tab-pane active show" x-data="{

    logoChanged: false,
    logoPreview: '',
    themeSettings:{

        primary_color:'{{ $themeSettingInfo->primary_color }}',
        primary_color_dark:'{{ $themeSettingInfo->primary_color_dark }}',
        primary_color_light:'{{ $themeSettingInfo->primary_color_light }}',
        secondary_color:'{{ $themeSettingInfo->secondary_color }}',
        secondary_color_dark:'{{ $themeSettingInfo->secondary_color_dark }}',
        secondary_color_light:'{{ $themeSettingInfo->secondary_color_light }}',
        admin_nav_color:'{{ $themeSettingInfo->admin_nav_color }}',

    },
    waterMarkChanged: false,
    waterMarkPreview: '',
    fileChosenLogo($el) {

        let file = $el.target.files[0]
        this.companySettingInfo.company_logo = file
        reader = new FileReader()

        reader.readAsDataURL(file)
        reader.onload = (e) => {
            this.logoPreview = e.target.result
            this.logoChanged = true
        }
    },
    fileChosenWaterMark($el) {

        let file = $el.target.files[0]
        this.companySettingInfo.company_water_mark = file
        reader = new FileReader()

        reader.readAsDataURL(file)
        reader.onload = (e) => {
            this.waterMarkPreview = e.target.result
            this.waterMarkChanged = true
        }
    },
    companySettingInfo: {
        company_name: '{{ $companySettingInfo->company_name ?? 'your company name' }}',
        company_slogan: '{{ $companySettingInfo->company_slogan ?? 'your slogan' }}',
        company_address: '{{ $companySettingInfo->company_address ?? 'type address' }}',
        company_state: '{{ $companySettingInfo->company_state ?? 'state' }}',
        company_city: '{{ $companySettingInfo->company_city ?? 'city' }}',
        company_country: '{{ $companySettingInfo->company_country ?? 'country' }}',
        company_pincode: '{{ $companySettingInfo->company_pincode ?? '0000000' }}',
        company_contact_number: '{{ $companySettingInfo->company_contact_number ?? '9999999999' }}',
        company_whatsapp_number: '{{ $companySettingInfo->company_whatsapp_number ?? '9999999999' }}',
        company_email: '{{ $companySettingInfo->company_email ?? 'your mail' }}',
        company_about: '{{ $companySettingInfo->company_about ?? 'About Company' }}',
        company_fb_link: '{{ $companySettingInfo->company_fb_link ?? 'https://' }}',
        company_youtube_link: '{{ $companySettingInfo->company_youtube_link ?? 'https://' }}',
        company_logo: '{{ $companySettingInfo->company_logo ?? '' }}',
        company_water_mark: '{{ $companySettingInfo->company_water_mark ?? 'https://' }}',
    },
    productSettingInfo: {
        packageSettings: {
            package_carry_forward: '{{ $productSettingInfo->package_carry_forward == 0 ? false : true }}',
        },
    },
    updateThemeSetting() {
        let sideNav = document.querySelector('#app-side-bar')
        sideNav.style.background = this.color

        let data = {

            primary_color:this.themeSettings.primary_color,
            primary_color_dark:this.themeSettings.primary_color_dark,
            primary_color_light:this.themeSettings.primary_color_light,
            secondary_color:this.themeSettings.secondary_color,
            secondary_color_dark:this.themeSettings.secondary_color_dark,
            secondary_color_light:this.themeSettings.secondary_color_light,
            admin_nav_color:this.themeSettings.admin_nav_color,

        }

        axios.post('{{ route('admin.setting.company-setting-theme') }}', data)
            .then((e) => {

                if (e.status == 201) {

                    this.clearCache()

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

    },
    updatePackageSetting() {

        let data = {

            package_carry_forward: this.productSettingInfo.packageSettings.package_carry_forward

        }

        axios.post('{{ route('admin.setting.package-setting') }}', data)
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


                    })
                }

            })
    },
    updateCompanySetting() {

        let data = {
            company_name: this.companySettingInfo.company_name,
            company_slogan: this.companySettingInfo.company_slogan,
            company_address: this.companySettingInfo.company_address,
            company_state: this.companySettingInfo.company_state,
            company_city: this.companySettingInfo.company_city,
            company_country: this.companySettingInfo.company_country,
            company_pincode: this.companySettingInfo.company_pincode,
            company_contact_number: this.companySettingInfo.company_contact_number,
            company_whatsapp_number: this.companySettingInfo.company_whatsapp_number,
            company_email: this.companySettingInfo.company_email,
            company_about: this.companySettingInfo.company_about,
            company_fb_link: this.companySettingInfo.company_fb_link,
            company_youtube_link: this.companySettingInfo.company_youtube_link,

        }

        axios.post('{{ route('admin.setting.company-setting') }}', data)
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


                    })
                }

            })
            .catch((e) => {



                Swal.fire({
                    position: 'top-end',
                    icon: 'error',
                    title: 'Check all Fields are filled',
                    showConfirmButton: false,
                    toast: true,
                    timer: 1500
                })


            })

    },
    updateCompnayLogoSetting() {

        let data = new FormData()

        data.append('company_logo', this.companySettingInfo.company_logo)

        axios.post('{{ route('admin.setting.company-setting-logo') }}', data)
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


                    })
                }

            })
            .catch((e) => {



                Swal.fire({
                    position: 'top-end',
                    icon: 'error',
                    title: 'Check File Type',
                    showConfirmButton: false,
                    toast: true,
                    timer: 1500
                })


            })
    },
    updateCompnayWaterMarkSetting() {

        let data = new FormData()

        data.append('company_water_mark', this.companySettingInfo.company_water_mark)

        axios.post('{{ route('admin.setting.company-setting-watermark') }}', data)
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


                    })
                }

            })
            .catch((e) => {

                Swal.fire({
                    position: 'top-end',
                    icon: 'error',
                    title: 'Check File Type PNG only Allowed',
                    showConfirmButton: false,
                    toast: true,
                    timer: 1500
                })


            })
    },
    clearCache() {



        axios.get('{{ route('admin.setting.clear-cache') }}')
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

                        window.location.href = '{{ route('admin.setting.product-setting') }}'

                    })
                }

            })
            .catch((e) => {

                Swal.fire({
                    position: 'top-end',
                    icon: 'error',
                    title: 'Check File Type PNG only Allowed',
                    showConfirmButton: false,
                    toast: true,
                    timer: 1500
                })


            })
    },

}">
    <div class="card-body">
        <div class="card-title">Product Settings</div>
        <div class="row">
            <div class="col-md-6">
                <div class="mb-3">
                    <label class="form-label">Company Information</label>
                    <fieldset class="form-fieldset">
                        <div class="mb-3">
                            <label class="form-label required">Company Name</label>
                            <input type="text" class="form-control"
                                x-bind:class="companySettingInfo.company_name == '' ? 'is-invalid' : ''"
                                x-model="companySettingInfo.company_name" placeholder="company name" autocomplete="off">
                        </div>
                        <div class="mb-3">
                            <label class="form-label required">Company Slogan</label>
                            <input type="text" class="form-control"
                                x-bind:class="companySettingInfo.company_slogan == '' ? 'is-invalid' : ''"
                                x-model="companySettingInfo.company_slogan" placeholder="company slogan"
                                autocomplete="off">
                        </div>
                        <div class="mb-3">
                            <label class="form-label required">Company Address
                                <span class="form-label-description"><span
                                        x-text="companySettingInfo.company_address.length"></span>/100</span>
                            </label>
                            <textarea class="form-control" name="example-textarea-input" rows="4" placeholder="Content.."
                                x-bind:class="(companySettingInfo.company_address == '' || companySettingInfo.company_address.length >
                                    100) ? 'is-invalid' : ''"
                                x-model="companySettingInfo.company_address"></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label required">Company State</label>
                            <input type="email" class="form-control"
                                x-bind:class="companySettingInfo.company_state == '' ? 'is-invalid' : ''"
                                x-model="companySettingInfo.company_state" placeholder="company state"
                                autocomplete="off">
                        </div>
                        <div class="mb-3">
                            <label class="form-label required">Company City</label>
                            <input type="tel" class="form-control"
                                x-bind:class="companySettingInfo.company_city == '' ? 'is-invalid' : ''"
                                x-model="companySettingInfo.company_city" placeholder="company city" autocomplete="off">
                        </div>
                        <div class="mb-3">
                            <label class="form-label required">Company Country</label>
                            <input type="tel" class="form-control"
                                x-bind:class="companySettingInfo.company_country == '' ? 'is-invalid' : ''"
                                x-model="companySettingInfo.company_country" placeholder="company country"
                                autocomplete="off">
                        </div>
                        <div class="mb-3">
                            <label class="form-label required">Company Pincode</label>
                            <input type="tel" class="form-control"
                                x-bind:class="companySettingInfo.company_pincode == '' ? 'is-invalid' : ''"
                                x-model="companySettingInfo.company_pincode" placeholder="company pincode"
                                autocomplete="off">
                        </div>
                    </fieldset>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label class="form-label">Contact Information</label>
                    <fieldset class="form-fieldset">
                        <div class="mb-3">
                            <label class="form-label required">Company Contact Number</label>
                            <input type="text" class="form-control" maxlength="10"
                                x-model="companySettingInfo.company_contact_number"
                                x-bind:class="(companySettingInfo.company_contact_number == '' || companySettingInfo
                                    .company_contact_number.length > 10 || companySettingInfo.company_contact_number
                                    .length < 10) ? 'is-invalid' : ''"
                                placeholder="contact number" autocomplete="off">
                        </div>
                        <div class="mb-3">
                            <label class="form-label required">Company WhatsApp Number</label>
                            <input type="text" class="form-control" maxlength="10"
                                x-bind:class="(companySettingInfo.company_whatsapp_number == '' || companySettingInfo
                                    .company_whatsapp_number.length > 10 || companySettingInfo.company_whatsapp_number
                                    .length < 10) ? 'is-invalid' : ''"
                                x-model="companySettingInfo.company_whatsapp_number"
                                placeholder="company whatsapp number" autocomplete="off">
                        </div>
                        <div class="mb-3">
                            <label class="form-label required">Company Email</label>
                            <input type="text" class="form-control" x-model="companySettingInfo.company_email"
                                x-bind:class="companySettingInfo.company_email == '' ? 'is-invalid' : ''"
                                placeholder="company mail address" autocomplete="off">
                        </div>
                        <div class="mb-3">
                            <label class="form-label required">About Company
                                <span class="form-label-description"><span
                                        x-text="companySettingInfo.company_about.length"></span>/100</span>
                            </label>
                            <textarea class="form-control" name="example-textarea-input" rows="8" placeholder="About Your Company"
                                x-bind:class="(companySettingInfo.company_about == '' || companySettingInfo.company_about.length >
                                    100) ? 'is-invalid' : ''"
                                x-model="companySettingInfo.company_about"></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label required">Company Facebook Link</label>
                            <input type="text" class="form-control"
                                x-bind:class="companySettingInfo.company_fb_link == '' ? 'is-invalid' : ''"
                                x-model="companySettingInfo.company_fb_link" placeholder="social fackbook link"
                                autocomplete="off">
                        </div>
                        <div class="mb-3">
                            <label class="form-label required">Company Youtube Link</label>
                            <input type="text" class="form-control"
                                x-bind:class="companySettingInfo.company_youtube_link == '' ? 'is-invalid' : ''"
                                x-model="companySettingInfo.company_youtube_link" placeholder="social youtube link"
                                autocomplete="off">
                        </div>

                    </fieldset>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="d-flex justify-content-end">
                <button x-on:click="updateCompanySetting" type="button" class="btn btn-dark">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-device-floppy"
                        width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M6 4h10l4 4v10a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2">
                        </path>
                        <circle cx="12" cy="14" r="2"></circle>
                        <polyline points="14 4 14 8 8 8 8 4"></polyline>
                    </svg> Save Company Info
                </button>
            </div>
        </div>
        <div class="row">
            <h3>
                <hr>
            </h3>
        </div>
        <div class="row mb-3">
            <div class="col-md-12">
                <div class="card card-sm">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-auto">
                                <span class="bg-yellow text-white avatar">
                                    <!-- Download SVG icon from http://tabler-icons.io/i/message -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24"
                                        height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                        fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M4 21v-13a3 3 0 0 1 3 -3h10a3 3 0 0 1 3 3v6a3 3 0 0 1 -3 3h-9l-4 4">
                                        </path>
                                        <line x1="8" y1="9" x2="16" y2="9"></line>
                                        <line x1="8" y1="13" x2="14" y2="13"></line>
                                    </svg>
                                </span>
                            </div>
                            <div class="col">
                                <div class="font-weight-medium">
                                    NOTE: <span class="text-muted">Clear Cache & Refresh Page To See Changes On
                                        Site</span>
                                </div>
                            </div>
                            <div class="col">
                                <div class="d-flex justify-content-end">
                                    <button x-on:click="clearCache" type="button" class="btn btn-primary">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="icon icon-tabler icon-tabler-loader" width="24" height="24"
                                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                            stroke-linecap="round" stroke-linejoin="round">
                                            <desc>Download more icon variants from https://tabler-icons.io/i/loader
                                            </desc>
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <line x1="12" y1="6" x2="12" y2="3"></line>
                                            <line x1="16.25" y1="7.75" x2="18.4" y2="5.6"></line>
                                            <line x1="18" y1="12" x2="21" y2="12"></line>
                                            <line x1="16.25" y1="16.25" x2="18.4" y2="18.4"></line>
                                            <line x1="12" y1="18" x2="12" y2="21"></line>
                                            <line x1="7.75" y1="16.25" x2="5.6" y2="18.4"></line>
                                            <line x1="6" y1="12" x2="3" y2="12"></line>
                                            <line x1="7.75" y1="7.75" x2="5.6" y2="5.6"></line>
                                        </svg> Clear Cache & Refresh
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="mb-3">
                    <label class="form-label">Company Logo</label>
                    <fieldset class="form-fieldset">
                        <div class="card ">
                            <div class="card-img-top img-responsive img-responsive-21x9"
                                x-bind:style="logoChanged ? `background-image: url('${logoPreview}');` :
                                    `background-image: url('${companySettingInfo.company_logo}');`">
                            </div>
                            <div class="card-body">
                                <h3 class="card-title">Update Company Logo</h3>
                                <p class="text-muted">
                                    <input type="file" accept=".png,.jpg,.jpeg,.svg"
                                        x-on:change="($el)=>fileChosenLogo($el)" class="form-control">
                                </p>
                            </div>
                            <div class="card-footer">
                                <div class="d-flex justify-content-end">
                                    <button x-on:click="updateCompnayLogoSetting" type="button" class="btn btn-dark">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="icon icon-tabler icon-tabler-upload" width="24" height="24"
                                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                            stroke-linecap="round" stroke-linejoin="round">
                                            <desc>Download more icon variants from https://tabler-icons.io/i/upload
                                            </desc>
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <path d="M4 17v2a2 2 0 0 0 2 2h12a2 2 0 0 0 2 -2v-2"></path>
                                            <polyline points="7 9 12 4 17 9"></polyline>
                                            <line x1="12" y1="4" x2="12" y2="16"></line>
                                        </svg> Upload
                                    </button>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label class="form-label">Company Water Mark</label>
                    <fieldset class="form-fieldset">
                        <div class="card">
                            <div class="card-img-top img-responsive img-responsive-21x9"
                                x-bind:style="waterMarkChanged ? `background-image: url('${waterMarkPreview}');` :
                                    `background-image: url('${companySettingInfo.company_water_mark}');`">
                            </div>
                            <div class="card-body">
                                <h3 class="card-title">Update Company Water Mark<span>(*.png)</span></h3>

                                <p class="text-muted">
                                    <input type="file" accept=".png" x-on:change="($el)=>fileChosenWaterMark($el)"
                                        class="form-control">
                                </p>
                            </div>
                            <div class="card-footer">
                                <div class="d-flex justify-content-end">
                                    <button x-on:click="updateCompnayWaterMarkSetting" type="button"
                                        class="btn btn-dark">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="icon icon-tabler icon-tabler-upload" width="24" height="24"
                                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                            stroke-linecap="round" stroke-linejoin="round">
                                            <desc>Download more icon variants from https://tabler-icons.io/i/upload
                                            </desc>
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <path d="M4 17v2a2 2 0 0 0 2 2h12a2 2 0 0 0 2 -2v-2"></path>
                                            <polyline points="7 9 12 4 17 9"></polyline>
                                            <line x1="12" y1="4" x2="12" y2="16"></line>
                                        </svg> Upload
                                    </button>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                </div>
            </div>
        </div>
        <div class="row">
            <h3>
                <hr>
            </h3>
        </div>
        <div class="row mt-2" x-show="true">
            <div class="col-md-12">
                <div class="mb-3">
                    <div class="form-label">CF LP-balance</div>
                    <label class="form-check form-switch">
                        <input class="form-check-input" type="checkbox"
                            x-model="productSettingInfo.packageSettings.package_carry_forward"
                            x-bind:checked="productSettingInfo.packageSettings.package_carry_forward == 1 ? true : false">
                        <template x-if="productSettingInfo.packageSettings.package_carry_forward==0">
                            <span class="form-check-label">Old Package Data Does not Carry Forwared</span>
                        </template>
                        <template x-if="productSettingInfo.packageSettings.package_carry_forward==1">
                            <span class="form-check-label">Old Package Data Is Carry Forwared</span>
                        </template>
                    </label>
                </div>

            </div>

        </div>
        <div class="row mt-2">
            <div class="card mt-2">
                <div class="card-header">Website Color Settings</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">Primary Color</label>
                                <input type="color"  x-model="themeSettings.primary_color"
                                    class="form-control form-control-color" title="Choose your color">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">Primary Color Dark</label>
                                <input type="color" x-model="themeSettings.primary_color_dark"
                                    class="form-control form-control-color" title="Choose your color">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">Primary Color Light</label>
                                <input type="color" x-model="themeSettings.primary_color_light"
                                    class="form-control form-control-color" title="Choose your color">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">Secondary Color</label>
                                <input type="color" x-model="themeSettings.secondary_color"
                                    class="form-control form-control-color" title="Choose your color">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">Secondary Color Dark</label>
                                <input type="color" x-model="themeSettings.secondary_color_dark"
                                    class="form-control form-control-color" title="Choose your color">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">Secondary Color Light</label>
                                <input type="color" x-model="themeSettings.secondary_color_light"
                                    class="form-control form-control-color" title="Choose your color">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">Admin Navigation Bar Color</label>
                                <input type="color" x-model="themeSettings.admin_nav_color"
                                    class="form-control form-control-color" title="Choose your color">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="d-flex justify-content-end">
                        <button x-on:click="updateThemeSetting" type="button" class="btn btn-dark">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-device-floppy"
                                width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M6 4h10l4 4v10a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2">
                                </path>
                                <circle cx="12" cy="14" r="2"></circle>
                                <polyline points="14 4 14 8 8 8 8 4"></polyline>
                            </svg> Update Theme Settings
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <div class="d-flex justify-content-end">
                <button x-on:click="updatePackageSetting" type="button" class="btn btn-success">
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
    </div>
</div>
