@extends('layouts.Admin.app')

@section('tab_tittle')
    Package Master |  {{$company->company_name}}
@endsection

@section('meta_tages')
@endsection


@section('page_pre_title')
{{__('masters.Package')}}
@endsection

@section('page-title')
{{__('common.add new')}}
@endsection



@section('page_content')
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="container">
                    <div class="row">
                        <div class="float-end">
                            <div class="btn-list float-end">
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal"
                                    data-bs-target="#staticBackdrop">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <line x1="12" y1="5" x2="12" y2="19"></line>
                                        <line x1="5" y1="12" x2="19" y2="12"></line>
                                    </svg>
                                    {{__('common.add new')}}
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container mt-3">
                <div class="table-responsive mb-3">
                    <table class="table  table-vcenter text-nowrap datatable" id="Package-table">
                        <thead>
                            <tr>
                                <th>S.No</th>
                                <th>Package Name</th>
                                <th>Package Profiles</th>
                                <th>Package Photos</th>
                                <th>Package Interest</th>
                                <th>Package validity</th>
                                <th>Package Price</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($packagelist as $package)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $package->package_name  }}</td>
                                    <td>{{ $package->package_allowed_profile }}-{{__('common.count')}}</td>
                                    <td>{{ $package->package_photo_upload }}-{{__('common.count')}}</td>
                                    <td>{{ $package->package_interest_allowed }}-{{__('common.count')}}</td>
                                    <td>{{ $package->package_valid_for }}-{{__('common.months')}}</td>
                                    <td>Rs-{{$package->package_price}}</td>
                                    <td>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <button type="button"
                                                     data-id="{{$package->id}}"
                                                    class="btn btn-dark btn-sm editPackage">
                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                        class="icon icon-tabler icon-tabler-edit" width="24" height="24"
                                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                                        fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                        <path
                                                            d="M9 7h-3a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-3">
                                                        </path>
                                                        <path d="M9 15h3l8.5 -8.5a1.5 1.5 0 0 0 -3 -3l-8.5 8.5v3"></path>
                                                        <line x1="16" y1="5" x2="19" y2="8"></line>
                                                    </svg> {{__('common.edit')}}
                                                </button>
                                            </div>
                                            <div class="col-md-6">
                                                <form action="{{ route('admin.package.destroy', $package->id) }}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm ">
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                            class="icon icon-tabler icon-tabler-trash" width="24"
                                                            height="24" viewBox="0 0 24 24" stroke-width="2"
                                                            stroke="currentColor" fill="none" stroke-linecap="round"
                                                            stroke-linejoin="round">
                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                            <line x1="4" y1="7" x2="20" y2="7"></line>
                                                            <line x1="10" y1="11" x2="10" y2="17"></line>
                                                            <line x1="14" y1="11" x2="14" y2="17"></line>
                                                            <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12"></path>
                                                            <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3"></path>
                                                        </svg> {{__('common.delete')}}
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        {{-- model section --}}
        <div>
            {{-- add new Package model --}}
            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">{{__('common.add new')}}-{{__('masters.Package')}}</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <form action="{{ route('admin.package.store') }}" method="post">
                            @csrf
                            <div class="modal-body">
                                <div class="container">
                                    <div class="row m-1">
                                        <div class="col">
                                            <label class="form-label">{{__('masters.Package')}}-{{__('common.name')}}</label>
                                            <input type="text" name="package_name" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="row m-1">
                                        <div class="col">
                                            <label class="form-label">{{__('common.allowed')}}{{' '}}{{__('masters.Package')}} {{' '}}{{__('common.profile')}}-{{__('common.count')}}</label>
                                            <input type="number" name="package_allowed_profile" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="row m-1">
                                        <div class="col">
                                            <label class="form-label">{{__('common.allowed')}}{{' '}}{{__('masters.Package')}} {{' '}}{{__('common.photo')}}-{{__('common.count')}}</label>
                                            <input type="number" name="package_photo_upload" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="row m-1">
                                        <div class="col">
                                            <label class="form-label">{{__('common.allowed')}}{{' '}}{{__('masters.Package')}} {{' '}}{{__('common.interest')}}-{{__('common.count')}}</label>
                                            <input type="number" name="package_interest_allowed" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="row m-1">
                                        <div class="col">
                                            <label class="form-label">{{__('common.allowed')}}{{' '}}{{__('masters.Package')}} {{' '}}{{__('common.months')}}-{{__('common.count')}}</label>
                                            <input type="number" name="package_valid_for" class="form-control" placeholder="{{__('common.months')}}" required>
                                        </div>
                                    </div>
                                    <div class="row m-1">
                                        <div class="col">
                                            <label class="form-label">{{__('masters.Package')}} {{' '}}{{__('common.price')}}</label>
                                            <input type="number" name="package_price" class="form-control" placeholder="{{__('common.price')}}" required>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-square-x"
                                        width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                        fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <rect x="4" y="4" width="16" height="16" rx="2"></rect>
                                        <path d="M10 10l4 4m0 -4l-4 4"></path>
                                    </svg>
                                    {{__('common.cancel')}}</button>

                                <button type="submit" class="btn btn-primary">
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="icon icon-tabler icon-tabler-device-floppy" width="24" height="24"
                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M6 4h10l4 4v10a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2">
                                        </path>
                                        <circle cx="12" cy="14" r="2"></circle>
                                        <polyline points="14 4 14 8 8 8 8 4"></polyline>
                                    </svg>
                                    {{__('common.save')}}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            {{-- end add new rasi model --}}
            {{-- Edit rasi model --}}
            <div class="modal fade" id="editPackageModel" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">{{__('common.update')}}-{{__('masters.Package')}}</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <form  method="post">
                            @csrf
                            <div class="modal-body">
                                <div class="container">
                                    <div class="row m-1">
                                        <div class="col">
                                            <label class="form-label">{{__('masters.Package')}}-{{__('common.name')}}</label>
                                            <input type="text" name="package_name" id="package_name_update" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="row m-1">
                                        <div class="col">
                                            <label class="form-label">{{__('common.allowed')}}{{' '}}{{__('masters.Package')}} {{' '}}{{__('common.profile')}}-{{__('common.count')}}</label>
                                            <input type="number" name="package_allowed_profile" id="package_allowed_profile_update" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="row m-1">
                                        <div class="col">
                                            <label class="form-label">{{__('common.allowed')}}{{' '}}{{__('masters.Package')}} {{' '}}{{__('common.photo')}}-{{__('common.count')}}</label>
                                            <input type="number" name="package_photo_upload" id="package_photo_upload_update" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="row m-1">
                                        <div class="col">
                                            <label class="form-label">{{__('common.allowed')}}{{' '}}{{__('masters.Package')}} {{' '}}{{__('common.interest')}}-{{__('common.count')}}</label>
                                            <input type="number" name="package_interest_allowed" id="package_interest_allowed_update" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="row m-1">
                                        <div class="col">
                                            <label class="form-label">{{__('common.allowed')}}{{' '}}{{__('masters.Package')}} {{' '}}{{__('common.months')}}-{{__('common.count')}}</label>
                                            <input type="number" name="package_valid_for" id="package_valid_for_update" class="form-control" placeholder="{{__('common.months')}}" required>
                                        </div>
                                    </div>
                                    <div class="row m-1">
                                        <div class="col">
                                            <label class="form-label">{{__('masters.Package')}} {{' '}}{{__('common.price')}}</label>
                                            <input type="number" name="package_price" id="package_price_update" class="form-control" placeholder="{{__('common.price')}}" required>
                                            <input type="hidden" name="package_price" id="package_update_id" class="form-control" >
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-square-x"
                                        width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                        fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <rect x="4" y="4" width="16" height="16" rx="2"></rect>
                                        <path d="M10 10l4 4m0 -4l-4 4"></path>
                                    </svg>
                                    {{__('common.cancel')}}</button>
                                <button type="button" class="btn btn-primary " id="packageUpdateButton">
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="icon icon-tabler icon-tabler-device-floppy" width="24" height="24"
                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M6 4h10l4 4v10a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2">
                                        </path>
                                        <circle cx="12" cy="14" r="2"></circle>
                                        <polyline points="14 4 14 8 8 8 8 4"></polyline>
                                    </svg>
                                    {{__('common.update')}}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            {{-- end Edit rasi model --}}
        </div>
        {{-- end model section --}}
    </div>
