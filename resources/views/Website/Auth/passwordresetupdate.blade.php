<head>

</head>

<body>
    <main>

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="main">
                        <h3><a>Forgot Password</a></h3>
                        <form role="form" action="{{ route('user.resetupdate', $token) }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="userpassword">New Password <span class="text-danger">*</span></label>
                                <input type="password" name="new_password" class="form-control">
                                @if ($errors->has('new_password'))
                                    <span class="text-danger">{{ $errors->first('new_password') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="userpassword">Confirm Password <span class="text-danger">*</span></label>
                                <input type="password" name="new_confirm_password" class="form-control">
                                @if ($errors->has('new_confirm_password'))
                                    <span class="text-danger">{{ $errors->first('new_confirm_password') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                            </div>
                            <button type="submit" class="btn btn btn-secondary">
                                Update
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>
