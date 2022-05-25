@extends('layouts.Admin.app')

@section('tab_tittle')
    Purchase Package | {{$company->company_name}}
@endsection

@section('meta_tages')
@endsection


@section('page_pre_title')
    Purchase Package
@endsection

@section('page-title')
    Purchase Package For User
@endsection



@section('page_content')
    <div class="contanier"
    x-data="{
        packageList: [],
        packageChoosedInfo: '',
        isLoadingPackage: true,
        planChoosed: 0,
        paymentMethod: 0,
        paymentInfo: {
            confrimAmount: 0,
        },
        handleChoosedpackage(id) {
            this.planChoosed = id
        },
        companyInfo: {
            company_name: '{{ $companyInfo->company_name }}',
            company_address: '{{ $companyInfo->company_address }}',
            company_state: '{{ $companyInfo->company_state }}',
            company_city: '{{ $companyInfo->company_city }}',
            company_pincode: '{{ $companyInfo->company_pincode }}',
        },
        SingleUserInfo: {
            userId:'{{ $singleUserInfo->userBasicInfos->user_id }}',
            userFullname: '{{ $singleUserInfo->userBasicInfos->user_full_name }}',
            userEmail: '{{ $singleUserInfo->email }}',
            profileId: '{{ $singleUserInfo->user_profile_id }}',
            user_mobile_no: '{{ $singleUserInfo->userBasicInfos->user_mobile_no != null? $singleUserInfo->userBasicInfos->user_mobile_no: null }}',
            dob: '{{ $singleUserInfo->userBasicInfos->dob }}',
        },
        loadPackageList() {
            axios.get('{{ route('admin.submaster.package.ssr') }}')
                .then((e) => {
                    console.log(e.data)
                    this.packageList = e.data
                    this.isLoadingPackage = false
                    console.log(this.packageList)

                })
        },
        getChoosedPlanInfo(id) {

            let filtered = this.packageList.filter((package) => {
                return package.id == id
            })
            this.packageChoosedInfo = filtered[0]

        },
        getCurrentDate() {
            const today = new Date();
            const yyyy = today.getFullYear();
            let mm = today.getMonth() + 1; // Months start at 0!
            let dd = today.getDate();

            if (dd < 10) dd = '0' + dd;
            if (mm < 10) mm = '0' + mm;

            return dd + '/' + mm + '/' + yyyy;
        },
        handelPayment()
        {
            let data = {
                user_id:this.SingleUserInfo.userId,
                tr_package_name:this.packageChoosedInfo.package_name,
                tr_package_price:this.packageChoosedInfo.package_price,
                tr_amount_paid:this.paymentInfo.confrimAmount,
                tr_package_views:this.packageChoosedInfo.package_allowed_profile,
                tr_package_photo_upload:this.packageChoosedInfo.package_photo_upload,
                tr_package_interest:this.packageChoosedInfo.package_interest_allowed,
                tr_mode:this.paymentMethod,
                package_id:this.planChoosed,
            }

            axios.post('{{ route('admin.profile.purchaseNewPackage') }}', data)
                            .then(e => {
                                if (e.status == 200) {
                                    let invoice_name=e.data.invoice
                                    Swal.fire({
                                        position: 'center',
                                        icon: 'success',
                                        title: e.data.message,
                                        showConfirmButton: false,
                                        timer: 1500
                                    }).then(e => {

                                        window.open('{{Url('/')}}'+'/storage/invoice/'+invoice_name);
                                        window.location.href='{{route('admin.profile.index')}}';

                                    })

                                }
                            })
         }

    }" x-init="loadPackageList()" x-effect="getChoosedPlanInfo(planChoosed)">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-md">
                    <div class="card-body">
                        <template x-if="isLoadingPackage">
                            <div class="mb-3">
                                <label class="form-label">Fetching....</label>
                                <div class="progress">
                                    <div class="progress-bar progress-bar-indeterminate bg-dark"></div>
                                </div>
                            </div>
                        </template>
                        <div class="container-xl">
                            <div class="row row-cards">
                                <template x-if="!isLoadingPackage">
                                    <template x-for="package in packageList" :key="package.id">
                                        <div class="col-sm-6 col-lg-3">
                                            <div class="card card-md">
                                                <template x-if="planChoosed==package.id">
                                                    <div class="ribbon ribbon-top ribbon-bookmark bg-green">
                                                        <!-- Download SVG icon from http://tabler-icons.io/i/star -->
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-filled"
                                                            width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                                                            stroke="currentColor" fill="none" stroke-linecap="round"
                                                            stroke-linejoin="round">
                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                            <path
                                                                d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z">
                                                            </path>
                                                        </svg>
                                                    </div>
                                                </template>
                                                <div class="card-body text-center">
                                                    <div class="text-uppercase text-muted font-weight-medium"
                                                        x-text="package.package_name"></div>
                                                    <div class="display-7 fw-bold my-3">RS- <span
                                                            x-text="package.package_price"></span> </div>
                                                    <ul class="list-unstyled lh-lg">
                                                        <li><strong x-text="package.package_allowed_profile"></strong>
                                                            Profiles
                                                        </li>
                                                        <li>
                                                            <strong x-text="package.package_photo_upload"></strong>
                                                            Photos
                                                        </li>
                                                        <li>
                                                            <strong x-text="package.package_interest_allowed"></strong>
                                                            Show Interest
                                                        </li>
                                                        <li>
                                                            <strong x-text="package.package_valid_for+'-months'"></strong>
                                                            Validity
                                                        </li>
                                                    </ul>
                                                    <div class="text-center mt-4">
                                                        <button type="button" x-bind:id="package.id"
                                                            x-on:click="($el)=>handleChoosedpackage($el.target.id)"
                                                            class="btn w-100"
                                                            x-bind:class="planChoosed == package.id ? 'btn-success' : ''">Choose
                                                            plan</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </template>
                                </template>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="card card-lg mt-2">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                                <p class="h3" x-text="companyInfo.company_name"></p>
                                <address>
                                    <span x-text="companyInfo.company_address"></span><br>
                                    <span x-text="companyInfo.company_state"></span>,<span
                                        x-text="companyInfo.company_city"></span><br>
                                    <span x-text="companyInfo.company_pincode"></span><br>
                                    info@exciteon.com
                                </address>
                            </div>
                            <div class="col-6 text-end">
                                <p class="h3" x-text="SingleUserInfo.userFullname"></p>
                                <p class="">Phone no : <span x-text="SingleUserInfo.user_mobile_no"></span>
                                </p>
                                <p class="">DOB : <span x-text="SingleUserInfo.dob"></span></p>
                                <p class="">Profile ID : <span x-text="SingleUserInfo.profileId"></span></p>

                            </div>
                            <div class="col-12 my-5">
                                <h1>Invoice Date: <span x-text="getCurrentDate()"></span></h1>
                            </div>
                        </div>
                        <table class="table table-transparent table-responsive">
                            <thead>
                                <tr>
                                    <th class="text-center" style="width: 1%"></th>
                                    <th>Package</th>
                                    <th class="text-center" style="width: 1%">Views</th>
                                    <th class="text-end" style="width: 1%">Validity</th>
                                    <th class="text-end" style="width: 1%">Amount</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="text-center">1</td>
                                    <td>
                                        <p class="strong mb-1" x-text="packageChoosedInfo.package_name"></p>
                                    </td>
                                    <td class="text-center" x-text="packageChoosedInfo.package_allowed_profile">

                                    </td>
                                    <td class="text-end" x-text="packageChoosedInfo.package_valid_for+'-months'">
                                        $1.800,00</td>
                                    <td class="text-end" x-text="packageChoosedInfo.package_price">$1.800,00</td>
                                </tr>
                                <tr>
                                    <td colspan="4" class="strong text-end">Subtotal</td>
                                    <td class="text-end" x-text="packageChoosedInfo.package_price">$25.000,00</td>
                                </tr>
                                <tr>
                                    <td colspan="4" class="font-weight-bold text-uppercase text-end">Total Due</td>
                                    <td class="font-weight-bold text-end" x-text="packageChoosedInfo.package_price">
                                        $30.000,00</td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="row">
                            <div class="col-md-6 offset-md-6">
                                <template x-if="planChoosed!=0">
                                    <div class="mb-3">
                                        <label class="form-label">Payment method</label>
                                        <div class="form-selectgroup form-selectgroup-boxes d-flex flex-column">
                                            <label class="form-selectgroup-item flex-fill">
                                                <input type="radio" x-model="paymentMethod" name="form-payment" value="1"
                                                    class="form-selectgroup-input">
                                                <div class="form-selectgroup-label d-flex align-items-center p-3">
                                                    <div class="me-3">
                                                        <span class="form-selectgroup-check"></span>
                                                    </div>
                                                    <div>
                                                        <span class="payment payment-provider-visa payment-xs me-2"></span>
                                                        cash on hand<strong>&nbsp;COH</strong>
                                                    </div>
                                                </div>
                                            </label>
                                            <label class="form-selectgroup-item flex-fill">
                                                <input type="radio" x-model="paymentMethod" name="form-payment" value="2"
                                                    class="form-selectgroup-input">
                                                <div class="form-selectgroup-label d-flex align-items-center p-3">
                                                    <div class="me-3">
                                                        <span class="form-selectgroup-check"></span>
                                                    </div>
                                                    <div>
                                                        <span class="payment payment-provider-mastercard payment-xs me-2"></span>
                                                        Online Payment<strong>&nbsp; PayU</strong>
                                                    </div>
                                                </div>
                                            </label>
                                        </div>
                                    </div>
                                </template>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 offset-md-6">
                                <template x-if="paymentMethod==1">
                                    <div class="col-md-12">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="mb-3">
                                                    <div class="form-label">Plan Choosed</div>
                                                    <input type="text" name="input-mask" disabled x-bind:value="packageChoosedInfo.package_name" class="form-control"
                                                        disabled autocomplete="off">
                                                </div>
                                                <div class="mb-3">
                                                    <div class="form-label">Total Amount</div>
                                                    <input type="text" name="input-mask" disabled x-bind:value="packageChoosedInfo.package_price" class="form-control"
                                                        disabled autocomplete="off">
                                                </div>
                                                <div class="mb-3">
                                                    <div class="form-label">Confrim Amount</div>
                                                    <input type="text" x-model="paymentInfo.confrimAmount" name="input-mask" x-bind:maxlength="packageChoosedInfo.package_price.length" class="form-control"
                                                    x-bind:class="(packageChoosedInfo.package_price != paymentInfo.confrimAmount) ? 'is-invalid is-invalid-lite' : ''"
                                                         autocomplete="off">
                                                </div>
                                                <div class="mt-2 float-end">
                                                    <button x-on:click="handelPayment" x-bind:disabled="(packageChoosedInfo.package_price != paymentInfo.confrimAmount)" type="button" class="btn btn-dark w-60">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-cash" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                            <rect x="7" y="9" width="14" height="10" rx="2"></rect>
                                                            <circle cx="14" cy="14" r="2"></circle>
                                                            <path d="M17 9v-2a2 2 0 0 0 -2 -2h-10a2 2 0 0 0 -2 2v6a2 2 0 0 0 2 2h2"></path>
                                                         </svg> Pay now
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </template>
                                <template x-if="paymentMethod==2">
                                    <div class="col-md-12">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="mb-3">
                                                    <div class="form-label">Plan Choosed</div>
                                                    <input type="text" name="input-mask" disabled x-bind:value="packageChoosedInfo.package_name" class="form-control"
                                                        disabled autocomplete="off">
                                                </div>
                                                <div class="mb-3">
                                                    <div class="form-label">Total Amount</div>
                                                    <input type="text" name="input-mask" disabled x-bind:value="packageChoosedInfo.package_price" class="form-control"
                                                        disabled autocomplete="off">
                                                </div>
                                                <div class="mb-3">
                                                    <div class="form-label">Confrim Amount</div>
                                                    <input type="text" x-model="paymentInfo.confrimAmount" name="input-mask" x-bind:maxlength="packageChoosedInfo.package_price.length" class="form-control"
                                                    x-bind:class="(packageChoosedInfo.package_price != paymentInfo.confrimAmount) ? 'is-invalid is-invalid-lite' : ''"
                                                         autocomplete="off">
                                                </div>
                                                <div class="mt-2 float-end">
                                                    <a x-bind:href="`{{route('admin.payments.payu',$singleUserInfo->id)}}?amount=${packageChoosedInfo.package_price}&&packageId=${planChoosed}`"  x-bind:disabled="(packageChoosedInfo.package_price != paymentInfo.confrimAmount)" type="button" class="btn btn-dark w-60">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-cash" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                            <rect x="7" y="9" width="14" height="10" rx="2"></rect>
                                                            <circle cx="14" cy="14" r="2"></circle>
                                                            <path d="M17 9v-2a2 2 0 0 0 -2 -2h-10a2 2 0 0 0 -2 2v6a2 2 0 0 0 2 2h2"></path>
                                                         </svg> Pay now
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </template>
                            </div>
                        </div>
                        <p class="text-muted text-center mt-5">Thank you very much for doing business with us. We look
                            forward to working with
                            you again!</p>
                    </div>
                </div>
            </div>
        </div>

    </div>
    </div>
@endsection('page_content')


@section('scripts')
@endsection
