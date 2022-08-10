<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link href="https://cdn.lineicons.com/3.0/lineicons.css" rel="stylesheet">
<style type="text/css">
    :root {
        --primary-color: #6a46e3;
        --primary-color-dark: #421dc0;
        --primary-color-light: #efebfc9f;
        /* --primary-color: "";
  --secondary-color: "";
  --primary-color: "";
  --primary-color: ""; */
    }

    body {
        position: relative;
        margin-top: 60px;
        background: #f2f2f2;
    }

    .payment {

        border: 1px solid #f2f2f2;
        height: 280px;
        border-radius: 20px;
        background: #fff;
    }

    .payment_header {
        background: var(--primary-color);
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

    .content h4 {
        font-size: 25px;
    }

    .content a {
        width: 200px;
        height: 35px;
        color: #fff;
        border-radius: 30px;
        padding: 5px 10px;
        background: var(--primary-color);
        transition: all ease-in-out 0.3s;
    }

    .content button {
        width: 200px;
        height: 35px;
        color: #fff;
        border-radius: 30px;
        padding: 5px 10px;
        background: var(--primary-color);
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
                    <div class="check"><i class="lni lni-rupee" aria-hidden="true"></i></div>
                </div>
                <div class="content">
                    <h1>Hi,{{ Auth::user()->username }}</h1>
                    <h4>Registration Fee :&nbsp; &#8377; 1020</h4>
                    <h6>Note : All rates inclusive of 18% GST.
                    </h6>
                    @csrf
                    <div class="row" style="margin-top: 25px">
                        <div class="col-sm-12 col-md-6 ">
                            <a href="{{ route('Home') }}">Go Back
                                To Home</a>
                        </div>
                        <div class="col-sm-12 col-md-6 ">
                            <a href="{{ route('user.payments.payU-Checkout', $user->id) }}?amount=1020&&packageId=1">Payment</a>
                        </div>
                    </div>
                </div>
