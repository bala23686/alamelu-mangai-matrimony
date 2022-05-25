@extends('layouts.Admin.app')

@section('tab_tittle')
    {{ $gate_way_info->payment_gateway_name }} | settings
@endsection

@section('meta_tages')
@endsection

@section('styles')
@endsection

@section('page_pre_title')
    Credentials
@endsection

@section('page-title')
    {{ $gate_way_info->payment_gateway_name }}
    Credentials
@endsection



@section('page_content')
    <div class="container">
        @if ($gate_way_info->id == 1)
            <div class="card m-2">
                <div class="card-header">
                    <h3 class="card-title">Update Credentials</h3>
                    <div class="card-actions">
                        <a href="{{ route('admin.setting.payment-gateway.index') }}" class="btn btn-primary">
                            Back
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{route('admin.setting.payment-gateway.update',$gate_way_info->id)}}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group mb-3 ">
                            <label class="form-label">Merchent Key</label>
                            <div>
                                <input type="text" name="key" value="{{ $gate_way_info->key }}" class="form-control"
                                    aria-describedby="emailHelp" placeholder="Enter Merchent Key">
                            </div>
                        </div>
                        <div class="form-group mb-3 ">
                            <label class="form-label">Merchent Salt</label>
                            <div>
                                <input type="text" name="salt" value="{{ $gate_way_info->salt }}" class="form-control"
                                    aria-describedby="emailHelp" placeholder="Enter Merchent Salt">
                            </div>
                        </div>
                        <div class="form-group mb-3 ">
                            <label class="form-label">Checkout Url</label>
                            <div>
                                <input type="text" name="checkout_url" value="{{ $gate_way_info->checkout_url }}"
                                    class="form-control" aria-describedby="emailHelp" placeholder="Enter Checkout Url">
                            </div>
                        </div>
                        <div class="form-group mb-3 ">
                            <label class="form-label">Active Status</label>
                            <div>
                                <select class="form-select" name="active_status">
                                    <option value="1" @if ($gate_way_info->active_status == 1) selected @endif">Active</option>
                                    <option value="0" @if (!$gate_way_info->active_status) selected @endif>
                                        In-Active</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-footer">
                            <button type="submit" class="btn btn-success float-end"><svg xmlns="http://www.w3.org/2000/svg"
                                    class="icon icon-tabler icon-tabler-device-floppy" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <desc>Download more icon variants from https://tabler-icons.io/i/device-floppy</desc>
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M6 4h10l4 4v10a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2"></path>
                                    <circle cx="12" cy="14" r="2"></circle>
                                    <polyline points="14 4 14 8 8 8 8 4"></polyline>
                                </svg>Save</button>
                        </div>
                    </form>
                </div>
            </div>
        @endif
    </div>
@endsection


@section('scripts')
@endsection
