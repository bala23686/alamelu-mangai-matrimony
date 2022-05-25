@extends('layouts.Admin.app')

@section('tab_tittle')
    Checkout Page
@endsection

@section('meta_tages')
@endsection

@section('styles')
@endsection

@section('page_pre_title')
    Online Payment
@endsection

@section('page-title')
    PayU Payment Checkout Page
@endsection



@section('page_content')
    <form class="card card-md" action="{{ $payment_infomation->checkoutUrl }}" target="_blank" method="post"
        autocomplete="off">
        <div class="card-body text-center">
            <div class="mb-4">
                <h2 class="card-title">PayU Payment Checkout Page</h2>
                <p class="text-muted"></p>
            </div>
            <div class="mb-4">
                <h3>{{ $payment_infomation->firstName }}</h3>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-4">
                        <input type="hidden" name="key" value="{{ $payment_infomation->key }}" />
                        <input type="hidden" name="txnid" value="{{ $payment_infomation->transactionId }}" />
                        <input type="hidden" name="productinfo" value="{{ $payment_infomation->packageId }}" />
                        <input class="form-control mb-2" type="text" readonly name="productName"
                            value="{{ $payment_infomation->packageName }}" />
                        <input class="form-control mb-2" type="text" readonly name="amount"
                            value="{{ $payment_infomation->amount }}" />
                    </div>
                </div>
                <div class="col-md-6">
                    <input class="form-control mb-2" type="text" readonly name="firstname"
                        value="{{ $payment_infomation->firstName }}" />
                    <input class="form-control mb-2" type="email" readonly name="email"
                        value="{{ $payment_infomation->email }}" />
                    <input type="text" class="form-control mb-2" readonly name="phone"
                        value="{{ $payment_infomation->phone }}" />
                    <input type="hidden" name="surl" value="{{ $payment_infomation->surl }}" />
                    <input type="hidden" name="furl" value="{{ $payment_infomation->furl }}" />

                    <input type="hidden" name="hash" value="{{ $payment_infomation->hash }}" />
                </div>
            </div>
            <div class="d-flex justify-content-around">
                <button type="button" class="btn btn-danger w-25 mt-3 px-2 float-end">
                    <!-- Download SVG icon from http://tabler-icons.io/i/lock-open -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-square-x" width="24"
                        height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                        stroke-linecap="round" stroke-linejoin="round">
                        <desc>Download more icon variants from https://tabler-icons.io/i/square-x</desc>
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <rect x="4" y="4" width="16" height="16" rx="2"></rect>
                        <path d="M10 10l4 4m0 -4l-4 4"></path>
                    </svg>
                    Cancel
                </button>
                <button type="submit" class="btn btn-primary w-25 mt-3 float-end">
                    <!-- Download SVG icon from http://tabler-icons.io/i/lock-open -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-cash" width="24" height="24"
                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                        stroke-linejoin="round">
                        <desc>Download more icon variants from https://tabler-icons.io/i/cash</desc>
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <rect x="7" y="9" width="14" height="10" rx="2"></rect>
                        <circle cx="14" cy="14" r="2"></circle>
                        <path d="M17 9v-2a2 2 0 0 0 -2 -2h-10a2 2 0 0 0 -2 2v6a2 2 0 0 0 2 2h2"></path>
                    </svg>
                    Checkout
                </button>
            </div>
        </div>
    </form>
@endsection


@section('scripts')
@endsection
