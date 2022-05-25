@extends('layouts.Admin.app')

@section('tab_tittle')
    State Master |  {{$company->company_name}}
@endsection

@section('meta_tages')
@endsection


@section('page_pre_title')
    {{ __('masters.State') }}
@endsection

@section('page-title')
    {{ __('common.add new') }}
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
                                    {{ __('common.add new') }}
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container mt-3">
                <div class="table-responsive mb-3">
                    <table class="table  table-vcenter text-nowrap datatable" id="state-table">
                        <thead>
                            <tr>
                                <th>S.No</th>
                                <th>State Name</th>
                                <th>Belongs to Country</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($stateList as $state)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $state->state_name }}</td>
                                    <td>{{ $state->Country->country_name }}</td>
                                    <td>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <button type="button" data-id="{{ $state->id }}"
                                                    class="btn btn-dark btn-sm editStateModel">
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
                                                    </svg> {{ __('common.edit') }}
                                                </button>
                                            </div>
                                            <div class="col-md-3">
                                                <form action="{{ route('admin.state.destroy', $state->id) }}"
                                                    method="post">
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
                                                        </svg> {{ __('common.delete') }}
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
            {{-- add new state model --}}
            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">
                                {{ __('common.add new') }}-{{ __('masters.State') }}</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <form action="{{ route('admin.state.store') }}" method="post">
                            @csrf
                            <div class="modal-body">
                                <div class="container">
                                    <div class="row">
                                        <div class="col">
                                            <label class="form-label">{{ __('masters.State') }}</label>
                                            <input type="text" name="state_name" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="mb-3">
                                                <div class="form-label">{{ __('masters.Country') }}</div>
                                                <select class="form-select" name="country_id" required>
                                                    <option value="">Choose The Country</option>
                                                    @foreach ($countryList as $country)
                                                        <option value="{{ $country->id }}">{{ $country->country_name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
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
                                    {{ __('common.cancel') }}</button>

                                <button type="submit" class="btn btn-primary " x-on:click="addNewRasi()">
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
                                    {{ __('common.save') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            {{-- end add new religion model --}}
            {{-- Edit Nakshathira model --}}
            <div class="modal fade" id="editStateModel" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">
                                {{ __('common.update') }}-{{ __('masters.State') }}</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <form method="post">
                            @csrf
                            <div class="modal-body">
                                <div class="container">
                                    <div class="row">
                                        <div class="col">
                                            <label class="form-label">{{ __('masters.State') }}</label>
                                            <input type="text" name="state_name_update" id="state_name_update"
                                                class="form-control">
                                            <input type="hidden" id="state_update_id" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="mb-3">
                                                <div class="form-label">{{ __('masters.Country') }}</div>
                                                <select class="form-select" name="state_country_id"
                                                    id="state_country_id" required>
                                                    <option value="">Choose The Country</option>
                                                    @foreach ($countryList as $country)
                                                    <option value="{{ $country->id }}">{{ $country->country_name }}
                                                    </option>
                                                @endforeach
                                                </select>
                                            </div>
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
                                    {{ __('common.cancel') }}</button>
                                <button type="button" class="btn btn-primary " id="stateUpdateButton">
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
                                    {{ __('common.update') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            {{-- end Edit editNakshathiraModel model --}}
        </div>
        {{-- end model section --}}
    </div>
@endsection('page_content')


@section('scripts')
    <script>
        $(function() {

            $('#state-table').DataTable({

            })


            $('body').on('click', '.editStateModel', function() {
                let editId = $(this).attr('data-id')
                let url = "{{ route('admin.state.show', '') }}/" + editId
                axios.get(url)
                    .then(e => {
                        let state_name_update_feild = $('#state_name_update').val(e.data.state_name)
                        let state_country_id_update_feild = $('#state_country_id').val(e.data.country
                            .id)
                        $('#state_update_id').val(e.data.id)
                        $('#editStateModel').modal('show')

                    })

            })


            $('body').on('click', '#stateUpdateButton', function() {
                let url = "{{ route('admin.state.update', '') }}/" + $('#state_update_id').val()

                axios.patch(url, {
                        'state_name': $('#state_name_update').val(),
                        'country_id': $('#state_country_id').val()
                    })
                    .then(e => {

                        if (e.status === 200) {
                            $('#editStateModel').modal('hide')
                            Swal.fire({
                                position: 'top-end',
                                icon: 'success',
                                title: 'Process Updated',
                                showConfirmButton: false,
                                toast: true,
                                timer: 1500
                            })

                            window.location.href = "{{ route('admin.state.index') }}"
                        }
                    })

            })

        });
    </script>
@endsection
