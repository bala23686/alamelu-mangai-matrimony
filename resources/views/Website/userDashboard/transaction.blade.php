@extends('Website.layouts.default')

@section('content')

    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-12">
                    <ul class="breadcrumb-nav">
                        <li><a href="{{ route('user.dashboard') }}">Home</a></li>
                        <li>Transaction History</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <section class="dashboard pt-3">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-4 col-12">
                    <x-user-dashboard.side-bar />
                </div>
                <div class="col-lg-9 col-md-12 col-12">
                    <div class="main-content">
                        <div class="dashboard-block mt-0 profile-settings-block mb-3">
                            <h3 class="block-title">invoice</h3>

                            <div class="invoice-items default-list-style">

                                <div class="default-list-title">
                                    <div class="row align-items-center">
                                        <div class="col-lg-4 col-md-4 col-12">
                                            <p>Package</p>
                                        </div>
                                        <div class="col-lg-2 col-md-2 col-12">
                                            <p>Invoice date</p>
                                        </div>
                                        <div class="col-lg-2 col-md-2 col-12">
                                            <p>Invoice No.</p>
                                        </div>
                                        <div class="col-lg-2 col-md-2 col-12">
                                            <p>Status</p>
                                        </div>
                                        <div class="col-lg-2 col-md-2 col-12 align-right">
                                            <p>Action</p>
                                        </div>
                                    </div>
                                </div>

                                @foreach ($transaction ?? '' as $row)
                                    <div class="single-list">
                                        <div class="row align-items-center">
                                            <div class="col-lg-4 col-md-4 col-12">
                                                <p>{{ $row['tr_package_name'] }}
                                                    <span> &#x20b9; {{ $row['tr_package_price'] }}</span>
                                                </p>
                                            </div>
                                            <div class="col-lg-2 col-md-2 col-12">
                                                <p>{{ $row['created_at'] }}</p>
                                            </div>
                                            <div class="col-lg-2 col-md-2 col-12">
                                                <p>{{ $row['tr_id'] }}</p>
                                            </div>
                                            <div class="col-lg-2 col-md-2 col-12">
                                                <p class="paid">Paid</p>
                                            </div>
                                            <div class="col-lg-2 col-md-2 col-12 align-right">
                                                <ul class="action-btn">
                                                    <li><a href="#"><i class="lni lni-eye" data-bs-toggle="tooltip"
                                                                data-bs-placement="left" title="View Invoice"></i></a></li>
                                                    <li><a href="#"><i class="lni lni-arrow-down-circle"
                                                                data-bs-toggle="tooltip" data-bs-placement="left"
                                                                title="Download Invoice"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                                <div class="pagination left">
                                    <ul class="pagination-list">
                                        {{-- <li><a href="javascript:void(0)">1</a></li>
                                        <li class="active"><a href="javascript:void(0)">2</a></li>
                                        <li><a href="javascript:void(0)">3</a></li>
                                        <li><a href="javascript:void(0)">4</a></li>
                                        <li><a href="javascript:void(0)"><i class="lni lni-chevron-right"></i></a></li> --}}
                                        {{-- {{ $transaction->links() }} --}}
                                    </ul>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop
