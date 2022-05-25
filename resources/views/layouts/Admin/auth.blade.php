<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>@yield('tab_tittle')</title>
    @yield('meta_tages')
    <!-- CSS files -->
    <link href="{{ asset('adminTheme/dist/css/tabler.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('adminTheme/dist/css/tabler-flags.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('adminTheme/dist/css/tabler-payments.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('adminTheme/dist/css/tabler-vendors.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('adminTheme/dist/css/demo.min.css') }}" rel="stylesheet" />
    @toastr_css
    <style>
        [x-cloak] { display: none !important; }
    </style>
</head>


<body class=" border-top-wide border-primary d-flex flex-column">
    @include('sweetalert::alert')
    <div class="page page-center">

        <div class="container-tight py-4">
            @yield('auth_section')
        </div>
    </div>
    <!-- Libs JS -->
    <!-- Tabler Core -->
    <!-- Tabler Core -->
    <script src={{ mix('js/app.js') }} defer></script>
    @jquery
    @toastr_js
    @toastr_render
    <script src={{ asset('adminTheme/dist/js/tabler.js') }} defer></script>
    <script src={{ asset('adminTheme/dist/js/demo.js') }} defer></script>
    @yield('scripts')
</body>

</html>
