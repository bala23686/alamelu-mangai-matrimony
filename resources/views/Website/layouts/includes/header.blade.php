<!-- Nav-Bar -->
<header class="header navbar-area">
    <div class="container-lg">
        <div class="row align-items-center">
            <div class="col-lg-12">
                <div class="nav-inner">
                    <nav class="navbar navbar-expand-lg">

                        <img class="shadow" width="60px" src="{{ $webInfo->company_logo ?? '' }}">

                        <button class="navbar-toggler mobile-menu-btn" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="toggler-icon"></span>
                            <span class="toggler-icon"></span>
                            <span class="toggler-icon"></span>
                        </button>

                        <div class="collapse navbar-collapse sub-menu-bar" id="navbarSupportedContent">
                            <ul id="nav" class="navbar-nav ms-auto">

                                <li class="nav-item">
                                    <a class="{{ Request::is('/') ? 'active' : '' }}" href="{{ route('Home') }}"
                                        aria-label="Toggle navigation">Home</a>
                                </li>
                                @if (Auth()->check() && Auth()->user()->is_admin != 1)
                                <li class="nav-item">
                                    <a class="{{ Request::is('/user/profiles') ? 'active' : '' }}" href="{{ route('profile') }}"
                                        aria-label="Toggle navigation">Profiles</a>
                                </li>
                            @endif

                                <li class="nav-item">
                                    <a class="{{ Request::is('about') ? 'active' : '' }}"
                                        href="{{ route('About') }}" aria-label="Toggle navigation">About</a>
                                </li>
                                <li class="nav-item">
                                    <a class="{{ Request::is('search') ? 'active' : '' }}"
                                        href="{{ route('Search') }}" aria-label="Toggle navigation">Search</a>
                                </li>
                                <li class="nav-item">
                                    <a class="{{ Request::is('packages') ? 'active' : '' }}"
                                        href="{{ route('Package') }}" aria-label="Toggle navigation">Packages</a>
                                </li>
                                <li class="nav-item">
                                    <a class="{{ Request::is('contact') ? 'active' : '' }}"
                                        href="{{ route('Contact') }}" aria-label="Toggle navigation">Contact Us</a>
                                </li>

                                {{-- <li class="nav-item">
                                    <a class="{{ Request::is('help') ? 'active' : '' }}" href="/help"
                                        aria-label="Toggle navigation">Help</a>
                                </li> --}}
                            </ul>
                        </div>

                        <div class="login-button">

                            @if (Auth()->check() && Auth()->user()->is_admin != 1)
                                <a class="btn btn-primary btn-sm" href="{{ route('user.dashboard') }}"><i
                                        class="lni lni-user"></i> User Panel</a>
                                <a class="btn btn-danger btn-sm" href="{{ route('user.logout') }}"><i
                                        class="lni lni-exit"></i> Logout</a>
                            @else
                                <button class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal"><i class="lni lni-enter"></i> Login | <i
                                        class="lni lni-user"></i> Sign Up</button>
                            @endif

                        </div>

                    </nav>
                </div>
            </div>
        </div>
    </div>
</header>
