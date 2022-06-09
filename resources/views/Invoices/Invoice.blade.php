<!DOCTYPE html>
<html lang="en">
    <head>
        <title>{{ $company->company_name}}| Invoice</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

        <style type="text/css" media="screen">
            html {
                font-family: sans-serif;
                line-height: 1.15;
                margin: 0;
            }

            body {
                font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
                font-weight: 400;
                line-height: 1.5;
                color: #212529;
                text-align: left;
                background-color: #fff;
                font-size: 10px;
                margin: 36pt;
            }

            h4 {
                margin-top: 0;
                margin-bottom: 0.5rem;
            }

            p {
                margin-top: 0;
                margin-bottom: 1rem;
            }

            strong {
                font-weight: bolder;
            }

            img {
                vertical-align: middle;
                border-style: none;
            }

            table {
                border-collapse: collapse;
            }

            th {
                text-align: inherit;
            }

            h4, .h4 {
                margin-bottom: 0.5rem;
                font-weight: 500;
                line-height: 1.2;
            }

            h4, .h4 {
                font-size: 1.5rem;
            }

            .table {
                width: 100%;
                margin-bottom: 1rem;
                color: #212529;
            }

            .table th,
            .table td {
                padding: 0.75rem;
                vertical-align: top;
            }

            .table.table-items td {
                border-top: 1px solid #dee2e6;
            }

            .table thead th {
                vertical-align: bottom;
                border-bottom: 2px solid #dee2e6;
            }

            .mt-5 {
                margin-top: 3rem !important;
            }

            .pr-0,
            .px-0 {
                padding-right: 0 !important;
            }

            .pl-0,
            .px-0 {
                padding-left: 0 !important;
            }

            .text-right {
                text-align: right !important;
            }

            .text-center {
                text-align: center !important;
            }

            .text-uppercase {
                text-transform: uppercase !important;
            }
            * {
                font-family: "DejaVu Sans";
            }
            body, h1, h2, h3, h4, h5, h6, table, th, tr, td, p, div {
                line-height: 1.1;
            }
            .party-header {
                font-size: 1.5rem;
                font-weight: 400;
            }
            .total-amount {
                font-size: 12px;
                font-weight: 700;
            }
            .border-0 {
                border: none !important;
            }
            .cool-gray {
                color: #6B7280;
            }
        </style>
    </head>

    <body>
        {{-- Header --}}

        <h4>{{$company->company_name}}</h4>
            {{-- <img src="{{$logo}}" alt="logo" height="100"> --}}

        <table class="table mt-5">
            <tbody>
                <tr>
                    <td class="border-0 pl-0" width="70%">
                        <h4 class="text-uppercase">
                            <strong>{{ $invoice->name }}</strong>
                        </h4>
                    </td>
                    <td class="border-0 pl-0">
                        <p>Invoice No:<strong>{{ $invoice->tr_id }}</strong></p>
                        <p>Invoice Date: <strong>{{ $invoice->created_at }}</strong></p>
                    </td>
                </tr>
            </tbody>
        </table>

        {{-- Seller - Buyer --}}
        <table class="table">
            <thead>
                <tr>
                    <th class="border-0 pl-0 party-header" width="48.5%">
                       Seller
                    </th>
                    <th class="border-0" width="3%"></th>
                    <th class="border-0 pl-0 party-header">
                        Client
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="px-0">
                        @if($company->company_name)
                            <p class="seller-name">
                                <strong>{{ $company->company_name }}</strong>
                            </p>
                        @endif

                        @if($company->company_address)
                            <p class="seller-address">
                                Address: {{ ($company->company_address) }}
                            </p>
                        @endif

                        @if($company->company_state)
                        <p class="seller-address">
                            state: {{ ($company->company_state) }}
                        </p>
                        @endif

                        @if($company->company_city)
                        <p class="seller-address">
                            city: {{ ($company->company_city) }}
                        </p>
                        @endif

                        @if($company->company_pincode)
                        <p class="seller-address">
                            pincode: {{ ($company->company_pincode) }}
                        </p>
                        @endif

                        @if($invoice->id)
                            <p class="seller-code">
                                Invoice ID: INVID-{{ $invoice->id }}
                            </p>
                        @endif
                    </td>
                    <td class="border-0"></td>
                    <td class="px-0">
                        @if($client->user_full_name)
                            <p class="buyer-name">
                                <strong>{{ $client->user_full_name }}</strong>
                            </p>
                        @endif

                        @if($client->user_mobile_no)
                            <p class="buyer-phone">
                                Phone No: {{ $client->user_mobile_no }}
                            </p>
                        @endif
                        @if($client->dob)
                            <p class="buyer-address">
                               DOB: {{ $client->dob }}
                            </p>
                        @endif
                    </td>
                </tr>
            </tbody>
        </table>

        {{-- Table --}}
        <table class="table table-items">
            <thead>
                <tr>
                    <th scope="col" class="text-center border-0">Package Name</th>
                    <th scope="col" class="text-right border-0">Package Limit</th>
                    <th scope="col" class="text-right border-0">Payment Mode</th>
                    <th scope="col" class="text-right border-0">Package Price</th>

                </tr>
            </thead>
            <tbody>
                {{-- Items --}}

                <tr>
                    <td class="pl-0">
                        {{$invoice->tr_package_name}}
                    </td>
                    <td class="text-center">{{ $invoice->tr_package_views }}</td>
                    <td class="text-right">
                        {{$invoice->tr_package_views }}
                    </td>
                    <td class="text-right pr-0">
                        {{ $invoice->tr_package_price }}
                    </td>
                </tr>

                <tr>
                    <td class="pl-0">

                    </td>
                    <td class="text-center"></td>
                    <td class="text-right">
                       gst 18% + Transaction fee
                    </td>
                    <td class="text-right pr-0">
                        {{ round($invoice->tr_package_price * 18/100) }}
                    </td>
                </tr>
                {{-- Summary --}}

                @if($invoice)
                    <tr>
                        <td colspan="3" class="border-0"></td>
                        <td class="text-right pr-0">
                           {{$invoice->tr_amount_paid }}
                        </td>
                    </tr>
                @endif
            </tbody>
        </table>
    </body>
</html>
