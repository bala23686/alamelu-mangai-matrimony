<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>@yield('tab_tittle')</title>
    @yield('meta_tages')
    <!-- CSS files -->
    <link href="{{ asset('adminTheme/dist/css/tabler.css') }}" rel="stylesheet" />
    <link href="{{ asset('adminTheme/dist/css/tabler-flags.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('adminTheme/dist/css/tabler-payments.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('adminTheme/dist/css/tabler-vendors.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('adminTheme/dist/css/demo.min.css') }}" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.0.1/min/dropzone.min.css" rel="stylesheet">
    @toastr_css

    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/v/bs5/jszip-2.5.0/dt-1.11.5/b-2.2.2/b-colvis-2.2.2/b-html5-2.2.2/b-print-2.2.2/r-2.2.9/sb-1.3.2/sl-1.3.4/datatables.min.css" />

    @yield('styles')
</head>

<body>
    @include('sweetalert::alert')
    <div class="page">
        <aside class="navbar navbar-vertical navbar-expand-lg navbar-dark" id="app-side-bar">
            <input type="hidden" name="theme-color" id="theme-color"
                value="{{ App\Helpers\Model\ProductSetting\ThemeSettingHelper::getThemeColor() }}">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <h1 class="navbar-brand navbar-brand-autodark">
                    <a href=".">
                        <img src="{{ App\Helpers\Model\ProductSetting\CompanySettingHelper::loadLogo() }}" width="110"
                            height="32" alt="Tabler" class="navbar-brand-image">
                    </a>
                </h1>
                {{-- Mobile Top-Navigation-section --}}
                @include('layouts.Admin.partials.mobiletopnav')
                {{-- End of Mobile Top-Navigation-section --}}
                {{-- Side-Navigation-section --}}
                @include('layouts.Admin.partials.sidebar')
                {{-- End of Side-Navigation-section --}}
            </div>
        </aside>
        <header class="navbar navbar-expand-md navbar-light d-none d-lg-flex d-print-none">
            {{-- Top-Navigation-section --}}
            @include('layouts.Admin.partials.topnav')
            {{-- End of Top-Navigation-section --}}
        </header>
        <div class="page-wrapper">
            <div class="container-xl">
                {{-- Page title --}}
                @include('layouts.Admin.partials.segments.pagetittle')
                {{-- Page title end --}}
            </div>
            <div class="page-body">
                <div class="container-xl">
                    @yield('page_content')
                </div>
            </div>
            {{-- footer section --}}
            @include('layouts.Admin.partials.footer')
            {{-- end footer section --}}
        </div>
    </div>
    <!-- Libs JS -->
    {{-- section to change the admin panel side bar color  --}}
    <script>
        let themeColor = document.querySelector('#theme-color').value
        console.log(themeColor);
        let sideNav = document.querySelector('#app-side-bar')
        sideNav.style.background = themeColor
    </script>
    {{--end section to change the admin panel side bar color  --}}
    <script src={{ mix('js/app.js') }} defer></script>
    @jquery
    @toastr_js
    @toastr_render

    <script src="{{ asset('adminTheme/dist/libs/apexcharts/dist/apexcharts.min.js') }}" defer></script>
    <script src="{{ asset('adminTheme/dist/libs/jsvectormap/dist/js/jsvectormap.min.js') }}" defer></script>
    <script src={{ asset('adminTheme/dist/libs/jsvectormap/dist/maps/world.js') }} defer></script>
    <script src={{ asset('adminTheme/dist/libs/jsvectormap/dist/maps/world-merc.js') }} defer></script>
    <!-- Tabler Core -->
    <script src={{ asset('adminTheme/dist/js/tabler.js') }} defer></script>
    <script src={{ asset('adminTheme/dist/js/demo.js') }} defer></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script type="text/javascript"
        src="https://cdn.datatables.net/v/bs5/jszip-2.5.0/dt-1.11.5/b-2.2.2/b-colvis-2.2.2/b-html5-2.2.2/b-print-2.2.2/r-2.2.9/sb-1.3.2/sl-1.3.4/datatables.min.js">
    </script>
    <script src="{{ asset('js/ckeditor.js') }}" ></script>


    @yield('scripts')
</body>

</html>
