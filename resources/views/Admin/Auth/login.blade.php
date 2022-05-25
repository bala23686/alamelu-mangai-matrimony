@extends('layouts.Admin.auth')

@section('tab_tittle')
    Login |  {{$company->company_name}}
@endsection

@section('auth_section')
    <div class="text-center mb-4 bg-dark">
        <a href="#" class="navbar-brand navbar-brand-autodark"><img
                src="{{ $company->company_logo }}" height="50" alt=""></a>
    </div>
    <form class="card card-md" action="{{ route('admin.login') }}" method="POST">
        @csrf
        <div class="card-body">
            <h2 class="card-title text-center mb-4">{{ __('auth.adminLogin') }}</h2>

            <div class="mb-3">
                <label class="form-label">{{ __('auth.email') }}</label>
                @error('email')
                    <span class="form-label-description text-danger">{{ $message }}</span>
                @enderror
                <input type="text" class="form-control" name="email" value="{{ old('email') }}"
                    placeholder="{{ __('auth.email') }}">
            </div>
            <div class="mb-2">
                <label class="form-label">
                    {{ __('auth.password') }}
                </label>
                @error('password')
                    <span class="form-label-description text-danger">{{ $message }}</span>
                @enderror
                <div class="input-group input-group-flat" x-data="{ passwordShow: false }">
                    <input :type="passwordShow ? 'text' :'password'" name="password" class="form-control"
                        placeholder="{{ __('auth.password') }}" autocomplete="off">
                    <span class="input-group-text">
                        <svg x-on:click="passwordShow=true" x-cloak x-show='!passwordShow'
                            xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                            stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <circle cx="12" cy="12" r="2" />
                            <path
                                d="M22 12c-2.667 4.667 -6 7 -10 7s-7.333 -2.333 -10 -7c2.667 -4.667 6 -7 10 -7s7.333 2.333 10 7" />
                        </svg>
                        <svg x-on:click="passwordShow=false" x-cloak x-show='passwordShow'
                            xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-eye-off" width="24"
                            height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <line x1="3" y1="3" x2="21" y2="21"></line>
                            <path d="M10.584 10.587a2 2 0 0 0 2.828 2.83"></path>
                            <path
                                d="M9.363 5.365a9.466 9.466 0 0 1 2.637 -.365c4 0 7.333 2.333 10 7c-.778 1.361 -1.612 2.524 -2.503 3.488m-2.14 1.861c-1.631 1.1 -3.415 1.651 -5.357 1.651c-4 0 -7.333 -2.333 -10 -7c1.369 -2.395 2.913 -4.175 4.632 -5.341">
                            </path>
                        </svg>

                    </span>
                </div>
            </div>
            <div class="mb-2">
                <label class="form-check">
                    <input type="checkbox" name="remember" value="true" class="form-check-input" />
                    <span class="form-check-label">{{ __('auth.Remember me on this device') }}</span>
                </label>
            </div>
            <div class="form-footer">
                <button type="submit" class="btn btn-dark w-100">{{ __('auth.login') }}</button>
            </div>
        </div>
    </form>
@endsection
@section('scripts')
@endsection
