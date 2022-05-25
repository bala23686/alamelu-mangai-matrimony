{{-- Login Modal --}}
<div class="modal fade rounded" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="false">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="login rounded">
                <div class="row">
                    <div class="col-lg-12 col-md-8 col-12">
                        <div class="form-head">
                            @if ($errors->any())
                                <ul>
                                    {!! implode('', $errors->all('<li>:message</li>')) !!}
                                </ul>
                            @endif
                            <h5 class="title">Login</h5>
                            <form action="{{ route('sign.in') }}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label>Email</label>
                                    <input name="email" type="email">
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input name="password" type="password">
                                </div>
                                <div class="check-and-pass">
                                    <div class="row align-items-center">
                                        <div class="col-lg-6 col-md-6 col-12">
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input width-auto"
                                                    id="exampleCheck1">
                                                <label class="form-check-label">Remember me</label>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-12">
                                            <a href="{{ route('userpassword.reset') }}" class="lost-pass">Lost
                                                your
                                                password?</a>
                                        </div>
                                    </div>
                                </div>
                                @csrf
                                <div class="button">
                                    <button type="submit" class="btn">Login Now</button>
                                </div>
                                <p class="outer-link">Don't have an account? <a href="/">Register
                                        here</a>
                                </p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Login Modal --}}

{{-- Logout Modal --}}
{{-- <div class="modal fade rounded" id="logout" tabindex="-1" aria-labelledby="logout" aria-hidden="false">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="login rounded">
                <div class="row">
                    <div class="col-lg-12 col-md-8 col-12">
                        <div class="form-head">
                            <h5 class="title">Login</h5>
                            <form action="{{ route('sign.in') }}" method="post">
                                <div class="form-group">
                                    <label>Username:</label>
                                    <input name="email" type="email" aria-placeholder="Enter Your Username">
                                </div>
                                <div class="form-group">
                                    <label>Password:</label>
                                    <input name="password" type="password">
                                </div>
                                <div class="check-and-pass">
                                    <div class="row align-items-center">
                                        <div class="col-lg-6 col-md-6 col-12">
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input width-auto"
                                                    id="exampleCheck1" value="remember_me" name="remember_me">
                                                <label class="form-check-label">Remember me</label>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-12">
                                            <a href="javascript:void(0)" class="lost-pass">Lost your
                                                password?</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="button">
                                    <button type="submit" class="btn">Login Now</button>
                                    <input type="submit" value="Login Now">
                                </div>
                                <p class="outer-link">Don't have an account? <a href="/">Register
                                        here</a>
                                </p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> --}}

{{-- Logout Modal --}}