@endsection('page_content')


@section('scripts')
    <script>
        $(function() {

            $('#package-table').DataTable({

            })


        $('body').on('click','.editPackage',function()
        {
            let editId=$(this).attr('data-id')
            let url="{{route('admin.package.show',"")}}/"+editId
            axios.get(url)
            .then(e=>{
            let package_name_update_feild = $('#package_name_update').val(e.data.package_name)
            let package_allowed_profile_update_feild = $('#package_allowed_profile_update').val(e.data.package_allowed_profile)
            let package_photo_upload_update_feild = $('#package_photo_upload_update').val(e.data.package_photo_upload)
            let package_interest_allowed_update_feild = $('#package_interest_allowed_update').val(e.data.package_interest_allowed)
            let package_valid_for_update_feild = $('#package_valid_for_update').val(e.data.package_valid_for)
            let package_price_update_feild = $('#package_price_update').val(e.data.package_price)
            $('#package_update_id').val(e.data.id)
            $('#editPackageModel').modal('show')

            })

        })


        $('body').on('click','#packageUpdateButton',function()
            {
            let url="{{route('admin.package.update',"")}}/"+$('#package_update_id').val()

            axios.patch(url,{
                'package_name':$('#package_name_update').val(),
                'package_allowed_profile':$('#package_allowed_profile_update').val(),
                'package_photo_upload':$('#package_photo_upload_update').val(),
                'package_interest_allowed':$('#package_interest_allowed_update').val(),
                'package_valid_for':$('#package_valid_for_update').val(),
                'package_price':$('#package_price_update').val(),
            })
            .then(e=>{

                if(e.status===200)
                {
                    $('#editPackageModel').modal('hide')
                    Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Process Updated',
                    showConfirmButton: false,
                    toast:true,
                    timer: 1500
                    })

                    window.location.href="{{route('admin.package.index')}}"
                }
            })

        })

});
    </script>
@endsection
