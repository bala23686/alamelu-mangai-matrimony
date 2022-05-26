<link rel="stylesheet" type="text/css"
    href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />
<link rel="stylesheet" type="text/css"
    href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
<style type="text/css">
    body {
        background: #f2f2f2;
    }

    .payment {
        border: 1px solid #f2f2f2;
        height: 280px;
        border-radius: 20px;
        background: #fff;
    }

    .payment_header {
        background: rgb(39, 231, 0);
        padding: 20px;
        border-radius: 20px 20px 0px 0px;

    }

    .check {
        margin: 0px auto;
        width: 50px;
        height: 50px;
        border-radius: 100%;
        background: #fff;
        text-align: center;
    }

    .check i {
        vertical-align: middle;
        line-height: 50px;
        font-size: 30px;
    }

    .content {
        text-align: center;
    }

    .content h1 {
        font-size: 25px;
        padding-top: 25px;
    }

    .content a {
        width: 200px;
        height: 35px;
        color: #fff;
        border-radius: 30px;
        padding: 5px 10px;
        background: rgb(39, 231, 0);
        transition: all ease-in-out 0.3s;
    }

    .content a:hover {
        text-decoration: none;
        background: #000;
    }

</style>
<div class="container">
    <div class="row">
        <div class="col-md-6 mx-auto mt-5">
            <div class="payment">
                <div class="payment_header">
                    <div class="check"><i class="fa fa-check" aria-hidden="true"></i></div>
                </div>
                <div class="content">
                    <h1>Payment Success !</h1>
                    <a href="{{ route('Home') }}">Go to Home</a>
                </div>

            </div>
        </div>
    </div>
</div>

{{-- @if (session()->has('pay-u-payment-success'))
    <script>
        window.open('{{ Url('/') }}' + '/storage/invoice/' + {{ session('pay-u-payment-success') }});
    </script>
@endif --}}
