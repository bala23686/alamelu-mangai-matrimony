@extends('layouts.Admin.app')

@section('tab_tittle')
    Home | {{ $company->company_name }}
@endsection

@section('meta_tages')
@endsection

@section('page_pre_title')
    Product Dashboard
@endsection

@section('page-title')
    Admin Dashboard
@endsection

@section('page_content')
    {{-- first row --}}
    <div class="row row-cards">
        <x-widgets.info-card :count="$totalUsers" tittle="Total Users" subTittle="Total Users Registered" colour="green">
            {{-- icon slot --}}
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-users" width="24" height="24"
                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                stroke-linejoin="round">
                <desc>Download more icon variants from https://tabler-icons.io/i/users</desc>
                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                <circle cx="9" cy="7" r="4"></circle>
                <path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2"></path>
                <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                <path d="M21 21v-2a4 4 0 0 0 -3 -3.85"></path>
            </svg>
            {{-- end icon slot --}}
        </x-widgets.info-card>
        <x-widgets.info-card :count="$newUsers" tittle="New Users" subTittle="Users Registred Today" colour="blue">
            {{-- icon slot --}}
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-user-plus" width="24" height="24"
                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                stroke-linejoin="round">
                <desc>Download more icon variants from https://tabler-icons.io/i/user-plus</desc>
                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                <circle cx="9" cy="7" r="4"></circle>
                <path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2"></path>
                <path d="M16 11h6m-3 -3v6"></path>
            </svg>
            {{-- end icon slot --}}
        </x-widgets.info-card>
        <x-widgets.info-card :count="$activeUsers" tittle="Active Users" subTittle="Users On Active" colour="yellow">
            {{-- icon slot --}}
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-user-circle" width="24" height="24"
                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                stroke-linejoin="round">
                <desc>Download more icon variants from https://tabler-icons.io/i/user-circle</desc>
                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                <circle cx="12" cy="12" r="9"></circle>
                <circle cx="12" cy="10" r="3"></circle>
                <path d="M6.168 18.849a4 4 0 0 1 3.832 -2.849h4a4 4 0 0 1 3.834 2.855"></path>
            </svg>
            {{-- end  icon slot --}}
        </x-widgets.info-card>
        <x-widgets.info-card :count="$verifiedUsers" tittle="Verfied Users" subTittle="Total Verified Users" colour="dark">
            {{-- icon slot --}}
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-user-check" width="24" height="24"
                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                stroke-linejoin="round">
                <desc>Download more icon variants from https://tabler-icons.io/i/user-check</desc>
                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                <circle cx="9" cy="7" r="4"></circle>
                <path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2"></path>
                <path d="M16 11l2 2l4 -4"></path>
            </svg>
            {{-- end icon slot --}}
        </x-widgets.info-card>
    </div>
    {{-- end of first row --}}
    {{-- start-of-second-row --}}
    <div class="row mt-3">
        <div class="col-md-6">
            <div class="card">

                <div class="card-body">
                    <h3 class="card-title">Traffic summary</h3>
                    <div id="chart-demo-pie" class="chart-lg"></div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">

                <div class="card-body">
                    <h3 class="card-title">Performance summary</h3>
                    <div id="chart-demo-pie-storage" class="chart-lg"></div>
                </div>
            </div>
        </div>
    </div>
    {{-- end-of-second-row --}}
@endsection('page_content')

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            window.ApexCharts && (new ApexCharts(document.getElementById('chart-demo-pie'), {
                chart: {
                    type: "donut",
                    fontFamily: 'inherit',
                    height: 240,
                    sparkline: {
                        enabled: true
                    },
                    animations: {
                        enabled: false
                    },
                },
                fill: {
                    opacity: 1,
                },
                series: [{{ $totalUsers }}, {{ $newUsers }}, {{ $activeUsers }},
                    {{ $verifiedUsers }}
                ],
                labels: ["Total", "New Users", "Active", "Verified"],
                grid: {
                    strokeDashArray: 4,
                },
                colors: ["#5ec278", "#79a6dc", "#f0c878", "#3a306d"],
                legend: {
                    show: true,
                    position: 'bottom',
                    offsetY: 12,
                    markers: {
                        width: 10,
                        height: 10,
                        radius: 100,
                    },
                    itemMargin: {
                        horizontal: 8,
                        vertical: 8
                    },
                },
                tooltip: {
                    fillSeriesColor: false
                },
            })).render();
        });
        document.addEventListener("DOMContentLoaded", function() {
            window.ApexCharts && (new ApexCharts(document.getElementById('chart-demo-pie-storage'), {
                chart: {
                    type: "donut",
                    fontFamily: 'inherit',
                    height: 240,
                    sparkline: {
                        enabled: true
                    },
                    animations: {
                        enabled: false
                    },
                },
                fill: {
                    opacity: 1,
                },
                series: [{{ $diskuse }}, {{ $load }}],
                labels: ["Disk {{$diskuse}}% / 100%", "Cpu {{$load}} hz",],
                grid: {
                    strokeDashArray: 4,
                },
                colors: ["#0a166e", "#8dd1a6", "#d2e1f3", "#e9ecf1"],
                legend: {
                    show: true,
                    position: 'bottom',
                    offsetY: 12,
                    markers: {
                        width: 10,
                        height: 10,
                        radius: 100,
                    },
                    itemMargin: {
                        horizontal: 8,
                        vertical: 8
                    },
                },
                tooltip: {
                    fillSeriesColor: false
                },
            })).render();
        });
    </script>

@endsection
