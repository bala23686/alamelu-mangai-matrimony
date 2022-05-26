<!DOCTYPE html>
<html lang="en">

@include('Website.layouts.includes.head')

<body>
    <script>
        let root = document.querySelector(':root');
        root.style.setProperty('--primary-color', '{{ $themeInfo->primary_color }}');
        root.style.setProperty('--bs-primary', '{{ $themeInfo->primary_color }}');
    </script>

    {{-- <div class="preloader" id='preloader'>
        <div class="preloader-inner">
            <div class="preloader-icon">
                <span></span>
                <span></span>
            </div>
        </div>
    </div> --}}

    <div>
        @include('Website.layouts.includes.header')
    </div>

    <div>
        @yield('content')
    </div>

    <div>
        @include('Website.layouts.includes.footer')
    </div>

</body>
@include('Website.layouts.includes.modal')

</html>
