@extends('layouts.Admin.app')

@section('tab_tittle')
    Nakshathira Master |  {{$company->company_name}}
@endsection

@section('meta_tages')
@endsection


@section('page_pre_title')
    {{ __('masters.Star') }}
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
                    <table class="table  table-vcenter text-nowrap datatable" id="rasi-table">
                        <thead>
                            <tr>
                                <th>S.No</th>
                                <th>Star Name</th>
                                <th>Belongs to Rasi</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($starList as $star)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $star->star_name }}</td>
                                    <td>{{ $star->Rasi->rasi_name }}</td>
                                    <td>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <button type="button" data-id="{{ $star->id }}"
                                                    class="btn btn-dark btn-sm editNakshathira">
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
                                                <form action="{{ route('admin.nakshathira.destroy', $star->id) }}"
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
            {{-- add new rasi model --}}
            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">
                                {{ __('common.add new') }}-{{ __('masters.Star') }}</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <form action="{{ route('admin.nakshathira.store') }}" method="post">
                            @csrf
                            <div class="modal-body">
                                <div class="container">
                                    <div class="row">
                                        <div class="col">
                                            <label class="form-label">{{ __('masters.Star') }}</label>
                                            <input type="text" name="star_name" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="mb-3">
                                                <div class="form-label">{{ __('masters.Zodiac') }}</div>
                                                <select class="form-select" name="star_rasi_id" required>
                                                    <option value="">Choose The Rasi</option>
                                                    @foreach ($rasiList as $rasi)
                                                        <option value="{{$rasi->id}}">{{$rasi->rasi_name}}</option>
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
            {{-- end add new rasi model --}}
            {{-- Edit Nakshathira model --}}
            <div class="modal fade" id="editNakshathiraModel" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">
                                {{ __('common.update') }}-{{ __('masters.Star') }}</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <form action="{{ route('admin.rasi.store') }}" method="post">
                            @csrf
                            <div class="modal-body">
                                <div class="container">
                                    <div class="row">
                                        <div class="col">
                                            <label class="form-label">{{ __('masters.Star') }}</label>
                                            <input type="text" name="star_name_update" id="star_name_update"
                                                class="form-control">
                                            <input type="hidden" id="star_update_id" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="mb-3">
                                                <div class="form-label">{{ __('masters.Zodiac') }}</div>
                                                <select class="form-select" name="star_rasi_id" id="star_rasi_id"  required>
                                                    <option value="">Choose The Rasi</option>
                                                    @foreach ($rasiList as $rasi)
                                                        <option value="{{$rasi->id}}">{{$rasi->rasi_name}}</option>
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
                                <button type="button" class="btn btn-primary " id="starUpdateButton">
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

            $('#rasi-table').DataTable({

            })


            $('body').on('click', '.editNakshathira', function() {
                let editId = $(this).attr('data-id')
                let url = "{{ route('admin.nakshathira.show', '') }}/" + editId
                axios.get(url)
                    .then(e => {
                        console.log(e);
                        let star_name_update_feild = $('#star_name_update').val(e.data.star_name)
                        let star_rasi_id_update_feild = $('#star_rasi_id').val(e.data.rasi.id)
                        $('#star_update_id').val(e.data.id)
                        $('#editNakshathiraModel').modal('show')

                    })

            })


            $('body').on('click', '#starUpdateButton', function() {
                let url = "{{ route('admin.nakshathira.update', '') }}/" + $('#star_update_id').val()

                axios.patch(url, {
                        'star_name': $('#star_name_update').val(),
                        'star_rasi_id': $('#star_rasi_id').val()
                    })
                    .then(e => {

                        if (e.status === 200) {
                            $('#editNakshathiraModel').modal('hide')
                            Swal.fire({
                                position: 'top-end',
                                icon: 'success',
                                title: 'Process Updated',
                                showConfirmButton: false,
                                toast: true,
                                timer: 1500
                            })

                            window.location.href = "{{ route('admin.nakshathira.index') }}"
                        }
                    })

            })

        });
    </script>
@endsection
