<div class="page-header d-print-none">
    <div class="row g-2 align-items-center">
        <div class="col">
            <!-- Page pre-title -->
            <div class="page-pretitle">
                @yield('page_pre_title')
            </div>
            <h2 class="page-title">
                @yield('page-title')
            </h2>
        </div>
        <!-- Page title actions -->
        <div class="col-12 col-md-auto ms-auto d-print-none">
            {{-- <div class="btn-list">
                <span class="d-none d-sm-inline">
                    <a href="#" class="btn btn-white">
                        New view
                    </a>
                </span>
                <a href="#" class="btn btn-primary d-none d-sm-inline-block" data-bs-toggle="modal"
                    data-bs-target="#modal-report">
                    <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24"
                        height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                        fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <line x1="12" y1="5" x2="12" y2="19" />
                        <line x1="5" y1="12" x2="19" y2="12" />
                    </svg>
                    Create new report
                </a>
                <a href="#" class="btn btn-primary d-sm-none btn-icon" data-bs-toggle="modal"
                    data-bs-target="#modal-report" aria-label="Create new report">
                    <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24"
                        height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                        fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <line x1="12" y1="5" x2="12" y2="19" />
                        <line x1="5" y1="12" x2="19" y2="12" />
                    </svg>
                </a>
            </div> --}}
            <ol class="breadcrumb" aria-label="breadcrumbs">
                @php
                        $i = 1;
                        $length = count(Request::segments());
                    @endphp
                @foreach (Request::segments() as $segment)

                    <li class="breadcrumb-item {{ $length == $i ? 'active' : '' }}"><a
                            href="{{url('/')."/".Request::segment($i-1)."/".$segment }}">{{ $segment }}</a></li>
                    @php
                        $i++;
                    @endphp
                @endforeach
            </ol>

        </div>
    </div>
</div>
