@extends('layouts.Admin.app')

@section('tab_tittle')
    Reports |  {{$company->company_name}}
@endsection

@section('meta_tages')
@endsection


@section('page_pre_title')
    Sales Report
@endsection

@section('page-title')
    Sales Report
@endsection



@section('page_content')
    <div class="" x-data="data()" x-init="loadUserTrasaction()">
        <div class="row row-cards">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="subheader">Filter Sales Report</div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label class="form-label">From Date</label>
                                    <div class="input-icon mb-2">
                                        <input class="form-control" x-on:change="()=>loadUserTrasaction()"
                                            x-model="filter.from_date" type="date" placeholder="Select a date"
                                            id="datepicker-icon">
                                        <span class="input-icon-addon">
                                            <!-- Download SVG icon from http://tabler-icons.io/i/calendar -->
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24"
                                                height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                <rect x="4" y="5" width="16" height="16" rx="2"></rect>
                                                <line x1="16" y1="3" x2="16" y2="7"></line>
                                                <line x1="8" y1="3" x2="8" y2="7"></line>
                                                <line x1="4" y1="11" x2="20" y2="11"></line>
                                                <line x1="11" y1="15" x2="12" y2="15"></line>
                                                <line x1="12" y1="15" x2="12" y2="18"></line>
                                            </svg>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label class="form-label">To Date</label>
                                    <div class="input-icon mb-2">
                                        <input class="form-control" x-on:change="()=>loadUserTrasaction()"
                                            x-model="filter.to_date" type="date" placeholder="Select a date"
                                            id="datepicker-icon">
                                        <span class="input-icon-addon">
                                            <!-- Download SVG icon from http://tabler-icons.io/i/calendar -->
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24"
                                                height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                <rect x="4" y="5" width="16" height="16" rx="2"></rect>
                                                <line x1="16" y1="3" x2="16" y2="7"></line>
                                                <line x1="8" y1="3" x2="8" y2="7"></line>
                                                <line x1="4" y1="11" x2="20" y2="11"></line>
                                                <line x1="11" y1="15" x2="12" y2="15"></line>
                                                <line x1="12" y1="15" x2="12" y2="18"></line>
                                            </svg>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <div class="form-label">Payment Method</div>
                                    <select class="form-select" x-on:change="()=>loadUserTrasaction()" x-model="filter.payment_method">
                                        <option value="0">Choose Payement Method</option>
                                        <option value="1">COD</option>
                                        <option value="2">PayPal</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <div class="form-label">Clear Filters</div>
                                    <button type="button"
                                    x-on:click="()=>{
                                        filter.payment_method=0
                                        filter.to_date=''
                                        filter.from_date=''
                                        loadUserTrasaction()
                                    }" class="btn btn-primary w-100">
                                        Clear Filter
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <div class="subheader">Page Total</div>
                        <div class="h3 m-0" x-text="pageTotal">5000</div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <div class="subheader">Over All Sales</div>
                        <div class="h3 m-0" x-text="totalSales"></div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <div class="subheader">Filtered Total</div>
                        <div class="h3 m-0" x-text="filteredTotal">3</div>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="card">

                    <div class="card-table table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Transaction ID</th>
                                    <th>Package Name</th>
                                    <th>Package Price</th>
                                    <th>Amount Paid</th>
                                    <th>Trnsaction Date</th>
                                    <th>Invoice</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr x-show="isLoadingUserTransaction">
                                    <td colspan="6">
                                        <div class="progress" >
                                            <div class="progress-bar progress-bar-indeterminate bg-dark"></div>
                                        </div>
                                    </td>
                                </tr>
                                <template x-for="transaction in userTransactionList">
                                <tr :key="transaction.id">
                                    <td x-text="transaction.tr_id">Today</td>
                                    <td ><span class="badge bg-dark-lt" x-text="transaction.tr_package_name">Owner</span></td>
                                    <td x-text="transaction.tr_package_price">1 minute</td>
                                    <td x-text="transaction.tr_amount_paid">1</td>
                                    <td x-text="transaction.tr_date">1</td>
                                    <td >
                                        <a x-bind:href="transaction.invoice_full_path" target="_blank" class="btn btn-sm btn-dark w-75">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-file-invoice" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <desc>Download more icon variants from https://tabler-icons.io/i/file-invoice</desc>
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                <path d="M14 3v4a1 1 0 0 0 1 1h4"></path>
                                                <path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z"></path>
                                                <line x1="9" y1="7" x2="10" y2="7"></line>
                                                <line x1="9" y1="13" x2="15" y2="13"></line>
                                                <line x1="13" y1="17" x2="15" y2="17"></line>
                                             </svg>
                                              Invoice
                                          </a>
                                    </td>
                                </tr>
                            </template>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        {{-- pagination section --}}
        <div class="row row-cards mt-2" x-show="!isLoadingUserTransaction">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <ul class="pagination float-end">
                            <li x-bind:class="(prev_url) ? 'page-item' : 'page-item  disabled'">
                                <a class="page-link" href="#" tabindex="-1" aria-disabled="true"
                                    x-on:click.prevent="getProfileListPaginate(prev_url)">
                                    <!-- Download SVG icon from http://tabler-icons.io/i/chevron-left -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <polyline points="15 6 9 12 15 18"></polyline>
                                    </svg>
                                    prev
                                </a>
                            </li>
                            <template x-for="(link,index) in links" x-key="link.label">
                                <template x-if="index!=0 && index!=links.length-1">
                                    <li x-bind:class="(link.active) ? 'page-item active' : 'page-item'"><a
                                            class="page-link" x-on:click.prevent="loadUserTrasaction(link.url,1)"><span
                                                x-text="link.label"></span></a></li>
                                </template>
                            </template>
                            <li x-bind:class="(next_url) ? 'page-item' : 'page-item  disabled'">
                                <a class="page-link" href="#" x-on:click.prevent="loadUserTrasaction(next_url,1)">
                                    next
                                    <!-- Download SVG icon from http://tabler-icons.io/i/chevron-right -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <polyline points="9 6 15 12 9 18"></polyline>
                                    </svg>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        {{-- end of pagination section --}}
    </div>
