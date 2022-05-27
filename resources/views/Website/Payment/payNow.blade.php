<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Payment Confirmation</title>
    <link rel="stylesheet" href="{{ asset('web/css/bootstrap.min.css') }}" />
</head>

<body>
    <section>
        <div class="container">
            <div class="row" style="height:100vh">
                <div class="card text-center" style="align-self: center">
                    <div class="card-header">
                        Featured
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Special title treatment</h5>
                        <p class="card-text">With supporting text below as a natural lead-in to additional content.
                        </p>
                        <a href="{{ route('user.payments.payU-Checkout', $user->id) }}?amount=1000&&packageId=1"
                            class="btn btn-primary">Complete
                            Your Payment</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>
