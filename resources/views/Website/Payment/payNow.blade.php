<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
<style type="text/css">
    @import url('https://fonts.googleapis.com/css?family=Montserrat:400,700,500&display=swap');

    :root {
        --primary-color: #6a46e3;
        --primary-color-dark: #421dc0;
        --primary-color-light: #efebfc9f;
        /* --primary-color: "";
  --secondary-color: "";
  --primary-color: "";
  --primary-color: ""; */
    }

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Montserrat', sans-serif;
    }

    body {
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        background-color: azure;
        padding: 10px 20px;
    }

    .wrapper {
        max-width: 460px;
        box-shadow: 3px 3px 5px #1b1b1ba2;

    }

    .card {
        background-color: ;
    }

    p {
        margin: 0px;
    }

    .h8 {
        background-color: var(--primary-color);
        border-radius: 5px;
        padding: 10px;
        text-align: center;
        font-size: 25px;
        font-weight: 600;
        color: white;
    }

    .card .atm {
        width: 90px;
        height: 90px;
        object-fit: cover;
    }

    .card .visa {
        width: 50px;
        height: 20px;
        object-fit: fill;
    }



    .debit-card {
        width: 100%;
        height: 180px;
        padding: 20px;
        background-color: #ffffff;
        /* background-image: linear-gradient(160deg, var(--primary-color) 0%, #80D0C7 100%); */
        position: relative;
        border-radius: 5px;
        box-shadow: 3px 3px 5px #0000001a;
        transition: all 0.3s ease-in;
        cursor: pointer;
    }

    .debit-card:hover {
        box-shadow: 5px 3px 5px #000000a2;
    }



    .text-muted {
        font-size: 0.8rem;
    }

    .text-white {
        font-size: 14px;
    }


    .btn {
        width: 100%;
        height: 50px;
        border: 1px solid var(--primary-color);
        display: flex;
        justify-content: center;
        align-items: center;
        color: var(--primary-color);
        transition: all 0.5s ease;
        font-weight: 500;
    }

    .btn:hover {
        color: #fff;
        background-color: var(--primary-color);
    }

    @media screen and (min-width: 480px) {
        .wrapper {
            width: 720px;
        }

    }
</style>
<div class="wrapper">
    <div class="card px-4">
        <div class=" my-3">
            <p class="h8">Attention</p>
            <p></p>
        </div>

        <div class="debit-card mb-3">
            <div class="d-flex flex-column h-100">
                <label class="d-block">
                    <div class="d-flex position-relative">
                        <div>
                            <h1>Welcome,{{ Auth::user()->username }}</h1>

                            <h4>Registration Fee :&nbsp; &#8377; 1020</h4>
                        </div>

                    </div>
                </label>
                <div class="mt-auto fw-bold d-flex align-items-center justify-content-between">
                    <p>Note : All rates inclusive of 18% GST.</p>
                    <p></p>
                </div>
            </div>
        </div>

        <div class="btn mb-4"
            onclick="location.href='{{ route('user.payments.payU-Checkout', $user->id) }}?amount=1020&&packageId=1';">
            Proceed
        </div>
    </div>
</div>
