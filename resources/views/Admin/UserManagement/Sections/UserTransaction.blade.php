<div class="row mt-3" x-data="{
    userTransactionList: [],
    isLoadinguserTransaction: true,
    loadUserTransactionList() {

        axios.get('{{ route('admin.profile.profileTransactionList', $singleUserInfo->id) }}')
            .then((e) => {
                console.log(e.data)
                this.userTransactionList = e.data
                this.isLoadinguserTransaction = false
                console.log(this.userTransactionList)

            })
    },

}" x-init="loadUserTransactionList()">
    {{-- third row first column of page --}}
    <div class="col-md-12">
        <div class="card card-sm">
            <div class="ribbon ribbon-top ribbon-bookmark bg-yellow">
                <!-- Download SVG icon from http://tabler-icons.io/i/star -->
                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                    stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path
                        d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z">
                    </path>
                </svg>
            </div>
            <div class="card-body">
                <h3 class="card-title">User Transaction Histroy</h3>
                <div class="text-muted">User Over all Transactions List</div>
                <template x-if="isLoadinguserTransaction">
                    <div class="mb-3">
                        <label class="form-label">Loading....</label>
                        <div class="progress">
                            <div class="progress-bar progress-bar-indeterminate bg-dark"></div>
                        </div>
                    </div>
                </template>
                <div class="mt-4" x-if="!isLoadinguserTransaction">
                    <div class="divide-y">
                        <template x-for="transaction in userTransactionList">
                            <div :key="transaction.id">
                                <div class="row">
                                    <div class="col-auto">
                                        <span class="avatar">TR</span>
                                    </div>
                                    <div class="col">
                                        <div class="text-truncate">
                                            <strong><span x-text="transaction.tr_id"></span></strong> &nbsp;
                                            Transaction Amount : &nbsp;<strong>Rs/- <span
                                                    x-text="transaction.tr_amount_paid"></span></strong>
                                        </div>
                                        <div class="text-muted" x-text="transaction.created_at">yesterday</div>
                                    </div>
                                    <div class="col-auto align-self-center">
                                        <a target="_blank" x-bind:href="transaction.invoice_full_path"
                                            x-bind:download="transaction.id" class="btn btn-dark active w-100">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                class="icon icon-tabler icon-tabler-file-invoice" width="24"
                                                height="24" viewBox="0 0 24 24" stroke-width="2"
                                                stroke="currentColor" fill="none" stroke-linecap="round"
                                                stroke-linejoin="round">
                                                <desc>Download more icon variants from
                                                    https://tabler-icons.io/i/file-invoice</desc>
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                <path d="M14 3v4a1 1 0 0 0 1 1h4"></path>
                                                <path
                                                    d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z">
                                                </path>
                                                <line x1="9" y1="7" x2="10" y2="7"></line>
                                                <line x1="9" y1="13" x2="15" y2="13"></line>
                                                <line x1="13" y1="17" x2="15" y2="17"></line>
                                            </svg>
                                            Invoice
                                        </a>
                                    </div>
                                </div>
                            </div>

                        </template>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- end of third row first column of page --}}
</div>
