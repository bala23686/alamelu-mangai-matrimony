<div class="collapse navbar-collapse" id="navbar-menu">
    <ul class="navbar-nav pt-lg-3">
        <li class="nav-item {{ Auth()->user()->is_admin && Request::segment(1) == 'dashboard' ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('admin.dashboard') }}">
                <span class="nav-link-icon d-md-none d-lg-inline-block">
                    <!-- Download SVG icon from http://tabler-icons.io/i/home -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <polyline points="5 12 3 12 12 3 21 12 19 12" />
                        <path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7" />
                        <path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6" />
                    </svg>
                </span>
                <span class="nav-link-title">
                    Home
                </span>
            </a>
        </li>
        <li
            class="nav-item dropdown {{ Auth()->user()->is_admin && Request::segment(1) == 'profile-managament' ? 'active' : '' }}">
            <a class="nav-link dropdown-toggle {{ Auth()->user()->is_admin && Request::segment(1) == 'profile-managament' ? 'show' : '' }}"
                href="#navbar-base" data-bs-toggle="dropdown" data-bs-auto-close="false" role="button"
                aria-expanded="false">
                <span class="nav-link-icon d-md-none d-lg-inline-block">
                    <!-- Download SVG icon from http://tabler-icons.io/i/package -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-users" width="24"
                        height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <circle cx="9" cy="7" r="4"></circle>
                        <path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2"></path>
                        <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                        <path d="M21 21v-2a4 4 0 0 0 -3 -3.85"></path>
                    </svg>
                </span>
                <span class="nav-link-title">
                    Profile Management
                </span>
            </a>
            <div
                class="dropdown-menu {{ Auth()->user()->is_admin && Request::segment(1) == 'profile-managament' ? 'show' : '' }}">
                <div class="dropdown-menu-columns">
                    <div class="dropdown-menu-column">
                        <a class="dropdown-item {{ Auth()->user()->is_admin && Request::segment(2) == 'profile' ? 'active' : '' }}"
                            href="{{ route('admin.profile.index') }}">
                            Profile List
                        </a>
                    </div>
                </div>
        </li>
        <li
            class="nav-item dropdown {{ Auth()->user()->is_admin && Request::segment(1) == 'masters' ? 'active' : '' }}">
            <a class="nav-link dropdown-toggle {{ Auth()->user()->is_admin && Request::segment(1) == 'masters' ? 'show' : '' }}"
                href="#navbar-base" data-bs-toggle="dropdown" data-bs-auto-close="false" role="button"
                aria-expanded="false">
                <span class="nav-link-icon d-md-none d-lg-inline-block">
                    <!-- Download SVG icon from http://tabler-icons.io/i/package -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <polyline points="12 3 20 7.5 20 16.5 12 21 4 16.5 4 7.5 12 3" />
                        <line x1="12" y1="12" x2="20" y2="7.5" />
                        <line x1="12" y1="12" x2="12" y2="21" />
                        <line x1="12" y1="12" x2="4" y2="7.5" />
                        <line x1="16" y1="5.25" x2="8" y2="9.75" />
                    </svg>
                </span>
                <span class="nav-link-title">
                    Master Menus
                </span>
            </a>
            <div
                class="dropdown-menu {{ Auth()->user()->is_admin && Request::segment(1) == 'masters' ? 'show' : '' }}">
                <div class="dropdown-menu-columns">
                    <div class="dropdown-menu-column">
                        <a class="dropdown-item {{ Auth()->user()->is_admin && Request::segment(2) == 'rasi' ? 'active' : '' }}"
                            href="{{ route('admin.rasi.index') }}">
                            Rasi Master
                        </a>
                        <a class="dropdown-item {{ Auth()->user()->is_admin && Request::segment(2) == 'nakshathira' ? 'active' : '' }}"
                            href="{{ route('admin.nakshathira.index') }}">
                            Naskshathira Master
                        </a>
                        <a class="dropdown-item {{ Auth()->user()->is_admin && Request::segment(2) == 'religion' ? 'active' : '' }}"
                            href="{{ route('admin.religion.index') }}">
                            Religion Master
                        </a>
                        <a class="dropdown-item {{ Auth()->user()->is_admin && Request::segment(2) == 'caste' ? 'active' : '' }}"
                            href="{{ route('admin.caste.index') }}">
                            Caste Master
                        </a>
                        <a class="dropdown-item {{ Auth()->user()->is_admin && Request::segment(2) == 'country' ? 'active' : '' }}"
                            href="{{ route('admin.country.index') }}">
                            Country Master
                        </a>
                        <a class="dropdown-item {{ Auth()->user()->is_admin && Request::segment(2) == 'state' ? 'active' : '' }}"
                            href="{{ route('admin.state.index') }}">
                            State Master
                        </a>
                        <a class="dropdown-item {{ Auth()->user()->is_admin && Request::segment(2) == 'city' ? 'active' : '' }}"
                            href="{{ route('admin.city.index') }}">
                            City Master
                        </a>
                        <a class="dropdown-item {{ Auth()->user()->is_admin && Request::segment(2) == 'education' ? 'active' : '' }}"
                            href="{{ route('admin.education.index') }}">
                            Education Master
                        </a>
                        <a class="dropdown-item {{ Auth()->user()->is_admin && Request::segment(2) == 'language' ? 'active' : '' }}"
                            href="{{ route('admin.language.index') }}">
                            Language Master
                        </a>

                        <a class="dropdown-item {{ Auth()->user()->is_admin && Request::segment(2) == 'job' ? 'active' : '' }}"
                            href="{{ route('admin.job.index') }}">
                            Job Master
                        </a>
                        <a class="dropdown-item {{ Auth()->user()->is_admin && Request::segment(2) == 'horoscope' ? 'active' : '' }}"
                            href="{{ route('admin.horoscope.index') }}">
                            Horoscope Master
                        </a>
                        <a class="dropdown-item {{ Auth()->user()->is_admin && Request::segment(2) == 'package' ? 'active' : '' }}"
                            href="{{ route('admin.package.index') }}">
                            Package Master
                        </a>
                        <a class="dropdown-item {{ Auth()->user()->is_admin && Request::segment(2) == 'status' ? 'active' : '' }}"
                            href="{{ route('admin.status.index') }}">
                            Status Master
                        </a>
                    </div>
                </div>
        </li>
        <li
            class="nav-item dropdown {{ Auth()->user()->is_admin && Request::segment(1) == 'reports' ? 'active' : '' }}">
            <a class="nav-link dropdown-toggle {{ Auth()->user()->is_admin && Request::segment(1) == 'reports' ? 'show' : '' }}"
                href="#navbar-base" data-bs-toggle="dropdown" data-bs-auto-close="false" role="button"
                aria-expanded="false">
                <span class="nav-link-icon d-md-none d-lg-inline-block">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-file-analytics"
                        width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                        stroke-linecap="round" stroke-linejoin="round">
                        <desc>Download more icon variants from https://tabler-icons.io/i/file-analytics</desc>
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M14 3v4a1 1 0 0 0 1 1h4"></path>
                        <path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z"></path>
                        <line x1="9" y1="17" x2="9" y2="12"></line>
                        <line x1="12" y1="17" x2="12" y2="16"></line>
                        <line x1="15" y1="17" x2="15" y2="14"></line>
                    </svg>
                </span>
                <span class="nav-link-title">
                    Reports
                </span>
            </a>
            <div
                class="dropdown-menu {{ Auth()->user()->is_admin && Request::segment(1) == 'reports' ? 'show' : '' }}">
                <div class="dropdown-menu-columns">
                    <div class="dropdown-menu-column">
                        <a class="dropdown-item {{ Auth()->user()->is_admin && Request::segment(2) == 'sales-reports' ? 'active' : '' }}"
                            href="{{ route('admin.reports.sales-reports') }}">
                            Sales Reports
                        </a>
                    </div>
                </div>
        </li>
        <li
            class="nav-item dropdown {{ Auth()->user()->is_admin && Request::segment(1) == 'settings' ? 'active' : '' }}">
            <a class="nav-link dropdown-toggle {{ Auth()->user()->is_admin && Request::segment(1) == 'settings' ? 'show' : '' }}"
                href="#navbar-base" data-bs-toggle="dropdown" data-bs-auto-close="false" role="button"
                aria-expanded="false">
                <span class="nav-link-icon d-md-none d-lg-inline-block">
                    <!-- Download SVG icon from http://tabler-icons.io/i/package -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-settings" width="24"
                        height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path
                            d="M10.325 4.317c.426 -1.756 2.924 -1.756 3.35 0a1.724 1.724 0 0 0 2.573 1.066c1.543 -.94 3.31 .826 2.37 2.37a1.724 1.724 0 0 0 1.065 2.572c1.756 .426 1.756 2.924 0 3.35a1.724 1.724 0 0 0 -1.066 2.573c.94 1.543 -.826 3.31 -2.37 2.37a1.724 1.724 0 0 0 -2.572 1.065c-.426 1.756 -2.924 1.756 -3.35 0a1.724 1.724 0 0 0 -2.573 -1.066c-1.543 .94 -3.31 -.826 -2.37 -2.37a1.724 1.724 0 0 0 -1.065 -2.572c-1.756 -.426 -1.756 -2.924 0 -3.35a1.724 1.724 0 0 0 1.066 -2.573c-.94 -1.543 .826 -3.31 2.37 -2.37c1 .608 2.296 .07 2.572 -1.065z">
                        </path>
                        <circle cx="12" cy="12" r="3"></circle>
                    </svg>
                </span>
                <span class="nav-link-title">
                    Settings
                </span>
            </a>
            <div
                class="dropdown-menu {{ Auth()->user()->is_admin && Request::segment(1) == 'settings' ? 'show' : '' }}">
                <div class="dropdown-menu-columns">
                    <div class="dropdown-menu-column">
                        <a class="dropdown-item {{ Auth()->user()->is_admin && Request::segment(2) == 'product-setting' ? 'active' : '' }}"
                            href="{{ route('admin.setting.product-setting') }}">
                            Product Settings
                        </a>
                    </div>
                    <div class="dropdown-menu-column">
                        <a class="dropdown-item {{ Auth()->user()->is_admin && Request::segment(2) == 'payment-gateways' ? 'active' : '' }}"
                            href="{{ route('admin.setting.payment-gateway.index') }}">
                            Payment Settings
                        </a>
                    </div>
                </div>
            </div>
        </li>
    </ul>
</div>
