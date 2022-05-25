@extends('layouts.Admin.app')

@section('tab_tittle')
    Payment Settings | {{ $company->company_name }}
@endsection

@section('meta_tages')
@endsection

@section('styles')
@endsection

@section('page_pre_title')
    Payment Gateway Settings
@endsection

@section('page-title')
    All Payment Gateways
@endsection



@section('page_content')
    <div class="contanier">
        <div class="card">
            <div class="card-body p-3">
                <div class="table-responsive m-2">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>sno</th>
                                <th>Gateway Name</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($gateways as $gateway)
                                <tr class="">
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $gateway->payment_gateway_name }}</td>
                                    <td class="text-muted">
                                        @if ($gateway->active_status == 1)
                                            <span class="badge bg-success me-1"></span>Active
                                        @else
                                            <span class="badge bg-danger me-1"></span>In-Active
                                        @endif

                                    </td>
                                    <td class="">
                                        <a href="{{route('admin.setting.payment-gateway.show',$gateway->id)}}" class="btn btn-dark w-50">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                class="icon icon-tabler icon-tabler-adjustments" width="24" height="24"
                                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                                stroke-linecap="round" stroke-linejoin="round">
                                                <desc>Download more icon variants from https://tabler-icons.io/i/adjustments
                                                </desc>
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                <circle cx="6" cy="10" r="2"></circle>
                                                <line x1="6" y1="4" x2="6" y2="8"></line>
                                                <line x1="6" y1="12" x2="6" y2="20"></line>
                                                <circle cx="12" cy="16" r="2"></circle>
                                                <line x1="12" y1="4" x2="12" y2="14"></line>
                                                <line x1="12" y1="18" x2="12" y2="20"></line>
                                                <circle cx="18" cy="7" r="2"></circle>
                                                <line x1="18" y1="4" x2="18" y2="5"></line>
                                                <line x1="18" y1="9" x2="18" y2="20"></line>
                                            </svg>
                                            Setting
                                        </a>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('scripts')
@endsection
