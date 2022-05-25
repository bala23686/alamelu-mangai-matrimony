@extends('Website.layouts.default')
@section('content')
    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-12">
                    <ul class="breadcrumb-nav">
                        <li><a href="{{ route('user.dashboard') }}">Home</a></li>
                        <li>Search Results</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    @if (Session::has('data'))
        @php
            $result_data = Session::get('data');
            // dd($result_data);
        @endphp
    @else
        <script>
            window.location = "/search";
        </script>
    @endif
    <section class="section">
        <div class="container">
            @if (!empty($result_data))
                <div class="row row-cols-1 row-cols-md-5 g-4">
                    @foreach ($result_data as $data)
                        @php
                            $image_src = $data->gender_id == 1 ? asset('assets/Website/male.png') : asset('assets/Website/female.png');
                        @endphp
                        <div class="col">
                            <div class="card h-100 shadow">
                                <div class="text-center mt-1">
                                    <img src="{{ $data->user_profile_image ? $data->image_with_path : $image_src }}"
                                        class="img-fluid rounded w-50 text-center">
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title fw-normal text-primary text-center">
                                        {{ $data->user->user_profile_id }}</h5>
                                    <div style="padding-left: 15%;">
                                        <span class="card-text"><b>Name :</b> {{ $data->user_full_name }}</span><br>
                                        <span class="card-text"><b>Age :</b> {{ $data->age }}</span><br>
                                        <span class="card-text"><b>Gender :</b>
                                            {{ $data->genderInfo->gender_name }}</span><br>

                                        <span class="card-text"><b>Status :</b> <span
                                                class="">{{ $data->MartialStatus->martial_status_name }}</span></span><br>
                                    </div>
                                    <div class="text-center mt-3">
                                        @if (Auth()->check() && Auth()->user()->is_admin != 1)
                                            <a href="{{ route('viewprofile.show', $data->user_id) }}" target="_blank"
                                                class="btn btn-primary">View Profile</a>
                                        @else
                                            <a data-bs-toggle="modal" data-bs-target="#exampleModal"
                                                href='javascript:void(0)' class="btn btn-primary">View Profile</a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="row mt-5 mb-3">
                    <div class="col-md-6 offset-md-5">
                        {{ $result_data->links('Website.layouts.panigation') }}
                    </div>
                </div>

                {{-- {{ $result_data->render() }} --}}
                {{-- <div class="pagination left">
                    <ul class="pagination-list">
                        <li>{{ $result_data->render() }}</li>
                        <li><a href="javascript:void(0)">3</a></li>
                    </ul>
                </div> --}}
                {{-- <h5>Pagination:</h5>{{ $result_data->links() }} --}}
            @endif

        </div>
    </section>

@stop