@endsection('page_content')


@section('scripts')
    <script>
        function data() {

            return {
                links: [],
                prev_url: '',
                next_url: '',
                filter: {
                    from_date: '',
                    to_date: '',
                    payment_method: 0,
                },
                totalSales:0,
                filteredTotal:0,
                pageTotal:0,
                userTransactionList: [],
                isLoadingUserTransaction: true,
                sumFilteredSales(value)
                {
                    this.pageTotal+=Number(value)
                },
                loadUserTrasaction(panigationLink, fromPagination = 0) {
                    this.pageTotal=0
                    if (fromPagination) {
                        axios.get(panigationLink + '&&from_date=' + this.filter.from_date + '&&to_date='+ this.filter.to_date+'&&payment_mode='+this.filter.payment_method)

                            .then(e => {

                                if (e.status == 200) {
                                    this.links = e.data.data.links
                                    this.totalProfile = e.data.data.total
                                    this.userTransactionList = e.data.data.data
                                    this.prev_url = e.data.data.prev_page_url
                                    this.next_url = e.data.data.next_page_url
                                    this.totalSales=e.data.sum
                                    this.filteredTotal=e.data.filteredSum
                                    this.userTransactionList.map((transaction)=>{
                                       this.sumFilteredSales(transaction.tr_amount_paid)
                                    })

                                    this.isLoadingUserTransaction = false

                                }

                            })
                    } else {
                        axios.get('{{ route('transaction.user-transaction.ssr') }}' + '?from_date=' + this.filter.from_date + '&&to_date='+ this.filter.to_date+'&&payment_mode='+this.filter.payment_method)
                            .then(e => {

                                if (e.status == 200) {
                                    this.links = e.data.data.links
                                    this.totalProfile = e.data.data.total
                                    this.userTransactionList = e.data.data.data
                                    this.prev_url = e.data.data.prev_page_url
                                    this.next_url = e.data.data.next_page_url
                                    this.totalSales=e.data.sum
                                    this.filteredTotal=e.data.filteredSum
                                    this.userTransactionList.map((transaction)=>{
                                        this.sumFilteredSales(transaction.tr_amount_paid)
                                    })
                                    this.isLoadingUserTransaction = false
                                }

                            })
                    }

                },
            }
        }
    </script>
@endsection
