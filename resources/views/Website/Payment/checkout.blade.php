@extends('Website.layouts.default')
{{-- @include(assets('web/css/bootstrap.min.css')) --}}


<style>
    .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
    }

    @media (min-width: 768px) {
        .bd-placeholder-img-lg {
            font-size: 3.5rem;
        }
    }

</style>
{{-- @section('content') --}}

<div class="breadcrumbs">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-12">
                <ul class="breadcrumb-nav">
                    <li><a href="{{ route('user.dashboard') }}">Home</a></li>
                    <li>Checkout</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<section class="dashboard pt-3">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-4 col-12">
            </div>
            <div class="col-lg-9 col-md-8 col-12">
                <div class="main-content">

                    <body class="bg-light">
                        <div class="container">
                            <main>
                                <div class="py-5 text-center">
                                    <h3>Checkout</h3>
                                </div>
                                <div class="row g-5">
                                    <div class="col-md-5 col-lg-4 order-md-last">
                                        <h4 class="d-flex justify-content-between align-items-center mb-3">
                                            <span class="text-primary">Cart</span>
                                            <span class="badge bg-primary rounded-pill">1</span>
                                        </h4>
                                        <ul class="list-group mb-3">
                                            <li class="list-group-item d-flex justify-content-between lh-sm">
                                                <div>
                                                    <h6 class="my-0">{{ $payment_infomation->packageName }}
                                                    </h6>
                                                    <small class="text-muted"></small>
                                                </div>
                                                <span class="text-muted">&#8377;{{ $price }}</span>
                                            </li>
                                            <li class="list-group-item d-flex justify-content-between lh-sm">
                                                <div>
                                                    <h6 class="my-0">GST</h6>
                                                    <small class="text-muted">18%</small>
                                                </div>
                                                <span class="text-muted">&#8377;{{ $gst }}</span>
                                            </li>

                                            <li class="list-group-item d-flex justify-content-between">
                                                <span>Total (INR)</span>
                                                <strong>&#8377;{{ $payment_infomation->amount }}</strong>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-md-7 col-lg-8">
                                        <form class="" action="{{ $payment_infomation->checkoutUrl }}"
                                            target="_blank" method="POST">
                                            @csrf
                                            <div class="row g-3">
                                                <div class="col-6">
                                                    <label for="">Name</label>
                                                    <input type="text" class="form-control" id="firstname"
                                                        name="firstname" placeholder="firstname" readonly
                                                        value="{{ $payment_infomation->firstName }}" required>
                                                </div>
                                                <div class="col-6">
                                                    <label for="">Reference ID</label>
                                                    <input type="email" class="form-control" id="email"
                                                        placeholder="firstname" readonly
                                                        value="{{ $payment_infomation->transactionId }}" required>
                                                </div>

                                                <div class="col-sm-6">
                                                    <label for="">Package Name</label>
                                                    <input type="text" class="form-control" id="productName"
                                                        name="productName"
                                                        value="{{ $payment_infomation->packageName }}" readonly
                                                        required>
                                                    <input type="hidden" name="key"
                                                        value="{{ $payment_infomation->key }}" />
                                                    <input type="hidden" name="txnid"
                                                        value="{{ $payment_infomation->transactionId }}" />
                                                    <input type="hidden" name="productinfo"
                                                        value="{{ $payment_infomation->packageId }}" />
                                                    <input type="hidden" name="surl"
                                                        value="{{ $payment_infomation->surl }}" />
                                                    <input type="hidden" name="furl"
                                                        value="{{ $payment_infomation->furl }}" />
                                                    <input type="hidden" name="hash"
                                                        value="{{ $payment_infomation->hash }}" />
                                                </div>

                                                <div class="col-sm-6">
                                                    <label for="">Package Amount</label>
                                                    <input type="text" class="form-control" id="amount" name="amount"
                                                        value="{{ $payment_infomation->amount }}" readonly required>
                                                </div>


                                                <div class="col-12">
                                                    <label for="email" class="form-label">Email</label>
                                                    <input type="email" class="form-control" id="email" name="email"
                                                        value="{{ $payment_infomation->email }}">

                                                </div>
                                                <hr class="my-4">
                                                <button class="w-100 btn btn-primary btn-lg" style="margin-bottom: 10px"
                                                    type="submit">Continue to
                                                    checkout</button>
                                        </form>
                                    </div>
                                </div>
                            </main>
                        </div>
                </div>
            </div>
        </div>
    </div>
</section>
{{-- @stop --}}
